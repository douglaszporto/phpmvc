<?php /* Smarty version Smarty-3.1.19, created on 2014-12-23 11:17:23
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/Conhecimento/Conhecimento.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14898932135485bdf0271944-44470726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5561dd18d38b941949a8e17b5975f8da07ddf0ab' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/Conhecimento/Conhecimento.tpl',
      1 => 1419340559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14898932135485bdf0271944-44470726',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5485bdf03a8534_71071598',
  'variables' => 
  array (
    'tipos' => 0,
    'domain' => 0,
    'tipo' => 0,
    'assuntos' => 0,
    'assunto' => 0,
    'conteudoAssunto' => 0,
    'contAss' => 0,
    'conteudos' => 0,
    'conteudo' => 0,
    'cont' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5485bdf03a8534_71071598')) {function content_5485bdf03a8534_71071598($_smarty_tpl) {?><div id="conhecimento" class="fundo">
	<div class="center">
		<?php  $_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tipo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->key => $_smarty_tpl->tpl_vars['tipo']->value) {
$_smarty_tpl->tpl_vars['tipo']->_loop = true;
?>
		
		<div class="conhecimento-tipo">
			
			<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/conhecimento/<?php echo $_smarty_tpl->tpl_vars['tipo']->value['strIdentificador'];?>
" class="no-link">
				<div class="conhecimento-resumo">
					<h2>
						<?php echo $_smarty_tpl->tpl_vars['tipo']->value['strTitulo'];?>
	
					</h2>
					<p>
						<?php echo $_smarty_tpl->tpl_vars['tipo']->value['strDescricao'];?>
 
					</p> 
					
					<br />
					<br />
					<p class="ar">
						<span class="texto-link">Veja todos os <?php echo $_smarty_tpl->tpl_vars['tipo']->value['strTitulo'];?>
</span>
					</p>
				</div>
			</a>
			
			<div class="conhecimento-itens">
			<?php  $_smarty_tpl->tpl_vars['assunto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['assunto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['assuntos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['assunto']->key => $_smarty_tpl->tpl_vars['assunto']->value) {
$_smarty_tpl->tpl_vars['assunto']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['assunto']->value['nTipoID']==$_smarty_tpl->tpl_vars['tipo']->value['nTipoID']) {?>
				<div class="conhecimento-assunto">
					<h3>
						<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/conhecimento/<?php echo $_smarty_tpl->tpl_vars['tipo']->value['strIdentificador'];?>
/<?php echo $_smarty_tpl->tpl_vars['assunto']->value['strIdentificador'];?>
" class="no-link">
							<?php echo $_smarty_tpl->tpl_vars['assunto']->value['strTitulo'];?>
 
						</a>
					</h3>
					
					<?php $_smarty_tpl->tpl_vars["cont"] = new Smarty_variable(0, null, 0);?>
					<ul>
					<?php  $_smarty_tpl->tpl_vars['contAss'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contAss']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['conteudoAssunto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contAss']->key => $_smarty_tpl->tpl_vars['contAss']->value) {
$_smarty_tpl->tpl_vars['contAss']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['contAss']->value['nAssuntoID']==$_smarty_tpl->tpl_vars['assunto']->value['nAssuntoID']) {?>
							<?php  $_smarty_tpl->tpl_vars['conteudo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['conteudo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['conteudos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['conteudo']->key => $_smarty_tpl->tpl_vars['conteudo']->value) {
$_smarty_tpl->tpl_vars['conteudo']->_loop = true;
?> 
								<?php if ($_smarty_tpl->tpl_vars['conteudo']->value['nConteudoID']==$_smarty_tpl->tpl_vars['contAss']->value['nConteudoID']&&$_smarty_tpl->tpl_vars['cont']->value<2) {?>	
									<?php $_smarty_tpl->tpl_vars["cont"] = new Smarty_variable($_smarty_tpl->tpl_vars['cont']->value+1, null, 0);?>
						<li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/conhecimento/<?php echo $_smarty_tpl->tpl_vars['tipo']->value['strIdentificador'];?>
/<?php echo $_smarty_tpl->tpl_vars['assunto']->value['strIdentificador'];?>
/<?php echo $_smarty_tpl->tpl_vars['conteudo']->value['strIdentificador'];?>
">
									<?php echo $_smarty_tpl->tpl_vars['conteudo']->value['strTitulo'];?>

							</a>
						</li>
								<?php }?>
							<?php } ?>
						<?php }?>
					<?php } ?>
						<li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/conhecimento/<?php echo $_smarty_tpl->tpl_vars['tipo']->value['strIdentificador'];?>
/<?php echo $_smarty_tpl->tpl_vars['assunto']->value['strIdentificador'];?>
" >
								Ver mais
							</a>
						</li>
					</ul>
				</div>
				<?php }?>
			<?php } ?>
			</div>

		</div>
		<?php } ?>
		<br clear="all"/>
	</div>
</div>

		<?php }} ?>