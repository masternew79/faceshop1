<!DOCTYPE html>
<html lang="en" ng-app="adminApp">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?=HTP::$resourceUrl?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=HTP::$resourceUrl?>/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?=HTP::$resourceUrl?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?=HTP::$resourceUrl?>/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?=HTP::$resourceUrl?>/assets/css/admin-style.css">
    <script src="<?=HTP::$resourceUrl?>/assets/js/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top nav-red">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand navbar-link" href="<?=HTP::$baseUrl?>"><img class="img-responsive" src="<?=HTP::$resourceUrl?>/assets/img/logo.png" width="160" id="logo"></a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?=HTP::$baseUrl?>/logout"  class="navbar-btn">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="wrapper col-md-12">
    <div class="col-md-2 side-bar">
        <div class="affix">
            <div class="col-md-11 item product">
                <a href="<?=HTP::$baseUrl?>/product">
                    <div class="col-md-3 icon" style="font-size: 3em;"><i class=" glyphicon glyphicon-list-alt"></i></div>
                    <div class="col-md-9">
                        <div class="row text-right" style="font-size: 25px">123</div>
                        <div class="row text-right">Sản phẩm</div>
                    </div>
                </a>
            </div>
            <div class="col-md-11 item user">
                <a href="<?=HTP::$baseUrl?>/user">
                    <div class="col-md-3 icon" style="font-size: 3em;"><i class="fa fa-user-circle-o"></i></div>
                    <div class="col-md-9">
                        <div class="row text-right" style="font-size: 25px">12</div>
                        <div class="row text-right">Thành viên</div>
                    </div>
                </a>
            </div>
            <div class="col-md-11 item trademark">
                <a href="<?=HTP::$baseUrl?>/order">
                    <div class="col-md-3 icon" style="font-size: 3em;"><i class="glyphicon glyphicon-tags"></i></div>
                    <div class="col-md-9">
                        <div class="row text-right" style="font-size: 25px">13</div>
                        <div class="row text-right">Hãng</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div ng-view>


    </div>
    <div>
        <?= $this->placeholder(); ?>

    </div>
</div>

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