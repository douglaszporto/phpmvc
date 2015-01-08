<?php /* Smarty version Smarty-3.1.19, created on 2014-11-13 11:42:26
         compiled from "D:\ProjetosWeb\site_rebuild\views\Title.tpl" */ ?>
<?php /*%%SmartyHeaderCode:318005464b54282a891-67802045%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c46b1f8dbdccbae6ae65b7d5b3b507142e972ba' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Title.tpl',
      1 => 1415883786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '318005464b54282a891-67802045',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'breadcrumb' => 0,
    'b' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464b542888bc4_48144644',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464b542888bc4_48144644')) {function content_5464b542888bc4_48144644($_smarty_tpl) {?><div id="title-bar">
	<h1 class="center"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
</div>
<div id="breadcrumb">
	<ul class="center">
	<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['b']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['b']->key;?>
"><?php echo $_smarty_tpl->tpl_vars['b']->key;?>
</a><span class='breadcrumb-space'>&gt;</span></li>
	<?php } ?>
	</ul>
	<br clear="all" class="not-smallres"/>
</div><?php }} ?>
