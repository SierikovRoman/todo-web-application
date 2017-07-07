<?php
  session_start();
  $id = $_SESSION['id'];

  if($id == null){
    header("Location: index.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en" ng-app="MainApp" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>todo-web-application</title>

    <script src="app/libs/jquery/dist/jquery.min.js"></script>
    <script src="app/libs/moment/min/moment.min.js"></script>
    <script src="app/libs/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
    <script src="app/libs/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="app/libs/angular/angular.js"></script>
    <script src="app/libs/angular/angular-route.min.js"></script>
    <script src="app/libs/bootstrap/dist/js/bootstrap.min.js"></script>

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

    <link rel="stylesheet" type="text/css" href="app/libs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app/libs/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="app/libs/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app/css/style.css">
    

    <!-- TODO add manifest here -->
      <!-- <link rel="manifest" href="/manifest.json"> -->
    
    <!-- Add to home screen for Safari on iOS -->
<!--     <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Todo PWA">
    <link rel="apple-touch-icon" href="app/images/icons/icon-152x152.png">
    <meta name="msapplication-TileImage" content="app/images/icons/icon-144x144.png">
    <meta name="msapplication-TileColor" content="#2F3BA2"> -->

</head>
<body ng-cloak>

<div class="container-fluid cf" ng-controller="MainController">
      <ng-include src="'app/templates/mobile_view/navbarMobile.html'"></ng-include>
      <ng-include src="'app/templates/mobile_view/sideNavMobile.html'"></ng-include>
      <ng-include src="'app/templates/mobile_view/todoMobileList.html'"></ng-include>

      <!-- Add New Todo -->
      <ng-include src="'app/templates/mobile_view/addNewCardCircle.html'"></ng-include>
      <div>
        <!-- <ng-include src="'app/templates/mobile_view/navbarNewTodoMobile.html'"></ng-include> -->
        <ng-include src="'app/templates/mobile_view/addNewTodoMobile.html'"></ng-include>
        <ng-view></ng-view>
      </div>
      
      <!-- Add New Todo List -->
      <ng-include src="'app/templates/mobile_view/newListModal.html'"></ng-include>

</div>


<script src="app/js/app.js" async></script>
<script src="app/js/script.js"></script>


<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>











