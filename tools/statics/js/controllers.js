app.controller('LoginCtrl',['$scope', 'LoginService', function($scope,LoginService){
	$scope.credentials = {
		"user" : "",
		"pass" : ""
	};

	$scope.login = function(){
		LoginService.login($scope.credentials);
	};
}]);



app.controller('MainCtrl',['$scope', '$timeout', '$http', 'LoginService', 'MenuService', function($scope, $timeout, $http, LoginService, MenuService){

	$scope.data                          = {};
	$scope.extraData                     = '';
	$scope.templateData                  = {};
	$scope.templateScope                 = {};
	$scope.selectedItems                 = [];
	$scope.templateData["operationOver"] = "";
	$scope.menuItems                     = MenuService.itensMenu;
	$scope.loadingView                   = 0;
	$scope.loadingRunning                = 0;

	$scope.confirm = {
		display: false,
		cssdisplay: false, // utilizada para controle da proprieada display:none na animação de entrada/saída.
		type : 'none',
		title : 'Remover',
		message: '',
		buttons: [
			{
				enable : true,
				label  : 'Sim',
				color  : '#f00',
				action : 'this.confirmYes()'
			},
			{
				enable : true,
				label  : 'Não',
				color  : '#333',
				action : 'this.confirmNo()'
			}
		],
		mouseEvent: {}
	};

	$scope.form = {
		display: false,
		cssdisplay: false, // utilizada para controle da proprieada display:none na animação de entrada/saída.
		title: 'Adicionar',
		message: "",
		messageType: "E",
		showMessage: false,
		activeTab: '',
		validationError: {},
		inferencesVisibility: {},
		inferencesEditability: {},
		inferencesValue: {},
		isInvalid: [],
		content: [],
		data: {}
	};

	$scope.eval = window.eval;




	$scope.$watch(function(){
		return MenuService.itensMenu;
	},function(){
		$scope.menuItems = MenuService.itensMenu;
	});




	$scope.logout = function(){
		LoginService.logout();
	};

	$scope.home = function(){
		$scope.data = {};
		$scope.data["template"] = "index.html";
		$scope.templateScope = {};
	};

	$scope.toggleSelectedItem = function(item){
		var index = $scope.selectedItems.indexOf(item);
		if(index === -1)
			$scope.selectedItems.push(item);
		else
			$scope.selectedItems.splice(index,1);
	};

	$scope.isSelected = function(id){
		return $scope.selectedItems.indexOf(id);
	};

	$scope.checkOpVisibility = function(visibility){
		if((visibility & 1) && $scope.selectedItems.length === 0)
			return false;

		if((visibility & 2) && $scope.selectedItems.length == 1)
			return false;

		if((visibility & 4) && $scope.selectedItems.length > 1)
			return false;

		return true;
	};

	$scope.action = function(module){
		require(['modules/'+module], function(CtrlLoaded){
			$scope.$apply(function(){
				$scope.data = CtrlLoaded;

				if(typeof $scope.data.init == 'function')
					$scope.data.init();
			});
		});
	};

	$scope.execAction = function(action,event){
		$scope.confirm.mouseEvent = event;
		var act = new Function(action);
		act.apply($scope);
	};

	$scope.confirmNo = function(){
		$scope.confirm.display = false;
		$timeout(function(){
			$scope.confirm.cssdisplay = false;
		},400);
	};

	$scope.loadModule = function(module){
		$scope.action(module);
	};

	$scope.callRemoveMethod = function(){
		var selectedExpression;

		selectedExpression        = $scope.selectedItems.length == 1 ? ' o registro selecionado?' : ('os ' + $scope.selectedItems.length + ' registros selecionados?');
		$scope.confirm.title      = "Excluir";
		$scope.confirm.message    = "Tem certeza que deseja excluir " + selectedExpression;
		$scope.confirm.cssdisplay = true;

		$scope.confirm.buttons[0].action = 'this.sendRemoveRequest()';

		$timeout(function(){
			$scope.confirm.display = true;
		},1);
	};

	$scope.callAddMethod = function(){
		$scope.form.title = "Adicionar";
		$scope.form.type  = "insert";
		$scope.form.key   = null;
		
		$scope.callFormMethod();
	};

	$scope.callEditMethod = function(){
		$scope.form.title = "Editar";
		$scope.form.type  = "update";
		$scope.form.key   = 1;
		
		$scope.callFormMethod();
	};

	$scope.sendRemoveRequest = function(){

		$scope.displayLoading();

		$http.post(api_url + 'delete/' + $scope.data.name, {'ids':$scope.selectedItems.join(',')}).success(function(ret){
			$scope.hideLoading();
			if(ret.ok === '1'){
				var messagePlural = $scope.selectedItems.length !== 1 ? 'registros removidos' : 'registro removido';
				$scope.confirm.display = false;
				$scope.displayMessage("Ok, " + messagePlural + " com sucesso ;)", 'S');
				$timeout(function(){
					$scope.selectedItems = [];
					$scope.confirm.cssdisplay = false;
					$scope.forceGridUpdate();
				},400);
			}else{
				$scope.displayMessage(ret.message,'E');
			}
		});
	};

	$scope.callFormMethod = function(){

		var config = {};

		if($scope.form.key !== null)
			config = {
				'params' : {
					'id' : $scope.selectedItems[0]
				}
			};

		$scope.displayLoading();

		$http.get(api_url + $scope.form.type + '/' + $scope.data.name, config).success(function(ret){

			$scope.hideLoading();
			$scope.form.cssdisplay = true;
			$timeout(function(){
				$scope.form.display = true;
			},1);

			if(typeof ret.form === 'undefined')
				return;

			var content = JSON.parse(ret.form) || [];
			var tabs    = {};

			if($scope.form.activeTab === '' && typeof content[0].tab !== 'undefined')
				$scope.form.activeTab = content[0].tab;

			for(var i in content){
				var fieldName = content[i]["name"] || '_';
				$scope.form.data[fieldName] = content[i]["value"];

				if(typeof content[i]["affected"] !== 'undefined'){
					var inf = JSON.parse(content[i]["affected"]);
					for(var a in inf.affectedBy)
						switch(inf.type){
							case 0: //INFERENCE_TYPE_VALUE
								$scope.form.inferencesValue[inf.affectedBy[a]] = {'expression':inf.expression,'target':content[i]["name"]};
								break;
							case 1: //INFERENCE_TYPE_VISIBILITY
								$scope.form.inferencesVisibility[inf.affectedBy[a]] = {'expression':inf.expression,'target':content[i]["name"]};
								break;
							case 2: //INFERENCE_TYPE_EDITABILITY
								$scope.form.inferencesEditability[inf.affectedBy[a]] = {'expression':inf.expression,'target':content[i]["name"]};
								break;
						}
				}
				
				if(typeof tabs[content[i].tab] === 'undefined')
					tabs[content[i].tab] = [];

				tabs[content[i].tab].push(content[i]);
			}

			$scope.form.content = [];

			for(var t in tabs)
				$scope.form.content.push({'tab':t, 'content':tabs[t]});
		});
	};

	$scope.submitForm = function(){

		var config = {};

		if($scope.form.key !== null)
			config = {
				'params' : {
					'id' : $scope.selectedItems[0]
				}
			};

		if($scope.validateForm()){
			$scope.displayLoading();
			$http.post(api_url + $scope.form.type + '/' + $scope.data.name,$scope.form.data || {},config).success(function(ret){
				$scope.hideLoading();
				if(ret.ok === '1'){
					$scope.form.display = false;
					$scope.displayMessage(ret.message,'S');
					$timeout(function(){
						$scope.form.cssdisplay = false;
						$scope.forceGridUpdate();
					},400);
				}else{
					$scope.displayMessage(ret.message,'E');
				}
			});
		}
	};

	$scope.validateForm = function(){
		var tabDescription = "";
		var firstField     = true;
		var hasError       = false;
		for(var i in $scope.form.content) // Para cada uma das abas
			for(var j in $scope.form.content[i].content){ // Para cada componente
				if(typeof $scope.form.content[i].content[j].required !== 'undefined') // Se for obrigatório
					if((''+$scope.form.data[$scope.form.content[i].content[j].name]).trim() === ''){ // Se o nome não for vazio
						if(firstField){
							tabDescription = " (na aba "+ $scope.form.content[i].content[j].tab + ")";
							$scope.displayMessage("O campo " + $scope.form.content[i].content[j].label + tabDescription + " é obrigatório",'W');
							$scope.form.activeTab = $scope.form.content[i].content[j].tab;
							firstField = false;
						}
						$scope.form.isInvalid[$scope.form.content[i].content[j].name] = true;
						hasError = true;
					}else{
						$scope.form.isInvalid[$scope.form.content[i].content[j].name] = false;
					}

				if(typeof $scope.form.validationError[$scope.form.content[i].content[j].name] !== 'undefined' && $scope.form.validationError[$scope.form.content[i].content[j].name] !== ''){
					if(firstField){
						tabDescription = " (na aba "+ $scope.form.content[i].content[j].tab + ")";
						$scope.displayMessage($scope.form.validationError[$scope.form.content[i].content[j].name].replace('{campo}',$scope.form.content[i].content[j].label + tabDescription),'W');
						$scope.form.activeTab = $scope.form.content[i].content[j].tab;
						firstField = false;
					}
					$scope.form.isInvalid[$scope.form.content[i].content[j].name] = true;
					hasError = true;
				}
			}

		return !hasError;
	};

	$scope.displayMessage = function(msg,type){
		$scope.form.message     = msg;
		$scope.form.messageType = type;
		$scope.form.showMessage = true;
		$timeout(function(){
			$scope.form.showMessage = false;
			$timeout(function(){
				$scope.form.message = '';
				// Se há algum loading rodando em background, mostra para o usuário.
				if($scope.loadingRunning > 0){
					$scope.form.messageType = 'L';
					$scope.form.showMessage = true;
				}
			},400);
		},4000);
	};

	$scope.displayLoading = function(){
		$scope.loadingView++;
		$scope.loadingRunning++;
		if($scope.form.message === ''){
			$scope.form.messageType = 'L';
			$scope.form.showMessage = true;
		}
	};

	$scope.hideLoading = function(){
		$scope.loadingRunning--;
		if($scope.form.message === '' && $scope.loadingRunning === 0)
			$scope.form.showMessage = false;
		$timeout(function(){
			$scope.loadingView--;
		},400);
	};

	$scope.showIconLoading = function(){
		return $scope.form.message === '' && $scope.loadingView > 0;
	};

	$scope.forceGridUpdate = function(){
		var currentData = $scope.data.data;
		$scope.data.data = "";
		$timeout(function(){
			$scope.data.data = currentData;
		},1);
	};

	$scope.isFieldInvalid = function($field){
		return typeof $scope.form.isInvalid[$field] !== 'undefined' && $scope.form.isInvalid[$field] === true;
	};

	$scope.execInferenceValue = function($field){
		$scope.form.isInvalid[$field] = false;
		if(typeof $scope.form.inferencesValue[$field] !== 'undefined'){
			var regexp     = /\{([^\}]*)\}/gi;
			var inf        = $scope.form.inferencesValue[$field];
			var match      = null;
			var result     = [];
			var expression = inf.expression;

			while((match = regexp.exec(inf.expression)) !== null)
				result.push(match[1]);

			for(var i in result)
				expression = expression.replace("{"+result[i]+"}", "'"+$scope.form.data[result[i]].replace(/(['"])/gim,"\\$1")+"'");

			var exec = new Function('return '+expression);
			$scope.form.data[inf.target] = exec.apply($scope);
		}
	};

	MenuService.updateFromStorage();
}]);