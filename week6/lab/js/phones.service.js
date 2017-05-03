/**
 * Created by Nathan Livernols on 5/2/2017.
 */
(function () {

    'use strict';
    angular
        .module('app')
        // creates a service object to handle the buisness logic of the page.
        .factory('PhonesService', PhonesService);

    // intializing the built in $http variable for AJAX calls, and REQUEST for location of calls.
    PhonesService.$inject = ['$http', 'REQUEST'];

    // function to run the logic called
    function PhonesService($http, REQUEST) {
        var url = REQUEST.Phones;
        // referances the functions we can call with the service
        var service = {
            'getPhones': getPhones,
            'findPhone': findPhone
        };
        return service;

        // gets all data (phones) and returns it as an array
        function getPhones() {
            return $http.get(url)
                .then(getPhonesComplete, getPhonesFailed);

            function getPhonesComplete(response) {
                return response.data;
            }

            function getPhonesFailed(error) {
                return [];
            }
        }

        // gets a single data (phones)by looping through the data, uses the id to find it and returns it
        function findPhone(id)  {
            return getPhones()
                .then(function (data) {
                    return findPhoneComplete(data);;

                });

            function findPhoneComplete(data) {
                var results = {};
                // loop through data here
                angular.forEach(data, function (value, key) {
                    if ( !results.length ) {
                        if ( value.hasOwnProperty('id') && value.id === id ) {
                            results = angular.copy(value);
                        }
                    }
                }, results);

                return results;

            }

        }

    }
})();