{{if $user == false }}
	<a href="{{$domain}}/login" alt="Acesse sua conta">Acesse sua conta</a>
{{else}}
	<div id="usuario-logado">
		Bem vindo, {{$user.name}}.
		<a href="{{$domain}}/conta/">Minha conta</a> | 
		<a href="{{$domain}}/login/sair/">Sair</a>
	</div>
{{/if}}