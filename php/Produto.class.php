<?php
    require_once("../_app/Config.inc.php");

    class Produto {
        
        public function criar($marca, $cod_categoria, $modelo, $nome, $quantidade, $descricao, $preco, $foto) {
            $sql = new Sql();
            $data_insercao = date("Y-m-d H:i:s");
            $stmt = $sql->prepare("INSERT INTO tb_produtos (marca, cod_categoria, modelo, nome, data_insercao, quantidade, descricao, preco, foto) VALUES (:marca, :cod_categoria, :modelo, :nome, :data_insercao, :quantidade, :descricao, :preco, :foto)");
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':cod_categoria', $cod_categoria);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':data_insercao', $data_insercao);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':foto', $foto);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        public function ler($id) {
            $sql = new Sql();
            $stmt = $sql->prepare("SELECT * FROM tb_produtos WHERE id = :id");
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                return $stmt->fetch();
            } else {
                return false;
            }
        }
    
        public function atualizar($id, $marca, $cod_categoria, $modelo, $nome, $quantidade, $descricao, $preco, $foto) {
            $sql = new  Sql();
            $stmt = $sql->prepare("UPDATE tb_produtos SET marca = :marca, cod_categoria = :cod_categoria, modelo = :modelo, nome = :nome, quantidade = :quantidade, descricao = :descricao, preco = :preco, foto = :foto WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':cod_categoria', $cod_categoria);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':foto', $foto);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        public function excluir($id) {
            $sql = new Sql();
            $stmt = $sql->prepare("DELETE FROM tb_produtos WHERE id = :id");
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        public function pesquisarProdutos($termoBusca) {
            $sql = new Sql();
            $stmt = $sql->prepare("SELECT * FROM tb_produtos WHERE nome LIKE :termoBusca OR descricao LIKE :termoBusca");
            $stmt->bindValue(':termoBusca', '%'.$termoBusca.'%');
            if ($stmt->execute()) {
                return $stmt->fetchAll();
            } else {
                return false;
            }
        }
    }
?>