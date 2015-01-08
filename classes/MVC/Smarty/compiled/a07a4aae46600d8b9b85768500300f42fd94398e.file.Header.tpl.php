<?php /* Smarty version Smarty-3.1.19, created on 2014-11-28 14:38:50
         compiled from "D:\ProjetosGit\SiteRebuild\views\User\Header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:289975464a90f73e5d8-26051562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a07a4aae46600d8b9b85768500300f42fd94398e' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\User\\Header.tpl',
      1 => 1417192728,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '289975464a90f73e5d8-26051562',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464a90f74dfd3_07735159',
  'variables' => 
  array (
    'user' => 0,
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464a90f74dfd3_07735159')) {function content_5464a90f74dfd3_07735159($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user']->value==false) {?>
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
