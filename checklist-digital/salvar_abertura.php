<?php
// Inclui a conexão com o banco de dados
require_once 'db_connection.php';

// --- 1. RECEBENDO E TRATANDO OS DADOS DO FORMULÁRIO ---

// Campos de texto (usando o operador '??' para evitar erros caso não existam)
$nome_lider = $_POST['lider'] ?? '';
$nome_fiscal = $_POST['fiscal'] ?? '';
$data_checklist = $_POST['data'] ?? '';
$coordenadas = $_POST['coordenadas'] ?? '';
$lacres_retirados = $_POST['lacres_retirados'] ?? '';
$observacoes = $_POST['observacoes'] ?? '';

// Checkboxes (usando isset() para definir 0 ou 1)
// Os nomes aqui DEVEM corresponder aos atributos 'name' do seu HTML
$luzes_internas = isset($_POST['luzesInternas']) ? 1 : 0;
$luzes_externas = isset($_POST['luzesExternas']) ? 1 : 0;
$equipamentos_ok = isset($_POST['equipamentos']) ? 1 : 0;
$sistemas_ok = isset($_POST['sistemas']) ? 1 : 0;
$risco_incendio_ok = isset($_POST['riscoIncendio']) ? 1 : 0;
$passagem_servico_ok = isset($_POST['passagemServico']) ? 1 : 0;


// --- 2. PREPARANDO E EXECUTANDO A QUERY ---

// SQL para inserir na sua tabela (nomes das colunas devem corresponder ao seu banco)
$sql = "INSERT INTO registros_abertura (
            nome_lider, nome_fiscal, data_checklist, coordenadas, 
            luzes_internas, luzes_externas, equipamentos_ok, sistemas_ok, 
            risco_incendio_ok, passagem_servico_ok, lacres_retirados, observacoes
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Verifica se a preparação da query falhou
if ($stmt === false) {
    // Para depuração: mostra o erro específico do MySQL
    die("Erro na preparação da query: " . $conn->error);
}

// Vincula os parâmetros à query
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
    $observacoes
);

// Executa a query e envia a resposta para o JavaScript
if ($stmt->execute()) {
    echo "Checklist de ABERTURA registrado com sucesso!";
} else {
    // Para depuração: mostra o erro específico do statement
    echo "Erro ao registrar o checklist: " . $stmt->error;
}

// Fecha o statement e a conexão
$stmt->close();
$conn->close();
?>