<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title">{{form_name}}</h4>
        <small class="font-bold">Sucursal</small>
    </div>
    <div class="modal-body">
        <form role="form" name="companybranch" ng-init="loadEdit()" novalidate>
            <div class="col-xs-6 form-group">
                <label>RFC</label>
                <input type="text" placeholder="RFC" class="form-control" name="Rfc" ng-model="companybranch_form.Rfc" ng-minlength="12" ng-maxlength="13"
                    ng-pattern="/^[A-ZÑ&]{3,4}\d{6}(?:[A-Z\d]{3})?$/" required="" />
                <div class="m-t-xs" ng-show="companybranch.Rfc.$invalid && companybranch.Rfc.$dirty">
                    <small class="text-danger" ng-show="companybranch.Rfc.$error.required">Campo obligatorio</small>
                    <small class="text-danger" ng-show="companybranch.Rfc.$error.minlength">Este campo requiere mínimo 12 caracteres</small>
                    <small class="text-danger" ng-show="companybranch.Rfc.$error.maxlength">Este campo requiere máximo 13 caracteres</small>
                    <small class="text-danger" ng-show="companybranch.Rfc.$error.pattern">El RFC no es válido</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Razón social</label>
                <input type="text" placeholder="Razón social" class="form-control" name="CompanyBranchName" ng-model="companybranch_form.CompanyBranchName"
                    required="" />
                <div class="m-t-xs" ng-show="companybranch.CompanyBranchName.$invalid && companybranch.CompanyBranchName.$dirty">
                    <small class="text-danger" ng-show="companybranch.CompanyBranchName.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Nombre comercial</label>
                <input type="text" placeholder="Nombre comercial" class="form-control" name="TradeName" ng-model="companybranch_form.TradeName"
                    required="" />
                <div class="m-t-xs" ng-show="companybranch.TradeName.$invalid && companybranch.TradeName.$dirty">
                    <small class="text-danger" ng-show="companybranch.TradeName.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Dirección</label>
                <input type="text" placeholder="Dirección" class="form-control" name="Address" ng-model="companybranch_form.Address" required=""
                />
                <div class="m-t-xs" ng-show="companybranch.Address.$invalid && companybranch.Address.$dirty">
                    <small class="text-danger" ng-show="companybranch.Address.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Teléfono</label>
                <input type="text" placeholder="Número de teléfono" class="form-control" name="Phone" ng-pattern="/^[0-9]*$/" ng-model="companybranch_form.Phone">
                <div class="m-t-xs" ng-show="companybranch.Phone.$invalid && companybranch.Phone.$dirty">
                    <small class="text-danger" ng-show="companybranch.Phone.$error.pattern">El número de teléfono no es válido</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Email</label>
                <input type="email" placeholder="Correo electrónico" class="form-control" name="Email" ng-model="companybranch_form.Email">
                <div class="m-t-xs" ng-show="companybranch.Email.$invalid && companybranch.Email.$dirty">
                    <small class="text-danger" ng-show="companybranch.Email.$error">Correo electrónico inválido</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Sitio web</label>
                <input type="url" placeholder="Dirección de sitio web" class="form-control" name="WebsiteUrl" ng-model="companybranch_form.WebsiteUrl">
                <div class="m-t-xs" ng-show="companybranch.WebsiteUrl.$invalid && companybranch.WebsiteUrl.$dirty">
                    <small class="text-danger" ng-show="companybranch.WebsiteUrl.$error">Ingresa una URL válido (http://sitio.com)</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Empresa</label>
                <select class="form-control" name="CompanyId" ng-model="companybranch_form.CompanyId" required="">
                    <option ng-repeat="company in companies" value="{{company.CompanyId}}">{{company.CompanyName}}</option>
                </select>
                <div class="m-t-xs" ng-show="companies.CompanyId.$invalid && companies.CompanyId.$dirty">
                    <small class="text-danger" ng-show="companies.CompanyId.$error.required">Campo obligatorio</small>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" ng-click="cancel()">Cancelar</button>
        <button type="button" class="btn btn-primary" ng-click="ok(companybranch_form)" ng-disabled="companybranch.$invalid">Aceptar</button>
    </div>
</div>