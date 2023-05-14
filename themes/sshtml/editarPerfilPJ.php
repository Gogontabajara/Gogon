<?php
if (isset($_SESSION['Cod_cliente'])) {
    $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
    $stmt = $sql->query("SELECT * FROM tb_cliente_pj where cod_cliente_pj = '$_SESSION[Cod_cliente]'");
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $cod_cliente_pj = @$res[0]['cod_cliente_pj'];
    $nome_fantasia = @$res[0]['nome_fantasia'];
    $razão_social = @$res[0]['razao_social'];
    $cnpj = @$res[0]['cnpj'];
    $contato = @$res[0]['contato'];
    $data_de_nascimento = @$res[0]['data_de_nascimento'];
    $idAutenticacao = @$res[0]['cod_autenticacao'];
    $stmt = $sql->query("SELECT * FROM tb_autenticacao where cod_autenticacao = '$idAutenticacao'");
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $email = @$res[0]['email'];
    $senha = @$res[0]['senha'];
}
else {
    header("Location: ../login");
}
?>
<section class="banner_criarconta vh-100" style="background-image: url('img/banner.jpg');">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="logo-purple">
                            Editar Perfil PJ
                            <br><br>
                        </div>
                        <?php
                        if (isset($_SESSION["Info"]) && isset($_SESSION["Erro"])) { ?>
                            <div class="alert alert-<?php echo @$_SESSION['Type']; ?> alert-dismissible fade show" role="alert">
                                <strong><?php echo @$_SESSION["Info"]; ?></strong> <?php echo @$_SESSION["Erro"]; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php unset($_SESSION["Info"]);
                            unset($_SESSION["Erro"]);
                        } ?>
                        <!-- Sign in Form -->
                        <form class="form-outline mb-4 text-left" action="php/editarUsuarioPJ.php" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Nome Fantasia</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="text" name="nome_fantasia" id="nome_fantasia" placeholder="" value="<?php echo @$nome_fantasia ?>" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Razão Social</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="text" name="razaoSocial" id="razão_social" placeholder="" value="<?php echo @$razão_social ?>" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label">cnpj</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="text" id="cnpj" name="cnpj" placeholder="" value="<?php echo @$cnpj ?>" placeholder="00.000.000/0000-00" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Contato</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" id="contato" name="contato" value="<?php echo @$contato ?>" placeholder="(00)0 0000-0000" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="email" id="email" name="email" value="<?php echo @$email ?>" placeholder="exemplo@gmail.com" required="required" style="color: #1E1E1E;">
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
                                            <input class="form-control form-control-md" type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="senha" type="senha" name="senha" placeholder="" value="<?php echo @$senha ?>" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label class="form-label">Repetir Senha</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="senhaRepetida" type="senha" name="senhaRepetida" placeholder="" value="<?php echo @$senha ?>" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botao de Salvar Ediçao -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <button class="btn btn-primary btn-md btn-block" type="submit" id="btnCadastro">Salvar</button>
                                </div>
                            </div>
                        </form>
                        <!-- End Sign in Form -->
                        <!-- Botao Para Adicionar Endereço -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <button class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#endereco">Endereço Teste</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<?php
    $stmt = $sql->query("SELECT * FROM tb_endereco where cod_autenticacao = '$idAutenticacao'");
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //Passando os resultados do banco para suas respectivas variaves
    $cod_endereco = @$res[0]['cod_endereco'];
    $rua = @$res[0]['rua'];
    $numero = @$res[0]['numero'];
    $complemento = @$res[0]['complemento'];
    $cep = @$res[0]['cep'];
    $bairro = @$res[0]['bairro'];
    $cidade = @$res[0]['cidade'];
    $uf = @$res[0]['uf'];
?>
<div class="modal fade" id="endereco" tabindex="-1" role="dialog" aria-labelledby="Endereço" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Endereço TESTE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Sign in Form -->
                <form class="form-outline mb-4 text-left" id="form-salvar-endereco" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="rua">Rua</label>
                            <input type="text" class="form-control" id="rua" placeholder="Rua Exemplo" value="<?php echo @$rua ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="numero">Numero</label>
                            <input type="text" class="form-control" id="numero" value="<?php echo @$numero ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" value="<?php echo @$complemento ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="cep">Cep</label>
                            <input type="text" class="form-control" id="cep" value="<?php echo @$cep?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" value="<?php echo @$bairro ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" value="<?php echo @$cidade ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="uf">Estado</label>
                            <input type="text" class="form-control" id="uf" value="<?php echo @$uf ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
                <!-- End Sign in Form -->
            </div>
        </div>
    </div>
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

    //Buscar as informaçoes usando o cep

    $(document).ready(function() {
        $("#cnpj").on("focusout", function() {
            cnpj = $("#cnpj").val();
            if (validaCNPJ(cnpj)) {
                console.log("CNPJ válido");
            } else {
                alert("CNPJ inválido!");
                $("#cnpj").val('');
            }
        });

            $('#cep').blur(function() {
                // Recupera o CEP digitado no formulário
                var cep = $('#cep').val();

                // Remove qualquer caractere não numérico do CEP
                cep = cep.replace(/[^0-9]/g, '');
                // Verifica se o CEP possui 8 dígitos
                if (cep.length === 8) {
                    // Envia a requisição AJAX para consultar o CEP
                    $.ajax({
                        url: 'php/consultaCep.php',
                        method: 'POST',
                        data: { cep: cep },
                        dataType: 'json',
                        success: function(response) {
                            // Exibe os dados do endereço no formulário
                            $('#rua').val(response.rua);
                            $('#bairro').val(response.bairro);
                            $('#cidade').val(response.cidade);
                            $('#uf').val(response.uf);
                        },
                        error: function() {
                            alert('Erro ao consultar o CEP. Verifique se o CEP está correto e tente novamente.');
                        }
                    });
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

    // Parte para salvar o endereço do usuario utilizando AJAX
    $(document).ready(function() {
    $('#form-salvar-endereco').submit(function(e) {
        e.preventDefault(); // previne o comportamento padrão de submit do formulário
        
        // Recupera os dados do formulário
        var cep = $('#cep').val();
        var rua = $('#rua').val();
        var numero = $('#numero').val();
        var complemento = $('#complemento').val();
        var bairro = $('#bairro').val();
        var cidade = $('#cidade').val();
        var uf = $('#uf').val();
        // Envia os dados do formulário via AJAX
        $.ajax({
            url: 'php/cadastrarEndereco.php',
            method: 'POST',
            data: {
                cep: cep,
                rua: rua,
                numero: numero,
                complemento: complemento,
                bairro: bairro,
                cidade: cidade,
                uf: uf
            },
            success: function(response) {
                // Exibe a mensagem de sucesso ou de erro para o usuário
                $('#msg').text(response);
            }
        });
    });
});

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
                    $("#razão_social").val(response.nome);
                    $("#nome_fantasia").val(response.fantasia);
                },
                error: function() {
                    alert("Erro ao consultar CNPJ!");
                }
            });
        });
    });
</script>