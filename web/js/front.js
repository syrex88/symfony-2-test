myApp.controller('showTests', ['$scope', '$http', function ($scope, $http) {

        var req = {
            method: 'GET',
            url: 'http://192.168.1.40/web/api/tests',
            headers: {
                'Content-Type': 'application/json'
            }
        }

        $http(req).success(function (data) {
             
             $scope.tests = data.tests;
             
        }).error(function () {

        });

    }]);