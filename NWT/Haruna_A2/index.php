<!DOCTYPE html>
<html lang="ja" ng-app="marimekko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VANARTS STUDENT PROJECT</title>
    <link rel="stylesheet" href="styles/simple-grid.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="styles/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular-route.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-animate.min.js"></script>
    <script src="scripts/main.js"></script>
</head>
<body>

<header>
    <div><a href="index.php"><img src="img/logo.png"></a></div>
</header>
<main class="row" ng-view ng-controller="AppController"></main>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</body>
</html>