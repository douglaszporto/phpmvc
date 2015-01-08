<?php /* Smarty version Smarty-3.1.19, created on 2014-12-19 15:40:47
         compiled from "D:\ProjetosGit\SiteRebuild\views\User\UserRecuperarSenha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18993547df22eb61578-20986560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27365a325dcde0a18c8775771db3f8024a88f15e' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\User\\UserRecuperarSenha.tpl',
      1 => 1418754963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18993547df22eb61578-20986560',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_547df22eba3c08_22190576',
  'variables' => 
  array (
    'domain' => 0,
    'error' => 0,
    'msgErro' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547df22eba3c08_22190576')) {function content_547df22eba3c08_22190576($_smarty_tpl) {?><div class = "center">
	<form id="contactForm" method="post" action="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/Login/recuperar_senha">
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
	</from>
</div>
	<br clear="all" />

<script type="text/javascript">
	RecuperarSenha.VerificaEmail();
</script><?php }} ?>
