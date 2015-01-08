<div class = "center">
	{{include '../MenuLateral.tpl'}}
	<div class = "conteudo">
		{{foreach $tiposAssuntosConteudo as $tipoAssCont}}
			<h2>{{$tipoAssCont.assunto.strTitulo}}</h2>			
			<p>{{$tipoAssCont.assunto.strDescricao}}</p> <br /> 
			<ol class = "lista-conhecimento colored" >
				{{foreach $tipoAssCont['assunto']['conteudo'] as $conteudo}}
					<li>
						<a href="{{$domain}}/conhecimento/{{$tipo}}/{{$tipoAssCont.assunto.strIdentificador}}/{{$conteudo.strIdentificador}}" class ="conhecimento-lista-items">	
							{{$conteudo.strTitulo}}
						</a>
					</li>
				{{/foreach}}	
			</ol>			
		<br />
		{{/foreach}}
	</div>
	<br clear="all">
</div>
{{include '../Newsletter.tpl'}}