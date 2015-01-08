<?php /* Smarty version Smarty-3.1.19, created on 2015-01-07 05:52:52
         compiled from "/home/storage/c/0e/6a/nelogica/public_html/dev/views/User/UserForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3864695548603e5a7d432-86465748%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3be3849c762a8d6c3200da737face11803aed1e9' => 
    array (
      0 => '/home/storage/c/0e/6a/nelogica/public_html/dev/views/User/UserForm.tpl',
      1 => 1419340562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3864695548603e5a7d432-86465748',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_548603e5a873f1_19455745',
  'variables' => 
  array (
    'domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548603e5a873f1_19455745')) {function content_548603e5a873f1_19455745($_smarty_tpl) {?><div class="login-action">
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
