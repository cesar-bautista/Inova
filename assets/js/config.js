/**
 * INSPINIA - Responsive Admin Theme
 *
 * Inspinia theme use AngularUI Router to manage routing and views
 * Each view are defined as state.
 * Initial there are written state for all view in theme.
 *
 */
function config($stateProvider, $urlRouterProvider, $ocLazyLoadProvider, 
    IdleProvider, $httpProvider, key_token, jwtInterceptorProvider) {

    // Configure Idle settings
    IdleProvider.idle(5); // in seconds
    IdleProvider.timeout(120); // in seconds
    //initialize get if not there
    if (!$httpProvider.defaults.headers.get) {
        $httpProvider.defaults.headers.get = {};
    }
    //disable IE ajax request caching
    $httpProvider.defaults.headers.get['If-Modified-Since'] = 'Mon, 26 Jul 1997 05:00:00 GMT';
    $httpProvider.defaults.cache = false;
    // extra
    $httpProvider.defaults.headers.get['Cache-Control'] = 'no-cache';
    $httpProvider.defaults.headers.get['Pragma'] = 'no-cache';
    $httpProvider.defaults.headers.common["Cache-Control"] = 'no-cache, no-store, must-revalidate';
    $httpProvider.defaults.headers.common["Pragma"] = 'no-cache';
    $httpProvider.defaults.headers.common["Expires"] = '0';

    $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
    jwtInterceptorProvider.tokenGetter = ['jwtHelper', '$http', '$location', function(jwtHelper, $http, $location) {
        var currentToken = localStorage.getItem(key_token);
        if(!currentToken) return null;
        if(jwtHelper.isTokenExpired(currentToken) === true) {
            return $http({
                url: '/auth/refreshtoken',
                skipAuthorization: true,
                method: 'POST',
                data: {
                    token: currentToken
                }
            }).then(function(res) {
                if (res.data && res.data.code == 1) {
                    localStorage.setItem(key_token, res.data.response.token);
                    return res.data.response.token;
                }
                else
                {
                    $location.path("/login");
                }
            });
        }
        else {
            return currentToken;
        }
    }];
    jwtInterceptorProvider.forceHeadersUpdate = true;
    $httpProvider.interceptors.push('jwtInterceptor');

    $urlRouterProvider.otherwise("/login");

    $ocLazyLoadProvider.config({
        debug: false
    });

    $stateProvider
        .state('login', {
            url: "/login",
            templateUrl: "/partial/login",
            controller: 'loginCtrl',
            authorization: false,
            data: {
                pageTitle: 'Login',
                specialClass: 'gray-bg'
            }
        })
        .state('app', {
            abstract: true,
            url: "/app",
            templateUrl: "/inicio/content",
            authorization: true
        })
        .state('app.home', {
            url: "/home",
            templateUrl: "/partial/dashboard",
            controller: 'homeCtrl',
            data: { pageTitle: 'Home' }
        })
        .state('app.empresas', {
            url: "/empresas",
            templateUrl: "/partial/companies",
            controller: 'companiesCtrl',
            data: { pageTitle: 'Empresas' },
            resolve: {
                loadPlugin: function ($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            serie: true,
                            files: ['assets/js/plugins/dataTables/datatables.min.js'
                            ,'assets/css/plugins/dataTables/datatables.min.css']
                        },
                        {
                            serie: true,
                            name: 'datatables',
                            files: ['assets/js/plugins/dataTables/angular-datatables.min.js']
                        },
                        {
                            serie: true,
                            name: 'datatables.buttons',
                            files: ['assets/js/plugins/dataTables/angular-datatables.buttons.min.js']
                        },
                        {
                            name: 'cgNotify',
                            files: ['assets/css/plugins/angular-notify/angular-notify.min.css'
                            ,'assets/js/plugins/angular-notify/angular-notify.min.js']
                        }
                    ]);
                }
            }
        })
        .state('app.sucursales', {
            url: "/sucursales",
            templateUrl: "/partial/companiesbranch",
            controller: 'companiesbranchCtrl',
            data: { pageTitle: 'Sucursales' },
            resolve: {
                loadPlugin: function ($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            serie: true,
                            files: ['assets/js/plugins/dataTables/datatables.min.js'
                            ,'assets/css/plugins/dataTables/datatables.min.css']
                        },
                        {
                            serie: true,
                            name: 'datatables',
                            files: ['assets/js/plugins/dataTables/angular-datatables.min.js']
                        },
                        {
                            serie: true,
                            name: 'datatables.buttons',
                            files: ['assets/js/plugins/dataTables/angular-datatables.buttons.min.js']
                        },
                        {
                            name: 'cgNotify',
                            files: ['assets/css/plugins/angular-notify/angular-notify.min.css'
                            ,'assets/js/plugins/angular-notify/angular-notify.min.js']
                        }
                    ]);
                }
            }
        })
        .state('app.proveedores', {
            url: "/proveedores",
            templateUrl: "/partial/providers",
            controller: 'providersCtrl',
            data: { pageTitle: 'Proveedores' },
            resolve: {
                loadPlugin: function ($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            serie: true,
                            files: ['assets/js/plugins/dataTables/datatables.min.js'
                            ,'assets/css/plugins/dataTables/datatables.min.css']
                        },
                        {
                            serie: true,
                            name: 'datatables',
                            files: ['assets/js/plugins/dataTables/angular-datatables.min.js']
                        },
                        {
                            serie: true,
                            name: 'datatables.buttons',
                            files: ['assets/js/plugins/dataTables/angular-datatables.buttons.min.js']
                        },
                        {
                            name: 'cgNotify',
                            files: ['assets/css/plugins/angular-notify/angular-notify.min.css'
                            ,'assets/js/plugins/angular-notify/angular-notify.min.js']
                        }
                    ]);
                }
            }
        })
        .state('app.productos', {
            url: "/productos",
            templateUrl: "/partial/products",
            controller: 'productsCtrl',
            data: { pageTitle: 'Productos' },
            resolve: {
                loadPlugin: function ($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            serie: true,
                            files: ['assets/js/plugins/dataTables/datatables.min.js'
                            ,'assets/css/plugins/dataTables/datatables.min.css']
                        },
                        {
                            serie: true,
                            name: 'datatables',
                            files: ['assets/js/plugins/dataTables/angular-datatables.min.js']
                        },
                        {
                            serie: true,
                            name: 'datatables.buttons',
                            files: ['assets/js/plugins/dataTables/angular-datatables.buttons.min.js']
                        },
                        {
                            name: 'cgNotify',
                            files: ['assets/css/plugins/angular-notify/angular-notify.min.css'
                            ,'assets/js/plugins/angular-notify/angular-notify.min.js']
                        },
                        {
                            files: ['assets/js/plugins/jasny/jasny-bootstrap.min.js'
                            , 'assets/css/plugins/jasny/jasny-bootstrap.min.css' ]
                        }
                    ]);
                }
            }
        })
        .state('pro', {
            abstract: true,
            url: "/pro",
            templateUrl: "/inicio/content",
            authorization: true
        })
        .state('pro.prospectos', {
            url: "/prospectos",
            templateUrl: "/partial/prospectus",
            controller: 'prospectusCtrl',
            data: { pageTitle: 'Seguimiento' },
            resolve: {
                loadPlugin: function ($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            serie: true,
                            files: ['assets/js/plugins/dataTables/datatables.min.js'
                            ,'assets/css/plugins/dataTables/datatables.min.css']
                        },
                        {
                            serie: true,
                            name: 'datatables',
                            files: ['assets/js/plugins/dataTables/angular-datatables.min.js']
                        },
                        {
                            serie: true,
                            name: 'datatables.buttons',
                            files: ['assets/js/plugins/dataTables/angular-datatables.buttons.min.js']
                        },
                        {
                            name: 'cgNotify',
                            files: ['assets/css/plugins/angular-notify/angular-notify.min.css'
                            ,'assets/js/plugins/angular-notify/angular-notify.min.js']
                        },
                        {
                            files: ['assets/js/plugins/jasny/jasny-bootstrap.min.js'
                            , 'assets/css/plugins/jasny/jasny-bootstrap.min.css' ]
                        },
                        {
                            files: ['assets/js/plugins/moment/moment.min.js']
                        },
                        {
                            name: 'datePicker',
                            files: ['assets/css/plugins/datapicker/angular-datapicker.css',
                            'assets/js/plugins/datapicker/angular-datepicker.js']
                        }
                    ]);
                }
            }
        })
        .state('config', {
            abstract: true,
            url: "/config",
            templateUrl: "inicio/content",
            authorization: true
        })
        .state('config.usuarios', {
            url: "/usuarios",
            templateUrl: "/partial/dashboard",
            controller: 'homeCtrl',
            data: { pageTitle: 'Usuarios' }
        })
        .state('config.seo', {
            url: "/seo",
            templateUrl: "/partial/seo",
            controller: 'seoCtrl',
            data: { pageTitle: 'Seo' },
            resolve: {
                loadPlugin: function ($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            serie: true,
                            name: 'angular-ladda',
                            files: ['assets/js/plugins/ladda/spin.min.js', 'assets/js/plugins/ladda/ladda.min.js', 'assets/css/plugins/ladda/ladda-themeless.min.css','assets/js/plugins/ladda/angular-ladda.min.js']
                        }
                    ]);
                }
            }
        })
}

angular
    .module('inspinia')
    .config(config)
    .constant("key_token", "JWT")
    .run(function ($rootScope, $state) {
        $rootScope.$state = $state;
    });