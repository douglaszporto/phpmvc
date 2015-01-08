<?php

use PHPMVC\Model as Model;
use PHPMVC\DB    as DB;

class ProdutosModel extends Model{


	public function __construct(){
		
		$this->table      = "Site.dbo.produtos";
		$this->primaryKey = "nProdutoID";

		$this->DefineFields('nProdutoID'           , DB::$DBTYPE_INT    );
		$this->DefineFields('strIdentificador'     , DB::$DBTYPE_STRING );
		$this->DefineFields('strNome'              , DB::$DBTYPE_STRING );
		$this->DefineFields('strDescricaoIndice'   , DB::$DBTYPE_STRING );
		$this->DefineFields('strDescricaoCompleta' , DB::$DBTYPE_STRING );
		$this->DefineFields('strSlogan'            , DB::$DBTYPE_STRING );
		$this->DefineFields('strImagemIndice'      , DB::$DBTYPE_STRING );
		$this->DefineFields('strImagemDescricao'   , DB::$DBTYPE_STRING );
		$this->DefineFields('strLinkDownload'      , DB::$DBTYPE_STRING );
		$this->DefineFields('strCondicaoEspecial'  , DB::$DBTYPE_STRING );
		$this->DefineFields('bAtivo'               , DB::$DBTYPE_BOOLEAN);
		$this->DefineFields('nProdutoSoftwareID'   , DB::$DBTYPE_INT    );
		$this->DefineFields('nProdutoComercialID'   , DB::$DBTYPE_INT    );

		parent::__construct();
	}

}

?>