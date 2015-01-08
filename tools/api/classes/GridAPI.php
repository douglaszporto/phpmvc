<?php

namespace API;

class GridAPI{

	private $title;
	private $query;
	private $layout;
	private $operations;
	private $domains;
	public  $parentIDs;

	public function __construct(){
		$this->title        = "";
		$this->query        = "";
		$this->internalName = "";
		$this->layout       = array();
		$this->operations   = array();
		$this->parentIDs    = isset($_GET["selectedItems"]) ? explode('*',$_GET["selectedItems"]) : array();
	}

	public function SetTitle($t){
		$this->title = $t;
	}

	public function SetQuery($q){
		$this->query = $q;
	}

	public function CanCreate(){
		$this->AddOperation("create", "Adicionar", "this.callAddMethod()", "&#xe025;", "op-green", true, true, true);
	}

	public function CanRead(){
		$this->AddOperation("read", "Visualizar", "this.loadModule('produtosCaracteristicas')", "&#xe0bf;", "op-yellow", false, true, false);
	}

	public function CanUpdate(){
		$this->AddOperation("update", "Editar", "this.callEditMethod()", "&#xe01d;", "op-blue", false, true, false);
	}

	public function CanDelete(){
		$this->AddOperation("delete", "Excluir", "this.callRemoveMethod()", "&#xe157;", "op-red", false, true, true);
	}

	public function AddOperation($opcode, $label, $action, $iconCaracter, $colorClass, $enableOnSelectNone, $enableOnSelectOne, $enableOnSelectMany){
		$this->operations[$opcode] = array(
			"label"      => $label,
			"action"     => $action,
			"icon"       => $iconCaracter,
			"color"      => $colorClass,
			"visibility" => ((int)$enableOnSelectNone * 1) | ((int)$enableOnSelectOne * 2) | ((int)$enableOnSelectMany * 4)
		);
	}

	public function AddColumnToLayout($column, $label, $width){
		$this->layout[] = array(
			'column' => $column,
			'label'  => $label,
			'width'  => $width
		);
	}

	public function AddDomainToColumn($column, $domain){
		$this->domains[$column] = $domain;
	}

	public function ResolveNames($row){
		$data = $row;
		
		// Faço as trocas de domínios fixos
		foreach($row as $field => $value){
			if(isset($this->domains[$field]) && isset($this->domains[$field][$value]))
				$data[$field] = $this->domains[$field][$value];
		}

		return $data;
	}

	public function GetQuery(){
		return $this->query;
	}

	public function GetTitle(){
		return $this->title;
	}

	public function GetOperations(){
		return array_values($this->operations);
	}

	public function GetLayout(){
		return $this->layout;
	}



}

?>