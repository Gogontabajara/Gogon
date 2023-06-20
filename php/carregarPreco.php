<?php
spl_autoload_register(function ($class_name) {
    $filename = $class_name . ".class.php";
    if (file_exists($filename)) {
      require_once($filename);
    }
  });
if (isset($_POST['peca'])) {
    $peca = $_POST['peca'];
    $computador = new computador();
    if($peca == 0){
      $precoFormatado = number_format($peca, 2, ',', '.');
      echo "R$" . $precoFormatado;
    }else{
    $preco = $computador->buscarMediaValor($peca);
    $precoFormatado = number_format($preco, 2, ',', '.');
    echo "R$" . $precoFormatado;
    }
}
?>