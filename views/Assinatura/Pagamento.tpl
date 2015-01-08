<div class="center">
	<div class="buy-item">Detalhes</div>
	<div class="buy-item active">Pagamento</div>
	<div class="buy-item">Confirmação</div>
	<br clear="all">
</div>
<div id="buy-content" class="center">
	<p id="buy-description">
		Escolha a forma de pagamento desejada.<br/>
		No moment aceitamos apenas Boleto Bancário. Em breve, disponibilizaremos outras formas de pagamento.
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
					<td class="al">{{$produto}}</td>
					<td>Isento</td>
					<td class="ar">R$ {{$valor|number_format:2:',':'.'}}</td>
				</tr>
				<tr class="footer">
					<td colspan="2" class="ar"><b>Total</b></td>
					<td class="ar">R$ {{$valor|number_format:2:',':'.'}}</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div id="price-compact">
		<div class="label">Produto</div>
		<div class="value">{{$produto}}</div>
		<div class="label">Taxa de Adesão</div>
		<div class="value">Isento</div>
		<div class="label">Mensalidade</div>
		<div class="value">R$ {{$valor|number_format:2:',':'.'}}</div>
	</div>

	<h3 id='payment-method-title'>Forma de pagamento</h3>
	<div id="payment-method-image">
		<img src="/statics/images/payment/boleto.gif" width="60" height="31" align="absmiddle">
		<b>Boleto Bancário</b>
	</div>

	<div class="greenButton button" id="buy-continue"><a id="buy-continue-link" href="{{$domain}}/produtos/assinar/{{$planoAssinatura}}/2">Finalizar Pedido</a></div>
</div>