<?php
require_once("../_app/Config.inc.php");
class Endereco {
    public function adicionarEndereco($cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $cod_autenticacao) {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("INSERT INTO tb_endereco (cep, rua, numero, complemento, bairro, cidade, uf, cod_autenticacao) VALUES (:cep, :rua, :numero, :complemento, :bairro, :cidade, :uf, :cod_autenticacao)");
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':uf', $uf);
        $stmt->bindParam(':cod_autenticacao', $cod_autenticacao);
        $stmt->execute();
        return $sql->lastInsertId();
    }
    
    public function editarEndereco($id, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf) {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("UPDATE tb_endereco SET cep = :cep, rua = :rua, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, uf = :uf WHERE cod_endereco = :id");
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':uf', $uf);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function removerEndereco($id) {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("DELETE FROM tb_endereco WHERE cod_endereco = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function selecionarEndereco($id) {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_endereco WHERE cod_endereco = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>