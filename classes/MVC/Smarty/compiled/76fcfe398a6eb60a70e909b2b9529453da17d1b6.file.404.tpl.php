<?php /* Smarty version Smarty-3.1.19, created on 2014-12-15 14:18:59
         compiled from "D:\ProjetosGit\SiteRebuild\views\404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35315464a90fc8dd18-21698403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76fcfe398a6eb60a70e909b2b9529453da17d1b6' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\404.tpl',
      1 => 1418384974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35315464a90fc8dd18-21698403',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464a90fcb8ca6_91486023',
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464a90fcb8ca6_91486023')) {function content_5464a90fcb8ca6_91486023($_smarty_tpl) {?>
<div id="banner-erro">
	<div class="center" style="height:100%;">
		<div id="bannerTitle">
			<h1 class = "texto-info">
				Desculpe, a página que você está procurando não existe									
			</h1>	
			<br />
			<br />			
			<br />				
			<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
">Voltar para página inicial</a>				
		</div>	
		<div id="bannerImage">
			<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/images/ops.png" >
		</div>	
		<br clear="all" />
	</div>
</div>


<?php }} ?>
