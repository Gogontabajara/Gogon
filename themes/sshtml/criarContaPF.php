<section class="banner_criarconta vh-100" style="background-image: url('img/banner.jpg');">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="logo-purple">
                            Criar conta Pessoa Fisica
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
                        <?php unset($_SESSION["Info"]);
                            unset($_SESSION["Erro"]);
                        } ?>
                        <!-- Sign in Form -->
                        <form class="form-outline mb-4 text-left" action="php/cadastrar.php" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Nome Completo</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="text" name="nome" placeholder="" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div id="cpfCampo" class="col-lg-8 col-md-8 col-12">
                                    <div id="cpfCampo" class="form-group">
                                        <label class="form-label" for="cpf">CPF</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" id="cpf" name="cpf" value="" placeholder="000.000.000-00" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="gogon-wc__form-label">Data de Nascimento</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="date" data-mask="99/99/9999" id="dataNascimento" name="dataNascimento" placeholder="Data de Nascimento" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Contato</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" id="contato" name="contato" placeholder="(00)0 0000-0000" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-md-8 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="email" id="email" name="email" placeholder="exemplo@gmail.com" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label class="gogon-wc__form-label">Senha</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="senha" type="senha" name="senha" placeholder="" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label class="form-label">Confirmar Senha</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="senhaRepetida" type="senha" name="senhaRepetida" placeholder="" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <center>
                                <button class="btn btn-primary btn-md btn-block" type="submit" id="btnCadastro">Cadastrar</button>
                            </center>
                            <br>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <p class="d-flex mb-4">Ja Possui conta? &nbsp<a href="login">Logar</a></p>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12">
                                    <p class="d-flex mb-4">Clique aqui para criar uma conta PJ &nbsp<a href="criarContaPJ">Criar Conta</a></p>
                                </div>
                            </div>
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
    $('#contato').mask('(99)9 9999-9999');
    $('#cpf').mask('999.999.999-99');
    $('#cnpj').mask('99.999.999/9999-99');

    $(document).ready(function() {

        $("#cpf").on("focusout", function() {
            cpf = $("#cpf").val();
            if (validaCPF(cpf)) {
                console.log("CPF válido");
            } else {
                alert("CPF inválido!");
                $("#cpf").val('');
            }
        });

        $("#email").on("change", function() {
            email = $("#email").val();
            if (email) {
                validateEmail(email);
                emailValido = false;
            }
            if (validateEmail(email)) {
                emailValido = true;
            }
            if (emailValido === false) {
                alert("Email inválido!");
                $("#email").val('');
                return false;
            }
        });

        $("#tipoPerfil").on("change", function() {
            if ($("#tipoPerfil").val() == 1) {
                $("#cnpjCampo").prop("hidden", true);
                $("#cnpj").val('');
                $("#razaoSocial").prop("hidden", true);
                $("#razaoSocial").val('');
                $("#pessoaFisica").prop("hidden", false);
                $("#pessoaJuridica").prop("hidden", true);
                $("#cpfCampo").prop("hidden", false);
                $("#cpf").val('');
            } else {
                $("#cpfCampo").prop("hidden", true);
                $("#cpf").val('');
                $("#razaoSocial").prop("hidden", false);
                $("#razaoSocial").val('');
                $("#pessoaJuridica").prop("hidden", false);
                $("#pessoaFisica").prop("hidden", true);
                $("#cnpjCampo").prop("hidden", false);
                $("#cnpj").val('');
            }
        });

        $("#senhaRepetida").on("focusout", function() {
            senha = $("#senha").val();
            senhaRepetida = $("#senhaRepetida").val();
            if (senha && senhaRepetida) {
                if (senhaRepetida != senha) {
                    alert("As senhas não são as mesmas!");
                    $("#btnCadastro").addClass("disabled");
                    $("#senhaRepetida").val('');
                } else {
                    $("#btnCadastro").removeClass("disabled");
                }
            }
        });

        $("#senha").on("focusout", function() {
            senha = $("#senha").val();
            senhaRepetida = $("#senhaRepetida").val();
            if (senha && senhaRepetida) {
                if (senhaRepetida != senha) {
                    alert("As senhas não são as mesmas!");
                    $("#btnCadastro").addClass("disabled");
                    $("#senha").val('');
                } else {
                    $("#btnCadastro").removeClass("disabled");
                }
            }
        });
    });

    function validaCPF(cpf) {
        cpf = cpf.replace(/\D/g, '');

        const numerosInvalidos = ['00000000000', '11111111111', '22222222222', '33333333333', '44444444444', '55555555555', '66666666666', '77777777777', '88888888888', '99999999999'];

        if (numerosInvalidos.includes(cpf)) {
            return false;
        }

        var soma = 0;
        var resto;

        for (var i = 1; i <= 9; i++) {
            soma = soma + parseInt(cpf.substring(i - 1, i)) * (11 - i);
        }

        resto = (soma * 10) % 11;

        if ((resto == 10) || (resto == 11)) {
            resto = 0;
        }

        if (resto != parseInt(cpf.substring(9, 10))) {
            return false;
        }

        soma = 0;
        for (var i = 1; i <= 10; i++) {
            soma = soma + parseInt(cpf.substring(i - 1, i)) * (12 - i);
        }
        resto = (soma * 10) % 11;

        if ((resto == 10) || (resto == 11)) {
            resto = 0;
        }
        if (resto != parseInt(cpf.substring(10, 11))) {
            return false;
        }

        return true;
    }
</script>