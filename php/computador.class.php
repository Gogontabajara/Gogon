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

    //Funçao para carregar as peças pelo id delas
    public function loadbyid($id){
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_produto = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $peca = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $peca;
    }

    //Funçao para buscar os codigos das peças do computador para que eles sejam buscados do banco de dados
    public function carregarComputadores($id){
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_computador WHERE cod_computador = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $computador = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $computador;
    }

    //Funçao para carregar a media de valores do preço de um determinado produto
    public function buscarMediaValor($id){
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("SELECT * FROM tb_produtosclientepj WHERE cod_pecas = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $quantidadeDeItens = count($resultados);
        $valor = 0;
        foreach ($resultados as $resultado):
            $valor += $resultado['valor'];
        endforeach;
        if ($valor == 0 && $quantidadeDeItens == 0){
            $valor = 1;
            $quantidadeDeItens = 1;
        }
        $media = $valor/$quantidadeDeItens;
        return $media;
    }

    //Editar Computador(Talvez)
    
    //Apagar Computador

    public function apagarComputador($cod){
            $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
            $stmt = $sql->prepare("DELETE FROM tb_computador WHERE cod_computador = :cod_computador");
            $stmt->bindParam(':cod_computador', $cod);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }


    // Salvar Computador

    public function salvarComputador($processador, $placamae, $memoria1 = null, $memoria2 = null, $memoria3 = null, $memoria4 = null, $placadevideo, $armazenamento, $gabinete, $fonte, $valorTotal){
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("INSERT INTO tb_computador (cod_processador, cod_placamae, cod_memoria1, cod_memoria2, cod_memoria3, cod_memoria4, cod_placadevideo, cod_armazenamento, cod_gabinete, cod_fonte) VALUES (:cod_processador, :cod_placamae, :cod_memoria1, :cod_memoria2, :cod_memoria3, :cod_memoria4, :cod_placadevideo, :cod_armazenamento, :cod_gabinete, :cod_fonte)");

        $stmt->bindParam(':cod_processador', $processador);
        $stmt->bindParam(':cod_placamae', $placamae);
        $stmt->bindParam(':cod_memoria1', $memoria1);
        $stmt->bindParam(':cod_memoria2', $memoria2);
        $stmt->bindParam(':cod_memoria3', $memoria3);
        $stmt->bindParam(':cod_memoria4', $memoria4);
        $stmt->bindParam(':cod_placadevideo', $placadevideo);
        $stmt->bindParam(':cod_armazenamento', $armazenamento);
        $stmt->bindParam(':cod_gabinete', $gabinete);
        $stmt->bindParam(':cod_fonte', $fonte);

        if($stmt->execute()){
            $cod_computador = $sql->lastInsertId();
            $cod_cliente = $_SESSION['Cod_Autenticacao'];
            $dataDeMontagem = date('Y/m/d');
            $stmt = $sql->prepare("INSERT INTO tb_computadores_montado (cod_computador, cod_cliente, data_montagem, valor_total) VALUES (:cod_computador, :cod_cliente, :data_montagem, :valor_total)");
            $stmt->bindParam(':cod_computador', $cod_computador);
            $stmt->bindParam(':cod_cliente', $cod_cliente);
            $stmt->bindParam(':data_montagem', $dataDeMontagem);
            $stmt->bindParam(':valor_total', $valorTotal);

            if($stmt->execute()){
                return true;
            }else{
                $_SESSION['Erro'] = "Um problema encontrado";
                return false;
            }
            return true;
        }else{
            $_SESSION['Erro'] = "Um problema encontrado";
            return false;
        }
    }
}