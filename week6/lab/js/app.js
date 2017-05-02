
(function() {

    'use strict';
    angular
        .module('app', ['ngRoute'])
        .config(config);

    config.$inject = ['$routeProvider'];

    function config($routeProvider) {
        $routeProvider.
            when('/', {
                templateURL: 'js/phone-list.template.html',
                controller: 'PhoneListController',
                controllerAs: 'vm'

            }).
                otherwise({
                    redirectTo: '/'
            });
    }
}) ();