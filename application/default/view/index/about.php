<div class="wrapper-login col-md-6 col-md-offset-4">
    <div class="modal-content">
        <div class="modal-body">
            <div class="panel with-nav-tabs panel-success">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li><a href="#tab1success" data-toggle="tab">ĐĂNG NHẬP</a></li>
                        <li><a href="#tab2success" data-toggle="tab">ĐĂNG KÍ</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade " id="tab1success">
                            <form method="post" action="">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
                                    <input type="text" class="form-control" id="txt_email" name="User[email]" placeholder="Email" aria-describedby="basic-addon1">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="text" class="form-control" id="txt_password" name="User[password]" placeholder="Mật khẩu" aria-describedby="basic-addon1">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><img src="<?=HTP::$resourceUrl?>/random_image.php"/></span>

                                    <input type="text" class="form-control" id="txt_captcha" name="User[captcha]" placeholder="Captcha" aria-describedby="basic-addon1">
                                </div>
                                <br>
                                <div class="text-right">
                                    <span style="color: red"><?=$this->error;?></span>
                                    <button type="button" class="btn btn-link forgot" id="test">Quên mật khẩu</button>
                                    <button type="submit" class="btn btn-success login" id="btn_login">Đăng nhập</button>
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
                                    <button type="submit" class="btn btn-success reg">Đăng kí</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>