<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Controle Operacional</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card text-center shadow-lg" style="width: 24rem;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-ui-checks-grid"></i> Menu Principal</h4>
        </div>
        <div class="card-body p-4">
            <h5 class="card-title">Controle de Checklist</h5>
            <p class="card-text">Selecione uma das opções abaixo para continuar.</p>
            <div class="d-grid gap-3">
                <a href="form_abertura.php" class="btn btn-success btn-lg">
                    <i class="bi bi-box-arrow-right"></i> Registrar Abertura
                </a>
                <a href="form_fechamento.php" class="btn btn-danger btn-lg">
                    <i class="bi bi-box-arrow-in-left"></i> Registrar Fechamento
                </a>
                <a href="listar_registros.php" class="btn btn-info btn-lg text-white">
                    <i class="bi bi-card-list"></i> Listar Registros
                </a>
            </div>
        </div>
        <div class="card-footer text-muted">
            Versão 2.0
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>