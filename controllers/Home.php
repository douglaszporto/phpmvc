<?php

use PHPMVC\Controller as Controller;
use PHPMVC\View       as View;

require_once PATH_CONTROLLERS . "/Login.php";

class Home extends Controller {

	public function Index(){

		View::render('Header.tpl',VIEW_RENDER_DEFAULT,array(
			'titulo'    => 'Nelogica - Tecnologia e Informação para o Mercado Financeiro',
			'descricao' => 'A Nelogica desenvolve softwares para análise técnica de ativos no mercado financeiro. No portal Nelogica você encontra artigos e tutoriais que oferecem conhecimento de qualidade sobre análise técnica.',
			'user'      => Login::UserInfo()
		));
		View::render('Home.tpl',VIEW_RENDER_BOTH);
		View::render('Footer.tpl',VIEW_RENDER_DEFAULT);
	}
}
?>