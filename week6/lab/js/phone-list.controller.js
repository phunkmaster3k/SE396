/**
 * Created by Nathan Livernols on 5/2/2017.
 */
(function() {

    'use strict';
    angular
        .module('app')
        .controller('PhoneListController', PhoneListController);

    PhoneListController.$inject = ['PhonesService'];

    function PhoneListController(PhonesService) {
        var vm = this;

        vm.phones = [];

        activate();

        function activate() {
            PhonesService.getPhones().then(function (response) {
                vm.phones = response;
            })
        }

    }
}) ();