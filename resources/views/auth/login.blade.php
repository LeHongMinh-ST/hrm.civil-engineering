<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('includes.head')

@vite(['resources/js/auth/login/index.js'])

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
                <form class="login-form" action="{{ route('postLogin') }}" method="Post">
                    @csrf
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
                                <label class="form-label" for="username">Tài khoản/Email</label>
                                <div class="form-control-feedback form-control-feedback-start">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}"
                                           name="username" placeholder="john@doe.com">
                                    <div class="form-control-feedback-icon">
                                        <i class="ph-user-circle text-muted"></i>
                                    </div>
                                </div>
                                @error('username')
                                <div id="error-username" class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="password">Mật khẩu</label>
                                <div class="form-control-feedback form-control-feedback-start">
                                    <input type="password" id="password" value="{{ old('password') }}"
                                           name="password" class="form-control @error('password') is-invalid @enderror" placeholder="•••••••••••">
                                    <div class="form-control-feedback-icon">
                                        <i class="ph-lock text-muted"></i>
                                    </div>

                                </div>
                                @error('password')
                                <div id="error-password" class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <label class="form-check">
                                    <input type="checkbox" name="remember" class="form-check-input cursor-pointer">
                                    <span class="form-check-label cursor-pointer">Lưu đăng nhập</span>
                                </label>

                                <a href="login_password_recover.html" class="ms-auto">Quên mật khẩu?</a>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
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
