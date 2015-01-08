<?php /* Smarty version Smarty-3.1.19, created on 2014-12-12 09:08:02
         compiled from "D:\ProjetosWeb\site_rebuild\views\Exception.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9832547712d94d0da2-07741927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2df237eda02c128feb4e586168d1b5c962c15e80' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Exception.tpl',
      1 => 1418321185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9832547712d94d0da2-07741927',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_547712d9513a36_21471984',
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547712d9513a36_21471984')) {function content_547712d9513a36_21471984($_smarty_tpl) {?><div id="banner-erro">
	<div class="center" style="height:100%;">
		<div id="bannerTitle">
			<h1 class = "texto-info">
				Desculpe, ocoreu algum erro.									
			</h1>	
			<br />
			<p>Mas não se preocupe, registramos o erro e resolveremos o problema o mais rápido possível</p>
			<br />			
			<br />				
			<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
">Voltar para pagina inicial</a>				
		</div>	
		<div id="bannerImage">
			<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/images/ops.png" >
		</div>	
		<br clear="all" />
	</div>
</div>






<?php }} ?>
