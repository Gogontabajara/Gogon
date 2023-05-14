<?php
    require_once("../_app/Config.inc.php");

    // Dados da ediçao do cadastro
    $cod_cliente_pj = $_SESSION['Cod_cliente'];
    @$nome_fantasia = $_POST['nome_fantasia'];
    @$razão_social = $_POST['razaoSocial'];
    @$contato = $_POST['contato'];
    @$cnpj = $_POST['cnpj'];
    @$email = $_POST['email'];
    @$senha = $_POST['senha'];
    @$senhaRepetida = $_POST['senhaRepetida'];
    $usuario = new user();
    if($usuario->editarPerfilPj($cod_cliente_pj, $nome_fantasia, $razão_social, $contato, $cnpj, $email, $senha)){
        $_SESSION['Info'] = "Sucesso:";
        $_SESSION['Cod_cliente'] = $cod_cliente_pj;
        $_SESSION['nome_fantasia'] = $nome_fantasia;
        $_SESSION['razão_social'] = $razão_social;
        $_SESSION['contato'] = $contato;
        $_SESSION['cnpj'] = $cnpj;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header("Location: ../editarPerfilPj");
    }else {
        $_SESSION['Info'] = "Erro ao Editar o usuario";
        header("Location: ../editarPerfilPj");
    }
?>