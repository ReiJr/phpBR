<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->text;
	
	switch ($text) {
		case 'Quero arrumar minha torneira':
			$speech = "Olá, a Porto Faz consegue ajudar com arrumar torneira, quer mais detalhe que sobre o serviço?";
			break;

		case 'Quero arrumar meu fogão':
			$speech = "Olá, a Porto Faz consegue ajudar com arrumar fogão, quer mais detalhe que sobre o serviço?";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}
*/
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
