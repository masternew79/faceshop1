var loginEmail = $('#login-input-email');
var loginPass = $('#login-input-pass');
var loginCaptcha = $('#login-input-captcha');
var btnLogin = $('.btn-login');
btnLogin.on('click', function(event) {
    event.preventDefault();
    if (loginEmail.val() === '') {
        showMes('login', 'email');
    }
    if (loginPass.val() === '') {
        showMes('login', 'pass');
    }
    if (loginCaptcha.val() === '') {
        showMes('login', 'captcha');
    }
});

var regEmail = $('#reg-input-email');
var regPass = $('#reg-input-pass');
var regName = $('#reg-input-name');
var btnReg = $('.btn-register');
btnReg.on('click', function(event) {
    event.preventDefault();
    if (regEmail.val() === '') {
        showMes('reg', 'email');
    }
    if (regPass.val() === '') {
        showMes('reg', 'pass');
    }
    if (regName.val() === '') {
        showMes('reg', 'name');
    }
});

function showMes(action, type) {
    var mess = '';
    if (type == 'pass') {
        mess = 'mật khẩu';
    } else if (type == 'name') {
        mess = 'họ và tên';
    } else {
        mess = 'email';
    }
    $('.'+ action +'-message-'+ type).addClass('show').html('<i class="fa fa-exclamation-triangle"></i> Vui lòng nhập '+mess+'!').removeClass('hide');
}

loginEmail.blur(function() {
    var email = $(this).val();
    var message = $('.login-message-email');
    if (email === '') {
        message.addClass('show').html('<i class"fa fa-exclamation-triangle"></i> Email không được bỏ trống!').removeClass('hide');
    } else {
        if (!validateEmail(email)) {
            message.html('<i class"fa fa-exclamation-triangle"></i> Email không hợp lệ!').toggleClass('show');
        } else {
            message.addClass('hide').removeClass('show');
        }
        
    }
});

loginPass.blur(function() {
    var pass = $(this).val();
    var message = $('.login-message-pass');
    if (pass === '') {
        message.addClass('show').html('<i class="fa fa-exclamation-triangle"></i> Vui lòng nhập mật khẩu!').removeClass('hide');
    } else {
        if (pass.length < 3) {
            message.addClass('show').html('<i class="fa fa-exclamation-triangle"></i> Mật khẩu có ít nhất 3 kí tự!');
        } else {
            message.addClass('hide').removeClass('show');
        }
    }
});

loginCaptcha.blur(function() {
    var captcha = $(this).val();
    var message = $('.login-message-captcha');
    if (captcha === '') {
        message.addClass('show').html('<i class="fa fa-exclamation-triangle"></i> Vui lòng nhập mã xác nhận!').removeClass('hide');
    } else {
        if (captcha.length != 5) {
            message.addClass('show').html('<i class="fa fa-exclamation-triangle"></i> Mã xác nhận phải có đúng 5 kí tự!');
        } else {
            message.addClass('hide').removeClass('show');
        }
    }
});

regEmail.blur(function() {
    var email = $(this).val();
    var message = $('.reg-message-email');
    if (email === '') {
        message.addClass('show').html('<i class"fa fa-exclamation-triangle"></i> Email không được bỏ trống!').removeClass('hide');
    } else {
        if (!validateEmail(email)) {
            message.html('<i class"fa fa-exclamation-triangle"></i> Email không hợp lệ!').toggleClass('show');
        } else {
            message.addClass('hide').removeClass('show');
        }
        
    }
});

regPass.blur(function() {
    console.log(1);
    var pass = $(this).val();
    console.log(pass);
    var message = $('.reg-message-pass');
    if (pass === '') {
        message.addClass('show').html('<i class="fa fa-exclamation-triangle"></i> Vui lòng nhập mật khẩu!').removeClass('hide');
    } else {
        if (pass.length < 5) {
            message.addClass('show').html('<i class="fa fa-exclamation-triangle"></i> Mật khẩu có ít nhất 5 kí tự!');
        } else {
            message.addClass('hide').removeClass('show');
        }
    }
});

regName.blur(function() {
    var captcha = $(this).val();
    var message = $('.reg-message-name');
    if (captcha === '') {
        message.addClass('show').html('<i class="fa fa-exclamation-triangle"></i> Vui lòng nhập họ và tên!').removeClass('hide');
    } else {
        message.addClass('hide').removeClass('show');
    }
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}