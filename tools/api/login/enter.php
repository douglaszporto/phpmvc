<?php

	header('Content-Type: application/json');
	$data = json_decode(file_get_contents("php://input"));

	if(isset($data->user) && $data->user == 'douglas' && isset($data->pass) && $data->pass == '123456')
		die(json_encode(array('token'=>'128391794817')));

	die(json_encode(array('success'=>false)));

?>