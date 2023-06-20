<?php
if (isset($_SESSION['Cod_Autenticacao'])) {
    $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
    $stmt = $sql->query("SELECT * FROM tb_cliente_pf where cod_cliente_pf = '$_SESSION[Cod_cliente]'");
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $cod_cliente_pf = @$res[0]['cod_cliente_pf'];
    $nome = @$res[0]['nome'];
    $cpf = @$res[0]['cpf'];
    $contato = @$res[0]['contato'];
    $data_de_nascimento = @$res[0]['data_de_nascimento'];
    $idAutenticacao = @$res[0]['cod_autenticacao'];
    $stmt = $sql->query("SELECT * FROM tb_autenticacao where cod_autenticacao = '$idAutenticacao'");
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $email = @$res[0]['email'];
    $senha = @$res[0]['senha'];
} else {
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
                            Editar Perfil
                            <br><br>
                        </div>

                        <div class="alert alert-success alert-dismissible fade show" id="erro" style="display: none;" role="alert">
                            <div id="msg"></div>
                            <button type="button" id="closeEnd" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
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
                        <form class="form-outline mb-4 text-left" action="php/editarUsuarioPf.php" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Nome Completo</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="text" name="nome" placeholder="" value="<?php echo @$nome ?>" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div id="cpfCampo" class="col-lg-8 col-md-8 col-12">
                                    <div id="cpfCampo" class="form-group">
                                        <label class="form-label" for="cpf">CPF</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" id="cpf" name="cpf" value="<?php echo @$cpf ?>" placeholder="000.000.000-00" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="gogon-wc__form-label">Data de Nascimento</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" type="date" data-mask="99/99/9999" id="dataNascimento" name="dataNascimento" value="<?php echo @$data_de_nascimento ?>" placeholder="Data de Nascimento" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Contato</label>
                                        <div class="form-group__input">
                                            <input class="form-control form-control-md" id="contato" name="contato" value="<?php echo @$contato ?>" placeholder="(00)0 0000-0000" required="required" style="color: #1E1E1E;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-md-8 col-12">
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
                                <button class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#endereco">Endereço</button>
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
    $registros = @count(@$res);
    if ($registros > 0) {
        $idform = "form-editar-endereco";
    }else{
        $idform = "form-salvar-endereco";
    }
?>
<div class="modal fade" id="endereco" tabindex="-1" role="dialog" aria-labelledby="Endereço" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Endereço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Sign in Form -->
                <form class="form-outline mb-4 text-left" id="<?php echo $idform;?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="rua">Rua</label>
                            <input type="text" class="form-control" id="rua" placeholder="Rua Exemplo" required="required" value="<?php echo @$rua ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="numero">Numero</label>
                            <input type="text" class="form-control" id="numero" required="required" value="<?php echo @$numero ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" required="required" value="<?php echo @$complemento ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" required="required" value="<?php echo @$cep?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" required="required" value="<?php echo @$bairro ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" required="required" value="<?php echo @$cidade ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="uf">Estado</label>
                            <input type="text" class="form-control" id="uf" required="required" value="<?php echo @$uf ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-block">Salvar</button>
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

    //Buscar as informaçoes usando o cep

    $(document).ready(function() {
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





// Parte para salvar o endereço do usuario utilizando AJAX
$(document).ready(function() {
    $('#form-salvar-endereco').submit(function(e) {
        e.preventDefault(); // previne o comportamento padrão de submit do formulário
        
        // Recupera os dados do formulário
        var cep = $('#cep').val();
        cep = cep.replace(/[^0-9]/g, '');
        var rua = $('#rua').val();
        var numero = $('#numero').val();
        var complemento = $('#complemento').val();
        var bairro = $('#bairro').val();
        var cidade = $('#cidade').val();
        var uf = $('#uf').val();
        console.log(cep);
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
            $('#msg').text('Endereço cadastrado com sucesso!');
            $('#endereco').modal('hide');
            $('.modal-backdrop').remove();
            document.getElementById('erro').style.display = 'block';
          },
          error: function() {
            $('#msg').text('Ocorreu um erro durante a requisição.');
            $('#endereco').modal('hide');
            $('.modal-backdrop').remove();
            document.getElementById('erro').style.display = 'block';
            // Você pode adicionar classes CSS ou modificar o estilo do elemento aqui se necessário
          }
        });
    });
});



// Parte para editar o endereço do usuario utilizando AJAX
$(document).ready(function() {
    $('#form-editar-endereco').submit(function(e) {
        e.preventDefault(); // previne o comportamento padrão de submit do formulário
        
        // Recupera os dados do formulário
        var cep = $('#cep').val();
        cep = cep.replace(/[^0-9]/g, '');
        var rua = $('#rua').val();
        var numero = $('#numero').val();
        var complemento = $('#complemento').val();
        var bairro = $('#bairro').val();
        var cidade = $('#cidade').val();
        var uf = $('#uf').val();
        var id = <?php if (isset($cod_endereco)){echo @$cod_endereco; }else {echo 0; } ?>;
        // Envia os dados do formulário via AJAX
        $.ajax({
            url: 'php/editarEndereco.php',
            method: 'POST',
            data: {
                id: id,
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
            $('#msg').text('Endereço editado com sucesso!');
            $('#endereco').modal('hide');
            $('.modal-backdrop').remove();
            document.getElementById('erro').style.display = 'block';
          },
          error: function() {
            $('#msg').text('Ocorreu um erro durante a requisição.');
            $('#endereco').modal('hide');
            $('.modal-backdrop').remove();
            document.getElementById('erro').style.display = 'block';
            // Você pode adicionar classes CSS ou modificar o estilo do elemento aqui se necessário
          }
        });
    });
});


document.getElementById('closeEnd').addEventListener('click', function() {
  document.getElementById('erro').style.display = 'none';
});
</script>