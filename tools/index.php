<?php
	require_once dirname(__FILE__) . "/../config.php";

	$module = "";
	$extra  = "";

	if(isset($_INTERNAL["tools_page"][1])){
		$module = $_INTERNAL["tools_page"][1];

		if(isset($_INTERNAL["tools_page"][2]))
			$extra = $_INTERNAL["tools_page"][2];
	}

	if($module == 'ajax'){
		$file = dirname(__FILE__)."/modules/".$extra.".php";
		if(file_exists($file))
			require_once $file;
		else
			echo "Não localizado o módulo '$extra'";
		exit;
	}

	/*
		Para instalar um novo módulo, link seu css (no header), seu js (no footer), seu php (no body) e sua chamada no menu.
	*/

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="content-language" content="pt-br" />
		<meta http-equiv="content-style-type" content="text/css" />
		<meta name="title" content="Tools - <?php echo SITE_NAME; ?>" />
		<meta name="robots" content="noindex, nofollow" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="format-detection" content="telephone=no" />
		
		<title>Tools - <?php echo SITE_NAME; ?></title>
		
		<link rel="icon" href="<?php echo SITE_DOMAIN; ?>/statics/images/favicon.ico?v=<?php echo SITE_VERSION; ?>" />  

		<link rel="stylesheet" type="text/css" href="<?php echo SITE_DOMAIN; ?>/tools/statics/css/tools.css?v=<?php echo SITE_VERSION; ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo SITE_DOMAIN; ?>/tools/statics/css/jquery-ui.css?v=<?php echo SITE_VERSION; ?>" />

		<?php
			switch($module){
				case 'products':
					echo '<link rel="stylesheet" type="text/css" href="',SITE_DOMAIN,'/tools/statics/css/products.css?v=',SITE_VERSION,'" />'; break;
				case 'css-optimizer':
					echo '<link rel="stylesheet" type="text/css" href="',SITE_DOMAIN,'/tools/statics/css/css-optimizer.css?v=',SITE_VERSION,'" />'; break;
				case 'logs':
					echo '<link rel="stylesheet" type="text/css" href="',SITE_DOMAIN,'/tools/statics/css/logs.css?v=',SITE_VERSION,'" />'; break;
				case 'unit-tests':
					echo '<link rel="stylesheet" type="text/css" href="',SITE_DOMAIN,'/tools/statics/css/unit-tests.css?v=',SITE_VERSION,'" />'; break;
			}
		?>

		<script type="text/javascript">
			var SITE_DOMAIN = '<?php echo SITE_DOMAIN?>';
		</script>

		<script type="text/javascript" src="<?php echo SITE_DOMAIN; ?>/statics/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo SITE_DOMAIN; ?>/tools/statics/js/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo SITE_DOMAIN; ?>/tools/statics/js/tools.js?v=<?php echo SITE_VERSION; ?>"></script>

	</head>
	<body>
		<div id="header">
			&nbsp;
		</div>
		<div id="menu">
			<a href="<?php echo SITE_DOMAIN; ?>/tools/">
				<div class="menu-logo">
					&nbsp;
				</div>
			</a>
			<a href="<?php echo SITE_DOMAIN; ?>/tools/products/">
				<div class="menu-item">
					<div class="menu-icon">&#xe01b;</div>
					<div class="menu-name">Produtos</div>
					<div class="menu-label">Produtos</div>
				</div>
			</a>
			<a href="<?php echo SITE_DOMAIN; ?>/tools/css-optimizer/">
				<div class="menu-item">
					<div class="menu-icon">1</div>
					<div class="menu-name">CSS Optimizer</div>
					<div class="menu-label">CSS Optimizer</div>
				</div>
			</a>
			<a href="<?php echo SITE_DOMAIN; ?>/tools/logs/">
				<div class="menu-item">
					<div class="menu-icon">N</div>
					<div class="menu-name">Logs</div>
					<div class="menu-label">Access Logs</div>
				</div>
			</a>
			<a href="<?php echo SITE_DOMAIN; ?>/tools/unit-tests/">
				<div class="menu-item">
					<div class="menu-icon">&#xe07a;</div>
					<div class="menu-name">Tests</div>
					<div class="menu-label">Unit Tests</div>
				</div>
			</a>
		</div>
		<div id="wrapper">
			<div id="content">
				<?php
					switch($module){
						case 'products':
							require_once dirname(__FILE__) . "/modules/products.php"; break;
						case 'css-optimizer':
							require_once dirname(__FILE__) . "/modules/css-optimizer.php"; break;
						case 'logs':
							require_once dirname(__FILE__) . "/modules/logs.php"; break;
						case 'unit-tests':
							require_once dirname(__FILE__) . "/modules/unit-tests.php"; break;
						default:
							require_once dirname(__FILE__) . "/modules/main.php"; break;
					}
				?>
			</div>
		</div>
		<?php
			switch($module){
				case 'products':
					echo '<script type="text/javascript" src="',SITE_DOMAIN,'/tools/statics/js/products.js?v=',SITE_DOMAIN,'"></script>'; break;
				case 'css-optimizer':
					echo '<script type="text/javascript" src="',SITE_DOMAIN,'/tools/statics/js/css-optimizer.js?v=',SITE_DOMAIN,'"></script>'; break;
				case 'logs':
					echo '<script type="text/javascript" src="',SITE_DOMAIN,'/tools/statics/js/logs.js?v=',SITE_DOMAIN,'"></script>'; break;
			}
		?>

	</body>
</html>