<?php
require_once("../_app/Config.inc.php");

// Dados do cadastro
$preco = @$_POST['preco'];
$Cod_cliente = $_SESSION['Cod_cliente'];
$codProduto = $_POST['codPeca'];
$quantidade = $_POST['quantidade'];

// Cadastrar produtos
$produto = new produto();
if($produto->salvarProdutos($Cod_cliente, $codProduto, $quantidade, $preco)){
    $_SESSION['Info'] = "Produto cadastrado com sucesso";
    $_SESSION['Type'] = "success";
    header("Location: ../produtos");
}
else{
    $_SESSION['Info'] = "Erro ao cadastrar um produto";
    $_SESSION['Type'] = "danger";
    header("Location: ../produtos");
}

