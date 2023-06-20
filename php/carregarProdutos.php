<?php
if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];

    $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
    if(isset($_POST['produto'])){
        $produto = $_POST['produto'];
        $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_produto = :cod_produto");
        $stmt->bindParam(':cod_produto', $produto);
    }else{
        $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_categorias = :categoria");
        $stmt->bindParam(':categoria', $categoria);
    }
    
    $stmt->execute();
    $peças = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<label class='form-label' for='Produto'>Produto</label>";
    echo "<select class='form-control' id='peca' name='codPeca'>";
    if(!isset($_POST['produto'])){
    echo "<option selected ></option>";
    }
    foreach ($peças as $peça) {
        echo '<option value=' . $peça['cod_produto'] . '>' . $peça['nome']. '</option>';
        // Exiba as informações adicionais do produto conforme necessário
    }
    echo "</select>";
    echo "<script>";
    echo "$(document).ready(function() {";
    echo "$('#peca').change(function() {";
        echo "var peca = $(this).val();";
        echo "buscarProdutos(peca);";
        echo " });";
        //isso so vai no editar
        if(isset($produto)){
        echo "var peca1 = {$produto};";
        echo "buscarProdutos(peca1);";
        echo "console.log(peca1);";
        }
        echo "function buscarProdutos(peca) {";
            echo "$.ajax({";
                echo "url: 'php/carregarFoto.php',";
                echo"method: 'POST',";
                echo "data: { peca: peca },";
                echo "success: function(response) {";
                    echo "$('#fotos').html(response);";
                    echo "}";
                    echo"});";
                    echo "}";
                    echo "});";
    echo "</script>";
}
?>
    
       

        
            
                
                
                
                
                    
                
            
        
    