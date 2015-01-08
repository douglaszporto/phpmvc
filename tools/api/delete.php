<?php

// Require dos arquivos necessários
require_once dirname(__FILE__) . "/../../classes/DB.class.php";

// Utilização dos namespaces
use \PHPMVC\DB as DB;

// Armazeno o módulo utilizado
$module = $_GET["m"];

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

$data = json_decode(file_get_contents("php://input"));

$instancia->SetData($data);
if(($before = $instancia->BeforeDelete()) === true){
	if(($ret = $instancia->Delete()) === true){
		$instancia->AfterDelete();
		$json["ok"]      = "1";
	}else{
		$json["ok"]      = "0";
		$json["message"] = is_string($ret) ? $ret : "Ops, não foi possível remover algum registro... :(";
	}
}else{
	$json["ok"]      = "0";
	$json["message"] = is_string($before) ? $before : "Ops, problema antes de remove algum registro (provavelmente, em uma validação)";
}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($json);

?>