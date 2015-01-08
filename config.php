<?php

/*
	SITE CONFIGURATION
*/
define('SITE_VERSION'   , '20150107');
define('SITE_DOMAIN'    , '//www.nelogica.com.br');
define('SITE_NAME'      , 'Nelogica');
define('SITE_PRODUCTION', false);


/* 
	DATABASE CONNECTION PARAMS
*/
define('DB_HOST'     , '127.0.0.1');
define('DB_USER'     , 'root'     );
define('DB_PASS'     , '102030'   );
define('DB_DATABASE' , 'nelogica' );
define('DB_DRIVER'   , 'mysql'    );
define('DB_CHARSET'  , 'UTF-8'    );

/*
	PATH DEFINITIONS
*/
define('PATH_DIR'        , dirname(__FILE__)."/");
define('PATH_MODELS'     , dirname(__FILE__)."/models/");
define('PATH_CONTROLLERS', dirname(__FILE__)."/controllers/");


?>