/**
 * Created by Administrator on 2016/5/25.
 */
angular.module('myApp.config',[])
    .config(function($routeProvider, $locationProvider) {
        $routeProvider
            .when('/a', {
                templateUrl: 'web/templates/a.html',
                controller: 'aController'
            })
            .when('/b', {
                templateUrl: 'web/templates/b.html',
                controller: 'bController',
                //resolve: {
                //    // I will cause a 1 second delay
                //    delay: function($q, $timeout) {
                //        var delay = $q.defer();
                //        $timeout(delay.resolve, 3000);
                //        return delay.promise;
                //    }
                //}
            })
            .otherwise({
                redirectTo: '/a'
            });
    });
