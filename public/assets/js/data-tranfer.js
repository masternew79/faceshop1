

// $('#btn-login').click(function () {
//         console.log(1);
//         var data = $("#txt_email").val();
//         console.log(data);
//         var data2 = $("#txt_password").val();
//         var data3 = $("#txt_captcha").val();
//         $.post("<?=HTP::$baseUrl?>/login",
//             {
//                 "User[email]": data,
//                 "User[password]": data2,
//                 "User[captcha]": data3
//             },
//             function(data8,status){
//             if(data8)
//                 var result = JSON.parse(data8);
//             console.info(result);
//             if(result["code"] != 1)
//             {
//                 //$('#img_captcha').attr('src').replaceWith("<?=HTP::$resourceUrl?>/random_image.php");
//                 document.getElementById("captcha").innerHTML = '<img src="<?=HTP::$resourceUrl?>/captcha.php"/>'
//                 document.getElementById("error_mesage").innerHTML = result["message"];
//             }
//             });
//     });

 var navLogin = $('.nav-login');
 var navLogout = $('.nav-logout');


// if (loginID !== '') {
//     navLogin.addClass('hide');
//     navLogout.toggleClass('hide');
// }

// var login = $('.btn-login');
// login.click(function() {
//     var email = $('#login-input-email').val();
//     var pass = $('#login-input-pass').val();
//     var capt = $('#login-input-captcha').val();
//     var data = {'email' : email, 'password' : pass, 'capt' : capt};
//     $.post(baseUrl + '/login', data, function(result) {
//         if (result) {
//             var obj = JSON.parse(result);
//             if (obj.code == 1) {
//                 $('.modal').modal('toggle');
//                 navLogin.toggleClass('hide');
//                 navLogout.toggleClass('hide');
//                 setTimeout(function() {
//                     var str = 'ĐĂNG NHẬP THÀNH CÔNG';
//                     alertSuccess(str);
//                 }, 500);
//             } 
            
//         }
//     });
// });




var logout = $('.btn-logout');
logout.click(function() {
    $.post(baseUrl + '/logout', function(result) {
        if (result) {
           navLogin.toggleClass('hide');
           navLogout.toggleClass('hide');
       }
   });
});


