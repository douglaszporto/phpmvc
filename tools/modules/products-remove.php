<?php

	if(empty($_POST["product"]))
		die(json_encode(array(
			'status'  => 500,
			'message' => "Você não definiu produto para remover"
		)));

	$id = (int)$_POST["product"];

	$db = \PHPMVC\DB::getInstance();
	$success = $db->Query("DELETE FROM Site.dbo.produtos WHERE id = '{$id}'");
	if(!$success)
		echo json_encode(array(
			'status'  => 500,
			'message' => "Ocorreu algum erro ao tentar remover o produto."
		));
	else
		echo json_encode(array(
			'status'  => 200,
			'message' => "Produto removido com sucesso"
		));

?>