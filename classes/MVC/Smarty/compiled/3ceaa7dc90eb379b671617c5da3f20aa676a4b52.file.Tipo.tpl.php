<?php /* Smarty version Smarty-3.1.19, created on 2015-01-07 06:00:01
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/Conhecimento/Tipo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9529895525485bdf829f829-89150489%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ceaa7dc90eb379b671617c5da3f20aa676a4b52' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/Conhecimento/Tipo.tpl',
      1 => 1419340559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9529895525485bdf829f829-89150489',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5485bdf8312cb9_47533139',
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
<?php if ($_valid && !is_callable('content_5485bdf8312cb9_47533139')) {function content_5485bdf8312cb9_47533139($_smarty_tpl) {?><div class = "center">
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
			<ol class = "lista-conhecimento colored" >
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
		<?php } ?>
	</div>
	<br clear="all">
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../Newsletter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
