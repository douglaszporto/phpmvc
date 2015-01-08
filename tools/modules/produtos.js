define([], function(){
	return {
		name     : "produtos",
		template : "grid.html",
		data     : "api/grid/produtos",
		init     : function(){
			//console.log('Carregada o controller Produto');
		}
	};
});