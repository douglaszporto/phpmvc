<div class="center">
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
					<td class="al">{{$produto}}</td>
					<td>Isento</td>
					<td class="ar">R$ {{$valor|number_format:2:',':'.'}}</td>
				</tr>
				<tr class="footer">
					<td colspan="2" class="ar b">Total</td>
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

	<div class="greenButton button" id="buy-continue"><a id="buy-continue-link" href="{{$domain}}/produtos/assinar/{{$planoAssinatura}}/1">Avançar</a></div>
</div>