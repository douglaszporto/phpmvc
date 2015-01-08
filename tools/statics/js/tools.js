$(document).ready(function(){
});





window.showMessage = function(msg){
	var back    = $('<div />').attr('id','message-background');
	var content = $('<div />').attr('id','message-content');
	var message = $('<div />').attr('id','message-value').html(msg);
	var button  = $('<div />').attr('id','message-ok').html('Ok');

	back.click(function(){
		button.click();
	});

	button.click(function(){
		back.css('opacity','0');
		content.css('opacity','0');
		var delay = parseFloat(back.css('transition-duration'))*1000;
		setTimeout(function(){
			back.remove();
			content.remove();
		},delay);
	});

	content.append(message);
	content.append(button);
	$('body').append(back);
	$('body').append(content);

	setTimeout(function(){
		back.css('opacity',1);
		content.css('opacity',1);
	},10);
};

window.showConfirm = function(msg,callback){
	var back    = $('<div />').attr('id','confirm-background');
	var content = $('<div />').attr('id','confirm-content');
	var message = $('<div />').attr('id','confirm-value').html(msg);
	var yes     = $('<div />').attr('id','confirm-yes').html('Sim');
	var no      = $('<div />').attr('id','confirm-no').html('Não');

	back.click(function(){
		no.click();
	});

	no.click(function(){
		back.css('opacity','0');
		content.css('opacity','0');
		var delay = parseFloat(back.css('transition-duration'))*1000;
		setTimeout(function(){
			back.remove();
			content.remove();
		},delay);
	});

	yes.click(function(){
		no.click();
		callback();
	});

	content.append(message);
	content.append(yes);
	content.append(no);
	$('body').append(back);
	$('body').append(content);

	setTimeout(function(){
		back.css('opacity',1);
		content.css('opacity',1);
	},10);
};


window.showForm = function(url,data,callback){
	var back      = $('<div />').attr('id','form-background');
	var content   = $('<div />').attr('id','form-content');
	var form      = $('<div />').attr('id','form-form').html('&nbsp;');
	var loading   = $('<div />').attr('id','form-loading').html('&nbsp;');
	var btnOk     = $('<div />').attr('id','form-ok').html('Ok');
	var btnCancel = $('<div />').attr('id','form-cancel').html('Cancelar');

	if(typeof data != 'object'){
		var d = {};
		for(var i in data)
			d[i] = data[i];
		data = d;
	}

	if (data.lenght < 1)
		data = {};

	back.click(function(){
		btnCancel.click();
	});

	btnCancel.click(function(){
		back.css('opacity','0');
		content.css('opacity','0');
		var delay = parseFloat(back.css('transition-duration'))*1000;
		setTimeout(function(){
			back.remove();
			content.remove();
		},delay);
	});

	btnOk.click(function(){

		if($('.form-submiter').attr('data-form-action') === '')
			btnCancel.click();
		var data = {};
		$('.form-submiter').find('input, select, textarea').each(function(){
			if($(this).attr('type') == 'checkbox')
				data[$(this).attr('name') || $(this).attr('id')] = $(this).is(':checked') ? '1' : '0';
			else
				data[$(this).attr('name') || $(this).attr('id')] = $(this).val();
		});

		form.css({'transition-delay':'0','opacity':0});
		loading.css({'opacity':1,'z-index':0});
		btnOk.animate({'opacity':0},{'duration':300,'complete':function(){
			btnOk.css('display','none');

			$.ajax({
				url: SITE_DOMAIN + $('.form-submiter').attr('data-form-action'),
				global: false,
				data: data,
				type: "POST",
				dataType: "json",
				success: function(d){
					if(d.status == '200'){
						btnCancel.click();
						document.location.reload();
					}else{
						form.css({'transition-delay':'.3s','opacity':1});
						loading.css({'opacity':0,'z-index':-1});
						btnOk.css('display','block').animate({'opacity':1},{'duration':300});
						showMessage(d.message);
					}
				}
			});
		}});
		
	});

	content.append(form);
	content.append(btnOk);
	content.append(btnCancel);
	content.append(loading);
	$('body').append(back);
	$('body').append(content);

	$.ajax({
		url: url,
		global: false,
		data: data,
		type: "POST",
		dataType: "html",
		success: function(d){
			var fakeContent = $('<div />').attr('id','form-fake');
			fakeContent.html(d);
			$('body').append(fakeContent);

			setTimeout(function(){
				var height = fakeContent.outerHeight();
				var width  = fakeContent.outerWidth();

				content.css({
					'height':height + 70,
					'width':width,
					'margin-left':-Math.max(width/2,200),
					'margin-top':-Math.max((height+70)/2,50)
				});
				form.css({'opacity':1}).html(d);

				fakeContent.remove();
				loading.css({'opacity':0,'z-index':-1});

				if(typeof callback == 'function')
					setTimeout(function(){
						callback();
					},2);
			},1);

			form.html(d);
		}
	});

	setTimeout(function(){
		back.css('opacity',1);
		content.css('opacity',1);
	},1);
};



(function($){

    $.fn.TextEditor = function(options) {
		if(options === 'refresh'){
			return this.each(function(){
				$(this).html($(this).prev().find('.texteditor-element').html());
			});
		}

		if(options === 'get'){
			return this.each(function(){
				var content = $(this).html();
				$(this).prev().find('.texteditor-element').html(content);
			});
		}

		var settings = $.extend({
			bold      : true,
			italic    : true,
			underline : true,
			ul        : true,
			ol        : true,
			header1   : true,
			header2   : true,
			image     : true,
		},options);

		return this.each(function() {
			var editor    = $('<div />').addClass('texteditor-element').attr('contenteditable','true');
			var opbar     = $('<div />').addClass('texteditor-opbar');
			var container = $('<div />').addClass('texteditor-container');

			if(settings.bold){
				var bold = $('<button />').addClass('texteditor-button').html('&#xe06f;').attr('title','Negrito');
				bold.click(function(){
					document.execCommand('bold',false,null);
				});
				opbar.append(bold);
			}
			if(settings.italic){
				var italic = $('<button />').addClass('texteditor-button').html('&#xe0b2;').attr('title','Itálico');
				italic.click(function(){
					document.execCommand('italic',false,null);
				});
				opbar.append(italic);
			}
			if(settings.underline){
				var underline = $('<button />').addClass('texteditor-button').html('&#xe15a;').attr('title','Sublinhado');
				underline.click(function(){
					document.execCommand('underline',false,null);
				});
				opbar.append(underline);
			}
			if(settings.ol){
				var ol = $('<button />').addClass('texteditor-button').html('&#xe003;').attr('title','Lista Ordenada');
				ol.click(function(){
					document.execCommand("insertOrderedList");
				});
				opbar.append(ol);
			}
			if(settings.ul){
				var ul = $('<button />').addClass('texteditor-button').html('&#xe004;').attr('title','Lista Não-Ordenada');
				ul.click(function(){
					document.execCommand("insertUnorderedList");
				});
				opbar.append(ul);
			}
			if(settings.header1){
				var header1 = $('<button />').addClass('texteditor-button').html('&#xe20b;').attr('title','Título principal');
				header1.click(function(){
					document.execCommand("insertHtml",false,"<h2>Título da Página</h2>");
				});
				opbar.append(header1);
			}
			if(settings.header2){
				var header2 = $('<button />').addClass('texteditor-button').html('&#xe20b;').css('font-size',10).attr('title','Subtítulo');
				header2.click(function(){
					document.execCommand("insertHtml",false,"<h3>Subtítulo</h2>");
				});
				opbar.append(header2);
			}
			if(settings.image){
				var image  = $('<button />').addClass('texteditor-button').html('&#xe0e8;').attr('title','Subtítulo');
				var iframe = $('<iframe />').attr('src',SITE_DOMAIN + '/tools/ajax/image-upload?call='+$(this).attr('id')).css({'position':'absolute','margin-left':'-30px','opacity':'0.01','overflow':'hidden','width':'30px','height':'30px'});
				var doc    = document;
				iframe.mouseenter(function(){
					image.css('background-color','#bababa');
				});
				iframe.mouseleave(function(){
					image.css('background-color','#e0e0e0');
				});
				window.AddImageContainer = function(origin,img){
					if(origin != 'miniatura-update'){
						path = img.split(/[\\\/]/);
						img  = path[path.length-1].replace(' ','_').replace('.','_').replace('-','_');
						$('#'+origin).prev().find('.texteditor-element').append("<div class='image' id='image_"+img+"' contenteditable='false'>&nbsp;</div>");
					}
				};
				window.ErrorOnImageUpload = function(err){
					console.log(err);
				};
				window.LoadImageUpload = function(origin,element,file){
					if(origin === 'miniatura-update'){
						$('#miniatura_url').attr('src',SITE_DOMAIN+file);
						$('#input-miniatura').val(SITE_DOMAIN+file);
						showMessage('Miniatura atualizada com sucesso');
					}else
						$('#image_'+element).after('<img src="'+SITE_DOMAIN+file+'" height=200 width="auto" />').remove();
				};
				opbar.append(image);
				opbar.append(iframe);
			}

			var w = $(this).outerWidth();
			var h = $(this).outerHeight();

			editor.css({
				'width' :w,
				'height':h
			});

			container.append(opbar);
			container.append(editor);

			$(this).before(container).css({'display':'none'});
		});
	};
 
}(jQuery));