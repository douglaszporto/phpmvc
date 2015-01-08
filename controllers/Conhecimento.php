<?php

use PHPMVC\Controller as Controller;
use PHPMVC\View       as View;
use PHPMVC\DB         as DB;

require_once PATH_CONTROLLERS . "/Login.php";
require_once PATH_MODELS . "/ConhecimentoTipo.php";
require_once PATH_MODELS . "/ConhecimentoAssunto.php";
require_once PATH_MODELS . "/ConhecimentoConteudo.php";
require_once PATH_MODELS . "/ConhecimentoConteudoAssunto.php";

class Conhecimento extends Controller {

	private $titulo;
	private $arrayTipos;
	private $allowedBots = array('bot','spider','slurp','grub','crawl','scan','szukacz','htdig','nelogica','internetseer','backrub','scooter','rex','architext','Googlebot','gulliver','looksmart','snap','yahoo','altavista','sqworm','cow','wget','wsr');

	public function __construct(){

		$this->tipoConhecimento	= new ConhecimentoTipoModel();
		$this->assuntoModel		= new ConhecimentoAssuntoModel();
		$this->conteudoModel	= new ConhecimentoConteudoModel();
		$this->conteudoAssunto	= new ConhecimentoConteudoAssuntoModel();

		$this->titulo = array(
			'Home'     => SITE_DOMAIN . '/',
			'Conhecimento' => SITE_DOMAIN . '/conhecimento/'
		);
	}	

	public function Index(){

		View::render('Header.tpl',VIEW_RENDER_DEFAULT,array(
			'titulo'	=> 'Nelogica - Conhecimento',
			'descricao'	=> 'A Nelogica desenvolve softwares para análise técnica de ativos no mercado financeiro. No portal Nelogica você encontra artigos e tutoriais que oferecem conhecimento de qualidade sobre análise técnica.',
			'user'		=> Login::UserInfo()
		));
		 
		View::Render('Title.tpl',VIEW_RENDER_BOTH,array(
			'title'				=> 'Conhecimento',
			'breadcrumb'		=> $this->titulo 
		));

		$arrayTipos				= $this->tipoConhecimento ->Exec();
		$arrayAssunto 			= $this->assuntoModel 	  ->Exec();
		$arrayConteudo			= $this->conteudoModel	  ->Exec(); 
		$arrayConteudoAssunto	= $this->conteudoAssunto  ->Exec(); 

		foreach($arrayConteudo as $i=>$a)
			$arrayConteudo[$i]['strTitulo'] = substr($a['strTitulo'], 0,35) . (strlen($a['strTitulo']) > 35 ? "..." : "");
		

		View::Render('Conhecimento/Conhecimento.tpl',VIEW_RENDER_BOTH, array(
			"tipos"				=> $arrayTipos,
			"assuntos"			=> $arrayAssunto,
			"conteudos" 	 	=> $arrayConteudo,
			"conteudoAssunto"	=> $arrayConteudoAssunto,
		));

		View::render('Footer.tpl',VIEW_RENDER_DEFAULT);	
	}	

	public function TipoAssunto($tipo){

		$tipo = DB::Clean($tipo);

		$arrayTipos	= $this->tipoConhecimento->Where("strIdentificador = '{$tipo}'")->First();	

		if (empty($arrayTipos))
			throw new Exception("Conhecimento não existe", 1);
			
	
		$this->tipo = $arrayTipos['strIdentificador'];
		$this->TituloTipo= $arrayTipos['strTitulo'];

		$assunto = $this->assuntoModel->Where("nTipoID = ".$arrayTipos['nTipoID'])->Exec();		

		foreach($assunto as $cont){
			$conteudo 		  = $this->conteudoAssunto->Clear()->Where("nAssuntoID = {$cont['nAssuntoID']}")->Exec();			
			$arrTiposAssuntos = $cont;
			$conteudos        = array();	
			foreach($conteudo as $conte){	
				$cont 		  = $this->conteudoModel->Clear()->Where("nConteudoID = {$conte['nConteudoID']}")->Exec();
				$conteudos[]  = $cont[0];
			}

			$arrTiposAssuntos['conteudo']	  = $conteudos;
			$arrTipos['assunto']		      = $arrTiposAssuntos;
			$this->arrayTipoAssuntoConteudo[] = $arrTipos;
		}
	

	}

	public function MenuTipoAssunto(){

		$arrayTipos	= $this->tipoConhecimento->Clear()->Exec();
		foreach($arrayTipos as $tipo){
			$assunto 		 = $this->assuntoModel->Clear()->Where("nTipoID = {$tipo['nTipoID']}")->Exec();
			$tipo['assunto'] = $assunto;
			$this->tipos[]	 = $tipo;				
		}

		foreach($this->tipos as $t){
			foreach($t['assunto'] as $ass)
				$item[$ass['strTitulo']]= "conhecimento/".$t['strIdentificador']."/".$ass['strIdentificador'] ;
			$this->menu[$t['strTitulo']] = array(
						'link'   => "conhecimento/".$t['strIdentificador'],
						'open'   => true,
						'items'  => $item,
				
			);
			$item=null;			
		}	
}


	public function Tipo($tipo){

		$tipo = DB::Clean($tipo);
	
		$this->TipoAssunto($tipo);
		$this->MenuTipoAssunto();

		View::Render('Header.tpl',VIEW_RENDER_DEFAULT,array(
			'titulo'	=> 'Nelogica -'.$this->TituloTipo,
			'descricao'	=> 'A Nelogica desenvolve softwares para análise técnica de ativos no mercado financeiro. No portal Nelogica você encontra artigos e tutoriais que oferecem conhecimento de qualidade sobre análise técnica.',
			'user'		=> Login::UserInfo()
		));

		View::Render('Title.tpl',VIEW_RENDER_BOTH,array(
			'title'				=> $this->TituloTipo,
			'breadcrumb'		=> $this->titulo 
		));
		View::Render('Conhecimento/Tipo.tpl',VIEW_RENDER_BOTH, array(
			'tiposAssuntosConteudo' => $this->arrayTipoAssuntoConteudo,	
			'menu' => $this->menu,	
			'tipo' => $this->tipo,		
			));
		View::render('Footer.tpl',VIEW_RENDER_DEFAULT);	

	}

	public function Assunto($tipo, $assunto){

		$tipo    = DB::Clean($tipo);
		$assunto = DB::Clean($assunto);

		$this->TipoAssunto($tipo);
		$assuntoConsulta = $this->assuntoModel->Clear()->Where("strIdentificador = '{$assunto}'")->First();
		
		if (empty($assuntoConsulta))
			throw new Exception("Assunto não existe", 1);

		View::Render('Header.tpl',VIEW_RENDER_DEFAULT,array(
			'titulo'	=> 'Nelogica - Conhecimento',
			'descricao'	=> 'A Nelogica desenvolve softwares para análise técnica de ativos no mercado financeiro. No portal Nelogica você encontra artigos e tutoriais que oferecem conhecimento de qualidade sobre análise técnica.',
			'user'		=> Login::UserInfo()
		));

		$this->MenuTipoAssunto();

		View::Render('Title.tpl',VIEW_RENDER_BOTH,array(
			'title'				=> $this->TituloTipo,
			'breadcrumb'		=> $this->titulo 
		));

		View::Render('Conhecimento/Assunto.tpl',VIEW_RENDER_BOTH, array(
			"tiposAssuntosConteudo" => $this->arrayTipoAssuntoConteudo,
			"assunto"			    => $assunto,	
			'menu' 					=> $this->menu,
			'tipo'					=> $this->tipo,
		));

		View::Render('Footer.tpl',VIEW_RENDER_DEFAULT);	
		
	}

	public function Conteudo($tipo, $assu, $conteudo){

		$tipo     = DB::Clean($tipo);
		$assu     = DB::Clean($assu);
		$conteudo = DB::Clean($conteudo);

		$tipoTitulo =  $this->tipoConhecimento->Where("strIdentificador = '{$tipo}'")->First();

		if (empty($tipoTitulo))
			throw new Exception("Conhecimento não existe", 1);

		$this->MenuTipoAssunto();
		$conte   = $this->conteudoModel->Where("strIdentificador = '{$conteudo}'")->First();	
		$assunto = $this->assuntoModel->Clear()->Where("strIdentificador = '{$assu}'")->First();

		if (empty($assunto))
			throw new Exception("Conhecimento não existe", 1);

		if (empty($conte))
			throw new Exception("Conhecimento não existe", 1);

		$arrayConteudoAssunto = $this->conteudoAssunto->Where("nConteudoID = ".$conte['nConteudoID']." and nAssuntoID = {$assunto['nAssuntoID']}" )->First();

		View::render('Header.tpl',VIEW_RENDER_DEFAULT,array(
			'titulo'    => 'Nelogica - '.$tipoTitulo['strTitulo'],
			'descricao' => 'A Nelogica desenvolve softwares para análise técnica de ativos no mercado financeiro. No portal Nelogica você encontra artigos e tutoriais que oferecem conhecimento de qualidade sobre análise técnica.',
			'user'      => Login::UserInfo()
		));

		View::Render('Title.tpl',VIEW_RENDER_BOTH,array(
			'title'      => $tipoTitulo['strTitulo'],
			'breadcrumb' => $this->titulo 
		));
	
	
		if (!empty($arrayConteudoAssunto['nProximo'])) {
			$assuntoContProx  = $this->conteudoAssunto->Clear()->Where("nConteudoAssuntoID  = {$arrayConteudoAssunto['nProximo']}")->First();
			$prox['assunto']  = $this->assuntoModel->Clear()->Where("nAssuntoID = {$assuntoContProx['nAssuntoID']}")->First();
			$prox['tipo']     = $this->tipoConhecimento->Clear()->Where("nTipoID = {$assunto['nTipoID']}")->First();
			$prox['conteudo'] = $this->conteudoModel->Clear()->Where("nConteudoID = {$assuntoContProx['nConteudoID']}")->First();
		}
		else
			$prox = null;

		if (!empty($arrayConteudoAssunto['nAnterior'])) {
			$assuntoContAnt  = $this->conteudoAssunto->Clear()->Where("nConteudoAssuntoID  = {$arrayConteudoAssunto['nAnterior']}")->First();
			$ant['assunto']  = $this->assuntoModel->Clear()->Where("nAssuntoID = {$assuntoContAnt['nAssuntoID']}")->First();
			$ant['tipo']     = $this->tipoConhecimento->Clear()->Where("nTipoID = {$assunto['nTipoID']}")->First();
			$ant['conteudo'] = $this->conteudoModel->Clear()->Where("nConteudoID = {$assuntoContAnt['nConteudoID']}")->First();
		}
		else
			$ant = null;

		$mustLogin = false;
		
		// O conteúdo tem bloqueio por login?
		$result = array();
		preg_match('~<hr\s*\/?>~ism',$conte["strHTML"],$result,PREG_OFFSET_CAPTURE);
		$loginElementPosition = isset($result[0][1]) ? $result[0][1] : false;

		if($loginElementPosition !== false){
			//Se sim, o usuário está logado?
			if(session_id() == '')
				session_start();

			// Inicializa a variável de contagem de visualização de conhecimento.
			if(!isset($_SESSION['count-views']))
				$_SESSION['count-views'] = 0;

			$bot = false;
			if(!empty($_SERVER['HTTP_USER_AGENT']))
				foreach($this->allowedBots as $userAgentBoot)
					if(stristr($_SERVER['HTTP_USER_AGENT'], $userAgentBoot) !== false)
						$bot = true;


			if(!empty($_SESSION["user_id"]) || $bot || $_SESSION['count-views'] < 3) {
				$conte["strHTML"] = preg_replace('~<hr\s*\/?>~ism','',$conte["strHTML"]);
				$_SESSION['count-views']++;
			} else {
				$conte["strHTML"] = substr($conte["strHTML"],0,$loginElementPosition);
				$mustLogin        = true;
				$_SESSION["user_redirect"] = $_SERVER["REQUEST_URI"];
			}

		}

		$conte = str_replace('{{$domain}}',SITE_DOMAIN,$conte);

	
		View::Render('Conhecimento/Conteudo.tpl',VIEW_RENDER_BOTH, array(
			"conteudo"	=> $conte,	
			"anterior" 	=> $ant,
			"proximo" 	=> $prox,
			'menu'	    => $this->menu,
			'mustLogin' => $mustLogin
		));

		View::render('Footer.tpl',VIEW_RENDER_DEFAULT);	

		/*
			Caso chegue nessa página por um redirect interno (ou seja, um conhecimento que exija login, 
			garante que vai atualizar o conteúdo do cabeçalho
		*/
		if(isset($_SESSION["user_userAccess"]) && !empty($_SESSION["user_userAccess"])){
			echo $_SESSION["user_userAccess"];
			unset($_SESSION["user_userAccess"]);
		}
	}
}


?>

