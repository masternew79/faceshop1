var frontApp = angular.module('frontApp', ['ngStorage', 'ngRoute']);



frontApp.controller('cartController', ['$scope',  '$localStorage', '$http',
    '$sessionStorage', '$window',function($scope,  $localStorage, $http, $window){
	$scope.cart = $localStorage.cart || [];
	$scope.name = $localStorage.name || '';
    $scope.email = $localStorage.email || '';
    $scope.mobile = $localStorage.mobile || '';
    $scope.dob = $localStorage.dob || '';
    $scope.address = $localStorage.address || '';
    $scope.ward = $localStorage.ward || '';
    $scope.district = $localStorage.district || '';
    $scope.province = $localStorage.province || '';
    $scope.gender = $localStorage.gender || '';

	$scope.checkExist = function(id) {
		if ($scope.cart.length !== 0) {
			for (var i = 0; i < $scope.cart.length; i++) {
				if($scope.cart[i].id === id) {
					return false;
				}
			}
			return true;
		} else {
			return true;
		}
	};

	$scope.addCart = function(item) {
		var obj = {};

		obj.id = item.target.parentNode.getAttribute("data-id") === null ? item.target.parentNode.parentNode.getAttribute("data-id") : item.target.parentNode.getAttribute("data-id");

		obj.qty = 1;

		$http.post(baseUrl + '/products/get/' + obj.id).success(function(result) {
			obj.name = result.name.substring(0, 30) + '...';
			obj.price = result.price;
			obj.img = result.img;
		});
		if ($scope.checkExist(obj.id)) {
			$scope.cart.push(obj);
			alertSuccess('THÊM THÀNH CÔNG');
		} else {
			alertSuccess('SẢN PHẨM ĐÃ CÓ TRONG GIỎ HÀNG');
		}
	};

	$scope.login = function() {
        console.log($scope.email + $scope.password + $scope.captcha);
        $http.post(baseUrl + '/users/login/' + $scope.email + '/' + $scope.password + '/' + $scope.captcha).success(function(result) {
	        $scope.name = result.name;
	        $scope.email = result.email;
	        $scope.mobile = result.mobile;
	        $scope.dob = result.dob;
	        $scope.address = result.address;
	        $scope.ward = result.ward;
	        $scope.district = result.district;
	        $scope.province = result.province;
	        $scope.gender = result.gender;
	        console.log(result);
	        if (result.code == 1) {
	        	angular.element('.modal').modal('toggle');
	        }
        });

    };

    $scope.logout = function() {
    	$http.post(baseUrl + '/logout').success(function(result) {
	        if (result) {
	        	$scope.name = '';
	        }
        });
    };
    
	$scope.count = $scope.cart.forEach(function(product) {
		var i = 0;
		i++;
		return i;
	});

	$scope.remove = function(item) {
		var id = item.target.parentNode.parentNode.getAttribute('data-id');
		for (var i = $scope.cart.length - 1; i >= 0; i--) {
			if ($scope.cart[i].id == id) {
				$scope.cart.splice(i, 1);
			}
		}

	};

	$scope.plus = function(item) {
		var id = item.target.parentNode.parentNode.getAttribute('data-id') === null ? item.target.parentNode.parentNode.parentNode.getAttribute('data-id') : item.target.parentNode.parentNode.getAttribute('data-id');
		$scope.cart.forEach(function(product) {
			if (product.id == id) {
				product.qty++;
			}
		});
	};

	$scope.minus = function(item) {
		var id = item.target.parentNode.parentNode.getAttribute('data-id') === null ? item.target.parentNode.parentNode.parentNode.getAttribute('data-id') : item.target.parentNode.parentNode.getAttribute('data-id');
		$scope.cart.forEach(function(product) {
			if (product.id == id) {
				if (product.qty > 1) {
					product.qty--;
				} else {
					product.qty = 1;
				}
			}
		});
	};

	$scope.$watch('cart', function(newValue, oldValue, scope) {
		var total = 0;
		$scope.cart.forEach(function(item) {
			total += item.price * item.qty;
		});
		$scope.total = total;
	}, true);


	$scope.$watch(function() {
		$localStorage.name = $scope.name;
        $localStorage.email = $scope.email;
        $localStorage.mobile = $scope.mobile;
        $localStorage.dob = $scope.dob;
        $localStorage.address = $scope.address;
        $localStorage.ward = $scope.ward;
        $localStorage.district = $scope.district;
        $localStorage.province = $scope.province;
        $localStorage.gender = $scope.gender;
	});

	$scope.$watch(function() {
    return angular.toJson($localStorage);
	}, function() {
	    $scope.name = $localStorage.name;
        $scope.email = $localStorage.email;
        $scope.mobile = $localStorage.mobile;
        $scope.dob = $localStorage.dob;
      	$scope.address = $localStorage.address;
        $scope.ward = $localStorage.ward;
        $scope.district = $localStorage.district;
        $scope.province = $localStorage.province;
        $scope.gender = $localStorage.gender;
	});

}]);

frontApp.controller('categoryController', ['$scope', '$http', '$location', 'orderByFilter', function($scope, $http, $location, orderBy){
	var url = $location.absUrl();
	var splitedUrl = url.split('/');
	var countSplited = splitedUrl.length;
	var type = splitedUrl[countSplited - 2];
	var id = splitedUrl[countSplited - 1];
	$scope.propertyName = 'creat_at';
	$scope.products = [];
	$scope.currentPage = 1;
	$scope.reverse = true;
	let products = [];
	$http.post(baseUrl + '/products/getPage/' + id + '/' + $scope.propertyName + '/DESC').success(function(result) {
		for (var i = 0; i < result.length; i++) {
			var obj = {};
			obj.id = result[i].id;
			obj.name = result[i].name.substring(0, 30) + '...';
			obj.price = result[i].price;
			obj.img = result[i].img;
			obj.view = result[i].view;
			obj.description = result[i].description;
			obj.sold = result[i].sold;
			obj.sale_off = result[i].sale_off;
			obj.salePrice = result[i].salePrice;
			obj.create_at = result[i].create_at;
			obj.count = i;
			products.push(obj);
		}
		console.log(products);
		});
	$scope.products = products;

	$scope.sortBy = function(propertyName) {
		$scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
    	$scope.propertyName = propertyName;
    	let sort = '';
    	if ($scope.reverse) {
    		sort = 'DESC';
    	} else {
    		sort = 'ASC';
    	}
    	$http.post(baseUrl + '/products/getPage/' + id + '/' + $scope.propertyName + '/' + sort + '/' + $scope.currentPage).success(function(result) {
    	let products = [];
		for (var i = 0; i < result.length; i++) {
			var obj = {};
			obj.id = result[i].id;
			obj.name = result[i].name.substring(0, 30) + '...';
			obj.price = result[i].price;
			obj.img = result[i].img;
			obj.view = result[i].view;
			obj.description = result[i].description;
			obj.sold = result[i].sold;
			obj.sale_off = result[i].sale_off;
			obj.salePrice = result[i].salePrice;
			obj.count = i;
			products.push(obj);
		}
		$scope.products = products;
		});
	};

	$scope.changePage = function($index) {
		$scope.currentPage = $index;
		console.log($scope.currentPage);
		let products = [];
		$http.post(baseUrl + '/products/getPage/' + id + '/' + $scope.propertyName + '/DESC/' + $scope.currentPage).success(function(result) {
		for (var i = 0; i < result.length; i++) {
			var obj = {};
			obj.id = result[i].id;
			obj.name = result[i].name.substring(0, 30) + '...';
			obj.price = result[i].price;
			obj.img = result[i].img;
			obj.view = result[i].view;
			obj.description = result[i].description;
			obj.sold = result[i].sold;
			obj.sale_off = result[i].sale_off;
			obj.create_at = result[i].create_at;
			obj.salePrice = result[i].salePrice;
			obj.count = i;
			products.push(obj);
		}
		});
		$scope.products = products;
		console.log($scope.products);
	};

	$scope.$watch('currentPage', function(newValue, oldValue, scope) {
		$scope.itemPerPage= 28;
		$scope.totalPage = 0;
		$scope.paging = [];
		$http.post(baseUrl + '/products/getTotalPage/' + id).success(function(result) {
			$scope.totalPage = result.count;
			$scope.groups = Math.ceil($scope.totalPage / $scope.itemPerPage);
			var group = 5;
			var begin = 1;
			var end = 5;
			if ($scope.groups > 5) {
				begin = $scope.currentPage - 2;
				end = $scope.currentPage + 2;
				if (begin < 1) {
					begin = 1;
					end = group;
				}
				if (end > $scope.groups) {
					begin = $scope.groups - group;
					end = $scope.groups;
				}
			} else {
				begin = 1;
				end = $scope.groups;
			}
			for (var i = begin; i <= end; i++) {
				var page = {};
				page.link = i;
				$scope.paging.push(page);
			}
		});

		

	});
}]);

frontApp.config(function($routeProvider) {
	$routeProvider.when('/', {
		templateUrl: resourceUrl + '/template/default/user/info.php',
		controller: 'infoController'
	})
	.when('/bill' , {
		templateUrl: resourceUrl + '/template/default/user/bill.php',
		controller: 'billController'
	});
});

// frontApp.controller('infoController', ['$scope', '$http' , '$localStorage', function($scope, $http, $localStorage){
// 	$scope.updateInfo = false;
// 	$scope.updatePass = false;

// 	$scope.changeInfo = function () {
// 		$scope.updateInfo = !$scope.updateInfo;
// 	};

// 	$scope.changePass = function () {
// 		$scope.updatePass = !$scope.updatePass;
// 	};

// 	$scope.name = $localStorage.name || '';
//     $scope.email = $localStorage.email || '';
//     $scope.mobile = $localStorage.mobile || '';
//     $scope.dob = $localStorage.dob || '';
//     $scope.address = $localStorage.address || '';
//     $scope.ward_id = $localStorage.ward_id || '';
//     $scope.district_id = $localStorage.district_id || '';
//     $scope.province_id = $localStorage.province_id || '';
//     $scope.gender = $localStorage.gender || '';

// 	$http.post(baseUrl + '/users/getInfo').success(function(result) {
// 		$scope.name = result.name;
//         $scope.email = result.email;
//         $scope.mobile = result.mobile;
//         $scope.dob = result.dob;
//         $scope.address = result.address;
//         $scope.ward_id = result.ward;
//         $scope.district_id = result.district;
//         $scope.province_id = result.province;
//         $scope.gender = result.gender;
// 	});

// 	var DOB = $scope.dob.split('-');

// 	$scope.Day = DOB[2];
// 	$scope.Month = DOB[1];
// 	$scope.Year = DOB[0];

// 	$http.get(baseUrl + '/address/getProvince', {params: { menu: 1}}).success(function(result) {
// 		var provinces = [];
// 		for (var i = 0; i < result.length; i++) {
// 			var obj = {};
// 			obj.id = result[i].id;
// 			obj.name = result[i].name;
// 			provinces.push(obj);
// 		}
// 		$scope.provinces = provinces;
// 	});

// 	$scope.updateDistrict = function() {
// 		console.log($scope.province);
// 	};
// 	$scope.$watch('currentProvince', function(newValue, oldValue, scope) {
// 		console.log($scope.currentProvince);
// 	});

// 	$http.get(baseUrl + '/address/getDistrict', {params: { province_id : $scope.province}}).success(function(result) {
// 		var districts = [];
// 		for (var i = 0; i < result.length; i++) {
// 			var obj = {};
// 			obj.id = result[i].id;
// 			obj.name = result[i].name;
// 			districts.push(obj);
// 		}
// 		$scope.districts = districts;
// 		console.log(result);
// 	});

// 	$http.get(baseUrl + '/address/getWard', {params: { district_id : $scope.district}}).success(function(result) {
// 		var wards = [];
// 		for (var i = 0; i < result.length; i++) {
// 			var obj = {};
// 			obj.id = result[i].id;
// 			obj.name = result[i].name;
// 			wards.push(obj);
// 		}
// 		$scope.wards = wards;
// 		console.log(result);
// 	});

// 	$scope.range = function(min, max) {
// 		var range = [];
// 		for (var i = min; i <= max; i++) {
// 			range.push(i);
// 		}
// 		return range;
// 	};

// 	$scope.$watch(function() {
// 		$localStorage.name = $scope.name;
//         $localStorage.email = $scope.email;
//         $localStorage.mobile = $scope.mobile;
//         $localStorage.dob = $scope.dob;
//         $localStorage.address = $scope.address;
//         $localStorage.ward_id = $scope.ward_id;
//         $localStorage.district_id = $scope.district_id;
//         $localStorage.province_id = $scope.province_id;
//         $localStorage.gender = $scope.gender;
// 	});

// 	$scope.$watch(function() {
//     return angular.toJson($localStorage);
// 	}, function() {
// 	    $scope.name = $localStorage.name;
//         $scope.email = $localStorage.email;
//         $scope.mobile = $localStorage.mobile;
//         $scope.dob = $localStorage.dob;
//       	$scope.address = $localStorage.address;
//         $scope.ward_id = $localStorage.ward_id;
//         $scope.district_id = $localStorage.district_id;
//         $scope.province_id = $localStorage.province_id;
//         $scope.gender = $localStorage.gender;
// 	});
// }]);


// frontApp.controller('billController', ['$scope', function($scope){
	
// }]);



