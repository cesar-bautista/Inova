<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title">{{form_name}}</h4>
        <small class="font-bold">Producto</small>
    </div>
    <div class="modal-body">
        <form role="form" name="product" ng-init="loadEdit()" novalidate>
            <div class="col-xs-12 form-group">
                <label>Producto</label>
                <input type="text" placeholder="Nombre del producto" class="form-control" name="ProductName" ng-model="product_form.ProductName" ng-minlength="3" ng-maxlength="120"
                    required="" />
                <div class="m-t-xs" ng-show="product.ProductName.$invalid && product.ProductName.$dirty">
                    <small class="text-danger" ng-show="product.ProductName.$error.required">Campo obligatorio</small>
                    <small class="text-danger" ng-show="product.ProductName.$error.minlength">Este campo requiere mínimo 3 caracteres</small>
                    <small class="text-danger" ng-show="product.ProductName.$error.maxlength">Este campo requiere máximo 120 caracteres</small>
                </div>
            </div>
            <div class="col-xs-12 form-group">
                <label>Proveedor</label>
                <select class="form-control" name="ProviderId" ng-model="product_form.ProviderId"
                    required="">
                    <option ng-repeat="provider in providers" value="{{provider.ProviderId}}">{{provider.ProviderName}}</option>
                </select>
                <div class="m-t-xs" ng-show="product.ProviderId.$invalid && product.ProviderId.$dirty">
                    <small class="text-danger" ng-show="product.ProviderId.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="col-xs-12 form-group">
                <label>Descripción</label>
                <textarea type="text" placeholder="Descripción del producto" class="form-control" name="ProductDescription" ng-model="product_form.ProductDescription" required="">
                </textarea>
                <div class="m-t-xs" ng-show="product.ProductDescription.$invalid && product.ProductDescription.$dirty">
                    <small class="text-danger" ng-show="product.ProductDescription.$error.required">Campo obligatorio</small>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" ng-click="cancel()">Cancelar</button>
        <button type="button" class="btn btn-primary" ng-click="ok(product_form)" ng-disabled="product.$invalid">Aceptar</button>
    </div>
</div>