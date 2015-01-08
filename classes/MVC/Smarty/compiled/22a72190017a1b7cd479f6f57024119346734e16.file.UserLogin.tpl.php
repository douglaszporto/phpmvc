<?php /* Smarty version Smarty-3.1.19, created on 2014-12-08 14:28:42
         compiled from "D:\ProjetosGit\SiteRebuild\views\User\UserLogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194445474c5599b24a7-15455340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22a72190017a1b7cd479f6f57024119346734e16' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\User\\UserLogin.tpl',
      1 => 1418046307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194445474c5599b24a7-15455340',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5474c559af6861_62143501',
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5474c559af6861_62143501')) {function content_5474c559af6861_62143501($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['message']->value!='') {?>
<div class="error center">
	<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div>
<?php }?>

<div class='center' id="login-form">
	<?php echo $_smarty_tpl->getSubTemplate ('User/UserForm.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<br clear="all" />
</div>
<?php }} ?>
