<?php /* Smarty version Smarty-3.1.19, created on 2014-12-18 15:06:27
         compiled from "D:\ProjetosGit\SiteRebuild\views\User\UserRegister.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1500454770b75ac22e3-20337967%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18f10a30c1f3f81ebbe52901e776928c6c2bf20a' => 
    array (
      0 => 'D:\\ProjetosGit\\SiteRebuild\\views\\User\\UserRegister.tpl',
      1 => 1418922382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1500454770b75ac22e3-20337967',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54770b75f3d1e4_11916426',
  'variables' => 
  array (
    'msgTotalAccess' => 0,
    'msgError' => 0,
    'msgErrorStr' => 0,
    'domain' => 0,
    'data' => 0,
    'd' => 0,
    'currentYear' => 0,
    'y' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54770b75f3d1e4_11916426')) {function content_54770b75f3d1e4_11916426($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\ProjetosGit\\SiteRebuild\\classes\\MVC/Smarty/libs/plugins\\modifier.date_format.php';
?><div class="center">
	<div id="registro-de-usuario">
		<?php if ($_smarty_tpl->tpl_vars['msgTotalAccess']->value) {?>
		<h2 class="subtitle">Cadastre-se</h2>
		<p class='text'>
			Preencha o cadastro abaixo e tenha acesso total aos artigos e tutoriais sobre técnicas de 
			investimentos no mercado financeiro e a downloads de avaliação dos produtos Nelogica. 
			Algumas das informações são exigidas pela Bovespa e outras serão utilizadas para melhorar a 
			qualidade dos nossos produtos e serviços.
		</p>
		<?php } else { ?>
			<h2 class="subtitle">Detalhes da Conta</h2>
			<p class='text'>
				Se você deseja alterar o seu cadastro, faça as alterações nos campos abaixo e depois clique em enviar. Algumas das informações são exigidas pela Bovespa e outras serão utilizadas para melhorar a qualidade dos nossos produtos e serviços.
			</p>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['msgError']->value==1) {?>
		<div class="error">
			Há campos obrigatórios que não foram corretamente preenchidos.
		</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['msgError']->value==2) {?>
		<div class="error">
			A data de nascimento informada não é uma data válida.
		</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['msgError']->value==98) {?>
		<div class="error">
			Não foi possível regitrar seu endereço. Verifique os dados antes de prosseguir
		</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['msgError']->value==99) {?>
		<div class="error">
			Não foi possível realizar seu cadastro. Tente novamente.
		</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['msgError']->value!=0) {?>
		<div class="error">
			<?php echo $_smarty_tpl->tpl_vars['msgErrorStr']->value;?>

		</div>
		<?php }?>

		<div id="login-register-container">

			<form action="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
/login/registrar/novo" method="POST">

				<h2 class='form-subtitle'>Dados Pessoais</h2>

				<div class="form-field-container-pfj form-field-container-left">
					<input type="radio" name="input-pessoaFisicaJuridica" value="1" <?php if ((array_key_exists('input-pessoaFisicaJuridica',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-pessoaFisicaJuridica']==1)||!array_key_exists('input-pessoaFisicaJuridica',$_smarty_tpl->tpl_vars['data']->value)) {?>checked="1"<?php }?> id="input-pessoaFisica" />
					<label for="input-pessoaFisica">Pessoa Física</label>
				</div>

				<div class="form-field-container-pfj ">
					<input type="radio" name="input-pessoaFisicaJuridica" value="2" <?php if (array_key_exists('input-pessoaFisicaJuridica',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-pessoaFisicaJuridica']==2) {?>checked="1"<?php }?> id="input-pessoaJuridica" />
					<label for="input-pessoaJuridica">Pessoa Jurídica</label>
				</div>

				<br/><br/>

				<div class="form-field-container show-when-pessoa-fisica form-field-container-left">
					<label for="input-nome" class="form-label-field">Nome*</label>
					<input type="text" name="input-nome" id="input-nome" autofocus="autofocus" value="<?php if (array_key_exists('input-nome',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-nome'];?>
<?php }?>" tabindex="1" class="form-required"/>
				</div>
				<div class="form-field-container show-when-pessoa-juridica form-field-container-left">
					<label for="input-razao-social" class="form-label-field">Razão Social*</label>
					<input type="text" name="input-razao-social" id="input-razao-social" value="<?php if (array_key_exists('input-razao-social',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-razao-social'];?>
<?php }?>" tabindex="2" class="form-required"/>
				</div>

				<div class="form-field-container show-when-pessoa-fisica">
					<label for="input-sobrenome" class="form-label-field">Sobrenome*</label>
					<input type="text" name="input-sobrenome" id="input-sobrenome"value="<?php if (array_key_exists('input-sobrenome',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-sobrenome'];?>
<?php }?>" tabindex="3" class="form-required"/>
				</div>
				<div class="form-field-container show-when-pessoa-juridica">
					<label for="input-contato" class="form-label-field">Contato*</label>
					<input type="text" name="input-contato" id="input-contato" value="<?php if (array_key_exists('input-contato',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-contato'];?>
<?php }?>" tabindex="4" class="form-required"/>
				</div>

				<div class="form-field-container show-when-pessoa-fisica form-field-container-left">
					<label for="input-cpf" class="form-label-field">CPF*</label>
					<input type="text" name="input-cpf" id="input-cpf"value="<?php if (array_key_exists('input-cpf',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-cpf'];?>
<?php }?>" tabindex="5" class="form-required"/>
				</div>
				
				<div class="form-field-container show-when-pessoa-juridica form-field-container-left">
					<label for="input-cnpj" class="form-label-field">CNPJ*</label>
					<input type="text" name="input-cnpj" id="input-cnpj" tabindex="6"value="<?php if (array_key_exists('input-cnpj',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-cnpj'];?>
<?php }?>" class="form-required"/>
				</div>

				<div class="form-field-container show-when-pessoa-fisica">
					<label for="select-dia" class="form-label-field">Data de nascimento*</label>
					<select name="input-dtnascimento-dia" id="select-dia" tabindex="7" style="width:25%; margin-right:5%" class="form-required">
						<option value=""></option>
					<?php $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['d']->step = 1;$_smarty_tpl->tpl_vars['d']->total = (int) ceil(($_smarty_tpl->tpl_vars['d']->step > 0 ? 31+1 - (1) : 1-(31)+1)/abs($_smarty_tpl->tpl_vars['d']->step));
if ($_smarty_tpl->tpl_vars['d']->total > 0) {
for ($_smarty_tpl->tpl_vars['d']->value = 1, $_smarty_tpl->tpl_vars['d']->iteration = 1;$_smarty_tpl->tpl_vars['d']->iteration <= $_smarty_tpl->tpl_vars['d']->total;$_smarty_tpl->tpl_vars['d']->value += $_smarty_tpl->tpl_vars['d']->step, $_smarty_tpl->tpl_vars['d']->iteration++) {
$_smarty_tpl->tpl_vars['d']->first = $_smarty_tpl->tpl_vars['d']->iteration == 1;$_smarty_tpl->tpl_vars['d']->last = $_smarty_tpl->tpl_vars['d']->iteration == $_smarty_tpl->tpl_vars['d']->total;?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['d']->value;?>
" <?php if (array_key_exists('input-dtnascimento-dia',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-dia']==$_smarty_tpl->tpl_vars['d']->value) {?>selected="1"<?php }?>><?php echo str_pad($_smarty_tpl->tpl_vars['d']->value,2,"0",@constant('STR_PAD_LEFT'));?>
</option>
					<?php }} ?>
					</select><select name="input-dtnascimento-mes" id="select-mes" tabindex="8" style="width:30%; margin-right:5%" class="form-required">
						<option value=""></option>
						<option value="1" <?php if (array_key_exists('input-dtnascimento-mes',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-mes']==1) {?>selected="1"<?php }?>>Janeiro</option>
						<option value="2" <?php if (array_key_exists('input-dtnascimento-mes',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-mes']==2) {?>selected="1"<?php }?>>Fevereiro</option>
						<option value="3" <?php if (array_key_exists('input-dtnascimento-mes',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-mes']==3) {?>selected="1"<?php }?>>Março</option>
						<option value="4" <?php if (array_key_exists('input-dtnascimento-mes',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-mes']==4) {?>selected="1"<?php }?>>Abril</option>
						<option value="5" <?php if (array_key_exists('input-dtnascimento-mes',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-mes']==5) {?>selected="1"<?php }?>>Maio</option>
						<option value="6" <?php if (array_key_exists('input-dtnascimento-mes',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-mes']==6) {?>selected="1"<?php }?>>Junho</option>
						<option value="7" <?php if (array_key_exists('input-dtnascimento-mes',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-mes']==7) {?>selected="1"<?php }?>>Julho</option>
						<option value="8" <?php if (array_key_exists('input-dtnascimento-mes',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-mes']==8) {?>selected="1"<?php }?>>Agosto</option>
						<option value="9" <?php if (array_key_exists('input-dtnascimento-mes',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-mes']==9) {?>selected="1"<?php }?>>Setembro</option>
						<option value="10" <?php if (array_key_exists('input-dtnascimento-mes',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-mes']==10) {?>selected="1"<?php }?>>Outubro</option>
						<option value="11" <?php if (array_key_exists('input-dtnascimento-mes',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-mes']==11) {?>selected="1"<?php }?>>Novembro</option>
						<option value="12" <?php if (array_key_exists('input-dtnascimento-mes',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-mes']==12) {?>selected="1"<?php }?>>Dezembro</option>
					</select><select name="input-dtnascimento-ano" id="select-ano" tabindex="9" style="width:35%" class="form-required">
						<option value=""></option>
					<?php $_smarty_tpl->tpl_vars["currentYear"] = new Smarty_variable(smarty_modifier_date_format(time(),'%Y'), null, 0);?>
					<?php $_smarty_tpl->tpl_vars['y'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['y']->step = 1;$_smarty_tpl->tpl_vars['y']->total = (int) ceil(($_smarty_tpl->tpl_vars['y']->step > 0 ? 100+1 - (0) : 0-(100)+1)/abs($_smarty_tpl->tpl_vars['y']->step));
if ($_smarty_tpl->tpl_vars['y']->total > 0) {
for ($_smarty_tpl->tpl_vars['y']->value = 0, $_smarty_tpl->tpl_vars['y']->iteration = 1;$_smarty_tpl->tpl_vars['y']->iteration <= $_smarty_tpl->tpl_vars['y']->total;$_smarty_tpl->tpl_vars['y']->value += $_smarty_tpl->tpl_vars['y']->step, $_smarty_tpl->tpl_vars['y']->iteration++) {
$_smarty_tpl->tpl_vars['y']->first = $_smarty_tpl->tpl_vars['y']->iteration == 1;$_smarty_tpl->tpl_vars['y']->last = $_smarty_tpl->tpl_vars['y']->iteration == $_smarty_tpl->tpl_vars['y']->total;?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['currentYear']->value-$_smarty_tpl->tpl_vars['y']->value;?>
" <?php if (array_key_exists('input-dtnascimento-ano',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-dtnascimento-ano']==$_smarty_tpl->tpl_vars['currentYear']->value-$_smarty_tpl->tpl_vars['y']->value) {?>selected="1"<?php }?>><?php echo $_smarty_tpl->tpl_vars['currentYear']->value-$_smarty_tpl->tpl_vars['y']->value;?>
</option>
					<?php }} ?>
					</select>
				</div>
				<br clear="all" class="show-when-pessoa-juridica" />

				<div class="form-field-container form-field-container-left">
					<label for="input-email" class="form-label-field">E-mail*</label>
					<input type="text" name="input-email" id="input-email" value="<?php if (array_key_exists('input-email',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-email'];?>
<?php }?>" tabindex="10" class="form-required"/>
				</div>
				<div class="form-field-container show-when-pessoa-fisica">
					<label for="input-sexo-masculino" class="form-label-field">Sexo</label>
					<div class="form-input-spacement">
						<input type="radio" name="input-sexo" value="1" tabindex="11" <?php if ((array_key_exists('input-sexo',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-sexo']==1)||!array_key_exists('input-sexo',$_smarty_tpl->tpl_vars['data']->value)) {?>checked="1"<?php }?> id="input-sexo-masculino" />
						<label for="input-sexo-masculino" style="margin-right:30px">Masculino</label>
						<input type="radio" name="input-sexo" value="2" tabindex="12" <?php if (array_key_exists('input-sexo',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-sexo']==2) {?>checked="1"<?php }?> id="input-sexo-feminino" />
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
					<input type="text" name="input-cep" id="input-cep" style="width:50%" value="<?php if (array_key_exists('input-cep',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-cep'];?>
<?php }?>" tabindex="15" class="form-required"/>
					<span id="form-search-cep">Buscar CEP</span>
				</div>
				<div class="form-field-container">
					<label for="input-estado" class="form-label-field">Estado*</label>
					<select name="input-estado" id="select-estado" tabindex="16" class="form-required">
						<option value="" selected="selected"></option>
						<option id="AC" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==4) {?>selected="1"<?php }?> value="4">Acre</option>
						<option id="AL" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==4) {?>selected="1"<?php }?> value="5">Alagoas</option>
						<option id="AP" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==6) {?>selected="1"<?php }?> value="6">Amapá</option>
						<option id="AM" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==7) {?>selected="1"<?php }?> value="7">Amazonas</option>
						<option id="BA" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==8) {?>selected="1"<?php }?> value="8">Bahia</option>
						<option id="CE" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==9) {?>selected="1"<?php }?> value="9">Ceará</option>
						<option id="DF" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==10) {?>selected="1"<?php }?> value="10">Distrito Federal</option>
						<option id="ES" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==11) {?>selected="1"<?php }?> value="11">Espírito Santo</option>
						<option id="GO" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==12) {?>selected="1"<?php }?> value="12">Goiás</option>
						<option id="MA" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==13) {?>selected="1"<?php }?> value="13">Maranhão</option>
						<option id="MT" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==14) {?>selected="1"<?php }?> value="14">Mato Grosso</option>
						<option id="MS" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==15) {?>selected="1"<?php }?> value="15">Mato Grosso do Sul</option>
						<option id="MG" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==16) {?>selected="1"<?php }?> value="16">Minas Gerais</option>
						<option id="PA" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==17) {?>selected="1"<?php }?> value="17">Pará</option>
						<option id="PB" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==18) {?>selected="1"<?php }?> value="18">Paraíba</option>
						<option id="PR" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==3) {?>selected="1"<?php }?> value="3">Paraná</option>
						<option id="PE" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==19) {?>selected="1"<?php }?> value="19">Pernambuco</option>
						<option id="PI" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==20) {?>selected="1"<?php }?> value="20">Piauí</option>
						<option id="RJ" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==21) {?>selected="1"<?php }?> value="21">Rio de Janeiro</option>
						<option id="RN" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==22) {?>selected="1"<?php }?> value="22">Rio Grande do Norte</option>
						<option id="RS" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==1) {?>selected="1"<?php }?> value="1">Rio Grande do Sul</option>
						<option id="RO" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==23) {?>selected="1"<?php }?> value="23">Rondônia</option>
						<option id="RR" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==24) {?>selected="1"<?php }?> value="24">Roraima</option>
						<option id="SC" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==2) {?>selected="1"<?php }?> value="2">Santa Catarina</option>
						<option id="SP" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==25) {?>selected="1"<?php }?> value="25">São Paulo</option>
						<option id="SE" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==26) {?>selected="1"<?php }?> value="26">Sergipe</option>
						<option id="TO" <?php if (array_key_exists('input-estado',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-estado']==27) {?>selected="1"<?php }?> value="27">Tocantins</option>
					</select>
				</div>
				<div class="form-field-container form-field-container-left">
					<label for="input-endereco" class="form-label-field">Endereço*</label>
					<input type="text" name="input-endereco" id="input-endereco" value="<?php if (array_key_exists('input-endereco',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-endereco'];?>
<?php }?>" tabindex="17" class="form-required"/>
				</div>
				<div class="form-field-container">
					<label for="input-bairro" class="form-label-field">Bairro*</label>
					<input type="text" name="input-bairro" id="input-bairro" tabindex="18" value="<?php if (array_key_exists('input-bairro',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-bairro'];?>
<?php }?>" class="form-required"/>
				</div>
				<div class="form-field-container form-field-container-left">
					<label for="input-cidade" class="form-label-field">Cidade*</label>
					<input type="text" name="input-cidade" id="input-cidade" tabindex="19" value="<?php if (array_key_exists('input-cidade',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-cidade'];?>
<?php }?>" class="form-required"/>
				</div>
				<div class="form-field-container">
					<label for="input-numero" class="form-label-field">Número*</label>
					<input type="text" name="input-numero" id="input-numero" tabindex="20" value="<?php if (array_key_exists('input-numero',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-numero'];?>
<?php }?>" class="form-required"/>
				</div>
				<div class="form-field-container form-field-container-left">
					<label for="input-complemento" class="form-label-field">Complemento*</label>
					<input type="text" name="input-complemento" id="input-complemento" tabindex="21" value="<?php if (array_key_exists('input-complemento',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-complemento'];?>
<?php }?>" class="form-required"/>
				</div>
				<div class="form-field-container">
					<label for="input-telefone" class="form-label-field">Telefone*</label>
					<input type="text" name="input-telefone" id="input-telefone" tabindex="22" value="<?php if (array_key_exists('input-telefone',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-telefone'];?>
<?php }?>" class="form-required"/>
				</div>
				<div class="form-field-container form-field-container-left">
					<label for="input-telefone-celular" class="form-label-field">Tel. Celular*</label>
					<input type="text" name="input-telefone-celular" id="input-telefone-celular" tabindex="23" value="<?php if (array_key_exists('input-telefone-celular',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-telefone-celular'];?>
<?php }?>" class="form-required"/>
				</div>
				<div class="form-field-container">
					<label for="input-telefone-comercial" class="form-label-field">Tel. Comercial*</label>
					<input type="text" name="input-telefone-comercial" id="input-telefone-comercial" tabindex="24" value="<?php if (array_key_exists('input-telefone-comercial',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-telefone-comercial'];?>
<?php }?>" class="form-required"/>
				</div>

				<br clear="all" />

				<h2 class='form-subtitle'>Dados Complementares</h2>

				<div class="form-field-container show-when-pessoa-fisica form-field-container-left">
					<label for="input-escolaridade" class="form-label-field">Escolaridade</label>
					<select name="input-escolaridade" id="input-escolaridade" tabindex="25">
						<option <?php if (array_key_exists('input-escolaridade',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-escolaridade']==-2) {?>selected="1"<?php }?> value="-2">Não desejo informar</option>
						<option <?php if (array_key_exists('input-escolaridade',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-escolaridade']==6) {?>selected="1"<?php }?> value="6">Pós Graduação</option>
						<option <?php if (array_key_exists('input-escolaridade',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-escolaridade']==5) {?>selected="1"<?php }?> value="5">Superior</option>
						<option <?php if (array_key_exists('input-escolaridade',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-escolaridade']==4) {?>selected="1"<?php }?> value="4">Superior Incompleto</option>
						<option <?php if (array_key_exists('input-escolaridade',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-escolaridade']==3) {?>selected="1"<?php }?> value="3">Segundo Grau</option>
						<option <?php if (array_key_exists('input-escolaridade',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-escolaridade']==2) {?>selected="1"<?php }?> value="2">Segundo Grau Incompleto</option>
						<option <?php if (array_key_exists('input-escolaridade',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-escolaridade']==1) {?>selected="1"<?php }?> value="1">Primeiro Grau</option>
					</select>
				</div>
				<div class="form-field-container show-when-pessoa-fisica">
					<label for="input-profissao" class="form-label-field">Profissão</label>
					<input type="text" name="input-profissao" id="input-profissao" value="<?php if (array_key_exists('input-profissao',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-profissao'];?>
<?php }?>" tabindex="26"/>
				</div>

				<div class="form-field-container form-field-container-left">
					<label for="input-corretora" class="form-label-field">Corretora</label>
					<select name="input-corretora" id="input-corretora" value="<?php if (array_key_exists('input-corretora',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-corretora'];?>
<?php }?>" tabindex="27">
						<option value=""></option>
						<option value="1">TODO: Fazer o loading do banco...</option> 
					</select>
				</div>
				<div class="form-field-container show-when-pessoa-fisica">
					<label for="input-curso" class="form-label-field">Fez algum curso? Qual?</label>
					<input type="text" name="input-curso" id="input-curso" value="<?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-curso'];?>
<?php }?>" tabindex="28"/>
				</div>

				<div class="form-field-container form-field-container-left">
					<label for="input-trades-mensais" class="form-label-field">Número de Trades Mensais</label>
					<select name="input-trades-mensais" id="input-trades-mensais" tabindex="29">
						<option <?php if (array_key_exists('input-trades-mensais',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-trades-mensais']==-2) {?>selected="1"<?php }?> value="-2">Não desejo informar</option>
						<option <?php if (array_key_exists('input-trades-mensais',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-trades-mensais']==-1) {?>selected="1"<?php }?> value="-1">Ainda não opero em bolsa</option> 
						<option <?php if (array_key_exists('input-trades-mensais',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-trades-mensais']==2) {?>selected="1"<?php }?> value="2">Até 2</option> 
						<option <?php if (array_key_exists('input-trades-mensais',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-trades-mensais']==4) {?>selected="1"<?php }?> value="4">Entre 2 e 4</option> 
						<option <?php if (array_key_exists('input-trades-mensais',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-trades-mensais']==6) {?>selected="1"<?php }?> value="6">Entre 4 e 6</option> 
						<option <?php if (array_key_exists('input-trades-mensais',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-trades-mensais']==10) {?>selected="1"<?php }?> value="10">Entre 6 e 10</option> 
						<option <?php if (array_key_exists('input-trades-mensais',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-trades-mensais']==15) {?>selected="1"<?php }?> value="15">Entre 10 e 15</option> 
						<option <?php if (array_key_exists('input-trades-mensais',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-trades-mensais']==20) {?>selected="1"<?php }?> value="20">Entre 15 e 20</option> 
						<option <?php if (array_key_exists('input-trades-mensais',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-trades-mensais']==25) {?>selected="1"<?php }?> value="25">Entre 20 e 25</option> 
						<option <?php if (array_key_exists('input-trades-mensais',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-trades-mensais']==30) {?>selected="1"<?php }?> value="30">Entre 25 e 30</option> 
						<option <?php if (array_key_exists('input-trades-mensais',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-trades-mensais']==50) {?>selected="1"<?php }?> value="50">Entre 30 e 50</option> 
						<option <?php if (array_key_exists('input-trades-mensais',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-trades-mensais']==100) {?>selected="1"<?php }?> value="100">Acima de 50</option>
					</select>
				</div>
				<div class="form-field-container">
					<label for="input-volume" class="form-label-field">Volume operacional mensal</label>
					<select name="input-volume" id="input-volume" tabindex="30">
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==-2) {?>selected="1"<?php }?> value="-2">Não desejo informar</option>
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==-1) {?>selected="1"<?php }?> value="-1">Ainda não opero em bolsa</option> 
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==5) {?>selected="1"<?php }?> value="5">Até 5.000,00</option> 
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==10) {?>selected="1"<?php }?> value="10">Entre 5.000,00 e 10.000,00</option> 
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==20) {?>selected="1"<?php }?> value="20">Entre 10.000,00 e 20.000,00</option> 
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==30) {?>selected="1"<?php }?> value="30">Entre 20.000,00 e 30.000,00</option> 
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==50) {?>selected="1"<?php }?> value="50">Entre 30.000,00 e 50.000,00</option> 
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==100) {?>selected="1"<?php }?> value="100">Entre 50.000,00 e 100.000,00</option> 
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==200) {?>selected="1"<?php }?> value="200">Entre 100.000,00 e 200.000,00</option> 
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==300) {?>selected="1"<?php }?> value="300">Entre 200.000,00 e 300.000,00</option> 
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==500) {?>selected="1"<?php }?> value="500">Entre 300.000,00 e 500.000,00</option> 
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==1000) {?>selected="1"<?php }?> value="1000">Entre 500.000,00 e 1 milhão</option> 
						<option <?php if (array_key_exists('input-curso',$_smarty_tpl->tpl_vars['data']->value)&&$_smarty_tpl->tpl_vars['data']->value['input-curso']==2000) {?>selected="1"<?php }?> value="2000">Acima de 1 milhão</option> 
					</select>
				</div>

				<div class="form-field-container form-field-container-left">
					<label for="input-software" class="form-label-field"> Utiliza algum software para acompanhar o mercado? Qual?</label>
					<input type="text" name="input-software" id="input-software" value="<?php if (array_key_exists('input-software',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-software'];?>
<?php }?>" tabindex="31"/>
				</div>
				<div class="form-field-container">
					<label for="input-plataforma" class="form-label-field">Como você conheceu a plataforma ProfitChart?</label>
					<input type="text" name="input-plataforma" id="input-plataforma" value="<?php if (array_key_exists('input-plataforma',$_smarty_tpl->tpl_vars['data']->value)) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['input-plataforma'];?>
<?php }?>" tabindex="32"/>
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
<?php }} ?>
