<!DOCTYPE html>
<html lang="en" ng-app="ToDoApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>todo-web-application</title>
    <link rel="stylesheet" type="text/css" href="app/libs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app/css/style.css">

    <script src="app/libs/jquery/dist/jquery.js"></script>
    <script src="app/libs/angular/angular.js"></script>
    <script src="app/libs/angular/angular-route.min.js"></script>
    <script src="app/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="app/js/script.js"></script>
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</head>
<body>

<div class="container-fluid" ng-controller="MainController">
    
    <ng-include src="'app/templates/navbar.html'"></ng-include>
    <ng-include src="'app/templates/card.html'"></ng-include>
    <ng-include src="'app/templates/logOut.html'"></ng-include>
    <ng-include src="'app/templates/addNewCardCircle.html'"></ng-include>
    <ng-include src="'app/templates/addNewCard.html'"></ng-include>
    <ng-include src="'app/templates/success.html'"></ng-include>
    <ng-include src="'app/templates/editCard.html'"></ng-include>

</div>

</body>
</html>












