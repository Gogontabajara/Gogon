<?php
$_SESSION['maquina']['armazenamento'] = @$_POST['armazenamento'];
spl_autoload_register(function($class_name){
    $filename = "php/".$class_name.".class.php";
    if(file_exists($filename)){
        require_once($filename);
    }
  });
$computador = new computador();
$gabinetes = $computador->selecionarGabinete();
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form class="form-outline mb-4" action="escolherFonte" method="post">
<label>Escolha o Gabinete</label>
	<select name="gabinete" id="gabinete">
	<?php foreach ($gabinetes as $gabinete): ?>
	<option value="<?= $gabinete['cod_produto']?>"><?= $gabinete['nome'] ?></option>
	<?php endforeach; ?>
	</select>
	<button type="submit">Escolher</button>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
