<div class = "center">
	<form id="contactForm" method="post" action="{{$domain}}/Login/recuperar_senha">
		<div class = "mensagem-aviso" id = "mensagem-erro-email">
			<span class="icon-check" id = "erro">&#xf00d;</span> O email informado não é valido
		</div>
		{{if $error == 2}}
			<div class = "mensagem-aviso" id = "mensagem-erro">
				<span class="icon-check" id = "erro">&#xf00d;</span> {{$msgErro}}
			</div>
		{{elseif $error == 1}}
			<div class = "mensagem-aviso" id ="mensagem-ok">
				<span class="icon-check" id="check">&#xf00c;</span> {{$msgErro}}
			</div>
		{{/if}}
		<div class = "recuperar-center">
			<h2>Informe seu email</h2>
			<p>
				Se você esqueceu a sua senha, basta digitar o seu e-mail abaixo que uma nova senha será enviada por 
				e-mail para você. <br />
			</p>
			<div class="login-recuperar-container">
				<label for="input-email">E-mail</label>
				<input  type="text" name="email" id="email" class = "area-dados" /> 
				<input type="submit" value="Enviar" class='button greenButton' id = "button-recuperar"/>
			</div>
		</div>
	</from>
</div>
	<br clear="all" />

<script type="text/javascript">
	RecuperarSenha.VerificaEmail();
</script>