<?php

	header('Content-Type: application/json');
	if(!isset($_GET["token"]))
		exit();

?>
{
	"title" : "Produtos",
	"registries" : "99 Registros",
	"operations" : [
		{
			"label" : "Adicionar",
			"action" : "alert('Cliquei no adicionar')",
			"visibility" : 7,
			"icon" : "&#xe025;"
		},
		{
			"label" : "Editar",
			"action" : "alert('Cliquei no editar')",
			"visibility" : 2,
			"icon" : "&#xe01d;"
		},
		{
			"label" : "Excluir",
			"action" : "alert('Cliquei no excluir')",
			"visibility" : 6,
			"icon" : "&#xe157;"
		},
		{
			"label" : "Visualizar",
			"action" : "alert('Cliquei no visualizar')",
			"visibility" : 2,
			"icon" : "&#xe0bf;"
		}
	],
	"grid" : [
		{
			"column" : "id",
			"label"  : "Código",
			"width"  : "10%"
		},
		{
			"column" : "nome",
			"label"  : "Produto",
			"width"  : "85%"
		}
	],
	"datagrid" : [
		{
			"key":1,
			"id":"1",
			"nome":"Nome do produto 1"
		},
		{
			"key":2,
			"id":"2",
			"nome":"Nome do produto 2"
		},
		{
			"key":3,
			"id":"3",
			"nome":"Nome do produto 3"
		},
		{
			"key":4,
			"id":"4",
			"nome":"Nome do produto 4"
		}
	]
}