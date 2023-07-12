@extends('layouts.no_sidebar')

@section('page-content')
    <div class="content d-flex justify-content-center align-items-center">

        <!-- Container -->
        <div class="flex-fill">

            <!-- Error title -->
            <div class="text-center mb-4">
                <img src="{{ asset(config('constants.error_image')) }}" class="img-fluid mb-3" height="230" alt="">
                <h1 class="display-3 fw-semibold lh-1 mb-3">405</h1>
                <h6 class="w-md-25 mx-md-auto">Rất tiếc, đã xảy ra lỗi. <br> Phương pháp bạn đang sử dụng để truy cập tệp không được phép.</h6>
            </div>
            <!-- /error title -->


            <!-- Error content -->
            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">
                    <i class="ph-house me-2"></i>
                    Trở về trang chủ
                </a>
            </div>
            <!-- /error wrapper -->

        </div>
        <!-- /container -->

    </div>
@endsection
