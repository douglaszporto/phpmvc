<?php

define('INFERENCE_TYPE_VALUE',0);
define('INFERENCE_TYPE_VISIBILITY',1);
define('INFERENCE_TYPE_EDITABLE',2);

define('VALIDATION_TYPE_INTEGER','integer');
define('VALIDATION_TYPE_URL','url');

abstract class Module{

	protected $data;
	protected $form;
	public    $model;

	public function __construct($key = null){
		if($key === null)
			return;

		$pk = $this->model->GetPrimaryKeyName();
		$this->model->$pk = $key;
	}

	// Métodos de configuração da listagem
	abstract public function Grid(&$grid);

	// Métodos de configuração dos formulários
	abstract public function InsertForm(&$form);
	abstract public function UpdateForm(&$form);

	// Métodos da lógica de negócio da inserção
	abstract public function BeforeInsert();
	abstract public function Insert();
	abstract public function AfterInsert();	

	// Métodos da lógica de negócio da alteração
	abstract public function BeforeUpdate();
	abstract public function Update();
	abstract public function AfterUpdate();

	// Métodos da lógica de negócio da alteração
	abstract public function BeforeDelete();
	abstract public function Delete();
	abstract public function AfterDelete();









	public function SetData($d){
		$this->data = $d;
	}

	public function SetForm(&$form){
		$this->form = &$form;
	}

	public function Inference($type, array $affectedBy, $expression){
		$obj = new stdClass;
		$obj->type       = $type;
		$obj->affectedBy = $affectedBy;
		$obj->expression = $expression;
		return json_encode($obj);
	}

	public function FromModelToForm(){
		$fields = $this->model->GetFields();
		foreach($fields as $field)
			$this->form->SetFieldValue($field,$this->model->$field);
	}

}

?>