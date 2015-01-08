
/**
* 
*	Name:        DOM READY
*	Description: Função a ser executada quando o DOM da página estiver carregado
*	
*	Creation: 01/09/2014
*	Author: Douglas Zanotta
*	
*/
$(document).ready(function(){
	General.PageLoad();
});


/**
* 
*	Name:        PopStateEvent
*	Description: Evento que é disparado ao precionar o botão de voltar do navegador.
*                Utilizado quando o navegador suporta eventos de PushState.
*	
*	Creation: 11/09/2014
*	Author:   Douglas Zanotta
*
*/
window.onpopstate = function(event) {
	General.Link(document.location+'',false);
};

/**
* 
*	Name:        General
*	Description: Objeto responsável por agrupar métodos gerais do site.
*	
*	Creation: 03/09/2014
*	Author:   Douglas Zanotta
*
*/
General = {};

General.PageLoad = function(){
	// Ao precionar o botão de menu (que aparece apenas quando width < 600px), mostra/oculta o menu.
	$('#menuButton').unbind('click').click(function(e){
		$('#menu').toggleClass('active');
		e.stopPropagation();
	});

	// Inicia os eventos do side menu.
	Menu.events();

	// Ao clicar no body, oculta o menu se estiver aparecendo.
	$('body').unbind('click').click(function(){
		$('#menu').removeClass('active');
		Menu.close();
	});

	
	General.SetFooterSize();
	$(window).unbind('resize').resize(function(){
		General.SetFooterSize();
	});

	$('input').unbind('keydown').keydown(function(e){
		Forms.PressEnterEvent(this,e);
	});

	General.LinkEvents();

	$("html, body").scrollTop(0);
	$(".image-lightbox").lightbox();
};

General.SetFooterSize = function(){
	var size = $('#address').outerHeight() + $('#footer').outerHeight();
	$('#content').css('padding-bottom',size);
};

General.LinkEvents = function(){

	$('a').unbind('click').click(function(e){

		if(typeof history.pushState === 'undefined')
			return;
		
		e.preventDefault();
		var href = $(this).attr('href');
		
		// Mantem o comportamento padrão para links de email.
		if(href.substr(0,7) === 'mailto:')
			return;
		
		General.Link(href);
	});

	$('form').unbind('submit').submit(function(e){
		if(typeof history.pushState === 'undefined')
			return;

		var formAction     = $(this).attr('action');
		var formSerialized = $(this).serializeArray();
		var formData       = {};

		for(var i in formSerialized)
			formData[formSerialized[i]["name"]] = formSerialized[i]["value"];

		e.preventDefault();
		$('#loading').addClass('active');

		$.ajax({
			url: formAction,
			global: false,
			type: "POST",
			dataType: "text",
			data: formData,
			success: function(ret){
				if(formAction.indexOf('login/entrar') === -1 && formAction.indexOf('login/sair') === -1)
					history.pushState({}, formAction, formAction);
				$('#content').html(ret);
				setTimeout(function(){
					General.PageLoad();
				},1);
			},
			complete: function() {
				$('#loading').removeClass('active');
			}
		});
	});
};

General.Link = function(href,registry){
	if(typeof registry === 'undefined')
		registry = true;

	$('#loading').addClass('active');

	$.ajax({
		url: href,
		global: false,
		type: "GET",
		dataType: "text",
		success: function(ret){

			if(typeof ga == 'function'){
				var current_location = window.location.protocol + '//' + window.location.hostname + window.location.pathname + '/';
				ga('set', 'referrer', current_location);
				ga('send','pageview', href);
			}

			if(registry)
				if(href.indexOf('login/entrar') === -1 && href.indexOf('login/sair') === -1)
					history.pushState({}, href, href);

			$('#content').html(ret);

			$('#loading').removeClass('active');

			setTimeout(function(){
				General.PageLoad();

				var titulo = $('#title-bar h1').text();
				document.title = titulo.length ? ("Nelogica - "+titulo) : "Nelogica";
			},1);
		}
	});
	
};


/**
* 
*	Name:        Forms
*	Description: Objeto responsável por agrupar TODAS as funcionalidades referentes ao formulários.
*                Por "formulários", entenda como o formulário de registro, o formulário de login e o registro de newsletter
*	
*	Creation: 09/09/2014
*	Author:   Douglas Zanotta
*	
*/
Forms = {};

Forms.PressEnterEvent = function(obj,e){
	if(e.which === 13){
		var enterAction = $(obj).attr('data-enterkey') || 'tab';

		if(enterAction === 'submit')
			return true;

		if(enterAction === 'tab'){
			var elements = $('input, select, textarea, checkbox, radio');
			var index    = elements.index(obj);

			var searchForNext = true;
			while(searchForNext){
				if (index+1 < elements.length){
					if($(elements[index+1]).is(':hidden'))
						index++;
					else{
						$(elements[index+1]).focus().select();
						searchForNext = false;
					}
				}else{
					index = -1;
				}
			}

			e.preventDefault();
			return false;
		}
	}
};

Forms.trocaTipoPessoa = function(){
	if($('#input-pessoaJuridica').prop('checked')) {
		$('.show-when-pessoa-fisica .hasError').each(function(){
			Forms.resetLabel(this);
		});
		$('.show-when-pessoa-fisica').css('display','none');
		$('.show-when-pessoa-juridica').css('display','block');
	}else{
		$('.show-when-pessoa-juridica .hasError').each(function(){
			Forms.resetLabel(this);
		});
		$('.show-when-pessoa-fisica').css('display','block');
		$('.show-when-pessoa-juridica').css('display','none');
	}

	$('#input-pessoaJuridica, #input-pessoaFisica').unbind('click').click(function(){
		Forms.trocaTipoPessoa();
	});
};

Forms.ValidateCPF = function(cpf){
	if(cpf.match(/(\d)\1{10}/g) !== null)
		return false;

	var s = 0;
	var r = 0;

	for(var a=0; a<2; a++){
		s=0;
		for(i=1; i<=9+a; i++)
			s += parseInt(cpf.substring(i-1, i),10) * (11 + a - i);
		r = (s * 10) % 11;
		if(r == 10 || r == 11)
			r = 0;
		if(r != parseInt(cpf.substring(9+a, 10+a),10))
			return false;
	}
	return true;
};

Forms.empty = function(obj){
	$(obj).parents('.form-field-container').css('color','#f00').children('label').append($('<span/>').html('(Obrigatório)'));
	$(obj).addClass('hasError');
};

Forms.resetLabel = function(obj){
	$(obj).parents('.form-field-container').attr('style','').children('label').find('span').remove();
	$(obj).removeClass('hasError');
};

Forms.Validate = function(){
	$('input:not(:hidden), select:not(:hidden)').each(function(){
		$(this).focus().blur();
	});

	return $('.hasError').length === 0;
};

Forms.IsCEPSeeking = false;

Forms.LoadCEP = function(cep){
	cep = cep.replace(/[\D]/g,'');
	if(cep.length != 8)
		return;

	Forms.IsCEPSeeking = true;

	var consultAddress = SITE_DOMAIN + '/consultas/cep/'+cep;

	//  Marca os campos de endereço com uma mensagem de carregamento.
	var estado   = $("#select-estado").val();
	var endereco = $("#input-endereco").val();
	var bairro   = $("#input-bairro").val();
	var cidade   = $("#input-cidade").val();

	$("#input-endereco").attr('placeholder', 'Carregando...');
	$("#input-bairro").attr('placeholder', 'Carregando...');
	$("#input-cidade").attr('placeholder', 'Carregando...');

	return $.getJSON(consultAddress, function(ret){

		var currentFocus = $(':focus');

		if(ret.estado && estado === '')
			$("#select-estado").focus().val($("#select-estado").find("option#"+ret.estado).attr("value")).blur();

		if(ret.cidade && cidade === '')
			$("#input-cidade").focus().val(ret.cidade);

		if(ret.bairro && bairro === '')
			$("#input-bairro").focus().val(ret.bairro);

		if(ret.endereco && endereco === '')
			$("#input-endereco").focus().val(ret.endereco);

		currentFocus.focus();

		// Remove os placeholders dos campos de endereço.
		$("#input-endereco").removeAttr('placeholder');
		$("#input-bairro").removeAttr('placeholder');
		$("#input-cidade").removeAttr('placeholder');

	}).fail(function(){
		// Remove os placeholders dos campos de endereço.
		$("#input-endereco").removeAttr('placeholder');
		$("#input-bairro").removeAttr('placeholder');
		$("#input-cidade").removeAttr('placeholder');
	}).done(function(){
		Forms.IsCEPSeeking = false;
	});
};

Forms.RegistryPageLoad = function(){
	$('#form-search-cep').unbind('click').click(function(){
		window.open(
			'http://www.buscacep.correios.com.br/servicos/dnec/menuAction.do?Metodo=menuLogradouro',
			null,
			'width=680,height=500'
		);
		e.preventDefault();
		return false;
	});

	var fonemask = function(element){
		return {
			onKeyPress: function(fone){
				$(element).mask((fone.length>13) ? '(00)0 0000 0000' : '(00)0000 00009', this);
			},
			placeholder: "(__)____ ____",
			clearIfNotMatch: true
		};
	};

	$('#input-cpf').mask("000.000.000-00", {placeholder: "___.___.___-__", clearIfNotMatch: true});
	$('#input-cnpj').mask("00.000.000/0000-00", {placeholder: "__.___.___/____-__", clearIfNotMatch: true});
	$('#input-cep').mask("00000-000", {placeholder: "_____-___", clearIfNotMatch: true});
	$('#input-telefone').mask("(00)0000 00009", fonemask('#input-telefone'));
	$('#input-telefone-celular').mask("(00)0000 00009", fonemask('#input-telefone-celular'));
	$('#input-telefone-comercial').mask("(00)0000 00009", fonemask('#input-telefone-comercial'));

	// Atribui a verificação de obrigatoriedade dos campos.
	$('.form-required').unbind('blur').blur(function(){
		if($(this).val() === '')
			Forms.empty(this);
	}).unbind('focus').focus(function(){
		Forms.resetLabel(this);
	});

	// Define a validação do campo cpf. Note que ele sobrescreverá a validação de obrigatoriedade.
	$('#input-cpf').unbind('blur').blur(function(){
		if($(this).val() === '')
			Forms.empty(this);
		else if(!Forms.ValidateCPF($(this).val().replace(/\D/g,''))){
			$(this).parents('.form-field-container').css('color','#f00').children('label').append($('<span/>').html('(CPF Inválido)'));
			$(this).addClass('hasError');
		}else{
			Forms.resetLabel(this);
		}
	});

	// Define a validação dos campos de data. Note que ele sobrescreverá a validação de obrigatoriedade.
	$('#select-dia, #select-mes, #select-ano').unbind('blur').blur(function(){
		if($('#select-dia').val() === '' || $('#select-mes').val() === '' || $('#select-ano').val() === '')
			Forms.empty(this);
	});

	// Define a validação do campo email. Note que ele sobrescreverá a validação de obrigatoriedade.
	$('#input-email').unbind('blur').blur(function(){
		if($(this).val() === '')
			Forms.empty(this);
		else if($(this).val().match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i) === null){
			$(this).parents('.form-field-container').css('color','#f00').children('label').append($('<span/>').html('(Email Inválido)'));
			$(this).addClass('hasError');
		}else{
			Forms.resetLabel(this);
		}
	});

	// Define a validação do campo email. Note que ele sobrescreverá a validação de obrigatoriedade.
	$('#input-senha, #input-senha-confirmacao').unbind('blur').blur(function(){
		if($('#input-senha').val() === '' || $('#input-senha-confirmacao').val() === ''){
			Forms.resetLabel('#input-senha');
			Forms.empty('#input-senha');
		}else if($('#input-senha').val() !== $('#input-senha-confirmacao').val()){
			$('#input-senha').parents('.form-field-container').children('label').find('span').remove();
			$('#input-senha').parents('.form-field-container').css('color','#f00').children('label').append($('<span/>').html('(As senhas não conferem)'));
			$('#input-senha').addClass('hasError');
		}else{
			Forms.resetLabel('#input-senha');
		}
	});

	$('#input-cep').unbind('blur').blur(function(){
		if($(this).val() === '')
			Forms.empty(this);
		else{
			$('#input-senha, #input-senha-confirmacao').parents('.form-field-container').attr('style','').children('label').find('span').remove();
			$('#input-senha, #input-senha-confirmacao').removeClass('hasError');
			Forms.LoadCEP($(this).val());
		}
	});

	$('#login-register-submit').unbind('click').click(function(e){
		e.preventDefault();

		var self = this;

		if(Forms.Validate())
			var loop = setInterval(function(){
				if(Forms.IsCEPSeeking)
					return;
				clearInterval(loop);
				$(self).eq(0).submit();
			},300);
		else{
			$('.hasError:not(:hidden)').eq(0).focus().select();
		}
		
	});

	Forms.trocaTipoPessoa();
};

/**
* 
*	Name:        Contact
*	Description: Objeto responsável por agrupar  as funcionalidades referentes ao envio de email.                
*	
*	Creation: 13/11/2014
*	Author:   Daniela Almeida
*
*/
Contact = {};

Contact.VerificaCampos = function(){

	$(document).ready(function(){
		var err = 0;
		
		$("input , select, textarea").blur(function(){
			if($(this).val() === '')
				$(this).prev().css({"color":"#f00"}).append($('<span/>').html('(Obrigatório)'));
			}).unbind('focus').focus(function(){
				$(this).prev().css({"color":"#003366"}).find('span').remove();
		});

		$('#email').blur(function(){
			if(($('#email').val().match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i) === null)&&($('#email').val()!=='')){
				$('#email').prev().css({"color":"#f00"}).append($('<span/>').html('(Email Inválido)'));
				err=1;
			}
			else err=0;
			}).unbind('focus').focus(function(){
				$(this).prev().css({"color":"#003366"}).find('span').remove();
		});

		$('#button-enviar').click(function(e){
			e.preventDefault();
			$('label').prev().css({"color":"#003366"}).find('span').remove();
			var cont = 0;

			$("input , select, textarea").each(function(){
				if($(this).val() === ''){
					$(this).prev().css({"color":"#f00"}).append($('<span/>').html('(Este campo não pode estar vazio)'));
					cont++;
				}
			});
			if(err === 1)
				$('#email').prev().css({"color":"#f00"}).append($('<span/>').html('(Este campo deve ser preenchido com um e-mail válido)'));

			if(cont === 0 && err === 0)
				$("#button-enviar").submit();
			else{
				$('#mensagem-erro-email').css('display','block');
			}
		});
	});
};




/**
* 
*	Name:        Newsletter
*	Description: Objeto responsável por agrupar  as funcionalidades referentes ao newsletter                
*	
*	Creation: 14/11/2014
*	Author:   Daniela Almeida
*
*/
newsletter = {};

newsletter.VerificaEmail = function(){

	$(document).ready(function(){			
		$('#newsletter-send').click(function(e){
			e.preventDefault();
			if($('#newsletter-email').val().match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i) === null){
				alert ("Prencha corretamente o e-mail");
			}else{
				$.ajax({
					url: '/newsletter',
					global: false,
					type: "POST",
					dataType: "text",
					data: { 
						"newsletter-email":$('#newsletter-email').val(),
						"newsletter-action-register":($('#newsletter-action-register').prop('checked') ? "cadastrar": "descadastrar")
					},
					success: function(ret){
						alert(ret);
					}
				});
			}
		});	
	}); 
}; 



/**
* 
*	Name:        Newsletter
*	Description: Objeto responsável por agrupar  as funcionalidades referentes ao newsletter                
*	
*	Creation: 14/11/2014
*	Author:   Daniela Almeida
*
*/
assinatura = {};

assinatura.nextStep = function(){
	$('#buy-continue').click(function(e){
		$('#buy-continue-link').click();
	});
};




/**
* 
*	Name:        Menu
*	Description: Determina o comportamento dos menus laterais para versão mobile.
*	
*	Creation:    25/11/2014
*	Author:      Moacir T. Souza
*	
*/
Menu = {};

Menu.events = function(){

	$('#menu-anchor').unbind('click').click(function(e){
		$('.sidemenu').toggleClass('show-menu');
		e.stopPropagation();
	});
};

Menu.close = function(){
	$('.sidemenu').removeClass('show-menu');
}


/**
* 
*	Name:        Esqueci minha senha
*	Description: Objeto responsável por agrupar  as funcionalidades referentes ao esqueci minha senha                
*	
*	Creation: 01/12/2014
*	Author:   Daniela Almeida
*
*/

RecuperarSenha = {};

RecuperarSenha.VerificaEmail = function(){
	
	$(document).ready(function(){
		$('#button-recuperar').click(function(e){
			e.preventDefault();
			if($('#email').val().match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i) === null)
				$('#mensagem-erro-email').css('display','block');
			else
				$('#button-recuperar').submit();
		});
	});
};




/**************************/
/*        PLUGINS         */
/**************************/
(function($) {
	$.fn.lightbox = function() {
		return this.each(function(){
			$(this).click(function(e){
				e.preventDefault();

				var fundo     = $('<div />').addClass('lightbox-background');
				var container = $('<div />').addClass('lightbox-container');
				var img       = $('<img />').attr('src',$(this).attr('src')).addClass('lightbox-image');
				var close     = $('<div />').html('&nbsp;').addClass('lightbox-close').html('&#xf00d;');

				fundo.click(function(e){
					e.preventDefault();
					fundo.remove();
					img.remove();
					close.remove();
					container.remove();
				});

				close.click(function(e){
					e.preventDefault();
					fundo.click();
				});

				container.append(img);
				container.append(close);
				$('body').append(fundo);
				$('body').append(container);

				var ratio = img.outerHeight()/img.outerWidth();

				if(img.outerHeight() > fundo.outerHeight()*0.9){
					var h = fundo.outerHeight()*0.9;
					img.css('height',h);
					img.css('width',h/ratio);

				}
				if(img.outerWidth() > fundo.outerWidth()*0.9){
					var w = fundo.outerWidth()*0.9;
					img.css('width',w);
					img.css('height',w*ratio);
				}
			});

		});
	};
}(jQuery));