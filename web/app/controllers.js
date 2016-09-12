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
    .controller("loginCtrl",function($scope,$http,$state){
        $scope.login = function(){
            $scope.user="slin";
            $scope.pass="123456";
            $http.post("/src/login/login.php",{
                action:"login",
                user:$scope.user,
                pass:$scope.pass
            }).success(function(data){
                if(data.success){
                    $scope.data = data;
                    $state.go("main");
                }
            });
        }

    })
    .controller("mainCtrl",function($scope){
        $scope.user = "slin";
        $scope.age = 24;
    })

