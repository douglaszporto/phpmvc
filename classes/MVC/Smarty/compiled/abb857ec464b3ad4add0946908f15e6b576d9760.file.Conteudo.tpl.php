<?php /* Smarty version Smarty-3.1.19, created on 2015-01-07 05:52:44
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/Conhecimento/Conteudo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7155132075485be007af8f5-14877867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abb857ec464b3ad4add0946908f15e6b576d9760' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/Conhecimento/Conteudo.tpl',
      1 => 1419340559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7155132075485be007af8f5-14877867',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5485be00873cc1_77737536',
  'variables' => 
  array (
    'conteudo' => 0,
    'mustLogin' => 0,
    'anterior' => 0,
    'domain' => 0,
    'proximo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5485be00873cc1_77737536')) {function content_5485be00873cc1_77737536($_smarty_tpl) {?><div class = "center">
	<?php echo $_smarty_tpl->getSubTemplate ('../MenuLateral.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div class="conteudo">
		<?php echo $_smarty_tpl->tpl_vars['conteudo']->value['strHTML'];?>
 <br />
		<?php if ($_smarty_tpl->tpl_vars['mustLogin']->value) {?>
			<?php echo $_smarty_tpl->getSubTemplate ('../User/UserMustLogin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<br clear="all"/>
		<?php }?>
		<br/>
		<?php if (!empty($_smarty_tpl->tpl_vars['anterior']->value)) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/conhecimento/<?php echo $_smarty_tpl->tpl_vars['anterior']->value['tipo']['strIdentificador'];?>
/<?php echo $_smarty_tpl->tpl_vars['anterior']->value['assunto']['strIdentificador'];?>
/<?php echo $_smarty_tpl->tpl_vars['anterior']->value['conteudo']['strIdentificador'];?>
" class="conhecimento-link-anterior">	
				<span class = "icon-ant-prox">&#xf100;</span> <?php echo $_smarty_tpl->tpl_vars['anterior']->value['conteudo']['strTitulo'];?>

			</a>
		<?php }?>
		<?php if (!empty($_smarty_tpl->tpl_vars['proximo']->value)) {?> 
			<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/conhecimento/<?php echo $_smarty_tpl->tpl_vars['proximo']->value['tipo']['strIdentificador'];?>
/<?php echo $_smarty_tpl->tpl_vars['proximo']->value['assunto']['strIdentificador'];?>
/<?php echo $_smarty_tpl->tpl_vars['proximo']->value['conteudo']['strIdentificador'];?>
" class="conhecimento-link-proximo">	
				<?php echo $_smarty_tpl->tpl_vars['proximo']->value['conteudo']['strTitulo'];?>
 <span class = "icon-ant-prox">&#xf101;</span>
			</a>
		<?php }?>								
	</div>	
	<br clear="all">
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../Newsletter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
