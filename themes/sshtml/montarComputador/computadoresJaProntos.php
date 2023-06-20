<?php
$_SESSION['maquina']['processador'] = @$_POST['processador'];
$sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
$stmt = $sql->query("SELECT * FROM tb_computadores_montado where cod_cliente = 35");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$computador = new computador();
?>
<div class="box-white">
    <h1 class="h1-purple text-center">Perfis Prontos</h1>
    <p style="text-align: center; margin:5px 250px 10px 250px;">Escolha o computador ideal para atender às suas
        necessidades<br>Selecione o perfil que melhor se encaixe no seu uso</p>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="box-part-purple text-center">
                    <img src="img/icons/1.png" class="circulo d-block mx-lg-auto img-fluid" alt="pc" width="300" height="500" loading="lazy">
                    <div class="title">
                        <h4 class="text-white">Perfil Básico</h4>
                    </div>
                    <div class="text-left" style="margin:5px 20px 15px 20px;">
                        <span class="text-white">
                            Tarefas cotidianas como:<br>
                            - Navegar na Internet<br>
                            - Pacote Office<br>
                            - Aplicativos de Reprodução de Mídias
                        </span>
                    </div>
                    <button type="button" class="btn nav-link-btn" data-toggle="modal" data-target="#perfilBasico" title='Ver lojas'>SELECIONAR</button>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="box-part-purple text-center">
                    <img src="img/icons/2.png" class="circulo d-block mx-lg-auto img-fluid" alt="pc" width="300" height="500" loading="lazy">
                    <div class="title">
                        <h4 class="text-white">Perfil Médio</h4>
                    </div>
                    <div class="text-left" style="margin:5px 20px 15px 20px;">
                        <span class="text-white">
                            Tarefas cotidianas e Jogos como:<br>
                            - Navegar na Internet<br>
                            - Pacote Office<br>
                            - Jogos leves
                        </span>
                    </div>
                    <a class="btn nav-link-btn" data-toggle="modal" data-target="#perfilMedio" title='Ver lojas'>SELECIONAR</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="box-part-purple text-center">
                    <img src="img/icons/3.png" class="circulo d-block mx-lg-auto img-fluid" alt="pc" width="300" height="500" loading="lazy">
                    <div class="title">
                        <h4 class="text-white">Perfil Avançado</h4>
                    </div>
                    <div class="text-left" style="margin:5px 20px 15px 20px;">
                        <span class="text-white">
                            Programas mais pesados:<br>
                            - Jogos Pesados<br>
                            - Edição de Video<br>
                            - Edição de fotos
                        </span>
                    </div>
                    <a class="btn nav-link-btn" data-toggle="modal" data-target="#perfilAvancado" title='Ver lojas'>SELECIONAR</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para o computador Basico -->
<div class="modal fade mt-5" id="perfilBasico" tabindex="-1" role="dialog" aria-labelledby="Endereço" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Perfil Basico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</0span>
                </button>
            </div>
            <div class="modal-body">
                <?php $produtos = $computador->carregarComputadores($results[2]['cod_computador']);
                $valorTotal = 0;
                foreach ($produtos as $produto) : ?>
                    <div class="card mt-2">
                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-12 d-flex justify-content-center">
                                <div class="img-square-wrapper">
                                    <img src="img<?= $produto['foto'] ?>" class="img-pc d-block mx-lg-auto img-fluid" alt="pc" width="150" height="150" loading="lazy">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 d-flex justify-content-center">
                                <div class="card-body" style="text-align: center; justify-content: center; align-items: center; display: flex;">
                                    <h6 class="card-title">
                                        <?= mb_strimwidth($produto['nome'], 0, 50, "...") ?>
                                    </h6>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-12 d-flex justify-content-center">
                                <div class="card-body" style="text-align: center; justify-content: center; align-items: center; display: flex;">
                                    <h5 class="card-title">
                                        <?= "R$ " . $computador->buscarMediaValor($produto['cod_produto']) ?>
                                    </h5>
                                    <?php $valorTotal += $computador->buscarMediaValor($produto['cod_produto']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
                                <h5 class="card-text">
                                    <?= "R$ " . $valorTotal ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-2">
                    <div class="row">
                        <?php if (@$_SESSION["logado"] == "true") { ?>
                            <div class="col-xl-6 col-md-12 mb-4">
                                <a href="php/salvarComputadorjapronto.php?computador=2"><button class="btn btn-success btn-md btn-block btn-lg" type="submit">Salvar Computador</button></a>
                            </div>
                        <?php } ?>
                        <div class="col-xl-6 col-md-12 mb-4">
                            <a href="montarComputador"><button class="btn btn-danger btn-md btn-block btn-lg" type="submit">Retornar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal para o computador Medio -->
<div class="modal fade mt-5" id="perfilMedio" tabindex="-1" role="dialog" aria-labelledby="Endereço" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Perfil Basico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</0span>
                </button>
            </div>
            <div class="modal-body">
                <?php $produtos = $computador->carregarComputadores($results[0]['cod_computador']);
                $valorTotal = 0;
                foreach ($produtos as $produto) : ?>
                    <div class="card mt-2">
                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-12 d-flex justify-content-center">
                                <div class="img-square-wrapper">
                                    <img src="img<?= $produto['foto'] ?>" class="img-pc d-block mx-lg-auto img-fluid" alt="pc" width="150" height="150" loading="lazy">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 d-flex justify-content-center">
                                <div class="card-body" style="text-align: center; justify-content: center; align-items: center; display: flex;">
                                    <h6 class="card-title">
                                        <?= mb_strimwidth($produto['nome'], 0, 50, "...") ?>
                                    </h6>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-12 d-flex justify-content-center">
                                <div class="card-body" style="text-align: center; justify-content: center; align-items: center; display: flex;">
                                    <h5 class="card-title">
                                        <?= "R$ " . $computador->buscarMediaValor($produto['cod_produto']) ?>
                                    </h5>
                                    <?php $valorTotal += $computador->buscarMediaValor($produto['cod_produto']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
                                <h5 class="card-text">
                                    <?= "R$ " . $valorTotal ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-2">
                    <div class="row">
                        <?php if (@$_SESSION["logado"] == "true") { ?>
                            <div class="col-xl-6 col-md-12 mb-4">
                                <a href="php/salvarComputadorjapronto.php?computador=0"><button class="btn btn-success btn-md btn-block btn-lg" type="submit">Salvar Computador</button></a>
                            </div>
                        <?php } ?>
                        <div class="col-xl-6 col-md-12 mb-4">
                            <a href="montarComputador"><button class="btn btn-danger btn-md btn-block btn-lg" type="submit">Retornar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para o computador Avançado -->
<div class="modal fade mt-5" id="perfilAvancado" tabindex="-1" role="dialog" aria-labelledby="Endereço" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Perfil Basico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</0span>
                </button>
            </div>
            <div class="modal-body">
                <?php $produtos = $computador->carregarComputadores($results[1]['cod_computador']);
                $valorTotal = 0;
                foreach ($produtos as $produto) : ?>
                    <div class="card mt-2">
                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-12 d-flex justify-content-center">
                                <div class="img-square-wrapper">
                                    <img src="img<?= $produto['foto'] ?>" class="img-pc d-block mx-lg-auto img-fluid" alt="pc" width="150" height="150" loading="lazy">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 d-flex justify-content-center">
                                <div class="card-body" style="text-align: center; justify-content: center; align-items: center; display: flex;">
                                    <h6 class="card-title">
                                        <?= mb_strimwidth($produto['nome'], 0, 50, "...") ?>
                                    </h6>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-12 d-flex justify-content-center">
                                <div class="card-body" style="text-align: center; justify-content: center; align-items: center; display: flex;">
                                    <h5 class="card-title">
                                        <?= "R$ " . $computador->buscarMediaValor($produto['cod_produto']) ?>
                                    </h5>
                                    <?php $valorTotal += $computador->buscarMediaValor($produto['cod_produto']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
                                <h5 class="card-text">
                                    <?= "R$ " . $valorTotal ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-2">
                    <div class="row">
                        <?php if (@$_SESSION["logado"] == "true") { ?>
                            <div class="col-xl-6 col-md-12 mb-4">
                                <a href="php/salvarComputadorjapronto.php?computador=2"><button class="btn btn-success btn-md btn-block btn-lg" type="submit">Salvar Computador</button></a>
                            </div>
                        <?php } ?>
                        <div class="col-xl-6 col-md-12 mb-4">
                            <a href="montarComputador"><button class="btn btn-danger btn-md btn-block btn-lg" type="submit">Retornar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>