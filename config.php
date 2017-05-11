<?php

/*
	SITE DEFINITIONS
	
	SITE_NAME: Site's name'
	SITE_VERSION: Current version. Change this value to force cache update
	SITE_DOMAIN: Root path. It replaces {{$domain}} at templates.
	SITE_PRODUCTION: This flag define if site is on "Production" ou "Develop" mode 
*/

define('SITE_NAME', 'PHP MVC Framework');
define('SITE_VERSION', '20150107');
define('SITE_DOMAIN', '//localhost.sysbuilder');
define('SITE_PRODUCTION', false);

define('SITE_HEADTITLE', 'PHP MVC - Douglas Zanotta');
define('SITE_DESCRIPTION', 'Meu framework pra desnevolvimento PHP');
define('SITE_TITLE', 'PHP MVC - Título');
define('SITE_SUBTITLE', 'Subtítulo aqui');
define('SITE_ADDRESSFULL', 'Endereço completo');
define('SITE_ADDRESSSTREET', 'Rua');
define('SITE_ADDRESSLOCALITY', 'Bairro');
define('SITE_ADDRESSREGION', 'Cidade');
define('SITE_ADDRESSPOSTALCODE', 'CEP');
define('SITE_ADDRESSCOUNTRYNAME', 'Estado');
define('SITE_OPENINGTIMES', 'De Segunda à Sexta - das 8h às 18h');
define('SITE_PHONE', '99999 9999');
define('SITE_LANG','pt-br');
define('SITE_LANGUAGE','portuguese');
define('SITE_DEVELOPER','Douglas Zanotta');
define('SITE_EMAIL','contato@site.com');
define('SITE_GEOLATITUDE','53.482582');
define('SITE_GEOLONGITUDE','-2.354219');
define('SITE_GOOGLEANALYTICSID','UA-XXXXXXXX-X');
define('SITE_FACEBOOK', 'https://facebook.com/');
define('SITE_GOOGLEPLUS', 'https://google.com/');
define('SITE_TWITTER', 'https://twitter.com/');
define('SITE_PINTREST', 'https://pintrest.com/');
define('FACEBOOK_TYPE','business.business');
define('FACEBOOK_TITLE','Site.com');
define('FACEBOOK_DESCRIPTION','Descriçã complata para o Facebook');
define('FACEBOOK_URL','http://www.wiifix.com');
define('FACEBOOK_LOGO', SITE_DOMAIN . '/statics/img/logo.png');
define('FACEBOOK_APPID','123123123123123');

/* 
	DATABASE CONNECTION PARAMS

	DB_HOST: Database's' address
	DB_USER: Database's' user
	DB_PASS: Database user's password
	DB_DATABASE: Database's name
	DB_DRIVER: Driver used for connection: Values available: mysql, postgres, mssql, sqlsrv, mysql_pdo
	DB_CHARSET: Default character encode 
*/
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '102030');
define('DB_DATABASE', 'phpmvc');
define('DB_DRIVER', 'mysql_pdo');
define('DB_CHARSET', 'UTF-8');

/*
	PATH DEFINITIONS

	PATH_DIR: Project root path
	PATH_MODELS: Model's path
	PATH_CONTROLLERS: Controllers' path 
*/
define('PATH_DIR', dirname(__FILE__)."/");
define('PATH_MODELS', dirname(__FILE__)."/models/");
define('PATH_CONTROLLERS', dirname(__FILE__)."/controllers/");

?>