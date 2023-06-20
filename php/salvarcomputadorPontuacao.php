<?php
require_once("../_app/Config.inc.php");
if(isset($_GET['codpergunta'])){
    $pontuacao = $_GET['codpergunta'];
    $computador = new computador();
    $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
    $stmt = $sql->query("SELECT * FROM tb_perfisprontos where pontuaçao >= $pontuacao LIMIT 1");
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultados as $produto):
        $cod = $produto['pontuaçao'];
    endforeach;
    $maquinas = $computador->carregarPerfil($cod);
        
    if ($cod == 80) {
        $processador = $maquinas[0]['cod_produto'];
        $placamae = $maquinas[1]['cod_produto'];
        $memoria1 = $maquinas[2]['cod_produto'];
        $armazenamento = $maquinas[3]['cod_produto'];
        $gabinete = $maquinas[4]['cod_produto'];
        $fonte = $maquinas[5]['cod_produto'];
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
                header("Location: ../computadoresMontados");
            }
        }else{
            $_SESSION['Erro'] = "Um problema encontrado";
            header("Location: ../computadoresMontados");
        }
    }
    if ($cod >= 120) {
        $processador = $maquinas[0]['cod_produto'];
        $placamae = $maquinas[1]['cod_produto'];
        $memoria1 = $maquinas[2]['cod_produto'];
        $placadevideo = $maquinas[3]['cod_produto'];
        $armazenamento = $maquinas[4]['cod_produto'];
        $gabinete = $maquinas[5]['cod_produto'];
        $fonte = $maquinas[6]['cod_produto'];
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
 }else{
  header("Location: ../computadoresMontados");
}

?>