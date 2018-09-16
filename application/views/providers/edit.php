<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title">{{form_name}}</h4>
        <small class="font-bold">Proveedor</small>
    </div>
    <div class="modal-body">
        <form role="form" name="provider" novalidate>
            <div class="col-xs-12 form-group">
                <label>Nombre</label>
                <input type="text" placeholder="Nombre del proveedor" class="form-control" name="ProviderName" ng-model="provider_form.ProviderName"
                    required="" />
                <div class="m-t-xs" ng-show="provider.ProviderName.$invalid && provider.ProviderName.$dirty">
                    <small class="text-danger" ng-show="provider.ProviderName.$error.required">Campo obligatorio</small>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" ng-click="cancel()">Cancelar</button>
        <button type="button" class="btn btn-primary" ng-click="ok(provider_form)" ng-disabled="provider.$invalid">Aceptar</button>
    </div>
</div>