
<!doctype html>
<html ng-app>
<head>
    <script src="web/common/js/angular.min.js"></script>
</head>
<body>
Your name: <input type="text" ng-model="yourname" placeholder="World">
<hr>
Hello {{ yourname || 'World'}}!
</body>
</html>