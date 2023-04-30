<?php
    require_once("../_app/Config.inc.php");

    // Dados da ediçao do cadastro
    $cod_cliente_pf = $_SESSION['Cod_cliente'];
    @$cpf = @$_POST['cpf'];
    @$cnpj = @$_POST['cnpj'];
    @$razaoSocial = @$_POST['razaoSocial'];
    @$login = @$_POST['login'];
    @$nome = @$_POST['nome'];
    @$senha = @$_POST['senha'];
    @$senhaRepetida = @$_POST['senhaRepetida'];
    @$email = @$_POST['email'];
    @$contato = @$_POST['contato'];
    @$data_de_nascimento = @$_POST['dataNascimento'];
    $usuario = new user();
    if($usuario->editarPerfilPF($cod_cliente_pf, $nome, $cpf, $contato, $data_de_nascimento, $email, $senha)){
        $_SESSION['Info'] = "Sucesso:";
        $_SESSION['Cod_cliente'] = $cod_cliente_pf;
        $_SESSION['Nome'] = $nome;
        $_SESSION['Cpf'] = $cpf;
        $_SESSION['DataDeNascimento'] = $data_de_nascimento;
        $_SESSION['Email'] = $email;
        $_SESSION['Contato'] = $contato;
        header("Location: ../editarPerfilPF");
    }else {
        $_SESSION['Info'] = "Erro ao Editar o usuario";
        header("Location: ../editarPerfilPF");
    }




?>