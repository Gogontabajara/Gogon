<?php

class computador {

    public function selecionarProcessador() {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_categorias = :processador");
        $stmt->bindValue(':processador', 5);
        $stmt->execute();
        $processadores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $processadores;
    }

    public function selecionarPlacaMae($socket) {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_categorias = :placamae AND socket_processador = :socket");
        $stmt->bindValue(':socket', $socket);
        $stmt->bindValue(':placamae', 4);
        $stmt->execute();
        $placas_mae = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $placas_mae;
    }

    public function selecionarMemoriaRam($tipo) {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_categorias = :memoriaram AND memoria_ddr = :tipo");
        $stmt->bindValue(':memoriaram', 6);
        $stmt->bindValue(':tipo', $tipo);
        $stmt->execute();
        $memorias_ram = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $memorias_ram;
    }

    public function selecionarPlacaDeVideo() {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_categorias = :placaDeVideo");
        $stmt->bindValue(':placaDeVideo', 7);
        $stmt->execute();
        $placas_de_video = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $placas_de_video;
    }

    public function selecionarArmazenamento() {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_categorias = :armazenamento");
        $stmt->bindValue(':armazenamento', 11);
        $stmt->execute();
        $hds = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $hds;
    }

    public function selecionarGabinete() {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_categorias = :gabinete");
        $stmt->bindValue(':gabinete', 8);
        $stmt->execute();
        $gabinetes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $gabinetes;
    }

    public function selecionarFonte() {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_categorias = :fonte");
        $stmt->bindValue(':fonte', 9);
        $stmt->execute();
        $fontes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fontes;
    }
    public function loadbyid($id){
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_produto = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $peca = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $peca;
    }
}