<?php

require("controller/controller.php");

$acao = isset($_POST["acao"]);

switch($acao){
    case null: {
        home();
        break;
    }
    case "buscar": {
        exibirBusca();
        break;
    }

}


?>