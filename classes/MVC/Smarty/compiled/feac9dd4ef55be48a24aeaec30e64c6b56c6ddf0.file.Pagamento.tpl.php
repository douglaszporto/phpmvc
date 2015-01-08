<?php /* Smarty version Smarty-3.1.19, created on 2014-12-15 14:48:06
         compiled from "D:\ProjetosGit\SiteRebuild\views\Assinatura\Pagamento.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50115478b2b1126fe0-79828866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'feac9dd4ef55be48a24aeaec30e64c6b56c6ddf0' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\Assinatura\\Pagamento.tpl',
      1 => 1417606229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50115478b2b1126fe0-79828866',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5478b2b11a7e87_98475515',
  'variables' => 
  array (
    'produto' => 0,
    'valor' => 0,
    'planoAssinatura' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5478b2b11a7e87_98475515')) {function content_5478b2b11a7e87_98475515($_smarty_tpl) {?><div class="center">
	<div class="buy-item">Detalhes</div>
	<div class="buy-item active">Pagamento</div>
	<div class="buy-item">Confirmação</div>
	<br clear="all">
</div>
<div id="buy-content" class="center">
	<p id="buy-description">
		Escolha a forma de pagamento desejada.<br/>
		No momento, estamos aceitando apenas Boleto Bancário. Em breve, disponibilizaremos outras formas de pagamento.
	</p>
	<div>
		<table id="price-table">
			<thead>
				<tr>
					<th width="60%">Produtos</th>
					<th width="20%">Taxa de Adesão</th>
					<th width="20%">Mensalidade</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="al"><?php echo $_smarty_tpl->tpl_vars['produto']->value;?>
</td>
					<td>Isento</td>
					<td class="ar">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valor']->value,2,',','.');?>
</td>
				</tr>
				<tr class="footer">
					<td colspan="2" class="ar"><b>Total</b></td>
					<td class="ar">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valor']->value,2,',','.');?>
</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div id="price-compact">
		<div class="label">Produto</div>
		<div class="value"><?php echo $_smarty_tpl->tpl_vars['produto']->value;?>
</div>
		<div class="label">Taxa de Adesão</div>
		<div class="value">Isento</div>
		<div class="label">Mensalidade</div>
		<div class="value">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valor']->value,2,',','.');?>
</div>
	</div>

	<h3 id='payment-method-title'>Forma de pagamento</h3>
	<div id="payment-method-image">
		<img src="/statics/images/payment/boleto.gif" width="60" height="31" align="absmiddle">
		<b>Boleto Bancário</b>
	</div>

	<div class="greenButton button" id="buy-continue"><a id="buy-continue-link" href="/produtos/assinar/<?php echo $_smarty_tpl->tpl_vars['planoAssinatura']->value;?>
/2">Finalizar Pedido</a></div>
</div><?php }} ?>
