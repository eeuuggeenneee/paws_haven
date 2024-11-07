<!DOCTYPE html>

<html lang="en" data-layout="topnav">


<head>
    <meta charset="utf-8" />
    <title>Paws Haven</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Daterangepicker css -->
    <link href="assets/vendor/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.quilljs.com/1.2.2/quill.min.js"></script>
    <link href="https://cdn.quilljs.com/1.2.2/quill.snow.css" rel="stylesheet">
    <script crossorigin="anonymous"
        src="https://cdn.rawgit.com/kensnyder/quill-image-resize-module/3411c9a7/image-resize.min.js"></script>
    <!-- Vector Map css -->
    <link href="assets/vendor/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css">
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

        .swal2-container {
            z-index: 400000;
        }

        .ql-hidden {
            display: none !important;
        }

        /* Scrollable column */
        .scrollable-column {
            height: 100vh;
            overflow-y: auto;
        }

        .scroll-content {
            height: 90%;
        }
    </style>
    {{-- @vite(['resources/js/app.js']) --}}

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
            <div class="topbar px-3">
                <div class="d-flex align-items-center gap-lg-2 gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="index.html" class="logo-dark">
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="dark logo">
                            </span>
                            <span class="logo-sm">
                                <img src="assets/images/logo-dark-sm.png" alt="small logo">
                            </span>
                        </a>
                    </div>
                    <div class="app-search dropdown d-none d-lg-block">

                    </div>

                </div>
                <ul class="navbar-nav d-flex flex-row align-items-center">
                    @if (Auth::user()->type == 0)
                        <li class="nav-item me-4">
                            <a class="nav-link" href="{{ url('/lost-n-found') }}" role="button">
                                <i class="uil-dashboard"></i> Lost and Found
                            </a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="{{ url('/adopt-a-dog') }}" role="button">
                                <i class="uil-dashboard"></i> Adoption
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-4" href="{{ url('/annoucements') }}" role="button">
                                <i class="uil-dashboard"></i> Annoucements
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-4" href="{{ url('/fur-community') }}" role="button">
                                <i class="uil-dashboard"></i> About
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link me-4" href="{{ url('/annoucements') }}" role="button">
                                <i class="uil-dashboard"></i> Annoucement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/report-lost-dog') }}" class="nav-link me-4">
                                <i class="uil-comments-alt"></i>
                                <span> Add Dog for LnF </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/animal-list') }}" class="nav-link me-4">
                                <i class="uil-comments-alt"></i>
                                <span> Add Dog For Adoption </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ticket-list') }}" class="nav-link me-4">
                                <i class="uil-comments-alt"></i>
                                <span> Ticket Lists </span>
                            </a>
                        </li>
                    @endif
                </ul>

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

                            <div class="px-2" style="max-height: 300px;" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: 0px -12px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                aria-label="scrollable content"
                                                style="height: auto; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 0px 12px;">

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
                                                                    <h5 class="noti-item-title fw-semibold font-14">
                                                                        Datacorp <small
                                                                            class="fw-normal text-muted ms-1">1 min
                                                                            ago</small></h5>
                                                                    <small class="noti-item-subtitle text-muted">Caleb
                                                                        Flakelar commented on Admin</small>
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
                                                                    <h5 class="noti-item-title fw-semibold font-14">
                                                                        Admin <small
                                                                            class="fw-normal text-muted ms-1">1 hours
                                                                            ago</small></h5>
                                                                    <small class="noti-item-subtitle text-muted">New
                                                                        user registered</small>
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
                                                                            class="img-fluid rounded-circle"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 text-truncate ms-2">
                                                                    <h5 class="noti-item-title fw-semibold font-14">
                                                                        Cristina Pride <small
                                                                            class="fw-normal text-muted ms-1">1 day
                                                                            ago</small></h5>
                                                                    <small class="noti-item-subtitle text-muted">Hi,
                                                                        How are you? What about our next meeting</small>
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
                                                                    <h5 class="noti-item-title fw-semibold font-14">
                                                                        Datacorp</h5>
                                                                    <small class="noti-item-subtitle text-muted">Caleb
                                                                        Flakelar commented on Admin</small>
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
                                                                            class="img-fluid rounded-circle"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 text-truncate ms-2">
                                                                    <h5 class="noti-item-title fw-semibold font-14">
                                                                        Karen Robinson</h5>
                                                                    <small class="noti-item-subtitle text-muted">Wow !
                                                                        this admin looks good and awesome design</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>

                                                    <div class="text-center">
                                                        <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                </div>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);"
                                class="dropdown-item text-center text-primary notify-item border-top py-2">
                                View All
                            </a>

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
                                <h5 class="my-0">Dominic Keller</h5>
                                <h6 class="my-0 fw-normal">Founder</h6>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Left Sidebar Start ========== -->

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
