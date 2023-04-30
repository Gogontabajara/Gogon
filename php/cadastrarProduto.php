<?php 

// receber informações do formulário
$marca = $_POST['marca'];
$categoria = $_POST['categoria'];
$modelo = $_POST['modelo'];
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

// verificar se um arquivo foi enviado
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    // salvar a foto em um diretório
    $foto = 'fotos/' . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
} else {
    $foto = null;
}

// criar uma instância da classe Produto
$produto = new Produto();

// chamar o método criar() da classe Produto
if ($produto->criar($marca, $categoria, $modelo, $nome, $quantidade, $descricao, $preco, $foto)) {
    echo 'Produto cadastrado com sucesso!';
} else {
    echo 'Erro ao cadastrar produto!';
}

?>