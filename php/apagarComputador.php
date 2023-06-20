<?php
//Buscando a funçao para carregar classes
require_once("../_app/Config.inc.php");


$cod_computador = $_GET["cod"];
$computador = new computador();
if($computador->apagarComputador($cod_computador)){
    header("Location: ../computadoresMontados");
    $_SESSION['Info'] = "Computador apagado com sucesso";
    $_SESSION['Type'] = "success";
}else{
    header("Location: ../computadoresMontados");
    $_SESSION['Info'] = "Erro ao apagar o Computador";
    $_SESSION['Type'] = "danger";
}

?>