<?php

	if(isset($_POST["feature"]) && !empty($_POST["feature"])){
		$feature_id = str_replace("'","''",addslashes($_POST["feature"]));

		$db = \PHPMVC\DB::getInstance();
		$db->Query("SELECT * FROM Site.dbo.produtos_caracteristicas WHERE id = '$feature_id'");
		$result = $db->Fetch();

		if(!$result)
			die(json_encode(array("status"=>500,"message"=>"A característica requisitada parece não existir...")));

		die(json_encode(array(
			"status"        => 200,
			"id"            => $result["id"],
			"identificador" => $result["identificador"],
			"titulo"        => utf8_encode($result["titulo"]),
			"descricao"     => utf8_encode($result["descricao"]),
			"texto"         => utf8_encode($result["texto"]),
			"miniatura"     => utf8_encode($result["miniatura"])
		)));
	}else{
		die(json_encode(array("status"=>500,"message"=>"Você não especificou característica para visualizar")));
	}
	

?>