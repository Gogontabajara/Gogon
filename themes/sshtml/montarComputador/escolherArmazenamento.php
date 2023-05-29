<?php
$_SESSION['maquina']['placadevideo'] = @$_POST['placadevideo'];
spl_autoload_register(function($class_name){
    $filename = "php/".$class_name.".class.php";
    if(file_exists($filename)){
        require_once($filename);
    }
  });
$computador = new computador();
$armazenamentos = $computador->selecionarArmazenamento();
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form class="form-outline mb-4" action="escolherGabinete" method="post">
<label>Escolha o Armazenamento</label>
	<select name="armazenamento" id="armazenamento">
	<?php foreach ($armazenamentos as $armazenamento): ?>
	<?php $preco = $computador->buscarMediaValor($armazenamento['cod_produto']); ?>
	<option value="<?= $armazenamento['cod_produto']?>"><?= 'R$ '.$preco .' '.  $armazenamento['nome'] ?></option>
	<?php endforeach; ?>
	</select>
	<button type="submit">Escolher</button>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br>