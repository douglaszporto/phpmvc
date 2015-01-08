<?php /* Smarty version Smarty-3.1.19, created on 2014-11-28 15:37:18
         compiled from "D:\ProjetosGit\SiteRebuild\views\Emails\Venda.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104935478b2ce5c3104-15057281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8919b1e2451b38ed71ea5249d5193fe31b559588' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\Emails\\Venda.tpl',
      1 => 1417179623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104935478b2ce5c3104-15057281',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'domain' => 0,
    'produto' => 0,
    'nome' => 0,
    'boleto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5478b2ce640122_70220379',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5478b2ce640122_70220379')) {function content_5478b2ce640122_70220379($_smarty_tpl) {?><style type="text/css">body{margin:0}</style>
<table width="550" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family:Helvetica, Verdana, Arial, Tahoma; font-size:11px;">
	<tr>
		<td>
			<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/images/email/top.png" border="0" height="12" width="550">
		</td>
	</tr>
	<tr>
		<td align="center">
			<p>&nbsp;</p>
			<table width="450" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:Helvetica, Verdana, Arial, Tahoma; font-size:12px;">
				<tr>
					<td>
						<h1 style="font:bold 16px Helvetica, Verdana, Arial, Tahoma; color:#335687;">Assinatura do <?php echo $_smarty_tpl->tpl_vars['produto']->value;?>
</h1>
						<p>Prezado <?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
,</p>
						<p>O sistema <?php echo $_smarty_tpl->tpl_vars['produto']->value;?>
 é a mais alta tecnologia para seus investimentos, obrigado por assiná-lo.</p>
						<p>Tão logo seja confirmado o pagamento do boleto você receberá um e-mail contendo seu código de ativação. Você pode imprimir o boleto <a href="http://www.nelogica.com.br/admin/boleto/geraboleto.php?boletoID=<?php echo $_smarty_tpl->tpl_vars['boleto']->value;?>
" target="_blank">clicando aqui</a>.</p>
						<p>Após receber o código de ativação, conectado à Internet, abra seu <?php echo $_smarty_tpl->tpl_vars['produto']->value;?>
. Cole ou digite o código de ativação na janela de ativação, que pode ser acessada através do Menu -> Ajuda -> Ativar. O seu <?php echo $_smarty_tpl->tpl_vars['produto']->value;?>
 estará 100% pronto para você realizar suas análises.</p>
						<p>Caso sua metodologia utilize indicadores, sinta-se a vontade para utilizar nosso serviço de sugestão de indicadores. Incluiremos a função desejada da maneira mais rápida possível.</p>
						<p>Qualquer problema, dúvida ou sugestão, não hesite em entrar em contato concosco. Você pode utilizar os e-mails:</p>
						<p>sac@nelogica.com.br<br>comercial@nelogica.com.br</p>
						<p>ou o telefone<strong> (0xx51) 3023-82-72</strong></p>
						<p>Obrigado pelo interesse, estamos trabalhando para oferecer sempre a mais alta tecnologia em análise técnica.</p>
						<p>Equipe Nelogica</p>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td style="font-family:Helvetica, Verdana, Arial, Tahoma; font-size:9px;">
						<br />
						<br />
						<img src="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/statics/images/email/mini.jpg" border="0" width="79" height="25" />
						<br />
						<br />
						Nelogica -  Intelig&ecirc;ncia Para o Mercado Financeiro<br />
						http://www.nelogica.com.br<br />
						comercial@nelogica.com.br<br />
						Av. Carlos Gomes, 300, 10o andar.<br />
						Cep: 90480-000<br />
						Porto Alegre, Brasil<br />
						Fone: +55-51-3023-8272
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>
<?php }} ?>
