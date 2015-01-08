<?php

require_once dirname(__FILE__) . "/../../classes/Test.class.php";
use PHPMVC\Test as Test;

// Inclua aqui as classes que deseja utilizar nos testes.
require_once dirname(__FILE__) . "/../../controllers/Login.php";


// Inicie o teste aqui. a variável $tests deve ser declarada.
// O índice deve ser único dentre TODOS os testes unitários.
$tests['UserForm'] = new Test('Testes de validação dos dados do cadastro de usuários.');



// Para cada teste a ser realizado, chame o método assert da Class Test acima instanciada.
// Defina uma descrição para o teste.
// Defina qual a função que será avaliada (deve ter um retorno)
// Defina qual o valor experado e qual o operador que será utilizado nesta avaliação.


$tests['UserForm']->assert('Falhar ao cadastrar sem post',function(){
	$login = new Login();
	$_POST = array();
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);



$tests['UserForm']->assert('Falhar ao cadastrar com todos os campos vazios',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "",
		"input-nome"                 => "",
		"input-razao-social"         => "",
		"input-sobrenome"            => "",
		"input-contato"              => "",
		"input-cpf"                  => "",
		"input-cnpj"                 => "",
		"input-dtnascimento-dia"     => "",
		"input-dtnascimento-mes"     => "",
		"input-dtnascimento-ano"     => "",
		"input-email"                => "",
		"input-sexo"                 => "",
		"input-senha"                => "",
		"input-senha-confirmacao"    => "",
		"input-cep"                  => "",
		"input-estado"               => "",
		"input-endereco"             => "",
		"input-bairro"               => "",
		"input-cidade"               => "",
		"input-numero"               => "",
		"input-complemento"          => "",
		"input-telefone"             => "",
		"input-telefone-celular"     => "",
		"input-telefone-comercial"   => "",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o nome vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av. Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o sobrenome vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av. Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o cpf vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av. Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o sexo vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av. Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o email vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av. Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com a senha vazia',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av. Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com a confirmação de senha vazia',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av. Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o cep vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "",
		"input-estado"               => "1",
		"input-endereco"             => "Av. Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o estado vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "",
		"input-endereco"             => "Av. Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o endereço vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o bairro vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com a cidade vazia',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o telefone vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o telefone celular vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o telefone comercial vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);




$tests['UserForm']->assert('Sucesso ao cadastrar pessoa fisica sem nenhuma informação de pessoa juridica',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_EQUALTYPE);




$tests['UserForm']->assert('Sucesso ao cadastrar pessoa juridica sem nenhuma informação de pessoa física',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "",
		"input-dtnascimento-mes"     => "",
		"input-dtnascimento-ano"     => "",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_EQUALTYPE);




$tests['UserForm']->assert('Falhar ao cadastrar pessoa física com data de nascimento inválida',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "",
		"input-dtnascimento-dia"     => "29",
		"input-dtnascimento-mes"     => "02",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},2,TEST_OPERATOR_EQUALTYPE);

for($i=0;$i<=9;$i++)
	$tests['UserForm']->assert("Falhar ao cadastrar pessoa física com cpf {$i}{$i}{$i}.{$i}{$i}{$i}.{$i}{$i}{$i}-{$i}{$i}",function($a){
		$login = new Login();
		$_POST = array(
			"input-pessoaFisicaJuridica" => "1",
			"input-nome"                 => "Teste",
			"input-razao-social"         => "",
			"input-sobrenome"            => "Teste",
			"input-contato"              => "",
			"input-cpf"                  => $a.$a.$a.$a.$a.$a.$a.$a.$a.$a.$a,
			"input-cnpj"                 => "",
			"input-dtnascimento-dia"     => "01",
			"input-dtnascimento-mes"     => "01",
			"input-dtnascimento-ano"     => "2014",
			"input-email"                => "teste@nelogica.com.br",
			"input-sexo"                 => "1",
			"input-senha"                => "321654",
			"input-senha-confirmacao"    => "321654",
			"input-cep"                  => "90480000",
			"input-estado"               => "1",
			"input-endereco"             => "Av Carlos Gomes",
			"input-bairro"               => "Auxiliadora",
			"input-cidade"               => "Porto Alegre",
			"input-numero"               => "300",
			"input-complemento"          => "1000",
			"input-telefone"             => "5100000000",
			"input-telefone-celular"     => "5100000000",
			"input-telefone-comercial"   => "5100000000",
			"input-escolaridade"         => "",
			"input-profissao"            => "",
			"input-corretora"            => "",
			"input-curso"                => "",
			"input-trades-mensais"       => "",
			"input-software"             => "",
			"input-plataforma"           => ""
		);
		return $login->UserValidateForm();
	},3,TEST_OPERATOR_EQUALTYPE,$i);



$tests['UserForm']->assert('Falhar ao cadastrar pessoa física com cpf 123.456.789-00',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "",
		"input-cpf"                  => "12345678900",
		"input-cnpj"                 => "",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},3,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Sucesso ao cadastrar pessoa física com cpf 402.268.472-09',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "",
		"input-cpf"                  => "40226847209",
		"input-cnpj"                 => "",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falhar ao cadastrar pessoa juridica com cnpj 82.807.778/0001-72',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000172",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},4,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Sucesso ao cadastrar pessoa juridica com cnpj 82.807.778/0001-71',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falhar ao utilizar email sem \'@\'',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "testenelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},5,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falhar ao utilizar email com espaço',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "meu teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},5,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falha ao utilizar email sem domínio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "teste@nelogica",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},5,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falha ao utilizar "Senha" e "Confirmação de Senha" diferentes',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "a@gmail.com",
		"input-sexo"                 => "1",
		"input-senha"                => "321654 ",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},6,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falha ao utilizar CEP com 7 digitos',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "a@gmail.com",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "9048000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},7,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falha ao utilizar CEP com 9 digitos',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "a@gmail.com",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "904800000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},7,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falha ao utilizar o telefone (00) 00-0000',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "a@gmail.com",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "00000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},8,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Sucesso ao utilizar o telefone (00) 0-0000-0000',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "a@gmail.com",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "00000000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falha ao utilizar o telefone (00) 00-0000-0000',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "a@gmail.com",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "000000000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},8,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falha ao utilizar o celular (00) 00-0000',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "a@gmail.com",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "0000000000",
		"input-telefone-celular"     => "00000000",
		"input-telefone-comercial"   => "0000000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},9,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Sucesso ao utilizar o telefone (00) 0-0000-0000',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "a@gmail.com",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "0000000000",
		"input-telefone-celular"     => "00000000000",
		"input-telefone-comercial"   => "0000000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falha ao utilizar o telefone (00) 00-0000-0000',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "a@gmail.com",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "0000000000",
		"input-telefone-celular"     => "000000000000",
		"input-telefone-comercial"   => "0000000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},9,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falha ao utilizar o telefone comercial (00) 00-0000',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "a@gmail.com",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "0000000000",
		"input-telefone-celular"     => "0000000000",
		"input-telefone-comercial"   => "00000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},10,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Sucesso ao utilizar o telefone comercial (00) 0-0000-0000',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "a@gmail.com",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "0000000000",
		"input-telefone-celular"     => "0000000000",
		"input-telefone-comercial"   => "00000000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_EQUALTYPE);



$tests['UserForm']->assert('Falha ao utilizar o telefone comercial (00) 00-0000-0000',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "2",
		"input-nome"                 => "",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "",
		"input-contato"              => "Teste",
		"input-cpf"                  => "",
		"input-cnpj"                 => "82807778000171",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "2014",
		"input-email"                => "a@gmail.com",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "0000000000",
		"input-telefone-celular"     => "0000000000",
		"input-telefone-comercial"   => "000000000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},10,TEST_OPERATOR_EQUALTYPE);



/*
$tests['UserForm']->assert('Falhar ao cadastrar pessoa fisica apenas com o telefone vazio',function(){
	$login = new Login();
	$_POST = array(
		"input-pessoaFisicaJuridica" => "1",
		"input-nome"                 => "Teste",
		"input-razao-social"         => "Teste",
		"input-sobrenome"            => "Teste",
		"input-contato"              => "Teste",
		"input-cpf"                  => "40567117987",
		"input-cnpj"                 => "11812796000101",
		"input-dtnascimento-dia"     => "01",
		"input-dtnascimento-mes"     => "01",
		"input-dtnascimento-ano"     => "1970",
		"input-email"                => "teste@nelogica.com.br",
		"input-sexo"                 => "1",
		"input-senha"                => "321654",
		"input-senha-confirmacao"    => "321654",
		"input-cep"                  => "90480000",
		"input-estado"               => "1",
		"input-endereco"             => "Av Carlos Gomes",
		"input-bairro"               => "Auxiliadora",
		"input-cidade"               => "Porto Alegre",
		"input-numero"               => "300",
		"input-complemento"          => "1000",
		"input-telefone"             => "5100000000",
		"input-telefone-celular"     => "5100000000",
		"input-telefone-comercial"   => "5100000000",
		"input-escolaridade"         => "",
		"input-profissao"            => "",
		"input-corretora"            => "",
		"input-curso"                => "",
		"input-trades-mensais"       => "",
		"input-software"             => "",
		"input-plataforma"           => ""
	);
	return $login->UserValidateForm();
},0,TEST_OPERATOR_NOTEQUALTYPE);
*/

?>