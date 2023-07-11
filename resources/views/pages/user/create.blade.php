@extends('layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Tài khoản - <span class="fw-normal">Tạo mới</span>
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="{{ route('users.index') }}" class="breadcrumb-item">Tài khoản</a>
                    <span class="breadcrumb-item active">Tạo mới</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-content')
    <div class="content">

        <!-- Main charts -->
        <!-- /main charts -->


        <!-- Dashboard content -->
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <div class="title bold"><i class="ph-squares-four"></i> Thông tin chung</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" id="user-form" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name-input">Họ và tên <span class="text-danger">*</span>:</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name-input" name="name">
                                        @error('name')
                                        <div id="error-name" class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="username-input">Tên đăng nhập <span class="text-danger">*</span>:</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="username-input" name="username">
                                        @error('username')
                                        <div id="error-username" class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email-input">Email <span class="text-danger">*</span>:</label>
                                        <input type="text" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email-input" name="email">
                                        @error('email')
                                        <div id="error-email" class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <div class="title bold"><i class="ph-gear"></i> Tác vụ</div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-teal mr-2" id="btn-submit"><i class="ph-paper-plane-tilt me-1"></i> Tạo mới</button>
                        <a href="{{ route('users.index') }}" class="btn btn-warning mr-2"><i class="ph-arrow-u-up-left me-1"></i> Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /dashboard content -->

    </div>
@endsection

@section('script_custom')
    @vite(['resources/js/user/create.js'])
@endsection
