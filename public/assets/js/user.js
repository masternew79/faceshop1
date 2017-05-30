function range(min, max) {
	var range = [];
	for (var i = min; i <= max; i++) {
		range.push(i);
	}
	return range;
}

$(document).ready(function() {
	//load info user
	var user = loadUserInfo();	


	//load provinces, district, ward
	loadProvide();

	$('[name=province]').change(function() {
		loadDistrict($(this).val());
	});

	$('[name=district]').change(function() {
		loadWard($(this).val());
	});

	//hide show button
	
	$('button.updatepass').click(function() {
		$('.form-update-pass').toggleClass('hide');
		$(this).toggleClass('hide');
		$('button.updateinfo').toggleClass('hide');
	});
	$('button.cancelpass').click(function() {
		$('.form-update-pass').toggleClass('hide');
		$('button.updatepass').toggleClass('hide');
		$('button.updateinfo').toggleClass('hide');

	});
	$('button.confirmpass').click(function() {
		$('.form-update-pass').toggleClass('hide');
		$('button.updatepass').toggleClass('hide');
		$('button.updateinfo').toggleClass('hide');
	});
	$('button.updateinfo').click(function() {
		$('button.cancel').toggleClass('hide');
		$('button.confirm').toggleClass('hide');
		$(this).toggleClass('hide');
		$('button.updatepass').toggleClass('hide');
		$('').prop("disabled", false);
		$('[name=name]').prop("disabled", false);
		$('[name=mobile]').prop("disabled", false);
		$('[name=day]').prop("disabled", false);
		$('[name=month]').prop("disabled", false);
		$('[name=year]').prop("disabled", false);
		$('[name=address]').prop("disabled", false);
		$('[name=gender]').prop("disabled", false);
		$('[name=province]').prop("disabled", false);
		$('[name=district]').prop("disabled", false);
		$('[name=ward]').prop("disabled", false);
	});
	$('button.cancel').click(function() {
		$('button.updatepass').toggleClass('hide');
		$('button.updateinfo').toggleClass('hide');
		$(this).toggleClass('hide');
		$('button.confirm').toggleClass('hide');
	});
	$('button.confirm').click(function() {
		$('button.updatepass').toggleClass('hide');
		$('button.updateinfo').toggleClass('hide');
		$(this).toggleClass('hide');
		$('button.cancel').toggleClass('hide');


		$('[name=name]').val();
		$('[name=mobile]').val();
		$('[name=day]').val();
		$('[name=month]').val();
		$('[name=year]').val();
		$('[name=address]').val();
		$('[name=gender]').val();
		$('[name=province]').val();
		$('[name=district]').val();
		$('[name=ward]').val();

		
	});


});



function loadProvide() {
	$.getJSON(baseUrl + '/address/getProvince', {menu: 1}, function(result) {
		selectProvince = $('.select-province');
		selectProvince.empty();
		$.each(result, function(index, value) {
			selectProvince.append($('<option>', {value: value.id, text:value.name}));
		});
	});
}

function loadDistrict(provinceID) {
	$.getJSON(baseUrl + '/address/getDistrict', {province_id: provinceID}, function(result) {
		selectDistrict = $('.select-district');
		selectDistrict.empty();
		$.each(result, function(index, value) {
			selectDistrict.append($('<option>', {value: value.id, text:value.name}));
		});
	});
}

function loadWard(districtID) {
	$.getJSON(baseUrl + '/address/getWard', {district_id: districtID}, function(result) {
		selectWard = $('.select-ward');
		selectWard.empty();
		$.each(result, function(index, value) {
			selectWard.append($('<option>', {value: value.id, text:value.name}));
		});
	});
}

function loadUserInfo() {
	$.getJSON(baseUrl + '/users/getInfo', function(result) {
		console.log(result);
		var DOB = result.dob.split('-');
		var Day = parseInt(DOB[2]);
		var Month = parseInt(DOB[1]);
		var Year = parseInt(DOB[0]);

		$('[name=name]').val(result.name);
		$('[name=mobile]').val(result.mobile);
		$('[name=day]').val(Day);
		$('[name=month]').val(Month);
		$('[name=year]').val(Year);
		$('[name=address]').val(result.address);
		$('[name=gender]').val(parseInt(result.gender));
		$('[name=province]').val(result.province);
		loadDistrict(result.province);
		$('[name=district]').val(result.district);
		loadWard(result.district);
		$('[name=ward]').val(result.ward);
	});
}