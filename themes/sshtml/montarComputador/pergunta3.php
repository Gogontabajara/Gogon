<?php
if (isset($_GET['pontuaçao2'])) {
	$_SESSION['pontuaçao'] += $_GET['pontuaçao2'];
} else {
	header("Location: pergunta2");
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
								<div class="text-xs font-weight-bold text-info text-uppercase">3.Quais atividades de trabalho você realizará no computador?</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-md-4 mb-4">
				<a href="pergunta4?pontuaçao3=10"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">Navegar na internet e enviar e-mails</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-md-4 mb-4">
				<a href="pergunta4?pontuaçao3=20"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">Trabalhar com aplicativos de escritório</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-md-4 mb-4">
				<a href="pergunta4?pontuaçao3=30"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">Edição de fotos ou vídeos</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-md-4 mb-4">
				<a href="pergunta4?pontuaçao3=40"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">Programação ou design gráfico avançado</button></a>
			</div>
		</div>
</section>