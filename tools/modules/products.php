<?php
/**
* 
*	Name:        Products
*	Description: Este módulo faz o CRUD dos produtos e de suas caracteristicas
*	
*	Creation: 22/09/2014
*	Author:   Douglas Zanotta
*	
*/
?>
<div id="title" style="position:relative;">Produtos<div class="button product-add" title="Adicionar">&#xe025;</div></div>
<?php

require_once dirname(__FILE__) . "/../../config.php";
require_once dirname(__FILE__) . "/../../classes/DB.class.php";

$db = \PHPMVC\DB::getInstance();
$db->Query("SELECT * FROM Site.dbo.produtos");
while($produtos = $db->Fetch()):
	$produtos = @array_map('utf8_encode',$produtos);
	$link = SITE_DOMAIN.'/produtos/'.$produtos["identificador"];
?>
	<div class="product" data-form='<?php echo $produtos["id"]; ?>'>
		<h2><?php echo $produtos["nome"]; ?></h2>
		<a target="_blank" href="<?php echo $link; ?>"><?php echo $link; ?>/</a>
		<div class="button product-edit" title="Editar">&#xe1e6;</div>
		<div class="button product-features" title="Características">&#xe0b9;</div>
		<div class="button product-remove" title="Remover">&#xe049;</div>
	</div>
<? endwhile; ?>