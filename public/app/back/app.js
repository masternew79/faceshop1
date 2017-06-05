var adminApp = angular.module('adminApp', []);

adminApp.controller('adminController', function(){
	
});


adminApp.controller('productController', function($scope, $http, $location, $anchorScroll){
	$http.get(baseUrl + '/product/getProducts/id').success(function(result) {
		$scope.products = result;
	});

	$scope.propertyName = 'id';
	$scope.currentPage = 1;
	$scope.reverse = true;
	$scope.currentPage = 1;

	$scope.sortBy = function(propertyName) {
		$scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
		$scope.propertyName = propertyName;
		var sort = '';
		if ($scope.reverse) {
			sort = 'DESC';
		} else {
			sort = 'ASC';
		}
		$http.get(baseUrl + '/product/getProducts/' + $scope.propertyName + '/' + sort + '/' + $scope.currentPage).success(function(result) {
			$scope.products = result;
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
		$http.post(baseUrl + '/product/getProducts/' + $scope.propertyName + '/' + sort + '/' + $scope.currentPage).success(function(result) {
			$scope.products = result;
			for (var i = 0; i < result.length; i++) {
				$scope.products[i].count = i;
			}
		});
		
		$anchorScroll();
	};

	$scope.$watch('currentPage', function(newValue, oldValue, scope) {
		$scope.itemPerPage= 28;
		$scope.totalPage = 0;
		$scope.paging = [];
		$http.post(baseUrl + '/product/getTotalPage').success(function(result) {
			$scope.totalPage = result.count;
			$scope.groups = Math.ceil($scope.totalPage / $scope.itemPerPage);
			var group = 5;
			var begin = 1;
			var end = $scope.totalPage / 30;
			
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

	$scope.typing = function() {
		if ($scope.search !== '') {
			$http.get(baseUrl + '/product/getProductByKey/' + $scope.search).success(function(result) {
				$scope.products = result;
				for (var i = 0; i < result.length; i++) {
					$scope.products[i].count = i;
				}
			});
		} else {
			$scope.changePage($scope.currentPage);
		}
	};

	$scope.$watch('search', function(newValue, oldValue, scope) {
		console.log($scope.search);
	});
});


adminApp.controller('userController', function($scope, $http, $location, $anchorScroll){
	$http.get(baseUrl + '/user/getUsers').success(function(result) {
		$scope.users = result;
	});
});
