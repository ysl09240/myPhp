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
            $http.post("/src/login/login.php",{
                action:"login",
                user:"slin",
                pass:"12345"
            }).success(function(data){
                console.log(data);
                if(data.success){
                    $state.go("main");
                }
            });
        }

    })
    .controller("mainCtrl",function($scope){
        $scope.hello = "hello,b!";
    })

