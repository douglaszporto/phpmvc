<?php /* Smarty version Smarty-3.1.19, created on 2014-12-23 11:17:20
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/Newsletter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6694777655482022dbdde04-82346605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a35a3e0684cf6248ec58190d0d94fadad412dec8' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/Newsletter.tpl',
      1 => 1419340558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6694777655482022dbdde04-82346605',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5482022dbe6638_77793371',
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5482022dbe6638_77793371')) {function content_5482022dbe6638_77793371($_smarty_tpl) {?><div id="newsletter">
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
