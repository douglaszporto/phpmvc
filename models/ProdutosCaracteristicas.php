<?php

use PHPMVC\Model as Model;
use PHPMVC\DB    as DB;

class ProdutosCaracteristicasModel extends Model{


	public function __construct(){
		
		$this->table      = "Site.dbo.ProdutosCaracteristicas";
		$this->primaryKey = "nCaracteristicaID";

		$this->DefineFields('nProdutoID'        , DB::$DBTYPE_INT    );
		$this->DefineFields('strIdentificador'  , DB::$DBTYPE_STRING );
		$this->DefineFields('strTitulo'         , DB::$DBTYPE_STRING );
		$this->DefineFields('strDescricao'      , DB::$DBTYPE_STRING );
		$this->DefineFields('strTexto'          , DB::$DBTYPE_STRING );
		$this->DefineFields('strMiniatura'      , DB::$DBTYPE_STRING );


		parent::__construct();
	}

}

?>

