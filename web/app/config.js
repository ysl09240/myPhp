/**
 * Created by Administrator on 2016/5/25.
 */
angular.module('myApp.config',[])
    .config(['$routeProvider', function($routeProvider) {
        console.log("1111");
        $routeProvider.when('/login', {templateUrl: 'web/templates/login.html', controller: 'loginCtrl'});
        $routeProvider.when('/view2', {templateUrl: 'web/templates/partial2.html', controller: 'MyCtrl2'});
        $routeProvider.otherwise({redirectTo: '/login'});
    }]);