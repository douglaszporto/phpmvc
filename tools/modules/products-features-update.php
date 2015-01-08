<?php

	$erroMsg = "";

	if(empty($_POST["titulo"]))
		$erroMsg .= "O titulo da característica não foi definido<br/>";
	if(empty($_POST["identificador"]))
		$erroMsg .= "O identificador da característica não foi definido<br/>";
	if(empty($_POST["descricao"]))
		$erroMsg .= "A descrição da característica não foi definida<br/>";
	if(empty($_POST["texto"]))
		$erroMsg .= "O texto da característica não foi definida<br/>";

	if(!empty($erroMsg)){
		die(json_encode(array(
			'status'  => 500,
			'message' => $erroMsg
		)));
	}

	$id            = (int)$_POST["id"];
	$produto_id    = (int)$_POST["produto_id"];
	$identificador = utf8_decode(str_replace("'", "''", $_POST["identificador"]));
	$titulo        = utf8_decode(str_replace("'", "''", $_POST["titulo"]));
	$descricao     = utf8_decode(str_replace("'", "''", $_POST["descricao"]));
	$texto         = utf8_decode(str_replace("'", "''", $_POST["texto"]));

	if(empty($_POST["miniatura"]))
		$miniatura = 'NULL';
	else
		$miniatura = "'".utf8_decode(str_replace("'", "''", $_POST["miniatura"]))."'";

	$db = \PHPMVC\DB::getInstance();
	if($id == 0)
		$success = $db->Query("INSERT INTO Site.dbo.produtos_caracteristicas(produto_id,identificador,titulo,descricao,texto,miniatura) VALUES ('{$produto_id}','{$identificador}','{$titulo}','{$descricao}','{$texto}','{$miniatura}')");
	else
		$success = $db->Query("UPDATE Site.dbo.produtos_caracteristicas SET identificador = '{$identificador}', titulo = '{$titulo}', descricao = '{$descricao}', texto = '{$texto}', miniatura = {$miniatura} WHERE id = '$id'");
	if(!$success)
		echo json_encode(array(
			'status'  => 500,
			'message' => "Ocorreu algum erro ao tentar ".($id == 0 ? 'inserir' : 'alterar' )." o produto."
		));
	else
		echo json_encode(array(
			'status'  => 200,
			'id'      => $id == 0 ? $db->InsertedId() : $id,
			'action'  => $id == 0 ? 'I' : 'U',
			'message' => "Produto ".($id == 0 ? 'inserido' : 'alterado' )." com sucesso"
		));

?>