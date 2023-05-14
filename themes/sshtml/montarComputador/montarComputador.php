<?php
spl_autoload_register(function($class_name){
  $filename = "php/".$class_name.".class.php";
  if(file_exists($filename)){
      require_once($filename);
  }
});

$_SESSION['maquina']['processador'] = @$_POST['processador'];
$_SESSION['maquina']['placamae'] = @$_POST['processador'];
$_SESSION['maquina']['memoria'] = @$_POST['processador'];
$_SESSION['maquina']['placadevideo'] = @$_POST['processador'];

$computador = new computador();
$processadores = $computador->selecionarProcessador();

?>

<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form class="form-outline mb-4" action="montarComputador" method="post">
	<label for="cars">Escolha o processador</label>
	<select name="processador" id="processador" disabled>
	<?php foreach ($processadores as $processador): ?>
	<option value="<?= $processador['socket_processador']?>"><?= $processador['nome'] ?></option>
	<?php endforeach; ?>
	</select>
	<button type="submit">Escolher</button>
</form>

<?php
$socket = @$_POST['processador'];
if(isset($socket)){
	$placamaes = $computador->selecionarPlacaMae($socket); ?>
<form class="form-outline mb-4" action="montarComputador" method="post">
	<label for="cars">Escolha a placa mae</label>
	<select name="placamae" id="placamae">
	<?php foreach ($placamaes as $placamae): ?>
	<option value="<?= $placamae['socket_processador']?>"><?= $placamae['nome'] ?></option>
	<?php endforeach; ?>
	</select>
	<button type="submit">Escolher</button>
</form>
<?php }?>

<!-- Processador -->
<label for="processador">Selecione o processador:</label>
<select name="processador" id="processador">
    <option value="">Selecione</option>
    <option value="processador1">Processador 1</option>
    <option value="processador2">Processador 2</option>
</select>

<!-- Placa mãe -->
<label for="placa-mae" class="hidden">Selecione a placa mãe:</label>
<select name="placa-mae" id="placa-mae" class="hidden">
    <option value="">Selecione</option>
    <option value="placa-mae1">Placa mãe 1</option>
    <option value="placa-mae2">Placa mãe 2</option>
</select>

<!-- Memória RAM -->
<label for="memoria-ram" class="hidden">Selecione a memória RAM:</label>
<select name="memoria-ram" id="memoria-ram" class="hidden">
    <option value="">Selecione</option>
    <option value="memoria-ram1">Memória RAM 1</option>
    <option value="memoria-ram2">Memória RAM 2</option>
</select>

<!-- Placa de vídeo -->
<label for="placa-video" class="hidden">Selecione a placa de vídeo:</label>
<select name="placa-video" id="placa-video" class="hidden">
    <option value="">Selecione</option>
    <option value="placa-video1">Placa de vídeo 1</option>
    <option value="placa-video2">Placa de vídeo 2</option>
</select>

<!-- Armazenamento -->
<label for="armazenamento" class="hidden">Selecione o armazenamento:</label>
<select name="armazenamento" id="armazenamento" class="hidden">
    <option value="">Selecione</option>
    <option value="armazenamento1">Armazenamento 1</option>
    <option value="armazenamento2">Armazenamento 2</option>
</select>

<!-- Fonte de alimentação -->
<label for="fonte" class="hidden">Selecione a fonte de alimentação:</label>
<select name="fonte" id="fonte" class="hidden">
    <option value="">Selecione</option>
    <option value="fonte1">Fonte de alimentação 1</option>
    <option value="fonte2">Fonte de alimentação 2</option>
</select>

<!-- Gabinete -->
<label for="gabinete" class="hidden">Selecione o gabinete:</label>
<select name="gabinete" id="gabinete" class="hidden">
    <option value="">Selecione</option>
    <option value="gabinete1">Gabinete 1</option>
    <option value="gabinete2">Gabinete 2</option>
</select>
<br><br><br><br><br><br><br><br><br><br><br><br><br>

<script>
// Seleciona a primeira peça
var pecaSelecionada = "processador";

// Função para carregar as opções de uma peça
function carregarPecas(peca, filtroAnterior = null) {
    // Cria o objeto de filtros
    var filtros = {};

    // Adiciona o filtro da categoria atual
    filtros[peca] = true;

    // Se houver filtro anterior, adiciona ele ao objeto
    if (filtroAnterior !== null) {
        filtros[peca + '-anterior'] = filtroAnterior;
    }

    // Faz a requisição AJAX
    $.ajax({
        url: 'carregar_pecas.php',
        method: 'post',
        data: {
            categoria: peca,
            filtros: filtros
        },
        success: function(data) {
            // Insere as opções no select correspondente
            $('#' + peca).html(data);
        }
    });
}
console.log(pecaSelecionada);
// Carrega as opções do primeiro select
carregarPecas(pecaSelecionada);

// Evento de mudança de seleção
$('select').on('change', function() {
    // Seleciona a próxima peça com base na seleção atual
    switch (pecaSelecionada) {
        case 'processador':
            pecaSelecionada = 'placa-mae';
			console.log(pecaSelecionada);
            break;
        case 'placa-mae':
            pecaSelecionada = 'memoria-ram';
			console.log(pecaSelecionada);
            break;
        case 'memoria-ram':
            pecaSelecionada = 'placa-video';
			console.log(pecaSelecionada);
            break;
        case 'placa-video':
            pecaSelecionada = 'armazenamento';
			console.log(pecaSelecionada);
            break;
        case 'armazenamento':
            pecaSelecionada = 'fonte';
			console.log(pecaSelecionada);
            break;
        case 'fonte':
            pecaSelecionada = 'gabinete';
			console.log(pecaSelecionada);
            break;
        case 'gabinete':
			console.log(pecaSelecionada);
            // Todas as peças foram selecionadas, fazer algo com as seleções
            return;
    }

    // Obtém o valor selecionado na peça atual
    var valorSelecionado = $('#' + pecaSelecionada + ' option:selected').val();

    // Remove todas as opções do próximo select
    $('#' + pecaSelecionada + ' option').remove();

    // Carrega as opções da próxima peça com base na seleção atual
    carregarPecas(pecaSelecionada, valorSelecionado);
});
</script>