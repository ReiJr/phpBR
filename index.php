<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$text = $json->queryResult->queryText;
	//$text = $json->queryResult->parameters->text;
	$servico = $json->queryResult->parameters->servico;
	switch ($text) {
		case 'Eu quero arrumar minha torneira':
			$speech = "Olá, a Porto Faz consegue ajudar com $servico, quer mais detalhe que sobre o serviço?";
			break;

		case 'Eu quero arrumar meu fogão':
			$speech = "Olá, a Porto Faz consegue ajudar com $servico, quer mais detalhe que sobre o serviço?";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Desculpe, eu não entendi, por favor pode repetir?";
			break;
	}

	$response = new \stdClass();
	$response->fulfillmentText = $speech;
	//$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
