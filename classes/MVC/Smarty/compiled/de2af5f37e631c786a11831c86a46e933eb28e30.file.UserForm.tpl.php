<?php /* Smarty version Smarty-3.1.19, created on 2014-12-05 15:34:18
         compiled from "D:\ProjetosWeb\site_rebuild\views\User\UserForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83715481ec9a511a11-41414387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de2af5f37e631c786a11831c86a46e933eb28e30' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\User\\UserForm.tpl',
      1 => 1417800170,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83715481ec9a511a11-41414387',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5481ec9a521648_70866803',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5481ec9a521648_70866803')) {function content_5481ec9a521648_70866803($_smarty_tpl) {?><div class="login-action">
	<h2>Novo Cadastro</h2>
	<p>
		Faça o seu cadastro e aproveite todo o conteúdo que a Nelogica disponibiliza para você.<br />
		<br />
		Clique agora em "Criar Minha Conta".
	</p>
	<div id="login-new-submit">
		<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/login/registrar" class='button blueButton'>
			Criar Minha Conta
		</a>
	</div>
	<br clear="all"/>
</div>

<div class="login-action">
	<h2>Acessar</h2>
	<form action="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/login/entrar/" method="post">
		<label for="input-email">E-mail</label>
		<input type="text" name="input-email" id="input-email" class="input-input" autofocus="autofocus"/>
		<label for="input-password">Senha</label>
		<input type="password" name="input-password" id="input-password" class="input-input" data-enterkey='submit'/>
		<div id="login-forgot-pass">
			<a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/login/recuperar/" title="Esqueci minha senha" >
				Esqueci minha senha
			</a>
		</div>
		<div id="login-keep-me-logged">
			<input name="input-keep-me-logged" id="input-keep-me-logged" type="checkbox" value="1" checked="" />
			<label for="input-keep-me-logged">Mantenha-me logado</label>
		</div>
		
		<div id="login-enter-submit">
			<input type="submit" value="Entrar" class='button greenButton'/>
		</div>
	</form>
	<br clear="all"/>
</div><?php }} ?>
