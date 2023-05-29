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
<div class="box-pc background-telas">
  <div class="row">
    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
      <div class="box-part-white text-center">
        <h1 class="text">Prefiro Montar</h1>
        <div class="text">
          <form class="form-outline mb-4" action="escolherPlacaMae" method="post">
            <label>Escolha o Processador</label>
            <select name="processador" id="peca">
              <?php foreach ($processadores as $processador): ?>
                <?php $preco = $computador->buscarMediaValor($processador['cod_produto']); ?>
                <option value="<?= $processador['cod_produto'] ?>"><?= $processador['nome'] ?>
                </option>
              <?php endforeach; ?>
            </select>
            <button type="submit">Escolher</button>
          </form>
        </div>
      </div>
      <div class="box-part-white text-center">
        <h1 class="text">IMPRIMIR COMPUTADOR ATÉ AGORA AQUI</h1>
        <div>
          teste teste teste
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12 box-part-white">
                <div id="produtos">

                </div>
    <div>
          <h1 id="preco"></h1>
        </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Funçao para carregar a foto do peça -->
<script>
    $(document).ready(function() {
        $('#peca').change(function() {
            var peca = $(this).val();
            buscarProdutos(peca);
        });
        var valor = $('#peca').val();
        buscarProdutos(valor);

        function buscarProdutos(peca) {
            $.ajax({
                url: 'php/carregarFoto.php',
                method: 'POST',
                data: { peca: peca },
                success: function(response) {
                    $('#produtos').html(response);
                }
            });
        }
    });
    $(document).ready(function() {
        $('#peca').change(function() {
            var peca = $(this).val();
            buscarProdutos(peca);
        });
        var valor = $('#peca').val();
        buscarProdutos(valor);

        function buscarProdutos(peca) {
            $.ajax({
                url: 'php/carregarPreco.php',
                method: 'POST',
                data: { peca: peca },
                success: function(response) {
                    $('#preco').html(response);
                }
            });
        }
    });
</script>