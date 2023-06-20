<?php
require_once("../_app/Config.inc.php");
$sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
$stmt = $sql->query("SELECT * FROM tb_computadores_montado where cod_cliente = 35");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$computador = new computador();

if(isset($_GET['computador'])){
    $com = $_GET['computador'];
    if($com == 0){
        $produtos = $computador->carregarComputadores($results[0]['cod_computador']);
        $processador = $produtos[0]['cod_produto'];
        $placamae = $produtos[1]['cod_produto'];
        $memoria1 = $produtos[2]['cod_produto'];
        $placadevideo = $produtos[3]['cod_produto'];
        $armazenamento = $produtos[4]['cod_produto'];
        $gabinete = $produtos[5]['cod_produto'];
        $fonte = $produtos[6]['cod_produto'];
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("INSERT INTO tb_computador (cod_processador, cod_placamae, cod_memoria1, cod_placadevideo, cod_armazenamento, cod_gabinete, cod_fonte) VALUES (:cod_processador, :cod_placamae, :cod_memoria1, :cod_placadevideo, :cod_armazenamento, :cod_gabinete, :cod_fonte)");

        $stmt->bindParam(':cod_processador', $processador);
        $stmt->bindParam(':cod_placamae', $placamae);
        $stmt->bindParam(':cod_memoria1', $memoria1);
        $stmt->bindParam(':cod_placadevideo', $placadevideo);
        $stmt->bindParam(':cod_armazenamento', $armazenamento);
        $stmt->bindParam(':cod_gabinete', $gabinete);
        $stmt->bindParam(':cod_fonte', $fonte);

        if($stmt->execute()){
            $cod_computador = $sql->lastInsertId();
            $cod_cliente = $_SESSION['Cod_Autenticacao'];
            $dataDeMontagem = date('Y/m/d');
            $stmt = $sql->prepare("INSERT INTO tb_computadores_montado (cod_computador, cod_cliente, data_montagem) VALUES (:cod_computador, :cod_cliente, :data_montagem)");
            $stmt->bindParam(':cod_computador', $cod_computador);
            $stmt->bindParam(':cod_cliente', $cod_cliente);
            $stmt->bindParam(':data_montagem', $dataDeMontagem);

            if($stmt->execute()){
                header("Location: ../computadoresMontados");
            }else{
                $_SESSION['Erro'] = "Um problema encontrado";
                header("Location: ../computadoresMontados");
            }
        }else{
            $_SESSION['Erro'] = "Um problema encontrado";
            header("Location: ../computadoresMontados");
        }
    }
    if ($com == 1) {
        $produtos = $computador->carregarComputadores($results[1]['cod_computador']);
        $processador = $produtos[0]['cod_produto'];
        $placamae = $produtos[1]['cod_produto'];
        $memoria1 = $produtos[2]['cod_produto'];
        $memoria2 = $produtos[3]['cod_produto'];
        $placadevideo = $produtos[4]['cod_produto'];
        $armazenamento = $produtos[5]['cod_produto'];
        $gabinete = $produtos[6]['cod_produto'];
        $fonte = $produtos[7]['cod_produto'];
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("INSERT INTO tb_computador (cod_processador, cod_placamae, cod_memoria1, cod_memoria2, cod_placadevideo, cod_armazenamento, cod_gabinete, cod_fonte) VALUES (:cod_processador, :cod_placamae, :cod_memoria1, :cod_memoria2, :cod_placadevideo, :cod_armazenamento, :cod_gabinete, :cod_fonte)");

        $stmt->bindParam(':cod_processador', $processador);
        $stmt->bindParam(':cod_placamae', $placamae);
        $stmt->bindParam(':cod_memoria1', $memoria1);
        $stmt->bindParam(':cod_memoria2', $memoria2);
        $stmt->bindParam(':cod_placadevideo', $placadevideo);
        $stmt->bindParam(':cod_armazenamento', $armazenamento);
        $stmt->bindParam(':cod_gabinete', $gabinete);
        $stmt->bindParam(':cod_fonte', $fonte);

        if($stmt->execute()){
            $cod_computador = $sql->lastInsertId();
            $cod_cliente = $_SESSION['Cod_Autenticacao'];
            $dataDeMontagem = date('Y/m/d');
            $stmt = $sql->prepare("INSERT INTO tb_computadores_montado (cod_computador, cod_cliente, data_montagem) VALUES (:cod_computador, :cod_cliente, :data_montagem)");
            $stmt->bindParam(':cod_computador', $cod_computador);
            $stmt->bindParam(':cod_cliente', $cod_cliente);
            $stmt->bindParam(':data_montagem', $dataDeMontagem);

            if($stmt->execute()){
                header("Location: ../computadoresMontados");
            }else{
                $_SESSION['Erro'] = "Um problema encontrado";
                header("Location: ../computadoresMontados");
            }
        }else{
            $_SESSION['Erro'] = "Um problema encontrado";
            header("Location: ../computadoresMontados");
        }
        
    }
    if ($com == 2) {
        $produtos = $computador->carregarComputadores($results[2]['cod_computador']);
            $processador = $produtos[0]['cod_produto'];
            $placamae = $produtos[1]['cod_produto'];
            $memoria1 = $produtos[2]['cod_produto'];
            $armazenamento = $produtos[3]['cod_produto'];
            $gabinete = $produtos[4]['cod_produto'];
            $fonte = $produtos[5]['cod_produto'];
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("INSERT INTO tb_computador (cod_processador, cod_placamae, cod_memoria1, cod_armazenamento, cod_gabinete, cod_fonte) VALUES (:cod_processador, :cod_placamae, :cod_memoria1, :cod_armazenamento, :cod_gabinete, :cod_fonte)");

        $stmt->bindParam(':cod_processador', $processador);
        $stmt->bindParam(':cod_placamae', $placamae);
        $stmt->bindParam(':cod_memoria1', $memoria1);
        $stmt->bindParam(':cod_armazenamento', $armazenamento);
        $stmt->bindParam(':cod_gabinete', $gabinete);
        $stmt->bindParam(':cod_fonte', $fonte);

        if($stmt->execute()){
            $cod_computador = $sql->lastInsertId();
            $cod_cliente = $_SESSION['Cod_Autenticacao'];
            $dataDeMontagem = date('Y/m/d');
            $stmt = $sql->prepare("INSERT INTO tb_computadores_montado (cod_computador, cod_cliente, data_montagem) VALUES (:cod_computador, :cod_cliente, :data_montagem)");
            $stmt->bindParam(':cod_computador', $cod_computador);
            $stmt->bindParam(':cod_cliente', $cod_cliente);
            $stmt->bindParam(':data_montagem', $dataDeMontagem);

            if($stmt->execute()){
                header("Location: ../computadoresMontados");
            }else{
                $_SESSION['Erro'] = "Um problema encontrado";
                header("Location: ../index");
            }
        }else{
            $_SESSION['Erro'] = "Um problema encontrado";
            header("Location: ../index");
        }
    }
    

}else{

}
?>