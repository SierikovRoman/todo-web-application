// Application module
(function () {

	var app = angular.module('ToDoApp', []);


	//===========================================
	//================= LOGIC ===================

	app.controller("MainController",['$scope','$http', function($scope,$http){

	getCards();
	function getCards(){
		$http.post('../../app/php/getCards.php').success(function(data){
			if(data != null){
				$scope.cards = data;
				console.log(data);
			};
		});
	};


	getCategories();
	function getCategories(){
		$http.post('../../app/php/getCategories.php').success(function(data){
			if(data != null){
				$scope.categories = data;
				console.log(data);
			};
		});
	};

	getPriorities();
	function getPriorities(){
		$http.post('../../app/php/getPriorities.php').success(function(data){
			if(data != null){
				$scope.priorities = data;
				console.log($scope.priorities[1].name);
			};
		});
	};

	$scope.currentInfo = {};
	$scope.editCard = function(info){
		$scope.currentInfo = info;
		$('#editCard').modal('show');
	};

	$scope.updateCard = function(info){
		$http.post('../../app/php/updateCard.php',{

			"id":info.id,
			"title":info.title,
			"description":info.description,
			"category":info.category_id,
			"priority":info.priority_id

			}).success(function(data){
			if (data != null) {
				console.log(data);
				getCards();
			};
		});
	};

	$scope.updateMsg = function(id){
		$('#editCard').modal('hide');
	};

	$scope.addNewCard = function(info){
		$http.post('../../app/php/addNewCard.php',{

			"title":info.title,
			"description":info.description,
			"category":info.category,
			"priority":info.priority

			}).success(function(data){
				console.log(data);
			if (data != null) {
				getCards();
			};
		});
	};

	$scope.new_card = function(){
		$scope.cardInfo = null; 
		$('#addNewCard').modal('hide');
		$('#success').modal('show');
	};


	}]);

})();	








