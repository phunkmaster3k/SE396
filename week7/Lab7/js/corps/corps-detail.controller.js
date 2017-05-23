/**
 * Created by Nathan Livernols on 5/9/2017.
 */
(function () {

    'use strict';
    angular
        .module('app.corps')
        .controller('CorpsDetailController', CorpsDetailController);

    CorpsDetailController.$inject = ['$routeParams', 'CorpsService'];

    function CorpsDetailController($routeParams, CorpsService) {
        var vm = this;

        vm.corps = {};
        var corpsId = $routeParams.corpsId;

        activate();

        ////////////

        function activate() {
            CorpsService.getCorps(corpsId).then(function (response) {
                vm.corps = response;
                console.log(vm.corps);
                loadMap(vm.corps.location);
            });
        }

        function loadMap(location) {

            var lat = location.split(',')[0];
            var long = location.split(',')[1];

            var myCenter = new google.maps.LatLng(lat, long);

            var mapProp = {
                center: myCenter,
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.querySelector('.googleMap'), mapProp);
            var marker = new google.maps.Marker({
                position: myCenter
            });
            marker.setMap(map);

        }

    }

})();
