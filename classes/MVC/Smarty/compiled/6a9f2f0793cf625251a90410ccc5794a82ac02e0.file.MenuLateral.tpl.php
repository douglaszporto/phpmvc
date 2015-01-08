<?php /* Smarty version Smarty-3.1.19, created on 2014-12-16 11:41:16
         compiled from "D:\ProjetosGit\SiteRebuild\views\MenuLateral.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103475464ac3ea7a2c8-19065730%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a9f2f0793cf625251a90410ccc5794a82ac02e0' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\MenuLateral.tpl',
      1 => 1418735196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103475464ac3ea7a2c8-19065730',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464ac3eab8ad7_10151684',
  'variables' => 
  array (
    'menu' => 0,
    'domain' => 0,
    'grupo' => 0,
    'request_path' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464ac3eab8ad7_10151684')) {function content_5464ac3eab8ad7_10151684($_smarty_tpl) {?>
<div id="menu-anchor">
	 Menu <span>&#xf054;</span>
</div>	

<ul class="sidemenu" >
	<?php  $_smarty_tpl->tpl_vars['grupo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['grupo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['grupo']->key => $_smarty_tpl->tpl_vars['grupo']->value) {
$_smarty_tpl->tpl_vars['grupo']->_loop = true;
?>
		
		<?php if (!empty($_smarty_tpl->tpl_vars['grupo']->key)) {?>

			<li class="sidemenu-group">
				<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['grupo']->value['link'];?>
">
					<?php if (strpos($_smarty_tpl->tpl_vars['grupo']->key,'ProfitChart')!==false) {?>
						<?php echo str_replace('ProfitChart','<b>Profit</b>Chart<span class="trademark">®</span>',$_smarty_tpl->tpl_vars['grupo']->key);?>

					<?php } else { ?>
						<?php echo $_smarty_tpl->tpl_vars['grupo']->key;?>

					<?php }?>
				</a>
			</li>

		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['grupo']->value['open']) {?>

			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['grupo']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
				<li class="sidemenu-item <?php if (strpos($_smarty_tpl->tpl_vars['request_path']->value,$_smarty_tpl->tpl_vars['item']->value)!==false) {?>selected<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->key;?>
</a></li>
			<?php } ?>

		<?php }?>

	<?php } ?>
</ul>
<?php }} ?>
