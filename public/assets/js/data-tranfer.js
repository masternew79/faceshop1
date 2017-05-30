 var navLogin = $('.nav-login');
 var navLogout = $('.nav-logout');
$(".alert").alert();

// var logout = $('.btn-logout');
// logout.click(function() {
//     $.post(baseUrl + '/logout', function(result) {
//         if (result) {
//            navLogin.toggleClass('hide');
//            navLogout.toggleClass('hide');
//        }
//    });
// });

function messageModel(message) {
	$('.content-message-model').text(message);
	$('.message-model').removeClass('hide');
	setTimeout(function() {
		$('.message-model').addClass('hide');
	}, 3000);
}


