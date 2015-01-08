<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="content-language" content="pt-br" />
		<meta http-equiv="content-style-type" content="text/css" />
		<meta name="title" content="{{$titulo}}" />
		<meta name="author" content="Nelogica" />
		<meta name="language" content="Portuguese" />
		<meta name="copyright" content="Nelogica" /> 
		<meta name="description" content="{{$descricao}}" />
		<meta name="keywords" content="mercado financeiro, mercado financeiro brasileiro, bolsa de valores, acao, acões, opcões, software, análise técnica, análise gráfica, investir, investimentos, ProfitChart, Brasil" />
		<meta name="rating" content="general" />
		<meta name="robots" content="index, follow" />
		<meta name="revisit-after" content="20 days" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="format-detection" content="telephone=no" />

		<title>{{$titulo}}</title>

		<link rel="icon" href="{{$domain}}/statics/images/favicon.ico?v={{$version}}" />

		{{if $siteProduction}}
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				ga('create', 'UA-20470286-1', 'auto');
				ga('send', 'pageview');

			</script>

			<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" type="text/css" href="{{$domain}}/statics/css/small.min.css?v={{$version}}" media="all"/>
			<link rel="stylesheet" type="text/css" href="{{$domain}}/statics/css/medium.min.css?v={{$version}}" media="all and (min-width: 600px)"/>
			<link rel="stylesheet" type="text/css" href="{{$domain}}/statics/css/large.min.css?v={{$version}}" media="all and (min-width: 1000px)"/>
			<link rel="stylesheet" type="text/css" href="{{$domain}}/statics/css/extra.min.css?v={{$version}}"/>


		{{else}}

			<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" type="text/css" href="{{$domain}}/statics/css/small.css?v={{$version}}" media="all"/>
			<link rel="stylesheet" type="text/css" href="{{$domain}}/statics/css/medium.css?v={{$version}}" media="all and (min-width: 600px)"/>
			<link rel="stylesheet" type="text/css" href="{{$domain}}/statics/css/large.css?v={{$version}}" media="all and (min-width: 1000px)"/>
			<link rel="stylesheet" type="text/css" href="{{$domain}}/statics/css/extra.css?v={{$version}}"/>

		{{/if}}


	</head>
	<body>
		<div id="wrapper">

			<div id="header">
				<div class="center">
					<a id="logo" href="{{$domain}}" alt="{{$titulo}}">&nbsp;</a>
					<div id="menuButton">&#xf039;</div>
					<ul id="menu">
						<li id="login">
							{{include 'User/Header.tpl'}}
						</li>
						<li><a href="{{$domain}}/empresa/sobre" alt="Empresa">Empresa</a></li>
						<li><a href="{{$domain}}/produtos" alt="Produtos">Produtos</a></li>
						<li><a href="{{$domain}}/conhecimento" alt="Conhecimento">Conhecimento</a></li>
						<li><a href="{{$domain}}/contato" alt="Fale Conosco">Fale Conosco</a></li>
					</ul>
					<br clear="all"/>
				</div>
			</div>

			<div id="content">
