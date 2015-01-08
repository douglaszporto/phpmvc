<?php /* Smarty version Smarty-3.1.19, created on 2014-12-12 11:07:32
         compiled from "D:\ProjetosWeb\site_rebuild\views\Conhecimento\Assunto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15496547c8f94734512-78296424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e40d2d216208b04f0e1adc0af5352d7ce0ed5b9' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Conhecimento\\Assunto.tpl',
      1 => 1418389650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15496547c8f94734512-78296424',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_547c8f947e03b2_08441091',
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
<?php if ($_valid && !is_callable('content_547c8f947e03b2_08441091')) {function content_547c8f947e03b2_08441091($_smarty_tpl) {?><div class = "center">
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
				<ol>
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
" class = "conhecimento-lista-items">
									<?php echo $_smarty_tpl->tpl_vars['conteudo']->value['strTitulo'];?>
 
								</a>
								<?php if (!empty($_smarty_tpl->tpl_vars['conteudo']->value['strDescricao'])) {?>
								<br />
									<?php echo $_smarty_tpl->tpl_vars['conteudo']->value['strDescricao'];?>

								<br />
								<?php }?>
							</p>
							<br />
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
