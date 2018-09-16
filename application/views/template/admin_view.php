<!DOCTYPE html>
<html ng-app="inspinia">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Page title set in pageTitle directive -->
    <title page-title=""></title>
    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font awesome -->
    <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Main Inspinia CSS files -->
    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" id="loadBefore" />
</head>

<body ng-controller="MainCtrl as main" class="{{$state.current.data.specialClass}}" landing-scrollspy="" id="page-top">
    
    <?= $content ?>
    
    <!-- jQuery and Bootstrap -->
    <script src="<?= base_url() ?>assets/js/jquery/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- MetsiMenu -->
    <script src="<?= base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Peace JS -->
    <script src="<?= base_url() ?>assets/js/plugins/pace/pace.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?= base_url() ?>assets/js/inspinia.js"></script>
    <!-- Main Angular scripts-->
    <script src="<?= base_url() ?>assets/js/angular/angular.min.js"></script>
    <script src="<?= base_url() ?>assets/js/angular/angular-sanitize.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/oclazyload/dist/ocLazyLoad.min.js"></script>
    <script src="<?= base_url() ?>assets/js/ui-router/angular-ui-router.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap/ui-bootstrap-tpls-1.1.2.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/angular-idle/angular-idle.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/angular-jwt/angular-jwt.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/angular-storage/angular-storage.js"></script>

    <!-- Anglar App Script -->
    <script src="<?= base_url() ?>assets/js/app.js"></script>
    <script src="<?= base_url() ?>assets/js/config.js"></script>
    <script src="<?= base_url() ?>assets/js/factories.js"></script>
    <script src="<?= base_url() ?>assets/js/directives.js"></script>
    <script src="<?= base_url() ?>assets/js/controllers.js"></script>
</body>

</html>