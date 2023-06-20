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

<h1 class="h1-purple text-center">Computadores montados</h1>
<div class="container">
<?php
    //Codigo para verificar e colocar na tela caso aconteça um erro no sistema
    if(isset($_SESSION["Info"]) || isset($_SESSION["Erro"])){?>
    <div class="alert alert-<?php echo @$_SESSION['Type'];?> alert-dismissible fade show" role="alert">
    <strong><?php echo @$_SESSION["Info"];?></strong> <?php echo @$_SESSION["Erro"]; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
<?php unset($_SESSION["Info"]); unset($_SESSION["Erro"]); unset($_SESSION['Type']);}?>
<?php
foreach ($res as $id):
    $produtos = $computador->carregarComputadores($id['cod_computador']);
    $valorTotal = 0;
    foreach ($produtos as $produto):?> 




        <div class="card mt-2">
            <div class="row">
                    <div class="col-lg-3 col-md-12 col-12 d-flex justify-content-center">
                        <div class="img-square-wrapper">
                            <img src="img<?=$produto['foto']?>" class = "img-pc d-block mx-lg-auto img-fluid" alt="pc" width="150" height="150" loading="lazy">
                        </div>
                        </div>
                    <div class="col-lg-6 col-md-12 col-12 d-flex justify-content-center">
                        <div class="card-body" style="text-align: center; justify-content: center; align-items: center; display: flex;">
                            <h4 class="card-title"><?=$produto['nome']?></h4>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-12 d-flex justify-content-center">
                        <div class="card-body">
                            <h4 class="card-title">Valor</h4>
                            <p class="card-text"><?="R$ ".$computador->buscarMediaValor($produto['cod_produto'])?></p>
                            <?php $valorTotal += $computador->buscarMediaValor($produto['cod_produto']);?>
                        </div>
                    </div>
            </div>
        </div>
        <?php endforeach;?>
        <div class="card mt-2">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-12 d-flex justify-content-center">
                        <div class="card-body" style="text-align: center; justify-content: start; align-items: center; display: flex;">
                            <h4 class="card-title">Valor Total</h4>
                            <p class="card-text"></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-12 d-flex justify-content-center">
                        <div class="card-body">
                            <h4 class="card-title">Valor</h4>
                            <p class="card-text"><?="R$ ".$valorTotal?></p>
                        </div>
                    </div>
                </div>
            </div>
        <div class="container mt-2">
            <div class="row">
			    <div class="col-xl-6 col-md-12 mb-4">
				    <a href="php/apagarComputador.php?cod=<?=$id['cod_computador']?>"><button class="btn btn-danger btn-md btn-block btn-lg" type="submit">Apagar o computador</button></a>
			    </div>
                <div class="col-xl-6 col-md-12 mb-4">
				    <a href="montarComputador"><button class="btn btn-danger btn-md btn-block btn-lg" type="submit">Retornar</button></a>
			    </div>
		    </div>
        </div>
<?php endforeach;
if(!@$produtos){
    include_once("themes/sshtml/vazio.php");
}

?>
</div>