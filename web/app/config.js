/**
 * Created by Administrator on 2016/5/25.
 */
angular.module('myApp.config',[])
    //.config(function($routeProvider, $locationProvider) {
    //    $routeProvider
    //        .when('/a', {
    //            templateUrl: 'web/templates/a.html',
    //            controller: 'aController'
    //        })
    //        .when('/b', {
    //            templateUrl: 'web/templates/b.html',
    //            controller: 'bController',
    //            //resolve: {
    //            //    // I will cause a 1 second delay
    //            //    delay: function($q, $timeout) {
    //            //        var delay = $q.defer();
    //            //        $timeout(delay.resolve, 3000);
    //            //        return delay.promise;
    //            //    }
    //            //}
    //        })
    //        .otherwise({
    //            redirectTo: '/a'
    //        });
    //});
    .config(function ($stateProvider, $urlRouterProvider) {
        $urlRouterProvider.when("", "/login");
        $stateProvider
            .state("login", {
                url: "/login",
                templateUrl: "web/templates/login.html",
                controller: 'loginCtrl'
            })
            .state("main", {
                url:"/main",
                templateUrl: "web/templates/main.html",
                controller: 'mainCtrl'
            })
             .state("publish", {
                url:"/publish",
                templateUrl: "web/templates/publish.html",
                controller: 'publishCtrl'
            })
    });
