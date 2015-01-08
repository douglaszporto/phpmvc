<?php /* Smarty version Smarty-3.1.19, created on 2014-12-11 09:58:04
         compiled from "D:\ProjetosWeb\site_rebuild\views\Newsletter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79005464b503254e55-91430005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3507cb02eb26e0fe91bacad6313b2d5f03bcb1c' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Newsletter.tpl',
      1 => 1418299082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79005464b503254e55-91430005',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464b503294d62_96864520',
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464b503294d62_96864520')) {function content_5464b503294d62_96864520($_smarty_tpl) {?><div id="newsletter">
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
