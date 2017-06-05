var frontApp = angular.module('frontApp', ['ngStorage']);

frontApp.controller('cartController', function($scope,  $localStorage, $http, $sessionStorage, $window, $location){

	$scope.cart = $localStorage.cart || [];
	$scope.userName = $localStorage.userName || '';
	$scope.user = $localStorage.user || {};

	$scope.pushCart = function(item) {
		var product = {};
		$scope.alertCart = false;
		product.qty = 1;
		product.id = item;

		if ($scope.checkExist(product.id)) {
			$http.post(baseUrl + '/products/get/' + product.id).success(function(result) {
				product.name = result.name;
				product.salePrice = result.salePrice;
				product.img = result.img;
			});

			$scope.cart.push(product);
			alertSuccess('THÊM THÀNH CÔNG');
		} else {
			alertSuccess('SẢN PHẨM ĐÃ CÓ TRONG GIỎ HÀNG');
		}
		console.log($scope.cart);
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
		console.log(1);
		$http.get(baseUrl + '/users/register', {params: {'User[name]': $scope.regName, 'User[email]': $scope.regEmail, 'User[password]': $scope.regPass, 'User[mobile]':$scope.regMobile}}).success(function(result) {
			// console.log($);
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
			$scope.user = result;
			$scope.userName = result.name;
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

	$scope.alertCart = false;
	$scope.checkout = function() {
		if ($scope.cart.length === 0) {
			$scope.alertCart = true;
		} else {
			if ($scope.userName === '') {
				angular.element('.modal').modal('toggle');
				messageModel('Vui lòng đăng nhập');
			} else {
				window.location = baseUrl + '/checkout';
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
			total += item.salePrice * item.qty;
		});
		$scope.total = total;
		if ($scope.total > 500000) {
			$scope.ship = 0;
		} else {
			$scope.ship = 50000;
		}
		$scope.lastPrice = $scope.total + $scope.ship;
	}, true);

	$scope.$watch(function() {
		$localStorage.userName = $scope.userName;
		$localStorage.cart = $scope.cart;
		$localStorage.user = $scope.user;
	});

	$scope.$watch(function() {
		return angular.toJson($localStorage);
	}, function() {
		$scope.userName = $localStorage.userName;
		$scope.cart = $localStorage.cart;
		$scope.user = $localStorage.user;
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


frontApp.controller('categoryController', function($scope, $http, $location, $anchorScroll){
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
		console.log($scope.reverse);
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
		var sort = '';
		if ($scope.reverse) {
			sort = 'DESC';
		} else {
			sort = 'ASC';
		}
		$http.post(baseUrl + '/products/getPage/' + id + '/' + $scope.propertyName + '/' + sort+ '/' + $scope.currentPage).success(function(result) {
			$scope.products = result;
			for (var i = 0; i < result.length; i++) {
				$scope.products[i].count = i;
			}
		});
		
		$anchorScroll();
	};

	$scope.search = $scope.$parent.search;

	$scope.$parent.$watch('search', function(newValue, oldValue, scope) {
	});

	$scope.$watch('currentPage', function(newValue, oldValue, scope) {
		$scope.itemPerPage= 50;
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
				if (i == $scope.currentPage) {
					page.active = true;
				} else {
					page.active = false;
				}
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

frontApp.controller('checkoutController', function($scope, $http, $location){
	$scope.receiverName = $scope.user.name;
	$scope.receiverMobile = $scope.user.mobile;
	$scope.receiverAddress = $scope.user.address;
	$scope.payment = 0;

	$scope.changeReceiverName = function(name) {
		$scope.receiverName = name;
	};
	$scope.changeReceiverMobile = function(Mobile) {
		$scope.receiverMobile = Mobile;
	};
	$scope.changeReceiverAddress = function(Address) {
		$scope.receiverAddress = Address;
	};
	$scope.changePayment = function(pay) {
		$scope.payment = pay;
	};

	$scope.checkout = function() {
		console.log($scope.cart);
		console.log($scope.receiverName);
		console.log($scope.receiverMobile);
		console.log($scope.receiverAddress);
		console.log($scope.payment);

		var products = [];
		angular.forEach($scope.cart, function(value, key){
			var product = {};
			product.product_id = value.id;
			product.count = value.qty;
			product.price = value.salePrice;
			products.push(product);
		});

		var detail = {'product' : products};
		console.log(JSON.stringify(detail));
		$http.post(baseUrl + '/order/add', {params: {'Order[name]': $scope.receiverName, 'Order[mobile]' : $scope.mobile, 'Order[address]' : $scope.receiverAddress, 'detail' : detail }}).success(function(result) {
			console.log(result);
		});
	};
});

frontApp.controller('userInfoController', function($scope){
	if ($scope.user.dob !== null) {
		var DOB = $scope.user.dob.split('-');
		$scope.Day = DOB[2];
		$scope.Month = DOB[1];
		$scope.Year = DOB[0];
		
	}
	$scope.days = range(1, 31);
	$scope.months = range(1, 12);
	$scope.years = range(1950, 2017);

	$scope.updateInfo = false;
	$scope.changeInfo = function() {
		$scope.updateInfo = !$scope.updateInfo;
	};
	$scope.updatePass = false;
	$scope.changePass = function() {
		$scope.updatePass = !$scope.updatePass;
	};
});


frontApp.controller('billController', function($scope, $http){

	$http.get(baseUrl + '/order/getOrder', {params: {user_id: loginID}}).success(function(result) {
		$scope.bills = result;
		console.log(result);
	});
	
	$scope.cancelBill = function(id) {
		console.log(id);
	};
});





