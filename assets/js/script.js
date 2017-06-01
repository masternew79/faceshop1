$(document).ready(function() {
	// parallax
	$('.intro').parallax({imageSrc: 'assets/img/background-new.jpg'});
	//wow
	new WOW().init();
	//title hover
	$('.title a').hover(function() {
		$('.title a i').toggleClass('none animated fadeInRight');
	});
	//product hover
	$('.product').hover(function() {
		$(this).children('.action').toggleClass('visible animated fadeInUp');
		$(this).children('.view').toggleClass('visible animated fadeInDown');
	});
	//tooltip
	$('[data-toggle="tooltip"]').tooltip();
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
	
	$('.quantity').on('click', 'button', function() {
		var input = $(this).closest('div').find('input');
		var value = parseInt(input.val());
		var btn = $(this).context.className;
		if (btn === 'minus') {
			value = value > 1 ? value - 1 : 0;
		} else {
			value = value < 100 ? value + 1 : 100;
		}
		input.val(value);
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

function changeBGColorNavbar() {
	if (!$('.index')[0]) {
		$('.navbar').addClass('nav-red');
	} else {
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



function onloadFuncs() {
	changeBGColorNavbar();
	cssClickButton();
}


window.onload = onloadFuncs;