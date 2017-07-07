// Application module
(function () {

	/* LOGIN MODULE */
	/*=============================================*/
	var login = angular.module('Login', ['ngRoute']);

	login.config(function ($routeProvider) {
		$routeProvider

		.when('/', {
			templateUrl: '../../app/templates/login/loginForm.html'
		})

		.when('/LogIn', {
			templateUrl: '../../app/templates/login/loginForm.html'
		})

		.when('/SignUp', {
			templateUrl: '../../app/templates/login/signUpForm.html'
		});

	});
	
	login.controller("LoginController",['$scope','$http', function($scope,$http){


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

	login.controller("SingUpController",['$scope','$http', function($scope,$http){
	
	// Add new user to system
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

	}]);


	/*  MAIN MODULE */
	/*=============================================*/

	var app = angular.module('MainApp', ['ngRoute']);

	app.config(function ($routeProvider) {
		$routeProvider

		// .when('/main', {
		// 	templateUrl: '../../app/templates/mobile_view/todoMobileList.html'
		// })

		// .when('/addNewTodo', {
		// 	templateUrl: '../../app/templates/mobile_view/addNewTodoMobile.html'
		// });


	});

	app.controller("NavbarController",['$scope','$http', function($scope,$http){

	getUserInfo();
	function getUserInfo(){
		$http.post('../../app/php/getUserInfo.php').success(function(data){
			if(data != null){
				$scope.userInfo = data;
				// console.log($scope.userInfo);
			};
		});
	};

	/* For Desktop View */
	$scope.openNav = function(){
		document.getElementById("mySidenav").style.width = "250px";
		document.getElementById("user").style.display = "none";
	};

	$scope.closeNav = function(){
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById("user").style.display = "block";
	};

	/* For Mobile View */

	$scope.openNavigation = function(){
		document.getElementById("sidenav-mobile").style.width = "250px";
		document.getElementById("user").style.display = "none";
	};

	$scope.closeNavigation = function(){
		document.getElementById("sidenav-mobile").style.width = "0";
		document.getElementById("user").style.display = "block";
	};

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


	getList();
	function getList(){
		$http.post('../../app/php/getLists.php').success(function(data){
			if(data != null){
				$scope.lists = data;
			};
		});
	};

	getPriorities();
	function getPriorities(){
		$http.post('../../app/php/getPriorities.php').success(function(data){
			if(data != null){
				$scope.priorities = data;
				// console.log($scope.priorities[1].name);
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
				// console.log(data);
				getCards();
			};
		});
	};

	$scope.updateMsg = function(id){
		$('#editCard').modal('hide');
	};


	$scope.createNewTodo = function(){
		$('.mobile-list, .nav-mobile').slideUp();
		$('.new-todo, .nav-new-todo-mobile').slideToggle();
		$('.circle').addClass('hide');
	};

	// $scope.addNewCard = function(info){
	// 	$http.post('../../app/php/addNewCard.php',{

	// 		"title":info.title,
	// 		"description":info.description,
	// 		"category":info.category,
	// 		"priority":info.priority

	// 		}).success(function(data){
	// 			// console.log(data);
	// 		if (data != null) {
	// 			getCards();
	// 		};
	// 	});
	// };

	// $scope.new_card = function(){
	// 	$scope.cardInfo = null; 
	// 	$('#addNewCard').modal('hide');
	// 	$('#success').modal('show');
	// };




	/* Create New List*/

	$scope.newList = function(){
		$('#newList').modal('show');
	};

	$scope.addNewList = function(info){
		$http.post('../../app/php/addNewList.php',{

			"name":info.listName

			}).success(function(data){
				console.log(data);
				getList();
			if (data == "error") {
				$('#error').text("Sorry this list is already exist.");
			}else if(data == "true"){
				$scope.listInfo = null; 
				$('#newList').modal('hide');
			}
		});
	};



	}]);

})();	


// var w = $(window).width();

// console.log(w);




