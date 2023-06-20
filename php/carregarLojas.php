<?php
spl_autoload_register(function ($class_name) {
    $filename = $class_name . ".class.php";
    if (file_exists($filename)) {
      require_once($filename);
    }
  });
if (isset($_POST['produto'])) {
    $peca = $_POST['produto'];
    $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
    $sqlpeca = $sql->query("SELECT * FROM tb_produtosclientepj
    INNER JOIN tb_pecas ON tb_pecas.cod_produto = tb_produtosclientepj.cod_pecas
    INNER JOIN tb_cliente_pj ON tb_cliente_pj.cod_cliente_pj = tb_produtosclientepj.cod_cliente_pj
    WHERE cod_pecas = $peca");
    $lojas = $sqlpeca->fetchAll(PDO::FETCH_ASSOC);
    echo "<div class='table-responsive'>
    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
        <thead>
            <tr>
                <th>Nome Fantasia</th>
                <th>cnpj</th>
                <th>Preço</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>";
    foreach ($lojas as $loja) {
    $nomeFantasia = $loja['nome_fantasia'];
    $cnpj = $loja['cnpj'];
    $preço = $loja['valor'];
    $cod_cliente = $loja['cod_cliente_pj'];
    $sqlpe = $sql->query("SELECT * FROM tb_cliente_pj 
    INNER JOIN tb_autenticacao ON tb_autenticacao.cod_autenticacao = tb_cliente_pj.cod_autenticacao 
    INNER JOIN tb_endereco ON tb_endereco.cod_autenticacao = tb_autenticacao.cod_autenticacao 
    WHERE cod_cliente_pj = $cod_cliente");
    $enderecos = $sqlpe->fetchAll(PDO::FETCH_ASSOC);
    echo "
        <tr>
            <td>$nomeFantasia</td>
            <td>$cnpj</td>
            <td>R$ $preço,00</td>";
            foreach ($enderecos as $endereco){
                $rua = $endereco['rua'];
                $numero = $endereco['numero'];
                $rua = str_replace(' ', '+', $rua);
                
                echo "<td><a href='https://www.google.com.br/maps/search/$rua+$numero/' target='_blank'><i class='link-primary fas fa-map-marker'></i></a></td>";
            }

        echo "</tr>";
    }
     echo "</tbody>
     </table>";
}
?>