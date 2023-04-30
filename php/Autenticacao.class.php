<?php
@session_start();
//require_once("../_app/Config.inc.php");
class autenticacao{

    private $cod_autenticacao;
    private $email;
    private $senha;

    //Get Set
    public function getCodAutenticacao(){
        return $this->cod_autenticacao;
    }
    public function setCodAutenticacao($value){
        $this->cod_autenticacao = $value;
    }public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $value;
    }public function getSenha(){
        return $this->senha;
    }
    public function setSenha($value){
        $this->senha = $value;
    }

    //Fim

    //Verifica se o usuario ja esta logado
    public function verificarLogado(){
        if(isset($_SESSION["logado"])){
           header("Location: ../index");
           exit();
        }
     }
    //Fim
    
    //
    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_cliente_pf WHERE cod_autenticacao = :ID", array(
            ":ID"=>$id
        ));
        if (count($results) > 0) {
            $user = $results[0];
            return new user($user["cod_cliente_pf"],$user["cpf"],null,null,1,$user["nome"],$user["data_de_nascimento"],$user["email"],$user["contato"],$id);
        }else{
            $results = $sql->select("SELECT * FROM tb_cliente_pj WHERE cod_autenticacao = :ID", array(
            ":ID"=>$id
            ));
            if (count($results) > 0) {
                $user = $results[0];
                return new user($user["cod_cliente_pj"],null,$user["cnpj"],$user["razao_social"],2,$user["nome_fantasia"],null,$this->getEmail(),$user["contato"],$id);
            }
        }
    }

    //Codigo para realizar o login do usuario
    public function realizarLogin($login, $password){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_autenticacao WHERE email = :LOGIN AND senha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password,
        ));
        if (count($results) > 0) {
            $this->setData($results[0]);
            return true;
        } else {
            $_SESSION["Erro"] = "Usuario E/Ou senha incorretos";
            $_SESSION['Type'] = "danger";
            return false;
        }
    }
    //Fim

    //set nos dados da classe
    public function setData($data){
        $this->setEmail($data['email']);
        $this->setSenha($data['senha']);
        $this->setCodAutenticacao($data['cod_autenticacao']);
    }
}
?>