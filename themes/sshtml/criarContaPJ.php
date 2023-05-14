<section class="banner_criarconta vh-100" style="background-image: url('img/banner.jpg');">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="logo-purple">
                            Criar conta PJ
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
                                        <label class="gogon-wc__form-label">Nome Fantasia</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="text" id="fantasia" name="nome" placeholder="" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Razao Social</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" id="social" type="text" name="razaoSocial" placeholder="" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div id="cnpjCampo" class="form-group">
                                        <label class="form-label" for="cnpj">CNPJ</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" id="cnpj" name="cnpj" value="" placeholder="00.000.000/0000-00" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Contato</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" id="contato" name="contato" placeholder="(00)0 0000-0000" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
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
                                        <label class="form-label">Senha</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="senhaRepetida" type="senha" name="senhaRepetida" placeholder="" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <center>
                                <button class="btn btn-primary btn-md btn-block" type="submit">Cadastrar</button>
                            </center>
                            <br>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <p class="d-flex mb-4">Ja Possui conta? &nbsp<a href="login">Logar</a></p>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12">
                                    <p class="d-flex mb-4">criar conta como PF &nbsp<a href="criarContaPF">Criar Conta PF</a></p>
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
    $('#cnpj').mask('99.999.999/9999-99');

    $(document).ready(function() {

        $("#email").on("focusout", function() {
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

        $("#cnpj").on("focusout", function() {
            cnpj = $("#cnpj").val();
            if (validaCNPJ(cnpj)) {
                console.log("CNPJ válido");
            } else {
                alert("CNPJ inválido!");
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

    function validaCNPJ(cnpj) {

        cnpj = cnpj.replace(/[^\d]+/g, '');

        if (cnpj == '') return false;

        if (cnpj.length != 14)
            return false;

        // Elimina CNPJs invalidos conhecidos
        if (cnpj == "00000000000000" ||
            cnpj == "11111111111111" ||
            cnpj == "22222222222222" ||
            cnpj == "33333333333333" ||
            cnpj == "44444444444444" ||
            cnpj == "55555555555555" ||
            cnpj == "66666666666666" ||
            cnpj == "77777777777777" ||
            cnpj == "88888888888888" ||
            cnpj == "99999999999999")
            return false;

        // Valida DVs
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0, tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return false;

        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;

        return true;

    }


    $(document).ready(function() {
	// Quando o campo CNPJ perde o foco, executa a função de consulta
	$("#cnpj").blur(function() {
		// Obtém o valor do campo CNPJ
		var cnpj = $("#cnpj").val();

		// Remove todos os caracteres que não são dígitos do CNPJ
		cnpj = cnpj.replace(/\D/g, '');

		// Faz a requisição AJAX para a API pública da Speedio
		$.ajax({
			url: "php/consultaCnpj.php",
			type: "POST",
			data: { cnpj: cnpj },
			dataType: "json",
			success: function(response) {
				// Preenche os campos de razão social e nome fantasia com as informações de retorno da API
				$("#social").val(response.nome);
				$("#fantasia").val(response.fantasia);
			},
			error: function() {
				alert("Erro ao consultar CNPJ!");
			}
		});
	});
});
</script>