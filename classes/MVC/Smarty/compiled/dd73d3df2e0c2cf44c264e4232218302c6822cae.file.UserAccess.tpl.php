<?php /* Smarty version Smarty-3.1.19, created on 2014-12-17 19:14:34
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/User/UserAccess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95600900454874f13ea7f42-17836623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd73d3df2e0c2cf44c264e4232218302c6822cae' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/User/UserAccess.tpl',
      1 => 1418648097,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95600900454874f13ea7f42-17836623',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54874f140284d2_29337112',
  'variables' => 
  array (
    'header' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54874f140284d2_29337112')) {function content_54874f140284d2_29337112($_smarty_tpl) {?><script type="text/javascript">
<?php $_smarty_tpl->tpl_vars['header'] = new Smarty_variable($_smarty_tpl->getSubTemplate ('User/Header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0));?>

$('#login').html('<?php echo preg_replace("%(?<!\\\\)'%", "\'",preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['header']->value));?>
');
General.LinkEvents();
</script><?php }} ?>
