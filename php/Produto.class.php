<?php
    require_once("../_app/Config.inc.php");

    class Produto {
        
        public function verificarProduto($codProduto, $Cod_cliente){
            $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
            $sqlpeca = $sql->prepare("SELECT cod_pecas FROM tb_produtosclientepj WHERE cod_pecas = :cod_produto AND cod_cliente_pj = :cod_cliente_pj");
            $sqlpeca->bindParam(':cod_produto', $codProduto);
            $sqlpeca->bindParam(':cod_cliente_pj', $Cod_cliente);
            $sqlpeca -> execute();
            $res = $sqlpeca->fetchAll(PDO::FETCH_ASSOC);
            $registros = @count($res);
            if ($registros > 0) {
                $_SESSION['Erro'] = "Produto já existe!!!";
                return true;
            }else{
                return false;
            }
        }

        public function salvarProdutos($Cod_cliente, $codProduto, $quantidade, $preco) {
            $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");

            if($this->verificarProduto($codProduto, $Cod_cliente)){
                return false;
            }else{
            $stmt = $sql->prepare("INSERT INTO tb_produtosclientepj (cod_cliente_pj, cod_pecas, quantidade, valor) VALUES (:Cod_cliente, :codigoPeca, :quantidade, :preco)");
            $stmt->bindParam(':Cod_cliente', $Cod_cliente);
            $stmt->bindParam(':codigoPeca', $codProduto);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':preco', $preco);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
        }
    
        public function editarProdutos($codProduto, $quantidade, $preco, $cod_produtosClientePj) {
            $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
            $stmt = $sql->prepare("UPDATE tb_produtosclientepj SET cod_pecas = :cod_pecas, quantidade = :quantidade, valor = :valor WHERE cod_produtosClientePj = :cod_produtosClientePj");
            $stmt->bindParam(':cod_produtosClientePj', $cod_produtosClientePj);
            $stmt->bindParam(':cod_pecas', $codProduto);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':valor', $preco);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        public function apagarProdutos($cod_produtosClientePj) {
            $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
            $stmt = $sql->prepare("DELETE FROM tb_produtosClientePj WHERE cod_produtosClientePj = :cod_produtosClientePj");
            $stmt->bindParam(':cod_produtosClientePj', $cod_produtosClientePj);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>