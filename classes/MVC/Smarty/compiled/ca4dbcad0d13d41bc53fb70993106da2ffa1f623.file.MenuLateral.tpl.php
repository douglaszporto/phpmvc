<?php /* Smarty version Smarty-3.1.19, created on 2014-12-23 11:17:27
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/MenuLateral.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91328799754820234cd3374-19500547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca4dbcad0d13d41bc53fb70993106da2ffa1f623' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/MenuLateral.tpl',
      1 => 1419340558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91328799754820234cd3374-19500547',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54820234d212a1_39624304',
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
<?php if ($_valid && !is_callable('content_54820234d212a1_39624304')) {function content_54820234d212a1_39624304($_smarty_tpl) {?>
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
