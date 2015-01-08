$(document).ready(function(){

	// Monta os input de data.
	$("#input-date-start, #input-date-end").datepicker({
		'dateFormat'     : 'dd/mm/yy',
		'dayNames'       : ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		'dayNamesMin'    : ['D','S','T','Q','Q','S','S','D'],
		'dayNamesShort'  : ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		'monthNames'     : ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		'monthNamesShort': ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		'nextText'       : 'Próximo',
		'prevText'       : 'Anterior'
	});

	// Faz o submit para mostrar o logo de Queries
	$('#button-view-querylogs').click(function(){
		$('#input-mode').val('query');
		$('#form-logs').eq(0).submit();
	});

	// Faz o submit para mostrar o logo de Queries
	$('#button-view-accesslogs').click(function(){
		$('#input-mode').val('access');
		$('#form-logs').eq(0).submit();
	});
});