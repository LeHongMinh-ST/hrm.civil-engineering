@extends('layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Danh sách thợ(nhân công)
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <span class="breadcrumb-item active">Thợ</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Content -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="content-header d-flex justify-content-between align-items-end">
                            <div class="content-filter w-50">
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <form action="" method="get" id="form-search">
                                            <div class="form-group">
                                                <label for="worker-search-input">Tìm kiếm</label>
                                                <div class="form-control-feedback form-control-feedback-end">
                                                    <input type="text" name="q" value="{{ request()->query('q') }}"
                                                           placeholder="Nhập từ khoá để tìm kiếm..."
                                                           class="form-control" id="worker-search-input">
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-magnifying-glass"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>

                            </div>
                            <div class="content-action">
                                <a href="{{route('workers.create', request()->query())}}" class="btn btn-teal"><i
                                        class="ph-plus-circle me-1"></i> Tạo mới</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="content-table">
                            <table class="table-bordered table table-responsive">
                                <thead>
                                <tr>
                                    <th class="text-center" width="4%">STT</th>
                                    <th>Họ và tên</th>
                                    <th class="text-center">Ngày sinh</th>
                                    <th>Số điện thoại</th>
                                    <th>CMT/CCCD</th>
                                    <th class="text-center">Hệ số lương</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center" width="10%">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($workers as $worker)
                                    <tr>
                                        <td class="text-center">{{ getIndexTable($loop->index, $workers) }}</td>
                                        <td>{{ $worker->name }}</td>
                                        <td class="text-center">{{ $worker->dob ?? 'Chưa có' }}</td>
                                        <td>{{ $worker->phone ?? 'Chưa có' }}</td>
                                        <td>{{ $worker->citizen_identification ?? 'Chưa có' }}</td>
                                        <td class="text-center">
                                            {{ $worker->coefficients_salary ? number_format($worker->coefficients_salary) : 0 }}
                                            VNĐ/1 ngày công
                                        </td>
                                        <td class="text-center">{!! $worker->statusText !!}</td>
                                        <td class="text-center">
                                            <div class="dropdown text-center">
                                                <a href="#" class="text-body" data-bs-toggle="dropdown"
                                                   aria-expanded="false">
                                                    <i class="ph-list me-2"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end w-100 w-lg-auto" style="">
                                                    <a href="{{ route('workers.show', ['worker' => $worker->id]) }}"
                                                       class="dropdown-item">
                                                        <i class="ph-user me-2"></i>
                                                        Xem chi tiết
                                                    </a>
                                                    <a href="{{ route('workers.edit', ['worker' => $worker->id, ...request()->query()]) }}"
                                                       class="dropdown-item">
                                                        <i class="ph-pencil-simple-line me-2"></i>
                                                        Chỉnh sửa
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <form
                                                        action="{{ route('workers.destroy', ['worker' => $worker->id, ...request()->query()]) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="button"
                                                                class="btn-delete dropdown-item text-danger">
                                                            <i class="ph-trash me-2"></i>
                                                            Xoá
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">
                                            <div class="empty-table text-center">
                                                <div class="image-empty">
                                                    <img src="{{ asset(config('constants.empty_image')) }}"
                                                         width="300px" alt="">
                                                </div>
                                                <div class="text-empty">Không có bản ghi!</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-center align-items-center w-100 mt-3">

                                <div class="pagination">
                                    {{ $workers->appends(request()->input())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content -->

    </div>
@endsection

@section('script_custom')
    @vite(['resources/js/worker/index.js'])
@endsection

