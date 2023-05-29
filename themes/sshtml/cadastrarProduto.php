<style>
    .form-label{
        padding: inherit !important;
    }
</style>

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
                        <?php
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
                        <!-- Sign in Form -->
                        <form class="form-outline mb-4 text-left" action="php/cadastrarProdutoBanco.php" method="post">

                            <div class="row">
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
                                    <label class="form-label">O que deseja Cadastrar ?</label>
                                    <select class="form-select" aria-label="Default select example" id="comboTipoProduto">
                                        <option selected ></option>
                                        <option value="1">Processador</option>
                                        <option value="2">Placa Mãe</option>
                                        <option value="3">Memoria RAM</option>
                                        <option value="4">Placa de Video</option>
                                        <option value="5">Gabinete</option>
                                        <option value="6">Fonte</option>
                                        <option value="7">Armazenamento</option>
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12" id='comboProcessador' hidden>
                                    <div class="form-group">
                                        <label class="form-label col-lg-12 col-md-12 col-12">Processador</label>
                                        <select class="form-select" id="idProcessador" name="idProcessador" aria-label="Default select example">
                                        <option selected> </option>
                                            <?php
                                                $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
                                                $stmt = $sql->prepare("SELECT cod_produto, nome FROM tb_pecas WHERE cod_categorias = :codigoCategoria");
                                                $stmt->bindValue(':codigoCategoria', 5);
                                                $stmt->execute();
                                                $sqlResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($sqlResult as $row) {
                                                $codigo = (int) $row['cod_produto'];
                                                $descricao = $row['nome'];
                                                echo '<option value=' . $codigo . '>' . $descricao . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-12" id='comboPalacaMae' hidden>
                                    <div class="form-group">
                                        <label class="form-label col-lg-12 col-md-12 col-12">Placa Mãe</label>
                                        <select class="form-select" id="idPalacaMae" name="idPalacaMae" aria-label="Default select example">
                                        <option selected> </option>
                                            <?php
                                                $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
                                                $stmt = $sql->prepare("SELECT cod_produto, nome FROM tb_pecas WHERE cod_categorias = :codigoCategoria");
                                                $stmt->bindValue(':codigoCategoria', 4);
                                                $stmt->execute();
                                                $sqlResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($sqlResult as $row) {
                                                $codigo = (int) $row['cod_produto'];
                                                $descricao = $row['nome'];
                                                echo '<option value=' . $codigo . '>' . $descricao . '</option>';
                                                }
                                            ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-12" id='comboRam' hidden>
                                    <div class="form-group">
                                        <label class="form-label col-lg-12 col-md-12 col-12">Memoria RAM</label>
                                        <select class="form-select" id="idRam" name="idRam" aria-label="Default select example">
                                        <option selected> </option>
                                            <?php
                                                $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
                                                $stmt = $sql->prepare("SELECT cod_produto, nome FROM tb_pecas WHERE cod_categorias = :codigoCategoria");
                                                $stmt->bindValue(':codigoCategoria', 6);
                                                $stmt->execute();
                                                $sqlResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($sqlResult as $row) {
                                                $codigo = (int) $row['cod_produto'];
                                                $descricao = $row['nome'];
                                                echo '<option value=' . $codigo . '>' . $descricao . '</option>';
                                                }
                                            ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-12" id='comboPlacaVideo' hidden>
                                    <div class="form-group">
                                        <label class="form-label col-lg-12 col-md-12 col-12">Placa de Video</label>
                                        <select class="form-select" id="idPlacaVideo" name="idPlacaVideo" aria-label="Default select example">
                                        <option selected> </option>
                                            <?php
                                                $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
                                                $stmt = $sql->prepare("SELECT cod_produto, nome FROM tb_pecas WHERE cod_categorias = :codigoCategoria");
                                                $stmt->bindValue(':codigoCategoria', 7);
                                                $stmt->execute();
                                                $sqlResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($sqlResult as $row) {
                                                $codigo = (int) $row['cod_produto'];
                                                $descricao = $row['nome'];
                                                echo '<option value=' . $codigo . '>' . $descricao . '</option>';
                                                }
                                            ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-12" id='comboGabinete' hidden>
                                    <div class="form-group">
                                        <label class="form-label col-lg-12 col-md-12 col-12">Gabinete</label>
                                        <select class="form-select" id="idGabinete" name="idGabinete" aria-label="Default select example">
                                        <option selected> </option>
                                            <?php
                                                $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
                                                $stmt = $sql->prepare("SELECT cod_produto, nome FROM tb_pecas WHERE cod_categorias = :codigoCategoria");
                                                $stmt->bindValue(':codigoCategoria', 8);
                                                $stmt->execute();
                                                $sqlResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($sqlResult as $row) {
                                                $codigo = (int) $row['cod_produto'];
                                                $descricao = $row['nome'];
                                                echo '<option value=' . $codigo . '>' . $descricao . '</option>';
                                                }
                                            ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-12" id='comboFonte' hidden>
                                    <div class="form-group">
                                        <label class="form-label col-lg-12 col-md-12 col-12">Fonte</label>
                                        <select class="form-select" id="idFonte" name="idFonte" aria-label="Default select example">
                                        <option selected> </option>
                                            <?php
                                                $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
                                                $stmt = $sql->prepare("SELECT cod_produto, nome FROM tb_pecas WHERE cod_categorias = :codigoCategoria");
                                                $stmt->bindValue(':codigoCategoria', 9);
                                                $stmt->execute();
                                                $sqlResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($sqlResult as $row) {
                                                $codigo = (int) $row['cod_produto'];
                                                $descricao = $row['nome'];
                                                echo '<option value=' . $codigo . '>' . $descricao . '</option>';
                                                }
                                            ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-12" id='comboArmazenamento' hidden>
                                    <div class="form-group">
                                        <label class="form-label col-lg-12 col-md-12 col-12">Armazenamento</label>
                                        <select class="form-select" id="idArmazenamento" name="idArmazenamento" aria-label="Default select example">
                                        <option selected> </option>
                                            <?php
                                                $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
                                                $stmt = $sql->prepare("SELECT cod_produto, nome FROM tb_pecas WHERE cod_categorias = :codigoCategoria");
                                                $stmt->bindValue(':codigoCategoria', 11);
                                                $stmt->execute();
                                                $sqlResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($sqlResult as $row) {
                                                $codigo = (int) $row['cod_produto'];
                                                $descricao = $row['nome'];
                                                echo '<option value=' . $codigo . '>' . $descricao . '</option>';
                                                }
                                            ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <center>
                                <button class="btn btn-primary btn-md btn-block" type="submit" id="btnCadastro">Cadastrar</button>
                            </center>
                            <br>
                        </form>
                        <!-- End Sign in Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<!-- gogon Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/charts.js"></script>
<!-- <script src="js/final-countdown.min.js"></script> -->
<!-- <script src="js/fancy-box.min.js"></script> -->
<!-- <script src="js/fullcalendar.min.js"></script> -->
<script src="js/datatables.min.js"></script>
<script src="js/circle-progress.min.js"></script>
<script src="js/jquery-jvectormap.js"></script>
<script src="js/jvector-map.js"></script>
<script src="js/main.js"></script>

<!-- mask plugin -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<!-- mask plugin -->

<script language="JavaScript">
    $("#comboTipoProduto").on("change", function() {
        
            if ($("#comboTipoProduto").val() == 1) {

                $("#comboProcessador").prop("hidden", false);
                $("#comboProcessador").val('');

                $("#comboPalacaMae").prop("hidden", true);
                $("#comboPalacaMae").val('');

                $("#comboRam").prop("hidden", true);
                $("#comboRam").val('');

                $("#comboPlacaVideo").prop("hidden", true);
                $("#comboPlacaVideo").val('');
                
                $("#comboGabinete").prop("hidden", true);
                $("#comboGabinete").val('');

                $("#comboFonte").prop("hidden", true);
                $("#comboFonte").val('');
                
                $("#comboArmazenamento").prop("hidden", true);
                $("#comboArmazenamento").val('');
                
            } else if  ($("#comboTipoProduto").val() == 2) {
                
                $("#comboPalacaMae").prop("hidden", false);
                $("#comboPalacaMae").val('');

                $("#comboProcessador").prop("hidden", true);
                $("#comboProcessador").val('');

                $("#comboRam").prop("hidden", true);
                $("#comboRam").val('');

                $("#comboPlacaVideo").prop("hidden", true);
                $("#comboPlacaVideo").val('');
                
                $("#comboGabinete").prop("hidden", true);
                $("#comboGabinete").val('');

                $("#comboFonte").prop("hidden", true);
                $("#comboFonte").val('');
                
                $("#comboArmazenamento").prop("hidden", true);
                $("#comboArmazenamento").val('');
            } else if  ($("#comboTipoProduto").val() == 2) {
                
                $("#comboPalacaMae").prop("hidden", false);
                $("#comboPalacaMae").val('');

                $("#comboProcessador").prop("hidden", true);
                $("#comboProcessador").val('');

                $("#comboRam").prop("hidden", true);
                $("#comboRam").val('');

                $("#comboPlacaVideo").prop("hidden", true);
                $("#comboPlacaVideo").val('');
                
                $("#comboGabinete").prop("hidden", true);
                $("#comboGabinete").val('');

                $("#comboFonte").prop("hidden", true);
                $("#comboFonte").val('');
                
                $("#comboArmazenamento").prop("hidden", true);
                $("#comboArmazenamento").val('');

            } else if  ($("#comboTipoProduto").val() == 3) {

                $("#comboRam").prop("hidden", false);
                $("#comboRam").val('');
                
                $("#comboPalacaMae").prop("hidden", true);
                $("#comboPalacaMae").val('');

                $("#comboProcessador").prop("hidden", true);
                $("#comboProcessador").val('');

                $("#comboPlacaVideo").prop("hidden", true);
                $("#comboPlacaVideo").val('');
                
                $("#comboGabinete").prop("hidden", true);
                $("#comboGabinete").val('');

                $("#comboFonte").prop("hidden", true);
                $("#comboFonte").val('');
                
                $("#comboArmazenamento").prop("hidden", true);
                $("#comboArmazenamento").val('');

            }  else if  ($("#comboTipoProduto").val() == 4) {

                $("#comboPlacaVideo").prop("hidden", false);
                $("#comboPlacaVideo").val('');
                
                $("#comboRam").prop("hidden", true);
                $("#comboRam").val('');
                
                $("#comboPalacaMae").prop("hidden", true);
                $("#comboPalacaMae").val('');

                $("#comboProcessador").prop("hidden", true);
                $("#comboProcessador").val('');

                $("#comboGabinete").prop("hidden", true);
                $("#comboGabinete").val('');

                $("#comboFonte").prop("hidden", true);
                $("#comboFonte").val('');
                
                $("#comboArmazenamento").prop("hidden", true);
                $("#comboArmazenamento").val('');
            } else if  ($("#comboTipoProduto").val() == 5) {

                $("#comboGabinete").prop("hidden", false);
                $("#comboGabinete").val('');

                $("#comboPlacaVideo").prop("hidden", true);
                $("#comboPlacaVideo").val('');

                $("#comboRam").prop("hidden", true);
                $("#comboRam").val('');

                $("#comboPalacaMae").prop("hidden", true);
                $("#comboPalacaMae").val('');

                $("#comboProcessador").prop("hidden", true);
                $("#comboProcessador").val('');

                $("#comboFonte").prop("hidden", true);
                $("#comboFonte").val('');

                $("#comboArmazenamento").prop("hidden", true);
                $("#comboArmazenamento").val('');
            } else if  ($("#comboTipoProduto").val() == 6) {

                $("#comboFonte").prop("hidden", false);
                $("#comboFonte").val('');

                $("#comboGabinete").prop("hidden", true);
                $("#comboGabinete").val('');

                $("#comboPlacaVideo").prop("hidden", true);
                $("#comboPlacaVideo").val('');

                $("#comboRam").prop("hidden", true);
                $("#comboRam").val('');

                $("#comboPalacaMae").prop("hidden", true);
                $("#comboPalacaMae").val('');

                $("#comboProcessador").prop("hidden", true);
                $("#comboProcessador").val('');

                $("#comboArmazenamento").prop("hidden", true);
                $("#comboArmazenamento").val('');
            } else if  ($("#comboTipoProduto").val() == 7) {

                $("#comboArmazenamento").prop("hidden", false);
                $("#comboArmazenamento").val('');

                $("#comboFonte").prop("hidden", true);
                $("#comboFonte").val('');

                $("#comboGabinete").prop("hidden", true);
                $("#comboGabinete").val('');

                $("#comboPlacaVideo").prop("hidden", true);
                $("#comboPlacaVideo").val('');

                $("#comboRam").prop("hidden", true);
                $("#comboRam").val('');

                $("#comboPalacaMae").prop("hidden", true);
                $("#comboPalacaMae").val('');

                $("#comboProcessador").prop("hidden", true);
                $("#comboProcessador").val('');
                
                }
        });
    
    $(document).ready(function() {

    });
</script>


<form id="formCategoria">
    <label for="categoria">Categoria:</label>
    <select id="categoria" name="categoria">
        <option value="11">Categoria 1</option>
        <option value="5">Categoria 2</option>
        <!-- Adicione as opções de categorias que desejar -->
    </select>
    <input type="submit" value="Buscar">
</form>

<div id="produtos"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#formCategoria').submit(function(e) {
            e.preventDefault();
            var categoria = $('#categoria').val();
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