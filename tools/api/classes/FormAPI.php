<?php

namespace API;

define('FORM_TYPE_TEXT'    ,0);
define('FORM_TYPE_SELECT'  ,1);
define('FORM_TYPE_RADIO'   ,2);
define('FORM_TYPE_CHECK'   ,3);
define('FORM_TYPE_TEXTAREA',4);
define('FORM_TYPE_EDITOR'  ,5);
define('FORM_TYPE_UPLOAD'  ,6);

class FormAPI{

	private $fields;

	public function __construct(){
		$this->fields = array();
	}

	public function AddField($options){
		$this->fields[] = array_merge(
			array(
				"name"  => "",
				"label" => "",
				"value" => "",
				"type"  => 0,
			),
			$options
		);
	}

	public function BuildForm(){
		return json_encode($this->fields);
	}

	public function SetFieldValue($field,$value){
		foreach($this->fields as $i=>$f){
			if($f["name"] === $field){
				$this->fields[$i]["value"] = $value;
				break;
			}
		}
	}

}