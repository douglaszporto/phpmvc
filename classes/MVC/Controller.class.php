<?php
/**
 *	Classe Controller
 *	@since 1.0rc
 */

namespace PHPMVC;

require_once dirname(__FILE__) . "/View.class.php";


/**
* 
*	Classe responável por centralizar lógicas comuns a todos os controllers
*	
*	Creation: 26/02/2015
*	@author Douglas Zanotta <douglas.z.porto@gmail.com>
*	
*/
class Controller{

	/**
	* 
	*	Método responsável pela renderização do Index
	*	
	*	Creation: 26/02/2015
	*	@author Douglas Zanotta <douglas.z.porto@gmail.com>
	*	
	*/
	function Index(){

		View::render('Header.tpl',VIEW_RENDER_DEFAULT);
		View::render("$name.tpl",VIEW_RENDER_BOTH);
		View::render('Footer.tpl',VIEW_RENDER_DEFAULT);

	}
}

?>