<?php
//Buscando a funçao para carregar classes
require_once("../_app/Config.inc.php");


$cod_produto = $_GET["cod"];
$produto = new produto();
if($produto->apagarProdutos($cod_produto)){
    header("Location: ../produtos");
    $_SESSION['Info'] = "Produto apagado com sucesso";
    $_SESSION['Type'] = "success";
}else{
    header("Location: ../produtos");
    $_SESSION['Info'] = "Erro ao apagar o Produto";
    $_SESSION['Type'] = "danger";
}
?>