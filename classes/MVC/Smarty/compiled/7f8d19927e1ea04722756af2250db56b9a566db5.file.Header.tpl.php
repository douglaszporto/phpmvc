<?php /* Smarty version Smarty-3.1.19, created on 2014-12-12 09:08:02
         compiled from "D:\ProjetosWeb\site_rebuild\views\Header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:280675464aca2353dc8-57861002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f8d19927e1ea04722756af2250db56b9a566db5' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Header.tpl',
      1 => 1418321185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280675464aca2353dc8-57861002',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464aca2401a36_71712228',
  'variables' => 
  array (
    'titulo' => 0,
    'descricao' => 0,
    'domain' => 0,
    'version' => 0,
    'googleAnalytics' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464aca2401a36_71712228')) {function content_5464aca2401a36_71712228($_smarty_tpl) {?><!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="content-language" content="pt-br" />
		<meta http-equiv="content-style-type" content="text/css" />
		<meta name="title" content="<?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
" />
		<meta name="author" content="Nelogica" />
		<meta name="language" content="Portuguese" />
		<meta name="copyright" content="Nelogica" /> 
		<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['descricao']->value;?>
" />
		<meta name="keywords" content="mercado financeiro, mercado financeiro brasileiro, bolsa de valores, acao, acões, opcões, software, análise técnica, análise gráfica, investir, investimentos, ProfitChart, Brasil" />
		<meta name="rating" content="general" />
		<meta name="robots" content="index, follow" />
		<meta name="revisit-after" content="20 days" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="format-detection" content="telephone=no" />

		<title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>

		<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/images/favicon.ico?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" />

		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/css/small.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" media="all"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/css/medium.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" media="all and (min-width: 600px)"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/css/large.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" media="all and (min-width: 1000px)"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/css/extra.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"/>

		<script type="text/javascript">var SITE_DOMAIN = '<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
'</script>

		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/js/script.js?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"></script>

		<?php if ($_smarty_tpl->tpl_vars['googleAnalytics']->value) {?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','".$protocol."//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-20470286-1', 'auto');
			ga('send', 'pageview');
		</script>
		<?php }?>

	</head>
	<body>
		<div id="wrapper">

			<div id="header">
				<div class="center">
					<a id="logo" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
">&nbsp;</a>
					<div id="menuButton">&#xf039;</div>
					<ul id="menu">
						<li id="login">
							<?php echo $_smarty_tpl->getSubTemplate ('User/Header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

						</li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/empresa/sobre" alt="Empresa">Empresa</a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produtos" alt="Produtos">Produtos</a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/conhecimento" alt="Conhecimento">Conhecimento</a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/contato" alt="Fale Conosco">Fale Conosco</a></li>
					</ul>
					<br clear="all"/>
				</div>
			</div>

			<div id="content">
<?php }} ?>
