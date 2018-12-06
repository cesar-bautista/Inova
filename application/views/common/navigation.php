<nav class="navbar-default navbar-static-side" role="navigation" ng-controller="navCtrl">
    <div class="sidebar-collapse" ng-init="init();">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header text-center">
                <div class="profile-element" uib-dropdown="">
                    <img alt="Profile" class="img-circle" src="/assets/img/{{user.photo}}" />
                    <a uib-dropdown-toggle="" href="">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{user.nickName}}</strong>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li ng-class="{active: $state.includes('{{node.group}}')}" 
                ng-repeat="node in menu" ng-include="'nodes_renderer.html'"
                side-navigation=""
            ></li>

            <li>
                <a ui-sref="login">
                    <i class="fa fa-lg fa-sign-out"></i>
                    <span class="nav-label">Salir</span>
                </a>
            </li>
        </ul>

        <script type="text/ng-template" id="nodes_renderer.html">
            <a href="#" ng-if="!node.url">
                <i class="fa fa-lg {{node.icon}}"></i>
                <span class="nav-label">{{node.title}}</span>
                <span ng-class="{'fa arrow' : node.nodes.length > 0}"></span>
            </a>

            <a ui-sref="{{node.url || ' ' }}" ng-if="node.url">
                <i class="fa fa-lg {{node.icon}}"></i>
                <span class="nav-label">{{node.title}}</span>
                <span ng-class="{'fa arrow' : node.nodes.length > 0}"></span>
            </a>

            <ul class="nav nav-second-level" ng-if="!node.url" ng-class="{in: $state.includes('{{node.group}}')}">
                <li ui-sref-active="active" ng-repeat="node in node.nodes" ng-include="'nodes_renderer.html'"></li>
            </ul>
        </script>
    </div>
</nav>