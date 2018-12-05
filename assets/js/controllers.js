function MainCtrl($http) {};

function loginCtrl($scope, authFactory, $location, key_token) {
    $scope.user = {
        email : "",
        password : "",
        isvalid : true
    };
    $scope.message = "";
    
    localStorage.removeItem(key_token);

    $scope.login = function (user) {
        authFactory.login(user).then(function (res) {
            if (res.data && res.data.code == 1) {
                localStorage.setItem(key_token, res.data.response.token);
                $location.path("/app/home");
            }
            else
            {
                $scope.message = res.data.response;
                $scope.user.isvalid = false;
            }
        });
    }
};

function homeCtrl() {

};

function navCtrl($scope, navFactory, key_token, jwtHelper) {
    $scope.init = function() {
        navFactory.get().then(function (res) {
            if (res.data && res.data.code == 1) {
                var token = localStorage.getItem(key_token);
                var payload = jwtHelper.decodeToken(token);
                $scope.user = { 
                    nickName: payload.nickName,
                    photo: payload.photo
                };
                $scope.menu = res.data.response.menu;
            }            
        });
    };
};

function companiesCtrl($scope, $uibModal, DTOptionsBuilder, notify, key_token, jwtHelper, companyFactory){
    $scope.init = function() {
        companyFactory.get().then(function (res) {
            var token = localStorage.getItem(key_token);
            var payload = jwtHelper.decodeToken(token);
            console.log("INI", payload.exp);
            if (res.data && res.data.code == 1) {
                $scope.companies = res.data.response.companies;
            }
        });
    };
    
    $scope.addModal = function() {
        $scope.form_name = 'Alta';
        $scope.company_form = {};
        
        $uibModal.open({
            templateUrl: '/partial/company',
            controller: 'modalCtrl',
            windowClass: 'animated fadeIn',
            scope: $scope
        });
    };

    $scope.editModal = function(company) {
        $scope.form_name = 'Edición';
        var edit_form = {};
		angular.copy(company, edit_form);
        $scope.company_form = edit_form;
        
        $uibModal.open({
            templateUrl: '/partial/company',
            controller: 'modalCtrl',
            windowClass: 'animated fadeIn',
            scope: $scope
        });
    };
    
    $scope.deleteModal = function(company) {
		if (confirm("Estás seguro de eliminar el registro?")) {
            companyFactory.delete(company).then(function (res) {
                if (res.data && res.data.code == 1) {
                    var index = $scope.companies.indexOf(company);
                    $scope.companies.splice(index, 1);
                    notify({ message:'El registro se eliminó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                }
            });
		}
    };

    $scope.saveRecord = function(company) {
        companyFactory.save(company).then(function (res) {
            if (res.data && res.data.code == 1) {
                if(res.data.response.company.message.code === 0){
                    if(company.CompanyId){
                        var entity = $.grep($scope.companies, function(obj) { return obj.CompanyId === company.CompanyId; })[0];
                        var index = $scope.companies.indexOf(entity);
                        $scope.companies[index] = res.data.response.company.entity;
                        notify({ message:'El registro se actualizó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                    }
                    else{
                        $scope.companies.push(res.data.response.company.entity);
                        notify({ message:'El registro se guardó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                    }
                }
            }
        });
	}

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDOM('<"html5buttons"B>lTfgitp')
        .withButtons([
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},
            {extend: 'print',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]);
        // .withLanguage({ "sUrl": '/assets/js/plugins/dataTables/Spanish.json' });
};

function companiesbranchCtrl($scope, $uibModal, DTOptionsBuilder, notify, companybranchFactory, companyFactory){
    $scope.init = function() {
        companybranchFactory.get().then(function (res) {
            if (res.data && res.data.code == 1) {
                $scope.companiesbranch = res.data.response.companiesbranch;
            }
        });
    };

    $scope.loadEdit = function() {
        companyFactory.get().then(function (res) {
            if (res.data && res.data.code == 1) {
                $scope.companies = res.data.response.companies;
            }
        });
    };
    
    $scope.addModal = function() {
        $scope.form_name = 'Alta';
        $scope.companybranch_form = {};
        
        $uibModal.open({
            templateUrl: '/partial/companybranch',
            controller: 'modalCtrl',
            windowClass: 'animated fadeIn',
            scope: $scope
        });
    };

    $scope.editModal = function(branch) {
        $scope.form_name = 'Edición';
        var edit_form = {};
		angular.copy(branch, edit_form);
        $scope.companybranch_form = edit_form;
        
        $uibModal.open({
            templateUrl: '/partial/companybranch',
            controller: 'modalCtrl',
            windowClass: 'animated fadeIn',
            scope: $scope
        });
    };
    
    $scope.deleteModal = function(branch) {
		if (confirm("Estás seguro de eliminar el registro?")) {
            companybranchFactory.delete(branch).then(function (res) {
                if (res.data && res.data.code == 1) {
                    var index = $scope.companiesbranch.indexOf(companybranch);
                    $scope.companiesbranch.splice(index, 1);
                    notify({ message:'El registro se eliminó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                }
            });
		}
    };

    $scope.saveRecord = function(branch) {
        companybranchFactory.save(branch).then(function (res) {
            if (res.data && res.data.code == 1) {
                if(res.data.response.companybranch.message.code === 0){
                    if(branch.CompanyBranchId){
                        var entity = $.grep($scope.companiesbranch, function(obj) { return obj.CompanyBranchId === branch.CompanyBranchId; })[0];
                        var index = $scope.companiesbranch.indexOf(entity);
                        $scope.companiesbranch[index] = res.data.response.companybranch.entity;
                        notify({ message:'El registro se actualizó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                    }
                    else{
                        $scope.companiesbranch.push(res.data.response.companybranch.entity);
                        notify({ message:'El registro se guardó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                    }
                }
            }
        });
	}

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDOM('<"html5buttons"B>lTfgitp')
        .withButtons([
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},
            {extend: 'print',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]);
        // .withLanguage({ "sUrl": '/assets/js/plugins/dataTables/Spanish.json' });
};

function providersCtrl($scope, $uibModal, DTOptionsBuilder, notify, providerFactory){
    $scope.init = function() {
        providerFactory.get().then(function (res) {
            if (res.data && res.data.code == 1) {
                $scope.providers = res.data.response.providers;
            }
        });
    };
    
    $scope.addModal = function() {
        $scope.form_name = 'Alta';
        $scope.provider_form = {};
        
        $uibModal.open({
            templateUrl: '/partial/provider',
            controller: 'modalCtrl',
            windowClass: 'animated fadeIn',
            scope: $scope
        });
    };

    $scope.editModal = function(provider) {
        $scope.form_name = 'Edición';
        var edit_form = {};
		angular.copy(provider, edit_form);
        $scope.provider_form = edit_form;
        
        $uibModal.open({
            templateUrl: '/partial/provider',
            controller: 'modalCtrl',
            windowClass: 'animated fadeIn',
            scope: $scope
        });
    };
    
    $scope.deleteModal = function(provider) {
		if (confirm("Estás seguro de eliminar el registro?")) {
            providerFactory.delete(provider).then(function (res) {
                if (res.data && res.data.code == 1) {
                    var index = $scope.providers.indexOf(provider);
                    $scope.providers.splice(index, 1);
                    notify({ message:'El registro se eliminó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                }
            });
		}
    };

    $scope.saveRecord = function(provider) {
        providerFactory.save(provider).then(function (res) {
            if (res.data && res.data.code == 1) {
                if(res.data.response.provider.message.code === 0){
                    if(provider.ProviderId){
                        var entity = $.grep($scope.providers, function(obj) { return obj.ProviderId === provider.ProviderId; })[0];
                        var index = $scope.providers.indexOf(entity);
                        $scope.providers[index] = res.data.response.provider.entity;
                        notify({ message:'El registro se actualizó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                    }
                    else{
                        $scope.providers.push(res.data.response.provider.entity);
                        notify({ message:'El registro se guardó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                    }
                }
            }
        });
	}

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDOM('<"html5buttons"B>lTfgitp')
        .withButtons([
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},
            {extend: 'print',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]);
        // .withLanguage({ "sUrl": '/assets/js/plugins/dataTables/Spanish.json' });
};

function productsCtrl($scope, $uibModal, DTOptionsBuilder, notify, productFactory, providerFactory){
    $scope.init = function() {
        productFactory.get().then(function (res) {
            if (res.data && res.data.code == 1) {
                $scope.products = res.data.response.products;
            }
        });
    };
    
    $scope.loadEdit = function() {
        providerFactory.get().then(function (res) {
            if (res.data && res.data.code == 1) {
                $scope.providers = res.data.response.providers;
            }
        });
    };

    $scope.addModal = function() {
        $scope.form_name = 'Alta';
        $scope.product_form = {};
        
        $uibModal.open({
            templateUrl: '/partial/product',
            controller: 'modalCtrl',
            windowClass: 'animated fadeIn',
            scope: $scope
        });
    };

    $scope.editModal = function(product) {
        $scope.form_name = 'Edición';
        var edit_form = {};
		angular.copy(product, edit_form);
        $scope.product_form = edit_form;
        
        $uibModal.open({
            templateUrl: '/partial/product',
            controller: 'modalCtrl',
            windowClass: 'animated fadeIn',
            scope: $scope
        });
    };
    
    $scope.deleteModal = function(product) {
		if (confirm("Estás seguro de eliminar el registro?")) {
            productFactory.delete(product).then(function (res) {
                if (res.data && res.data.code == 1) {
                    var index = $scope.products.indexOf(product);
                    $scope.products.splice(index, 1);
                    notify({ message:'El registro se eliminó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                }
            });
		}
    };

    $scope.saveRecord = function(product) {
        productFactory.save(product).then(function (res) {
            if (res.data && res.data.code == 1) {
                if(res.data.response.product.message.code === 0){
                    if(product.ProductId){
                        var entity = $.grep($scope.products, function(obj) { return obj.ProductId === product.ProductId; })[0];
                        var index = $scope.products.indexOf(entity);
                        $scope.products[index] = res.data.response.product.entity;
                        notify({ message:'El registro se actualizó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                    }
                    else{
                        $scope.products.push(res.data.response.product.entity);
                        notify({ message:'El registro se guardó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                    }
                }
            }
        });
	}

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDOM('<"html5buttons"B>lTfgitp')
        .withButtons([
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},
            {extend: 'print',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]);
        // .withLanguage({ "sUrl": '/assets/js/plugins/dataTables/Spanish.json' });
};

function prospectusCtrl($scope, $uibModal, DTOptionsBuilder, notify, getCurrentUser, prospectuFactory, providerFactory, productFactory, prospectustatusFactory, historyprospectuFactory){
    $scope.init = function() {
        prospectuFactory.get().then(function (res) {
            if (res.data && res.data.code == 1) {
                $scope.prospectus = res.data.response.prospectus;
            }
        });
    };

    $scope.loadEdit = function(providerId) {
        providerFactory.get().then(function (res) {
            if (res.data && res.data.code == 1) {
                $scope.providers = res.data.response.providers;
            }
        });

        if(providerId){
            $scope.OnProviderChange(providerId);
        }

        prospectustatusFactory.get().then(function (res) {
            if (res.data && res.data.code == 1) {
                $scope.status = res.data.response.status;
            }
        });
    };

    $scope.OnProviderChange = function (providerId) {
        productFactory.getbyprovider(providerId).then(function (res) {
            if (res.data && res.data.code == 1) {
                $scope.products = res.data.response.products;
            }
        });
    };
    
    $scope.addModal = function() {
        $scope.form_name = 'Alta';
        $scope.prospectu_form = {
            RegisterDate : moment().toDate(),
            RememberDate : moment().toDate()
        };
        
        $uibModal.open({
            templateUrl: '/partial/prospectu',
            controller: 'modalCtrl',
            windowClass: 'animated fadeIn',
            scope: $scope
        });
    };

    $scope.editModal = function(prospectu) {
        $scope.form_name = 'Edición';
        var edit_form = {};
		angular.copy(prospectu, edit_form);
        $scope.prospectu_form = edit_form;
        historyprospectuFactory.get_by_id_prospectus($scope.prospectu_form.ProspectuId).then(function (res) {
            if (res.data && res.data.code == 1) {
                $scope.historyprospectus = res.data.response.historyprospectus;
            }
        });
        
        $uibModal.open({
            templateUrl: '/partial/prospectu',
            controller: 'modalCtrl',
            windowClass: 'animated fadeIn',
            scope: $scope
        });
    };
    
    $scope.deleteModal = function(prospectu) {
		if (confirm("Estás seguro de eliminar el registro?")) {
            prospectuFactory.delete(prospectu).then(function (res) {
                if (res.data && res.data.code == 1) {
                    var index = $scope.prospectus.indexOf(prospectu);
                    $scope.prospectus.splice(index, 1);
                    notify({ message:'El registro se eliminó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                }
            });
		}
    };

    $scope.saveRecord = function(prospectu) {
        prospectu.UserId = getCurrentUser.userId;
        prospectuFactory.save(prospectu).then(function (res) {
            if (res.data && res.data.code == 1) {
                if(res.data.response.prospectu.message.code === 0){
                    if(prospectu.ProspectuId){
                        var entity = $.grep($scope.prospectus, function(obj) { return obj.ProspectuId === prospectu.ProspectuId; })[0];
                        var index = $scope.prospectus.indexOf(entity);
                        $scope.prospectus[index] = res.data.response.prospectu.entity;
                        notify({ message:'El registro se actualizó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                    }
                    else{
                        $scope.prospectus.push(res.data.response.prospectu.entity);
                        notify({ message:'El registro se guardó correctamente', classes: 'alert-success', templateUrl: 'inicio/notify' });
                    }
                }
            }
        });
	}

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDOM('<"html5buttons"B>lTfgitp')
        .withButtons([
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},
            {extend: 'print',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]);
};

function modalCtrl ($scope, $uibModalInstance) {
    $scope.ok = function (data) {
        $scope.saveRecord(data);
        $uibModalInstance.close();
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
};

function seoCtrl($scope, seoFactory) {
    $scope.init = function() {
        seoFactory.get().then(function (res) {
            if (res.data && res.data.code == 1) {
                $scope.seo = res.data.response.seo;
            }
        });
    };

    $scope.save = function(seo) {
        $scope.loadingDemo = true;
        seoFactory.save(seo).then(function (res) {            
            if (res.data && res.data.code == 1) {
                $scope.loadingDemo = false;
            }
        });
    };
};

function getCurrentUser(key_token, jwtHelper){
    var token = localStorage.getItem(key_token);
    if(token) {
        var payload = jwtHelper.decodeToken(token);
        payload.isExpired = jwtHelper.isTokenExpired(token);
        payload.token = token;
        return payload;
    }
    return null;
}
/*
 * Pass all functions into module
 */
angular
    .module('inspinia')
    .service("getCurrentUser", getCurrentUser)
    .controller('MainCtrl', MainCtrl)
    .controller('modalCtrl', modalCtrl)
    .controller('loginCtrl', loginCtrl)
    .controller('homeCtrl', homeCtrl)
    .controller('navCtrl', navCtrl)
    .controller('companiesCtrl', companiesCtrl)
    .controller('companiesbranchCtrl', companiesbranchCtrl)
    .controller('providersCtrl', providersCtrl)
    .controller('productsCtrl', productsCtrl)
    .controller('prospectusCtrl', prospectusCtrl)
    .controller('seoCtrl', seoCtrl);