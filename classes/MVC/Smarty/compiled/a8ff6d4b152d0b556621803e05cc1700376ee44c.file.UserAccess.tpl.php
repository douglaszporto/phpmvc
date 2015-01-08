<?php /* Smarty version Smarty-3.1.19, created on 2014-12-11 09:25:39
         compiled from "D:\ProjetosGit\SiteRebuild\views\User\UserAccess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2962354789d5268a4a4-19164896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8ff6d4b152d0b556621803e05cc1700376ee44c' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\User\\UserAccess.tpl',
      1 => 1418240904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2962354789d5268a4a4-19164896',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54789d527411a5_48156454',
  'variables' => 
  array (
    'header' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54789d527411a5_48156454')) {function content_54789d527411a5_48156454($_smarty_tpl) {?><script type="text/javascript">
<?php $_smarty_tpl->tpl_vars['header'] = new Smarty_variable($_smarty_tpl->getSubTemplate ('User/Header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0));?>

$('#login').html('<?php echo preg_replace("%(?<!\\\\)'%", "\'",preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['header']->value));?>
');
General.LinkEvents();
</script><?php }} ?>
