<?php /* Smarty version Smarty-3.1.19, created on 2014-12-12 09:08:52
         compiled from "D:\ProjetosWeb\site_rebuild\views\404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182555464ac9bed1f42-25370343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '951f1bbe5025df04611a159b2a835048899ac212' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\404.tpl',
      1 => 1418321185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182555464ac9bed1f42-25370343',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464ac9c004d95_04963337',
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464ac9c004d95_04963337')) {function content_5464ac9c004d95_04963337($_smarty_tpl) {?>
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
