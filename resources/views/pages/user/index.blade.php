@extends('layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Danh sách người dùng
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <span class="breadcrumb-item active">Người dùng </span>
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
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        {{ $title }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /dashboard content -->

    </div>
@endsection


