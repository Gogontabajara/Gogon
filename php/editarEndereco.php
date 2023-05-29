<?php
require_once('endereco.class.php');


// Recupera os dados do formulário
$id = $_POST['id'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

// Cria um novo objeto Endereco
$endereco = new Endereco();

// Chama o método para adicionar o endereço no banco de dados
$result = $endereco->editarEndereco($id, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf);

// Verifica se a inserção foi realizada com sucesso
if ($result) {
    echo 'Endereço editado com sucesso!';
} else {
    echo 'Ocorreu um erro ao editar o endereço.';
}
?>