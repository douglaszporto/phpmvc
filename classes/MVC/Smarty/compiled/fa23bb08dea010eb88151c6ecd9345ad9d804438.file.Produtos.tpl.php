<?php /* Smarty version Smarty-3.1.19, created on 2014-12-22 10:14:52
         compiled from "D:\ProjetosGit\SiteRebuild\views\Produtos\Produtos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2704546653358d7505-18680812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa23bb08dea010eb88151c6ecd9345ad9d804438' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\Produtos\\Produtos.tpl',
      1 => 1419250161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2704546653358d7505-18680812',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5466533598eeb3_00168972',
  'variables' => 
  array (
    'produtos' => 0,
    'domain' => 0,
    'produto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466533598eeb3_00168972')) {function content_5466533598eeb3_00168972($_smarty_tpl) {?><div id="product-global-content" class="fundo">
	<div class="center">
		<?php  $_smarty_tpl->tpl_vars['produto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['produto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['produtos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['produto']->key => $_smarty_tpl->tpl_vars['produto']->value) {
$_smarty_tpl->tpl_vars['produto']->_loop = true;
?>
				
			<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produtos/<?php echo $_smarty_tpl->tpl_vars['produto']->value['strIdentificador'];?>
" class="no-link" >	
				<div class="product-index hover-shadow">
					<img class="product-index-image" src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['produto']->value['strImagemIndice'];?>
"/>
					<div class="product-index-info">
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
						<p class="product-index-link">
							<span class="icon">&#xf067;</span>Saiba mais
						</p>
					</div>
				</div>
			</a>
		<?php } ?>
		<br clear="all"/>
	</div>
</div>
<?php }} ?>
