<?php
require_once('endereco.class.php');


    // Recupera os dados do formulário
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cod_autenticacao = $_SESSION['Cod_Autenticacao'];

    // Cria um novo objeto Endereco
    $endereco = new Endereco();

    // Chama o método para adicionar o endereço no banco de dados
    $result = $endereco->adicionarEndereco($cep, $rua, $numero, $complemento, $bairro, $cidade, $uf, $cod_autenticacao);

    // Verifica se a inserção foi realizada com sucesso
    if ($result) {
        echo 'Endereço adicionado com sucesso!';
    } else {
        echo 'Ocorreu um erro ao adicionar o endereço.';
    }