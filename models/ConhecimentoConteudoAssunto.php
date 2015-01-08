<?php

use PHPMVC\Model as Model;
use PHPMVC\DB    as DB;

class ConhecimentoConteudoAssuntoModel extends Model{


	public function __construct(){
		
		$this->table 		= "Site.dbo.ConhecimentoConteudoAssunto";
		$this->primaryKey 	= "nConteudoAssuntoID";

		$this->DefineFields('nConteudoID'			, DB::$DBTYPE_INT);
		$this->DefineFields('nAssuntoID'			, DB::$DBTYPE_INT);
		$this->DefineFields('nAnterior'				, DB::$DBTYPE_INT);	
		$this->DefineFields('nProximo'				, DB::$DBTYPE_INT);			

		parent::__construct();
	}

}

?>