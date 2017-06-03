var frontApp = angular.module('frontApp', ['ngStorage']);

frontApp.controller('cartController', function($scope,  $localStorage, $http, $sessionStorage, $window, $location){

	$scope.cart = $localStorage.cart || [];
	$scope.userName = $localStorage.userName || '';

	$scope.pushCart = function(item) {
		var product = {};

		product.qty = 1;
		product.id = item;

		if ($scope.checkExist(product.id)) {
			$http.post(baseUrl + '/products/get/' + product.id).success(function(result) {
				product.name = result.name;
				product.price = result.price;
				product.img = result.img;
			});

			$scope.cart.push(product);
			alertSuccess('THÊM THÀNH CÔNG');
		} else {
			alertSuccess('SẢN PHẨM ĐÃ CÓ TRONG GIỎ HÀNG');
		}
	};

	$scope.spliceCart = function(item) {
		var id = item.target.parentNode.parentNode.getAttribute('data-id');
		
		for (var i = $scope.cart.length - 1; i >= 0; i--) {
			if ($scope.cart[i].id == id) {
				$scope.cart.splice(i, 1);
			}
		}
	};

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

	$scope.register = function() {
		$http.get(baseUrl + '/users/register', {params: {'User[name]': $scope.regName, 'User[email]': $scope.regEmail, 'User[password]': $scope.regPass, 'User[mobile]':$scope.regMobile}}).success(function(result) {
			console.log(result);

			if (result.code !== 1 && result.code !==2) {
				login($scope.regEmail, $scope.regPass, $scope.regCaptcha);

			}
		});
	};

	$scope.login = function() {
		login($scope.email, $scope.password, $scope.captcha);
	};

	function login(email, password, captcha) {
		$http.post(baseUrl + '/users/login/' + email + '/' + password + '/' + captcha).success(function(result) {
			console.log(result);
			$scope.id = result.id;
			$scope.userName = result.name;
			$scope.email = result.email;
			$scope.mobile = result.mobile;
			$scope.dob = result.dob;
			$scope.address = result.address;
			$scope.ward = result.ward;
			$scope.district = result.district;
			$scope.province = result.province;
			$scope.gender = result.gender;
			if (result.code == 1) {
				angular.element('.modal').modal('toggle');
			}
			if (result.code != 1) {
				messageModel(result.message);
			}
		});
	}

	$scope.logout = function() {
		delete $scope.userName;
		delete $localStorage.userName;
		$scope.userName = '';

		$http.get(baseUrl + '/logout').success(function(result) {
			console.log(result);
			window.location = baseUrl;
		});
	};

	$scope.checkout = function() {
		console.log(1);
		if ($scope.userName === '') {
			angular.element('.modal').modal('toggle');
			messageModel('Vui lòng đăng nhập');
		} else {
			$window.location.href = baseUrl + '/checkout';
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
		if ($scope.total > 500000) {
			$scope.ship = 0;
		} else {
			$scope.ship = 50000;
		}
		$scope.thanhtien = $scope.total + $scope.ship;
	}, true);

	$scope.checkout = function() {
		var product = [];
		for (var i = 0; i < $scope.cart.length; i++) {
			var pro = {};
			pro.id = $scope.cart[i].id;
			pro.price = $scope.cart[i].price;
			pro.qty = $scope.cart[i].qty;
			product.push(pro);
		}
		console.log(product);
	};

	$scope.$watch(function() {
		$localStorage.userName = $scope.userName;
		$localStorage.cart = $scope.cart;
	});

	$scope.$watch(function() {
		return angular.toJson($localStorage);
	}, function() {
		$scope.name = $localStorage.name;
		$scope.cart = $localStorage.cart;
	});
});

frontApp.controller('indexController', function($scope, $http, $sce){
	//bestSelling
	$http.get(baseUrl + '/products/get1stBy/sold').success(function(result) {
		$scope.bestSelling = result;
		$scope.bestSelling.description = $sce.trustAsHtml(result.description);
	});
	//newest
	$http.get(baseUrl + '/products/get1stBy/creat_at').success(function(result) {
		$scope.newest = result;
		$scope.newest.description = $sce.trustAsHtml(result.description);
	});
	//biggestdiscount
	$http.get(baseUrl + '/products/get1stBy/sale_off').success(function(result) {
		$scope.biggestDiscount = result;
		$scope.biggestDiscount.description = $sce.trustAsHtml(result.description);
	});
	//top2-7 selling
	$http.get(baseUrl + '/products/getTop2To7/sold').success(function(result) {
		$scope.sellings = result;
		for (var i = 0; i < $scope.sellings.length; i++) {
			$scope.sellings[i].description = $sce.trustAsHtml(result[i].description);
			$scope.sellings[i].count = i;
		}
	});
	//top2-7 new
	$http.get(baseUrl + '/products/getTop2To7/creat_at').success(function(result) {
		$scope.news = result;
		for (var i = 0; i < $scope.news.length; i++) {
			$scope.news[i].description = $sce.trustAsHtml(result[i].description);
			$scope.news[i].count = i;
		}
	});
	//top2-7 discount
	$http.get(baseUrl + '/products/getTop2To7/sale_off').success(function(result) {
		$scope.discounts = result;
		for (var i = 0; i < $scope.discounts.length; i++) {
			$scope.discounts[i].description = $sce.trustAsHtml(result[i].description);
			$scope.discounts[i].count = i;
		}
	});

	$scope.increaseView = function(item) {

	};
});


frontApp.controller('categoryController', function($scope, $http, $location){
	var url = $location.absUrl();
	var splitedUrl = url.split('/');
	var countSplited = splitedUrl.length;
	var type = splitedUrl[countSplited - 2];
	var id = splitedUrl[countSplited - 1];

	$scope.propertyName = 'creat_at';
	$scope.currentPage = 1;
	$scope.reverse = true;

	$http.post(baseUrl + '/products/getPage/' + id + '/' + $scope.propertyName + '/DESC').success(function(result) {
		$scope.products = result;
		for (var i = 0; i < result.length; i++) {
			$scope.products[i].count = i;
		}
	});

	$scope.sortBy = function(propertyName) {
		$scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
		$scope.propertyName = propertyName;
		var sort = '';
		if ($scope.reverse) {
			sort = 'DESC';
		} else {
			sort = 'ASC';
		}
		$http.post(baseUrl + '/products/getPage/' + id + '/' + $scope.propertyName + '/' + sort + '/' + $scope.currentPage).success(function(result) {
			$scope.products = result;
			for (var i = 0; i < result.length; i++) {
				$scope.products[i].count = i;
			}
		});
	};

	$scope.changePage = function($index) {
		$scope.currentPage = $index;
		$http.post(baseUrl + '/products/getPage/' + id + '/' + $scope.propertyName + '/DESC/' + $scope.currentPage).success(function(result) {
			$scope.products = result;
			for (var i = 0; i < result.length; i++) {
				$scope.products[i].count = i;
			}
		});
		$scope.paging[$index].active = true;
		console.log($scope.paging[$index].active);
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
				page.active = false;
				$scope.paging.push(page);
			}
		});
	});





	$scope.updateInfo = false;
	$scope.updatePass = false;

	$scope.changeInfo = function () {
		$scope.updateInfo = !$scope.updateInfo;
	};

	$scope.changePass = function () {
		$scope.updatePass = !$scope.updatePass;
	};
});




// frontApp.controller('billController', ['$scope', '$localStorage', '$http',function($scope, $localStorage, $http){

// 	$http.get(baseUrl + '/order/getOrder', {params: {user_id: loginID}}).success(function(result) {
// 		$scope.bills = result;
// 		console.log(result);
// 	});

// 	$scope.cancelBill = function(id) {
// 		console.log(id);
// 	};
// }]);





