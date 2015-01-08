<?php /* Smarty version Smarty-3.1.19, created on 2014-12-30 13:05:43
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19060231895485bd81bb5b03-22235176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1952dfc670ced47d125530398c8bc58fae224574' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/404.tpl',
      1 => 1419340557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19060231895485bd81bb5b03-22235176',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5485bd81bfccb5_37273696',
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5485bd81bfccb5_37273696')) {function content_5485bd81bfccb5_37273696($_smarty_tpl) {?>
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
