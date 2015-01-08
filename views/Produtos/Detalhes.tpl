<div class="center">
	{{include 'MenuLateral.tpl'}}
	<div class="conteudo">
		<div class="product-detail-header">
			<h2>{{$slogan}}</h2>
			<img src="{{$domain}}{{$image}}" />
			<a href="{{$domain}}/produtos/{{$productRootURL}}/download" class="blueButton button" id="product-test-now-button">Teste Agora</a>
			<a href="{{$domain}}/produtos/{{$productRootURL}}/assinar" class="greenButton button" id="product-signin-button">Assine Já</a>
		</div>
		<div class="product-detail-description">
			<p>
				{{$description}}
			</p>
		</div>
		<br />
		{{foreach $details as $detail}}
		
		<a href="{{$domain}}/produtos/{{$productRootURL}}/{{$detail.strIdentificador}}" class="no-link" >
			<div class="product-detail-item hover-shadow">
				<h3>{{$detail.strTitulo}}</h3>
				<img class="product-detail-item-image" src="{{$detail.strMiniatura}}"/>
				
				<div class="product-detail-item-content">
					<p>{{$detail.strDescricao}}</p>
					<p class="product-index-link">
						<span class="icon">&#xf067;</span>Saiba mais
					</p>
					<br clear="all" />
				</div>
				<br clear="all" />
			</div>
		</a>
		
		{{/foreach}}
	<br clear="all" />
	</div>
	<br clear="all" />
</div>