<?php /* Smarty version Smarty-3.1.19, created on 2014-11-28 10:49:52
         compiled from "D:\ProjetosWeb\site_rebuild\views\Assinatura\Confirmacao.tpl" */ ?>
<?php /*%%SmartyHeaderCode:835554771e156e4e54-39790523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dc87b5689b2a2e82c9d057cc3ada6d4b2fb6a62' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Assinatura\\Confirmacao.tpl',
      1 => 1417178984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '835554771e156e4e54-39790523',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54771e1571b557_81561663',
  'variables' => 
  array (
    'emailEnviado' => 0,
    'emailUtilizado' => 0,
    'boletoGerado' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54771e1571b557_81561663')) {function content_54771e1571b557_81561663($_smarty_tpl) {?><div class="center">
	<div class="buy-item">Detalhes</div>
	<div class="buy-item">Pagamento</div>
	<div class="buy-item active">Confirmação</div>
	<br clear="all">
</div>
<div id="buy-content" class="center">

	<h2>Parabéns!</h2>

	<p>
		O seu pedido foi realizado com sucesso.<br />
		<?php if ($_smarty_tpl->tpl_vars['emailEnviado']->value) {?>
			A confirmação do pedido foi enviada para o e-mail <b><?php echo $_smarty_tpl->tpl_vars['emailUtilizado']->value;?>
</b>.
		<?php } else { ?>
			<br/>
			Infelizmente, não conseguimos enviar um email para <b><?php echo $_smarty_tpl->tpl_vars['emailUtilizado']->value;?>
</b>.<br/>
			Mas não se preocupe, sua compra foi realizada com sucesso.<br />
			Qualquer dúvida, entre em contato com nossa equipe de suporte pelo telefone (51) 3023-8272 ou pelo email comercial@nelogica.com.br
		<?php }?>
	</p>
	<br>
	<br>
	<h3>Instruções para o Pagamento</h3>
	<p>
		Para imprimir o boleto de pagamento, <a href="#" onclick="window.open('/admin/boleto/geraboleto.php?boletoID=<?php echo $_smarty_tpl->tpl_vars['boletoGerado']->value;?>
','Boleto','height=700, width=700,scrollbars=yes,status=no,location=no,toolbar=no,menubar=yes')">clique aqui</a>.
		Você poderá efetuar o pagamento em qualquer agência bancária, ou então, 
		anotar o número do código de barras e pagar pelo sistema de internet banking do seu banco.
	</p>
	<p>
		O <strong>código de ativação</strong> será enviado para o seu e-mail 
		assim que o pagamento deste boleto for confirmado.
	</p>
	<br/>
	<div class="greenButton button" id="buy-continue"><a id="buy-continue-link" href="/">Finalizar</a></div>
</div><?php }} ?>
