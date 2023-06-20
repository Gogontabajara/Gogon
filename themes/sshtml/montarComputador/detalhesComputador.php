<?php
if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];
    $computador = new computador();
    $produtos = $computador->carregarComputadores($cod);
} else {
    header("Location: ../login");
}

?>
<div class="container">
    <h1 class="h1-purple text-center">Detalhes do Computador</h1>
    <div class="table-responsive mt-2">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $valorTotal = 0;
                foreach ($produtos as $produto) {
                ?>
                    <tr>
                        <td><img src="img<?= $produto['foto'] ?>" class="img-fluid" width='25px' height:auto; style="text-align: center; justify-content: center; align-items: center; display: flex;"></td>
                        <td><?= $produto['nome'] ?></td>
                        <?php $valorTotal += $computador->buscarMediaValor($produto['cod_produto']) ?>
                        <td><?= "R$ " . $computador->buscarMediaValor($produto['cod_produto']) ?></td>
                        <td>
                            <i class="product fas fa-shopping-cart text-primary" data-value="<?= $produto['cod_produto']?>" data-toggle="modal" data-target="#endereco" title='Ver lojas'></i>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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
                    <h4 class="card-title"><?= "R$ " . $valorTotal ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="endereco" tabindex="-1" role="dialog" aria-labelledby="Endereço" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Lojas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</0span>
                </button>
            </div>
            <div class="modal-body">
            <div id="loja">

            </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    ///Carregar os produtos atravez da categoria
    $(document).ready(function() {
        $('.product').click(function() {
            var produto = $(this).data('value');
            buscarlojas(produto);
        });

        function buscarlojas(produto) {
            $.ajax({
                url: 'php/carregarLojas.php',
                method: 'POST',
                data: { produto: produto },
                success: function(response) {
                    $('#loja').html(response);
                }
            });
        }
    });
  </script>