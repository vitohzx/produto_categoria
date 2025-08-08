<?php

function conectarBanco() {
    $host = "127.0.0.1";
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

function readCategorias(){

    $sql = "SELECT * FROM categorias";       

    $conexao = conectarBanco();   
    
    $result = $conexao->query($sql);


    $categorias = [];

    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
    $conexao->close();

    return $categorias;
}

function readProdutos($id){
    $conexao = conectarBanco();
        $sql = "SELECT 
            produtos.nome_produto, 
            produtos.preco_produto, 
            categorias.nome_categoria
        FROM 
            produtos 
        INNER JOIN 
            categorias ON produtos.id_categoria_fk = categorias.id_categoria 
        WHERE 
            categorias.id_categoria = ?";

    
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $produtos = [];

    while($row = $result->fetch_assoc()){
        $produtos[] = $row;
    }

    $stmt->close();
    $conexao->close();

    $quantidade = count($produtos);

    echo "<br>";
    echo "<h3> {$quantidade} Produtos foram encontrados </h3>";
    echo "<br>";

    foreach($produtos as $prod){
        echo "{$prod["nome_produto"]}: {$prod["preco_produto"]}";
        echo "<br><br>";
    }
}

function criarProdutos($nome, $id, $preco){
    $conexao = conectarBanco();
    $sql = "INSERT INTO produtos (nome_produto, id_categoria_fk, preco_produto) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sid", $nome, $id, $preco);
    $stmt->execute();
    $stmt->close();
    $conexao->close();
}
?>