<?php
// Codigo para carregar os computadores do usuario logado
if (isset($_SESSION['Cod_Autenticacao'])) {
    $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
    $stmt = $sql->query("SELECT * FROM tb_computadores_montado where cod_cliente = '$_SESSION[Cod_Autenticacao]'");
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $computador = new computador();
} else {
    header("Location: ../login");
}
?>
<div class="box-white">
    <h1 class="h1-purple" style="text-align: center;">Computadores Montados</h1>
    <div class="container">

        <?php
        //Codigo para verificar e colocar na tela caso aconteça um erro no sistema
        if (isset($_SESSION["Info"]) || isset($_SESSION["Erro"])) { ?>
            <div class="alert alert-<?php echo @$_SESSION['Type']; ?> alert-dismissible fade show" role="alert">
                <strong>
                    <?php echo @$_SESSION["Info"]; ?>
                </strong>
                <?php echo @$_SESSION["Erro"]; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION["Info"]);
            unset($_SESSION["Erro"]);
            unset($_SESSION['Type']);
        } ?>
        <div class="row">
        <?php foreach ($res as $id): ?>
            <div class="col-lg-6">
                <div class="box-part-purple-pc text-center">
                    <h4 class="text-white">Computador </h4>
                    <?php
                        $produtos = $computador->carregarComputadores($id['cod_computador']);
                        $valorTotal = 0;
                        foreach ($produtos as $produto): ?>
                            <div class="row text-white text-left">
                                <div class="col-lg-9 text-white">
                                    <?= $produto['nome'] ?>
                                </div>
                                <div class="col-lg-3">
                                    <?= "R$ " . $computador->buscarMediaValor($produto['cod_produto']) ?>
                                    <?php $valorTotal += $computador->buscarMediaValor($produto['cod_produto']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <br>
                        <div class="row text-purple text-center"
                            style="background-color:white; padding:10px 5px;margin:px 5px;">
                            <div class="col-lg-12">
                                Valor Total &nbsp; &nbsp;
                                <?= "R$ " . $valorTotal ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xl-6 col-md-12 mb-4">
                                <a href="php/apagarComputador.php?cod=<?= $id['cod_computador'] ?>"><button
                                        class="btn btn-danger btn-md btn-block btn-lg" type="submit">Apagar o
                                        computador</button></a>
                            </div>
                            <div class="col-xl-6 col-md-12 mb-4">
                                <a href="detalhesComputador?cod=<?= $id['cod_computador'] ?> "><button class="btn btn-success btn-md btn-block btn-lg"
                                        type="submit">Detalhes</button></a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach;
        if (!@$produtos) {
           include_once("themes/sshtml/vazio.php");
        }
        ?>
        </div>
    </div>
</div>