<?php
require_once("../_app/Config.inc.php");
$processador = $_SESSION['maquina']['processador'];
$placamae = $_SESSION['maquina']['placamae'];
if(@$_SESSION['maquina']['memoria1'] != 0){
    $memoria1 = @$_SESSION['maquina']['memoria1'];
}
if(@$_SESSION['maquina']['memoria2'] != 0){
    $memoria2 = @$_SESSION['maquina']['memoria2'];
}
if(@$_SESSION['maquina']['memoria3'] != 0){
    $memoria3 = @$_SESSION['maquina']['memoria3'];
}
if(@$_SESSION['maquina']['memoria4'] != 0){
    $memoria4 = @$_SESSION['maquina']['memoria4'];
}
if(@$_SESSION['maquina']['placadevideo'] != 0){
    $placadevideo = @$_SESSION['maquina']['placadevideo'];
}
$armazenamento = $_SESSION['maquina']['armazenamento'];
$gabinete = $_SESSION['maquina']['gabinete'];
$fonte = $_SESSION['maquina']['fonte'];

$computador = new computador();
if($computador->salvarComputador($processador, $placamae, $memoria1, $memoria2, $memoria3, $memoria4, $placadevideo, $armazenamento, $gabinete, $fonte)){
    unset($_SESSION['maquina']['processador']);
    unset($_SESSION['maquina']['placamae']);
    unset($_SESSION['maquina']['memoria1']);
    unset($_SESSION['maquina']['memoria2']);
    unset($_SESSION['maquina']['memoria3']);
    unset($_SESSION['maquina']['memoria4']);
    unset($_SESSION['maquina']['placadevideo']);
    unset($_SESSION['maquina']['armazenamento']);
    unset($_SESSION['maquina']['gabinete']);
    unset($_SESSION['maquina']['fonte']);
    $_SESSION['Info'] = "Computador cadastrado com sucesso";
    $_SESSION['Type'] = "success";
    header("Location: ../computadoresMontados");
}else{
    unset($_SESSION['maquina']['processador']);
    unset($_SESSION['maquina']['placamae']);
    unset($_SESSION['maquina']['memoria1']);
    unset($_SESSION['maquina']['memoria2']);
    unset($_SESSION['maquina']['memoria3']);
    unset($_SESSION['maquina']['memoria4']);
    unset($_SESSION['maquina']['placadevideo']);
    unset($_SESSION['maquina']['armazenamento']);
    unset($_SESSION['maquina']['gabinete']);
    unset($_SESSION['maquina']['fonte']);
    $_SESSION['Info'] = "Erro ao cadastrar o computador";
    $_SESSION['Type'] = "danger";
    header("Location: ../computadoresMontados");
}



?>