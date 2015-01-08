<?php /* Smarty version Smarty-3.1.19, created on 2014-12-23 11:21:35
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/Produtos/Caracteristica.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15682698265482ab4ca1e224-16933258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43d2bdc8b01afbb848af66e5b61de7c2f81f929e' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/Produtos/Caracteristica.tpl',
      1 => 1419340561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15682698265482ab4ca1e224-16933258',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5482ab4cb745f9_26773205',
  'variables' => 
  array (
    'texto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5482ab4cb745f9_26773205')) {function content_5482ab4cb745f9_26773205($_smarty_tpl) {?><div class="center">
	<?php echo $_smarty_tpl->getSubTemplate ('MenuLateral.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div class="conteudo"> 
		<?php echo $_smarty_tpl->tpl_vars['texto']->value;?>

	</div>
	<br clear="all" />
</div><?php }} ?>
