<div class = "center">
	{{include '../MenuLateral.tpl'}}
	{{foreach $tiposAssuntosConteudo as $tipoAssCont}}
		{{if $tipoAssCont.assunto.strIdentificador == $assunto}}
			<div class = "conteudo">
				<h2>{{$tipoAssCont.assunto.strTitulo}}</h2>
				<p>{{$tipoAssCont.assunto.strDescricao}}</p><br />
					<ol class = "lista-conhecimento colored" >
						{{foreach $tipoAssCont['assunto']['conteudo'] as $conteudo}}
							<li>	
								<p>
									<a href="{{$domain}}/conhecimento/{{$tipo}}/{{$tipoAssCont.assunto.strIdentificador}}/{{$conteudo.strIdentificador}}">
										{{$conteudo.strTitulo}} 
									</a>
									{{if !empty($conteudo.strDescricao)}}
									<br />
										{{$conteudo.strDescricao}}
									<br /><br />
									{{/if}}
								</p>
							
							</li>
						{{/foreach}}
					</ol>	
			</div>
		{{/if}}
	{{/foreach}}
	<br clear="all">
</div>
{{include '../Newsletter.tpl'}}
