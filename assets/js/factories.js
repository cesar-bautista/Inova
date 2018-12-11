function baseFactory($q, $http) {
    var settings = {
        method: 'POST',
        skipAuthorization: false,
        url: '',
        data: {},
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'cache-control': 'no-cache, no-store, must-revalidate',
            'Pragma': 'no-cache',
            'Expires': '-1',
            'If-Modified-Since': '0'
        }
    };

    return {
        ajaxSetup: function (options) {
            $.extend(true, settings, options);
        },
        sendAjax: function () {
            var deferred = $q.defer();
            $http({
                    method: settings.method,
                    skipAuthorization: settings.skipAuthorization,
                    url: settings.url,
                    data: settings.data,
                    headers: settings.headers,
                    cache: false
                })
                .then(function (res) {
                    deferred.resolve(res);
                })
                .then(function (error) {
                    deferred.reject(error);
                })
            return deferred.promise;
        }
    };
};

function authFactory(baseFactory) {
    var child = Object.create(baseFactory);
    return {
        login: function (user) {            
            child.ajaxSetup({
                skipAuthorization: true,
                url: '/auth/login',
                data: "email=" + user.email + "&password=" + user.password
            });
            return child.sendAjax();
        }
    }
};

function navFactory(baseFactory) {
    var child = Object.create(baseFactory);
    return {
        get: function () {
            child.ajaxSetup({
                url: '/users/menu'
            });
            return child.sendAjax();
        }
    }
}

function companyFactory(baseFactory) {
    var child = Object.create(baseFactory);
    return {
        get: function () {
            child.ajaxSetup({
                url: '/companies/get'
            });
            return child.sendAjax();
        },
        save: function (company) {
            child.ajaxSetup({
                url: '/companies/save',
                data: company
            });
            return child.sendAjax();
        },
        delete: function (company) {
            child.ajaxSetup({
                url: '/companies/delete',
                data: company
            });
            return child.sendAjax();
        }
    }
}

function companybranchFactory(baseFactory) {
    var child = Object.create(baseFactory);
    return {
        get: function () {
            child.ajaxSetup({
                url: '/companiesbranch/get'
            });
            return child.sendAjax();
        },
        save: function (branch) {
            child.ajaxSetup({
                url: '/companiesbranch/save',
                data: branch
            });
            return child.sendAjax();
        },
        delete: function (branch) {
            child.ajaxSetup({
                url: '/companiesbranch/delete',
                data: branch
            });
            return child.sendAjax();
        }
    }
}

function productFactory(baseFactory) {
    var child = Object.create(baseFactory);
    return {
        get: function () {
            child.ajaxSetup({
                url: '/products/get'
            });
            return child.sendAjax();
        },
        getbyprovider: function (id) {
            child.ajaxSetup({
                url: '/products/getbyprovider/' + id
            });
            return child.sendAjax();
        },
        save: function (product) {
            child.ajaxSetup({
                url: '/products/save',
                data: product
            });
            return child.sendAjax();
        },
        delete: function (product) {
            child.ajaxSetup({
                url: '/products/delete',
                data: product
            });
            return child.sendAjax();
        }
    }
}

function productspriorityFactory(baseFactory) {
    var child = Object.create(baseFactory);
    return {
        get: function () {
            child.ajaxSetup({
                url: '/productspriority/get'
            });
            return child.sendAjax();
        },
        save: function (branch) {
            child.ajaxSetup({
                url: '/productspriority/save',
                data: branch
            });
            return child.sendAjax();
        },
        delete: function (branch) {
            child.ajaxSetup({
                url: '/productspriority/delete',
                data: branch
            });
            return child.sendAjax();
        }
    }
}

function productsformatFactory(baseFactory) {
    var child = Object.create(baseFactory);
    return {
        get: function () {
            child.ajaxSetup({
                url: '/productsformat/get'
            });
            return child.sendAjax();
        },
        save: function (branch) {
            child.ajaxSetup({
                url: '/productsformat/save',
                data: branch
            });
            return child.sendAjax();
        },
        delete: function (branch) {
            child.ajaxSetup({
                url: '/productsformat/delete',
                data: branch
            });
            return child.sendAjax();
        }
    }
}

function providerFactory(baseFactory) {
    var child = Object.create(baseFactory);
    return {
        get: function () {
            child.ajaxSetup({
                url: '/providers/get'
            });
            return child.sendAjax();
        },
        save: function (branch) {
            child.ajaxSetup({
                url: '/providers/save',
                data: branch
            });
            return child.sendAjax();
        },
        delete: function (branch) {
            child.ajaxSetup({
                url: '/providers/delete',
                data: branch
            });
            return child.sendAjax();
        }
    }
}

function prospectuFactory(baseFactory) {
    var child = Object.create(baseFactory);
    return {
        get: function () {
            child.ajaxSetup({
                url: '/prospectus/get'
            });
            return child.sendAjax();
        },
        save: function (branch) {
            child.ajaxSetup({
                url: '/prospectus/save',
                data: branch
            });
            return child.sendAjax();
        },
        delete: function (branch) {
            child.ajaxSetup({
                url: '/prospectus/delete',
                data: branch
            });
            return child.sendAjax();
        }
    }
}

function historyprospectuFactory(baseFactory) {
    var child = Object.create(baseFactory);
       return {
        get_by_id_prospectus: function (id) {
             child.ajaxSetup({
                url: '/historyprospectus/get_by_id/' + id
            });
             return child.sendAjax();
        }
    }
}

function prospectustatusFactory(baseFactory) {
    var child = Object.create(baseFactory);
    return {
        get: function () {
            child.ajaxSetup({
                url: '/prospectusstatus/get'
            });
            return child.sendAjax();
        },
        save: function (branch) {
            child.ajaxSetup({
                url: '/prospectusstatus/save',
                data: branch
            });
            return child.sendAjax();
        },
        delete: function (branch) {
            child.ajaxSetup({
                url: '/prospectusstatus/delete',
                data: branch
            });
            return child.sendAjax();
        }
    }
}

function seoFactory(baseFactory) {
    var child = Object.create(baseFactory);
    return {
        get: function () {
            child.ajaxSetup({
                url: '/seo/get'
            });
            return child.sendAjax();
        },
        save: function (seo) {
            child.ajaxSetup({
                url: '/seo/save',
                data: seo
            });
            return child.sendAjax();
        }
    }
}

function dtOptions (DTOptionsBuilder) {
    return {
      option1: function(){
        return DTOptionsBuilder.newOptions()
        .withDOM('<"html5buttons"B>lTfgitp')
        .withOption('processing', true)
        .withOption('responsive', true)
        .withButtons([
            {extend: 'copy', text: 'Copiar'},
            {extend: 'csv'},
            {extend: 'excel'},
            {extend: 'pdf'},
            {extend: 'print', text: 'Imprimir', 
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ])
        .withLanguage({
              "sEmptyTable":     "No hay información disponible",
              "sInfo":           "Mostrando _START_ a _END_ de _TOTAL_",
              "sInfoEmpty":      "Mostrando 0 a 0 de 0",
              "sInfoFiltered":   "(filtrada de _MAX_)",
              "sInfoPostFix":    "",
              "sInfoThousands":  ",",
              "sLengthMenu":     "Mostrando _MENU_",
              "sLoadingRecords": "Procesando...",
              "sProcessing":     "Procesando...",
              "sSearch":         "Buscar: ",
              "sZeroRecords":    "No se encuentra coincidencias en la búsqueda",
              "oPaginate": {
                  "sFirst":      '<i class="fa fa-angle-double-left"></i>',
                  "sLast":       '<i class="fa fa-angle-double-right"></i>',
                  "sNext":       '<i class="fa fa-angle-right"></i>',
                  "sPrevious":   '<i class="fa fa-angle-left"></i>'
              },
              "oAria": {
                  "sSortAscending":  ": activar para ordenar columna ascendentemente",
                  "sSortDescending": ": activar para ordenar columna descendentemente"
                }
          })
        }
    }
}

angular.module('inspinia')
    .factory("baseFactory", baseFactory)
    .factory("authFactory", authFactory)
    .factory("navFactory", navFactory)
    .factory("companyFactory", companyFactory)
    .factory("companybranchFactory", companybranchFactory)
    .factory("productFactory", productFactory)
    .factory("productspriorityFactory", productspriorityFactory)
    .factory("productsformatFactory", productsformatFactory)
    .factory("providerFactory", providerFactory)
    .factory("prospectuFactory", prospectuFactory)
    .factory("historyprospectuFactory", historyprospectuFactory)
    .factory("prospectustatusFactory", prospectustatusFactory)
    .factory("seoFactory", seoFactory)
    .factory("dtOptions", dtOptions);