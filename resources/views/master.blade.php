<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('css')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{url('/img/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
</head>

<body>
    @include('components.sidebar')
    @include('sweetalert::alert')
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
                <nav class="navbar navbar-expand navbar-light ml-auto ">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="dropdown position-absolute" style="left: 87%">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex" style="border-radius: 20px; ">
                                        <div class="user-name" style="padding-inline: 40px">
                                            <h6 class="mb-0 text-dark d-flex text-capitalize">
                                                {{Auth::user()->name != null ? Auth::user()->name : "username"}}
                                                <i class="bi bi-caret-down-square-fill ms-2"></i>
                                            </h6>
                                            <p class="mb-0 text-sm text-gray-600">
                                                @if (auth()->user()->role== "superadmin")
                                                Superadmin
                                                @elseif(auth()->user()->role== "teknisi")
                                                Teknisi
                                                @else
                                                Viewer
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{Auth::user()->name}}
                                        </h6>
                                    </li>
                                    <li><a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#editProfile">
                                            <i class="icon-mid bi bi-person-fill me-2"></i>
                                            Edit Profile
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" role="button">
                                            <i class="icon-mid bi bi-box-arrow-left me-2"></i>

                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                                <div class="modal fade text-left" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-secondary">
                                                <h5 class="modal-title white" id="myModalLabel160">Edit profile
                                                </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/updateProfile/{{Auth::user()->id}}" class="form form-vertical" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <form class="form form-vertical">
                                                        <div class="form-body">
                                                            <div class="row">
                                                            <input type="hidden" name="role" value="{{ Auth::user()->role }}" class="form-control" placeholder="Name" id="first-name-icon">
                                                                <div class="col-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="first-name-icon">Name</label>
                                                                        <div class="position-relative">
                                                                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" placeholder="Name" id="first-name-icon" required>
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-person-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="email-id-icon">Email</label>
                                                                        <div class="position-relative">
                                                                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" placeholder="Email" id="email-id-icon" required>
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-envelope-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="first-name-icon">Password</label>
                                                                        <div class="position-relative">
                                                                            <input type="password" name="password" class="form-control" placeholder="Type your new password" id="first-name-icon" required>
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-key-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="first-name-icon">Confirm Password</label>
                                                                        <div class="position-relative">
                                                                            <input type="password" name="confirm_password" class="form-control" placeholder="Re-Type your new password" id="first-name-icon" required>
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-key-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Cancel</span>
                                                </button>
                                                <button type="submit" class="btn btn-secondary ml-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Update</span>
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div class="page-heading">
                <h3>@yield('title-page')</h3>
            </div>
            @yield('body')
        </div>
    </div>
    @yield('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/mazer.js"></script>
</body>

</html>