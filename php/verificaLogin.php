<?php
    require_once("../_app/Config.inc.php");
   
    $username = @$_POST["email"];
    $senha = @$_POST["password"];
    $verifica = new autenticacao();
    if($verifica->realizarLogin($username,$senha)){
        $usuario = $verifica->loadById($verifica->getCodAutenticacao());
        //Salvar as informaçoes de login do usuario na sessao
        //Trocar as informaçoes dependendo do nivel do usuario

        $_SESSION['Cod_cliente'] = $usuario->getCodCliente();
        $_SESSION['Nome'] = $usuario->getNome();
        $_SESSION['Cpf'] = $usuario->getcpf();
        $_SESSION['Cnpj'] = $usuario->getcnpj();
        $_SESSION['Razao_Social'] = $usuario->getrazaoSocial();
        $_SESSION['DataDeNascimento'] = $usuario->getDataDeNascimento();
        $_SESSION['Email'] = $usuario->getEmail();
        $_SESSION['Contato'] = $usuario->getcontato();
        $_SESSION['Tipo'] = $usuario->getTipo();
        $_SESSION['Cod_Autenticacao'] = $usuario->getidAutenticacao();
        $_SESSION["logado"] = "true";
        header("Location: ../index");
        }
    else{
        $_SESSION['Info'] = "Erro de Login";
        header("Location: ../login");
    }