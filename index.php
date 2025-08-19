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
<body class="bg-light">
  <div class="container py-5">
    <h1 class="text-center mb-4">Monitor de Batimentos</h1>
    <div class="card shadow text-center">
      <div class="card-body">
        <h2 id="bpm" class="text-primary">-- BPM</h2>
        <p id="status" class="text-muted">Aguardando dados...</p>
      </div>
    </div>
  </div>
</body>
</html>
