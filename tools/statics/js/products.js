$(document).ready(function(){
	$('.product-edit').click(function(e){
		window.showForm(SITE_DOMAIN + '/tools/ajax/products-details', {'product' : $(this).parent().attr('data-form') || ''});
	});

	$('.product-add').click(function(e){
		window.showForm(SITE_DOMAIN + '/tools/ajax/products-details');
	});

	$('.product-remove').click(function(){
		var self = this;
		window.showConfirm('Deseja realmente remover o produto?',function(){
			$.ajax({
				url: SITE_DOMAIN + '/tools/ajax/products-remove/',
				global: false,
				data: {'product' : $(self).parent().attr('data-form') || ''},
				type: "POST",
				dataType: "json",
				success: function(d){
					if(d.status == '200'){
						document.location.reload();
					}else{
						showMessage(d.message);
					}
				}
			});
		});
	});

	$('.product-features').click(function(e){
		window.showForm(SITE_DOMAIN + '/tools/ajax/products-features', {'product' : $(this).parent().attr('data-form') || ''},function(){
			Features.bindEvents();
		});
	});

});

var Features = {};

Features.modified = false;

Features.bindItemEvents = function(){
	$('.product-feature-item').unbind('click').click(function(){
		var self = this;
		if(Features.modified)
			showConfirm("Há dados não salvos nesta caracterísica. Deseja realmente sair?",function(){
				Features.changeSelectedFeature(self);
			});
		else
			Features.changeSelectedFeature(self);
		
	});
};

Features.bindEvents = function(){
	$('.product-feature-form input, .product-feature-form textarea').change(function(){
		Features.modified = true;
	});

	Features.bindItemEvents();

	$('.product-feature-new-item').click(function(){
		if(Features.modified)
			showConfirm("Há dados não salvos nesta caracterísica. Deseja realmente sair?",function(){
				Features.clearFeature();
			});
		else
			Features.clearFeature();
	});

	$('#input-texto').TextEditor();
	$('#input-descricao').TextEditor({
		'ul'      : false,
		'ol'      : false,
		'image'   : false,
		'header1' : false,
		'header2' : false
	});

	$('#miniatura-view').click(function(){
		$('#miniatura_url').parent().css({'bottom':'50%','right':'50%','opacity':'1'});
	});

	$('#close-mini').click(function(){
		$('#miniatura_url').parent().css({'opacity':'0'});
	});

	$('#input-titulo').keyup(function(){
		$('#input-identificador').val($(this).val().replace(/\s+/g,'-').replace(/[^0-9A-Za-z\-]/g,'').toLowerCase());
	});
	

	$('.product-feature-save').click(function(){

		$('#input-texto').TextEditor('refresh');
		$('#input-descricao').TextEditor('refresh');

		var error = '';
		if($('#input-titulo').val() === ''){
			error += 'Você não preencheu o Títiulo<br/>';
			$('#input-titulo').css('border-color','#f00');
		}else{
			$('#input-titulo').css('border-color','#cacaca');
		}
		if($('#input-identificador').val() === ''){
			error += 'Você não preencheu o Identificador<br/>';
			$('#input-identificador').css('border-color','#f00');
		}else{
			$('#input-identificador').css('border-color','#cacaca');
		}
		if($('#input-descricao').val() === ''){
			error += 'Você não preencheu a Descrição<br/>';
			$('#input-descricao').css('border-color','#f00');
		}else{
			$('#input-descricao').css('border-color','#cacaca');
		}
		if($('#input-texto').val() === ''){
			error += 'Você não preencheu o Texto<br/>';
			$('#input-texto').css('border-color','#f00');
		}else{
			$('#input-texto').css('border-color','#cacaca');
		}
		
		if(error !== ''){
			showMessage(error);
			return;
		}

		$('.product-feature-item-selected').addClass('product-feature-item-loading');

		$.ajax({
			url: SITE_DOMAIN + '/tools/ajax/products-features-update/',
			global: false,
			data: {
				'id'            : $('#input-id').val() || 0,
				'produto_id'    : $('#input-produto-id').val() || '',
				'titulo'        : $('#input-titulo').val() || '',
				'identificador' : $('#input-identificador').val() || '',
				'descricao'     : $('#input-descricao').val() || '',
				'texto'         : $('#input-texto').val() || '',
				'miniatura'     : $('#input-miniatura').val() || ''
			},
			type: "POST",
			dataType: "json",
			success: function(d){
				$('.product-feature-item-loading').removeClass('product-feature-item-loading');

				if(d.status != '200'){
					showMessage(d.message);
					return;
				}

				Features.modified = false;
				if(d.action == 'I'){
					$('.product-feature-new-item').removeClass('product-feature-item-selected');
					$('.product-feature-new-item').before('<div class="product-feature-item product-feature-item-selected"><input type="hidden" value="'+d.id+'">'+$('#input-titulo').val()+'</div>');
					Features.bindItemEvents();
					$('#input-id').val(d.id);
				}

				showMessage("Caracterísica "+(d.action == 'I' ? 'inserida' : 'atualizada')+" com sucesso.");
			}
		});

		
	});

	$('.product-feature-remove').click(function(){
		if($('.product-feature-item-selected').hasClass('product-feature-new-item'))
			return;

		showConfirm("Deseja realmente remover esta característica?<br/>Seus dados não poderão ser recuparados",function(){
			$('.product-feature-item-selected').addClass('.product-feature-item-loading');


			$.ajax({
				url: SITE_DOMAIN + '/tools/ajax/products-features-remove/',
				global: false,
				data: {
					'id' : $('.product-feature-item-selected').find('input').val() || 0,
				},
				type: "POST",
				dataType: "json",
				success: function(d){

					if(d.status != '200'){
						showMessage(d.message);
						return;
					}

					$('.product-feature-item-selected').animate({'height':0,'opacity':0},{'duration':200,'complete':function(){
						$(this).remove();
					}});

					showMessage("Caracterísica removida com sucesso.");
					Features.clearFeature();
				}
			});
		});
	});
};

Features.clearFeature = function(){
	$('#input-id').val(0);
	$('#input-titulo').val('');
	$('#input-identificador').val('');
	$('#input-descricao').html('');
	$('#input-texto').html('');

	$('#input-texto').TextEditor('get');
			$('#input-descricao').TextEditor('get');

	$('.product-feature-item-selected').removeClass('product-feature-item-selected');
	$('.product-feature-new-item').addClass('product-feature-item-selected');

	Features.modified = false;
};

Features.changeSelectedFeature = function(elem){
	$('.product-feature-item-loading').removeClass('product-feature-item-loading');
	$('.product-feature-item-selected').removeClass('product-feature-item-selected');
	$(elem).addClass('product-feature-item-loading');

	Features.modified = false;

	var self = elem;

	$.ajax({
		url: SITE_DOMAIN + '/tools/ajax/products-features-details/',
		global: false,
		data: {'feature' : $(self).children('input').val() || ''},
		type: "POST",
		dataType: "json",
		success: function(d){
			$(self).removeClass('product-feature-item-loading');
			if(d.status != '200'){
				showMessage(d.message);
				return;
			}
			$(self).addClass('product-feature-item-selected');

			$('#input-id').val(d.id || '');
			$('#input-titulo').val(d.titulo || '');
			$('#input-identificador').val(d.identificador || '');
			$('#input-descricao').html('').append(d.descricao || '');
			$('#input-texto').html('').append(d.texto || '');
			$('#input-miniatura').val(d.miniatura || '');

			$('#miniatura_url').attr('src',d.miniatura !== '' ? d.miniatura : SITE_DOMAIN+'/tools/statics/images/no-mini.jpg');

			$('#input-texto').TextEditor('get');
			$('#input-descricao').TextEditor('get');
		}
	});
};