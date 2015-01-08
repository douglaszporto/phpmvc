<?php /* Smarty version Smarty-3.1.19, created on 2014-12-05 15:34:18
         compiled from "D:\ProjetosWeb\site_rebuild\views\User\UserLogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174815464b5575acaa8-16588983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8459a2a79481563c009b6f9bb7c631daf08c2909' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\User\\UserLogin.tpl',
      1 => 1417800842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174815464b5575acaa8-16588983',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464b557609cd7_23173086',
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464b557609cd7_23173086')) {function content_5464b557609cd7_23173086($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['message']->value!='') {?>
<div class="error center">
	<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div>
<?php }?>

<div class='center' id="login-form">
	<?php echo $_smarty_tpl->getSubTemplate ('User/UserForm.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<br clear="all" />
</div>
<?php }} ?>
