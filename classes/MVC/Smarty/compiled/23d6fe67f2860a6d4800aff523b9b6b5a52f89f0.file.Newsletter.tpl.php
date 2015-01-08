<?php /* Smarty version Smarty-3.1.19, created on 2014-12-11 12:05:43
         compiled from "D:\ProjetosGit\SiteRebuild\views\Newsletter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:327125464b0f16c9f44-95375960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23d6fe67f2860a6d4800aff523b9b6b5a52f89f0' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\Newsletter.tpl',
      1 => 1418306387,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327125464b0f16c9f44-95375960',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464b0f16fcbd3_99490909',
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464b0f16fcbd3_99490909')) {function content_5464b0f16fcbd3_99490909($_smarty_tpl) {?><div id="newsletter">
	<div class="center">
		<div id="newsletter-title">Fique por dentro do mercado financeiro assinando nossa Newsletter.</div>
			<form id="newsletter-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/newsletter/">
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
<?php }} ?>
