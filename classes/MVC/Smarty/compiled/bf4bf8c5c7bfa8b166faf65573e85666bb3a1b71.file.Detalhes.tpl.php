<?php /* Smarty version Smarty-3.1.19, created on 2014-12-10 15:04:53
         compiled from "D:\ProjetosWeb\site_rebuild\views\Produtos\Detalhes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:321895478a9fc21da50-64840450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf4bf8c5c7bfa8b166faf65573e85666bb3a1b71' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Produtos\\Detalhes.tpl',
      1 => 1418062517,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '321895478a9fc21da50-64840450',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5478a9fc29f816_70264903',
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
<?php if ($_valid && !is_callable('content_5478a9fc29f816_70264903')) {function content_5478a9fc29f816_70264903($_smarty_tpl) {?><div class="center">
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
		<div class="product-detail-item">
			<img class="product-detail-item-image" src="<?php echo $_smarty_tpl->tpl_vars['detail']->value['strMiniatura'];?>
"/>
			<div class="product-detail-item-content">
				<h3><?php echo $_smarty_tpl->tpl_vars['detail']->value['strTitulo'];?>
</h3>
				<p><?php echo $_smarty_tpl->tpl_vars['detail']->value['strDescricao'];?>
</p>
				<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produtos/<?php echo $_smarty_tpl->tpl_vars['productRootURL']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['detail']->value['strIdentificador'];?>
" class="fr"><span class="icon">&#xf067;</span>Saiba Mais</a>
				<br clear="all" />
			</div>
			<br clear="all" />
		</div>
		<?php } ?>
	</div>
	<br clear="all" />
</div><?php }} ?>
