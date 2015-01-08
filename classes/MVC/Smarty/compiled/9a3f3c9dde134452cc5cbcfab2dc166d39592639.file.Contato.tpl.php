<?php /* Smarty version Smarty-3.1.19, created on 2014-11-14 09:58:21
         compiled from "D:\ProjetosGit\SiteRebuild\views\Contatos\Contato.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212755465ee5d699dc7-03150929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a3f3c9dde134452cc5cbcfab2dc166d39592639' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\Contatos\\Contato.tpl',
      1 => 1415896605,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212755465ee5d699dc7-03150929',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'domain' => 0,
    'msgError' => 0,
    'ErroCampos' => 0,
    'nameerr' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5465ee5d8999c3_39048396',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5465ee5d8999c3_39048396')) {function content_5465ee5d8999c3_39048396($_smarty_tpl) {?><form id="contactForm" method="post" action="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/EnvioEmail/index">
	<div class = "Center">
		<h4>
			Envie suas dúvidas, comentários e sugestões para a nossa equipe.
		</h4>

		<?php if ($_smarty_tpl->tpl_vars['msgError']->value==0) {?>
			<div class = "mensagem-aviso" id ="mensagem-ok">
				<span class="icon-check" id="check">&#xf00c;</span> Mensagem enviada com sucesso
			</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['msgError']->value==1) {?>
			<div class = "mensagem-aviso" id = "mensagem-erro">
				<span class="icon-check" id = "erro">&#xf00d;</span> Erro no servidor. Tente mais tarde.
			</div>		
		<?php } elseif ($_smarty_tpl->tpl_vars['msgError']->value==2) {?>
			<div class = "mensagem-aviso" id = "mensagem-erro">
				<span class="icon-check" id = "erro">&#xf00d;</span> Ocorreu um erro no envio. Tente novamente
			</div>

		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['ErroCampos']->value==1) {?>
			<div class = "mensagem-aviso" id = "mensagem-erro">
				<span class="icon-check" id = "erro">&#xf00d;</span> Os campos marcados devem ser prenchidos
			</div>
		<?php }?>


		</br>
		<div class="contato-email">  
			<h3>Por favor, preencha o formulário abaixo. Clique no botão "Enviar" quando estiver pronto.
			</h3>
			<br>
			<div class = "campo">					
				<label for = "nome" id ="<?php if ($_smarty_tpl->tpl_vars['nameerr']->value==0) {?>contact-text<?php } else { ?>contact-text-err<?php }?>" autofocus="autofocus" > 
					Seu Nome*
				</label>				
				<input  type="text" name="name" id="nome" placeholder="Seu Nome"  class = "area-dados" value="<?php if (array_key_exists('name',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
<?php }?>"/> 
			</div>

			<div class = "campo">
				<label for = "email" id ="<?php if ($_smarty_tpl->tpl_vars['nameerr']->value==0) {?>contact-text<?php } else { ?>contact-text-err<?php }?>" autofocus="autofocus">
					Seu E-mail*
				</label>
				<br>
				<input type="text" name="email" id= "email" placeholder="exemplo@exemplo.com" class = "area-dados" value="<?php if (array_key_exists('email',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
<?php }?>"/> 
				<br>
			</div>		
							
			<div class = "campo">	
				<label for = "assunto" id ="<?php if ($_smarty_tpl->tpl_vars['nameerr']->value==0) {?>contact-text<?php } else { ?>contact-text-err<?php }?>" autofocus="autofocus">
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

					<option id="Outras dúvidas e comentários" <?php if (array_key_exists('assunto',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['assunto']=='Outras dúvidas e comentários') {?>selected="1"<?php }?> value='Outras dúvidas e comentários'>
						Outras dúvidas e comentários
					</option>
				</select>
			</div>
			<div class = "campo">
				<label for = "message" id ="<?php if ($_smarty_tpl->tpl_vars['nameerr']->value==0) {?>contact-text<?php } else { ?>contact-text-err<?php }?>"autofocus="autofocus">
					Mensagem*
				</label>
				<br>	
				<textarea name="message"  placeholder = "Escreva sua mensagem aqui..." class = "area-message" value="<?php if (array_key_exists('message',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>
<?php }?>"></textarea>			
			</div>

			<input type="submit" value="Enviar" class="button blueButton" id = "button-enviar">		
	
		</div> 
		<br clear="all">
	</div>
</form>	


<?php echo $_smarty_tpl->getSubTemplate ('Empresa/BlocoContato.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script type="text/javascript">
	Contact.VerificaCampos();
</script>


<?php }} ?>
