
$(document).ready(function() {
	// parallax
	$('.intro').parallax({imageSrc: 'public/assets/img/background-new.jpg'});
	//wow
	new WOW().init();
	//title hover
	$('.title a').hover(function() {
		$('.title a i').toggleClass('none animated fadeInRight');
	});
	
	// open cart list
	$('.cart').click(function() {
		$('.cart-list').removeClass('hidden').addClass('fadeInRight');
	});
	//close cart list
	$('.btn-close').click(function() {
		var cartList = $('.cart-list');
		
		cartList.removeClass('fadeInRight').addClass('fadeOutRight');
		
		setTimeout(function() {
			cartList.toggleClass('hidden fadeOutRight');
		}, 1000);
	});
	//close cart-list
	$(document).mouseup(function(event) {
		var cart = $('.cart-list');
		if (!cart.is(event.target) && cart.has(event.target).length ===0 && !cart.hasClass('hidden')) {
			var cartList = $('.cart-list');
			cartList.removeClass('fadeInRight').addClass('fadeOutRight');
			setTimeout(function() {
				cartList.toggleClass('hidden fadeOutRight');
			}, 1000);
		}
	});
	
	//tooltipster
	$('.tooltipleft').tooltipster({
		side: 'left',
		animation: 'grow',
		contentCloning: true,
		theme: 'tooltipster-shadow',
		contentAsHTML: true,

	});
	$('.tooltipright').tooltipster({
		side: 'right',
		animation: 'grow',
		contentAsHTML: true,
		theme: 'tooltipster-shadow',
		contentCloning: true
	});
	//owl.carousel
	$('.owl-carousel').owlCarousel({
		loop: true,
		autoWidth: true,
		item: 2
	});
	//sort click button
	$('.sort button').click(function() {
		var i = $(this).children('i');
		if (i.hasClass('fa-caret-down')) {
			i.removeClass('fa-caret-down');
			i.addClass('fa-caret-up');
		} else {
			i.removeClass('fa-caret-up');
			i.addClass('fa-caret-down');
		}
	});
	//plus and minus quantity
	$('.quantity').on('click', 'button', function() {
		var input = $(this).closest('div').find('input');
		var value = parseInt(input.val());
		var btn = $(this).context.className;
		if (btn === 'minus') {
			value = value > 1 ? value - 1 : 1;
		} else {
			value = value < 100 ? value + 1 : 100;
		}
		input.val(value);
	});

	$(window).scroll(function(){ 
		if ($(this).scrollTop() > 100) { 
			$('#back-to-top').fadeIn(); 
		} else { 
			$('#back-to-top').fadeOut(); 
		} 
	});
	
	$('#back-to-top').on('click', function (e) {
		e.preventDefault();
		$('html,body').animate({
			scrollTop: 0
		}, 700);
	});
});

function scrollNavbar() {
	var scrollPos = 0;
	$(document).scroll(function() {
		scrollPos = $(this).scrollTop();
		if (scrollPos > 400) {
			$('.navbar').addClass('nav-red');
		} else {
			$('.navbar').removeClass('nav-red');
		}
	});
}
function confirmPosition() {
	var positionOfWrapper = $('.wrapper').offset().top;
	var positionWindow = $(window).scrollTop();
	if (positionWindow > positionOfWrapper) {
		$('.navbar').addClass('nav-red');
	} else {
		$('.navbar').removeClass('nav-red');
	}
}

function changeBGColorNavbar() {
	if (!$('.index')[0]) {
		$('.navbar').addClass('nav-red');
	} else {
		confirmPosition();
		scrollNavbar();
	}
}

function cssClickButton() {
	$('.sort').find('button').click(function() {
		$(this).css({
			borderColor: '#444',
			backgroundColor: '#fff',
			outline: 0,
			color: '#444',
			inline: 0
		});
	});
}

function closeCart() {
	var cartList = $('.cart-list');
	cartList.removeClass('fadeInRight').addClass('fadeOutRight');
	setTimeout(function() {
		cartList.toggleClass('fadeOutRight hidden');
		console.log(1);
	}, 500);
}

function onloadFuncs() {
	changeBGColorNavbar();
	cssClickButton();
}
function alertSuccess(str) {
	var success = $('.add-success');
	success.html('<span>'+ str + '</span><i class="fa fa-check"></i>');
	success.removeClass('hidden').addClass('fadeInDown');
	setTimeout(function() {
		success.removeClass('fadeInDown').addClass('fadeOutDown');
	}, 1000);
	setTimeout(function() {
		success.toggleClass('hidden fadeOutDown');
	}, 1500);
}
window.onload = onloadFuncs;

