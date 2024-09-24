<!DOCTYPE html>
<html lang="en" data-layout="topnav" data-menu-color="brand" data-topbar-color="light">


<head>
    <meta charset="utf-8" />
    <title>Paws Haven</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Daterangepicker css -->
    <link href="assets/vendor/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- Vector Map css -->
    <link href="assets/vendor/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <!-- Theme Config Js -->
    <script src="assets/js/hyper-config.js"></script>
    <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <!-- App css -->
    <link href="assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <style>
        .daterangepicker {
            z-index: 400000;
        }

        #success-alert-modal {
            z-index: 400000;
        }
    </style>
    @vite(['resources/js/app.js'])

    @livewireStyles
</head>

<body>
    <div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-success">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="ri-check-line h1"></i>
                        <h4 class="mt-2">Saved!</h4>
                        <p id="datatoedit"></p>
                        <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal"
                            onclick="location.reload()">Continue</button>

                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Topbar Start ========== -->
        <!-- ========== Topbar End ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-lg-2 gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="{{ url('/home') }}" class="logo-light">
                            <span class="logo-lg">
                                <img src="assets/logo2.png" alt="logo" height="100%">
                            </span>
                            <span class="logo-sm">
                                <h3 class="py-2 px-2 text-white">PH</h3>
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="{{ url('/home') }}" class="logo-dark">
                            <span class="logo-lg">
                                <img src="assets/logo2.png" alt="logo" height="100%">
                            </span>
                            <span class="logo-sm">
                                <h3 class="py-2 px-2 text-black">PH</h3>
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    <!-- Topbar Search Form -->
                </div>
                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ri-notification-3-line font-22"></i>
                            <span class="noti-icon-badge"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                            <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                            <small>Clear All</small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="px-2" style="max-height: 300px;" data-simplebar>

                                <h5 class="text-muted font-13 fw-normal mt-2">Today</h5>
                                <!-- item-->

                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i
                                                class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon bg-primary">
                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Datacorp <small
                                                        class="fw-normal text-muted ms-1">1 min ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">Caleb Flakelar
                                                    commented on
                                                    Admin</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i
                                                class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon bg-info">
                                                    <i class="mdi mdi-account-plus"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Admin <small
                                                        class="fw-normal text-muted ms-1">1 hours ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">New user
                                                    registered</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <h5 class="text-muted font-13 fw-normal mt-0">Yesterday</h5>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i
                                                class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="assets/images/users/avatar-2.jpg"
                                                        class="img-fluid rounded-circle" alt="" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Cristina Pride
                                                    <small class="fw-normal text-muted ms-1">1 day ago</small>
                                                </h5>
                                                <small class="noti-item-subtitle text-muted">Hi, How are you? What
                                                    about our next meeting</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <h5 class="text-muted font-13 fw-normal mt-0">30 Dec 2021</h5>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i
                                                class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon bg-primary">
                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Datacorp</h5>
                                                <small class="noti-item-subtitle text-muted">Caleb Flakelar
                                                    commented
                                                    on Admin</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i
                                                class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="assets/images/users/avatar-4.jpg"
                                                        class="img-fluid rounded-circle" alt="" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Karen Robinson</h5>
                                                <small class="noti-item-subtitle text-muted">Wow ! this admin looks
                                                    good and awesome design</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="text-center">
                                    <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                </div>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);"
                                class="dropdown-item text-center text-primary notify-item border-top py-2">
                                View All
                            </a>

                        </div>
                    </li>

                    <li class="d-none d-sm-inline-block">
                        <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Theme Mode">
                            <i class="ri-moon-line font-22"></i>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32"
                                    class="rounded-circle">
                            </span>
                            <span class="d-lg-flex flex-column gap-1 d-none">
                                <h5 class="my-0">{{ Auth::user()->name }}</h5>
                                <h6 class="my-0 fw-normal">{{ Auth::user()->email }}</h6>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="mdi mdi-account-edit me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Left Sidebar Start ========== -->
        @if (Auth::user()->role == 'user')
            <div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/home') }}" role="button">
                                        <i class="uil-home-alt"></i>Dashboards
                                    </a>
                                </li> --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/fur-community') }}" role="button">
                                        <i class="uil-dashboard"></i>Fur Community
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/adopt-a-dog') }}" role="button">
                                        <i class="uil-dashboard"></i>Adoption
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/report-lost-dog') }}" role="button">
                                        <i class="uil-dashboard"></i>Report Lost Dog
                                    </a>
                                </li>
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/request-rounds') }}" role="button">
                                        <i class="uil-dashboard"></i>Request Rounds
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        @else
            <div class="leftside-menu">

                <a href="{{ url('/home') }}" class="logo logo-light">
                    <span class="logo-lg">
                        <h3 class="py-2 px-2 text-white">PAWS HAVEN</h3>
                    </span>
                    <span class="logo-sm">
                        <h3 class="mt-3 text-white">PH</h3>
                    </span>
                </a>

                <!-- Brand Logo Dark -->
                <a href="{{ url('/home') }}" class="logo logo-dark">
                    <span class="logo-lg">
                        <h3 class="py-2 px-2 text-white">PAWS HAVEN</h3>
                    </span>
                    <span class="logo-sm">
                        <h3 class="mt-3 text-white">PAWS</h3>
                    </span>
                </a>

                <!-- Sidebar Hover Menu Toggle Button -->
                <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right"
                    title="Show Full Sidebar">
                    <i class="ri-checkbox-blank-circle-line align-middle"></i>
                </div>

                <!-- Full Sidebar Menu Close Button -->
                <div class="button-close-fullsidebar">
                    <i class="ri-close-fill align-middle"></i>
                </div>

                <!-- Sidebar -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <div class="leftbar-user">
                        <a href="pages-profile.html">
                            <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42"
                                class="rounded-circle shadow-sm">
                            <span class="leftbar-user-name mt-2">Dominic Keller</span>
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <ul class="side-nav">
                        <li class="side-nav-title">Navigation</li>
                        <li class="side-nav-item">
                            <a href="{{ url('/home') }}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Dashboards </span>
                            </a>
                        </li>
                        <li class="side-nav-title">Data Management</li>

                        <li class="side-nav-item">
                            <a href="{{ url('/fur-community') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span> Fur Community </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/adopt-a-dog') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span> Adoption Form </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/report-lost-dog') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span> Report Form </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/request-rounds') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span> Request Rounds </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false"
                                aria-controls="sidebarExtendedUI" class="side-nav-link">
                                <i class="uil-package"></i>
                                <span> Pets List</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarExtendedUI">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ url('/animal-list') }}">Animal Lists</a>
                                    </li>
                                    <li>
                                </ul>
                            </div>
                        </li>





                        <!-- Help Box -->
                        {{-- <div class="help-box text-white text-center">
                        <a href="javascript: void(0);" class="float-end close-btn text-white">
                            <i class="mdi mdi-close"></i>
                        </a>
                        <img src="assets/images/svg/help-icon.svg" height="90" alt="Helper Icon Image" />
                        <h5 class="mt-3">Unlimited Access</h5>
                        <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
                        <a href="javascript: void(0);" class="btn btn-secondary btn-sm">Upgrade</a>
                    </div> --}}
                        <!-- end Help Box -->


                    </ul>
                    <!--- End Sidemenu -->

                    <div class="clearfix"></div>
                </div>
            </div>
        @endif

        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content Here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                @yield('content')
            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">

            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->


    @livewireScripts





    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>
    <!-- Dropzone File Upload js -->
    <script src="assets/vendor/dropzone/dropzone-min.js"></script>

    <!-- File Upload Demo js -->
    <script src="assets/js/ui/component.fileupload.js"></script>

    <!-- Bootstrap Timepicker Plugin js -->
    <script src="assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

    <!-- Flatpickr Timepicker Plugin js -->
    <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>

    <!-- Timepicker Demo js -->
    <script src="assets/js/pages/demo.timepicker.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/vendor/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"></script>
    <!-- App js -->
    <script src="assets/js/app.min.js"></script>



</body>


</html>
