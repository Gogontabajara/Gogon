<?php
if (isset($_SESSION['Cod_Autenticacao'])) {
    $sql = new PDO("mysql:host=localhost;dbname=gogon", "root", "");
    $stmt = $sql->query("SELECT * FROM tb_computadores_montado where cod_cliente = '$_SESSION[Cod_Autenticacao]'");
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $cod_computador = @$res[0]['cod_computador'];
    $cod_cliente = @$res[0]['cod_cliente'];
    $data_montagem = @$res[0]['data_montagem'];
    $valor_total = @$res[0]['valor_total'];
    $computadores = @count(@$res);
}
?>


<section class="banner_criarconta vh-100" style="background-image: url('img/banner.jpg');">
	<div class="container">
	<?php if (isset($_SESSION['Cod_Autenticacao'])) { ?>
		<div class="row">
			<div class="col-xl-12 col-md-12 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<a href="computadoresMontados">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Computadores Montados</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo @$computadores ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-chalkboard-teacher fa-2x text-success"></i>
							</div>
							</div>
						</div>
					</a>
					</div>
				</div>
			</div>
			<?php }?>
		<div class="row">
			<div class="col-xl-4 col-md-4 mb-4">
				<a href="escolherProcessador"><button class="btn btn-success btn-md btn-block btn-lg" type="submit">Montar um Computador</button></a>
			</div>
			<div class="col-xl-4 col-md-4 mb-4">
				<a href="computadoresJaProntos"><button class="btn btn-info btn-md btn-block btn-lg" type="submit">Computadores Ja Prontos</button></a>
			</div>
			<div class="col-xl-4 col-md-4 mb-4">
				<a href="naoSeiMontar"><button class="btn btn-danger btn-md btn-block btn-lg" type="submit">Nao sei como montar</button></a>
			</div>
		</div>
</section>
