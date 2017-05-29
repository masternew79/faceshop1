<div class="wrapper-login col-md-4 col-md-offset-4">
    <form method="post" action="">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
            <input type="text" name="Admin[username]" class="form-control" placeholder="Email" aria-describedby="basic-addon1" >
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" name="Admin[password]" class="form-control" placeholder="Mật khẩu" aria-describedby="basic-addon1" >
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><img src="<?=HTP::$resourceUrl?>/captcha.php"/></span>
            <input type="text" name="Admin[captcha]" class="form-control" placeholder="Mã xác nhận" aria-describedby="basic-addon1" >
        </div>
        <br>
        <div class="text-center">
            <span style="color: red"><?=$this->error;?></span>
            <button type="submit" class="btn btn-danger">ĐĂNG NHẬP</button>
        </div>
    </form>
</div>