<?php

// Obtém o CNPJ enviado pela requisição AJAX
$cnpj = $_POST['cnpj'];

// Faz a consulta na API da Speedio
$url = "https://api-publica.speedio.com.br/buscarcnpj?cnpj=" . $cnpj;
$response = file_get_contents($url);

// Decodifica o JSON e verifica se houve erro
$json = json_decode($response, true);
if (!$json) {
	// Se houve erro, retorna um código de erro e a mensagem
	http_response_code(500);
	echo "Erro ao consultar CNPJ";
	exit();
}

// Cria um array com as informações que queremos retornar
$data = array(
	"nome" => $json['RAZAO SOCIAL'],
	"fantasia" => $json['NOME FANTASIA']
);

// Retorna os dados em formato JSON
header('Content-Type: application/json');
echo json_encode($data);