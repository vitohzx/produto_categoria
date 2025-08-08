<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <form action="index.php" method="post">
        <h1 align="center"> Busca produtos </h1>
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
        <input type="hidden" name="acao" value="buscar">
        <input type="submit" value="Buscar">
    </form>
    <a href="./views/create/create.php"> <button> Criar Produto </button> </a>
</body>

</html>