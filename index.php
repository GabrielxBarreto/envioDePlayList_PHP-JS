<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Upload de Arquivos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-4 rounded-4" style="max-width: 500px; width: 100%;">
      <h2 class="text-center mb-4">Digital Signage</h2>

      <form action="processar_arquivo.php" method="post" enctype="multipart/form-data">
        
        <div class="mb-3">
          <!--Talvez usar isso ni futuro como tela de login? Pensar melhor a sistematização -->
          <label for="arquivos" class="form-label">Página inicial para testes. Envie aqui os arquivos que serão mostrados na perspectiva do Raspberry PI</label>
          <input class="form-control" type="file" id="arquivos" name="arquivos[]" multiple>
        </div>

        <button type="submit" class="btn btn-primary w-100">
          <i class="bi bi-upload"></i> Enviar
        </button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>
