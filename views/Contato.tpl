<div class="center">
	<form id="contactForm" method="POST" action="{{$domain}}/contato/enviar">
		{{if $tipo == 0}}
			<p class="titulo-contato">
				Envie suas dúvidas, comentários e sugestões para a nossa equipe.
			</p>
			<div class = "mensagem-aviso" id = "mensagem-erro-email">
				<span class="icon-check" id = "erro">&#xf00d;</span> Os campos marcados devem ser preenchidos corretamente.
			</div>
		{{else}}
			<h4>Venha trabalhar conosco</h4>
		{{/if}}

		{{if $msgError == 0}}
			<div class = "mensagem-aviso" id ="mensagem-ok">
				<span class="icon-check" id="check">&#xf00c;</span> {{$message}}
			</div>
		{{elseif $msgError == 1}}
			<div class = "mensagem-aviso" id = "mensagem-erro">
				<span class="icon-check" id = "erro">&#xf00d;</span> {{$message}}
			</div>	
		{{/if}}

		<br />

		<div class="contato-email">  
			<p>Por favor, preencha o formulário abaixo. Clique no botão "Enviar" quando estiver pronto.</p>
			<br />							
			<label for = "nome" class ="{{if $nameerr==0}}contact-text{{else}}contact-text-err{{/if}}" autofocus="autofocus"> 
				Seu Nome*
			</label>				
			<input  type="text" name="name" id="nome" placeholder="Seu Nome"  class = "area-dados" value="{{if array_key_exists('name',$data)}}{{$data['name']}}{{/if}}"/> 
			
			<label for = "email" class ="{{if $nameerr==0}}contact-text{{else}}contact-text-err{{/if}}" autofocus="autofocus">
				Seu E-mail*
			</label>
		
			<input type="text" name="email" id= "email" placeholder="exemplo@exemplo.com" class = "area-dados" value="{{if array_key_exists('email',$data)}}{{$data['email']}}{{/if}}"/> 
					
			<label for = "assunto" class ="{{if $nameerr==0}}contact-text{{else}}contact-text-err{{/if}}" autofocus="autofocus">
				Assunto*
			</label>

			<select name="assunto" id="assunto" class="area-dados"  >
				<option value="">- Selecione um assunto -</option>

				<option id="Artigos" {{if array_key_exists('assunto',$data) && $data['assunto'] == 'Artigo'}}selected="1"{{/if}} value='Artigo'>
						Artigos
				</option>

				<option id="Produtos" {{if array_key_exists('assunto',$data) && $data['assunto'] == 'Produtos'}}selected="1"{{/if}} value='Produtos'>
					Produtos
				</option>

				<option id="Suporte" {{if array_key_exists('assunto',$data) && $data['assunto'] == 'Suporte'}}selected="1"{{/if}} value='Suporte'>
					Suporte
				</option>

				<option id="Parcerias" {{if array_key_exists('assunto',$data) && $data['assunto'] == 'Parcerias'}}selected="1"{{/if}} value='Parcerias'>
					Parcerias
				</option>

				<option id="Comercial" {{if array_key_exists('assunto',$data) && $data['assunto'] == 'Comercial'}}selected="1"{{/if}} value='Comercial'>
					Comercial
				</option>

				<option id="Trabalhe conosco" {{if array_key_exists('assunto',$data) && $data['assunto'] =='Trabalhe conosco'}}selected="1"{{/if}} value='Trabalhe conosco'>
					Trabalhe conosco

				<option id="Outras dúvidas e comentários" {{if array_key_exists('assunto',$data) && $data['assunto'] == 'Outras dúvidas e comentários'}}selected="1"{{/if}} value='Outras dúvidas e comentários'>
					Outras dúvidas e comentários
				</option>
			</select>
			
			<label for = "message" class ="{{if $nameerr==0}}contact-text{{else}}contact-text-err{{/if}}"autofocus="autofocus">
				Mensagem*
			</label>
					
			<textarea name="message"  placeholder = "Escreva sua mensagem aqui..." class = "area-message" value="{{if array_key_exists('message',$data)}}{{$data['message']}}{{/if}}"></textarea>			
			
			<input type="submit" value="Enviar" class="button blueButton" id = "button-enviar">				
		</div> 
	</form>	
	<br clear="all">
</div>

{{include 'Empresa/BlocoContato.tpl'}}

<script type="text/javascript">
	Contact.VerificaCampos();
</script>


