<?php /* Smarty version Smarty-3.1.19, created on 2014-12-18 09:55:22
         compiled from "D:\ProjetosGit\SiteRebuild\views\Exception.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1784154772c3f894d90-34224510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6fcbaae1b9adc8409eccb57668f921959743303' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\Exception.tpl',
      1 => 1418665649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1784154772c3f894d90-34224510',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54772c3f8eeb33_05550196',
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54772c3f8eeb33_05550196')) {function content_54772c3f8eeb33_05550196($_smarty_tpl) {?><div id="banner-erro">
	<div class="center" style="height:100%;">
		<div id="bannerTitle">
			<h1 class = "texto-info">
				Desculpe, ocorreu algum erro.									
			</h1>	
			<br />
			<p class = "texto-info">Mas não se preocupe, registramos o erro e resolveremos o problema o mais rápido possível</p>
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
