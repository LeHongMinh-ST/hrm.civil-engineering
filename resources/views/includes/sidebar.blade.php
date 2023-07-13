<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Hệ thống quản lý</h5>

                <div>
                    <button type="button"
                            class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button"
                            class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                       class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="ph-house"></i>
                        <span>Bảng điều khiển</span>
                    </a>
                </li>
                <!-- Chung -->
                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Quản lý chung</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>

                <li class="nav-item">
                    <a href="{{ route('attendances.index') }}"
                       class="nav-link {{ request()->is('attendances*') ? 'active' : '' }}">
                        <i class="ph-calendar-check"></i>
                        <span>Bảng công thợ</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('workers.index') }}"
                       class="nav-link {{ request()->is('workers*') ? 'active' : '' }}">
                        <i class="ph-users"></i>
                        <span>Quản lý thợ</span>
                    </a>
                </li>


                <!-- Lương Thưởng -->
                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Lương thưởng</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="ph-currency-circle-dollar"></i>
                        <span>Bảng lương</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="ph-coins"></i>
                        <span>Ứng lương</span>
                    </a>
                </li>

                @if(auth()->user()->role === \App\Enums\User\UserRole::Admin)

                    <!-- Hệ thống -->
                    <li class="nav-item-header pt-0">
                        <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Hệ thống</div>
                        <i class="ph-dots-three sidebar-resize-show"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                           class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                            <i class="ph-user"></i>
                            <span>Tài khoản</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/log-viewer') }}" class="nav-link">
                            <i class="ph-bug-beetle"></i>
                            <span>Log</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
