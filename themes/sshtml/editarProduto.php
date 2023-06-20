<?php if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];
    $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
    $query = $sql->query("SELECT * FROM tb_produtosclientepj WHERE cod_produtosClientePj = $cod");
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $result) {
        $cod_produtosCientePj = $result['cod_produtosClientePj'];
        $cod_pecas = $result['cod_pecas'];

        $query_pecas = $sql->query("SELECT * FROM tb_pecas where cod_produto = $cod_pecas");
        $result_pecas = $query_pecas->fetchAll(PDO::FETCH_ASSOC);
        $nome = $result_pecas[0]['nome'];
        $cod_categoria = $result_pecas[0]['cod_categorias'];
                        
        $query_quantidade = $sql->query("SELECT * FROM tb_categorias where cod_categoria = $cod_categoria");
        $result_quantidade = $query_quantidade->fetchAll(PDO::FETCH_ASSOC);
        $categoria = $result_quantidade[0]['nome'];

        $quantidade = $result['quantidade'];
        $preco = $result['valor'];
}
}
?>
<section class="banner_criarconta vh-100" style="background-image: url('img/banner.jpg');">
<div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="logo-purple">
                            Editar Produto
                            <br><br>
                        </div>
                        <?php
                        //Codigo para verificar e colocar na tela caso aconteça um erro no sistema
                        if (isset($_SESSION["Info"]) && isset($_SESSION["Erro"])) { ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><?php echo @$_SESSION["Info"]; ?></strong> <?php echo @$_SESSION["Erro"]; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php 
                            unset($_SESSION["Info"]);
                            unset($_SESSION["Erro"]);
                        } ?>
                        <form class="form-outline mb-4 text-left" action="php/editarProduto.php?cod=<?=$cod_produtosCientePj?>" method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <div id="produtos">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <div id="fotos">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label class="form-label">Preço</label>
                                    <div class="form-group__input">
                                        <input class="form-control form-control-md" type="text" name="preco" placeholder="" required="required" value="<?=$preco?>" style="color: #1E1E1E;">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Quantidade</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="text" name="quantidade" placeholder="" value="<?=$quantidade?>" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <center>
                                <button class="btn btn-primary btn-md btn-block" type="submit">Editar</button>
                                </center>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script>
    ///Carregar os produtos atravez da categoria
    $(document).ready(function() {
        var categoria = 11;
        var produto = <?= $cod_pecas ?>;
        buscarProdutos(categoria, produto);

        function buscarProdutos(categoria, produto) {
            $.ajax({
                url: 'php/carregarProdutos.php',
                method: 'POST',
                data: { categoria: categoria, produto: produto },
                success: function(response) {
                    $('#produtos').html(response);
                }
            });
        }
    });
  </script>