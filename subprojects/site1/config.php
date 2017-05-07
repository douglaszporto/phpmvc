<?php

/*
	SITE DEFINITIONS
	
	SITE_NAME: Site's name'
	SITE_VERSION: Current version. Change this value to force cache update
	SITE_DOMAIN: Root path. It replaces {{$domain}} at templates.
	SITE_PRODUCTION: This flag define if site is on "Production" ou "Develop" mode 
*/

define('SITE_NAME', 'Site 1');
define('SITE_VERSION', '20170506');
define('SITE_DOMAIN', '//site1.localhost.wiifixbase');
define('SITE_PRODUCTION', false);

define('SITE_HEADTITLE', 'Wii Fix repair samsung galaxy repair apple iphone and sony');
define('SITE_DESCRIPTION', 'Wii Fix  Free repair quote repair samsung galaxy repair apple iphone and repair sony xperia');
define('SITE_TITLE', 'WiiFix Repair Apple, Samsung, Sony, Nokia, Microsoft and Nintendo');
define('SITE_SUBTITLE', 'Repair company for Apple, Samsung, Sony, Nokia, Microsoft and Nintendo.');
define('SITE_ADDRESSFULL', '250 Liverpool Road, Eccles, Manchester, M30 0SD');
define('SITE_ADDRESSSTREET', '250 Liverpool Road');
define('SITE_ADDRESSLOCALITY', 'Eccles');
define('SITE_ADDRESSREGION', 'Manchester');
define('SITE_ADDRESSPOSTALCODE', 'M30 0SD');
define('SITE_ADDRESSCOUNTRYNAME', 'Lancashire');
define('SITE_OPENINGTIMES', 'Monday - Sunday, 9am to 6pm');
define('SITE_PHONE', '0161 278 1849');
define('SITE_LANG','en-gb');
define('SITE_LANGUAGE','english');
define('SITE_DEVELOPER','WiiFix');
define('SITE_EMAIL','Techdepartment@wii-fix.co.uk');
define('SITE_GEOLATITUDE','53.482582');
define('SITE_GEOLONGITUDE','-2.354219');
define('SITE_GOOGLEANALYTICSID','UA-XXXXXXXX-X');

define('SITE_FACEBOOK', 'https://facebook.com/');
define('SITE_GOOGLEPLUS', 'https://google.com/');
define('SITE_TWITTER', 'https://twitter.com/');
define('SITE_PINTREST', 'https://pintrest.com/');

define('FACEBOOK_TYPE','business.business');
define('FACEBOOK_TITLE','Wiifix.com');
define('FACEBOOK_DESCRIPTION','Wii Fix  Repair Service Centre UK has the Best Engineers & Trained Experts. iPhone, Macbook, iPad mini, iPod  free repair quote.');
define('FACEBOOK_URL','http://www.wiifix.com');
define('FACEBOOK_LOGO','http://wiifix.com/img/logo.png');
define('FACEBOOK_APPID','244346806021763');

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
define('DB_USER', 'wiifix');
define('DB_PASS', 'Pass#word1');
define('DB_DATABASE', 'wiifix');
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