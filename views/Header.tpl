<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="content-language" content="pt-br" />
		<meta http-equiv="content-style-type" content="text/css" />
		<meta name="title" content="{{$titulo}}" />
		<meta name="author" content="Seu Nome" />
		<meta name="language" content="Portuguese" />
		<meta name="description" content="Uma descrição da sua página" />
		<meta name="keywords" content="php, mvc" />
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

				ga('create', 'UA-XXXXXXXX-X', 'auto');
				ga('send', 'pageview');

			</script>
		{{else}}
			<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" type="text/css" href="{{$domain}}/statics/css/small.css?v={{$version}}" media="all"/>
			<link rel="stylesheet" type="text/css" href="{{$domain}}/statics/css/medium.css?v={{$version}}" media="all and (min-width: 600px)"/>
			<link rel="stylesheet" type="text/css" href="{{$domain}}/statics/css/large.css?v={{$version}}" media="all and (min-width: 1000px)"/>
			<link rel="stylesheet" type="text/css" href="{{$domain}}/statics/css/extra.css?v={{$version}}"/>
		{{/if}}


	</head>
	<body>
		<div>Aqui vai o seu cabeçalho</div>
