<?php

use PHPMVC\Model as Model;
use PHPMVC\DB    as DB;

class ExampleModel extends Model{


	public function __construct(){
		
		$this->table      = "MyTableName";
		$this->primaryKey = "myPrimaryKeyField";

		$this->DefineFields('myPrimaryKeyField' , DB::$DBTYPE_INT     );
		$this->DefineFields('oneIntegarValue  ' , DB::$DBTYPE_INT     );
		$this->DefineFields('oneStringField'    , DB::$DBTYPE_STRING  );
		$this->DefineFields('oneFloatField'     , DB::$DBTYPE_FLOAT   );
		$this->DefineFields('oneTextField'      , DB::$DBTYPE_TEXT    );
		$this->DefineFields('oneDateField'      , DB::$DBTYPE_DATE    );
		$this->DefineFields('oneDatetimeField'  , DB::$DBTYPE_DATETIME);
		$this->DefineFields('oneBooleanField'   , DB::$DBTYPE_BOOLEAN );
		$this->DefineFields('onePasswordField'  , DB::$DBTYPE_PASSWORD);

		parent::__construct();
	}

}

?>

