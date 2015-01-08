<?php /* Smarty version Smarty-3.1.19, created on 2014-12-23 11:17:23
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/Title.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3868273255482023327f982-59673460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd85bcc861a1bff19a1e1710b6c0845d30192c15b' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/Title.tpl',
      1 => 1419340558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3868273255482023327f982-59673460',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_548202332fc560_14338802',
  'variables' => 
  array (
    'title' => 0,
    'breadcrumb' => 0,
    'b' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548202332fc560_14338802')) {function content_548202332fc560_14338802($_smarty_tpl) {?><div id="title-bar">
	<h1 class="center"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
</div>
<div id="breadcrumb">
	<div class="center">
		<ul>
		<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['b']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['b']->key;?>
"><?php echo $_smarty_tpl->tpl_vars['b']->key;?>
</a></li>
			<li><span class='breadcrumb-space'>&#xf105;</span></li>
		<?php } ?>
		</ul>
		<br clear="all" class=""/>
	</div>
	
</div><?php }} ?>
