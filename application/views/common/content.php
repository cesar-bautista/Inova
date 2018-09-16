<!-- Wrapper-->
<div id="wrapper">

    <!-- Navigation -->
    <div ng-include="'inicio/navigation'"></div>

    <!-- Page wraper -->
    <!-- ng-class with current state name give you the ability to extended customization your view -->
    <div id="page-wrapper" class="gray-bg {{$state.current.name}}">

        <!-- Page wrapper -->
        <div ng-include="'inicio/topnavbar'"></div>

        <!-- Main view  -->
        <div ui-view=""></div>

        <!-- Footer -->
        <div ng-include="'inicio/footer'"></div>

    </div>
    <!-- End page wrapper-->

    <!-- Right Sidebar -->
    <div ng-include="'inicio/right_sidebar'"></div>

</div>
<!-- End wrapper-->