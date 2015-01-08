<?php

use PHPMVC\Model as Model;
use PHPMVC\DB    as DB;

class ConhecimentoConteudoModel extends Model{


	public function __construct(){
		
		$this->table 		= "Site.dbo.ConhecimentoConteudo";
		$this->primaryKey 	= "nConteudoID";
		
		$this->DefineFields('nConteudoID'     , DB::$DBTYPE_INT   );
		$this->DefineFields('strTitulo'       , DB::$DBTYPE_STRING);
		$this->DefineFields('strDescricao'    , DB::$DBTYPE_STRING);
		$this->DefineFields('strHTML'         , DB::$DBTYPE_STRING);
		$this->DefineFields('strIdentificador', DB::$DBTYPE_STRING);
		
		parent::__construct();
	}

}

?>