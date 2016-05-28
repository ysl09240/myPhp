/**
 * Created by Administrator on 2016/5/25.
 */
angular.module("myApp.controllers",[])
    .controller("myCtrl",function($scope,$location){

        $scope.$on("$viewContentLoaded",function(){
            console.log("ng-view content loaded!");
        });

        $scope.$on("$routeChangeStart",function(event,next,current){
            //event.preventDefault(); //cancel url change
            console.log("route change start!");
        });
    })
    .controller("loginCtrl",function($scope,$http){
        $scope.login = function(){
            $http({
                method: "POST",
                url: "/src/login/login.php",
                params: {
                    action:'login',
                    user: $scope.user,
                    pass: $scope.pass
                }
            }).success(function(data){
                console.log(data);
            });
        }

    })
    .controller("mainCtrl",function($scope){
        $scope.hello = "hello,b!";
    })

