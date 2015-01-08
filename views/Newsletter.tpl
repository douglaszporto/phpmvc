<div id="newsletter">
	<div class="center">
		<div id="newsletter-title">Fique por dentro do mercado financeiro assinando nossa Newsletter.</div>
			<form id="newsletter-form" method="post" action="{{$domain}}/newsletter/">
				<input type="radio" name="newsletter-action" id="newsletter-action-register" value="cadastrar" checked="checked">
				<label for="newsletter-action-register" id='newsletter-action-label'>Cadastrar</label>
				<input type="radio" name="newsletter-action" id="newsletter-action-unregister" value="descadastrar">
				<label for="newsletter-action-unregister">Descadastrar</label><br>
				<input type="text" name="newsletter-email" id="newsletter-email" value="" maxlength="128" placeholder="E-mail"><br>
				<input type="submit" id="newsletter-send" class="button darkBlueButton" value="Enviar"/>
			</form>
		</div>
	</div>

<script type="text/javascript">
	newsletter.VerificaEmail();
</script>
