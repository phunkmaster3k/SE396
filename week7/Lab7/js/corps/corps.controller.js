/**
 * Created by Nathan Livernols on 5/9/2017.
 */
(function () {

    'use strict';
    angular
        .module('app.corps')
        .controller('CorpsController', CorpsController);

    CorpsController.$inject = ['CorpsService'];

    function CorpsController(CorpsService) {
        var vm = this;

        vm.corps = [];

        activate();

        ////////////

        function activate() {
            CorpsService.getAllCorps().then(function (response) {
                vm.corps = response;
            });
        }

    }

})();