<?php

namespace PHPMVC;

define('SMARTY_DIR'    , dirname(__FILE__).'/Smarty/libs/');
define('VIEW_DIR'      , dirname(__FILE__).'/../../views/');
define('VIEW_CLASS_DIR', dirname(__FILE__));

define('VIEW_RENDER_BOTH'   , 0);
define('VIEW_RENDER_AJAX'   , 1);
define('VIEW_RENDER_DEFAULT', 2);

require_once SMARTY_DIR . 'Smarty.class.php';
require_once dirname(__FILE__) . '/../../config.php';


/**
* 
*	Name:        View
*	Description: Classe responsável pela camada de visualização do MVC
*	
*	Creation: 26/08/2014
*	Author:   Douglas Zanotta
*	
*/
class View {

	private $smarty    = null;
	private $debugging = false;


	/**
	* 
	*	Name:        Construtor
	*	Description: Construtor da classe. Instancia e configura o Smarty.
	*	
	*	Creation: 26/08/2014
	*	Author:   Douglas Zanotta
	*	
	*/	
	public function __construct(){
		$this->smarty = new \Smarty();

		$this->smarty->setTemplateDir(VIEW_DIR);
		$this->smarty->setCompileDir(VIEW_CLASS_DIR.'/Smarty/compiled/');
		$this->smarty->setConfigDir(VIEW_CLASS_DIR.'/configs/');
		$this->smarty->setCacheDir(VIEW_CLASS_DIR.'/cache/');

		$this->smarty->left_delimiter = '{{';
		$this->smarty->right_delimiter = '}}';
	}


	/**
	* 
	*	Name:        Debug
	*	Description: Habilita função de debug
	*	
	*	Creation: 26/08/2014
	*	Author:   Douglas Zanotta
	*	
	*/
	public function Debug(){
		$this->debugging = true;
	}
	

	/**
	* 
	*	Name:        Define
	*	Description: Faz a ligação entre uma variável e um valor para a sustituição/processamento da view
	*	
	*	Creation: 26/08/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  
	*/
	public function Define($var,$value){
		$this->smarty->assign($var,$value);
	}


	/**
	* 
	*	Name:        RenderFile
	*	Description: Método que realiza o processamento da view. Caso a view não seja encontrada, 
	*                retornará a view padrão de Erro 404
	*	
	*	Creation: 26/08/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  
	*	@return 
	*
	*	Modifications:
	*	
	*/
	public function RenderFile($file){
		if($this->debugging)
			$smarty->debugging = true;

		$this->smarty->assign('version',SITE_VERSION);
		$this->smarty->assign('domain',SITE_DOMAIN);
		$this->smarty->assign('request_path',trim($_SERVER["REQUEST_URI"],"/"));
		$this->smarty->assign('siteProduction',SITE_PRODUCTION);



		if(file_exists(VIEW_DIR.$file))
			$this->smarty->display($file);
		else
			$this->smarty->display('404.tpl');
	}


	/**
	* 
	*	Name:        ReturnFile
	*	Description: Método que realiza o processamento da view e RETORNA sua string processada.
	*	
	*	Creation: 28/11/2014
	*	Author:   Douglas Zanotta
	*	
	*/
	public function ReturnFile($file){
		return $this->smarty->fetch($file);
	}


	/**
	* 
	*	Name:        Process
	*	Description: Método que realiza o processamento da view e RETORNA sua string processada.
	*                Caso a view não seja encontrada, retornará uma string vazia.
	*	
	*	Creation: 28/11/2014
	*	Author:   Douglas Zanotta
	*	
	*/
	static public function Process($file,$context){
		
		set_error_handler('PHPMVC\template_error_handler');

		try{
			$smarty = new View();
			foreach ($context as $k => $v) {
				$smarty->Define($k,$v);
			}

			$smarty->Define('version',SITE_VERSION);
			$smarty->Define('domain',SITE_DOMAIN);

			return $smarty->ReturnFile($file);
		} catch(\ErrorException $e) {
			return '';
		}
	}



	/**
	* 
	*	Name:        Render
	*	Description: Método estático para acesso rádipo à classe. Ele instancia a própria classe, 
	*                faz as definições do contexto definido e renderiza o template.
	*                Este método também é responsável por definir se a requisição é AJAX ou não.
	*                Ele verifica se é uma requisição ajax e decide (de acordo por com o 2º parâmetro passado)
	*                se será exibido ou não o contúdo do template.
	*	
	*	Creation: 26/08/2014
	*	Author:   Douglas Zanotta
	*	
	*	@param  String $file, Mixed $context
	*	
	*/
	static public function Render($file, $mode = VIEW_RENDER_BOTH, $context=array()){

		if($mode === VIEW_RENDER_AJAX && (!isset($_SERVER["HTTP_X_REQUESTED_WITH"]) || $_SERVER["HTTP_X_REQUESTED_WITH"] != 'XMLHttpRequest'))
			return;

		if($mode === VIEW_RENDER_DEFAULT && (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] == 'XMLHttpRequest'))
			return;

		set_error_handler('PHPMVC\template_error_handler');

		try{
			$smarty = new View();
			foreach ($context as $k => $v) {
				$smarty->Define($k,$v);
			}

			$smarty->Define('version',SITE_VERSION);
			$smarty->Define('domain',SITE_DOMAIN);

			$smarty->RenderFile($file);
		} catch(\ErrorException $e) {
			echo "Ocorreu algum erro no template {$file}:<br/>";
			foreach ($context as $k => $v)
				echo $k," => ",$v,"<br/>";
		}
	}
	

}








function template_error_handler($severity, $message, $filename, $lineno) {
	if (error_reporting() == 0)
		return;

	if (error_reporting() & $severity)
		throw new \ErrorException($message, 0, $severity, $filename, $lineno);
}

?>