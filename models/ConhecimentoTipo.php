<?php

use PHPMVC\Model as Model;
use PHPMVC\DB    as DB;

class ConhecimentoTipoModel extends Model{


	public function __construct(){
		
		$this->table 		= "Site.dbo.ConhecimentoTipo";
		$this->primaryKey 	= "nTipoID";

		$this->DefineFields('nTipoID'		  , DB::$DBTYPE_INT   );
		$this->DefineFields('strTitulo'		  , DB::$DBTYPE_STRING);
		$this->DefineFields('strDescricao'	  , DB::$DBTYPE_STRING);	
		$this->DefineFields('strIdentificador', DB::$DBTYPE_STRING);	

		parent::__construct();
	}

}

?>