myApp.controller('showTest', ['$scope', '$http', function ($scope, $http) {
        var id = angular.element(document.querySelector('#testid')).val();

        var req = {
            method: 'GET',
            url: '/web/api/tests/' + id,
            headers: {
                'Content-Type': 'application/json'
            }
        }

        $http(req).success(function (data) {

            $scope.title = data.test.title;
            $scope.description = data.test.description;
            $scope.questions = data.test.questions;

            //console.log(data.test);

        }).error(function () {
            //console.log();
        });

        $scope.submit = function () {
            //console.log(jQuery("form").serialize());

            $http({
                method: 'POST',
                url: '/web/app_dev.php/api/users/answers',
                data: jQuery("form").serialize(), // pass in data as strings
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}  // set the headers so angular passing info as form data (not request payload)
            }).success(function (data) {
                //console.log(data);

                if (!data.success) {
                 //   $scope.error = data.error;
                } else {
                    // if successful, bind success message to message
                    $scope.message = data.message;
                }
            });/**/
        };


    }]);