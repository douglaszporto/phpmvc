<div class="center">
	<div class="buy-item">Detalhes</div>
	<div class="buy-item">Pagamento</div>
	<div class="buy-item active">Confirmação</div>
	<br clear="all">
</div>
<div id="buy-content" class="center">

	<h2>Parabéns!</h2>

	<p>
		O seu pedido foi realizado com sucesso.<br />
		{{if $emailEnviado}}
			A confirmação do pedido foi enviada para o e-mail <b>{{$emailUtilizado}}</b>.
		{{else}}
			<br/>
			Infelizmente, não conseguimos enviar um email para <b>{{$emailUtilizado}}</b>.<br/>
			Mas não se preocupe, sua compra foi realizada com sucesso.<br />
			Qualquer dúvida, entre em contato com nossa equipe de suporte pelo telefone (51) 3023-8272 ou pelo email comercial@nelogica.com.br
		{{/if}}
	</p>
	<br>
	<br>
	<h3>Instruções para o Pagamento</h3>
	<p>
		Para imprimir o boleto de pagamento, <a href="#" onclick="window.open('/admin/boleto/geraboleto.php?boletoID={{$boletoGerado}}','Boleto','height=700, width=700,scrollbars=yes,status=no,location=no,toolbar=no,menubar=yes')">clique aqui</a>.
		Você poderá efetuar o pagamento em qualquer agência bancária, ou então, 
		anotar o número do código de barras e pagar pelo sistema de internet banking do seu banco.
	</p>
	<p>
		O <strong>código de ativação</strong> será enviado para o seu e-mail 
		assim que o pagamento deste boleto for confirmado.
	</p>
	<br/>
	<div class="greenButton button" id="buy-continue"><a id="buy-continue-link" href="/">Finalizar</a></div>
</div>