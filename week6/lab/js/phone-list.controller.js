/**
 * Created by Nathan Livernols on 5/2/2017.
 */
(function() {

    'use strict';
    angular
        .module('app')
        // adds a controller to the module for the phone list to display
        .controller('PhoneListController', PhoneListController);

    // intializes the PhonesService variable to use the AJAX calls from the service
    PhoneListController.$inject = ['PhonesService'];

    function PhoneListController(PhonesService) {
        var vm = this;

        // array to store list data from activate function
        vm.phones = [];

        activate();

        //grabs the data using getPhones function from the service, adds it to the phones array and returns it.
        function activate() {
            PhonesService.getPhones().then(function (response) {
                vm.phones = response;
            })
        }

    }
}) ();