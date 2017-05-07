<?php

use PHPMVC\Controller as Controller;
use PHPMVC\View       as View;

class Home extends Controller {

	public function Index(){

		View::render('Header.tpl',VIEW_RENDER_DEFAULT);
		View::render('Home.tpl',VIEW_RENDER_BOTH);
		View::render('Footer.tpl',VIEW_RENDER_DEFAULT);
	}
}
?>