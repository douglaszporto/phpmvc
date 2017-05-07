<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="content-language" content="{{$site_lang}}" />
		<meta http-equiv="content-style-type" content="text/css" />
		<meta name="title" content="{{$site_title}}" />
		<meta name="author" content="{{$site_developer}}" />
		<meta name="language" content="{{$site_language}}" />
		<meta name="description" content="{{$site_language}}" />
		<meta name="keywords" content="{{$site_headtitle}}" />
		<meta name="rating" content="general" />
		<meta name="robots" content="index, follow" />
		<meta name="revisit-after" content="20 days" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="format-detection" content="telephone=no" />

		<title><?php echo $site_head_title; ?></title>
		<!-- face book opengraph -->
		<meta property="og:type" content="{{$facebook_type}}">
		<meta property="og:title" content="{{$facebook_title}}">
		<meta property="og:description" content="{{$facebook_description}}">
		<meta property="og:url" content="{{$facebook_site}}">
		<meta property="og:image" content="{{$facebook_logo}}">
		<meta property="fb:app_id" content="{{$facebook_appid}}">
		<meta property="business:contact_data:street_address" content="{{$site_addressstreet}}">
		<meta property="business:contact_data:locality" content="{{$site_addresslocality}}">
		<meta property="business:contact_data:region" content="{{$site_addressregion}}">
		<meta property="business:contact_data:postal_code" content="{{$site_addresspostalcode}}">
		<meta property="business:contact_data:country_name" content="{{$site_addresscountryname}}">
		<meta property="business:contact_data:email" content="{{$site_email}}">
		<meta property="business:contact_data:phone_number" content="{{$site_phone}}">
		<meta property="business:contact_data:website" content="{{$domain}}">
		<meta property="place:location:latitude" content="{{$site_geolatitude}}">
		<meta property="place:location:longitude" content="{{$site_geolongitude}}">

		<title>{{$site_title}}</title>

		<link rel="icon" href="{{$domain}}/statics/images/favicon.ico?v={{$version}}" />

		{{if $siteProduction}}
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				ga('create', '{{$site_googleanalyticsid}}', 'auto');
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
		<div id="header">
			<div id="header-wrapper">
				<img src="{{$domain}}/statics/img/logo.png" alt="Logo">
				<div id="header-phone">Call us on <span class="bold">{{$site_phone}}</span></div>
				<nav id="header-page-nav">
					<a href="#">Home</a>
					<a href="#">Repairs</a>
				</nav>
				<nav id="header-login-nav">
					<a href="#">Login</a>
					<a href="#">Register</a>
				</nav>
			</div>
		</div>
		<div id="content"> <!-- Closed at Footer.tpl -->