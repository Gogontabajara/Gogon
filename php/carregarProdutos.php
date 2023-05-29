<?php
if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];

    $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
    $stmt = $sql->prepare("SELECT * FROM tb_pecas WHERE cod_categorias = :categoria");
    $stmt->bindParam(':categoria', $categoria);
    $stmt->execute();
    $peças = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<label class='form-label' for='categoria'>Categoria:</label>";
    echo "<select class='form-control' id='peca' name='codPeca'>";
    foreach ($peças as $peça) {
        echo '<option value=' . $peça['cod_produto'] . '>' . $peça['nome']. '</option>';
        // Exiba as informações adicionais do produto conforme necessário
    }
    echo "</select>";
}
?>