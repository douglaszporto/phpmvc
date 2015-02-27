<?php

require_once dirname(__FILE__) . "/classes/DB.class.php";
require_once dirname(__FILE__) . "/classes/Log.class.php";
require_once dirname(__FILE__) . "/classes/MVC/Model.class.php";
require_once dirname(__FILE__) . "/classes/MVC/View.class.php";
require_once dirname(__FILE__) . "/classes/MVC/Controller.class.php";
require_once dirname(__FILE__) . "/classes/URL.class.php";

use PHPMVC\URL  as URL;
use PHPMVC\View as View;
use PHPMVC\Log  as Log;

/** Instancia a classe URL para tratamento da URL */
$url = new URL($_GET["url"]);

$url->url('^(home|index)?$','Home.Index');

$url->NotFound();

?>