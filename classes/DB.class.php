<?php 
/**
 *	Classe DB
 *	@since 1.0rc
 */

namespace PHPMVC;

require_once dirname(__FILE__) . "/Log.class.php";

/**
*	Classe responsável por centralizar todas as operações de Banco de dados.*
*	JAMAIS EFETUE QUALQUER OPERAÇÃO EM BANCO SEM UTILIZAR ESTA CLASSE
*	
*	Creation: 27/08/2014
*	@author: Douglas Zanotta
*/
class DB{

	/**
	* Tipo Inteiro dentro do SGBD utilizado
	*/
	static public $DBTYPE_INT      = 'INTEGER';

	/** Tipo String dentro do SGBD utilizado */
	static public $DBTYPE_STRING   = 'VARCHAR(MAX)';

	/** Tipo Float dentro do SGBD utilizado */
	static public $DBTYPE_FLOAT    = 'DECIMAL';

	/** Tipo Text dentro do SGBD utilizado */
	static public $DBTYPE_TEXT     = 'VARCHAR(MAX)';

	/** Tipo Date dentro do SGBD utilizado */
	static public $DBTYPE_DATE     = 'DATE';

	/** Tipo Datetime dentro do SGBD utilizado */
	static public $DBTYPE_DATETIME = 'DATETIME';

	/** Tipo Boolean dentro do SGBD utilizado */
	static public $DBTYPE_BOOLEAN  = 'BOOLEAN';

	/** Tipo Password dentro do SGBD utilizado */
	static public $DBTYPE_PASSWORD = 'VARBINARY(MAX)';

	/** Instancia estática do objeto DB */
	static  $instance     = NULL;

	/** @ignore */
	private $connection   = NULL;
	
	/** @ignore */
	private $result       = NULL;
	
	/** @ignore */
	private $errors       = array();
	
	/** @ignore */
	private $cacheContent = null;

	/** @ignore */
	private $cachePointer = 0;

	/** @ignore */
	private $performCache = true;


	/**
	*	Contrutor da classe de conexão com o banco de dados. A conexão com o banco é aberta neste método.
	*	
	*	Creation: 08/08/2014
	*	@author: Douglas Zanotta
	*/
	public function __construct() {
		try {
			switch(DB_DRIVER) {

				case 'sqlsrv' :
					$connectionInfo = array(
						'Database' => DB_DATABASE, 
						'UID'      => DB_USER,
						'PWD'      => DB_PASS
					);
					$this->connection = \sqlsrv_connect(DB_HOST,$connectionInfo);

					if(!$this->connection)
						throw new \Exception("Não foi possível conectar ao banco de dados: ".print_r(sqlsrv_errors(),true));
					break;
			
				case 'mssql':
					$this->connection = \mssql_connect(DB_HOST, DB_USER, DB_PASS);
					mssql_select_db(DB_DATABASE,$this->connection);
					if(!$this->connection)
						throw new \Exception("Não foi possível conectar ao banco de dados");
					break;

				case 'postgres':
					$this->connection = \pg_connect("host=".DB_HOST." port=5432 dbname=".DB_DATABASE." user=".DB_USER." password=".DB_PASS." options='--client_encoding=UTF8'");
					if(!$this->connection)
						throw new \Exception("Não foi possível conectar ao banco de dados");
					break;

				case 'mysql':
					$this->connection = \mysql_connect(DB_HOST, DB_USER, DB_PASS);
					mysql_select_db(DB_DATABASE,$this->connection);
					if(!$this->connection)
						throw new \Exception("Não foi possível conectar ao banco de dados");
					break;

				case 'mysql_pdo':
					$this->connection = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset='.DB_CHARSET, DB_USER, DB_PASS, array(\PDO::ATTR_EMULATE_PREPARES => false));
					if(!$this->connection)
						throw new \Exception("Não foi possível conectar ao banco de dados");
					break;

				default:
					throw new \Exception("Nenhum DBMS definido...");
					break;

			}
		}catch(Exception $e){
			$this->errors[] = $e->getMessage();
		}
	}


	/**
	*	Método que retorna a instancia ativa da classe. Utilizado para não abrir duas conexões numa mesma execução.
	*	
	*	Creation: 08/08/2014
	*	@author Douglas Zanotta
	*	@return DB
	*/
	public static function getInstance() {	
		if (self::$instance == NULL)
			self::$instance = new DB();
		return self::$instance;
	}



	
	/**
	*	Libera os recursos utilizados para a consulta
	*	
	*	Creation: 08/08/2014
	*	@author: Douglas Zanotta
	*/		
	public function freeResult() {
		switch(DB_DRIVER) {
			case 'sqlsrv':
				return sqlsrv_cancel($this->result);
			case 'mssql' :
				return mssql_free_result($this->result); 
			case 'postgres':
				return pg_free_result($this->result);
			case 'mysql':
				return mysql_free_result($this->result);
			case 'mysql_pdo':
				return $this->result->closeCursor();
		}
	}


	/**
	*	Método estático responsável por limpar o valor fornecido (Segurança contra SQL Injection)
	*	
	*	Creation: 28/08/2014
	*	@author Douglas Zanotta
	*	@param String $val Dados a serem limpos
	*	@return String Dados sem carateres/palavras perigosas
	*/
	static public function Clean($val){

		$val = str_replace(array('DROP','TRUNCATE','DELETE','INSERT','UPDATE'),'',$val);

		switch(DB_DRIVER) {
			case 'sqlsrv':
			case 'mssql' :
				return str_replace("'","''",$val); 
			case 'postgres':
			case 'mysql':
			case 'mysql_pdo':
				return addslashes($val); 
		}

		return str_replace("'","''",addslashes($val)); 
	}


	/**
	*	Método estático responsável por transformar um booleano do PHP para um booleano do banco
	*	
	*	Creation: 18/09/2014
	*	@author Douglas Zanotta
	*	@param Boolean $val Valor a ser convertido
	*	@return String Valor boolean em banco
	*/
	static public function Boolean($val){
		switch(DB_DRIVER) {
			case 'sqlsrv':
			case 'mssql' :
			case 'mysql':
			case 'mysql_pdo':
				return $val ? '1' : '0';
			case 'postgres':
				return $val ? 'TRUE' : 'FALSE';
		}

		return $val ? 'TRUE' : 'FALSE'; 
	}


	/**
	*	Método estático responsável por retornar o formato utilizado para senhas.
	*	
	*	Creation: 29/08/2014
	*	@author: Douglas Zanotta
	*	@param String $v Monta a chamada de criptografia para senhas
	*	@return String Campo convertido no formato de senha
	*/
	static public function PasswordFormat($v){
		switch(DB_DRIVER) {
			case 'sqlsrv':
			case 'mssql' :
				return "HASHBYTES('SHA1', '{$v}')";
			case 'postgres':
			case 'mysql':
			case 'mysql_pdo':
				return "SHA1('{$v}')";
		}
	}



	/**
	*	Informa a classe que o uso de cache está ATIVADO/DESTIVADO para esta instancia
	*	
	*	Creation: 03/12/2014
	*	@author: Douglas Zanotta
	*	@param Boolean $status Definição de Ativado/Desativado para o cache de banco de dados.
	*/
	public function CacheStatus($status) {
		$this->performCache = ($status === true); // Dessa forma, garanto que SEMPRE será booleano
	}



	/**
	*	Obtem o valor do último id inserido.
	*	
	*	Creation: 29/08/2014
	*	@author: Douglas Zanotta
	*	@return Integer|False Id do último registro inserido (ou false, caso falho) 
	*/
	public function InsertedId(){
		switch(DB_DRIVER) {
			case 'sqlsrv':
			case 'mssql' :
				$this->Query("SELECT SCOPE_IDENTITY() AS INSERTED_ID");
				$result = $this->Fetch();
				return isset($result["INSERTED_ID"]) ? $result["INSERTED_ID"] : false;
			case 'postgres':
				$this->Query("SELECT lastval() AS INSERTED_ID");
				$result = $this->Fetch();
				return isset($result["INSERTED_ID"]) ? $result["INSERTED_ID"] : false;
			case 'mysql':
				return mysql_insert_id();
			case 'mysql_pdo':
				return $this->connection->lastInsertId();
		}

		return false;
	}
	
		 
		
					
		
	/**
	*	Método responsável por enviar a Query para execução.
	*   Caso haja erro na consulta, podemos ler o erro no arquivo logs/queries.log
	*	
	*	Creation: 08/08/2014
	*	@author: Douglas Zanotta
	*	@param String $sql SQL a ser executada
	*	@return Boolean Excutado com sucesso (true|false)
	*/
	public function Query($sql) {
		$this->cacheContent = null;
		$this->cachePointer = 0;

		$log = fopen(dirname(__FILE__) . "/../logs/queries.log", 'a');
		try {
			switch(DB_DRIVER) {
				case 'sqlsrv':
					$this->result = sqlsrv_query($this->connection, $sql);
					break;
				case 'mssql':
					$this->result = mssql_query($sql,$this->connection);
					break;
				case 'postgres':
					$this->result = pg_query($this->connection,$sql);
					break;
				case 'mysql':
					$this->result = mysql_query($this->connection,$sql);
					break;
				case 'mysql_pdo':
					$this->result = $this->connection->query($sql);
					break;
			}
			if(!$this->result){
				switch(DB_DRIVER) {
					case 'sqlsrv':
						$error = '';
						if(($errors = sqlsrv_errors()) != null) {
							foreach($errors as $e)
								$error .= "[".$e[ 'message']."]";
						}
						throw new \Exception($error,1);
				}
				throw new \Exception("[Erro]",1);
			}
			fwrite($log, "[".date('Y-m-d H:i:s')."][".$_SERVER['REMOTE_ADDR']."][SUCCESS]:".preg_replace('~([\s]{2,}|\t|\r\n|\n)~'," ",$sql)."\n");
			fclose($log);
		} catch(\Exception $e) {
			$this->errors[] = $e->getMessage();
			fwrite($log, "[".date('Y-m-d H:i:s')."][".$_SERVER['REMOTE_ADDR']."][ERROR]:".$sql.$e->getMessage()."\n");
			fclose($log);
			return false;
		}

		return true;
	}

	/**
	*	Método estático responsável por executar Stored Procedures (Não trata Sotred Procedures com retorno).
	*   Este método recebe parâmetros variáveis. O primeiro parâmetro deve ser o nome da SP executada.
	*   Os parâmetros subsequentes serão enviados para a chamada da SP.
	*                
	*   Por exemplo, se quisermos executar "EXECUTE banco.dbo.minhaStoredProcedure 1,2,3", 
	*   chamaremos DB::Execute('banco.dbo.minhaStoredProcedure',1,2,3);
	*	
	*	Creation: 27/11/2014
	*	@author Douglas Zanotta
	*	@return Boolean Excutado com sucesso (true|false)
	*/
	static public function Execute(){
		$args = func_get_args();

		if(!isset($args[0]) || empty($args[0]))
			return false;

		$storedProcedureName   = $args[0];
		$storedProcedureParams = implode(", ",array_slice($args,1));

		$db = DB::getInstance();
		return $db->Query("EXECUTE {$storedProcedureName} {$storedProcedureParams}");
	}
	


	/**
	*	Método responsável por enviar uma Query de SELECT para execução.
	*	
	*	Creation: 28/08/2014
	*	@author Douglas Zanotta
	*	@param Array $sqlParts Array com as partes da consulta para composição
	*	@return Boolean Resultado da execução do SELECT
	*/
	public function QuerySelect($sqlParts) {

		$sql = "";
		if(empty($sqlParts["TABLE"]))
			throw new \Exception("Tabela não definida para query de select");

		$table  = $sqlParts["TABLE"];
		$limit  = (int)$sqlParts["LIMIT"];
		$fields = is_array($sqlParts["FIELDS"]) ? implode(",",$sqlParts["FIELDS"]) : $sqlParts["FIELDS"];
		$where  = empty($sqlParts["WHERE"]) ? "" : " WHERE " . $sqlParts["WHERE"];
		$group  = empty($sqlParts["GROUPS"]) ? "" : " GROUP BY " . $sqlParts["GROUPS"];
		$order  = empty($sqlParts["ORDER"]) ? "1" : $sqlParts["ORDER"];

		switch(DB_DRIVER) {
			case 'sqlsrv':
			case 'mssql':
				$sql = sprintf('SELECT TOP(%d) %s FROM %s%s%s ORDER BY %s', $limit, $fields, $table, $where, $group, $order);
				break;
			case 'postgres':
			case 'mysql':
			case 'mysql_pdo':
				$sql = sprintf('SELECT %s FROM %s%s%s ORDER BY %s LIMIT %d', $fields, $table, $where, $group, $order, $limit);
				break;
		}

		// Se o cache estiver ativo, usa a abordagem de leitura "Cache-First", caso contrário, faz a query normalmente.
		if($this->performCache === true){
			// Se houver cache para a query executada, define o cacheID e cacheFile que serão utilizados no método Fetch.
			$this->cacheContent = null;
			$cacheID            = dirname(__FILE__) . "/../cache/". md5($sql) . "." . $sqlParts["TABLE"] . "." . date('Ymd'). ".cache";
			if(file_exists($cacheID)){
				Log::Dump("[".date('Y-m-d H:i:s')."][".$_SERVER['REMOTE_ADDR']."][CACHE]:".preg_replace('~([\s]{2,}|\t|\r\n|\n)~'," ",$sql),"queries.log");
				$this->cacheContent = json_decode(file_get_contents($cacheID));
				$this->cachePointer = 0;
				return true;
			}

			// Cria o arquivo de cache, caso não exista.
			$this->cacheFile    = fopen($cacheID,"x");

			$queryResult = false;
			if(!empty($sql)){
				$queryResult = $this->Query($sql);

				if($queryResult){
					$cacheResult = array();
					while($ret = $this->Fetch())
						$cacheResult[] = $ret;

					file_put_contents($cacheID,json_encode($cacheResult));
					$this->cacheContent = $cacheResult;
				}

				return $queryResult;
			}
		}else{
			// Se caiu aqui, é porque o cache foi desativado nesta instância. Portante, reativo ele.
			// Se a model que o desativou for executada novamente, vou cair aqui mais uma vez e o processo se repetira.
			$this->performCache = true;
			if(!empty($sql))
				return $this->Query($sql);
		}


		return true;
	}


	/**
	*	Método responsável por enviar uma Query de INSERT para execução.
	*	
	*	Creation: 28/08/2014
	*	@author: Douglas Zanotta
	*	@param String $table Nome da tabela onde os dados serão inseridos
	*	@param Array $fieldList Mapeamento dos campos e dos valores a serem inseridos
	*	@return Boolean Resultado da execução do INSERT
	*/
	public function QueryInsert($table, $fieldsList) {

		$sql = "";
		if(empty($table))
			throw new \Exception("Tabela não definida para query de insert");

		$fields = array();
		$values = array();

		if(is_array($fieldsList)){
			$fields = array_keys($fieldsList);
			$values = array_values($fieldsList);
		}else if(is_object($fieldsList)){
			$props = get_object_vars($fieldsList);
			foreach($props as $f=>$v){
				$fields[] = $f;
				$values[] = ($v === 'NULL') ? $v : ("'".$v."'");
			}
		}

		if(DB_CHARSET != 'UTF-8')
			$values = array_map('utf8_decode',$values);

		$sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode(',',$fields), implode(',',$values));

		if(!empty($sql))
			return $this->Query($sql);
		
		return false;
	}

	/**
	*	Método responsável por enviar uma Query de UPDATE para execução.
	*	
	*	Creation: 28/08/2014
	*	@author Douglas Zanotta
	*	@param String $table Tabela onde os dados serão atualizados
	*	@param Array $fieldList Mapeamento entre os campos que serão atualizados e seu novo valor
	*	@param String $filter String do WHERE para filtro do update
	*	@return Boolean Resultado da execução do UPDATE
	*/
	public function QueryUpdate($table, $fieldsList, $filter) {

		$sql = "";
		if(empty($table))
			throw new \Exception("Tabela não definida para query de update");

		$values = $fieldsList;
		array_walk($values, function(&$v,$k){
			$v = "{$k} = ".(DB_CHARSET !== 'UTF-8' ? utf8_decode($v) : $v);
		});

		$sql = sprintf('UPDATE %s SET %s WHERE %s', $table, implode(',',$values),$filter);
		if(!empty($sql))
			return $this->Query($sql);
		
		return false;
	}

	/**
	*	Método responsável por enviar uma Query de DELETE para execução.
	*	
	*	Creation: 28/08/2014
	*	@author Douglas Zanotta
	*	@param String $table Tabela onde os dados serão removidos
	*	@param String $filter String do WHERE para filtro do delete
	*	@return Boolean Resultado da execução do DELETE
	*/
	public function QueryDelete($table, $filter) {

		$sql = "";
		if(empty($table))
			throw new \Exception("Tabela não definida para query de delete");

		$sql = sprintf('DELETE FROM %s WHERE %s', $table, $filter);
		if(!empty($sql))
			return $this->Query($sql);
		
		return false;
	}

		 
	/**
	*	Description: Método que retorna o número de linhas da última consulta.
	*	
	*	Creation: 08/08/2014
	*	@author: Douglas Zanotta
	*	@return Integer Número de registro obtidos na última consulta
	*/
	public function NumRows() {
		switch(DB_DRIVER) {
			case 'sqlsrv':
				return sqlsrv_num_rows($this->result);
			case 'mssql':
				return mssql_num_rows($this->result); 
			case 'postgres':
				return pg_num_rows($this->result);
			case 'mysql':
				return mysql_num_rows($this->result);
			case 'mysql_pdo':
				return -1;
		}
	}


	/**
	*	Puxa os dados do cache (já em memória) ou executa o FetchData, caso não haja cache.
	*	
	*	Creation: 08/08/2014
	*	@author: Douglas Zanotta
	*	@param String $type Tipo do retorno esperado (Object ou Array)
	*	@return Object|Array Dados retornados pelo banco de dados na última consulta (ou em cache)
	*/
	public function Fetch($type = 'assoc') {
		if($this->cacheContent === null)
			return $this->FetchData($type);

		if(!isset($this->cacheContent[$this->cachePointer]))
			return false;

		return $type == 'assoc' ? (array)($this->cacheContent[$this->cachePointer++]) : (object)($this->cacheContent[$this->cachePointer++]);
	}

	
		
	/**
	*	Executa fetch_object, fetch_assoc ou fetch_array de acordo com o driver.
	*	Executado quando não há cache para a consulta em questão.
	*	
	*	Creation: 08/08/2014
	*	@author: Douglas Zanotta
	*	@param String $type Tipo de associação realizada (assoc, object, numeric)
	*	@return Object|Array Dados obtidos na última consulta ao banco de dados
	*/
	public function FetchData($type = 'assoc') {
		switch(DB_DRIVER) {
			case 'sqlsrv':

				if($type == "object")
					$result = sqlsrv_fetch_object($this->result);
				else if($type == "assoc"){
					$result = sqlsrv_fetch_array($this->result, SQLSRV_FETCH_ASSOC);
					$error = print_r(sqlsrv_errors(),true);
					if(!empty($error))
						throw new Exception($error);
				}else
					$result = sqlsrv_fetch_array($this->result);
				break;

			case 'mssql':

				if($type == "object")
					$result = mssql_fetch_object($this->result);
				else if($type == "assoc")
					$result = mssql_fetch_assoc($this->result);
				else
					$result = mssql_fetch_array($this->result);
				break;

			case 'postgres':

				if($type == "object")
					$result = pg_fetch_object($this->result);
				else if($type == "assoc")
					$result = pg_fetch_array($this->result, PGSQL_ASSOC);
				else
					$result = pg_fetch_array($this->result);
				break;

			case 'mysql':

				if($type == "object")
					$result = mysql_fetch_object($this->result);
				else if($type == "assoc")
					$result = mysql_fetch_array($this->result, MYSQL_ASSOC);
				else
					$result = mysql_fetch_array($this->result);
				break;

			case 'mysql_pdo':

				if($type == "object")
					$result = $this->result->fetch(PDO::FETCH_OBJ);
				else if($type == "assoc")
					$result = $this->result->fetch(PDO::FETCH_ASSOC);
				else
					$result = $this->result->fetch();
				break;

		}

		if(DB_CHARSET != 'UTF-8'){
			if(is_array($result))
				$result = array_map('utf8_encode',$result);	

			if(is_object($result)){
				$props = get_object_vars($result);
				foreach($props as $i=>$p)
					$result->$i = utf8_encode($p);
			}
		}

		return $result === false ? array() : $result;
	}


	/**
	*	Método estático que retorna um array to tipo array("value","label") com os dados da tabela selecionada.
	*   Este método é utilizado para montagem de <select>s e <option>s no painel de adminstração.
	*	
	*	Creation: 13/11/2014
	*	@author: Douglas Zanotta
	*	@param String $table Nome da tabela a ser consultada
	*	@param String $fieldVal Nome do campo que fornecerá a chave no retorno
	*	@param String $fieldDesc Nome do campo que fornecerá o valor no retorno
	*	@param String $where Filtro que será aplicado para retorno dos dados (não obrigatório)
	*	@param String $order Cláusula adicionada ao ORDER BY da query (não obrigatório)
	*	@return Array Arary Chave => Valor com todos os registros retornados.
	*
	*/
	static public function GetValues($table, $fieldVal, $fieldDesc, $where = "", $order = "") {

		$result = array();

		$db = DB::getInstance();

		// Monta a query que será executada, de acordo com os parâmetros informados.
		$query = "
			SELECT 
				{$fieldVal}  as 'val', 
				{$fieldDesc} as 'desc' 
			FROM 
				{$table}
		";
		if($where !== "")
			$query .= "WHERE {$where}";
		if($order !== "")
			$query .= "ORDER BY {$order}";

		// Executa a query e coloca o resultado no vetor $result.
		$db->Query($query);
		while($row = $db->Fetch("object"))
			$result[] = array(
				"value" => $row->val,
				"label" => $row->desc
			);

		return $result;
	}
	

	/**
	*	Inicia uma transação
	*    
	*	Creation: 14/07/2014
	*	@author: Douglas Zanotta
	*/
	public function BeginTransaction() {
		$log = fopen(dirname(__FILE__) . "/../logs/queries.log", 'a');
		switch(DB_DRIVER) {
			case 'sqlsrv':
				sqlsrv_begin_transaction($this->connection);
				break;
			case 'mssql':
				mssql_query("BEGIN TRANSACTION;",$this->connection);
				break;
			case 'postgres':
				pg_query($this->connection,"BEGIN TRANSACTION");
				break;
			case 'mysql':
				mysql_query("BEGIN",$this->connection);
				break;
			case 'mysql_pdo':
				$this->connection->beginTransaction();
				break;
		}
		fwrite($log, "[".date('Y-m-d H:i:s')."][".$_SERVER['REMOTE_ADDR']."][SUCCESS]:BEGIN TRANSACTION\n");
		fclose($log);
	}

	/**
	*	Finaliza a transação, salvando os dados no banco de dados
	*    
	*	Creation: 14/07/2014
	*	@author: Douglas Zanotta
	*/
	public function CommitTransaction() {
		$log = fopen(dirname(__FILE__) . "/../logs/queries.log", 'a');
		switch(DB_DRIVER) {
			case 'sqlsrv':
				sqlsrv_commit($this->connection);
				break;
			case 'mssql':
				mssql_query("COMMIT TRANSACTION;",$this->connection);
				break;
			case 'postgres':
				pg_query($this->connection,"COMMIT TRANSACTION");
				break;
			case 'mysql':
				mysql_query($this->connection,"COMMIT");
				break;
			case 'mysql_pdo':
				$this->connection->commit();
				break;
		}
		fwrite($log, "[".date('Y-m-d H:i:s')."][".$_SERVER['REMOTE_ADDR']."][SUCCESS]:COMMIT TRANSACTION\n");
		fclose($log);
	}

	/**
	*	Finaliza a transação, salvando os dados no banco de dados
	*    
	*	Creation: 14/07/2014
	*	@author: Douglas Zanotta
	*/
	public function RollbackTransaction() {
		$log = fopen(dirname(__FILE__) . "/../logs/queries.log", 'a');
		switch(DB_DRIVER) {
			case 'sqlsrv':
				sqlsrv_rollback($this->connection);
				break;
			case 'mssql':
				mssql_query("ROLLBACK TRANSACTION;");
				break;
			case 'postgres':
				pg_query($this->connection,"ROLLBACK TRANSACTION");
				break;
			case 'mysql':
				mysql_query("ROLLBACK",$this->connection);
				break;
			case 'mysql_pdo':
				$this->connection->rollBack();
				break;
		}
		fwrite($log, "[".date('Y-m-d H:i:s')."][".$_SERVER['REMOTE_ADDR']."][SUCCESS]:ROLLBACK TRANSACTION\n");
		fclose($log);
	}



	/**
	*	Método responsável pela remoçao do objeto.
	*	
	*	Creation: 08/08/2014
	*	@author: Douglas Zanotta
	*/
	
	function __destruct() {
		switch(DB_DRIVER) {
			case 'sqlsrv':
				sqlsrv_close($this->connection);
				break;
			case 'mssql':
				mssql_close($this->connection);
				break;
			case 'postgres':
				pg_close($this->connection);
				break;
			case 'mysql':
				mysql_close($this->connection);
				break;
			case 'mysql_pdo':
				$this->connection = null;
				break;
		}
	}

};

?>