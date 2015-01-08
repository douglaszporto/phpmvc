<?php /* Smarty version Smarty-3.1.19, created on 2014-12-16 13:24:24
         compiled from "D:\ProjetosGit\SiteRebuild\views\Title.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89335464a9add31b91-04271437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '281684b5cc4baa043579dac6325c70cff5d6baa6' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\Title.tpl',
      1 => 1418743363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89335464a9add31b91-04271437',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464a9add74225_01451669',
  'variables' => 
  array (
    'title' => 0,
    'breadcrumb' => 0,
    'b' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464a9add74225_01451669')) {function content_5464a9add74225_01451669($_smarty_tpl) {?><div id="title-bar">
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
