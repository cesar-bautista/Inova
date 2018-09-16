/**
 * INSPINIA - Responsive Admin Theme
 *
 */
(function () {
    angular.module('inspinia', [
        'ui.router',                    // Routing
        'oc.lazyLoad',                  // ocLazyLoad
        'ui.bootstrap',                 // Ui Bootstrap
        'ngIdle',                       // Idle timer
        'ngSanitize',                   // ngSanitize
        'angular-jwt',
        'angular-storage'
    ])
})();

// Other libraries are loaded dynamically in the config.js file using the library ocLazyLoad