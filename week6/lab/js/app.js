
(function() {

    'use strict';
    angular
    // create the module and set ngRoute to route to different views without reloading.
        .module('app', ['ngRoute'])
        // config gets executed during the provider registrations and configuration phase.
        // Only providers and constants can be injected.
        .config(config);
    // intializes the provider with the route (url).
    config.$inject = ['$routeProvider'];

    // sets the page up given the route sent to it.
    function config($routeProvider) {

        // logic to determine what is displayed based on the route sent to the config function.
        $routeProvider.
            // this executes when no addtional info is sent from the route/url
            when('/', {

                // perams to display this view
                // sets the view to display
                templateUrl: 'js/phone-list.template.html',
                // sets the controller linked to the view
                controller: 'PhoneListController',
                // sets the controller as the variable (vm) for calls to the controller
                controllerAs: 'vm'
            }).
            // executes when there is /phones/id in the route/url
            when('/phones/:phoneId', {
            templateUrl: 'js/phone-detail.template.html',
            controller: 'PhoneDetailController',
            controllerAs: 'vm'
            }).
            // failsafe if user puts something else in the url/route
                otherwise({
                redirectTo: '/'
            });
    }
}) ();