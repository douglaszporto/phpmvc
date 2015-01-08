<?php

// Require dos arquivos necessários
require_once dirname(__FILE__) . "/../../classes/DB.class.php";
require_once dirname(__FILE__) . "/classes/InsertAPI.php";

// Utilização dos namespaces
use \PHPMVC\DB as DB;
use \API\InsertAPI as Insert;

// Armazeno o tipo de requisição (GET/POST) e o módulo utilizado
$method = $_SERVER['REQUEST_METHOD'];
$module = $_GET["m"];

$insert = new Insert();

// Descubro quais classes já estão definidas
$classBefore = get_declared_classes();

// Carrego o módulo, caso ele exista
$fileModule = dirname(__FILE__) . "/modules/" . $_GET["m"] . ".php";
if(file_exists($fileModule)){
	require_once dirname(__FILE__) . "/classes/Module.php";
	require_once $fileModule;
}

// Descubro quais classes estão defnidas agora.
// A diferença entre os arrays me indica qual a classe que foi definida no arquivo de módulo.
$classAfter = get_declared_classes();
$classes    = array_values(array_diff($classAfter, $classBefore));

// Instancio a classe definida no módulo
// O indice 0 no vator de classes sempre é a classe Module.
$className = $classes[1];
$instancia = new $className();

$json = array();

if($method === 'GET'){

	// Obtenho o formulário de insert desta classe
	$instancia->InsertForm($insert);
	$json["form"] = $insert->BuildForm();
	
}else{

	$data = json_decode(file_get_contents("php://input"));

	$instancia->SetData($data);
	if(($before = $instancia->BeforeInsert()) === true){
		if(($ret = $instancia->Insert()) === true){
			$instancia->AfterInsert();
			$json["ok"]      = "1";
			$json["message"] = "Tudo OK. Registro inserido com sucesso ;)";
		}else{
			$json["ok"]      = "0";
			$json["message"] = is_string($ret) ? $ret : "Ops, não foi possível inserir o registro... :(";
		}
	}else{
		$json["ok"]      = "0";
		$json["message"] = is_string($before) ? $before : "Ops, problema antes de inserir o registro (provavelmente, em uma validação)";
	}

}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($json);

?>