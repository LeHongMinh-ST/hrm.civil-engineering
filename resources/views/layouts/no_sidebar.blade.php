<!DOCTYPE html>
<html lang="en" dir="ltr">

@include('includes.head')

<body>

<!-- Main navbar -->
@include('includes.header')
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Page header -->
            @yield('page-header')
            <!-- /page header -->


            <!-- Content area -->
            @yield('page-content')
            <!-- /content area -->


            <!-- Footer -->
            @include('includes.footer')
            <!-- /footer -->

        </div>
        <!-- /inner content -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->



</body>

<!-- Mirrored from demo.interface.club/limitless/demo/template/html/layout_1/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jul 2023 07:49:01 GMT -->
</html>
