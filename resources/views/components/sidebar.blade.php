<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo ">
                    <a href="/"><img src="assets/images/logo/logoap1.png" alt="Logo" srcset="" style="width: 140px; height: 60px;" /></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{Route::is('home') ? 'active' : ''}}">
                    <a href="{{route('home')}}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title ">Unit</li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub {{Route::is('monitor.index') || Route::is('printer.index') || Route::is('keyboard.index') || Route::is('mouse.index') || Route::is('cpu.index') ? 'active' : ''}}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-stack"></i>
                        <span>Unit Services</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{Route::is('monitor.index') ? 'active' : ''}}">
                            <a href="{{route('monitor.index')}}">Monitor</a>
                        </li>
                        <li class="submenu-item {{Route::is('printer.index') ? 'active' : ''}}">
                            <a href="{{route('printer.index')}}">Printer</a>
                        </li>
                        <li class="submenu-item {{Route::is('keyboard.index') ? 'active' : ''}}">
                            <a href="{{route('keyboard.index')}}">Keyboard</a>
                        </li>
                        <li class="submenu-item {{Route::is('mouse.index') ? 'active' : ''}}">
                            <a href="{{route('mouse.index')}}">Mouse</a>
                        </li>
                        <li class="submenu-item {{Route::is('cpu.index') ? 'active' : ''}}">
                            <a href="{{route('cpu.index')}}">CPU</a>
                        </li>
                        <li class="submenu-item {{Route::is('others.index') ? 'active' : ''}}">
                            <a href="{{route('cpu.index')}}">Others</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Loan</li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class="fa fa-boxes"></i>
                        <span>Loan</span>
                    </a>
                </li>
                <li class="sidebar-title">Report</li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class="fa-fw select-all fas"></i>
                        <span>Repairing report</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class="bi bi-printer-fill"></i>
                        <span>Loan Report</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
        </button>
    </div>
</div>