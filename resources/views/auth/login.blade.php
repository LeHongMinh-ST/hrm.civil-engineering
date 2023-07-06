<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('includes.head')
<body>

<!-- Main navbar -->
<div class="navbar navbar-dark navbar-static py-2">
    <div class="container-fluid">
        <div class="navbar-brand">
            <a href="index.html" class="d-inline-flex align-items-center">
                <img src="https://demo.interface.club/limitless/demo/template/assets/images/logo_icon.svg" alt="">
                <img src="https://demo.interface.club/limitless/demo/template/assets/images/logo_text_light.svg" class="d-none d-sm-inline-block h-16px ms-3" alt="">
            </a>
        </div>
    </div>
</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login form -->
                <form class="login-form" action="https://demo.interface.club/limitless/demo/template/html/layout_1/full/index.html">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                    <img src="https://demo.interface.club/limitless/demo/template/assets/images/logo_icon.svg" class="h-48px" alt="">
                                </div>
                                <h5 class="mb-0">Chào mừng quay trở lại</h5>
                                <span class="d-block text-muted">Đăng nhập bằng tài khoản hệ thống</span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tài khoản/Email</label>
                                <div class="form-control-feedback form-control-feedback-start">
                                    <input type="text" class="form-control" placeholder="john@doe.com">
                                    <div class="form-control-feedback-icon">
                                        <i class="ph-user-circle text-muted"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mật khẩu</label>
                                <div class="form-control-feedback form-control-feedback-start">
                                    <input type="password" class="form-control" placeholder="•••••••••••">
                                    <div class="form-control-feedback-icon">
                                        <i class="ph-lock text-muted"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                            </div>

                            <div class="text-center">
                                <a href="login_password_recover.html">Quên mật khẩu?</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /login form -->

            </div>
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

</html>
