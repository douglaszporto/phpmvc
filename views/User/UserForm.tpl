<div class="login-action">
	<h2>Novo Cadastro</h2>
	<p>
		Faça o seu cadastro e aproveite todo o conteúdo que a Nelogica disponibiliza para você.<br />
		<br />
		Clique agora em "Criar Minha Conta".
	</p>
	<div id="login-new-submit">
		<a href="{{$domain}}/login/registrar" class='button blueButton'>
			Criar Minha Conta
		</a>
	</div>
	<br clear="all"/>
</div>

<div class="login-action">
	<h2>Acessar</h2>
	<form action="{{$domain}}/login/entrar/" method="post">
		<label for="input-email">E-mail</label>
		<input type="text" name="input-email" id="input-email" class="input-input" autofocus="autofocus"/>
		<label for="input-password">Senha</label>
		<input type="password" name="input-password" id="input-password" class="input-input" data-enterkey='submit'/>
		<div id="login-forgot-pass">
			<a href="{{$domain}}/login/recuperar/" title="Esqueci minha senha" >
				Esqueci minha senha
			</a>
		</div>
		<div id="login-keep-me-logged">
			<input name="input-keep-me-logged" id="input-keep-me-logged" type="checkbox" value="1" checked="" />
			<label for="input-keep-me-logged">Mantenha-me logado</label>
		</div>
		
		<div id="login-enter-submit">
			<input type="submit" value="Entrar" class='button greenButton'/>
		</div>
	</form>
	<br clear="all"/>
</div>