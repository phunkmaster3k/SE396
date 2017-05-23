/**
 * Created by Nathan Livernols on 5/2/2017.
 */
(function () {
    'use strict';

    angular
        .module('app')
        // sets up a constant variable for values that do not change between services
        // in this case it sets REQUEST to the json data to be used in the service
        .constant('REQUEST', {
            'Phones' : './data/phones.json'
        });

}) ();