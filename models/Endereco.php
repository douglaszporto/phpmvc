<?php

use PHPMVC\Model as Model;
use PHPMVC\DB    as DB;

class EnderecoModel extends Model{


	public function __construct(){
		
		$this->table       = "nelogica.dbo.Endereco";
		$this->primaryKey  = "nEnderecoID";
		$this->cacheEnable = false;

		$this->DefineFields('nEnderecoID'   , DB::$DBTYPE_INT);
		$this->DefineFields('strCEP'        , DB::$DBTYPE_STRING);
		$this->DefineFields('nEstadoID'     , DB::$DBTYPE_INT);
		$this->DefineFields('strCidade'     , DB::$DBTYPE_STRING);
		$this->DefineFields('strBairro'     , DB::$DBTYPE_STRING);
		$this->DefineFields('strLogradouro' , DB::$DBTYPE_STRING);
		$this->DefineFields('strNumero'     , DB::$DBTYPE_STRING);
		$this->DefineFields('strComplemento', DB::$DBTYPE_STRING);

		parent::__construct();
	}

}

?>