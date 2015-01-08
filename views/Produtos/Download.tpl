<div class="center">
	{{include 'MenuLateral.tpl'}}
	<div class="conteudo">
		<h2>Obrigado pelo seu interesse no {{$produto}}.</h2>
		<p>
			Você poderá utilizar gratuitamente todas as funcionalidades do {{$produto}}
			em até 7 dias a contar da data de ativação do software.
		</p>
		<br/>
		{{if $tipoLicenca <= 1}}
		<p>
			O seu código de ativação é: {{$chaveTestes}}
		</p>
		{{elseif $tipoLicenca == 2}}
		<p>
			O seu código de ativação é: {{$chaveTestes}}<br />
			O período de uso deste código está entre {{$dtInicio}} e {{$dtFinal}}.
		</p>
		{{elseif $tipoLicenca == 3}}
		<p>
			Seu trial expirou no dia <b>{$arrChave['dtFinal']}</b>.
			O seu último código de ativação foi: {{$chaveTestes}}
		</p>
		{{/if}}
		<br/>
		<p>
			Para iniciar o download do {{$produto}}
			<a id="linkDownload" href="{{$download}}" target="_blank">
				clique aqui
			</a>.
		</p>
		<br/>
	</div>
	<br clear="all" />
</div>
<script>
$(document).ready(function(){
	setTimeout(function(){
		window.location.href = $('a#linkDownload').attr('href');
	}, 1500);
});
</script>