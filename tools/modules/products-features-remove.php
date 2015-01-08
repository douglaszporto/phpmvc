<?php

	if(empty($_POST["id"]))
		die(json_encode(array(
			'status'  => 500,
			'message' => "Você não definiu uma característica para remover"
		)));

	$id = (int)$_POST["id"];

	$db = \PHPMVC\DB::getInstance();
	$success = $db->Query("DELETE FROM Site.dbo.produtos_caracteristicas WHERE id = '{$id}'");
	if(!$success)
		echo json_encode(array(
			'status'  => 500,
			'message' => "Ocorreu algum erro ao tentar remover a característica."
		));
	else
		echo json_encode(array(
			'status'  => 200,
			'message' => "Característica removida com sucesso"
		));

?>