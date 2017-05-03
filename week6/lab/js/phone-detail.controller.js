/**
 * Created by Nathan Livernols on 5/2/2017.
 */
(function() {

    'use strict';
    angular
        .module('app')
        // sets up a new conroller to the module for the single phone/detail to display
        .controller('PhoneDetailController', PhoneDetailController);

    //intialized the route and service to use by this controller
    PhoneDetailController.$inject = ['$routeParams', 'PhonesService'];

    // returns the data from the Service sent to it (PhonesSevice) bases on the id from the route
    function PhoneDetailController($routeParams, PhonesService) {
        var vm = this;

        vm.phone = {};
        // gets id from route and sets it to a variable for use in activate function
        var id = $routeParams.phoneId;

        activate();

        function activate() {

            // calls the findPhone function in the service to return data based on the id sent.
            PhonesService.findPhone(id).then(function (response) {
                vm.phone = response;
            });
        }

    }
}) ();