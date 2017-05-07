<?php

use PHPMVC\Controller as Controller;
use PHPMVC\View       as View;

class Repair extends Controller {

	public function getRepair($id){

        echo $id;
		//View::render('Header.tpl',VIEW_RENDER_DEFAULT);
		//View::render('Home.tpl',VIEW_RENDER_BOTH);
		//View::render('Footer.tpl',VIEW_RENDER_DEFAULT);
	}
}
?>