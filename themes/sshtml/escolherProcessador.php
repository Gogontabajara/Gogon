<?php
spl_autoload_register(function($class_name){
    $filename = "php/".$class_name.".class.php";
    if(file_exists($filename)){
        require_once($filename);
    }
  });
$computador = new computador();
$processadores = $computador->selecionarProcessador();
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form class="form-outline mb-4" action="escolherPlacaMae" method="post">
	<label>Escolha o Processador</label>
	<select name="processador" id="processador">
	<?php foreach ($processadores as $processador): ?>
	<option value="<?= $processador['cod_produto']?>"><?= $processador['nome'] ?></option>
	<?php endforeach; ?>
	</select>
	<button type="submit">Escolher</button>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br>