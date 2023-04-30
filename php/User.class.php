<?php
    require_once("../_app/Config.inc.php");

class User{

    private $cod_cliente;
    private $tipo;
    private $cpf;
    private $cnpj;
    private $razaoSocial;
    private $nome;
    private $data_de_nascimento;
    private $email;
    private $contato;
    private $senha;
    private $idAutenticacao;

    public function __construct($cod_cliente = null,$cpf=null,$cnpj=null,$razaoSocial=null,$tipo = null,$nome = null,$data_de_nascimento = null,$email = null,$contato = null, $idAutenticacao = null){
        $this->setCodCliente($cod_cliente);
        $this->setcpf($cpf);
        $this->setcnpj($cnpj);
        $this->setrazaoSocial($razaoSocial);
        $this->setTipo($tipo);
        $this->setNome($nome);
        $this->setDataDeNascimento($data_de_nascimento);
        $this->setEmail($email);
        $this->setContato($contato);
        $this->setidAutenticacao($idAutenticacao);
    }

    public function getidAutenticacao(){
        return $this->idAutenticacao;
    }
    public function setidAutenticacao($value){
        $this->idAutenticacao = $value;
    }

    public function getCodCliente(){
        return $this->cod_cliente;
    }
    public function setCodCliente($value){
        $this->cod_cliente = $value;
    }

    public function getcpf(){
        return $this->cpf;
    }
    public function setcpf($value){
        $this->cpf = $value;
    }

    public function getcnpj(){
        return $this->cnpj;
    }
    public function setcnpj($value){
        $this->cnpj = $value;
    }

    public function getrazaoSocial(){
        return $this->razaoSocial;
    }
    public function setrazaoSocial($value){
        $this->razaoSocial = $value;
    }

    public function getTipo(){
        return $this->tipo;
    }
    public function setTipo($value){
        $this->tipo = $value;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($value){
        $this->nome = $value;
    }

    public function getDataDeNascimento(){
        return $this->data_de_nascimento;
    }
    public function setDataDeNascimento($value){
        $this->data_de_nascimento = $value;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $value;
    }

    public function getcontato(){
        return $this->contato;
    }
    public function setContato($value){
        $this->contato = $value;
    }

    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($value){
        $this->senha = $value;
    }

    //CARREGA O USUARIO DO TIPO FISICO
    public function loadByIdPf($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_cliente_pf WHERE cod_cliente_pf = :ID", array(
            ":ID"=>$id
        ));
        if (count($results[0]) > 0) {
            $this->setData($results[0]);
            return $results[0];
        }
    }
    //CARREGA O USUARIO DO TIPO JURIDICO
    public function loadByIdPJ($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_cliente_pj WHERE cod_cliente_pj = :ID", array(
            ":ID"=>$id
        ));
        if (count($results[0]) > 0) {
            $this->setData($results[0]);
            return $results[0];
        }
    }
//Funçao que verifica se ja existe um cnpj no Banco de dados
    public function verificarCnpj($cnpj){
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $sqlcnpj = $sql->prepare("SELECT cnpj FROM tb_cliente_pj WHERE cnpj = :cnpj");
        $sqlcnpj->bindParam(':cnpj', $cnpj);
        $sqlcnpj -> execute();
        $res = $sqlcnpj->fetchAll(PDO::FETCH_ASSOC);
        $registros = @count($res);
        if ($registros > 0) {
            $_SESSION['Erro'] = "CNPJ: " . $cnpj . ' já existe!!!';
            return false;
        }else{
            return true;
        }
    }
    //Funçao que verifica se ja existe um cpf no Banco de dados
    public function verificarCpf($cpf){
        //Verifica se o cnpj ja existe
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $sqlcpf = $sql->prepare("SELECT cpf FROM tb_cliente_pf WHERE cpf = :cpf");
        $sqlcpf->bindParam(':cpf', $cpf);
        $sqlcpf -> execute();
        $res = $sqlcpf->fetchAll(PDO::FETCH_ASSOC);
        $registros = @count($res);
        if ($registros > 0) {
            $_SESSION['Erro'] = "CPF: " . $cpf . ' já existe!!!';
            return false;
        }else{
            return true;
        }
    }
    //Funçao que verifica se ja existe um email no Banco de dados
    public function verificaEmail($email){
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $sqlemail = $sql->prepare("SELECT email FROM tb_autenticacao WHERE email = :email");
        $sqlemail->bindParam(':email', $email);
        $sqlemail -> execute();
        $res = $sqlemail->fetchAll(PDO::FETCH_ASSOC);
        $registros = @count($res);
        if ($registros > 0) {
            $_SESSION['Erro'] = "Email: " . $email . ' já existe!!!';
            return false;
        }else {
            return true;
        }
    }
    //SALVA No Banco a autenticaçao do usuario
    public function salvarNoBancoAutenticacao($email,$senha){
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("INSERT INTO tb_autenticacao (email, senha) VALUES (:email, :senha)");

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        if($stmt->execute()){
            $this->setidAutenticacao($sql->lastInsertId());
            return true;
        }else{
            $_SESSION['Erro'] = "Um problema encontrado";
            return false;
        }
    }
    //SALVA O USUARIO DO TIPO JURIDICO
    public function salvarNoBancoPJ($nome_fantasia, $razao_social, $cnpj, $contato, $cod_autenticacao){
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("INSERT INTO tb_cliente_pj (nome_fantasia, razão_social, cnpj, contato, cod_autenticacao) VALUES (:nome_fantasia, :razao_social, :cnpj, :contato, :cod_autenticacao)");

        $stmt->bindParam(':nome_fantasia', $nome_fantasia);
        $stmt->bindParam(':razao_social', $razao_social);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':contato', $contato);
        $stmt->bindParam(':cod_autenticacao', $cod_autenticacao);

        if($stmt->execute()){
            return true;
        }else{
            $_SESSION['Erro'] = "Um problema encontrado";
            return false;
        }

    }
    //SALVA O USUARIO DO TIPO FISICO
    public function salvarNoBancoPf($nome,$data,$contato,$cpf,$idAutenticacao){
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->prepare("INSERT INTO tb_cliente_pf (nome, data_de_nascimento, contato, cpf, cod_autenticacao) VALUES (:nome, :data_de_nascimento, :contato, :cpf, :cod_autenticacao)");

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_de_nascimento', $data);
        $stmt->bindParam(':contato', $contato);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':cod_autenticacao', $idAutenticacao);
        if($stmt->execute()){
            return true;
        }else{
            $_SESSION['Erro'] = "Um problema encontrado";
            return false;
        }
    }
    //EDITAR O USUARIO DO TIPO JURIDICO
    public function editarPerfilPJ($cod_cliente_pj, $nome_fantasia, $razao_social, $cnpj, $contato) {
            $sql = new Sql();
            // Prepara a query SQL
            $stmt = $sql->prepare("UPDATE tb_cliente_pj SET nome_fantasia = :nome_fantasia, razão_social = :razao_social, cnpj = :cnpj, contato = :contato WHERE cod_cliente_pj = :cod_cliente_pj");
    
            $stmt->bindParam(':cod_cliente_pj', $cod_cliente_pj);
            $stmt->bindParam(':nome_fantasia', $nome_fantasia);
            $stmt->bindParam(':razao_social', $razao_social);
            $stmt->bindParam(':cpf', $cnpj);
            $stmt->bindParam(':contato', $contato);
    
            $resultado_cliente = $stmt->execute();
    
            $stmt = $sql->prepare("UPDATE tb_autenticacao SET email = :email, senha = :senha WHERE cod_autenticacao = (SELECT cod_autenticacao FROM tb_cliente_pj WHERE cod_cliente_pj = :cod_cliente_pj)");
    
            // Define os valores dos parâmetros com bindParam
            $stmt->bindParam(':cod_cliente_pj', $cod_cliente_pj);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
    
            $resultado_autenticacao = $stmt->execute();
    
            // Verifica se as atualizações foram bem-sucedidas
            if ($resultado_cliente && $resultado_autenticacao) {
                return true;
            } else {
                return false;
            }
        }
    
    //APAGAR O USUARIO DO TIPO JURIDICO
    public function excluirClientePJ($cod_cliente_pj) {
            // Deletar a autenticação do cliente em tb_autenticacao
            $sql = new Sql();
            $stmt = $sql->prepare("DELETE FROM tb_autenticacao WHERE cod_autenticacao = (SELECT cod_autenticacao FROM tb_cliente_pj WHERE cod_cliente_pj = :cod_cliente_pj)");
            $stmt->bindParam(":cod_cliente_pj", $cod_cliente_pj);
            $resultado_cliente = $stmt->execute();
    
            // Deletar o cliente em tb_cliente_pf
            $stmt = $sql->prepare("DELETE FROM tb_cliente_pj WHERE cod_cliente_pj = :cod_cliente_pj");
            $stmt->bindParam(":cod_cliente_pj", $cod_cliente_pj);
            $resultado_autenticacao = $stmt->execute();
    
            // Verifica se as modificaçoes foram bem-sucedidas
            if ($resultado_cliente && $resultado_autenticacao) {
                return true;
            } else {
                return false;
            }
        }


    //EDITAR O USUARIO DO TIPO FISICO
    public function editarPerfilPF($cod_cliente_pf, $nome, $cpf, $contato, $data_de_nascimento, $email, $senha) {
        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        // Prepara a query SQL
        $stmt = $sql->prepare("UPDATE tb_cliente_pf SET nome = :nome, cpf = :cpf, contato = :contato, data_de_nascimento = :data_nascimento WHERE cod_cliente_pf = :cod_cliente_pf");

        $stmt->bindParam(':cod_cliente_pf', $cod_cliente_pf);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':contato', $contato);
        $stmt->bindParam(':data_nascimento', $data_de_nascimento);

        $resultado_cliente = $stmt->execute();

        $stmt = $sql->prepare("UPDATE tb_autenticacao SET email = :email, senha = :senha WHERE cod_autenticacao = (SELECT cod_autenticacao FROM tb_cliente_pf WHERE cod_cliente_pf = :cod_cliente_pf)");

        // Define os valores dos parâmetros com bindParam
        $stmt->bindParam(':cod_cliente_pf', $cod_cliente_pf);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        $resultado_autenticacao = $stmt->execute();

        // Verifica se as atualizações foram bem-sucedidas
        if ($resultado_cliente && $resultado_autenticacao) {
            $_SESSION['Erro'] = "Usuario editado";
            $_SESSION['Type'] = "success";
            return true;
        } else {
            $_SESSION['Erro'] = "Um problema encontrado:";
            $_SESSION['Type'] = "danger";
            return false;
        }
    }
    //APAGAR O USUARIO DO TIPO FISICO
    function excluirClientePF($cod_cliente_pf) {
        // Deletar a autenticação do cliente em tb_autenticacao
        $sql = new Sql();
        $stmt = $sql->prepare("DELETE FROM tb_autenticacao WHERE cod_autenticacao = (SELECT cod_autenticacao FROM tb_cliente_pf WHERE cod_cliente_pf = :cod_cliente_pf)");
        $stmt->bindParam(":cod_cliente_pf", $cod_cliente_pf);
        $resultado_cliente = $stmt->execute();

        // Deletar o cliente em tb_cliente_pf
        $stmt = $sql->prepare("DELETE FROM tb_cliente_pf WHERE cod_cliente_pf = :cod_cliente_pf");
        $stmt->bindParam(":cod_cliente_pf", $cod_cliente_pf);
        $resultado_autenticacao = $stmt->execute();

        // Verifica se as modificaçoes foram bem-sucedidas
        if ($resultado_cliente && $resultado_autenticacao) {
            return true;
        } else {
            return false;
        }
    }


    public function setData($data){

        $this->setCodCliente($data['cod_cliente']);
        $this->setTipo($data['tipo']);
        $this->setNome($data['nome']);
        $this->setEmail($data['email']);
        $this->setSenha($data['senha']);
        $this->setContato($data['contato']);
        $this->setDataDeNascimento($data['data_de_nascimento']);

    }

}
?>