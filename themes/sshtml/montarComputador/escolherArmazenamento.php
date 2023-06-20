<?php
if (@$_POST['placadevideo'] == "0") {
  $_SESSION['Info'] = "Erro começe denovo";
  $_SESSION['Type'] = "danger";
  header("Location: escolherPlacaDevideo");
}
if ($_POST['placadevideo'] == 1) {
  unset($_SESSION['maquina']['placadevideo']);
}
$_SESSION['maquina']['placadevideo'] = @$_POST['placadevideo'];
$computador = new computador();
$armazenamentos = $computador->selecionarArmazenamento();

$idPlacaMae = $_SESSION['maquina']['placamae'];
$carregar = $computador->loadbyid($idPlacaMae);
$tipo_Mem = $carregar[0]['campat_nvme'];

?>
<div class="container">
  <!-- Tratamento de erro -->
  <?php if (isset($_SESSION["Info"]) || isset($_SESSION["Erro"])) { ?>
    <div class="alert alert-<?php echo @$_SESSION['Type']; ?> alert-dismissible fade show" role="alert">
      <strong><?php echo @$_SESSION["Info"]; ?></strong> <?php echo @$_SESSION["Erro"]; ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php unset($_SESSION["Info"]);
    unset($_SESSION["Erro"]);
    unset($_SESSION['Type']);
  } ?>
  <!-- Fim tratamento de erro -->
  <div class="row">
    <div class="col-xl-12 col-md-12">
      <div class="box-escolha-purple text">
        <div class="h3-white text-center">Escolha o Armazenamento</div>
        <form class="form-outline col-lg-11 mb-2 text-center" id="form" action="escolherGabinete" method="post" style="margin: 10px 50px 10px!important;">
          <select class="form-control" name="armazenamento" id="peca">
            <option value="0">Selecione uma Opção</option>
            <hr class="line">
            <?php foreach ($armazenamentos as $armazenamento) : ?>
              <?php 
                if($tipo_Mem == 0 and $armazenamento['campat_nvme'] == 1){ continue;}
                $preco = $computador->buscarMediaValor($armazenamento['cod_produto']); 
              ?>
              <option value="<?= $armazenamento['cod_produto'] ?>"><?= 'R$ ' . $preco . ' ' . $armazenamento['nome'] ?>
              </option>
            <?php endforeach; ?>
          </select>
          <br>
        </form>
      </div>
    </div>
    <!-- Foto -->
    <div class="col-xl-12 col-md-12">
      <div class="box-escolha-purple text">
        <div id="produtos" class="box-part-pc d-flex justify-content-center">
          <img src="img/sem-foto.jpg" alt="" height="300px" width="300px" class="img-fluid">
        </div>
        <div class="text-center text-white">
          <h1 id="preco"></h1>
        </div>
      </div>
    </div>
    <!-- Fim da foto -->
    <!-- Começo do Botao -->
    <div class="container mt-2">
      <div class="row">
        <div class="col-xl-6 col-md-12 mb-4">
        <a href="escolherProcessador"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">Voltar</button></a>
        </div>
        <div class="col-xl-6 col-md-12 mb-4">
          <button class="btn btn-1 btn-md btn-block btn-lg" id="proximo" type="submit">Próximo</button></a>
        </div>
      </div>
    </div>
    <!-- Fim do botao -->
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Funçao para carregar a foto da peça -->
<script>
  $(document).ready(function() {
    $('#peca').change(function() {
      var peca = $(this).val();
      buscarProdutos(peca);
    });

    function buscarProdutos(peca) {
      $.ajax({
        url: 'php/carregarFoto.php',
        method: 'POST',
        data: {
          peca: peca
        },
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

    function buscarProdutos(peca) {
      $.ajax({
        url: 'php/carregarPreco.php',
        method: 'POST',
        data: {
          peca: peca
        },
        success: function(response) {
          $('#preco').html(response);
        }
      });
    }
  });
  $(document).ready(function() {
      $('#proximo').click(function() {
        var opcaoSelecionada = $('#peca').val(); // Obtém o valor selecionado

        // Verifica se a opção selecionada é a desejada
        if (opcaoSelecionada == '0') {
          alert('Selecione a opção correta!');
        } else {
          $('form').submit(); // Envia o formulário
        }
      });
    });
</script>