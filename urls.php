<?php

require_once dirname(__FILE__) . "/classes/DB.class.php";
require_once dirname(__FILE__) . "/classes/Log.class.php";
require_once dirname(__FILE__) . "/classes/MVC/Model.class.php";
require_once dirname(__FILE__) . "/classes/MVC/View.class.php";
require_once dirname(__FILE__) . "/classes/MVC/Controller.class.php";
require_once dirname(__FILE__) . "/classes/URL.class.php";

use PHPMVC\URL  as URL;
use PHPMVC\View as View;
use PHPMVC\Log  as Log;

$url = new URL($_GET["url"]);

$url->url('^(home|index)?$','Home.Index');

$url->url('^login$','Login.Index');
$url->url('^login/entrar$','Login.Enter');
$url->url('^login/sair$','Login.Leave');
$url->url('^login/registrar$','Login.Register');
$url->url('^login/registrar/novo$','Login.RegisterNew');
$url->url('^login/recuperar$','Login.EsqueciSenha');
$url->url('^login/recuperar_senha$','Login.RecuperarSenha');

$url->url('^consultas/cep/(\d{8})$','Consultas.CEP');

/* Páginas de Produtos */
$url->url('^produtos$','Produtos.Index');
$url->url('^produtos/assinar/(\d+)((?:\/\d)?)$','Assinatura.Index');
$url->url('^produtos/([^\/]+)$','Produtos.Detalhes');
$url->url('^produtos/([^\/]+)/assinar$','Produtos.PlanosDisponiveis');
$url->url('^produtos/([^\/]+)/download$','Produtos.Download');
$url->url('^produtos/([^\/]+)/([^\/]+)$','Produtos.Caracteristicas');

/* Página sobre a Nelogica (Empresa) */
$url->url('^empresa$','Empresa.index');
$url->url('^empresa/sobre$','Empresa.index');
$url->url('^empresa/oportunidades$','Empresa.Oportunidades');
$url->url('^empresa/missao$','Empresa.Missao');
$url->url('^empresa/politicas$','Empresa.Politicas');
$url->url('^empresa/termosuso$','Empresa.Termos');
$url->url('^empresa/trabalheconosco$','Empresa.TrabalheConosco');


$url->url('^contato$', 'Contato.index');
$url->url('^contato/enviar$','Contato.EnviarEmail');

$url->url('^newsletter$','Newsletter.index');

$url->url('^conhecimento$','Conhecimento.index');
$url->url('^conhecimento/([^\/]+)$','Conhecimento.Tipo');
$url->url('^conhecimento/([^\/]+)/([^\/]+)$','Conhecimento.Assunto');
$url->url('^conhecimento/([^\/]+)/([^\/]+)/([^\/]+)$','Conhecimento.Conteudo');

$url->url('^conta$', 'Login.MinhaConta');
$url->url('^conta/alterar_dados$', 'Login.DetalhesConta');

$url->NotFound();

?>