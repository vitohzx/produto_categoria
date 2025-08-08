<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar</title>
    <link rel="stylesheet" href="create.css">
</head>

<body>
    <h1> Criar Produtos </h1>
    <form action="../../index.php" method="post">
        <input type="text" name="nomeProduto" id="" placeholder="Digite o nome do produto"> <br><br>
        <input type="number" name="precoProduto" id="" placeholder="Digite o valor do produto"><br><br>
        <select name="categoria" id="">
            <option value="nulo"> Selecione uma categoria </option>
            <?php

            require_once(__DIR__ . "/../../model/funcoes.php");

            $categoria = readCategorias();
            foreach ($categoria as $cat) {
                echo "<option value='{$cat['id_categoria']}'> {$cat['nome_categoria']} </option>";
            }
            ?>
        </select>
        <input type="hidden" name="acao" value="criar">
        <input type="submit" value="Criar Produto">
    </form>

</body>

</html>