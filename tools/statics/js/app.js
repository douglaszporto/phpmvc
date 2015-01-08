var url        = "/tools/";
var api_url    = "/tools/api/";
var upload_url = "/tools/api/upload.php";

var app = angular.module('ToolsApp',['ngRoute']);

app.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider){
	$routeProvider.when('/',{
		templateUrl: url+'views/home.html',
		resolve: {
			auth : ['$q', 'LoginService', function($q, LoginService){
				var user = LoginService.getToken();

				if(user !== null && user !== ""){
					return $q.when(user);
				}else
					return $q.reject({auth:false});
			}]
		}
	});

	$routeProvider.when('/login/',{
		templateUrl: url+'views/login.html',
		resolve: {
			auth : ['$q', 'LoginService', '$location', function($q, LoginService, $location){
				var user     = LoginService.getToken();
				var deferred = $q.defer();

				deferred.resolve();

				if(user !== null && user !== ""){
					return $q.reject({auth:true});
				}

				return deferred.promisse;
			}]
		}
	});

	$routeProvider.otherwise({
		redirectTo:'/'
	});

}]);

app.run(['$rootScope', '$location', '$timeout', function($rootScope, $location, $timeout){
	$timeout(function(){
		$rootScope.loginBox = true;
	},100);
	$rootScope.$on("$routeChangeError",function(event, current, previous, obj){
		if(obj.auth === false){
			$location.path("/login");
			$rootScope.loginBox = true;
		}else if(obj.auth === true){
			$rootScope.loginBox = false;
			$location.path("/");
		}
	});

	$rootScope.$on("$locationChangeSuccess",function(event, current, previous, obj){
		$timeout(function(){
			$rootScope.loginBox = (document.location+'').indexOf('login') >= 0;
		},100);
	});
}]);

app.filter('html',function($sce){
    return function(input){
        return $sce.trustAsHtml(input);
    };
});







String.prototype.trim = function(){
	return this.replace(/(^\s+|\s+$)/gim,'');
};

String.prototype.regexIndexOf = function(regex, startpos) {
    var indexOf = this.substring(startpos || 0).search(regex);
    return (indexOf >= 0) ? (indexOf + (startpos || 0)) : indexOf;
};







/* Métodos disponíveis na inferencia de valor */
var inference = {};

inference.upper = function(v){
	return v.toUpperCase();
};

inference.lower = function(v){
	return v.toLowerCase();
};

inference.dashLower = function(v){
	var result = v.toLowerCase();
	result = result.replace(/[\s]+/gim      , "-");
	result = result.replace(/[àáâãäå]+/gim  , "a");
	result = result.replace(/[èéêë]+/gim    , "e");
	result = result.replace(/[ìíîï]+/gim    , "i");
	result = result.replace(/[òóõôö]+/gim   , "o");
	result = result.replace(/[ùúûü]+/gim    , "u");
	result = result.replace(/[ç]+/gim       , "c");
	result = result.replace(/[^a-z0-9-]+/gim, "" );
	result = result.replace(/[-]{2,}/gim    , "-");
	return result;
};