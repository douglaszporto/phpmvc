<?php

	header('Content-Type: application/json');
	if(!isset($_GET["token"]))
		exit();

?>
{
	"title" : "Artigos",
	"registries" : "3 Registros",
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
			"label"  : "Título",
			"width"  : "70%"
		},
		{
			"column" : "data",
			"label"  : "Publicação",
			"width"  : "20%"
		}
	],
	"datagrid" : [
		{
			"id":"1",
			"nome":"Artigo com um título",
			"data":"01/01/2014"
		},
		{
			"id":"2",
			"nome":"Artigo com um título diferente",
			"data":"05/04/2014"
		},
		{
			"id":"3",
			"nome":"Artigo ou outro tipo de título",
			"data":"31/07/2014"
		},
		{
			"id":"4",
			"nome":"Algum nom bizaro",
			"data":"02/11/2014"
		}
	]
}