<?php
if (isset($_GET['pontuaçao3'])) {
	$_SESSION['pontuaçao'] += $_GET['pontuaçao3'];
} else {
	header("Location: pergunta3");
}
?>
<section class="banner_criarconta vh-100">
	<div class="container py-5 h-100">
		<div class="row">
			<div class="col-xl-12 col-md-12 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-xl-12">
								<div class="text-xs font-weight-bold text-info text-uppercase">4.Você pretende realizar tarefas de edição de vídeo ou renderização 3D?</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-md-4 mb-4">
				<a href="resumoPerguntas?pontuaçao4=10"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">Não, não tenho interesse em tarefas de edição ou renderização</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-md-4 mb-4">
				<a href="resumoPerguntas?pontuaçao4=20"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">Talvez ocasionalmente</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-md-4 mb-4">
				<a href="resumoPerguntas?pontuaçao4=30"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">Sim, com projetos de média complexidade</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-md-4 mb-4">
				<a href="resumoPerguntas?pontuaçao4=40"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">Sim, com projetos profissionais e de alta complexidade</button></a>
			</div>
		</div>
</section>