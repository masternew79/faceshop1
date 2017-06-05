function range(min, max) {
	var range = [];
	for (var i = min; i <= max; i++) {
		range.push(i);
	}
	return range;
}
<<<<<<< HEAD
=======

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

	$('.btn-register').click(function() {
		var Name = $('[ng-model=regName]').val();
		var Email = $('[ng-model=regEmail]').val();
		var Mobile = $('[ng-model=regMobile]').val();
		var Pass = $('[ng-model=regPass]').val();
		$.post(baseUrl+'/users/register',{'User[name]': Name, 'User[mobile]': Mobile,  'User[email]': Email, 'User[password]': Pass}, function(result) {
			if (result.code == 1) {

			}
		});
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
		Disable(false);		
	});
	$('button.cancel').click(function() {
		$('button.updatepass').toggleClass('hide');
		$('button.updateinfo').toggleClass('hide');
		$(this).toggleClass('hide');
		$('button.confirm').toggleClass('hide');
		Disable(true);	
	});
	$('button.confirm').click(function() {
		$('button.updatepass').toggleClass('hide');
		$('button.updateinfo').toggleClass('hide');
		$(this).toggleClass('hide');
		$('button.cancel').toggleClass('hide');
		Disable(true);	


		var name = $('[name=name]').val();
		var mobile = $('[name=mobile]').val();
		var day = $('[name=day]').val();
		var month = $('[name=month]').val();
		var year = $('[name=year]').val();
		var dob = year+'-'+month+'-'+day;
		var address = $('[name=address]').val();
		var gender = $('[name=gender]').val();
		var province = $('[name=province]').val();
		var district = $('[name=district]').val();
		var ward = $('[name=ward]').val();
<<<<<<< HEAD

		$.post(baseUrl+'/users/updateInfo', {'User[id]': loginID ,'User[name]': name, 'User[mobile]': mobile, 'User[dob]': dob, 'User[address]': address, 'User[gender]': gender, 'User[province]': province, 'User[district]': district, 'User[ward]': ward}, function(result) {
		console.log(loginID);

		$.post(baseUrl+'/users/updateInfo',{'User[id]': loginID, 'User[name]': name, 'User[mobile]': mobile, 'User[dob]': dob, 'User[address]': address, 'User[gender]': gender, 'User[province]': province, 'User[district]': district, 'User[ward]': ward}, function(result) {

=======

		$.post(baseUrl+'/users/updateInfo',{'User[id]': loginID, 'User[name]': name, 'User[mobile]': mobile, 'User[dob]': dob, 'User[address]': address, 'User[gender]': gender, 'User[province]': province, 'User[district]': district, 'User[ward]': ward}, function(result) {
>>>>>>> dev
			console.log(result);
		});
	});

	$('button.confirmpass').click(function() {
		var currentPass = $('[name=current-password]').val();
		var newPass = $('[name=new-password]').val();
		var reEnter = $('[name=re-enter]').val();

		if (newPass == reEnter) {
			$.post(baseUrl+'/users/checkPassword',{'password': currentPass, 'id': loginID}, function(result) {
				if (result) {
					$.post(baseUrl+'/users/updateInfo',{'User[password]': newPass}, function(result) {
						console.log(result);
					});
				}
			});
		}
	});

});

function Disable(bool) {
	$('[name=name]').prop("disabled", bool);
	$('[name=mobile]').prop("disabled", bool);
	$('[name=day]').prop("disabled", bool);
	$('[name=month]').prop("disabled", bool);
	$('[name=year]').prop("disabled", bool);
	$('[name=address]').prop("disabled", bool);
	$('[name=gender]').prop("disabled", bool);
	$('[name=province]').prop("disabled", bool);
	$('[name=district]').prop("disabled", bool);
	$('[name=ward]').prop("disabled", bool);
}



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

>>>>>>> 2a9c0fa8b07211229db43e07b2607b4b0b0b2144
