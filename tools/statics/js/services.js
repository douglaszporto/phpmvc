app.factory('MenuService',function($http){

	//var itensMenu = [];

	return {

		itensMenu : [],

		getItens : function(token){
			var self = this;
			$http.get(api_url+'menu.php?token='+token).success(function(data){
				localStorage.setItem("userMenu", JSON.stringify(data));
				self.itensMenu = data;
			});
		},

		updateFromStorage : function(){
			this.itensMenu = JSON.parse(localStorage.userMenu || '{}');
		},

		items: function(){
			console.log('User Menu load: '+localStorage.userMenu);
			return localStorage.userMenu ? JSON.parse(localStorage.userMenu) : this.itensMenu;
		}
	};
});

app.factory('LoginService',['$http', '$q', '$location', '$rootScope', '$timeout', 'MenuService', function($http, $q, $location, $rootScope, $timeout, MenuService){
	return {
		login : function(credentials){
			var deferred = $q.defer();

			$http.post(api_url+"login/enter.php",{
				"user" : credentials.user,
				"pass" : credentials.pass
			}).then(function(result){
				deferred.resolve(result);
				if(result.data.token){
					localStorage.setItem("userToken", result.data.token);
					MenuService.getItens(result.data.token);
				}
				$rootScope.loginBox = false;
				$timeout(function(){
					$location.path('/');
				},400);
			},function(error){
				deferred.rejected(error);
			});

			return deferred.promisse;
		},

		logout : function(){
			var deferred = $q.defer();

			$http.post(api_url+"login/leave.php",{
				"token" : localStorage.getItem("userToken")
			}).then(function(result){
				deferred.resolve(result);
				localStorage.removeItem("userToken");
				localStorage.removeItem("userMenu");
				$location.path('/login');
			},function(error){
				deferred.rejected(error);
			});
		},

		getToken : function(){
			return localStorage.getItem("userToken");
		}
	};
}]);