(function () {

    'use strict';
    angular
        .module('app.address')
        .controller('AddressDeleteController', AddressDeleteController);

    AddressDeleteController.$inject = ['$routeParams', 'AddressService'];
    /*
     * Simple controller to get information for the view.
     */
    function AddressDeleteController($routeParams, AddressService) {
        var vm = this;

        //vm.addressId = $routeParams.addressId;
        vm.message = '';

        activate();

        ////////////

        function activate() {
            AddressService.deleteAddress(vm.addressId).then(function () {
            },
                function () {

                })
        }

    }

})();
