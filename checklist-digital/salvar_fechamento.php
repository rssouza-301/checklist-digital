<?php
require_once 'db_connection.php'; // Inclui a conexão

// ... (recebe todos os campos, mas com o campo de lacres ajustado)
$lacres_colocados = $_POST['lacres_colocados'];

// Prepared statement para a tabela de FECHAMENTO
$sql = "INSERT INTO registros_fechamento (nome_lider, nome_fiscal, data_checklist, coordenadas, luzes_internas, luzes_externas, equipamentos_ok, sistemas_ok, risco_incendio_ok, passagem_servico_ok, lacres_retirados, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Erro na preparação da query: " . $conn->error);
}

// "sssssiiiiiss" (o número de 's' e 'i' deve corresponder ao número de '?')
$stmt->bind_param("ssssiiiiisss", 
     $nome_lider, 
    $nome_fiscal,
    $data_checklist,
    $coordenadas,
    $luzes_internas,
    $luzes_externas,
    $equipamentos_ok,
    $sistemas_ok,
    $risco_incendio_ok,
    $passagem_servico_ok,
    $lacres_retirados,
    $observacoes,
);

if ($stmt->execute()) {
    echo "Checklist de FECHAMENTO registrado com sucesso!";
} else {
    echo "Erro ao registrar o checklist: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>