<?php
// Função para conectar ao banco de dados MySQL
function conectarBanco() {
    $host = "localhost";
    $user = "root";
    $password = "root";
    $database = "produto_categoria";

    // Criação da conexão
    $conexao = new mysqli($host, $user, $password, $database);

    // Verifica se houve erro na conexão
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    // Define o charset para evitar problemas com caracteres especiais
    $conexao->set_charset("utf8mb4");

    return $conexao;
}
?>