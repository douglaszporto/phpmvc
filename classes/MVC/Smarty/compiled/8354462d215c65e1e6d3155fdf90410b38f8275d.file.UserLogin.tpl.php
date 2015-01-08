<?php /* Smarty version Smarty-3.1.19, created on 2015-01-07 05:52:52
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/User/UserLogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94031553454874f04554793-32756849%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8354462d215c65e1e6d3155fdf90410b38f8275d' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/User/UserLogin.tpl',
      1 => 1419340562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94031553454874f04554793-32756849',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54874f0464c9f2_03980772',
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54874f0464c9f2_03980772')) {function content_54874f0464c9f2_03980772($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['message']->value!='') {?>
<div class="error center">
	<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div>
<?php }?>

<div class='center' id="login-form">
	<?php echo $_smarty_tpl->getSubTemplate ('User/UserForm.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<br clear="all" />
</div>
<?php }} ?>
