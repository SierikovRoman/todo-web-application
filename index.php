<!DOCTYPE html>
<html lang="en" ng-app="Login">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="app/libs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app/css/enter.css">

    <script src="app/libs/jquery/dist/jquery.js"></script>
    <script src="app/libs/angular/angular.js"></script>
    <script src="app/libs/angular/angular-route.min.js"></script>
    <script src="app/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="app/js/app.js"></script>
</head>
<body>
	
<div class="container-fluid">

    <ng-include src="'app/templates/login/loginNavbar.html'"></ng-include>
    <div class="container">
        <ng-view></ng-view>
    </div>
    <ng-include src="'app/templates/login/loginFooter.html'"></ng-include>

</div>


<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>




