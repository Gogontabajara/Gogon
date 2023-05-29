<?php
//Buscando a funçao para carregar classes
require_once("../_app/Config.inc.php");


$cod_computador = $_GET["cod"];
$computador = new computador();
if($computador->apagarComputador($cod_computador)){
    header("Location: ../index");
}else{
    header("Location: ../index");
}

?>