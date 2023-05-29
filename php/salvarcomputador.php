<?php
require_once("../_app/Config.inc.php");
$processador = $_SESSION['maquina']['processador'];
$placamae = $_SESSION['maquina']['placamae'];
$memoria1 = @$_SESSION['maquina']['memoria1'];
$memoria2 = @$_SESSION['maquina']['memoria2'];
$memoria3 = @$_SESSION['maquina']['memoria3'];
$memoria4 = @$_SESSION['maquina']['memoria4'];
$placadevideo = $_SESSION['maquina']['placadevideo'];
$armazenamento = $_SESSION['maquina']['armazenamento'];
$gabinete = $_SESSION['maquina']['gabinete'];
$fonte = $_SESSION['maquina']['fonte'];
$valorTotal = $_SESSION['maquina']['valorTotal'];

$computador = new computador();
$computador->salvarComputador($processador, $placamae, $memoria1, $memoria2, $memoria3, $memoria4, $placadevideo, $armazenamento, $gabinete, $fonte, $valorTotal);
header("Location: ../index");


?>