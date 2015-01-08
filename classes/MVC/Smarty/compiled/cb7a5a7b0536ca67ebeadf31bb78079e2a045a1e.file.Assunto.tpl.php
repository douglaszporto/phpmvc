<?php /* Smarty version Smarty-3.1.19, created on 2015-01-07 05:52:38
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/Conhecimento/Assunto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3570650195485bdfd556f98-10074453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb7a5a7b0536ca67ebeadf31bb78079e2a045a1e' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/Conhecimento/Assunto.tpl',
      1 => 1419340559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3570650195485bdfd556f98-10074453',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5485bdfd5f9423_86242408',
  'variables' => 
  array (
    'tiposAssuntosConteudo' => 0,
    'tipoAssCont' => 0,
    'assunto' => 0,
    'domain' => 0,
    'tipo' => 0,
    'conteudo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5485bdfd5f9423_86242408')) {function content_5485bdfd5f9423_86242408($_smarty_tpl) {?><div class = "center">
	<?php echo $_smarty_tpl->getSubTemplate ('../MenuLateral.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php  $_smarty_tpl->tpl_vars['tipoAssCont'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tipoAssCont']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tiposAssuntosConteudo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tipoAssCont']->key => $_smarty_tpl->tpl_vars['tipoAssCont']->value) {
$_smarty_tpl->tpl_vars['tipoAssCont']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['tipoAssCont']->value['assunto']['strIdentificador']==$_smarty_tpl->tpl_vars['assunto']->value) {?>
			<div class = "conteudo">
				<h2><?php echo $_smarty_tpl->tpl_vars['tipoAssCont']->value['assunto']['strTitulo'];?>
</h2>
				<p><?php echo $_smarty_tpl->tpl_vars['tipoAssCont']->value['assunto']['strDescricao'];?>
</p><br />
					<ol class = "lista-conhecimento colored" >
						<?php  $_smarty_tpl->tpl_vars['conteudo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['conteudo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipoAssCont']->value['assunto']['conteudo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['conteudo']->key => $_smarty_tpl->tpl_vars['conteudo']->value) {
$_smarty_tpl->tpl_vars['conteudo']->_loop = true;
?>
							<li>	
								<p>
									<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/conhecimento/<?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tipoAssCont']->value['assunto']['strIdentificador'];?>
/<?php echo $_smarty_tpl->tpl_vars['conteudo']->value['strIdentificador'];?>
">
										<?php echo $_smarty_tpl->tpl_vars['conteudo']->value['strTitulo'];?>
 
									</a>
									<?php if (!empty($_smarty_tpl->tpl_vars['conteudo']->value['strDescricao'])) {?>
									<br />
										<?php echo $_smarty_tpl->tpl_vars['conteudo']->value['strDescricao'];?>

									<br /><br />
									<?php }?>
								</p>
							
							</li>
						<?php } ?>
					</ol>	
			</div>
		<?php }?>
	<?php } ?>
	<br clear="all">
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../Newsletter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
