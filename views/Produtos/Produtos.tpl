<div id="product-global-content" class="fundo">
	<div class="center">
		{{foreach $produtos as $produto}}
				
			<a href="{{$domain}}/produtos/{{$produto.strIdentificador}}" class="no-link" >	
				<div class="product-index hover-shadow">
					<img class="product-index-image" src="{{$domain}}/{{$produto.strImagemIndice}}"/>
					<div class="product-index-info">
						<div class="product-index-title">
								{{if $produto.strNome|strpos:'ProfitChart' !== false}}
									{{'ProfitChart'|str_replace:'<b>Profit</b>Chart<span class="trademark">®</span>':$produto.strNome}}
								{{else}}
									{{$produto.strNome}}
								{{/if}}
						</div><br clear="all" />
						<div class="product-index-text">
							{{$produto.strDescricaoIndice}}
						</div>
						<p class="product-index-link">
							<span class="icon">&#xf067;</span>Saiba mais
						</p>
					</div>
				</div>
			</a>
		{{/foreach}}
		<br clear="all"/>
	</div>
</div>
