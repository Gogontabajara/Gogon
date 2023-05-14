<?php
require_once("../_app/Config.inc.php");

// Dados do cadastro
@$cpf = @$_POST['cpf'];
@$cnpj = @$_POST['cnpj'];
@$razaoSocial = @$_POST['razaoSocial'];
@$login = @$_POST['login'];
@$nome = @$_POST['nome'];
@$senha = @$_POST['senha'];
@$senhaRepetida = @$_POST['senhaRepetida'];
@$email = @$_POST['email'];
@$contato = @$_POST['contato'];
@$dataNascimento = @$_POST['dataNascimento'];


//$usuario->salvarNoBancoPj()
//$usuario->salvarNoBancoPF()

if ($cnpj) {
     $usuario = new User(null, null, $cnpj, $razaoSocial, null, $nome, null, $email, $contato, $senha);
     if($usuario->verificarCnpj($cnpj)){
          if($usuario->verificaEmail($email)){
               if ($usuario->salvarNoBancoAutenticacao($email,$senha)) {
                    $idAutenticacao = $usuario->getidAutenticacao();
                    if($usuario->salvarNoBancoPj($nome,$razaoSocial,$cnpj,$contato,$idAutenticacao)){
                         $_SESSION['Info'] = "Usuario cadastrado com sucesso";
                         $_SESSION['Type'] = "success";
                         header("Location: ../login");
                    }else{header("Location: ../criarContaPJ");}
               }else{
                    $_SESSION['Info'] = "Erro ao cadastrar o usuario";
                    header("Location: ../criarContaPJ");   
               }
          }else {
               $_SESSION['Info'] = "Erro ao cadastrar o usuario";
               header("Location: ../criarContaPJ");
          }
     }else{
          $_SESSION['Info'] = "Erro ao cadastrar o usuario";
          header("Location: ../criarContaPJ");
     }
} else if ($cpf) {
     $usuario = new User(null, $cpf, null, null, null, $nome, $dataNascimento, $email, $contato, $senha);
     if($usuario->verificarCpf($cpf)){
          if($usuario->verificaEmail($email)){
               if ($usuario->salvarNoBancoAutenticacao($email,$senha)) {
                    $idAutenticacao = $usuario->getidAutenticacao();
                    if($usuario->salvarNoBancoPf($nome,$dataNascimento, $contato, $cpf, $idAutenticacao)){
                         $_SESSION['Info'] = "Usuario cadastrado com sucesso";
                         $_SESSION['Type'] = "success";
                         header("Location: ../login");
                    }else{header("Location: ../criarContaPF");}
               }else{
                    $_SESSION['Info'] = "Erro ao cadastrar o usuario";
                    header("Location: ../criarContaPF");   
               }
          }else {
               $_SESSION['Info'] = "Erro ao cadastrar o usuario";
               header("Location: ../criarContaPF");
          }
     }else{
          $_SESSION['Info'] = "Erro ao cadastrar o usuario";
          header("Location: ../criarContaPF");
     }
} else {
     $_SESSION['Info'] = "Erro ao cadastrar o usuario";
     header("Location: ../criarContaPF");
}
