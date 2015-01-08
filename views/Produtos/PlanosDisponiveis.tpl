<div class="center">
	{{include 'MenuLateral.tpl'}}
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
					<th width="13%">Planos de {{$condicaoEspecial}}*</th>
					<th width="11%">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{{foreach $planosNaoProfissionais as $plano}}
				<tr>
					<td class="al">{{$plano.strNome}}</td>
					<td><span style="color:#438200; font-weight: bold;">Isento</span></td>
					<td>R${{$plano.fPrecoReais|number_format:2:',':'.'}}</td>
					<td><a href="/contato/">Consultar</a></td>
					<td><a class="greenButton button btnAssinar" href="{{$domain}}/produtos/assinar/{{$plano.nPlanoAssinaturaID}}">Assinar</a></td>
				</tr>
				{{/foreach}}
			</tbody>
		</table>

		{{foreach $planosNaoProfissionais as $plano}}
		<div id="price-compact">
			<div class="label">Planos</div>
			<div class="value">{{$plano.strNome}}</div>
			<div class="label">Taxa de Adesão</div>
			<div class="value"><span style="color:#438200; font-weight: bold;">Isento</span></div>
			<div class="label">Mensalidade</div>
			<div class="value">R$ {{$plano.fPrecoReais|number_format:2:',':'.'}}</div>
			<div class="label">Planos de {{$condicaoEspecial}}*</div>
			<div class="value">
				<a href="/contato/">Consultar</a>
				<a class="greenButton button btnAssinar fr" href="{{$domain}}/produtos/assinar/{{$plano.nPlanoAssinaturaID}}">Assinar</a><br clear="all" />
			</div>
		</div>
		{{/foreach}}

		<h3>Para cliente profissional</h3>

		<table class="price-table">
			<thead>
				<tr>
					<th width="50%">Planos</th>
					<th width="13%">Taxa de Ativação</th>
					<th width="13%">Mensalidade</th>
					<th width="13%">Planos de {{$condicaoEspecial}}*</th>
					<th width="11%">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{{foreach $planosProfissionais as $plano}}
				<tr>
					<td class="al">{{$plano.strNome}}</td>
					<td><span style="color:#438200; font-weight: bold;">Isento</span></td>
					<td>R${{$plano.fPrecoReais|number_format:2:',':'.'}}</td>
					<td><a href="/contato/">Consultar</a></td>
					<td><a class="greenButton button btnAssinar" href="{{$domain}}/produtos/assinar/{{$plano.nPlanoAssinaturaID}}">Assinar</a></td>
				</tr>
				{{/foreach}}
			</tbody>
		</table>

		{{foreach $planosProfissionais as $plano}}
		<div id="price-compact">
			<div class="label">Planos</div>
			<div class="value">{{$plano.strNome}}</div>
			<div class="label">Taxa de Adesão</div>
			<div class="value"><span style="color:#438200; font-weight: bold;">Isento</span></div>
			<div class="label">Mensalidade</div>
			<div class="value">R$ {{$plano.fPrecoReais|number_format:2:',':'.'}}</div>
			<div class="label">Planos de {{$condicaoEspecial}}*</div>
			<div class="value">
				<a href="/contato/">Consultar</a>
				<a class="greenButton button btnAssinar fr" href="{{$domain}}/produtos/assinar/{{$plano.nPlanoAssinaturaID}}">Assinar</a><br clear="all" />
			</div>
		</div>
		{{/foreach}}

		<h3>*Condições especiais de contratação</h3> 
		<p>
			Consulte o departamento comercial da Nelogica sobre condições  
			especiais para planos de {{$condicaoEspecial}} com valores e 
			funcionalidades diferentes.<br>
			Para mais informações <a href="/contato">Entre em contato</a> ou envie um e-mail para 
			comercial@nelogica.com.br.<br>
			Se preferir, ligue <b>(51) 3023.8272</b>.
		</p> 
	</div>
	<br clear="all"/>
</div>