adminApp.config(['$routeProvider', '$locationProvider',function($routeProvider, $locationProvider) {
	$routeProvider
	.when('/product' , {
		templateUrl: '../template/admin/product.php',
		controller: 'product'
	})
	.when('/user' , {
		templateUrl: '../template/admin/user.php',
		controller: 'user'
	})
	.when('/trademark' , {
		templateUrl: '../template/admin/trademark.php',
		controller: 'trademark'
	})
	.when('/addProduct' , {
		templateUrl: '../template/admin/add-product.php',
		controller: 'addProduct'
	})
	.when('/addUser' , {
		templateUrl: '../template/admin/add-user.php',
		controller: 'addUser'
	})
	.when('/addTrademark' , {
		templateUrl: '../template/admin/add-trademark.php',
		controller: 'addTrademark'
	})
}]);