<?php
$_SESSION['maquina']['gabinete'] = @$_POST['gabinete'];
spl_autoload_register(function($class_name){
    $filename = "php/".$class_name.".class.php";
    if(file_exists($filename)){
        require_once($filename);
    }
  });
$computador = new computador();
$fontes = $computador->selecionarFonte();
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form class="form-outline mb-4" action="resumoDaMaquina" method="post">
<label>Escolha o Gabinete</label>
	<select name="fonte" id="fonte">
	<?php foreach ($fontes as $fonte): ?>
	<?php $preco = $computador->buscarMediaValor($fonte['cod_produto']); ?>
	<option value="<?= $fonte['cod_produto']?>"><?= 'R$ '.$preco .' '.  $fonte['nome'] ?></option>
	<?php endforeach; ?>
	</select>
	<button type="submit">Escolher</button>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br>