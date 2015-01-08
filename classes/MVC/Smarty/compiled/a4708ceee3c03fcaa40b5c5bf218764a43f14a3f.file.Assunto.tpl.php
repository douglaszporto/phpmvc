<?php /* Smarty version Smarty-3.1.19, created on 2014-12-15 15:59:21
         compiled from "D:\ProjetosGit\SiteRebuild\views\Conhecimento\Assunto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26328547de5a51b6bd7-69105927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4708ceee3c03fcaa40b5c5bf218764a43f14a3f' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\Conhecimento\\Assunto.tpl',
      1 => 1418666360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26328547de5a51b6bd7-69105927',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_547de5a52f3294_18197179',
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
<?php if ($_valid && !is_callable('content_547de5a52f3294_18197179')) {function content_547de5a52f3294_18197179($_smarty_tpl) {?><div class = "center">
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
