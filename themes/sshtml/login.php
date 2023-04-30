<section class="banner_login vh-100" style="background-image: url('img/banner.jpg');">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-12 col-md-8 col-lg-6 col-xl-5">
				<div class="card shadow-2-strong" style="border-radius: 1rem;">
					<div class="card-body p-5 text-center">
						<div class="logo-purple">
							Login
							<br><br>
						</div>

						<?php
                        if(isset($_SESSION["Info"]) || isset($_SESSION["Erro"])){?>
                        <div class="alert alert-<?php echo @$_SESSION['Type'];?> alert-dismissible fade show" role="alert">
                            <strong><?php echo @$_SESSION["Info"];?></strong> <?php echo @$_SESSION["Erro"]; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                       <?php unset($_SESSION["Info"]); unset($_SESSION["Erro"]); unset($_SESSION['Type']);}?>

						<!-- Usuario -->
						<form class="form-outline mb-4" action="php/verificaLogin.php" method="post">
							<div class="form-group">
								<div class="form-group__input">
									<input class="form-control form-control-lg" type="Email" name="email"
										placeholder="Email" required="required" style="color: #1E1E1E;">
								</div>
							</div>
							<!-- senha -->
							<div class="form-outline mb-4">
								<div class="form-group__input">
									<input class="form-control form-control-lg" placeholder="Senha" id="password-field"
										type="password" name="password" placeholder="" required="required"
										style="color: #1E1E1E;">
								</div>
							</div>
							
							<!-- Esqueci a senha -->
							<div class="d-flex justify-content-center mb-4">
								<div class="gogon-wc__check-inline">
									<div class="gogon-wc__bottom">
										<a href="login.html" class="forgot-pass">Esqueci minha senha</a>
									</div>
								</div>
							</div>
							<!-- Form Group -->

							<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

							<br>
							<!-- Form Group -->
							<div class="d-flex justify-content-start mb-4">
								<div class="">
									<p class="d-flex justify-content-start mb-4">Não tem uma conta? &nbsp<a
											href="criarContaPF">Crie aqui</a>
									</p>
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