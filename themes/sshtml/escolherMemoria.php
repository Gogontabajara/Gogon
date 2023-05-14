<?php
$_SESSION['maquina']['placamae'] = @$_POST['placamae'];
spl_autoload_register(function($class_name){
    $filename = "php/".$class_name.".class.php";
    if(file_exists($filename)){
        require_once($filename);
    }
  });
$computador = new computador();
$idPlacaMae = @$_POST['placamae'];
$carregar = $computador->loadbyid($idPlacaMae);
$socket_Mem = $carregar[0]['sockets_memoria'];
$_SESSION['socket_memoria'] = @$carregar[0]['sockets_memoria'];
$tipo_Mem = $carregar[0]['memoria_ddr'];

if(isset($socket_Mem)){
$memorias = $computador->selecionarMemoriaRam($tipo_Mem);
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form class="form-outline mb-4" action="escolherPlacaDeVideo" method="post">
<label>Escolha a Memoria ram</label>
    <?php for ($i=1; $i <= $socket_Mem; $i++) { ?>
	<select name="memoria<?php echo $i ?>" id="memoria">
    <option value=""></option>
	<?php foreach ($memorias as $memoria): ?>
	<option value="<?= $memoria['cod_produto']?>"><?= $memoria['nome'] ?></option>
	<?php endforeach; ?>
	</select>
    <?php } ?>
	<button type="submit">Escolher</button>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php }?>