<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo ">
                    <a href="/"><img src="assets/images/logo/logoap1.png" alt="Logo" srcset="" style="width: 197px; height: 85px;" /></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        @if (auth()->user()->role == "superadmin"||auth()->user()->role == "teknisi")
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ Route::is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('department.index') ? 'active' : '' }}">
                    <a href="{{ route('department.index') }}" class="sidebar-link">
                        <i class="fa fa-window-restore"></i>
                        <span>Department</span>
                    </a>
                </li>
                @if (auth()->user()->role == "superadmin")
                <li class="sidebar-item {{ Route::is('user.index') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class="sidebar-link">
                        <i class="fa fa-user-friends"></i>
                        <span>Users</span>
                    </a>
                </li>
                @endif
                <li class="sidebar-title ">Assets</li>
                <li class="sidebar-item {{ Route::is('category.index') ? 'active' : '' }}">
                    <a href="{{ route('category.index') }}" class="sidebar-link">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('asset.index') ? 'active' : '' }}">
                    <a href="{{ route('asset.index') }}" class="sidebar-link">
                        <i class="fa fa-desktop"></i>
                        <span>Assets</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('service.index') ? 'active' : '' }}">
                    <a href="{{ route('service.index') }}" class="sidebar-link">
                        <i class="fa fa-wrench"></i>
                        <span>Service of Assets</span>
                    </a>
                </li>
                <!-- <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fa fa-wrench"></i>
                        <span>Service of Assets</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ Route::is('service.index') ? 'active' : '' }}">
                            <a href="{{route('service.index')}}">In Trouble</a>
                        </li>
                        <li class="submenu-item {{ Route::is('asset.index') ? 'active' : '' }}">
                            <a href="{{route('asset.index')}}">New Asset</a>
                        </li>
                    </ul>
                </li> -->
                <li class="sidebar-title">Borrowing</li>
                <li class="sidebar-item {{ Route::is('loan.index') ? 'active' : '' }}">
                    <a href="{{ route('loan.index') }}" class="sidebar-link">
                        <i class="bi bi-arrow-up-right-square-fill"></i>
                        <span>Borrowing</span>
                    </a>
                </li>
                <li class="sidebar-title">Report</li>
                {{--<li class="sidebar-item {{ Route::is('lpp.index') ? 'active' : '' }}">
                    <a href="{{ route('lpp.index') }}" class="sidebar-link">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>LPP report</span>
                    </a>
                </li>--}}
                <li class="sidebar-item {{ Route::is('report-repairing.index') ? 'active' : '' }}">
                    <a href="{{ route('report-repairing.index') }}" class="sidebar-link">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Repairing report</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('report-loan.index') ? 'active' : '' }}">
                    <a href="{{ route('report-loan.index') }}" class="sidebar-link">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Borrowing Report</span>
                    </a>
                </li>
            </ul>
        </div>
        @endif
        @if (auth()->user()->role == "viewer")
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ Route::is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title">Report</li>
                <li class="sidebar-item {{ Route::is('report-repairing.index') ? 'active' : '' }}">
                    <a href="{{ route('report-repairing.index') }}" class="sidebar-link">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Repairing report</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('report-loan.index') ? 'active' : '' }}">
                    <a href="{{ route('report-loan.index') }}" class="sidebar-link">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Loan Report</span>
                    </a>
                </li>
            </ul>
        </div>
        @endif
        <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
        </button>
    </div>
</div>