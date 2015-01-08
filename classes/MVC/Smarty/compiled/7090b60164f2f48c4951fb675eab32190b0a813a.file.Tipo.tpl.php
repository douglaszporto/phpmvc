<?php /* Smarty version Smarty-3.1.19, created on 2014-12-12 10:10:04
         compiled from "D:\ProjetosWeb\site_rebuild\views\Conhecimento\Tipo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22148547c8f91ed3774-58635299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7090b60164f2f48c4951fb675eab32190b0a813a' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Conhecimento\\Tipo.tpl',
      1 => 1418321185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22148547c8f91ed3774-58635299',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_547c8f9204fc20_77424499',
  'variables' => 
  array (
    'tiposAssuntosConteudo' => 0,
    'tipoAssCont' => 0,
    'domain' => 0,
    'tipo' => 0,
    'conteudo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547c8f9204fc20_77424499')) {function content_547c8f9204fc20_77424499($_smarty_tpl) {?><div class = "center">
	<?php echo $_smarty_tpl->getSubTemplate ('../MenuLateral.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div class = "conteudo">
		<?php  $_smarty_tpl->tpl_vars['tipoAssCont'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tipoAssCont']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tiposAssuntosConteudo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tipoAssCont']->key => $_smarty_tpl->tpl_vars['tipoAssCont']->value) {
$_smarty_tpl->tpl_vars['tipoAssCont']->_loop = true;
?>
			<h2><?php echo $_smarty_tpl->tpl_vars['tipoAssCont']->value['assunto']['strTitulo'];?>
</h2>			
			<p><?php echo $_smarty_tpl->tpl_vars['tipoAssCont']->value['assunto']['strDescricao'];?>
</p> <br /> 
			<ol>
				<?php  $_smarty_tpl->tpl_vars['conteudo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['conteudo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipoAssCont']->value['assunto']['conteudo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['conteudo']->key => $_smarty_tpl->tpl_vars['conteudo']->value) {
$_smarty_tpl->tpl_vars['conteudo']->_loop = true;
?>
					<li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/conhecimento/<?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tipoAssCont']->value['assunto']['strIdentificador'];?>
/<?php echo $_smarty_tpl->tpl_vars['conteudo']->value['strIdentificador'];?>
" class ="conhecimento-lista-items">	
							<?php echo $_smarty_tpl->tpl_vars['conteudo']->value['strTitulo'];?>

						</a>
					</li>
				<?php } ?>	
			</ol>			
		<br />
		<br />
		<?php } ?>
	</div>
	<br clear="all">
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../Newsletter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
