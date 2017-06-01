<!DOCTYPE html>
<html>
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
    <!-- css -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/tooltipster.bundle.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/tooltipster-sideTip-shadow.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/js/angular/angular.min.js">
</head>
<body>
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
                                <li><a href="#tab1success" data-toggle="tab">ĐĂNG NHẬP</a></li>
                                <li class="active"><a href="#tab2success" data-toggle="tab">ĐĂNG KÍ</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade " id="tab1success">
                                    <form action="" method="POST" role="form">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
                                            <input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input type="text" class="form-control" placeholder="Mật khẩu" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <div class="text-right">
                                            <button type="button" class="btn btn-link forgot">Quên mật khẩu</button>
                                            <button type="submit" class="btn btn-success ">Đăng nhập</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade in active" id="tab2success">
                                    <form action="" method="POST" role="form">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-o"></i></span>
                                            <input type="text" class="form-control" placeholder="Họ Tên" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
                                            <input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input type="text" class="form-control" placeholder="Mật khẩu" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success ">Đăng kí</button>
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
                <a class="navbar-brand navbar-link" href="#"><img class="img-responsive" src="assets/img/logo.png" width="160" id="logo"></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="#">Máy tính</a></li>
                    <li role="presentation"><a href="#">Điện thoại</a></li>
                    <li role="presentation"><a href="#">Linh kiện</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a data-toggle="modal" data-target="#myModal" class="navbar-btn">Đăng nhập</a></li>
                    <li>
                        <div class="cart v-align" data-toggle="tooltip" title="Hiện có 4 sản phẩm" data-placement="bottom">
                            <i class="glyphicon glyphicon-shopping-cart"></i>  <span class="badge">4</span>    
                        </div>
                    </li>
                </ul>
                <form class="navbar-form" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm" size="40">
                    </div>
                    <button type="submit" class="btn btn-danger"><b class="glyphicon glyphicon-search"></b></button>
                </form>
            </div>
        </div>
    </nav>
    <div class="wrapper container-fluid" style="margin-top: 70px">
        <div class="row">
            <div class="col-md-3 relative">
                <ul class="list-group">
                    <li class="list-group-item clearfix">
                        <div class="col-md-12">
                            <a href="">
                                <div class="col-md-6"><img src="assets/img/acer1.png" alt="" class="img-responsive"></div>
                                <div class="col-md-6 tag">
                                    <div class="name">Lorem ipsum dolor sit amet.</div>
                                    <div class="price">111000 VND</div>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="list-group-item clearfix">
                        <div class="col-md-12">
                            <a href="">
                                <div class="col-md-6"><img src="assets/img/acer1.png" alt="" class="img-responsive"></div>
                                <div class="col-md-6 tag">
                                    <div class="name">Lorem ipsum dolor sit amet.</div>
                                    <div class="price">111000 VND</div>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="list-group-item clearfix">
                        <div class="col-md-12">
                            <a href="">
                                <div class="col-md-6"><img src="assets/img/acer1.png" alt="" class="img-responsive"></div>
                                <div class="col-md-6 tag">
                                    <div class="name">Lorem ipsum dolor sit amet.</div>
                                    <div class="price">111000 VND</div>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="list-group-item clearfix">
                        <div class="col-md-12">
                            <a href="">
                                <div class="col-md-6"><img src="assets/img/acer1.png" alt="" class="img-responsive"></div>
                                <div class="col-md-6 tag">
                                    <div class="name">Lorem ipsum dolor sit amet.</div>
                                    <div class="price">111000 VND</div>
                                </div>
                            </a>
                        </div>
                    </li>
                    
                </ul>
            </div>
            <div class="col-md-9 detail">
                <ol class="breadcrumb">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Máy tính</a></li>
                        <li><a href="" title="">Asus</a></li>
                        <li class="active">Lorem ipsum dolor sit.</li>
                    </ol>
                <div class="col-md-5 thumbnail">
                    <img src="assets/img/acer.png" class="img-responsive">
                </div>
                <div class="col-md-6 info">
                    <div class="panel panel-danger">
                        <div class="panel-heading text-center">
                            <div class="name-detail">Lorem ipsum dolor sit amet, consectetur.</div>
                        </div>
                        <div class="panel-body text-left">
                            <div class="price-detail text-center">Giá: 12.000.000 VND</div>
                            <hr>
                            <div class="info">
                                <b>THÔNG SỐ KỸ THUẬT</b>
                                <p>M&#224;n h&#236;nh: 14”, 1366x768</p>
                                <p>CPU: Intel Celeron, 1.6GHz</p>
                                <p>RAM: 4GB/ HDD: 500GB</p>
                                <p>VGA: Intel HD Graphics</p>
                                <p>HĐH: Windows 10 Home</p>
                                <p>Pin: 4 cell/ DVD: Kh&#244;ng</p>
                            </div>
                            <hr>
                            <div class="quantity">Số lượng: 
                                <button type="button" class="minus"><i class="fa fa-minus"></i></button>
                                <input type="text" name="quantity" value="1" class="text-center" size="5">
                                <button type="button" class="plus"><i class="fa fa-plus"></i></button>
                            </div>
                            <br>
                            <div class="text-center v-align action-detail">
                                <div class="col-md-6 buy">
                                    <a href=""><i class="fa fa-credit-card"></i> MUA NGAY</a>
                                </div>
                                <div class="col-md-6 add v-align">
                                    <i class="fa fa-cart-plus fa-2x"></i> THÊM VÀO GIỎ
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <footer>
    <div class="row">
        <div class="col-md-4 col-sm-6 footer-contacts">
            <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                <p><span class="new-line-span">21 Revolution Street</span> Paris, France</p>
            </div>
            <div><i class="fa fa-phone footer-contacts-icon"></i>
                <p class="footer-center-action email text-left"> 08081508</p>
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
            <h3><a href="#"><span><img class="img-responsive" src="assets/img/logo.png" width="150"> </span></a></h3>
            <p class="links"><a href="#">Home</a><strong> · </strong><a href="#">Blog</a><strong> · </strong><a href="#">Pricing</a><strong> · </strong><a href="#">About</a><strong> · </strong><a href="#">Faq</a><strong> · </strong><a href="#">Contact</a></p>
            <p
            class="company-name">Company Name © 2015 </p>
        </div>
    </div>
</footer>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/parallax.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/tooltipster.bundle.min.js"></script>
</body>

</html>