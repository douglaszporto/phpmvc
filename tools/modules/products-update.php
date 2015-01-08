<?php

	$erroMsg = "";

	if(empty($_POST["input-nome"]))
		$erroMsg .= "O nome do produto não foi definido<br/>";
	if(empty($_POST["input-identificador"]))
		$erroMsg .= "O identificador do produto não foi definido<br/>";
	if(empty($_POST["input-descricao-indice"]))
		$erroMsg .= "A descrição no indice não foi definida<br/>";
	if(empty($_POST["input-descricao-completa"]))
		$erroMsg .= "A descrição completa não foi definida<br/>";

	if(!empty($erroMsg)){
		die(json_encode(array(
			'status'  => 500,
			'message' => $erroMsg
		)));
	}

	$id                = (int)$_POST["input-id"];
	$testavel          = $_POST["input-testavel"]  == '1' ? '1' : '0';
	$assinavel         = $_POST["input-assinavel"] == '1' ? '1' : '0';
	$identificador     = utf8_decode(str_replace("'", "''", $_POST["input-identificador"]));
	$nome              = utf8_decode(str_replace("'", "''", $_POST["input-nome"]));
	$descricaoIndice   = utf8_decode(str_replace("'", "''", $_POST["input-descricao-indice"]));
	$descricaoCompleta = utf8_decode(str_replace("'", "''", $_POST["input-descricao-completa"]));

	$db = \PHPMVC\DB::getInstance();
	if($id == 0)
		$success = $db->Query("INSERT INTO Site.dbo.produtos(identificador,nome,descricaoIndice,descricaoCompleta,testavel,assinavel) VALUES ('{$identificador}','{$nome}','{$descricaoIndice}','{$descricaoCompleta}','{$testavel}','{$assinavel}')");
	else
		$success = $db->Query("UPDATE Site.dbo.produtos SET identificador = '{$identificador}', nome = '{$nome}', descricaoIndice = '{$descricaoIndice}', descricaoCompleta = '{$descricaoCompleta}', testavel = '{$testavel}', assinavel = '{$assinavel}' WHERE id = '$id'");
	if(!$success)
		echo json_encode(array(
			'status'  => 500,
			'message' => "Ocorreu algum erro ao tentar ".($id == 0 ? 'inserir' : 'alterar' )." o produto."
		));
	else
		echo json_encode(array(
			'status'  => 200,
			'message' => "Produto ".($id == 0 ? 'inserido' : 'alterado' )." com sucesso"
		));

?>