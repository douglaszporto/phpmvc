<?php /* Smarty version Smarty-3.1.19, created on 2014-12-17 19:10:43
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/User/UserRecuperarSenha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:301525985491f15330fa39-80241924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84735ea862dc255aa413a3db9ff4099f2c346a20' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/User/UserRecuperarSenha.tpl',
      1 => 1418648097,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '301525985491f15330fa39-80241924',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'domain' => 0,
    'error' => 0,
    'msgErro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5491f153360655_61927594',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5491f153360655_61927594')) {function content_5491f153360655_61927594($_smarty_tpl) {?><form id="contactForm" method="post" action="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/Login/recuperar_senha">
	<div class = "center">
		<div class = "mensagem-aviso" id = "mensagem-erro-email">
			<span class="icon-check" id = "erro">&#xf00d;</span> O email informado não é valido
		</div>
		<?php if ($_smarty_tpl->tpl_vars['error']->value==2) {?>
			<div class = "mensagem-aviso" id = "mensagem-erro">
				<span class="icon-check" id = "erro">&#xf00d;</span> <?php echo $_smarty_tpl->tpl_vars['msgErro']->value;?>

			</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['error']->value==1) {?>
			<div class = "mensagem-aviso" id ="mensagem-ok">
				<span class="icon-check" id="check">&#xf00c;</span> <?php echo $_smarty_tpl->tpl_vars['msgErro']->value;?>

			</div>
		<?php }?>
		<div class = "recuperar-center">
			<h2>Informe seu email</h2>
			<p>
				Se você esqueceu a sua senha, basta digitar o seu e-mail abaixo que uma nova senha será enviada por 
				e-mail para você. <br />
			</p>
			<div class="login-recuperar-container">
				<label for="input-email">E-mail</label>
				<input  type="text" name="email" id="email" class = "area-dados" /> 
				<input type="submit" value="Enviar" class='button greenButton' id = "button-recuperar"/>
			</div>
		</div>
	</div>
</from>

<script type="text/javascript">
	RecuperarSenha.VerificaEmail();
</script><?php }} ?>
