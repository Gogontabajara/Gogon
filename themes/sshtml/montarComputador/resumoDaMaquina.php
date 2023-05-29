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
$precoProcessador = $computador->buscarMediaValor($_SESSION['maquina']['processador']);
$processador = $carregar[0]['nome'];
$carregar = $computador->loadbyid($_SESSION['maquina']['placamae']);
$precoPlacamae = $computador->buscarMediaValor($_SESSION['maquina']['placamae']);
$placamae = $carregar[0]['nome'];
$carregar = $computador->loadbyid(@$_SESSION['maquina']['memoria1']);
$precoMemoria1 = $computador->buscarMediaValor(@$_SESSION['maquina']['memoria1']);
$memoria1 = @$carregar[0]['nome'];
$carregar = $computador->loadbyid(@$_SESSION['maquina']['memoria2']);
$precoMemoria2 = $computador->buscarMediaValor(@$_SESSION['maquina']['memoria2']);
$memoria2 = @$carregar[0]['nome'];
$carregar = $computador->loadbyid(@$_SESSION['maquina']['memoria3']);
$precoMemoria3 = $computador->buscarMediaValor(@$_SESSION['maquina']['memoria3']);
$memoria3 = @$carregar[0]['nome'];
$carregar = $computador->loadbyid(@$_SESSION['maquina']['memoria4']);
$precoMemoria4 = $computador->buscarMediaValor(@$_SESSION['maquina']['memoria4']);
$memoria4 = @$carregar[0]['nome'];
$carregar = $computador->loadbyid($_SESSION['maquina']['placadevideo']);
$precoPlacaDeVideo = $computador->buscarMediaValor($_SESSION['maquina']['placadevideo']);
$placadevideo = $carregar[0]['nome'];
$carregar = $computador->loadbyid($_SESSION['maquina']['armazenamento']);
$precoArmazenamento = $computador->buscarMediaValor($_SESSION['maquina']['armazenamento']);
$armazenamento = $carregar[0]['nome'];
$carregar = $computador->loadbyid($_SESSION['maquina']['gabinete']);
$precoGabinete = $computador->buscarMediaValor($_SESSION['maquina']['gabinete']);
$gabinete = $carregar[0]['nome'];
$carregar = $computador->loadbyid($_SESSION['maquina']['fonte']);
$precoFonte = $computador->buscarMediaValor($_SESSION['maquina']['fonte']);
$fonte = $carregar[0]['nome'];

echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
echo $processador . ' '. 'R$ '. $precoProcessador;
echo "<br>";
echo $placamae . ' '. 'R$ '. $precoPlacamae;
echo "<br>";
if(isset($memoria1)){
echo $memoria1. ' '. 'R$ '. $precoMemoria1 . "<br>";
}
if(isset($memoria2)){
echo $memoria2. ' '. 'R$ '. $precoMemoria2 . "<br>";
}
if(isset($memoria3)){
echo $memoria3 .  ' '. 'R$ '. $precoMemoria3 ."<br>";
}
if(isset($memoria4)){
echo $memoria4 .  ' '. 'R$ '. $precoMemoria4 ."<br>";
}
echo $placadevideo  . ' '. 'R$ '. $precoPlacaDeVideo;
echo "<br>";
echo $armazenamento  . ' '. 'R$ '. $precoArmazenamento;
echo "<br>";
echo $gabinete  . ' '. 'R$ '. $precoGabinete;
echo "<br>";
echo $fonte  . ' '. 'R$ '. $precoFonte;
echo "<br>";

$precoTotal = $precoProcessador + $precoPlacamae + $precoMemoria1 + $precoMemoria2 + $precoMemoria3 + $precoMemoria4 + $precoPlacaDeVideo + $precoArmazenamento + $precoGabinete + $precoFonte;
$_SESSION['maquina']['valorTotal'] = $precoTotal;
echo 'Valor Total: R$ '. $precoTotal;


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

?>

<?php if(@$_SESSION["logado"] == "true"){?>
      <li class="nav-item d_none">
        <a href="php/salvarcomputador.php">Salvar Computador</a>
      </li>
<?php }?>

<a href="index">Voltar ao inicio</a>
