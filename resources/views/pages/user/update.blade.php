@extends('layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Tài khoản - <span class="fw-normal">Cập nhật #{{ $user->id }}</span>
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="{{ route('users.index') }}" class="breadcrumb-item">Tài khoản</a>
                    <span class="breadcrumb-item active">Cập nhật</span>
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
                        <form action="{{ route('users.update', ['id' => $user->id]) }}" id="user-form" method="post">
                            @method('put')
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name-input">Họ và tên <span class="text-danger">*</span>:</label>
                                        <input type="text" class="form-control" value="{{ old('name', $user->name) }}" id="name-input" name="name">
                                        @error('name')
                                        <label id="error-name" class="validation-error-label text-danger" for="basic">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="username-input">Tên đăng nhập <span class="text-danger">*</span>:</label>
                                        <input type="text" class="form-control" value="{{ old('username', $user->username) }}" id="username-input" name="username">
                                        @error('username')
                                        <label id="error-username" class="validation-error-label text-danger" for="basic">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email-input">Email <span class="text-danger">*</span>:</label>
                                        <input type="text" class="form-control" value="{{ old('email', $user->email) }}" id="email-input" name="email">
                                        @error('email')
                                        <label id="error-email" class="validation-error-label text-danger" for="basic">{{ $message }}</label>
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
                        <button class="btn btn-teal mr-2" id="btn-submit"><i class="ph-paper-plane-tilt"></i> Lưu</button>
                        <a href="{{ route('users.index') }}" class="btn btn-warning mr-2"><i class="ph-arrow-u-up-left"></i> Quay lại</a>
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
