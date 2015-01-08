<?php

	header('Content-Type: application/json');
	if(!isset($_GET["token"]))
		exit();


	$menu = array();

	$menu[] = array(
		"icon"   => "&#xe01b;",
		"label"  => "Produtos",
		"desc"   => "Cadastro de Produtos",
		"module" => "produtos.js"
	);

	$menu[] = array(
		"icon"   => "&#xe0d8;",
		"label"  => "Artigos",
		"desc"   => "Artigos",
		"module" => "artigos.js"
	);

	die(json_encode($menu));

?>