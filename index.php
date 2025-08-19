<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monitor de Batimentos</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" 
        href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">

  <!-- Bootstrap JS (com Popper incluso) -->
  <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-danger-subtle">
  <div class="container py-5">
    <h1 class="text-center mb-4">Monitor de Batimentos</h1>
    <div class="card shadow text-center">
      <div class="card-body">
        <h2 id="bpm" class="text-primary">-- BPM</h2>
        <p id="status" class="text-muted"><?php if(isset($_GET['bpm']) && $_GET['bpm'] !== null) { echo $_GET['bpm']; } else { echo 'Nenhum dado recebido.'; }  ?></p>
      </div>
    </div>
  </div>
</body>
</html>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $valor_bpm = $_GET['bpm'] ?? null;
    if ($valor_bpm !== null) {
        echo "<script>
        document.getElementById('bpm').textContent = valor_bpm + ' BPM';
        document.getElementById('status').textContent = 'Dados recebidos com sucesso!';
        </script>";
    } else {
        echo "<script>
        document.getElementById('status').textContent = 'Nenhum dado recebido.';
        </script>";
    }
} else {
    echo "<script>
    document.getElementById('status').textContent = 'Método não suportado.';
    </script>";
}

?>
