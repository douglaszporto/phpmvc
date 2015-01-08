<?php /* Smarty version Smarty-3.1.19, created on 2014-12-16 13:49:58
         compiled from "D:\ProjetosGit\SiteRebuild\views\Contato.tpl" */ ?>
<?php /*%%SmartyHeaderCode:307475476166c5a4625-86730770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0d4a7aeaf56c30147e00e1f09e6df2632a847f9' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\Contato.tpl',
      1 => 1418743914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '307475476166c5a4625-86730770',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5476166c719d22_20058235',
  'variables' => 
  array (
    'domain' => 0,
    'tipo' => 0,
    'msgError' => 0,
    'message' => 0,
    'nameerr' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5476166c719d22_20058235')) {function content_5476166c719d22_20058235($_smarty_tpl) {?><div class="center">
	<form id="contactForm" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/contato/enviar">
		<?php if ($_smarty_tpl->tpl_vars['tipo']->value==0) {?>
			<p class="titulo-contato">
				Envie suas dúvidas, comentários e sugestões para a nossa equipe.
			</p>
			<div class = "mensagem-aviso" id = "mensagem-erro-email">
				<span class="icon-check" id = "erro">&#xf00d;</span> Os campos marcados devem ser preenchidos corretamente.
			</div>
		<?php } else { ?>
			<h4>Venha trabalhar conosco</h4>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['msgError']->value==0) {?>
			<div class = "mensagem-aviso" id ="mensagem-ok">
				<span class="icon-check" id="check">&#xf00c;</span> <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

			</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['msgError']->value==1) {?>
			<div class = "mensagem-aviso" id = "mensagem-erro">
				<span class="icon-check" id = "erro">&#xf00d;</span> <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

			</div>	
		<?php }?>

		<br />

		<div class="contato-email">  
			<p>Por favor, preencha o formulário abaixo. Clique no botão "Enviar" quando estiver pronto.</p>
			<br />							
			<label for = "nome" class ="<?php if ($_smarty_tpl->tpl_vars['nameerr']->value==0) {?>contact-text<?php } else { ?>contact-text-err<?php }?>" autofocus="autofocus"> 
				Seu Nome*
			</label>				
			<input  type="text" name="name" id="nome" placeholder="Seu Nome"  class = "area-dados" value="<?php if (array_key_exists('name',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
<?php }?>"/> 
			
			<label for = "email" class ="<?php if ($_smarty_tpl->tpl_vars['nameerr']->value==0) {?>contact-text<?php } else { ?>contact-text-err<?php }?>" autofocus="autofocus">
				Seu E-mail*
			</label>
		
			<input type="text" name="email" id= "email" placeholder="exemplo@exemplo.com" class = "area-dados" value="<?php if (array_key_exists('email',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
<?php }?>"/> 
					
			<label for = "assunto" class ="<?php if ($_smarty_tpl->tpl_vars['nameerr']->value==0) {?>contact-text<?php } else { ?>contact-text-err<?php }?>" autofocus="autofocus">
				Assunto*
			</label>

			<select name="assunto" id="assunto" class="area-dados"  >
				<option value="">- Selecione um assunto -</option>

				<option id="Artigos" <?php if (array_key_exists('assunto',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['assunto']=='Artigo') {?>selected="1"<?php }?> value='Artigo'>
						Artigos
				</option>

				<option id="Produtos" <?php if (array_key_exists('assunto',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['assunto']=='Produtos') {?>selected="1"<?php }?> value='Produtos'>
					Produtos
				</option>

				<option id="Suporte" <?php if (array_key_exists('assunto',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['assunto']=='Suporte') {?>selected="1"<?php }?> value='Suporte'>
					Suporte
				</option>

				<option id="Parcerias" <?php if (array_key_exists('assunto',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['assunto']=='Parcerias') {?>selected="1"<?php }?> value='Parcerias'>
					Parcerias
				</option>

				<option id="Comercial" <?php if (array_key_exists('assunto',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['assunto']=='Comercial') {?>selected="1"<?php }?> value='Comercial'>
					Comercial
				</option>

				<option id="Trabalhe conosco" <?php if (array_key_exists('assunto',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['assunto']=='Trabalhe conosco') {?>selected="1"<?php }?> value='Trabalhe conosco'>
					Trabalhe conosco

				<option id="Outras dúvidas e comentários" <?php if (array_key_exists('assunto',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['assunto']=='Outras dúvidas e comentários') {?>selected="1"<?php }?> value='Outras dúvidas e comentários'>
					Outras dúvidas e comentários
				</option>
			</select>
			
			<label for = "message" class ="<?php if ($_smarty_tpl->tpl_vars['nameerr']->value==0) {?>contact-text<?php } else { ?>contact-text-err<?php }?>"autofocus="autofocus">
				Mensagem*
			</label>
					
			<textarea name="message"  placeholder = "Escreva sua mensagem aqui..." class = "area-message" value="<?php if (array_key_exists('message',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>
<?php }?>"></textarea>			
			
			<input type="submit" value="Enviar" class="button blueButton" id = "button-enviar">				
		</div> 
	</form>	
	<br clear="all">
</div>

<?php echo $_smarty_tpl->getSubTemplate ('Empresa/BlocoContato.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script type="text/javascript">
	Contact.VerificaCampos();
</script>


<?php }} ?>
