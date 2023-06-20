<?php
require_once("../_app/Config.inc.php");

// Dados da ediçao do cadastro
$cod_produtosCientePj = $_GET['cod'];
$preco = @$_POST['preco'];
$codProduto = $_POST['codPeca'];
$quantidade = $_POST['quantidade'];


// Editar produtos
$produto = new produto();
if($produto->editarProdutos($codProduto, $quantidade, $preco, $cod_produtosCientePj)){
    $_SESSION['Info'] = "Produto Editado com sucesso";
    header("Location: ../produtos");
}
else{
    $_SESSION['Info'] = "Erro ao Editar um produto";
    header("Location: ../cadastrarProduto");
}
?>