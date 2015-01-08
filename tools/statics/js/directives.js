app.directive('templateLink',['$http', '$compile', '$timeout', function($http, $compile, $timeout){
	return {
		restrict: 'A',
		scope: true,
		compile: function(element,attrs){

			return function(scope, element, attrs, controller){

				var delay = parseFloat($(element[0]).css('transition-duration')) * 1000;

				scope.$watch(function(){
					return scope.data.template;
				}, function(tpl){

					if(typeof tpl == 'undefined' || tpl === '')
						return;

					scope.displayLoading();

					$http.get('views/'+tpl).success(function(data){

						var DOMElements  = $('<div class="content-main">'+data+'</div>');
						var linkFunction = $compile(DOMElements);
						var compiledElem = linkFunction(scope);

						$(element[0]).addClass('hidden');
						$timeout(function(){
							$(element[0]).html(compiledElem).removeClass('hidden');
							scope.hideLoading();
						},delay);

					}).error(function(error){
						console.error('Erro ao trocar view: ' + error);
					});

				});

				scope.$watch(function(){
					return scope.data.data;
				}, function(dt){

					if(typeof dt == 'undefined' || dt === '')
						return;

					var link = dt + (dt.indexOf('?') > -1 ? '&' : '?') + 'token='+localStorage.getItem("userToken");

					scope.displayLoading();

					config = scope.selectedItems.length > 0 ? {'params':{'selectedItems':scope.selectedItems.join('*')}} : {};
					scope.templateData["operationOver"] = "";
					if(typeof scope.templateData["operations"] == 'undefined')
						scope.templateData["operations"] = [{
							action     : null,
							icon       : "&#xe025;",
							label      : "Adicionar",
							visibility : 0
						}];
					$http.get(link,config).success(function(data){
						$(element[0]).addClass('hidden');
						$timeout(function(){
							scope.selectedItems.splice(0,scope.selectedItems.length);
							scope.templateData = data;
							scope.templateData["operationOver"] = "";
							$(element[0]).removeClass('hidden');
							scope.hideLoading();
						},delay);
					}).error(function(error){
						console.error('Erro ao trocar dados: ' + error);
					});

				});
			};
		}
	};
}]);


app.directive('textEditor',['$timeout', function($timeout){
	return {
		restrict: 'E',
		scope: {
			value: '=ngModel',
			operations: '@editorOperations'
		},
		controller: ['$scope', function($scope){
			$scope.op         = $scope.operations.split(',');
			$scope.imageLink  = "";
			$scope.imageError = 0;

			$scope.imageUpload = function(el){
				var $form = $(el).parents('form');

				if($(el).val() === '')
					return false;

				$form.attr('action', upload_url);

				$form.ajaxSubmit({
					type: 'POST',
					error: function(event, statusText, responseText, form){
						$form.removeAttr('action');
					},
					success: function(responseText, statusText, xhr, form){
						var ar       = $(el).val().split('\\');
						var filename = ar[ar.length-1];

						var response = JSON.parse(responseText);

						$scope.$apply(function(){
							$scope.imageLink  = response.message;
							$scope.imageError = response.status;
						});

						$form.removeAttr('action');
					}
				});
			};
		}],
		link: function(scope, element, attrs, ctrl){
			$timeout(function(){

				$(element).find('.text-editor-op-b').click(function(){
					document.execCommand('bold',false,null);
				});

				$(element).find('.text-editor-op-i').click(function(){
					document.execCommand('italic',false,null);
				});

				$(element).find('.text-editor-op-u').click(function(){
					document.execCommand('underline',false,null);
				});

				$(element).find('.text-editor-op-ol').click(function(){
					document.execCommand('insertOrderedList');
				});

				$(element).find('.text-editor-op-ul').click(function(){
					document.execCommand('insertUnorderedList');
				});

				$(element).find('.text-editor-op-h2').click(function(){
					document.execCommand("insertHtml",false,"<h2>Título da Página</h2>");
				});

				$(element).find('.text-editor-op-h3').click(function(){
					document.execCommand("insertHtml",false,"<h3>Subtítulo</h3>");
				});

				$(element).find('.text-editor-op-hr').click(function(){
					if(scope.value.regexIndexOf(/<hr\s*\/?>/) < 0)
						document.execCommand("insertHtml",false,"<hr/>");

					scope.$apply(function(){
						scope.value = $(element).find('.text-editor').html();
					});
				});

				$(element).find('.text-editor-op-img').click(function() {
					$(element).find('input[type="file"]').click();
				});

				if(typeof attrs.style !== 'undefined')
					$(element).find('.text-editor').attr('style',attrs.style);

				$(element).find('.text-editor').blur(function(){
					scope.$apply(function(){
						scope.value = $(element).find('.text-editor').html();
					});
				});

				$(element).find('.text-editor').html(scope.value);

				scope.$watch(function(){
					return scope.imageLink;
				},function(val){
					if(scope.imageLink === '')
						return;

					$(element).find('.text-editor').focus();

					if(scope.imageError === 0)
						document.execCommand("insertHtml",false,"<img src='statics/images/imageerror.png' class='text-editor-image'/>");
					else
						document.execCommand("insertHtml",false,"<img src='"+ scope.imageLink +"' class='text-editor-image'/>");

					scope.imageLink = '';
					$('#text-editor-uploader').val('');

				});
			},1);
		},
		replace: false,
		templateUrl: url+'views/components/texteditor.html'
	};
}]);

app.directive('fileUploader',['$animate', function($animate){
	return {
		restrict: 'E',
		scope: {
			value: '=ngModel'
		},
		controller: ['$scope', function($scope){

			var v = $scope.value.split('/');

			$scope.progress = -1;
			$scope.error    = "";
			$scope.filename = v[v.length-1] || "";

			$scope.getProgress = function(){
				return ($scope.progress >= 0 ? ("(" + $scope.progress + "%)") : '&nbsp;');
			};

			$scope.getFilename = function(){
				return ($scope.filename.length > 0 ? '<a href="'+$scope.value+'" target="_blank">'+$scope.filename+'</a>' : '&nbsp;');
			};

			$scope.getError = function(){
				return ($scope.error.length > 0 ? $scope.error : '&nbsp;');
			};

			$scope.sendFile = function(el){

				var $form = $(el).parents('form');

				if($(el).val() === '')
					return false;

				$form.attr('action', upload_url);

				$scope.$apply(function() {
					$scope.progress = -1;
				});

				$form.ajaxSubmit({
					type: 'POST',
					uploadProgress: function(event, position, total, percentComplete){
						$scope.$apply(function(){
							$scope.progress = percentComplete;
						});
					},
					error: function(event, statusText, responseText, form){
						$form.removeAttr('action');
					},
					success: function(responseText, statusText, xhr, form){
						var ar       = $(el).val().split('\\');
						var filename = ar[ar.length-1];

						var response = JSON.parse(responseText);

						$scope.$apply(function(){
							if(response.status == 1){
								$scope.value = response.message;
								$scope.error = "";
							}else{
								$scope.value = "";
								$scope.error = response.message;
							}

							$scope.filename = filename;
						});

						$form.removeAttr('action');
					}
				});
			};
		}],
		link: function(scope, elem, attrs, ctrl){
			$(elem).find('.component-fake-uploader-button').click(function() {
				$(elem).find('input[type="file"]').click();
			});

			$(elem).find('')
		},
		replace: true,
		templateUrl: url+'views/components/uploader.html'
	};
}]);


app.directive('operetionLabel',['$compile', '$timeout', function($compile, $timeout){
	return {
		restrict: 'A',
		scope: true,
		compile: function(element,attrs){

			return function(scope, element, attrs, controller){

				scope.$watch(function(){

					return scope.templateData.operationOver;

				}, function(label){

					if(typeof label == 'undefined')
						return;

					$(element[0]).addClass('hidden');

					$timeout(function(){
						$(element[0]).html(label).removeClass('hidden');
					},400);

				});
			};
		}
	};
}]);


app.directive('confirmBoxCloser',['$compile', '$timeout', function($compile, $timeout){
	return {
		restrict: 'A',
		scope: true,
		compile: function(element,attrs){

			return function(scope, element, attrs, controller){

				var delay = parseFloat($('.confirm-box-container').css('transition-duration')) * 1000;

				$(element).click(function(){
					scope.$apply(function(){
						scope.confirm.display = false;
						$timeout(function(){
							scope.confirm.cssdisplay = false;
						},delay+1);
					});
				});

			};
		}
	};
}]);


app.directive('formBoxCloser',['$timeout', function($timeout){
	return {
		restrict: 'A',
		scope: true,
		compile: function(element,attrs){

			return function(scope, element, attrs, controller){

				var delay = parseFloat($('.form-box-container').css('transition-duration')) * 1000;

				$(element).click(function(){
					scope.$apply(function(){
						scope.form.display = false;
						$timeout(function(){
							scope.form.cssdisplay = false;
						},delay+1);
					});
				});

			};
		}
	};
}]);


app.directive('validationMethod',[function(){
	return {
		restrict: 'A',
		scope: {
			value: '=ngModel',
			type: '@validationMethod',
			error: '=validationReturn'
		},
		compile: function(element,attrs){

			return function(scope, element, attrs, controller){

				switch(scope.type){
					case 'integer':
						$(element).keydown(function(e){
							// Permite: backspace, delete, tab, escape, enter, home, end, left, right and .      // Ctrl+A 
							if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 35, 36, 37, 38, 39]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true))
								return;
							// Garante que é um número.
							if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105))
								e.preventDefault();
							
						}).keyup(function(){
							scope.$apply(function(){
								scope.value = parseInt(scope.value,10);
							});
						});
						break;

					case 'email':
						$(element).blur(function(){
							if(scope.value === '')
								return;

							if(scope.value.match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/gim) === null)
								scope.error[$(element).attr('name')] = 'O valor de {campo} não é uma URL valida.';
							else
								scope.error[$(element).attr('name')] = '';
						});
						break;

					case 'url':
						$(element).blur(function(){
							if(scope.value === '')
								return;

							if(scope.value.match(/^http\:\/\/(.*)$/gim) === null)
								scope.error[$(element).attr('name')] = 'O valor {campo} não é uma URL valida.';
							else
								scope.error[$(element).attr('name')] = '';
						});
						break;
				}

			};
		}
	};
}]);