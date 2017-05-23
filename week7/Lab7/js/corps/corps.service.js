/**
 * Created by Nathan Livernols on 5/9/2017.
 */
(function() {

    'use strict';
    angular
        .module('app.corps')
        .factory('CorpsService', CorpsService);

    CorpsService.$inject = ['$http', 'REQUEST'];

    /*
     * We will do as much logic here as we can.
     */
    function CorpsService($http, REQUEST) {

        var url = REQUEST.Corps;

        var service = {
            'getAllCorps' : getAllCorps,
            'getCorps' : getCorps,
            'postCorps' : postCorps,
            'deleteCorps' : deleteCorps,
            'putCorps' : putCorps

        };
        return service;

        function getAllCorps() {
            return $http.get(url)
                .then(handleSuccess, handleFailed);

            function handleSuccess (response) {
                return response.data.data;
            }

            function handleFailed(error) {
                return [];
            }
        }
        function getCorps(corps_id) {
            var _url = url + '/' + corps_id;

            return $http.get(_url)
                .then(handleSuccess, handleFailed);

            function handleSuccess (response) {
                return response.data.data;
            }

            function handleFailed(error) {
                return {};
            }
        }
        function postCorps(corp, incorp_dt, email, owner, phone, location) {
            var model = {};
            model.corp = corp;
            model.incorp_dt = incorp_dt;
            model.email = email;
            model.owner = owner;
            model.phone = phone;
            model.location = location;
            return $http.post(url, model);
        }
        function deleteCorps(corps_id) {
            var _url = url + '/' + corps_id;
            return $http.delete(_url);
        }
        function putCorps(corps_id, corp, incorp_dt, email, owner, phone, location ) {
            var _url = url + '/' + corps_id;
            var model = {};
            model.corp = corp;
            model.incorp_dt = incorp_dt;
            model.email = email;
            model.owner = owner;
            model.phone = phone;
            model.location = location;

            return $http.put(_url, model);
        }
    }

})();