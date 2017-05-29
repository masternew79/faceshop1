<!DOCTYPE html>
<html lang="en" ng-app="adminApp">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?=HTP::$resourceUrl?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=HTP::$resourceUrl?>/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?=HTP::$resourceUrl?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?=HTP::$resourceUrl?>/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?=HTP::$resourceUrl?>/assets/css/admin-style.css">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top nav-red">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand navbar-link" href="#"><img class="img-responsive" src="<?=HTP::$resourceUrl?>/assets/img/logo.png" width="160" id="logo"></a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?=HTP::$homeUrl?>" data-toggle="modal" class="navbar-btn">Về Website</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php $this->placeholder(); ?>

<script src="<?=HTP::$resourceUrl?>/assets/js/jquery.min.js"></script>
<script src="<?=HTP::$resourceUrl?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=HTP::$resourceUrl?>/assets/js/wow.min.js"></script>

<script src="<?=HTP::$resourceUrl?>/assets/js/angular/angular.min.js"></script>
<script src="<?=HTP::$resourceUrl?>/assets/js/angular/angular-route.min.js"></script>
<script src="<?=HTP::$resourceUrl?>/assets/js/admin-script.js"></script>
<script src="<?=HTP::$resourceUrl?>/public/app/back/app.js"></script>
<script src="<?=HTP::$resourceUrl?>/public/app/back/config.js"></script>
<script src="<?=HTP::$resourceUrl?>/public/app/back/controller.js"></script>
</body>
</html>