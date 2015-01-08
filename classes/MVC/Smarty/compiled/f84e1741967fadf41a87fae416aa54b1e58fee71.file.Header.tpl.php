<?php /* Smarty version Smarty-3.1.19, created on 2014-12-23 11:17:20
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/User/Header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8943339135482022db6d715-81415752%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f84e1741967fadf41a87fae416aa54b1e58fee71' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/User/Header.tpl',
      1 => 1419340562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8943339135482022db6d715-81415752',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5482022db89945_19207054',
  'variables' => 
  array (
    'user' => 0,
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5482022db89945_19207054')) {function content_5482022db89945_19207054($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user']->value==false) {?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/login" alt="Acesse sua conta">Acesse sua conta</a>
<?php } else { ?>
	<div id="usuario-logado">
		Bem vindo, <?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
.
		<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/conta/">Minha conta</a> | 
		<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/login/sair/">Sair</a>
	</div>
<?php }?><?php }} ?>
