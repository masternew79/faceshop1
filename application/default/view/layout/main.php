<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bs</title>
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans|PT+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="<?=HTP::$resourceUrl?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=HTP::$resourceUrl?>/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=HTP::$resourceUrl?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?=HTP::$resourceUrl?>/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=HTP::$resourceUrl?>/assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="<?=HTP::$resourceUrl?>/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?=HTP::$resourceUrl?>/assets/css/tooltipster.bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?=HTP::$resourceUrl?>/assets/css/tooltipster-sideTip-shadow.min.css">
    <link rel="stylesheet" type="text/css" href="<?=HTP::$resourceUrl?>/assets/css/style.css">
</head>
<body ng-app="frontApp" ng-controller="cartController">
<!-- modal -->
<div class="modal fade" tabindex="1" role="dialog" aria-labelledby="gridSystemModalLabel" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">FACESHOP</h4>
            </div>
            <div class="modal-body">
                <div class="panel with-nav-tabs panel-success">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li><a href="#tab1success" data-toggle="tab" class="active" >ĐĂNG NHẬP</a></li>
                            <li><a href="#tab2success" data-toggle="tab">ĐĂNG KÍ</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-danger alert-dismissable message-model hide">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <div class="content-message-model"></div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade  in active" id="tab1success">
                                <form>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
                                        <input type="email" class="form-control" id="login-input-email" name="email" placeholder="Email" aria-describedby="basic-addon1" ng-model="email">
                                    </div>
                                    <div class="message login-message-email alert alert-warning hide"></div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" id="login-input-pass" name="password" placeholder="Mật khẩu" aria-describedby="basic-addon1" ng-model="password">
                                    </div>
                                    <div class="message login-message-pass alert alert-warning hide"></div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="captcha"><img id="img_captcha" src="<?=HTP::$resourceUrl?>/captcha.php"/></span>
                                        <input type="text" class="form-control" id="login-input-captcha" name="captcha" placeholder="Mã xác nhận" aria-describedby="basic-addon1" ng-model="captcha">
                                    </div>
                                    <div class="message login-message-captcha alert alert-warning hide"></div>
                                    <br>
                                    <div class="text-right">
                                        <span id="error_mesage" style="color: red"></span>
                                        <button type="button" class="btn btn-link forgot" id="test">Quên mật khẩu</button>
                                        <button type="button" class="btn btn-success btn-login" ng-click="login()">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab2success">
                                <form action="" method="POST" role="form">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-o"></i></span>
                                        <input type="text" class="form-control" placeholder="Họ Tên" aria-describedby="basic-addon1" id="reg-input-name" name="reg-name" ng-model="regName">
                                    </div>
                                    <div class="message reg-message-name alert alert-warning hide"></div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
                                        <input type="email" class="form-control" id="reg-input-email" name="email" placeholder="Email" aria-describedby="basic-addon1" ng-model="regEmail">
                                    </div>
                                    <div class="message reg-message-email alert alert-warning hide"></div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" id="reg-input-pass" name="password" placeholder="Mật khẩu" aria-describedby="basic-addon1" ng-model="regPass">
                                    </div>
                                    <div class="message reg-message-pass alert alert-warning hide"></div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-phone"></i></span>
                                        <input type="text" class="form-control" id="reg-input-mobile" name="reg-mobile" placeholder="Số điện thoại" aria-describedby="basic-addon1" ng-model="regMobile">
                                    </div>
                                    <div class="message reg-message-mobile alert alert-warning hide"></div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="captcha"><img id="img_captcha" src="<?=HTP::$resourceUrl?>/captcha.php"/></span>
                                        <input type="text" class="form-control" id="reg-input-captcha" name="captcha" placeholder="Mã xác nhận" aria-describedby="basic-addon1" ng-model="regCaptcha">
                                    </div>
                                    <div class="message reg-message-capt alert alert-warning hide"></div>
                                    <br>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success btn-register" ng-click="">Đăng kí</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand navbar-link" href="<?php echo HTP::$baseUrl; ?>"><img class="img-responsive" src="<?=HTP::$resourceUrl?>/assets/img/logo.png" width="160" id="logo"></a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav">
                <?php 
                    $category = $this->category; 
                    foreach ($category as $category) :
                ?>
                <li role="presentation"><a href="<?php echo HTP::$baseUrl; ?>/category/<?php echo $category->id ?>"><?php echo ucfirst($category->name) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown nav-logout" ng-cloak ng-if="name !== ''">
                    <a class="dropdown-toggle" data-toggle="dropdown">{{name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo HTP::$baseUrl . '/userInfo/' ?>">Thông tin cá nhân</a></li>
                        <li><a href="<?php echo HTP::$baseUrl . '/userBill/' ?>">Danh sách hóa đơn</a></li>
                        <li><a href="<?php echo HTP::$baseUrl .'/logout'; ?>" class="navbar-btn btn-logout" ng-click="logout()" >Đăng xuất</a></li>
                    </ul>
                </li>
                <li><a data-toggle="modal" data-target="#myModal" class="navbar-btn nav-login" ng-if="name == ''">Đăng nhập</a></li>
                <li>
                    <div class="cart v-align" ng-cloak>
                        <i class="glyphicon glyphicon-shopping-cart"></i>  <span class="badge">{{filtered.length}}</span>
                    </div>
                </li>
            </ul>
            <form class="navbar-form" role="search" action="<?=HTP::$baseUrl.'/search'?>" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Tìm kiếm" size="40">
                </div>
                <button type="submit" class="btn btn-danger"><b class="glyphicon glyphicon-search"></b></button>
            </form>
        </div>
    </div>
</nav>

<!-- cart list -->
<div class="cart-list hidden animated">
    <div>
        <div class="col-md-11 text-center">
            <h4 class="cart-title text-center">Giỏ hàng</h4>
        </div>
        <div class="col-md-1 text-right btn-close"><i class="fa fa-close"></i></div>
    </div>
    <div class="clearfix"></div>
    <ul class="list-group">
        <li class="list-group-item clearfix" ng-repeat="product in cart | filter:query as filtered">
            <div class="cart-item" data-id="{{product.id}}">
                <div class="col-md-2 cart-item-img thumbnail"><img src="<?=HTP::$resourceUrl . '/'?>{{product.img}}" class="img-responsive"></div>
                <div class="col-md-5">
                    <div class="row cart-item-name">
                        <a href="">{{product.name}}</a>
                    </div>
                    <div class="row cart-item-price">{{product.price}} VNĐ</div>
                </div>
                <div class="col-md-4 quantity">
                    <button type="button" class="minus" ng-click=minus($event)><i class="fa fa-minus"></i></button>
                    <input type="text" name="quantity"  ng-model="product.qty" class="text-center" size="5">
                    <button type="button" class="plus" ng-click="plus($event)"><i class="fa fa-plus"></i></button>
                </div>
                <div class="col-md-1 cart-item-delete" ng-click="remove($event)"><i class="fa fa-close"></i></div>
            </div>
        </li>
        
    </ul>
    <div class="total-price text-center">Tổng tiền: {{total}} VNĐ</div>
    <div class="text-center"><a href="" class="btn btn-danger" ng-click="checkout()">Đặt hàng</a></div>
</div>
<!-- .cart -->
<!-- add success -->
<div class="add-success col-md-2 col-md-offset-5 text-center alert alert-success hidden animated ">
    
</div>
<!-- .add success -->

<?=$this->placeholder();?>

<footer>
    <div class="row">
        <div class="col-md-4 col-sm-6 footer-contacts">
            <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                <p><span class="new-line-span">21 Revolution Street</span> Paris, France</p>
            </div>
            <div><i class="fa fa-phone footer-contacts-icon"></i>
                <p class="footer-center-action email text-left"> +1 555 123456</p>
            </div>
            <div><i class="fa fa-envelope footer-contacts-icon"></i>
                <p> <a href="#" target="_blank">support@company.com</a></p>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 footer-about">
            <h4>About the company</h4>
            <p> Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
            </p>
            <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
        </div>
        <div class="col-md-4 col-sm-6 footer-navigation">
            <h3><a href="#"><span><img class="img-responsive" src="<?=HTP::$resourceUrl?>/assets/img/logo.png" width="150"> </span></a></h3>
            <p class="links"><a href="#">Home</a><strong> · </strong><a href="#">Blog</a><strong> · </strong><a href="#">Pricing</a><strong> · </strong><a href="#">About</a><strong> · </strong><a href="#">Faq</a><strong> · </strong><a href="#">Contact</a></p>
            <p
                    class="company-name">Company Name © 2015 </p>
        </div>
    </div>
</footer>
<!-- corejs -->
    <script>
        var baseUrl = "<?=HTP::$baseUrl?>";  
        var resourceUrl = "<?=HTP::$resourceUrl?>";
        var loginID = "<?php if (HTP_Session::get('ID')) { echo HTP_Session::get('ID');} else { echo '';};?>";
    </script>
    <script src="<?=HTP::$resourceUrl?>/assets/js/jquery.min.js"></script>
    <script src="<?=HTP::$resourceUrl?>/assets/js/parallax.min.js"></script>
    <script src="<?=HTP::$resourceUrl?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=HTP::$resourceUrl?>/assets/js/wow.min.js"></script>
    <script src="<?=HTP::$resourceUrl?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?=HTP::$resourceUrl?>/assets/js/tooltipster.bundle.min.js"></script>
    <script src="<?=HTP::$resourceUrl?>/assets/js/script.js"></script>
    <script src="<?=HTP::$resourceUrl?>/assets/js/data-tranfer.js"></script>
    <script src="<?=HTP::$resourceUrl?>/assets/js/validate.js"></script>
    <script src="<?=HTP::$resourceUrl?>/assets/js/user.js"></script>
    <!-- angular -->
    <!-- <script src="<?=HTP::$resourceUrl?>/assets/js/angular/angular.min.js" type="text/javascript"></script> -->
    <script src="https://code.angularjs.org/1.4.9/angular.min.js" type="text/javascript"></script>

    <!-- <script src="<?=HTP::$resourceUrl?>/assets/js/angular/angular-route.min.js" type="text/javascript"></script> -->
    <script src="https://code.angularjs.org/1.4.9/angular-route.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ngStorage/0.3.6/ngStorage.min.js"></script>

    <script src="<?=HTP::$resourceUrl?>/app/front/app.js" type="text/javascript"></script>
</body>
</html>