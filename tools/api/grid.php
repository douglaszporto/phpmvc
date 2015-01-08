<?php

// Require dos arquivos necessários
require_once dirname(__FILE__) . "/../../classes/DB.class.php";
require_once dirname(__FILE__) . "/classes/GridAPI.php";

// Utilização dos namespaces
use \PHPMVC\DB as DB;
use \API\GridAPI as Grid;

$grid = new Grid();

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

// Chamo o método grid desta classe
$instancia->Grid($grid);

//Instancia o banco e executa a query definida no módulo (se existir)
$query  = $grid->GetQuery();
$data   = array();

if(!empty($query)){
	$db = DB::getInstance();
	$db->Query($query);

	while($row = $db->Fetch())
		$data[] = $grid->ResolveNames($row);
}

$json = array();
$json["title"]      = $grid->GetTitle();
$json["operations"] = $grid->GetOperations();
$json["grid"]       = $grid->GetLayout();
$json["datagrid"]   = $data;

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($json);

?>