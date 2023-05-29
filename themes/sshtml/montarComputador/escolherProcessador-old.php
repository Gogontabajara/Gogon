<?php
spl_autoload_register(function ($class_name) {
  $filename = "php/" . $class_name . ".class.php";
  if (file_exists($filename)) {
    require_once($filename);
  }
});
$computador = new computador();
$processadores = $computador->selecionarProcessador();
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form class="form-outline mb-4" action="escolherPlacaMae" method="post">
  <label>Escolha o Processador</label>
  <select name="processador" id="processador">
    <?php foreach ($processadores as $processador): ?>
      <?php $preco = $computador->buscarMediaValor($processador['cod_produto']); ?>
      <option value="<?= $processador['cod_produto'] ?>"><?= 'R$ ' . $preco . ' ' . $processador['nome'] ?></option>
    <?php endforeach; ?>
  </select>
  <button type="submit">Escolher</button>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br>


<!-- Ignora -->
<div class="container py-5">
  <div class="row">
    <?php foreach ($processadores as $processador): ?>
      <?php $preco = $computador->buscarMediaValor($processador['cod_produto']); ?>
      <div class="col-md-3 col-lg-3 mb-3 mb-lg-0">
        <div class="card">
          <img src='img<?= @$processador['foto'] == null ? "\sem-foto.jpg" : $processador['foto'] ?>' class="card-img-top"
            alt="Laptop" />
          <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
              <h5 class="mb-0">
                <?= $processador['nome'] ?>
              </h5>
              <h5 class="text-dark mb-0">
                <?= 'R$' . $preco ?>
              </h5>
            </div>
            <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
              <a href="#!" class="text-dark fw-bold">Cancel</a>
              <button type="button" class="btn btn-success">Escolher</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>