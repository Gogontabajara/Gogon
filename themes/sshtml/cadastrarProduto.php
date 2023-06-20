<section class="banner_criarconta vh-100" style="background-image: url('img/banner.jpg');">
<div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="logo-purple">
                            Cadastrar Produto
                            <br><br>
                        </div>
                        <form class="form-outline mb-4 text-left" action="php/cadastrarProduto.php" method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                <label class="form-label">O que deseja Cadastrar ?</label>
                                <select class="form-control" id="categoria" name="categoria aria-label="Default select example">
                                    <option selected ></option>
                                    <option value="5">Processador</option>
                                    <option value="4">Placa Mãe</option>
                                    <option value="6">Memoria RAM</option>
                                    <option value="7">Placa de Video</option>
                                    <option value="8">Gabinete</option>
                                    <option value="9">Fonte</option>
                                    <option value="11">Armazenamento</option>
                                </select>
                                </div>
                            </div>

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
                                        <input class="form-control form-control-md" type="text" name="preco" placeholder="" required="required" style="color: #1E1E1E;">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Quantidade</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="text" name="quantidade" placeholder="" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <center>
                                <button class="btn btn-primary btn-md btn-block" type="submit">Cadastrar</button>
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
        $('#categoria').change(function() {
            var categoria = $(this).val();
            buscarProdutos(categoria);
        });

        function buscarProdutos(categoria) {
            $.ajax({
                url: 'php/carregarProdutos.php',
                method: 'POST',
                data: { categoria: categoria },
                success: function(response) {
                    $('#produtos').html(response);
                }
            });
        }
    });
  </script>