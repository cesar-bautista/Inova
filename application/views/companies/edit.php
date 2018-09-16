<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title">{{form_name}}</h4>
        <small class="font-bold">Empresa</small>
    </div>
    <div class="modal-body">
        <form role="form" name="company" novalidate>
            <div class="col-xs-6 form-group">
                <label>RFC</label>
                <input type="text" placeholder="RFC" class="form-control" name="Rfc" ng-model="company_form.Rfc" ng-minlength="12" ng-maxlength="13"
                    ng-pattern="/^[A-ZÑ&]{3,4}\d{6}(?:[A-Z\d]{3})?$/" required="" />
                <div class="m-t-xs" ng-show="company.Rfc.$invalid && company.Rfc.$dirty">
                    <small class="text-danger" ng-show="company.Rfc.$error.required">Campo obligatorio</small>
                    <small class="text-danger" ng-show="company.Rfc.$error.minlength">Este campo requiere mínimo 12 caracteres</small>
                    <small class="text-danger" ng-show="company.Rfc.$error.maxlength">Este campo requiere máximo 13 caracteres</small>
                    <small class="text-danger" ng-show="company.Rfc.$error.pattern">El RFC no es válido</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Razón social</label>
                <input type="text" placeholder="Razón social" class="form-control" name="CompanyName" ng-model="company_form.CompanyName"
                    required="" />
                <div class="m-t-xs" ng-show="company.CompanyName.$invalid && company.CompanyName.$dirty">
                    <small class="text-danger" ng-show="company.CompanyName.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Nombre comercial</label>
                <input type="text" placeholder="Nombre comercial" class="form-control" name="TradeName" ng-model="company_form.TradeName"
                    required="" />
                <div class="m-t-xs" ng-show="company.TradeName.$invalid && company.TradeName.$dirty">
                    <small class="text-danger" ng-show="company.TradeName.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Dirección</label>
                <input type="text" placeholder="Dirección" class="form-control" name="Address" ng-model="company_form.Address" required=""
                />
                <div class="m-t-xs" ng-show="company.Address.$invalid && company.Address.$dirty">
                    <small class="text-danger" ng-show="company.Address.$error.required">Campo obligatorio</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Teléfono</label>
                <input type="text" placeholder="Número de teléfono" class="form-control" name="Phone" ng-pattern="/^[0-9]*$/" ng-model="company_form.Phone">
                <div class="m-t-xs" ng-show="company.Phone.$invalid && company.Phone.$dirty">
                    <small class="text-danger" ng-show="company.Phone.$error.pattern">El número de teléfono no es válido</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Email</label>
                <input type="email" placeholder="Correo electrónico" class="form-control" name="Email" ng-model="company_form.Email">
                <div class="m-t-xs" ng-show="company.Email.$invalid && company.Email.$dirty">
                    <small class="text-danger" ng-show="company.Email.$error">Correo electrónico inválido</small>
                </div>
            </div>
            <div class="col-xs-6 form-group">
                <label>Sitio web</label>
                <input type="url" placeholder="Dirección de sitio web" class="form-control" name="WebsiteUrl" ng-model="company_form.WebsiteUrl">
                <div class="m-t-xs" ng-show="company.WebsiteUrl.$invalid && company.WebsiteUrl.$dirty">
                    <small class="text-danger" ng-show="company.WebsiteUrl.$error">Ingresa una URL válido (http://sitio.com)</small>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" ng-click="cancel()">Cancelar</button>
        <button type="button" class="btn btn-primary" ng-click="ok(company_form)" ng-disabled="company.$invalid">Aceptar</button>
    </div>
</div>