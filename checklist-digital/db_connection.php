<?php
$servidor = "localhost";
$usuario = "root";
$senha = "root";
$banco = "checklist_db"; // Verifique se o nome do banco está correto

// Cria a conexão
$conn = new mysqli($servidor, $usuario, $senha, $banco, 8889);

// Checa a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Define o charset para utf8mb4 para suportar caracteres especiais
$conn->set_charset("utf8mb4");
?>