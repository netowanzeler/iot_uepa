<?php
require_once 'vendor/autoload.php'; // Inclui o autoloader do Composer

require_once 'db.php'; // Inclui o arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Verifica se o parâmetro 'bpm' foi enviado via GET

  $valor_bpm = $_GET['bpm'] ?? null;
  if ($valor_bpm !== null) {
    // Atualiza o valor do BPM no banco de dados
    $stmt = $pdo->prepare("INSERT INTO batimentos (bpm) VALUES (:bpm)");
    $stmt->bindParam(':bpm', $valor_bpm);
    $stmt->execute();
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monitor de Batimentos</title>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="\iot\vendor\twbs\bootstrap\dist\css\bootstrap.min.css">
  
  <!-- jQuery -->
  <script src="\iot\vendor\components\jquery\jquery.min.js"></script>
  
  <!-- Bootstrap JS (com Popper incluso) -->
  <script src="\iot\vendor\twbs\bootstrap\dist\js\bootstrap.bundle.min.js"></script>
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
  <!-- Google Charts -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <style>
    body {
      background: linear-gradient(135deg, #ff6b6b, #f06595, #845ef7);
      color: #fff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      border-radius: 20px;
      background: #fff;
      color: #333;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
    .bpm-value {
      font-size: 3rem;
      font-weight: bold;
      color: #d6336c;
    }
    #chart_div {
      width: 100%;
      height: 300px;
    }
    h1 {
      font-weight: 700;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card shadow-lg p-4 text-center">
      <h1><i class="fa-solid fa-heart-pulse text-danger"></i> Monitor de Batimentos</h1>
      <h2 id="bpm" class="bpm-value">-- BPM</h2>
      <div id="chart_div"></div>
    </div>
  </div>

  <script>
    // Carrega o Google Charts
    google.charts.load('current', { 'packages': ['corechart'] });
    let chart, data;

    google.charts.setOnLoadCallback(() => {
      data = new google.visualization.DataTable();
      data.addColumn('string', 'Tempo');
      data.addColumn('number', 'BPM');

      chart = new google.visualization.LineChart(document.getElementById('chart_div'));

      // primeira atualização
      atualizarBPM();
    });

    function atualizarBPM() {
      $.getJSON('get_bpm.php', function (dados) {
        // Atualiza o valor numérico
        $("#bpm").text(dados.bpm + " BPM");

        // Adiciona ao gráfico com timestamp simples
        let agora = new Date();
        let hora = agora.getHours().toString().padStart(2, '0') + ":" +
                   agora.getMinutes().toString().padStart(2, '0') + ":" +
                   agora.getSeconds().toString().padStart(2, '0');
        
        data.addRow([hora, parseInt(dados.bpm)]);

        // Limita a quantidade de pontos (últimos 20)
        if (data.getNumberOfRows() > 20) {
          data.removeRow(0);
        }

        // Desenha o gráfico atualizado
        let options = {
          title: 'Histórico de Batimentos',
          curveType: 'function',
          legend: { position: 'bottom' },
          colors: ['#d6336c'],
          backgroundColor: '#fff',
          chartArea: { width: '85%', height: '70%' }
        };
        chart.draw(data, options);

        // Atualiza de novo em 1s
        setTimeout(atualizarBPM, 1000);
      });
    }
  </script>
</body>

</html>
