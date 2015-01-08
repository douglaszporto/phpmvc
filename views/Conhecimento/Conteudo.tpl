<div class = "center">
	{{include '../MenuLateral.tpl'}}
	<div class="conteudo">
		{{$conteudo.strHTML}} <br />
		{{if $mustLogin}}
			{{include '../User/UserMustLogin.tpl'}}
			<br clear="all"/>
		{{/if}}
		<br/>
		{{if !empty($anterior)}}
			<a href="{{$domain}}/conhecimento/{{$anterior.tipo.strIdentificador}}/{{$anterior.assunto.strIdentificador}}/{{$anterior.conteudo.strIdentificador}}" class="conhecimento-link-anterior">	
				<span class = "icon-ant-prox">&#xf100;</span> {{$anterior.conteudo.strTitulo}}
			</a>
		{{/if}}
		{{if !empty($proximo)}} 
			<a href="{{$domain}}/conhecimento/{{$proximo.tipo.strIdentificador}}/{{$proximo.assunto.strIdentificador}}/{{$proximo.conteudo.strIdentificador}}" class="conhecimento-link-proximo">	
				{{$proximo.conteudo.strTitulo}} <span class = "icon-ant-prox">&#xf101;</span>
			</a>
		{{/if}}								
	</div>	
	<br clear="all">
</div>
{{include '../Newsletter.tpl'}}