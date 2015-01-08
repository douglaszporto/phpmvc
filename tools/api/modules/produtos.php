<?php

require_once dirname(__FILE__) . "/../../../classes/DB.class.php";
require_once dirname(__FILE__) . "/models/produtos.php";

use \PHPMVC\DB as DB;

class Produto extends Module{

	public function __construct($key = null){
		$this->model = new ProdutosModel();
		parent::__construct($key);
	}


	/**
	* 
	*	Name:        Grid
	*	Description: Método responsável pela montagem da query utilizada no grid da listagem
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*	
	*/
	public function Grid(&$grid){
		$grid->SetTitle('Produtos');

		$grid->CanCreate();
		$grid->CanUpdate();
		$grid->CanDelete();
		$grid->AddOperation("caracteristicas", "Características", "this.loadModule('produtosCaracteristicas');", "&#xe004;", "op-yellow", false, true, false);

		$grid->SetQuery('
			SELECT
				nProdutoID       AS "key",
				nProdutoID       AS "nProdutoID",
				strNome          AS "strNome",
				strIdentificador AS "strIdentificador",
				bAtivo           AS "bAtivo"
			FROM
				Site.dbo.Produtos
		');

		$grid->AddColumnToLayout('nProdutoID','Código','10%');
		$grid->AddColumnToLayout('strNome','Produto','40%');
		$grid->AddColumnToLayout('strIdentificador','Identificador','30%');
		$grid->AddColumnToLayout('bAtivo','Ativo','15%');

		$grid->AddDomainToColumn('bAtivo',array('0'=>'Não', '1'=>'Sim'));
	}


	/**
	* 
	*	Name:        Form
	*	Description: Método responsável pela definição dos campos do formulário.
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*
	*/
	public function Form(&$form, $isUpdate){
		$this->SetForm($form);

		$form->AddField(array(
			'name'       => 'strNome',
			'label'      => 'Produto',
			'tab'        => 'Geral',
			'required'   => true,
			'type'       => FORM_TYPE_TEXT,
		));
		$form->AddField(array(
			'name'     => 'strIdentificador',
			'label'    => 'Identificador',
			'tab'      => 'Geral',
			'type'     => FORM_TYPE_TEXT,
			'required' => true,
			'affected' => $this->Inference(INFERENCE_TYPE_VALUE, array('strNome'), "inference.dashLower({strNome})")
		));
		$form->AddField(array(
			'name'  => 'strImagemIndice',
			'label' => 'Imagem no índice',
			'tab'   => 'Índice',
			'type'  => FORM_TYPE_UPLOAD
		));
		$form->AddField(array(
			'name'     => 'strDescricaoIndice',
			'label'    => 'Descrição no índice',
			'tab'      => 'Índice',
			'required' => true,
			'type'     => FORM_TYPE_EDITOR,
			'style'    => 'height:400px',
			'value'    => '<div>&nbsp;</div>'
		));

		$form->AddField(array(
			'name'  => 'strImagemDescricao',
			'label' => 'Imagem na descrição',
			'tab'   => 'Descrição',
			'type'  => FORM_TYPE_UPLOAD
		));
		$form->AddField(array(
			'name'     => 'strDescricaoCompleta',
			'label'    => 'Descrição completa',
			'tab'      => 'Descrição',
			'required' => true,
			'type'     => FORM_TYPE_EDITOR,
			'style'    => 'height:400px',
			'value'    => '<div>&nbsp;</div>'
		));
		$form->AddField(array(
			'name'       => 'strLinkDownload',
			'label'      => 'Link de Download',
			'tab'        => 'Geral',
			'validation' => VALIDATION_TYPE_URL,
			'value'      => 'http://nelogica.com.br/downloads/',
			'type'       => FORM_TYPE_TEXT
		));
		$form->AddField(array(
			'name'    => 'nProdutoSoftwareID',
			'label'   => 'Produto Vinculado',
			'tab'     => 'Geral',
			'type'    => FORM_TYPE_SELECT,
			'options' => DB::GetValues("Comercial.dbo.Produto","nProdutoID","strNome")
		));
		$form->AddField(array(
			'name'    => 'bAtivo',
			'label'   => 'Ativo',
			'type'    => FORM_TYPE_SELECT,
			'style'   => 'width:50px',
			'tab'     => 'Geral',
			'options' => array(
				array('value'=>'1', 'label'=>'Sim'),
				array('value'=>'0', 'label'=>'Não'),
			)
		));
	}


	/**
	* 
	*	Name:        UpdateForm
	*	Description: Método chamado para a contrução do formulário de alteração
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*	
	*/
	public function UpdateForm(&$form){
		$this->Form($form, true);
		$this->FromModelToForm();
	}


	/**
	* 
	*	Name:        InsertForm
	*	Description: Método chamado para a construção do formulário de inserção
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*	
	*/
	public function InsertForm(&$form){
		$this->Form($form, false);
	}


	/**
	* 
	*	Name:        BeforeInsert
	*	Description: Método chamado ANTES da inserção do registro.
	*                Neste método serão realizadas as validações nos dados (para consistência no banco) 
	*                e/ou operações em outras tabelas.
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*	
	*/	
	public function BeforeInsert(){
		return true;
	}


	/**
	* 
	*	Name:        Insert
	*	Description: Método chamado para EXECUÇÃO da inserção.
	*                Neste método será implementada a inserção do registro no banco.
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*
	*   @return true | string
	*	
	*/
	public function Insert(){
		$data  = (array)$this->data;
		
		foreach($data as $f => $v)
			$this->model->$f = $v === '' ? NULL : $v;

		$this->model->Create();

		if($this->model->nProdutoID === null)
			return "Ops, ocorreu um erro ao tentar inserir o produto";

		return true;
	}


	/**
	* 
	*	Name:        AfterInsert
	*	Description: Método chamado APÓS inserção do registro no banco.
	*                Neste método já temos o valor da chave primária da tabela inserida,
	*                e devemos apenas disparar outras operações subsquentes, sem remover
	*                o registro recém incluído.
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*
	*/
	public function AfterInsert(){

	}


	/**
	* 
	*	Name:        BeforeUpdate
	*	Description: Método chamado ANTES da atualização do registro.
	*                Neste método serão realizadas as validações nos dados (para consistência no banco) 
	*                e/ou operações em outras tabelas.
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*	
	*/	
	public function BeforeUpdate(){
		return true;
	}


	/**
	* 
	*	Name:        Update
	*	Description: Método chamado para EXECUÇÃO da atualização.
	*                Neste método será implementada a alteração do registro no banco.
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*
	*   @return true | string
	*	
	*/
	public function Update(){
		$data  = (array)$this->data;
		
		foreach($data as $f => $v)
			$this->model->$f = $data[$f] === '' ? NULL : $data[$f];

		$this->model->Update();

		if($this->model->Error())
			return "Ops, ocorreu um erro ao tentar atualizar o produto";

		return true;
	}


	/**
	* 
	*	Name:        AfterUpdate
	*	Description: Método chamado APÓS alteração do registro no banco.
	*                Neste método devemos apenas disparar outras operações subsquentes, 
	*                sem desfazer a alteração recém realizada.
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*
	*/
	public function AfterUpdate(){

	}



	/**
	* 
	*	Name:        BeforeDelete
	*	Description: Método chamado ANTES da remoção dos registros.
	*                Neste método serão realizadas as validações nos dados (para consistência no banco) 
	*                e/ou operações em outras tabelas.
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*	
	*/	
	public function BeforeDelete(){
		return true;
	}


	/**
	* 
	*	Name:        Update
	*	Description: Método chamado para EXECUÇÃO da remoção.
	*                Neste método será implementada a remoção do registro no banco.
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*
	*   @return true | string
	*	
	*/
	public function Delete(){
		$data  = $this->data->ids;
		
		$this->model->Where("nProdutoID IN ('".str_replace(",","','",$data)."')");
		$this->model->Delete();

		if($this->model->Error())
			return "Ops, ocorreu um erro ao tentar atualizar o produto";

		return true;
	}


	/**
	* 
	*	Name:        AfterDelete
	*	Description: Método chamado APÓS remoção dos registros no banco.
	*                Neste método devemos apenas disparar outras operações subsquentes, 
	*                sem desfazer a remoção recém realizada.
	*	
	*	Creation: 17/11/2014
	*	Author:   Douglas Zanotta
	*
	*/
	public function AfterDelete(){

	}

};


?>