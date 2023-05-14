<!-- header -->
<header>
   <!-- header inner -->
   <div class="header">
      <div class="container-fluid">
         <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
               <div class="full">
                  <div class="center-desk">
                     <div class="logo">
                        <a href="index">GOGON</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
               <nav class="navigation navbar navbar-expand-md navbar-dark ">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                     aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="index">Inicio</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="about.html">GOGON</a>
                        </li>

                        <?php if(@$_SESSION["logado"] == "true"){?>
                        <li class="nav-item">
                           <a class="nav-link" href="product.html">Favoritos</a>
                        </li>
                        <?php }?>

                        <?php if(@$_SESSION["logado"] == "true" && @$_SESSION["Tipo"] == 2){?>
                        <li class="nav-item">
                           <a class="nav-link" href="product.html">Lojas</a>
                        </li>
                        <?php }?>

                        <li class="nav-item">
                           <a class="nav-link" href="escolherProcessador">Montar Computador</a>
                        </li>

                        <!--<li class="nav-item d_none">
                                 <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                              </li>-->

                        <?php if(@$_SESSION["logado"] == "true"){?>
                           <li class="nav-item d_none">
                              <a class="nav-link" href=<?php echo @$_SESSION["Tipo"] == 1 ? "editarPerfilPF" : "editarPerfilPJ"?>><span class="material-symbols-outlined" style="font-size:32px;">
                                 account_circle
                              </span></a>
                        </li>
                        <?php } else{?>
                           <li class="nav-item">
                              <a class="nav-link" href="login">Entrar</a>
                           </li>
                        <?php }?>

                        <?php if(@$_SESSION["logado"] == "true"){?>
                           <li class="nav-item">
                              <a class="nav-link" href="php/sair.php">Sair</a>
                           </li>
                        <?php }else{?>
                           <li class="nav-item">
                              <a class="nav-link" href="criarContaPF">Criar conta</a>
                           </li>
                        <?php }?>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- end header inner -->
<!-- end header -->