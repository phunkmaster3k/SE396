/**
 * Created by Nathan Livernols on 5/9/2017.
 */
(function() {

    'use strict';
    angular
        .module('app.corps')
        .config(config);

    config.$inject = ['$routeProvider'];

    function config($routeProvider) {
        $routeProvider.
        when('/corps', {
            templateUrl: 'js/corps/corps.template.html',
            controller: 'CorpsController',
            controllerAs: 'vm'
        }).
        when('/corps/:corpsId', {
            templateUrl: 'js/corps/corps-detail.template.html',
            controller: 'CorpsDetailController',
            controllerAs: 'vm'
        });
    }

})();