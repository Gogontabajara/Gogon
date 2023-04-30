<?php
// Recebe o CEP enviado pelo AJAX
$cep = $_POST['cep'];

// Remove qualquer caractere não numérico do CEP
$cep = preg_replace('/[^0-9]/', '', $cep);

// Consulta o webservice do ViaCEP
$url = "https://viacep.com.br/ws/{$cep}/json/";
$response = file_get_contents($url);
// Decodifica o JSON e verifica se houve erro
$json = json_decode($response, true);
if (!$json) {
	// Se houve erro, retorna um código de erro e a mensagem
	http_response_code(500);
	echo "Erro ao consultar Cpf";
	exit();
}

// Cria um array com as informações que queremos retornar
$data = array(
	"rua" => $json['logradouro'],
    "bairro" => $json['bairro'],
    "cidade" => $json['localidade'],
    "uf" => $json['uf']
);

// Retorna os dados em formato JSON
header('Content-Type: application/json');
echo json_encode($data);