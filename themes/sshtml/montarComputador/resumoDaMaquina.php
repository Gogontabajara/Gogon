<?php
if (@$_POST['fonte'] == "") {
  $_SESSION['Info'] = "Erro começe denovo";
  $_SESSION['Type'] = "danger";
  header("Location: escolherFonte");
}
$_SESSION['maquina']['fonte'] = @$_POST['fonte'];

$computador = new computador();
$produtos = $computador->carregarResumo();
?>
    <div class="container">
      <h1 class="h1-purple text-center">Resumo da Maquina</h1>
      <div class="row">
      <?php $valorTotal = 0;
      foreach ($produtos as $produto) : ?>
      <div class="col-lg-6">
        <div class="card mt-2">
          <div class="row">
            <div class="col-lg-3 col-md-12 col-12 d-flex justify-content-center">
              <div class="img-square-wrapper">
                <img src="img<?= $produto['foto'] ?>" class="img-pc d-block mx-lg-auto img-fluid" alt="pc" width="150" height="150" loading="lazy">
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 d-flex justify-content-center">
              <div class="card-body" style="text-align: center; justify-content: center; align-items: center; display: flex;">
                <h6 class="card-title"><?= mb_strimwidth($produto['nome'], 0, 50, "...") ?></h6>
                <p class="card-text"></p>
              </div>
            </div>
            <div class="col-lg-3 col-md-12 col-12 d-flex justify-content-center">
              <div class="card-body" style="text-align: center; justify-content: center; align-items: center; display: flex;">
                <h5 class="card-title"><?= "R$ " . $computador->buscarMediaValor($produto['cod_produto']) ?></h5>
                <?php $valorTotal += $computador->buscarMediaValor($produto['cod_produto']); ?>
              </div>
            </div>
          </div>
        </div>
        </div>
      <?php endforeach; ?>
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
              <h5 class="card-text"><?= "R$ " . $valorTotal ?></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="container mt-2">
        <div class="row">
          <div class="col-xl-6 col-md-12 mb-4">
            <?php if (@$_SESSION["logado"] == "true") { ?>
              <a href="php/salvarComputador.php"><button class="btn btn-success btn-md btn-block btn-lg" type="submit">Salvar Computador</button></a>
            <?php } ?>
          </div>
          <div class="col-xl-6 col-md-12 mb-4">
            <a href="montarComputador"><button class="btn btn-danger btn-md btn-block btn-lg" type="submit">Retornar</button></a>
          </div>
        </div>
      </div>
    </div>