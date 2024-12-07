<!DOCTYPE html>

<html lang="en" data-sidenav-size="full">

<head>
    <meta charset="utf-8" />
    <title>Paws Haven</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="icon_logo.png" type="image/png">

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
    <script src="assets/js/js.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <script src="assets/js/pagination/pagination.js"></script>

    <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <!-- App css -->
    <link href="assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jscharting.com/latest/jscharting.js"></script>

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

        @media (max-width: 770px) {
            .scrollable-column {
                height: auto;
                overflow-y: auto;
            }
        }

        .scroll-content {
            height: 90%;
        }

        .card-body {
            background-color: #f2f2f2 !important;
            border: 1px solid #0c698b;
            color: black !important;
        }

        th {
            background-color: #0396a6 !important;
        }


        .disabled-editor {
            user-select: text;
            /* Allows text selection */
            pointer-events: none;
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
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom py-0 px-0" style="background-color: #0396a6">
            <div class="topbar ">
                <div class="d-flex align-items-center">
                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar px-0 py-0">
                        <!-- Logo light -->
                        <a href="{{ url('/announcements') }}" class="logo-light">
                            <span class="logo-lg">
                                <img src="assets/images/logooooo.png" alt="dark logo" width="70px">
                            </span>
                            <span class="logo-sm">
                                PH
                            </span>
                        </a>
                    </div>

                    <a href="{{ url('/announcements') }}" class="logo-dark">
                        <span class="">
                            <img src="assets/images/logooooo.png" alt="dark logo" width="70px">
                        </span>
                    </a>

                    <button class="button-toggle-menu d-lg-none d-sm-block text-white">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <button class="navbar-toggle text-white" data-bs-toggle="collapse"
                        data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                </div>
                <div class="container d-none d-lg-block">
                    <div class="row justify-content-center d-flex align-items-center">
                        @if (Auth::user()->type == 0)
                            <div class="col-auto">
                                <a class="nav-link me-2 text-white fw-semibold" href="{{ url('/announcements') }}"
                                    role="button">
                                    Home
                                </a>
                            </div>
                            <div class="col-auto ">
                                <a class="me-2 nav-link text-white fw-semibold" href="{{ url('/lost-n-found') }}"
                                    role="button">
                                    Lost and Found
                                </a>
                            </div>
                            <div class="col-auto">
                                <a class="nav-link me-2 text-white fw-semibold" href="{{ url('/adopt-a-dog') }}"
                                    role="button">
                                    Adoption
                                </a>
                            </div>

                            <div class="col-auto">
                                <a class="nav-link me-2 text-white fw-semibold" role="button"
                                    href="{{ url('/about') }}">
                                    About
                                </a>
                            </div>
                        @else
                            <div class="col-auto">
                                <a class="nav-link text-white fw-semibold" href="{{ url('/announcements') }}"
                                    role="button">
                                    Dashboard
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="{{ url('/report-lost-dog') }}" class="nav-link text-white fw-semibold">
                                    <span> Lost and Found </span>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="{{ url('/animal-list') }}" class="nav-link text-white fw-semibold">
                                    <span> Adoption </span>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="{{ url('/ticket-list') }}" class="nav-link text-white fw-semibold">
                                    <span> Ticket </span>
                                </a>
                            </div>
                            {{-- <div class="col-auto">
                                <a href="{{ url('/ticket-list') }}" class="nav-link text-white fw-semibold">
                                    <span> About </span>
                                </a>
                            </div> --}}
                        @endif
                    </div>
                </div>
                <ul class="topbar-menu d-flex align-items-center gap-3">

                    <li class="dropdown notification-list ">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ri-notification-3-line font-22 text-white"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                            <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border text-white">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 font-16 fw-semibold text-black"> Notification</h6>
                                    </div>
                                    <div class="col-auto">
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="" id="notification_here" style="max-height: 350px; overflow-y: auto;">
                                <!-- Notification content goes here -->
                            </div>

                            <!-- All-->
                            @if(Auth::user()->type != 1)
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ticketlist"
                                    class="dropdown-item text-center text-primary notify-item border-top py-2">
                                    View All
                                </a>
                            @endif
                         

                        </div>
                    </li>

                    <li class="dropdown">
                        <a style="background-color: #0396a6" class="nav-link dropdown-toggle arrow-none nav-user px-2"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="{{ asset('storage/' . Auth::user()->profile_path) }}" alt="user-image"
                                    width="32" height="32" class="rounded-circle">
                            </span>
                            <span class="d-lg-flex flex-column gap-1 d-none">
                                <h5 class="my-0 text-white">{{ Auth::user()->name }}</h5>
                                <h6 class="my-0 fw-normal text-white">{{ Auth::user()->email }}</h6>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">

                            </div>

                            <a href="{{ url('/archive') }}" class="dropdown-item">
                                <i class="mdi mdi-account-edit me-1"></i>
                                <span>Archive Data</span>
                            </a>

                            <!-- item-->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>

                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu text-white" style="background-image: linear-gradient(to bottom, #0396a6, #9cded8);">
            <!-- Brand Logo Light -->
            <a href="{{ url('/annoucements') }}" class="logo logo-light">
                <span class="logo-lg fw-bold text-white fs-3">
                    PAWS HAVEN
                </span>
                <span class="logo-sm fw-bold text-white fs-3">
                    PAWS HAVEN
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="{{ url('/annoucements') }}" class="logo logo-dark">
                <span class="logo-lg fw-bold text-white fs-4">
                    PAWS HAVEN
                </span>
                <span class="logo-sm fw-bold text-white fs-4">
                    PAWS HAVEN
                </span>
            </a>

            <!-- Sidebar Hover Menu Toggle Button -->
            <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right"
                title="Show Full Sidebar">
                <i class="ri-checkbox-blank-circle-line align-middle"></i>
            </div>

            <!-- Full Sidebar Menu Close Button -->
            <div class="button-close-fullsidebar">
                <i class="ri-close-fill align-middle text-white"></i>
            </div>

            <!-- Sidebar -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!-- Leftbar User -->


                <!--- Sidemenu -->
                <ul class="side-nav">

                    @if (Auth::user()->type == 0)
                        <li class="side-nav-item">
                            <a class="side-nav-link text-white me-2 text-white fw-semibold"
                                href="{{ url('/announcements') }}" role="button"> <i class="uil-calender"></i>

                                Home
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="me-2 side-nav-link text-white fw-semibold" href="{{ url('/lost-n-found') }}"
                                role="button">
                                <i class="uil-calender"></i>
                                Lost and Found
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link me-2 text-white fw-semibold" href="{{ url('/adopt-a-dog') }}"
                                role="button"> <i class="uil-calender"></i>

                                Adoption
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a class="side-nav-link me-2 text-white fw-semibold" role="button"
                                href="{{ url('/about') }}">
                                <i class="uil-calender"></i>
                                About
                            </a>
                        </li>
                    @else
                        <li class="side-nav-item">
                            <a class="side-nav-link text-white fw-semibold" href="{{ url('/announcements') }}"
                                role="button">
                                <i class="uil-calender"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/report-lost-dog') }}" class="side-nav-link text-white fw-semibold">
                                <i class="uil-calender"></i>
                                <span> Lost and Found </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/animal-list') }}" class="side-nav-link text-white fw-semibold">
                                <i class="uil-calender"></i>
                                <span> Adoption </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('/ticket-list') }}" class="side-nav-link text-white fw-semibold">
                                <i class="uil-calender"></i>
                                <span> Ticket </span>
                            </a>
                        </li>
                    @endif
                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page" style="background-color: #9CDED8" id="whitebg">
            <div class="content">
                @yield('content')
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />



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
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <!-- App js -->

    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/vendor/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"></script>
    <!-- App js -->
    <script src="assets/js/app.min.js"></script>



</body>


</html>
