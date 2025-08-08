<?php

require("model/funcoes.php");

function home(){
    include("./views/home/inicio.php");
}

function exibirBusca(){
    include("./views/home/inicio.php");
    readProdutos($_POST["categoria"]);
}

function criarProd(){
    include ("./views/create/create.php");
    criarProduto($_POST["nomeProduto"], $_POST["categoria"], $_POST["precoProduto"]);
}

?>