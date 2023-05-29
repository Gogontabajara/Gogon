<?php
for ($i=1; $i <= $_SESSION['socket_memoria']; $i++) { 
    $_SESSION['maquina']["memoria{$i}"] = @$_POST["memoria{$i}"];
}

spl_autoload_register(function($class_name){
    $filename = "php/".$class_name.".class.php";
    if(file_exists($filename)){
        require_once($filename);
    }
  });
$computador = new computador();
$placaDeVideos = $computador-> selecionarPlacaDeVideo();
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form class="form-outline mb-4" action="escolherArmazenamento" method="post">
<label>Escolha a Placa de Video</label>
	<select name="placadevideo" id="placadevideo">
	<?php foreach ($placaDeVideos as $placaDeVideo): ?>
    <?php $preco = $computador->buscarMediaValor($placaDeVideo['cod_produto']); ?>
	<option value="<?= $placaDeVideo['cod_produto']?>"><?= 'R$ '.$preco .' '. $placaDeVideo['nome'] ?></option>
	<?php endforeach; ?>
	</select>
	<button type="submit">Escolher</button>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br>