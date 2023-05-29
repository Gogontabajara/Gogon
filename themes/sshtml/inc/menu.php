<nav id="menu" class="navbar navbar-expand-lg navbar-purple navbar-light">
    <div class="wrapper"></div>
    <div class="container-fluid all-show">
        <div class="logo-purple">
            <a href="index">GOGON</a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <div class="col3"></div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index">Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#sobrenos">Sobre nós</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="montarComputador">Montar Computador</a>
                </li>
                
                <?php if (@$_SESSION["logado"] == "true") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="computadoresMontados">Computadores Montados</a>
                    </li>

                <?php } ?>

                <?php if (@$_SESSION["logado"] == "true" && @$_SESSION["Tipo"] == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrarProduto">Cadastrar Produtos</a>
                    </li>
                <?php } ?>

            </ul>



            <div class="d-inline flex-column sim">
                <?php if (@$_SESSION["logado"] == "true") { ?>
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="btn nav-link-btn" href=<?php echo @$_SESSION["Tipo"] == 1 ? "editarPerfilPF" : "editarPerfilPJ"?>>
                                Editar Perfil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn nav-link-btn" href="php/sair.php">Sair</a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <a class="btn nav-link-btn" href="login">Entrar / Criar Conta</a>

                <?php } ?>
            </div>
        </div>
    </div>
</nav>