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

                <li class="sidebar-item">
                    <a href="/" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub {{Route::is('monitor.index') || Route::is('printer.index') || Route::is('keyboard.index') || Route::is('mouse.index') || Route::is('cpu.index') ? 'active' : ''}}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-stack"></i>
                        <span>Assets</span>
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
                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-collection-fill"></i>
                        <span>Extra Components</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="extra-component-avatar.html">Avatar</a>
                        </li>
                        <li class="submenu-item">
                            <a href="extra-component-sweetalert.html">Sweet Alert</a>
                        </li>
                        <li class="submenu-item">
                            <a href="extra-component-toastify.html">Toastify</a>
                        </li>
                        <li class="submenu-item">
                            <a href="extra-component-rating.html">Rating</a>
                        </li>
                        <li class="submenu-item">
                            <a href="extra-component-divider.html">Divider</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="layout-default.html">Default Layout</a>
                        </li>
                        <li class="submenu-item">
                            <a href="layout-vertical-1-column.html">1 Column</a>
                        </li>
                        <li class="submenu-item">
                            <a href="layout-vertical-navbar.html">Vertical Navbar</a>
                        </li>
                        <li class="submenu-item">
                            <a href="layout-rtl.html">RTL Layout</a>
                        </li>
                        <li class="submenu-item">
                            <a href="layout-horizontal.html">Horizontal Menu</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Forms &amp; Tables</li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Form Elements</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="form-element-input.html">Input</a>
                        </li>
                        <li class="submenu-item">
                            <a href="form-element-input-group.html">Input Group</a>
                        </li>
                        <li class="submenu-item">
                            <a href="form-element-select.html">Select</a>
                        </li>
                        <li class="submenu-item">
                            <a href="form-element-radio.html">Radio</a>
                        </li>
                        <li class="submenu-item">
                            <a href="form-element-checkbox.html">Checkbox</a>
                        </li>
                        <li class="submenu-item">
                            <a href="form-element-textarea.html">Textarea</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="form-layout.html" class="sidebar-link">
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Form Layout</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-pen-fill"></i>
                        <span>Form Editor</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="form-editor-quill.html">Quill</a>
                        </li>
                        <li class="submenu-item">
                            <a href="form-editor-ckeditor.html">CKEditor</a>
                        </li>
                        <li class="submenu-item">
                            <a href="form-editor-summernote.html">Summernote</a>
                        </li>
                        <li class="submenu-item">
                            <a href="form-editor-tinymce.html">TinyMCE</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="table.html" class="sidebar-link">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Table</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Datatables</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="table-datatable.html">Datatable</a>
                        </li>
                        <li class="submenu-item">
                            <a href="table-datatable-jquery.html">Datatable (jQuery)</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Extra UI</li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-pentagon-fill"></i>
                        <span>Widgets</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="ui-widgets-chatbox.html">Chatbox</a>
                        </li>
                        <li class="submenu-item">
                            <a href="ui-widgets-pricing.html">Pricing</a>
                        </li>
                        <li class="submenu-item">
                            <a href="ui-widgets-todolist.html">To-do List</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-egg-fill"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="ui-icons-bootstrap-icons.html">Bootstrap Icons
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="ui-icons-fontawesome.html">Fontawesome</a>
                        </li>
                        <li class="submenu-item">
                            <a href="ui-icons-dripicons.html">Dripicons</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="ui-chart-chartjs.html">ChartJS</a>
                        </li>
                        <li class="submenu-item">
                            <a href="ui-chart-apexcharts.html">Apexcharts</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="ui-file-uploader.html" class="sidebar-link">
                        <i class="bi bi-cloud-arrow-up-fill"></i>
                        <span>File Uploader</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-map-fill"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="ui-map-google-map.html">Google Map</a>
                        </li>
                        <li class="submenu-item">
                            <a href="ui-map-jsvectormap.html">JS Vector Map</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Pages</li>

                <li class="sidebar-item">
                    <a href="application-email.html" class="sidebar-link">
                        <i class="bi bi-envelope-fill"></i>
                        <span>Email Application</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="application-chat.html" class="sidebar-link">
                        <i class="bi bi-chat-dots-fill"></i>
                        <span>Chat Application</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="application-gallery.html" class="sidebar-link">
                        <i class="bi bi-image-fill"></i>
                        <span>Photo Gallery</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="application-checkout.html" class="sidebar-link">
                        <i class="bi bi-basket-fill"></i>
                        <span>Checkout Page</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="auth-login.html">Login</a>
                        </li>
                        <li class="submenu-item">
                            <a href="auth-register.html">Register</a>
                        </li>
                        <li class="submenu-item">
                            <a href="auth-forgot-password.html">Forgot Password</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-x-octagon-fill"></i>
                        <span>Errors</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="error-403.html">403</a>
                        </li>
                        <li class="submenu-item">
                            <a href="error-404.html">404</a>
                        </li>
                        <li class="submenu-item">
                            <a href="error-500.html">500</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Raise Support</li>

                <li class="sidebar-item">
                    <a href="https://zuramai.github.io/mazer/docs" class="sidebar-link">
                        <i class="bi bi-life-preserver"></i>
                        <span>Documentation</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class="sidebar-link">
                        <i class="bi bi-puzzle"></i>
                        <span>Contribute</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="https://github.com/zuramai/mazer#donate" class="sidebar-link">
                        <i class="bi bi-cash"></i>
                        <span>Donate</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
        </button>
    </div>
</div>