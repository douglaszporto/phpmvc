<div class="center">
	<div id="registro-de-usuario">
		{{if $msgTotalAccess}}
		<h2 class="subtitle">Cadastre-se</h2>
		<p class='text'>
			Preencha o cadastro abaixo e tenha acesso total aos artigos e tutoriais sobre técnicas de 
			investimentos no mercado financeiro e a downloads de avaliação dos produtos Nelogica. 
			Algumas das informações são exigidas pela Bovespa e outras serão utilizadas para melhorar a 
			qualidade dos nossos produtos e serviços.
		</p>
		{{else}}
			<h2 class="subtitle">Detalhes da Conta</h2>
			<p class='text'>
				Se você deseja alterar o seu cadastro, faça as alterações nos campos abaixo e depois clique em enviar. Algumas das informações são exigidas pela Bovespa e outras serão utilizadas para melhorar a qualidade dos nossos produtos e serviços.
			</p>
		{{/if}}

		{{if $msgError == 1}}
		<div class="error">
			Há campos obrigatórios que não foram corretamente preenchidos.
		</div>
		{{elseif $msgError == 2}}
		<div class="error">
			A data de nascimento informada não é uma data válida.
		</div>
		{{elseif $msgError == 98}}
		<div class="error">
			Não foi possível regitrar seu endereço. Verifique os dados antes de prosseguir
		</div>
		{{elseif $msgError == 99}}
		<div class="error">
			Não foi possível realizar seu cadastro. Tente novamente.
		</div>
		{{elseif $msgError != 0}}
		<div class="error">
			{{$msgErrorStr}}
		</div>
		{{/if}}

		<div id="login-register-container">

			<form action="{{$domain}}/login/registrar/novo" method="POST">

				<h2 class='form-subtitle'>Dados Pessoais</h2>

				<div class="form-field-container-pfj form-field-container-left">
					<input type="radio" name="input-pessoaFisicaJuridica" value="1" {{if (array_key_exists('input-pessoaFisicaJuridica',$data) && $data['input-pessoaFisicaJuridica'] == 1) || !array_key_exists('input-pessoaFisicaJuridica',$data)}}checked="1"{{/if}} id="input-pessoaFisica" />
					<label for="input-pessoaFisica">Pessoa Física</label>
				</div>

				<div class="form-field-container-pfj ">
					<input type="radio" name="input-pessoaFisicaJuridica" value="2" {{if array_key_exists('input-pessoaFisicaJuridica',$data) && $data['input-pessoaFisicaJuridica'] == 2}}checked="1"{{/if}} id="input-pessoaJuridica" />
					<label for="input-pessoaJuridica">Pessoa Jurídica</label>
				</div>

				<br/><br/>

				<div class="form-field-container show-when-pessoa-fisica form-field-container-left">
					<label for="input-nome" class="form-label-field">Nome*</label>
					<input type="text" name="input-nome" id="input-nome" autofocus="autofocus" value="{{if array_key_exists('input-nome',$data)}}{{$data['input-nome']}}{{/if}}" tabindex="1" class="form-required"/>
				</div>
				<div class="form-field-container show-when-pessoa-juridica form-field-container-left">
					<label for="input-razao-social" class="form-label-field">Razão Social*</label>
					<input type="text" name="input-razao-social" id="input-razao-social" value="{{if array_key_exists('input-razao-social',$data)}}{{$data['input-razao-social']}}{{/if}}" tabindex="2" class="form-required"/>
				</div>

				<div class="form-field-container show-when-pessoa-fisica">
					<label for="input-sobrenome" class="form-label-field">Sobrenome*</label>
					<input type="text" name="input-sobrenome" id="input-sobrenome"value="{{if array_key_exists('input-sobrenome',$data)}}{{$data['input-sobrenome']}}{{/if}}" tabindex="3" class="form-required"/>
				</div>
				<div class="form-field-container show-when-pessoa-juridica">
					<label for="input-contato" class="form-label-field">Contato*</label>
					<input type="text" name="input-contato" id="input-contato" value="{{if array_key_exists('input-contato',$data)}}{{$data['input-contato']}}{{/if}}" tabindex="4" class="form-required"/>
				</div>

				<div class="form-field-container show-when-pessoa-fisica form-field-container-left">
					<label for="input-cpf" class="form-label-field">CPF*</label>
					<input type="text" name="input-cpf" id="input-cpf"value="{{if array_key_exists('input-cpf',$data)}}{{$data['input-cpf']}}{{/if}}" tabindex="5" class="form-required"/>
				</div>
				
				<div class="form-field-container show-when-pessoa-juridica form-field-container-left">
					<label for="input-cnpj" class="form-label-field">CNPJ*</label>
					<input type="text" name="input-cnpj" id="input-cnpj" tabindex="6"value="{{if array_key_exists('input-cnpj',$data)}}{{$data['input-cnpj']}}{{/if}}" class="form-required"/>
				</div>

				<div class="form-field-container show-when-pessoa-fisica">
					<label for="select-dia" class="form-label-field">Data de nascimento*</label>
					<select name="input-dtnascimento-dia" id="select-dia" tabindex="7" style="width:25%; margin-right:5%" class="form-required">
						<option value=""></option>
					{{for $d=1 to 31}}
						<option value="{{$d}}" {{if array_key_exists('input-dtnascimento-dia',$data) && $data['input-dtnascimento-dia'] == $d}}selected="1"{{/if}}>{{$d|str_pad:2:"0":$smarty.const.STR_PAD_LEFT}}</option>
					{{/for}}
					</select><select name="input-dtnascimento-mes" id="select-mes" tabindex="8" style="width:30%; margin-right:5%" class="form-required">
						<option value=""></option>
						<option value="1" {{if array_key_exists('input-dtnascimento-mes',$data) && $data['input-dtnascimento-mes'] == 1}}selected="1"{{/if}}>Janeiro</option>
						<option value="2" {{if array_key_exists('input-dtnascimento-mes',$data) && $data['input-dtnascimento-mes'] == 2}}selected="1"{{/if}}>Fevereiro</option>
						<option value="3" {{if array_key_exists('input-dtnascimento-mes',$data) && $data['input-dtnascimento-mes'] == 3}}selected="1"{{/if}}>Março</option>
						<option value="4" {{if array_key_exists('input-dtnascimento-mes',$data) && $data['input-dtnascimento-mes'] == 4}}selected="1"{{/if}}>Abril</option>
						<option value="5" {{if array_key_exists('input-dtnascimento-mes',$data) && $data['input-dtnascimento-mes'] == 5}}selected="1"{{/if}}>Maio</option>
						<option value="6" {{if array_key_exists('input-dtnascimento-mes',$data) && $data['input-dtnascimento-mes'] == 6}}selected="1"{{/if}}>Junho</option>
						<option value="7" {{if array_key_exists('input-dtnascimento-mes',$data) && $data['input-dtnascimento-mes'] == 7}}selected="1"{{/if}}>Julho</option>
						<option value="8" {{if array_key_exists('input-dtnascimento-mes',$data) && $data['input-dtnascimento-mes'] == 8}}selected="1"{{/if}}>Agosto</option>
						<option value="9" {{if array_key_exists('input-dtnascimento-mes',$data) && $data['input-dtnascimento-mes'] == 9}}selected="1"{{/if}}>Setembro</option>
						<option value="10" {{if array_key_exists('input-dtnascimento-mes',$data) && $data['input-dtnascimento-mes'] == 10}}selected="1"{{/if}}>Outubro</option>
						<option value="11" {{if array_key_exists('input-dtnascimento-mes',$data) && $data['input-dtnascimento-mes'] == 11}}selected="1"{{/if}}>Novembro</option>
						<option value="12" {{if array_key_exists('input-dtnascimento-mes',$data) && $data['input-dtnascimento-mes'] == 12}}selected="1"{{/if}}>Dezembro</option>
					</select><select name="input-dtnascimento-ano" id="select-ano" tabindex="9" style="width:35%" class="form-required">
						<option value=""></option>
					{{assign var="currentYear" value=$smarty.now|date_format:'%Y'}}
					{{for $y=0 to 100}}
						<option value="{{$currentYear - $y}}" {{if array_key_exists('input-dtnascimento-ano',$data) && $data['input-dtnascimento-ano'] == $currentYear - $y}}selected="1"{{/if}}>{{$currentYear - $y}}</option>
					{{/for}}
					</select>
				</div>
				<br clear="all" class="show-when-pessoa-juridica" />

				<div class="form-field-container form-field-container-left">
					<label for="input-email" class="form-label-field">E-mail*</label>
					<input type="text" name="input-email" id="input-email" value="{{if array_key_exists('input-email',$data)}}{{$data['input-email']}}{{/if}}" tabindex="10" class="form-required"/>
				</div>
				<div class="form-field-container show-when-pessoa-fisica">
					<label for="input-sexo-masculino" class="form-label-field">Sexo</label>
					<div class="form-input-spacement">
						<input type="radio" name="input-sexo" value="1" tabindex="11" {{if (array_key_exists('input-sexo',$data) && $data['input-sexo'] == 1) || !array_key_exists('input-sexo',$data)}}checked="1"{{/if}} id="input-sexo-masculino" />
						<label for="input-sexo-masculino" style="margin-right:30px">Masculino</label>
						<input type="radio" name="input-sexo" value="2" tabindex="12" {{if array_key_exists('input-sexo',$data) && $data['input-sexo'] == 2}}checked="1"{{/if}} id="input-sexo-feminino" />
						<label for="input-sexo-feminino">Feminino</label>
					</div>
				</div>
				<br clear="all" class="show-when-pessoa-juridica" />
				<div class="form-field-container form-field-container-left">
					<label for="input-senha" class="form-label-field">Senha*</label>
					<input type="password" name="input-senha" id="input-senha" tabindex="13" class="form-required"/>
				</div><br clear="all"/>
				<div class="form-field-container form-field-container-left">
					<label for="input-senha-confirmacao" class="form-label-field">Confirmação de senha*</label>
					<input type="password" name="input-senha-confirmacao" id="input-senha-confirmacao" tabindex="14" class="form-required"/>
				</div>
			
				<br clear="all" />

				<h2 class='form-subtitle'>Dados de Localização</h2>

				<div class="form-field-container form-field-container-left">
					<label for="input-cep" class="form-label-field">CEP*</label>
					<input type="text" name="input-cep" id="input-cep" style="width:50%" value="{{if array_key_exists('input-cep',$data)}}{{$data['input-cep']}}{{/if}}" tabindex="15" class="form-required"/>
					<span id="form-search-cep">Buscar CEP</span>
				</div>
				<div class="form-field-container">
					<label for="input-estado" class="form-label-field">Estado*</label>
					<select name="input-estado" id="select-estado" tabindex="16" class="form-required">
						<option value="" selected="selected"></option>
						<option id="AC" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 4}}selected="1"{{/if}} value="4">Acre</option>
						<option id="AL" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 4}}selected="1"{{/if}} value="5">Alagoas</option>
						<option id="AP" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 6}}selected="1"{{/if}} value="6">Amapá</option>
						<option id="AM" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 7}}selected="1"{{/if}} value="7">Amazonas</option>
						<option id="BA" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 8}}selected="1"{{/if}} value="8">Bahia</option>
						<option id="CE" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 9}}selected="1"{{/if}} value="9">Ceará</option>
						<option id="DF" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 10}}selected="1"{{/if}} value="10">Distrito Federal</option>
						<option id="ES" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 11}}selected="1"{{/if}} value="11">Espírito Santo</option>
						<option id="GO" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 12}}selected="1"{{/if}} value="12">Goiás</option>
						<option id="MA" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 13}}selected="1"{{/if}} value="13">Maranhão</option>
						<option id="MT" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 14}}selected="1"{{/if}} value="14">Mato Grosso</option>
						<option id="MS" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 15}}selected="1"{{/if}} value="15">Mato Grosso do Sul</option>
						<option id="MG" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 16}}selected="1"{{/if}} value="16">Minas Gerais</option>
						<option id="PA" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 17}}selected="1"{{/if}} value="17">Pará</option>
						<option id="PB" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 18}}selected="1"{{/if}} value="18">Paraíba</option>
						<option id="PR" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 3}}selected="1"{{/if}} value="3">Paraná</option>
						<option id="PE" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 19}}selected="1"{{/if}} value="19">Pernambuco</option>
						<option id="PI" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 20}}selected="1"{{/if}} value="20">Piauí</option>
						<option id="RJ" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 21}}selected="1"{{/if}} value="21">Rio de Janeiro</option>
						<option id="RN" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 22}}selected="1"{{/if}} value="22">Rio Grande do Norte</option>
						<option id="RS" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 1}}selected="1"{{/if}} value="1">Rio Grande do Sul</option>
						<option id="RO" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 23}}selected="1"{{/if}} value="23">Rondônia</option>
						<option id="RR" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 24}}selected="1"{{/if}} value="24">Roraima</option>
						<option id="SC" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 2}}selected="1"{{/if}} value="2">Santa Catarina</option>
						<option id="SP" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 25}}selected="1"{{/if}} value="25">São Paulo</option>
						<option id="SE" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 26}}selected="1"{{/if}} value="26">Sergipe</option>
						<option id="TO" {{if array_key_exists('input-estado',$data) && $data['input-estado'] == 27}}selected="1"{{/if}} value="27">Tocantins</option>
					</select>
				</div>
				<div class="form-field-container form-field-container-left">
					<label for="input-endereco" class="form-label-field">Endereço*</label>
					<input type="text" name="input-endereco" id="input-endereco" value="{{if array_key_exists('input-endereco',$data)}}{{$data['input-endereco']}}{{/if}}" tabindex="17" class="form-required"/>
				</div>
				<div class="form-field-container">
					<label for="input-bairro" class="form-label-field">Bairro*</label>
					<input type="text" name="input-bairro" id="input-bairro" tabindex="18" value="{{if array_key_exists('input-bairro',$data)}}{{$data['input-bairro']}}{{/if}}" class="form-required"/>
				</div>
				<div class="form-field-container form-field-container-left">
					<label for="input-cidade" class="form-label-field">Cidade*</label>
					<input type="text" name="input-cidade" id="input-cidade" tabindex="19" value="{{if array_key_exists('input-cidade',$data)}}{{$data['input-cidade']}}{{/if}}" class="form-required"/>
				</div>
				<div class="form-field-container">
					<label for="input-numero" class="form-label-field">Número*</label>
					<input type="text" name="input-numero" id="input-numero" tabindex="20" value="{{if array_key_exists('input-numero',$data)}}{{$data['input-numero']}}{{/if}}" class="form-required"/>
				</div>
				<div class="form-field-container form-field-container-left">
					<label for="input-complemento" class="form-label-field">Complemento*</label>
					<input type="text" name="input-complemento" id="input-complemento" tabindex="21" value="{{if array_key_exists('input-complemento',$data)}}{{$data['input-complemento']}}{{/if}}" class="form-required"/>
				</div>
				<div class="form-field-container">
					<label for="input-telefone" class="form-label-field">Telefone*</label>
					<input type="text" name="input-telefone" id="input-telefone" tabindex="22" value="{{if array_key_exists('input-telefone',$data)}}{{$data['input-telefone']}}{{/if}}" class="form-required"/>
				</div>
				<div class="form-field-container form-field-container-left">
					<label for="input-telefone-celular" class="form-label-field">Tel. Celular*</label>
					<input type="text" name="input-telefone-celular" id="input-telefone-celular" tabindex="23" value="{{if array_key_exists('input-telefone-celular',$data)}}{{$data['input-telefone-celular']}}{{/if}}" class="form-required"/>
				</div>
				<div class="form-field-container">
					<label for="input-telefone-comercial" class="form-label-field">Tel. Comercial*</label>
					<input type="text" name="input-telefone-comercial" id="input-telefone-comercial" tabindex="24" value="{{if array_key_exists('input-telefone-comercial',$data)}}{{$data['input-telefone-comercial']}}{{/if}}" class="form-required"/>
				</div>

				<br clear="all" />

				<h2 class='form-subtitle'>Dados Complementares</h2>

				<div class="form-field-container show-when-pessoa-fisica form-field-container-left">
					<label for="input-escolaridade" class="form-label-field">Escolaridade</label>
					<select name="input-escolaridade" id="input-escolaridade" tabindex="25">
						<option {{if array_key_exists('input-escolaridade',$data) && $data['input-escolaridade'] == -2}}selected="1"{{/if}} value="-2">Não desejo informar</option>
						<option {{if array_key_exists('input-escolaridade',$data) && $data['input-escolaridade'] == 6}}selected="1"{{/if}} value="6">Pós Graduação</option>
						<option {{if array_key_exists('input-escolaridade',$data) && $data['input-escolaridade'] == 5}}selected="1"{{/if}} value="5">Superior</option>
						<option {{if array_key_exists('input-escolaridade',$data) && $data['input-escolaridade'] == 4}}selected="1"{{/if}} value="4">Superior Incompleto</option>
						<option {{if array_key_exists('input-escolaridade',$data) && $data['input-escolaridade'] == 3}}selected="1"{{/if}} value="3">Segundo Grau</option>
						<option {{if array_key_exists('input-escolaridade',$data) && $data['input-escolaridade'] == 2}}selected="1"{{/if}} value="2">Segundo Grau Incompleto</option>
						<option {{if array_key_exists('input-escolaridade',$data) && $data['input-escolaridade'] == 1}}selected="1"{{/if}} value="1">Primeiro Grau</option>
					</select>
				</div>
				<div class="form-field-container show-when-pessoa-fisica">
					<label for="input-profissao" class="form-label-field">Profissão</label>
					<input type="text" name="input-profissao" id="input-profissao" value="{{if array_key_exists('input-profissao',$data)}}{{$data['input-profissao']}}{{/if}}" tabindex="26"/>
				</div>

				<div class="form-field-container form-field-container-left">
					<label for="input-corretora" class="form-label-field">Corretora</label>
					<select name="input-corretora" id="input-corretora" value="{{if array_key_exists('input-corretora',$data)}}{{$data['input-corretora']}}{{/if}}" tabindex="27">
						<option value=""></option>
						<option value="1">TODO: Fazer o loading do banco...</option> 
					</select>
				</div>
				<div class="form-field-container show-when-pessoa-fisica">
					<label for="input-curso" class="form-label-field">Fez algum curso? Qual?</label>
					<input type="text" name="input-curso" id="input-curso" value="{{if array_key_exists('input-curso',$data)}}{{$data['input-curso']}}{{/if}}" tabindex="28"/>
				</div>

				<div class="form-field-container form-field-container-left">
					<label for="input-trades-mensais" class="form-label-field">Número de Trades Mensais</label>
					<select name="input-trades-mensais" id="input-trades-mensais" tabindex="29">
						<option {{if array_key_exists('input-trades-mensais',$data) && $data['input-trades-mensais'] == -2}}selected="1"{{/if}} value="-2">Não desejo informar</option>
						<option {{if array_key_exists('input-trades-mensais',$data) && $data['input-trades-mensais'] == -1}}selected="1"{{/if}} value="-1">Ainda não opero em bolsa</option> 
						<option {{if array_key_exists('input-trades-mensais',$data) && $data['input-trades-mensais'] == 2}}selected="1"{{/if}} value="2">Até 2</option> 
						<option {{if array_key_exists('input-trades-mensais',$data) && $data['input-trades-mensais'] == 4}}selected="1"{{/if}} value="4">Entre 2 e 4</option> 
						<option {{if array_key_exists('input-trades-mensais',$data) && $data['input-trades-mensais'] == 6}}selected="1"{{/if}} value="6">Entre 4 e 6</option> 
						<option {{if array_key_exists('input-trades-mensais',$data) && $data['input-trades-mensais'] == 10}}selected="1"{{/if}} value="10">Entre 6 e 10</option> 
						<option {{if array_key_exists('input-trades-mensais',$data) && $data['input-trades-mensais'] == 15}}selected="1"{{/if}} value="15">Entre 10 e 15</option> 
						<option {{if array_key_exists('input-trades-mensais',$data) && $data['input-trades-mensais'] == 20}}selected="1"{{/if}} value="20">Entre 15 e 20</option> 
						<option {{if array_key_exists('input-trades-mensais',$data) && $data['input-trades-mensais'] == 25}}selected="1"{{/if}} value="25">Entre 20 e 25</option> 
						<option {{if array_key_exists('input-trades-mensais',$data) && $data['input-trades-mensais'] == 30}}selected="1"{{/if}} value="30">Entre 25 e 30</option> 
						<option {{if array_key_exists('input-trades-mensais',$data) && $data['input-trades-mensais'] == 50}}selected="1"{{/if}} value="50">Entre 30 e 50</option> 
						<option {{if array_key_exists('input-trades-mensais',$data) && $data['input-trades-mensais'] == 100}}selected="1"{{/if}} value="100">Acima de 50</option>
					</select>
				</div>
				<div class="form-field-container">
					<label for="input-volume" class="form-label-field">Volume operacional mensal</label>
					<select name="input-volume" id="input-volume" tabindex="30">
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == -2}}selected="1"{{/if}} value="-2">Não desejo informar</option>
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == -1}}selected="1"{{/if}} value="-1">Ainda não opero em bolsa</option> 
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == 5}}selected="1"{{/if}} value="5">Até 5.000,00</option> 
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == 10}}selected="1"{{/if}} value="10">Entre 5.000,00 e 10.000,00</option> 
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == 20}}selected="1"{{/if}} value="20">Entre 10.000,00 e 20.000,00</option> 
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == 30}}selected="1"{{/if}} value="30">Entre 20.000,00 e 30.000,00</option> 
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == 50}}selected="1"{{/if}} value="50">Entre 30.000,00 e 50.000,00</option> 
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == 100}}selected="1"{{/if}} value="100">Entre 50.000,00 e 100.000,00</option> 
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == 200}}selected="1"{{/if}} value="200">Entre 100.000,00 e 200.000,00</option> 
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == 300}}selected="1"{{/if}} value="300">Entre 200.000,00 e 300.000,00</option> 
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == 500}}selected="1"{{/if}} value="500">Entre 300.000,00 e 500.000,00</option> 
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == 1000}}selected="1"{{/if}} value="1000">Entre 500.000,00 e 1 milhão</option> 
						<option {{if array_key_exists('input-curso',$data) && $data['input-curso'] == 2000}}selected="1"{{/if}} value="2000">Acima de 1 milhão</option> 
					</select>
				</div>

				<div class="form-field-container form-field-container-left">
					<label for="input-software" class="form-label-field"> Utiliza algum software para acompanhar o mercado? Qual?</label>
					<input type="text" name="input-software" id="input-software" value="{{if array_key_exists('input-software',$data)}}{{$data['input-software']}}{{/if}}" tabindex="31"/>
				</div>
				<div class="form-field-container">
					<label for="input-plataforma" class="form-label-field">Como você conheceu a plataforma ProfitChart?</label>
					<input type="text" name="input-plataforma" id="input-plataforma" value="{{if array_key_exists('input-plataforma',$data)}}{{$data['input-plataforma']}}{{/if}}" tabindex="32"/>
				</div>

				<br clear="all" />

				<input type="submit" value="Entrar" class='button greenButton' id="login-register-submit"/>

				<br clear="all" />

			</form>
		</div>
	</div>
</div>
<br clear="All"/>
<script type="text/javascript">
setTimeout(function(){
	Forms.RegistryPageLoad();
},1);
</script>
