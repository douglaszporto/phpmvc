<?php /* Smarty version Smarty-3.1.19, created on 2014-11-13 11:42:40
         compiled from "D:\ProjetosWeb\site_rebuild\views\Contatos\Contato.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67365464b5503ea8f6-20534561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a7a9e39c1594be272751925409ceddb5d4bd409' => 
    array (
      0 => 'D:\\ProjetosWeb\\site_rebuild\\views\\Contatos\\Contato.tpl',
      1 => 1415886072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67365464b5503ea8f6-20534561',
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
    'emailerr' => 0,
    'assuntoerr' => 0,
    'messageerr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464b5505347d1_31667231',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464b5505347d1_31667231')) {function content_5464b5505347d1_31667231($_smarty_tpl) {?><form id="contactForm" method="post" action="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
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
			<div class = "teste">
				<?php if ($_smarty_tpl->tpl_vars['nameerr']->value==0) {?>	
					<label for = "nome" id ="contact-text" autofocus="autofocus" > 
						Seu Nome*
					</label>
				<?php } else { ?>
					<label for = "nome" id ="contact-text-err" autofocus="autofocus"> 
						Seu Nome*
					</label>
				<?php }?>
				<input  type="text" name="name" id="nome" placeholder="Seu Nome"  class = "area-dados" value="<?php if (array_key_exists('name',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
<?php }?>"/> 
			</div>
			<div class = "teste">
				<?php if ($_smarty_tpl->tpl_vars['emailerr']->value==0) {?>
					<label for = "email" id ="contact-text" autofocus="autofocus">
						Seu E-mail*
					</label>
				<?php } else { ?>
					<label for = "email" id ="contact-text-err" autofocus="autofocus">
						Seu E-mail*
				<?php }?>
				<br>
				<input type="text" name="email" id= "email" placeholder="exemplo@exemplo.com" class = "area-dados" value="<?php if (array_key_exists('email',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
<?php }?>"/> 
				<br>
			</div>
			<div class = "teste">	
				<?php if ($_smarty_tpl->tpl_vars['assuntoerr']->value==0) {?>
					<label for = "assunto" id ="contact-text" autofocus="autofocus">
						Assunto*
					</label>
				<?php } else { ?>
					<label for = "assunto" id ="contact-text-err" autofocus="autofocus">
						Assunto*
					</label>
				<?php }?>
				<br>
			</div>
			<div class = "teste">	
				<select name="assunto" id="assunto" class="area-dados"  class="form-required">
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

				<?php if ($_smarty_tpl->tpl_vars['messageerr']->value==0) {?>
					<labe for = "message" id ="contact-text" autofocus="autofocus">
						Mensagem*
					</label>
				<?php } else { ?>
					<labe for = "message" id ="contact-text-err" autofocus="autofocus">
						Mensagem*
					</label>
				<?php }?>
				<br>
			</div>	
			<div class = "teste">	
				<textarea name="message"  placeholder = "Escreva sua mensagem aqui..." autofocus="autofocus" class = "area-message" value="<?php if (array_key_exists('message',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>
<?php }?>"></textarea>			
			</div>	
			<input type="submit" value="Enviar" class="button blueButton" id = "button-enviar">		
	
		</div> 
		<br clear="all">
	</div>
</form>	



<script type="text/javascript">




	$(document).ready(function(){

	    $("input").blur(function(){
			if($(this).val() === '') 
				$(this).parents('.teste').css({"color":"#f00"}).children('label').append($('<span/>').html('(Obrigatório)'));
			}).unbind('focus').focus(function(){
				$(this).parents('.teste').children('label').find('span').remove();
		});	

		$('#button-enviar').click(function(e){
			e.preventDefault();
			var cont = 0;
			$("input").each(function(){
				if($(this).val() == ""){
					cont++;
				}
			});
			if(cont == 0){
				$("#button-enviar").submit();
			}
		});

		
	});
</script>

<?php echo $_smarty_tpl->getSubTemplate ('Empresa/BlocoContato.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
