<?php /* Smarty version Smarty-3.1.19, created on 2014-12-18 09:44:55
         compiled from "D:\ProjetosGit\SiteRebuild\views\Produtos\PlanosDisponiveis.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13455485c169869731-34671712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b949cecb81b9ebd54ca93daad78ab6b4220ffb1d' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\Produtos\\PlanosDisponiveis.tpl',
      1 => 1418830014,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13455485c169869731-34671712',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5485c1698f6159_14846582',
  'variables' => 
  array (
    'condicaoEspecial' => 0,
    'planosNaoProfissionais' => 0,
    'plano' => 0,
    'domain' => 0,
    'planosProfissionais' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5485c1698f6159_14846582')) {function content_5485c1698f6159_14846582($_smarty_tpl) {?><div class="center">
	<?php echo $_smarty_tpl->getSubTemplate ('MenuLateral.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div class="conteudo">
		<h2>Tabela de Preços</h2>
		<p>
			Assine agora e tenha em suas mãos a mais alta tecnologia em 
			<b>análises</b> mais <b>precisas e eficientes</b>.
		</p> 
		<h3>Para cliente não profissional</h3>
		<table class="price-table">
			<thead>
				<tr>
					<th width="50%">Planos</th>
					<th width="13%">Taxa de Ativação</th>
					<th width="13%">Mensalidade</th>
					<th width="13%">Planos de <?php echo $_smarty_tpl->tpl_vars['condicaoEspecial']->value;?>
*</th>
					<th width="11%">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['plano'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plano']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['planosNaoProfissionais']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plano']->key => $_smarty_tpl->tpl_vars['plano']->value) {
$_smarty_tpl->tpl_vars['plano']->_loop = true;
?>
				<tr>
					<td class="al"><?php echo $_smarty_tpl->tpl_vars['plano']->value['strNome'];?>
</td>
					<td><span style="color:#438200; font-weight: bold;">Isento</span></td>
					<td>R$<?php echo number_format($_smarty_tpl->tpl_vars['plano']->value['fPrecoReais'],2,',','.');?>
</td>
					<td><a href="/contato/">Consultar</a></td>
					<td><a class="greenButton button btnAssinar" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produto/assinar/<?php echo $_smarty_tpl->tpl_vars['plano']->value['nPlanoAssinaturaID'];?>
">Assinar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<?php  $_smarty_tpl->tpl_vars['plano'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plano']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['planosNaoProfissionais']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plano']->key => $_smarty_tpl->tpl_vars['plano']->value) {
$_smarty_tpl->tpl_vars['plano']->_loop = true;
?>
		<div id="price-compact">
			<div class="label">Planos</div>
			<div class="value"><?php echo $_smarty_tpl->tpl_vars['plano']->value['strNome'];?>
</div>
			<div class="label">Taxa de Adesão</div>
			<div class="value"><span style="color:#438200; font-weight: bold;">Isento</span></div>
			<div class="label">Mensalidade</div>
			<div class="value">R$ <?php echo number_format($_smarty_tpl->tpl_vars['plano']->value['fPrecoReais'],2,',','.');?>
</div>
			<div class="label">Planos de <?php echo $_smarty_tpl->tpl_vars['condicaoEspecial']->value;?>
*</div>
			<div class="value">
				<a href="/contato/">Consultar</a>
				<a class="greenButton button btnAssinar fr" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produto/assinar/<?php echo $_smarty_tpl->tpl_vars['plano']->value['nPlanoAssinaturaID'];?>
">Assinar</a><br clear="all" />
			</div>
		</div>
		<?php } ?>

		<h3>Para cliente profissional</h3>

		<table class="price-table">
			<thead>
				<tr>
					<th width="50%">Planos</th>
					<th width="13%">Taxa de Ativação</th>
					<th width="13%">Mensalidade</th>
					<th width="13%">Planos de <?php echo $_smarty_tpl->tpl_vars['condicaoEspecial']->value;?>
*</th>
					<th width="11%">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['plano'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plano']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['planosProfissionais']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plano']->key => $_smarty_tpl->tpl_vars['plano']->value) {
$_smarty_tpl->tpl_vars['plano']->_loop = true;
?>
				<tr>
					<td class="al"><?php echo $_smarty_tpl->tpl_vars['plano']->value['strNome'];?>
</td>
					<td><span style="color:#438200; font-weight: bold;">Isento</span></td>
					<td>R$<?php echo number_format($_smarty_tpl->tpl_vars['plano']->value['fPrecoReais'],2,',','.');?>
</td>
					<td><a href="/contato/">Consultar</a></td>
					<td><a class="greenButton button btnAssinar" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produto/assinar/<?php echo $_smarty_tpl->tpl_vars['plano']->value['nPlanoAssinaturaID'];?>
">Assinar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<?php  $_smarty_tpl->tpl_vars['plano'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plano']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['planosProfissionais']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plano']->key => $_smarty_tpl->tpl_vars['plano']->value) {
$_smarty_tpl->tpl_vars['plano']->_loop = true;
?>
		<div id="price-compact">
			<div class="label">Planos</div>
			<div class="value"><?php echo $_smarty_tpl->tpl_vars['plano']->value['strNome'];?>
</div>
			<div class="label">Taxa de Adesão</div>
			<div class="value"><span style="color:#438200; font-weight: bold;">Isento</span></div>
			<div class="label">Mensalidade</div>
			<div class="value">R$ <?php echo number_format($_smarty_tpl->tpl_vars['plano']->value['fPrecoReais'],2,',','.');?>
</div>
			<div class="label">Planos de <?php echo $_smarty_tpl->tpl_vars['condicaoEspecial']->value;?>
*</div>
			<div class="value">
				<a href="/contato/">Consultar</a>
				<a class="greenButton button btnAssinar fr" href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/produto/assinar/<?php echo $_smarty_tpl->tpl_vars['plano']->value['nPlanoAssinaturaID'];?>
">Assinar</a><br clear="all" />
			</div>
		</div>
		<?php } ?>

		<h3>*Condições especiais de contratação</h3> 
		<p>
			Consulte o departamento comercial da Nelogica sobre condições  
			especiais para planos de <?php echo $_smarty_tpl->tpl_vars['condicaoEspecial']->value;?>
 com valores e 
			funcionalidades diferentes.<br>
			Para mais informações <a href="/contato">Entre em contato</a> ou envie um e-mail para 
			comercial@nelogica.com.br.<br>
			Se preferir, ligue <b>(51) 3023.8272</b>.
		</p> 
	</div>
	<br clear="all"/>
</div><?php }} ?>
