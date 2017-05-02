/**
 * Created by Nathan Livernols on 5/2/2017.
 */
(function() {

    'use strict';
    angular
        .module('app')
        .controller('PhoneListController', PhoneListController);

    PhoneListController.$inject = [];

    function PhoneListController() {
        var vm = this;

        vm.phones = [];

        activate();

        function activate() {}

    }
}) ();