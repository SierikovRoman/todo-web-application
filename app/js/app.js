// Application module
(function () {

	var app = angular.module('ToDoApp', ['ngRoute']);

	app.config(function ($routeProvider) {
		$routeProvider

		.when('/', {
			templateUrl: '../../app/templates/loginForm.html'
		})

		.when('/LogIn', {
			templateUrl: '../../app/templates/loginForm.html'
		})

		.when('/SignUp', {
			templateUrl: '../../app/templates/signUpForm.html'
		});

	});

	//===========================================
	//================= LOGIC ===================
	
	
	app.controller("LoginController",['$scope','$http', function($scope,$http){


	// Check User
	$scope.checkUser = function(info){
		$http.post('../../app/php/checkUser.php',{

			"email":info.mEmail,
			"password":info.mPass

			}).success(function(data){
			if (data === 'true') {
				document.location.href="../../main.php";
				console.log(data);
			}else{
				$('#error').text('Sorry! Your password or email is incorrect! Try again.');
			}
		});
	};

	}]);

	app.controller("SingUpController",['$scope','$http', function($scope,$http){
	

	$scope.addNewUser = function(info){
		var reName = /^[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$/;
		var	reSurname = /^[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$/;
		var	reEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

		$scope.name = info.userName;
		$scope.surname = info.userSurname;
		$scope.email = info.userEmail;

		var validName = reName.test($scope.name);
		var validSurname = reSurname.test($scope.surname);
		var validEmail = reEmail.test($scope.email);

		if(!validName){
			console.log("not valid name");
		}else if (!validSurname){
			console.log("not valid surname");
		}else if(!validEmail){
			console.log("not valid email");
		}else{
			console.log("success");
			$http.post('../../app/php/addNewUser.php',{

			"name":info.userName,
			"surname":info.userSurname,
			"email":info.userEmail,
			"password":info.userPass

			}).success(function(data){
			if (data === 'true') {
				document.location.href="../../main.php";
				// console.log(data + " " + );
			}else{
				console.log($scope.email);
				$('#error').text('Sorry! Sorry, this email already in system! Try again.');
			}
		});
		}
	};

	// Add new user to system
	// $scope.addNewUser = function(info){
	// 	$http.post('../../app/php/addNewUser.php',{

	// 		"name":info.userName,
	// 		"surname":info.userSurname,
	// 		"email":info.userEmail,
	// 		"password":info.userPass

	// 		}).success(function(data){
	// 		if (data === 'true') {
	// 			document.location.href="../../main.php";
	// 			console.log(data);
	// 		}else{
	// 			console.log(data);
	// 			$('#error').text('Sorry! Sorry, this email already in system! Try again.');
	// 		}
	// 	});
	// };

	}]);

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








