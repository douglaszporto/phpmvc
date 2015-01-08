<?php /* Smarty version Smarty-3.1.19, created on 2014-12-01 13:55:56
         compiled from "D:\ProjetosWeb\site_rebuild\views\User\Header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22085464aca240cba7-24579601%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '443eede0a49453acb370d9f5f9d6e23e6c7de514' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\User\\Header.tpl',
      1 => 1417449219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22085464aca240cba7-24579601',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464aca242e977_42904786',
  'variables' => 
  array (
    'user' => 0,
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464aca242e977_42904786')) {function content_5464aca242e977_42904786($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user']->value==false) {?>
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
