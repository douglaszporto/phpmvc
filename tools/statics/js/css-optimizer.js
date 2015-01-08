$(document).ready(function(){

	// Ao clicar em algum dos itens na lista...
	$('.list').click(function(){

		var id = $(this).attr('id');

		// Se o item tem a classe 'seleceted', remove-a. Caso contrário, adiciona-a.
		$(this).toggleClass('selected');

		// Procua na div de resultado por um elemento com o atributo ID iqual ao do item clicado
		var toRemove = $('#files-to-optimize').find('#'+id+"_");

		// Se achar, significa que tenho que remove este elemento da lista de selecionados.
		if(toRemove.length > 0) {
			toRemove.remove();
			// Não posso deixar a div vazia, então, se isso for acontecer, coloco um espaço em branco (&nbsp;)
			if($('#files-to-optimize').find('div').length === 0)
				$('#files-to-optimize').html('&nbsp;');
		} else {
			// Se o item clicado não estava selecionado, crio um outro elemento dentro do container de resultado e
			// coloco uma div com o mesmo ID (apenas com um '_', no final) e com o conteúdo como o nome do arquivo.
			var i = $('<div />').attr('id',id+'_').html($(this).text());
			$('#files-to-optimize').append(i);
		}
	});

	// Quando clicar no botão de analizar...
	$('#button-analyze').click(function(){

		// Senao há arquivos selecionados, avisa.
		if($('#files-to-optimize').find('div').length === 0){
			showMessage('Você não selecionou nenhum arquivo para analisar...');
			return;
		}

		// Cria dinamicamente o form que será submetido.
		// Note que o valor que chagará no servidor para a variável extra será result.
		var f = $('<form />').attr('method','post').attr('action',SITE_DOMAIN + '/tools/css-optimizer/result');
		var i = $('<input />').attr('type','text').attr('name','files-to-optimize');

		// Para cada div dentro do container de resultado, adiciona o valor no vetor files.
		var files = [];
		$('#files-to-optimize').find('div').each(function(){
			files.push($(this).text());
		});

		// Coloca os nomes dos arquivos, separados por '**' e submete esta valor para o servidor.
		i.attr('value',files.join('**'));
		f.append(i);
		f.eq(0).submit();
	});
});