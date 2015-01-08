<?php /* Smarty version Smarty-3.1.19, created on 2014-12-12 11:16:48
         compiled from "D:\ProjetosWeb\site_rebuild\views\Produtos\Produtos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15132546f69cb213865-51106879%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06377a00161936eb57e74fc9aa8ac5816782a557' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Produtos\\Produtos.tpl',
      1 => 1418390206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15132546f69cb213865-51106879',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_546f69cb296c10_71288710',
  'variables' => 
  array (
    'produtos' => 0,
    'domain' => 0,
    'produto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546f69cb296c10_71288710')) {function content_546f69cb296c10_71288710($_smarty_tpl) {?><div id="product-global-content" class="fundo">
	<div class="center">
		<?php  $_smarty_tpl->tpl_vars['produto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['produto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['produtos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['produto']->key => $_smarty_tpl->tpl_vars['produto']->value) {
$_smarty_tpl->tpl_vars['produto']->_loop = true;
?>
				<div class="product-index">
					<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produtos/<?php echo $_smarty_tpl->tpl_vars['produto']->value['strIdentificador'];?>
" class="no-link cancel-link" >
						<img class="product-index-image" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['produto']->value['strImagemIndice'];?>
"/>
					</a>
					<div class="product-index-info">
						<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produtos/<?php echo $_smarty_tpl->tpl_vars['produto']->value['strIdentificador'];?>
" class="no-link cancel-link" >
							<div class="product-index-title">
								<?php if (strpos($_smarty_tpl->tpl_vars['produto']->value['strNome'],'ProfitChart')!==false) {?>
									<?php echo str_replace('ProfitChart','<b>Profit</b>Chart<span class="trademark">®</span>',$_smarty_tpl->tpl_vars['produto']->value['strNome']);?>

								<?php } else { ?>
									<?php echo $_smarty_tpl->tpl_vars['produto']->value['strNome'];?>

								<?php }?>
							</div><br clear="all" />
							<div class="product-index-text">
								<?php echo $_smarty_tpl->tpl_vars['produto']->value['strDescricaoIndice'];?>

							</div>
						</a>
						<p class="product-index-link">
							<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produtos/<?php echo $_smarty_tpl->tpl_vars['produto']->value['strIdentificador'];?>
">
								<span class="icon">&#xf067;</span>Saiba mais
							</a>
						</p>
					</div>
				</div>
		<?php } ?>
		<br clear="all"/>
	</div>
</div>
<?php }} ?>
