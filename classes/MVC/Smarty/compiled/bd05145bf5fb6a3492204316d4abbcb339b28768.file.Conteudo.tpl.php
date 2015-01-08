<?php /* Smarty version Smarty-3.1.19, created on 2014-12-12 10:10:12
         compiled from "D:\ProjetosWeb\site_rebuild\views\Conhecimento\Conteudo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26145547c8f95f35d34-98703958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd05145bf5fb6a3492204316d4abbcb339b28768' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Conhecimento\\Conteudo.tpl',
      1 => 1418321185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26145547c8f95f35d34-98703958',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_547c8f960b8400_11791895',
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
<?php if ($_valid && !is_callable('content_547c8f960b8400_11791895')) {function content_547c8f960b8400_11791895($_smarty_tpl) {?><div class = "center">
	<?php echo $_smarty_tpl->getSubTemplate ('../MenuLateral.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div class = "conteudo">
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
" class = "conhecimento-link-anterior">	
				<span class = "icon-ant-prox">&#xf100;</span> <?php echo $_smarty_tpl->tpl_vars['anterior']->value['conteudo']['strTitulo'];?>

			</a>
		<?php }?>
		<?php if (!empty($_smarty_tpl->tpl_vars['proximo']->value)) {?> 
			<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/conhecimento/<?php echo $_smarty_tpl->tpl_vars['proximo']->value['tipo']['strIdentificador'];?>
/<?php echo $_smarty_tpl->tpl_vars['proximo']->value['assunto']['strIdentificador'];?>
/<?php echo $_smarty_tpl->tpl_vars['proximo']->value['conteudo']['strIdentificador'];?>
" class = "conhecimento-link-proximo">	
				<?php echo $_smarty_tpl->tpl_vars['proximo']->value['conteudo']['strTitulo'];?>
 <span class = "icon-ant-prox">&#xf101;</span>
			</a>
		<?php }?>								
	</div>	
	<br clear="all">
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../Newsletter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
