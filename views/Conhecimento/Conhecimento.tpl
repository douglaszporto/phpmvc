<div id="conhecimento" class="fundo">
	<div class="center">
		{{foreach $tipos as $tipo}}
		
		<div class="conhecimento-tipo">
			
			<a href="{{$domain}}/conhecimento/{{$tipo.strIdentificador}}" class="no-link">
				<div class="conhecimento-resumo">
					<h2>
						{{$tipo.strTitulo}}	
					</h2>
					<p>
						{{$tipo.strDescricao}} 
					</p> 
					
					<br />
					<br />
					<p class="ar">
						<span class="texto-link">Veja todos os {{$tipo.strTitulo}}</span>
					</p>
				</div>
			</a>
			
			<div class="conhecimento-itens">
			{{foreach $assuntos as $assunto}}
				{{if $assunto.nTipoID == $tipo.nTipoID}}
				<div class="conhecimento-assunto">
					<h3>
						<a href="{{$domain}}/conhecimento/{{$tipo.strIdentificador}}/{{$assunto.strIdentificador}}" class="no-link">
							{{$assunto.strTitulo}} 
						</a>
					</h3>
					
					{{assign var="cont" value=0}}
					<ul>
					{{foreach $conteudoAssunto as $contAss}}
						{{if $contAss.nAssuntoID == $assunto.nAssuntoID}}
							{{foreach $conteudos as $conteudo}} 
								{{if  $conteudo.nConteudoID == $contAss.nConteudoID && $cont<2}}	
									{{assign var="cont" value=$cont+1}}
						<li>
							<a href="{{$domain}}/conhecimento/{{$tipo.strIdentificador}}/{{$assunto.strIdentificador}}/{{$conteudo.strIdentificador}}">
									{{$conteudo.strTitulo}}
							</a>
						</li>
								{{/if}}
							{{/foreach}}
						{{/if}}
					{{/foreach}}
						<li>
							<a href="{{$domain}}/conhecimento/{{$tipo.strIdentificador}}/{{$assunto.strIdentificador}}" >
								Ver mais
							</a>
						</li>
					</ul>
				</div>
				{{/if}}
			{{/foreach}}
			</div>

		</div>
		{{/foreach}}
		<br clear="all"/>
	</div>
</div>

		