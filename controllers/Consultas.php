<?php

use PHPMVC\Controller as Controller;
use PHPMVC\View       as View;
use PHPMVC\DB         as DB;

class Consultas extends Controller {

	public function CEP($cep){

		$cep = (int)$cep;

		
		$db = DB::getInstance();

		$db->Query("
			SELECT
				ceps.strEndereco  AS endereco,
				bairros.strBairro AS bairro,
				cidades.strCidade AS cidade,
				ceps.strEstado    AS estado
			FROM 
				Site.dbo.EnderecosCeps ceps

				LEFT JOIN 
					Site.dbo.EnderecosBairros bairros
				ON
					bairros.nBairroID = ceps.nBairroID

				LEFT JOIN 
					Site.dbo.EnderecosCidades cidades
				ON
					cidades.nCidadeID = ceps.nCidadeID

			WHERE 
				ceps.nCep = '{$cep}'
		");

		if($result = $db->Fetch())
			exit(json_encode($result));

		$db->Query("
			SELECT
				''        AS endereco,
				''        AS bairro,
				strCidade AS cidade,
				strEstado AS estado
			FROM 
				Site.dbo.enderecosCidades
			WHERE 
				cep = '{$cep}'
		");
		if($result = $db->Fetch())
			exit(json_encode($result));

		exit(json_encode(array(
			'endereco' => '',
			'bairro'   => '',
			'cidade'   => '',
			'estado'   => ''
		)));
	}

}

?>