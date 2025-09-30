<?php
require_once 'db_connection.php';

// Busca registros de abertura
$sql_abertura = "SELECT id, data_checklist, nome_lider, nome_fiscal FROM registros_abertura ORDER BY id DESC";
$result_abertura = $conn->query($sql_abertura);

// Busca registros de fechamento
$sql_fechamento = "SELECT id, data_checklist, nome_lider, nome_fiscal FROM registros_fechamento ORDER BY id DESC";
$result_fechamento = $conn->query($sql_fechamento);
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registros Salvos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="style.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="bi bi-card-list"></i> Espelho de Registros</h2>
        <a href="index.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar ao Menu</a>
    </div>

    <div class="mb-3">
        <input type="text" id="filtroTabela" class="form-control" placeholder="Digite para buscar em qualquer tabela...">
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">Registros de ABERTURA</div>
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0" id="tabelaAbertura">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Líder</th>
                        <th>Fiscal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result_abertura->num_rows > 0): ?>
                        <?php while($row = $result_abertura->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($row["data_checklist"])); ?></td>
                                <td><?php echo htmlspecialchars($row["nome_lider"]); ?></td>
                                <td><?php echo htmlspecialchars($row["nome_fiscal"]); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="4" class="text-center">Nenhum registro de abertura encontrado.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">Registros de FECHAMENTO</div>
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0" id="tabelaFechamento">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Líder</th>
                        <th>Fiscal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result_fechamento->num_rows > 0): ?>
                        <?php while($row = $result_fechamento->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($row["data_checklist"])); ?></td>
                                <td><?php echo htmlspecialchars($row["nome_lider"]); ?></td>
                                <td><?php echo htmlspecialchars($row["nome_fiscal"]); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="4" class="text-center">Nenhum registro de fechamento encontrado.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Script de filtro em tempo real
document.getElementById('filtroTabela').addEventListener('keyup', function() {
    let filter = this.value.toUpperCase();
    let tables = document.querySelectorAll("table");
    
    tables.forEach(table => {
        let rows = table.getElementsByTagName('tr');
        for (let i = 1; i < rows.length; i++) { // Começa em 1 para pular o cabeçalho
            let cells = rows[i].getElementsByTagName('td');
            let found = false;
            for (let j = 0; j < cells.length; j++) {
                if (cells[j].textContent.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
            rows[i].style.display = found ? "" : "none";
        }
    });
});
</script>
</body>
</html>
<?php
$conn->close();
?>