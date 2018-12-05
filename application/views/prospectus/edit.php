<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title">{{form_name}}</h4>
        <small class="font-bold">Prospecto</small>
    </div>
    <div class="modal-body">
        <form role="form" name="prospectu" ng-init="loadEdit(prospectu_form.ProviderId)" novalidate>
            <div class="col-xs-6 form-group">
                <label>Proveedor</label>
                <select class="form-control" name="ProviderId" ng-model="prospectu_form.ProviderId" ng-change="OnProviderChange(prospectu_form.ProviderId)" required="">
                    <option ng-repeat="provider in providers" value="{{provider.ProviderId}}">{{provider.ProviderName}}</option>
                </select>
                <div class="m-t-xs" ng-show="providers.ProviderId.$invalid && providers.ProviderId.$dirty">
                    <small class="text-danger" ng-show="providers.ProviderId.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Producto</label>
                <select class="form-control" name="ProductId" ng-model="prospectu_form.ProductId" required="">
                    <option ng-repeat="product in products" value="{{product.ProductId}}">{{product.ProductName}}</option>
                </select>
                <div class="m-t-xs" ng-show="products.ProductId.$invalid && products.ProductId.$dirty">
                    <small class="text-danger" ng-show="products.ProductId.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Fecha registro</label>
                <div class="input-group date">
                    <input  type="datetime" class="form-control" date-time="" name="RegisterDate" ng-model="prospectu_form.RegisterDate"
                            view="date" auto-close="true" min-view="date" format="YYYY-MM-DD" required="">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
                <div class="m-t-xs" ng-show="prospectu.RegisterDate.$invalid && prospectu.RegisterDate.$dirty">
                    <small class="text-danger" ng-show="prospectu.RegisterDate.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Fecha recordatorio</label>
                <div class="input-group date">
                    <input  type="datetime" class="form-control" date-time="" name="RememberDate" ng-model="prospectu_form.RememberDate"
                            view="date" auto-close="true" min-view="date" format="YYYY-MM-DD" required="">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
                <div class="m-t-xs" ng-show="prospectu.RememberDate.$invalid && prospectu.RememberDate.$dirty">
                    <small class="text-danger" ng-show="prospectu.RememberDate.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Status</label>
                <select class="form-control" name="StatusId" ng-model="prospectu_form.StatusId" required="">
                    <option ng-repeat="item in status" value="{{item.StatusId}}">{{item.StatusName}}</option>
                </select>
                <div class="m-t-xs" ng-show="status.StatusId.$invalid && status.StatusId.$dirty">
                    <small class="text-danger" ng-show="status.StatusId.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="col-xs-12 form-group">
                <label>Comentarios</label>
                <textarea type="text" placeholder="Ingresar comentarios..." class="form-control" name="Comments" ng-model="prospectu_form.Comments"
                    required=""></textarea>
                <div class="m-t-xs" ng-show="prospectu.Comments.$invalid && prospectu.Comments.$dirty">
                    <small class="text-danger" ng-show="prospectu.Comments.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="ibox-content">
                <table datatable="ng" dt-options="dtOptions" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>                               
                            <th>Comentario</th>
                            <th>Feha</th>
                            <th>Usuario</th>
                            <th>Estus</th>                                          
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="hprospectu in historyprospectus">
                            <td>{{ hprospectu.Comments }}</td>
                            <td>{{ hprospectu.RegisterDate }}</td>
                            <td>{{ hprospectu.UserName }}</td> 
                            <td>{{ hprospectu.StatusName }}</td>                                                              
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" ng-click="cancel()">Cancelar</button>
        <button type="button" class="btn btn-primary" ng-click="ok(prospectu_form)" ng-disabled="prospectu.$invalid">Aceptar</button>
    </div>
</div>