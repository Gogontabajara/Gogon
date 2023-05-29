<?php
$_SESSION['maquina']['processador'] = @$_POST['processador'];
spl_autoload_register(function($class_name){
    $filename = "php/".$class_name.".class.php";
    if(file_exists($filename)){
        require_once($filename);
    }
  });
if (isset($_SESSION['Cod_Autenticacao'])) {
    $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
    $stmt = $sql->query("SELECT * FROM tb_computadores_montado where cod_cliente = '$_SESSION[Cod_Autenticacao]'");
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $computador = new computador();
} else {
    header("Location: ../login");
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php
foreach ($res as $id):
    $resultados = $computador->carregarComputadores($id['cod_computador']);
    foreach ($resultados as $resultado):
        $carregar = $computador->loadbyid($resultado['cod_processador']);
        $precoProcessador = $computador->buscarMediaValor($resultado['cod_processador']);
        echo $processador = $carregar[0]['nome'] . ' ' . 'R$ '. $precoProcessador;
        echo "<br>";
        $carregar = $computador->loadbyid($resultado['cod_placamae']);
        $precoPlacamae = $computador->buscarMediaValor($resultado['cod_placamae']);
        echo $placamae = $carregar[0]['nome']  . ' ' . 'R$ '. $precoPlacamae;
        echo "<br>";

        $carregar = $computador->loadbyid($resultado['cod_memoria1']);
        $precoMemoria1 = $computador->buscarMediaValor($resultado['cod_memoria1']);
        $memoria1 = @$carregar[0]['nome'];
        if(isset($memoria1)){
            echo $memoria1   . ' ' . 'R$ '. $precoMemoria1 . "<br>";
        }
        $carregar = $computador->loadbyid($resultado['cod_memoria2']);
        $precoMemoria2 = $computador->buscarMediaValor($resultado['cod_memoria2']);
        $memoria2 = @$carregar[0]['nome'];
        if(isset($memoria2)){
            echo $memoria2   . ' ' . 'R$ '. $precoMemoria2 . "<br>";
        }
        $carregar = $computador->loadbyid($resultado['cod_memoria3']);
        $precoMemoria3 = $computador->buscarMediaValor($resultado['cod_memoria3']);
        $memoria3 = @$carregar[0]['nome'];
        if(isset($memoria3)){
            echo $memoria3   . ' ' . 'R$ '. $precoMemoria3 . "<br>";
        }
        $carregar = $computador->loadbyid($resultado['cod_memoria4']);
        $precoMemoria4 = $computador->buscarMediaValor($resultado['cod_memoria4']);
        $memoria4 = @$carregar[0]['nome'];
        if(isset($memoria4)){
            echo $memoria4   . ' ' . 'R$ '. $precoMemoria4 . "<br>";
        }

        $carregar = $computador->loadbyid($resultado['cod_placadevideo']);
        $precoPlacaDeVideo = $computador->buscarMediaValor($resultado['cod_placadevideo']);
        echo $placadevideo = $carregar[0]['nome'] . ' ' . 'R$ '. $precoPlacaDeVideo;
        echo "<br>";
        $carregar = $computador->loadbyid($resultado['cod_armazenamento']);
        $precoArmazenamento = $computador->buscarMediaValor($resultado['cod_armazenamento']);
        echo $armazenamento = $carregar[0]['nome'] . ' ' . 'R$ '. $precoArmazenamento;
        echo "<br>";
        $carregar = $computador->loadbyid($resultado['cod_gabinete']);
        $precoGabinete = $computador->buscarMediaValor($resultado['cod_gabinete']);
        echo $gabinete = $carregar[0]['nome']  . ' ' . 'R$ '. $precoGabinete;
        echo "<br>";
        $carregar = $computador->loadbyid($resultado['cod_fonte']);
        $precoFonte = $computador->buscarMediaValor($resultado['cod_fonte']);
        echo $fonte = $carregar[0]['nome'] . ' ' . 'R$ '. $precoFonte;
        echo "<br>";
        echo 'Valor Total: R$ '. $id['valor_total'];
        echo "<br>";
        echo "<a href='php/apagarComputador.php?cod={$resultado['cod_computador']}'>Apagar</a>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
    endforeach;
endforeach;
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<a href="index">Voltar ao inicio</a>