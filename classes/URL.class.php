<?php

namespace PHPMVC;

class URL {

	private $url;
	private $urlfull;

	public function __construct($url) {
		$this->url     = preg_replace('~(^[\\/\s]*|[\\/\s]*$)~i', "", $url);
		$this->urlfull = (isset($_SERVER['HTTPS']) ? 'https:' : 'http:') . SITE_DOMAIN . "/" . $this->url;
	}

	public function url($pattern, $callback) {
		if(preg_match('~'.$pattern.'~i', $this->url, $args)) {
			unset($args[0]);

			if(session_id() == '')
				session_start();

			$callbackParts = explode(".",$callback);
			$class         = $callbackParts[0];
			$method        = isset($callbackParts[1]) ? $callbackParts[1] : "";
			$hasError      = "";

			$file = "controllers/".$class.".php";
			$path = dirname(__FILE__) . "/../" .$file;
			if(file_exists($path)) {
				require_once $path;
				if(class_exists($class)){
					$instancia = new $class();
					if(method_exists($instancia, $method)){
						Log::Dump("[".date('Y-m-d H:i:s')."][".$_SERVER['REMOTE_ADDR']."][FROM:".(isset($_SERVER["HTTP_REFERER"])?$_SERVER["HTTP_REFERER"]:"DIRECT")."][SESSID:".session_id()."][SUCCESS]:".$this->urlfull,'access.log');
						try{
							call_user_func_array(array($instancia,$method), $args);
						}catch(\Exception $e){
							Log::Dump($file.': '.$method. '('.$e->getLine().') # '.$e->getMessage(),'exceptions.log');
							require_once dirname(__FILE__) . "/../controllers/Error.php";
							$error = new \ErrorController();
							$error->CatchException($e->getMessage());
						}
					} else {
						$hasError = array("MethodNotFound",$class."::".$method);
					}
				} else {
					$hasError = array("ClassNotFound",$class);
				}
			} else {
				$hasError = array("FileNotFound",$file);
			}

			if(!empty($hasError)){
				Log::Dump("[".date('Y-m-d H:i:s')."][".$_SERVER['REMOTE_ADDR']."][FROM:".(isset($_SERVER["HTTP_REFERER"])?$_SERVER["HTTP_REFERER"]:"DIRECT")."][SESSID:".session_id()."][FAIL]:".$this->urlfull,'access.log');
				require_once dirname(__FILE__) . "/../controllers/Error.php";
				$error = new ErrorController();
				$error->$hasError[0]($hasError[1]);
			}

			//call_user_func_array($callback, $args);
			exit();
		}
	}

	public function NotFound() {

		require_once dirname(__FILE__) . "/../controllers/Login.php";
		Log::Dump("[".date('Y-m-d H:i:s')."][".$_SERVER['REMOTE_ADDR']."][FROM:".(isset($_SERVER["HTTP_REFERER"])?$_SERVER["HTTP_REFERER"]:"DIRECT")."][SESSID:".session_id()."][FAIL]:".$this->urlfull,'access.log');

		header('HTTP/1.0 404 Not Found');

		View::render('Header.tpl',VIEW_RENDER_DEFAULT,array(
			'titulo'	=> 'Nelogica - Pagina não encontrada',
			'descricao'	=> 'A Nelogica desenvolve softwares para análise técnica de ativos no mercado financeiro. No portal Nelogica você encontra artigos e tutoriais que oferecem conhecimento de qualidade sobre análise técnica.',
			'user'		=> \Login::UserInfo()
		));

		View::Render('Title.tpl',VIEW_RENDER_BOTH,array(
			'title'      => 'Página não encontrada',
			'breadcrumb' => array(
				'Home' => SITE_DOMAIN . '/'				
			)
		));
		View::render('404.tpl',VIEW_RENDER_DEFAULT);
		View::render('Footer.tpl',VIEW_RENDER_DEFAULT);	
		exit();
	}

}

?>