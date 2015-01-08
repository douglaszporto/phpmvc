<?php /* Smarty version Smarty-3.1.19, created on 2014-11-28 15:37:19
         compiled from "D:\ProjetosGit\SiteRebuild\views\Assinatura\Confirmacao.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148345478b2cf0dd4f4-00847906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a7706afd7520d88a18df7c8fb91f20451053cfb' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\Assinatura\\Confirmacao.tpl',
      1 => 1417179622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148345478b2cf0dd4f4-00847906',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'emailEnviado' => 0,
    'emailUtilizado' => 0,
    'boletoGerado' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5478b2cf100770_41151926',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5478b2cf100770_41151926')) {function content_5478b2cf100770_41151926($_smarty_tpl) {?><div class="center">
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
