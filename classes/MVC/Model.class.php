<?php

namespace PHPMVC;


/**
* 
*	Name:        FieldModel
*	Description: Classe que representa um campo para a model
*	
*	Creation: 01/09/2014
*	Author:   Douglas Zanotta
*	
*/
class FieldModel {

	private $name      = "";
	private $allowNull = true;
	private $value     = "";
	public  $type      = "";

	/**
	* 
	*	Name:        Construtor
	*	Description: Na instanciação de um campo, define-se o nome do campo no banco e seu tipo.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*/
	public function __construct($n,$t) {
		$this->name = $n;
		$this->type = $t;
	}


	/**
	* 
	*	Name:        __toString
	*	Description: Método responsável por definir como será a representação string de um campo.
	*                Retorna o nome do campo.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*/
	public function __toString() {
		return $this->name;
	}


	/**
	* 
	*	Name:        getVal
	*	Description: Retorna o valor armazenado no campo para ser exibido em tela. 
	*                Faz as conversões necessárias para o tipo de campo.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*/
	public function getVal() {
		if($this->value === NULL)
			return NULL;

		switch($this->type){
			case DB::$DBTYPE_DATE:
				return preg_replace('~^(\d{4})-(\d{2})-(\d{2})~ism','${3}/${2}/${1}',$this->value);
			case DB::$DBTYPE_DATETIME:
				return preg_replace('~^(\d{4})-(\d{2})-(\d{2}) (\d{2}:\d{2}:\d{2})~ism','${3}/${2}/${1} ${4}',$this->value);
			default:
				return $this->value;
		}
		
	}


	/**
	* 
	*	Name:        GetFieldQueryType
	*	Description: Método responsável por retornar o campo convertido para 
	*                execução da query. Por exemplo, quando o campo for do tipo
	*                datetime, converte para CONVERT(VARCHAR(20), campo, 120)
	*	
	*	Creation: 18/11/2014
	*	Author:   Douglas Zanotta
	*	
	*/
	public function GetFieldQueryType(){
		switch($this->type){
			case DB::$DBTYPE_DATE:
				return "CONVERT(VARCHAR(10),".$this->name.",120) AS '".$this->name."'";
			case DB::$DBTYPE_DATETIME:
				return "CONVERT(VARCHAR(20),".$this->name.",120) AS '".$this->name."'";
			default:
				return $this->name;
		}
	}
	

	/**
	* 
	*	Name:        getValDB
	*	Description: Retorna o valor armazenado no campo para ser utilizado em query. 
	*                Faz as conversões necessárias para o tipo de campo.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*
	*   @return String;
	*	
	*/
	public function getValDB() {
		if($this->value === NULL)
			return 'NULL';

		switch($this->type){
			case DB::$DBTYPE_DATE:
				return "'".preg_replace('~^(\d{2})/(\d{2})/(\d{4})~ism','${3}${2}${1}',$this->value)."'";
			case DB::$DBTYPE_DATETIME:
				return "'".preg_replace('~^(\d{2})/(\d{2})/(\d{4})~ism','${3}${2}${1}',$this->value)."'";
			case DB::$DBTYPE_PASSWORD:
				return DB::PasswordFormat($this->value);
			case DB::$DBTYPE_BOOLEAN:
				return DB::Boolean($this->value);
			default:
				return "'".DB::Clean($this->value)."'";
		}
		
	}

	/**
	* 
	*	Name:        setVal
	*	Description: Define o valor do campo. Não faz nenhum tipo de conversão.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  mixed $v
	*/
	
	public function setVal($v) {
		$this->value = DB::Clean($v);
	}

}



/**
* 
*	Name:        Model
*	Description: Classe responsável pelo mapeamento entre o bando de dados e os objetos (ORM).
*                Esta classe pode ser usada de duas formas:
*                Utilizada para montar e executar uma query.
*                $obj = new Model();
*                $obj->Column('id')->Column('nome')->Where('email = "teste@teste.com"')->Exec();
*
*                Utilizada para obter os dados de uma linha específica
*                $obj = new ClasseQueExtendeModel();
*                $obj->id = 3;
*                echo $obj->nome;
*	
*	Creation: 01/09/2014
*	Author:   Douglas Zanotta
*	
*/
class Model {

	protected $table         = "";
	protected $primaryKey    = "";
	protected $cacheEnable   = true;
	private   $fields        = array();
	private   $fieldsChanged = array();
	private   $sqlParts      = array();
	private   $data          = array();
	private   $pointer       = NULL;
	private   $hasError      = false;

	public function __construct() {
		$this->sqlParts["FIELDS"] = array();
		foreach($this->fields as $f=>$v)
			$this->sqlParts["FIELDS"][] = (string)$f;
		$this->sqlParts["TABLE"]  = $this->table;
		$this->sqlParts["WHERE"]  = NULL;
		$this->sqlParts["ORDER"]  = NULL;
		$this->sqlParts["GROUP"]  = NULL;
		$this->sqlParts["LIMIT"]  = 1000;
	}


	/**
	* 
	*	Name:        __get
	*	Description: Método chamado internamente quando uma propriedade é lida. Por exemplo: return $obj->propriede.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  string $field
	*/
	public function __get($field) {
		if(!isset($this->fields[$field]))
			return null;
		return $this->fields[$field]->getVal();
	}


	/**
	* 
	*	Name:        __isset
	*	Description: Método chamado internamente quando se faz necessária a verificação da existência de uma propriedade.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  string $field
	*/
	public function __isset($field) {
		if(!isset($this->fields[$field]) || $this->fields[$field] == null)
			return false;
		return true;
	}


	/**
	* 
	*	Name:        __set
	*	Description: Método chamado ao definir o valor de uma propriedade.
	*                Quando a propriedade definida for a Primary Key da tabela mapeada, será automaticamente executado um SELECT
	*                para obter todos os dados do registro definido.
	*                Com isso, podemos facilmente obter os valores de uma linha do banco de dados (sem a necessidade de montar um Query).
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  string $field, string $value
	*/
	public function __set($field, $value) {
		if(!isset($this->fields[$field]))
			return null;

		$this->fieldsChanged[$field] = 1;

		if($field === $this->primaryKey) {

			$this->sqlParts["FIELDS"] = array();
			foreach($this->fields as $f=>$v)
				$this->sqlParts["FIELDS"][] = (string)$f;
			$this->sqlParts["WHERE"]  = "{$field} = '".DB::Clean($value)."'";
			$this->sqlParts["ORDER"]  = NULL;
			$this->sqlParts["GROUP"]  = NULL;
			$this->sqlParts["LIMIT"]  = 1;

			$this->Read();

			if(isset($this->data[0]))
				foreach ($this->fields as $f => $v){
					$this->fieldsChanged[$f] = 1;
					$this->fields[$f]->setVal($this->data[0][$f]);
				}
		}

		$this->fields[$field]->setVal($value);
	}



	/**
	* 
	*	Name:        DefineFields
	*	Description: Define a existência/mapaeamento de uma coluna no banco de dados para o objeto desta model.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  string $name, $type
	*/
	protected function DefineFields($name,$type) {
		$this->fields[$name] = new FieldModel($name,$type);
	}


	/**
	* 
	*	Name:        Column
	*	Description: Define que a coluna $c (ou o array de colunas $c) será retornado na query.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  mixed $c
	*/
	public function Column($c) {
		$col = array();
		if(!is_array($c))
			$col[] = $c;
		else{
			$col = $c;
			$this->sqlParts["FIELDS"] = array();
		}

		if(!is_array($this->sqlParts["FIELDS"]))
			$this->sqlParts["FIELDS"] = $col;
		else
			foreach ($col as $v)
				$this->sqlParts["FIELDS"][] = $v;

		return $this;
	}


	/**
	* 
	*	Name:        Where
	*	Description: Define o filtro Where que será inserido na query. Se já houver algum filtro definido, será adicionado um operador AND entre eles.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  string $condition
	*/
	public function Where($condition) {
		if(empty($this->sqlParts["WHERE"]))
			$this->sqlParts["WHERE"] = $condition;
		else
			$this->sqlParts["WHERE"] = $this->sqlParts["WHERE"] . " AND " . $condition;
		return $this;
	}


	/**
	* 
	*	Name:        OrderBy
	*	Description: Define o que será colocado no ORDER BY da query.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  string $order
	*/
	public function OrderBy($order) {
		if(empty($this->sqlParts["ORDER"]))
			$this->sqlParts["ORDER"] = $order;
		else
			$this->sqlParts["ORDER"] = $this->sqlParts["ORDER"] . ", " . $order;
		return $this;
	}


	/**
	* 
	*	Name:        GroupBy
	*	Description: Define o que será colocado no GROUP BY da query.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  mixed $c
	*/
	public function GroupBy($group) {
		if(empty($this->sqlParts["GROUP"]))
			$this->sqlParts["GROUP"] = $group;
		else
			$this->sqlParts["GROUP"] = $this->sqlParts["GROUP"] . ", " . $group;
		return $this;
	}


	/**
	* 
	*	Name:        Limit
	*	Description: Define quantos registros serão retornados na consulta.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  mixed $c
	*/
	public function Limit($l) {
		$this->sqlParts["LIMIT"] = $l;
		return $this;
	}


	/**
	* 
	*	Name:        Read
	*	Description: Monta e estrutura necessária e envia os dados da query para instância do objeto de banco de dados.
	*                Os dados informados para a montagem da query geram uma consulta (dentro da classe DB) e retorna um array com os registros obtidos.
	*                Este retorno pode vir dor cache de consultas sql.
	*	
	*	Creation: 01/09/2014
	*	Author:   Douglas Zanotta
	*	
	*/
	private function Read() {

		if(empty($this->sqlParts["ORDER"]))
			$this->sqlParts["ORDER"] = $this->primaryKey . " ASC";

		if(is_array($this->sqlParts["FIELDS"]) && !in_array($this->primaryKey,$this->sqlParts["FIELDS"]))
			$this->sqlParts["FIELDS"][] = $this->primaryKey;
		
		foreach($this->fields as $f=>$v)
			foreach($this->sqlParts["FIELDS"] as $i=>$field)
				if($field === $f)
					$this->sqlParts["FIELDS"][$i] = $v->GetFieldQueryType();

		try {
			$db = DB::getInstance();
			$db->CacheStatus($this->cacheEnable);
			$db->QuerySelect($this->sqlParts);
		} catch(\Exception $e) {
			$this->data[] = array();
			return;
		}

		while($result = $db->Fetch())
			$this->data[] = $result;
	}


	/* Os seguintes métodos ainda não foram devidamente comentados. */
	/* TO-DO: Comentários nos cabeçalhos dos métodos */


	public function Create() {
		try {
			$this->hasError = false;
			$fields = array();
			foreach ($this->fieldsChanged as $f => $v)
				$fields[$f] = $this->fields[$f]->getValDB();

			if(in_array($this->primaryKey,array_keys($fields)))
				unset($fields[$this->primaryKey]);

			if(empty($fields))
				return;

			$db = DB::getInstance();
			$ret = $db->QueryInsert($this->table, $fields);

			if($ret){
				$id = $db->InsertedId();
				if($id !== false)
					$this->fields[$this->primaryKey]->setVal($id);
			}else{
				$this->fields[$this->primaryKey]->setVal(null);
			}
		} catch(\Exception $e) {
			$this->data[]   = array();
			$this->hasError = true;
			return;
		}
	}

	public function Update() {
		if(empty($this->data))
			$this->Exec();
		try {
			$this->hasError = false;
			$fields = array();
			foreach ($this->fieldsChanged as $f => $v)
				$fields[$f] = $this->fields[$f]->getValDB();
			
			if(in_array($this->primaryKey,array_keys($fields)))
				unset($fields[$this->primaryKey]);

			$ids = array();
			foreach($this->data as $i=>$v)
				$ids[] = $v[$this->primaryKey];

			if($this->pointer === NULL)
				$filter = "{$this->primaryKey} IN ('".implode("','",$ids)."')";
			else
				$filter = "{$this->primaryKey} = '".$ids[$this->pointer]."'";

			$db = DB::getInstance();
			$db->QueryUpdate($this->table, $fields, $filter);
		} catch(\Exception $e) {
			$this->data[] = array();
			$this->hasError = true;
			return;
		}
	}

	public function Delete() {
		if(empty($this->data))
			$this->Exec();
		try {
			$this->hasError = false;
			$ids = array();
			foreach($this->data as $i => $v)
				$ids[] = $v[$this->primaryKey];

			if($this->pointer === NULL)
				$filter = "{$this->primaryKey} IN ('".implode("','",$ids)."')";
			else
				$filter = "{$this->primaryKey} = '".$ids[$this->pointer]."'";


			$db = DB::getInstance();
			$db->QueryDelete($this->table, $filter);
		} catch(\Exception $e) {
			$this->data[] = array();
			$this->hasError = true;
			return;
		}
	}

	public function Error(){
		return $this->hasError;
	}

	public function StartTransaction(){
		$db = DB::getInstance();
		$db->BeginTransaction();
	}

	public function CancelTransaction(){
		$db = DB::getInstance();
		$db->RollbackTransaction();
	}

	public function SaveTransaction(){
		$db = DB::getInstance();
		$db->CommitTransaction();
	}


	public function GetFields(){
		return array_keys($this->fields);
	}

	public function GetPrimaryKeyName(){
		return $this->primaryKey;
	}



	public function All() {
		$this->Clear();
		$this->Read();
		return $this->data;
	}

	public function Exec(){
		$this->Read();
		return $this->data;
	}

	public function First(){
		if(empty($this->data))
			$this->Read();
		$this->pointer = 0;
		$this->SetFieldValues();
		return isset($this->data[0]) ? $this->data[0] : false;
	}


	public function Last() {
		if(empty($this->data))
			$this->Read();
		$this->pointer = count($this->data) - 1;
		$this->SetFieldValues();
		return isset($this->data[$this->pointer]) ? $this->data[$this->pointer] : false;
	}


	public function Index($i) {
		if(empty($this->data))
			$this->Read();
		$this->pointer = $i - 1;
		$this->SetFieldValues();
		return isset($this->data[$this->pointer]) ? array($this->data[$this->pointer]) : false;
	}

	public function ByFieldValue($field, $val){
		if(empty($this->data))
			$this->Read();
		$data = is_array($this->data) ? $this->data : array();
		foreach($data as $i=>$d)
			if(isset($data[$i][$field]) && $data[$i][$field] === $val)
				return $data[$i];

		return array();
	}

	public function Next() {
		$this->pointer++;
		$this->SetFieldValues();
		return isset($this->data[$this->pointer]) ? array($this->data[$this->pointer]) : false;
	}

	public function Previous() {
		$this->pointer--;
		$this->SetFieldValues();
		return isset($this->data[$this->pointer]) ? array($this->data[$this->pointer]) : false;
	}

	private function SetFieldValues() {
		foreach($this->fields as $f => $v){
			if(isset($this->data[$this->pointer][$f]))
				$this->fields[$f]->setVal($this->data[$this->pointer][$f]);
		}
	}

	public function Clear(){
		$this->data = array();
		$this->pointer = NULL;
		$this->__construct();
		return $this;
	}

};

?>