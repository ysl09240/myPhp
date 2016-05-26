<!doctype html>
<html ng-app="myApp">
<head>
    <script src="https://code.angularjs.org/1.5.5/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.5.5/angular-route.min.js"></script>
</head>
<body>
<div ng-controller="myCtrl">
    <ul>
        <li><a href="#/a">click a</a></li>
        <li><a href="#/b">click b</a></li>
    </ul>
     <ng-view></ng-view>
</div>
<script type="text/javascript">
    angular.module("myApp",["ngRoute"])
        .controller("aController",function($scope,$route){
            $scope.hello = "hello,a!";
        })
        .controller("bController",function($scope){
            $scope.hello = "hello,b!";
        })
        .controller("myCtrl",function($scope,$location){

            $scope.$on("$viewContentLoaded",function(){
                console.log("ng-view content loaded!");
            });

            $scope.$on("$routeChangeStart",function(event,next,current){
                //event.preventDefault(); //cancel url change
                console.log("route change start!");
            });
        })
        .config(function($routeProvider, $locationProvider) {
            $routeProvider
                .when('/a', {
                    templateUrl: 'a.html',
                    controller: 'aController'
                })
                .when('/b', {
                    templateUrl: 'b.html',
                    controller: 'bController',
                    resolve: {
                        // I will cause a 1 second delay
                        delay: function($q, $timeout) {
                            var delay = $q.defer();
                            $timeout(delay.resolve, 3000);
                            return delay.promise;
                        }
                    }
                })
                .otherwise({
                    redirectTo: '/a'
                });
        });
</script>
</body>
</html>