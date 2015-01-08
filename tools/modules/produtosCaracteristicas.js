define([], function(){
	return {
		name     : "produtosCaracteristicas",
		template : "grid.html",
		data     : "api/grid/produtosCaracteristicas",
		init     : function(){
			console.log('Carregada as caracteristicas do produto');
		}
	};
});