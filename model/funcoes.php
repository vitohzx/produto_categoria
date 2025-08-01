<?php

require("model/conexao.php");


function readCategorias(){
    $sql = "SELECT * FROM categorias";       

    $conexao = conectarBanco();   
    
    // Executa a consulta SQL
    $result = $conexao->query($sql);

    //cria um array vazio para armazenar os dados
    $categorias = [];

    // enquanto houver linhas na consulta, adiciona cada linha ao array
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
    $conexao->close();
    // Retorna os dados obtidos
    return $categorias;
}

function readProdutos($id){
    $conexao = conectarBanco();
        $sql = "SELECT 
            produtos.nome_produto AS nome_produto, 
            produtos.preco_produto, 
            categorias.nome_categoria AS nome_categoria 
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
        echo $prod["nome_produto"];
        echo "<br><br>";
    }
}

?>