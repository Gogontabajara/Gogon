<?php
$_SESSION['maquina']['fonte'] = @$_POST['fonte'];
spl_autoload_register(function($class_name){
    $filename = "php/".$class_name.".class.php";
    if(file_exists($filename)){
        require_once($filename);
    }
  });
$computador = new computador();
$carregar = $computador->loadbyid($_SESSION['maquina']['processador']);
$processador = $carregar[0]['nome'];
$carregar = $computador->loadbyid($_SESSION['maquina']['placamae']);
$placamae = $carregar[0]['nome'];
$carregar = $computador->loadbyid(@$_SESSION['maquina']['memoria1']);
$memoria1 = @$carregar[0]['nome'];
$carregar = $computador->loadbyid(@$_SESSION['maquina']['memoria2']);
$memoria2 = @$carregar[0]['nome'];
$carregar = $computador->loadbyid(@$_SESSION['maquina']['memoria3']);
$memoria3 = @$carregar[0]['nome'];
$carregar = $computador->loadbyid(@$_SESSION['maquina']['memoria4']);
$memoria4 = @$carregar[0]['nome'];
$carregar = $computador->loadbyid($_SESSION['maquina']['placadevideo']);
$placadevideo = $carregar[0]['nome'];
$carregar = $computador->loadbyid($_SESSION['maquina']['armazenamento']);
$armazenamento = $carregar[0]['nome'];
$carregar = $computador->loadbyid($_SESSION['maquina']['gabinete']);
$gabinete = $carregar[0]['nome'];
$carregar = $computador->loadbyid($_SESSION['maquina']['fonte']);
$fonte = $carregar[0]['nome'];

echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
echo $processador;
echo "<br>";
echo $placamae;
echo "<br>";
if(isset($memoria1)){
echo $memoria1. "<br>";
}
if(isset($memoria2)){
echo $memoria2. "<br>";
}
if(isset($memoria3)){
echo $memoria3 . "<br>";
}
if(isset($memoria4)){
echo $memoria4 , "<br>";
}
echo $placadevideo;
echo "<br>";
echo $armazenamento;
echo "<br>";
echo $gabinete;
echo "<br>";
echo $fonte;

echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
// echo $_SESSION['maquina']['processador'];
// echo $_SESSION['maquina']['placamae'];
// echo $_SESSION['maquina']['memoria1'];
// echo @$_SESSION['maquina']['memoria2'];
// echo @$_SESSION['maquina']['memoria3'];
// echo @$_SESSION['maquina']['memoria4'];
// echo $_SESSION['maquina']['placadevideo'];
// echo $_SESSION['maquina']['armazenamento'];
// echo $_SESSION['maquina']['gabinete'];
// echo $_SESSION['maquina']['fonte'];

@session_destroy();
?>
<a href="index">Voltar ao inicio</a>
