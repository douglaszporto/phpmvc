<?php /* Smarty version Smarty-3.1.19, created on 2014-12-02 15:56:23
         compiled from "D:\ProjetosWeb\site_rebuild\views\Assinatura\Detalhes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72995474c989e087d0-97407860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '269f300c28c3b1bd2d8d5e2e0943ea71357d5395' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Assinatura\\Detalhes.tpl',
      1 => 1417542981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72995474c989e087d0-97407860',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5474c989e584f2_16212659',
  'variables' => 
  array (
    'produto' => 0,
    'valor' => 0,
    'planoAssinatura' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5474c989e584f2_16212659')) {function content_5474c989e584f2_16212659($_smarty_tpl) {?><div class="center">
	<div class="buy-item active">Detalhes</div>
	<div class="buy-item">Pagamento</div>
	<div class="buy-item">Confirmação</div>
	<br clear="all">
</div>
<div id="buy-content" class="center">
	<p id="buy-description">Confira o seu pedido abaixo e depois clique em "Continuar" para continuar com a compra.</p>
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
					<td colspan="2" class="ar b">Total</td>
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

	<div class="greenButton button" id="buy-continue"><a id="buy-continue-link" href="/produtos/assinar/<?php echo $_smarty_tpl->tpl_vars['planoAssinatura']->value;?>
/1">Avançar</a></div>
</div><?php }} ?>