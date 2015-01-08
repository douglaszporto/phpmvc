<?php /* Smarty version Smarty-3.1.19, created on 2014-12-23 11:17:27
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/Produtos/Detalhes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123292579654820234c524a6-34190961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c97a2719e2b264f9204755d91b97b82b6d0fb8b' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/Produtos/Detalhes.tpl',
      1 => 1419340561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123292579654820234c524a6-34190961',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54820234cc2851_57483035',
  'variables' => 
  array (
    'slogan' => 0,
    'domain' => 0,
    'image' => 0,
    'productRootURL' => 0,
    'description' => 0,
    'details' => 0,
    'detail' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54820234cc2851_57483035')) {function content_54820234cc2851_57483035($_smarty_tpl) {?><div class="center">
	<?php echo $_smarty_tpl->getSubTemplate ('MenuLateral.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div class="conteudo">
		<div class="product-detail-header">
			<h2><?php echo $_smarty_tpl->tpl_vars['slogan']->value;?>
</h2>
			<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" />
			<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produtos/<?php echo $_smarty_tpl->tpl_vars['productRootURL']->value;?>
/download" class="blueButton button" id="product-test-now-button">Teste Agora</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produtos/<?php echo $_smarty_tpl->tpl_vars['productRootURL']->value;?>
/assinar" class="greenButton button" id="product-signin-button">Assine Já</a>
		</div>
		<div class="product-detail-description">
			<p>
				<?php echo $_smarty_tpl->tpl_vars['description']->value;?>

			</p>
		</div>
		<br />
		<?php  $_smarty_tpl->tpl_vars['detail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['detail']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['detail']->key => $_smarty_tpl->tpl_vars['detail']->value) {
$_smarty_tpl->tpl_vars['detail']->_loop = true;
?>
		
		<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produtos/<?php echo $_smarty_tpl->tpl_vars['productRootURL']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['detail']->value['strIdentificador'];?>
" class="no-link" >
			<div class="product-detail-item hover-shadow">
				<h3><?php echo $_smarty_tpl->tpl_vars['detail']->value['strTitulo'];?>
</h3>
				<img class="product-detail-item-image" src="<?php echo $_smarty_tpl->tpl_vars['detail']->value['strMiniatura'];?>
"/>
				
				<div class="product-detail-item-content">
					<p><?php echo $_smarty_tpl->tpl_vars['detail']->value['strDescricao'];?>
</p>
					<p class="product-index-link">
						<span class="icon">&#xf067;</span>Saiba mais
					</p>
					<br clear="all" />
				</div>
				<br clear="all" />
			</div>
		</a>
		
		<?php } ?>
	<br clear="all" />
	</div>
	<br clear="all" />
</div><?php }} ?>
