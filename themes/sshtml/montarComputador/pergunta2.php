<?php
if (isset($_GET['pontuaçao1'])) {
	$_SESSION['pontuaçao'] = 0;
	$_SESSION['pontuaçao'] += $_GET['pontuaçao1'];
} else {
	header("Location: pergunta1");
}
?>

<section class="banner_criarconta vh-100" style="background-image: url('img/banner.jpg');">
	<div class="container py-5 h-100">
		<div class="row">
			<div class="col-xl-12 col-md-12 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-xl-12">
								<div class="text-xs font-weight-bold text-info text-uppercase">2. Qual é o seu orçamento para o computador? </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-md-4 mb-4">
				<a href="pergunta3?pontuaçao2=10"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">Menos de R$ 2.000</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-md-4 mb-4">
				<a href="pergunta3?pontuaçao2=20"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">R$ 2.000 - R$ 5.000</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-md-4 mb-4">
				<a href="pergunta3?pontuaçao2=30"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">R$ 5.000 - R$ 10.000</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-md-4 mb-4">
				<a href="pergunta3?pontuaçao2=40"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">Mais de R$ 10.000</button></a>
			</div>
		</div>
</section>