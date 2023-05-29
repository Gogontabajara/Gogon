<?php
$_SESSION['maquina']['processador'] = @$_POST['processador'];
spl_autoload_register(function($class_name){
    $filename = "php/".$class_name.".class.php";
    if(file_exists($filename)){
        require_once($filename);
    }
  });
$computador = new computador();
$idProcessador = @$_POST['processador'];
$carregar = $computador->loadbyid($idProcessador);
$socket = $carregar[0]['socket_processador'];

if(isset($socket)){
$placamaes = $computador->selecionarPlacaMae($socket);
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form class="form-outline mb-4" action="escolherMemoria" method="post">
    <label>Escolha a placa mae</label>
	<select name="placamae" id="placamae">  
	<?php foreach ($placamaes as $placamae): ?>
    <?php $preco = $computador->buscarMediaValor($placamae['cod_produto']); ?> 
	<option value="<?= $placamae['cod_produto']?>"><?= 'R$ '.$preco .' '. $placamae['nome']?></option>
	<?php endforeach; ?>
	</select>
	<button type="submit">Escolher</button>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php }?>