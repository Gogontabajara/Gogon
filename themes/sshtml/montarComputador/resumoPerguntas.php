<?php
if(isset($_GET['pontuaçao4'])){
	$_SESSION['pontuaçao'] += $_GET['pontuaçao4'];
    $pontuaçao = $_SESSION['pontuaçao'];

    //Crio uma instancia da classe computador para usar suas funçoes usando $computador->funçao(parametros)
    $computador = new computador();
    if(!$produtos = $computador->carregarPerfil($pontuaçao)){
        header("Location: montarComputador");
    }
}else{
	header("Location: pergunta4");
}
?>
	<h1 class="h1-purple text-center">Computador Escolhido</h1>
	<p style="text-align: center; margin:5px 250px 10px 250px;">Com base nas informações e preferências fornecidas, realizamos uma análise cuidadosa e selecionamos cuidadosamente o computador que consideramos ideal para você.</p>
	<div class="container">
    <div class="row">
        <?php $valorTotal = 0;
            foreach ($produtos as $produto):?>
            <div class="col-lg-6">
            <div class="card mt-2">
                <div class="row">
                        <div class="col-lg-2 col-md-12 col-12 d-flex justify-content-center">
                            <div class="img-square-wrapper" style="text-align: center; justify-content: center; align-items: center; display: flex;">
                                <img src="img<?=$produto['foto']?>" class = "img-pc d-block mx-lg-auto img-fluid" alt="pc" width="150" height="150" loading="lazy">
                            </div>
                            </div>
                        <div class="col-lg-6 col-md-12 col-12 d-flex justify-content-center">
                            <div class="card-body" style="text-align: center; justify-content: center; align-items: center; display: flex;">
                                <h6 class="card-title"><?=mb_strimwidth($produto['nome'], 0, 40, "...")?></h6>
                                <p class="card-text"></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12 d-flex justify-content-center">
                            <div class="card-body" style="text-align: center; justify-content: center; align-items: center; display: flex;">
                                <h5 class="card-title"><?="R$ ".$computador->buscarMediaValor($produto['cod_produto'])?></h5>
                                <?php $valorTotal += $computador->buscarMediaValor($produto['cod_produto']);?>
                            </div>
                        </div>
                </div>
            </div>
            </div>
            <?php endforeach;?>
            </div>
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
                            <h4 class="card-text"><?="R$ ".$valorTotal?></h4>
                        </div>
                    </div>
                </div>
            </div>
	    </div>
        <div class="container mt-2">
            <div class="row">
            <?php if (@$_SESSION["logado"] == "true") { ?>
			    <div class="col-xl-6 col-md-12 mb-4">
				    <a href="php/salvarcomputadorPontuacao.php?codpergunta=<?=$pontuaçao?>"><button class="btn btn-success btn-md btn-block btn-lg" type="submit">Salvar Computador</button></a>
			    </div>
                <?php }?>
                <div class="col-xl-6 col-md-12 mb-4">
				    <a href="montarComputador"><button class="btn btn-danger btn-md btn-block btn-lg" type="submit">Retornar</button></a>
			    </div>
		    </div>
        </div>
        
