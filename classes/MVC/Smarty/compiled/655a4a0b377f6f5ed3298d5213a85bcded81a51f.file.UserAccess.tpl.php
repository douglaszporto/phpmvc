<?php /* Smarty version Smarty-3.1.19, created on 2014-12-10 17:14:34
         compiled from "D:\ProjetosWeb\site_rebuild\views\User\UserAccess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87975475fe1c8c8178-11736958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '655a4a0b377f6f5ed3298d5213a85bcded81a51f' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\User\\UserAccess.tpl',
      1 => 1418238870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87975475fe1c8c8178-11736958',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5475fe1c9871e5_48607166',
  'variables' => 
  array (
    'header' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5475fe1c9871e5_48607166')) {function content_5475fe1c9871e5_48607166($_smarty_tpl) {?><script type="text/javascript">
<?php $_smarty_tpl->tpl_vars['header'] = new Smarty_variable($_smarty_tpl->getSubTemplate ('User/Header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0));?>

$('#login').html('<?php echo preg_replace("%(?<!\\\\)'%", "\'",preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['header']->value));?>
');
General.LinkEvents();
</script><?php }} ?>
