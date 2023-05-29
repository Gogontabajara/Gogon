<?php 
    $_SESSION['maquina']['processador'] = @$_POST['processador'];
    spl_autoload_register(function($class_name){
        $filename = "php/".$class_name.".class.php";
        if(file_exists($filename)){
            require_once($filename);
        }
      });

        $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
        $stmt = $sql->query("SELECT * FROM tb_computadores_montado where cod_cliente = ");
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $computador = new computador();
?>

<div class="box-white">
	<h1 class="h1-purple text-center">Escolha um Computador</h1>
	<p style="text-align: center; margin:5px 250px 10px 250px;">Escolha o computador ideal para atender às suas necessidades atuais entre três opções: básica, média e avançada. Selecione o perfil que melhor se encaixe no seu uso</p>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="box-part-purple text-center">
					<img src="img/icons/pc-purple.png" class="circulo d-block mx-lg-auto img-fluid" alt="pc" width="300"
						height="500" loading="lazy">
					<div class="title">
						<h4 class="text-white">Perfil Basico</h4>
					</div>
					<div class="text">
						<span class="text-white">Um computador básico é projetado para tarefas cotidianas, como navegação na web, uso de aplicativos de escritório e reprodução de mídia, enviar e-mails e realizar tarefas de produtividade básicas. </span>
					</div>
					<a class="btn nav-link-btn" href="computadoresJaProntos">SELECIONAR</a>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="box-part-purple text-center">
					<img src="img/icons/processor-purple.png" class="circulo d-block mx-lg-auto img-fluid" alt="pc" width="300"
						height="500" loading="lazy">
					<div class="title">
						<h4 class="text-white">Perfil Medio</h4>
					</div>
					<div class="text">
						<span class="text-white">Um computador médio é capaz de lidar com várias atividades simultaneamente, como navegação na web, edição de documentos, reprodução de mídia e até mesmo alguns jogos leves.</span>
					</div>
					<a class="btn nav-link-btn" href="escolherProcessador">SELECIONAR</a>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="box-part-purple text-center">
					<img src="img/icons/question-purple.png" class="circulo d-block mx-lg-auto img-fluid" alt="pc" width="300"
						height="500" loading="lazy">
					<div class="title">
						<h4 class="text-white">Perfil Avançado</h4>
					</div>
					<div class="text">
						<span class="text-white">Um computador avançado é projetado para oferecer um desempenho de alto nível em jogos exigentes, edição de vídeo, modelagem 3D e outras tarefas intensivas, proporcionando uma experiência excepcionalmente poderosa e fluida. </span>
					</div>
					<a class="btn nav-link-btn" href="naoSeiMontar">SELECIONAR</a>
				</div>
			</div>
		</div>
	</div>
</div>

