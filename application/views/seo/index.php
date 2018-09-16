<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>SEO</h2>
        <ol class="breadcrumb">
            <li>
                <a href="">Configuración</a>
            </li>
            <li class="active">
                <strong>Seo</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Administración de SEO</h5>
                </div>
                <div class="ibox-content" ng-init="init();">

                    <uib-accordion close-others="true" ng-repeat="(key, value) in seo">
                        <uib-accordion-group is-open="status.open">
                            <uib-accordion-heading>
                                {{key}}
                                <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.open, 'glyphicon-chevron-right': !status.open}"></i>
                            </uib-accordion-heading>
                            <div ng-repeat="(index, item) in value">
                                <div class="col-xs-6 form-group">
                                    <label>{{item.Name}}</label>
                                    <input type="text" placeholder="{{item.Name}}" class="form-control" ng-model="seo[key][index].Value" required="" />
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <button ladda="loadingDemo" ng-click="save(seo[key])" class="ladda-button btn btn-primary" data-style="zoom-in">Guardar</button>
                                </div>    
                            </div>
                        </uib-accordion-group>
                    </uib-accordion>

                </div>
            </div>
        </div>
    </div>
</div>