/**
 * Created by Administrator on 2016/5/25.
 */
angular.module('myApp', [
    'ngRoute',
    //'myApp.filters',
    //'myApp.services',
    //'myApp.directives',
    'myApp.controllers'
]).
config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/login', {templateUrl: 'web/templates/login.html', controller: 'loginCtrl'});
    $routeProvider.when('/view2', {templateUrl: 'partials/partial2.html', controller: 'MyCtrl2'});
    $routeProvider.otherwise({redirectTo: '/login'});
}]);