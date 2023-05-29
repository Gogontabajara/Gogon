<?php
require_once("../_app/Config.inc.php");

// Dados do cadastro
@$preco = @$_POST['preco'];
@$Cod_cliente = $_SESSION['Cod_cliente'];

@$idProcessador = @$_POST['idProcessador'];
@$idPalacaMae = @$_POST['idPalacaMae'];
@$idRam = @$_POST['idRam'];
@$idPlacaVideo = @$_POST['idPlacaVideo'];
@$idGabinete = @$_POST['idGabinete'];
@$idFonte = @$_POST['idFonte'];
@$idArmazenamento = @$_POST['idArmazenamento'];

$codigoProdutoArray = array($idProcessador, $idPalacaMae, $idPalacaMae, $idRam, $idPlacaVideo, $idGabinete, $idFonte, $idArmazenamento);
for ($i = 0; $i < count($codigoProdutoArray); $i++) {
     if ($codigoProdutoArray[$i]) {
          $codProduto = $codigoProdutoArray[$i];
     }
}

$sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
$stmt = $sql->prepare("INSERT INTO tb_produtosclientepj (cod_cliente_pj, cod_pecas, valor) VALUES (:Cod_cliente, :codigoPeca, :preco)");
$stmt->bindParam(':Cod_cliente', $Cod_cliente);
$stmt->bindParam(':codigoPeca', $codProduto);
$stmt->bindParam(':preco', $preco);

$stmt->execute();
