@extends('layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Thợ(Nhân công) - <span class="fw-normal">Tạo mới</span>
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="{{ route('workers.index') }}" class="breadcrumb-item">Thợ</a>
                    <span class="breadcrumb-item active">Tạo mới</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Content -->
        <form action="{{ route('workers.store') }}" id="worker-form" method="post">
            @csrf
            <div class="row">
                <div class="col-12 col-xl-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="title bold"><i class="ph-squares-four me-1"></i> Thông tin chung</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group text-center">
                                        <div class="card-img-actions d-inline-block mb-3">
                                            <div id="holder" class="image-preview">
                                                <img class="img-fluid" id="holder"
                                                     src="{{ asset(config('constants.user_image_default')) }}"
                                                     width="150" height="150" alt="">
                                            </div>
                                            <div class="card-img-actions-overlay card-img">
                                                <label for="image"></label><input id="image" type="text" hidden
                                                                                  name="thumbnail">
                                                <a href="javascript:void(0)" id="lfm" data-input="image"
                                                   data-preview="holder"
                                                   class="btn btn-outline-white btn-icon rounded-pill me-1">
                                                    <i class="ph-pencil"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="form-group mb-3">
                                        <label for="name-input">Họ và tên <span class="text-danger">*</span>:</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name') }}" id="name-input" name="name">
                                        @error('name')
                                        <div id="error-name" class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="dob-input">Ngày sinh:</label>

                                        <div class="input-group">
                                            <span class="input-group-text"><i class="ph-calendar"></i></span>
                                            <input type="text"
                                                   class="form-control daterange-single @error('dob') is-invalid @enderror"
                                                   value="{{ old('dob') }}" id="dob-input" name="dob">
                                        </div>
                                        @error('dob')
                                        <div id="error-name" class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group  mb-3">
                                        <label for="phone-input">Số điện thoại:</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                               value="{{ old('phone') }}" id="phone-input" name="phone">
                                        @error('phone')
                                        <div id="error-phone" class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group  mb-3">
                                        <label for="citizen_identification-input">CMT/CCCD:</label>
                                        <input type="text"
                                               class="form-control @error('citizen_identification') is-invalid @enderror"
                                               value="{{ old('citizen_identification') }}"
                                               id="citizen_identification-input" name="citizen_identification">
                                        @error('citizen_identification')
                                        <div id="error-phone" class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group  mb-3">
                                        <label for="address-input">Địa chỉ:</label>
                                        <textarea type="text"
                                                  class="form-control @error('address') is-invalid @enderror"
                                                  id="address-input" name="address">{{ old('address') }}</textarea>
                                        @error('phone')
                                        <div id="error-address" class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="title bold"><i class="ph-coins me-1"></i> Hệ số lương</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-3">
                                        <label for="coefficients_salary-input"></label>
                                        <div class="input-group">
                                            <input type="text"
                                                   class="form-control money @error('coefficients_salary') is-invalid @enderror"
                                                   value="{{ old('coefficients_salary', 0) }}"
                                                   id="coefficients_salary-input" name="coefficients_salary">
                                            <span class="input-group-text">VNĐ</span>
                                        </div>

                                        @error('coefficients_salary')
                                        <div id="error-coefficients_salary"
                                             class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="title bold"><i class="ph-gear me-1"></i> Tác vụ</div>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-teal mr-2 mb-2" id="btn-submit" type="button"><i
                                    class="ph-paper-plane-tilt me-1"></i>
                                Tạo mới
                            </button>
                            <a href="{{ route('workers.index', request()->query()) }}" class="btn btn-warning mr-2 mb-2"><i
                                    class="ph-arrow-u-up-left me-1"></i> Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- /content -->

    </div>
@endsection

@section('script_custom')
    @vite(['resources/js/worker/create.js'])
@endsection
