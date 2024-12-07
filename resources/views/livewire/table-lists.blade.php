<div>
    <style>
        .responsive-div {
            overflow-y: auto;
        }

        @media (min-width: 1200px) {

            /* For large screens (XL and above) */
            .responsive-div {
                min-height: 500px;
                max-height: 500px;
                display: flex;
                flex-direction: row;
                overflow-y: auto;
                padding: 0;
            }
        }

        @media (max-width: 576px) {

            /* For small screens (SM and below) */
            .responsive-div {
                min-height: 100px;
                max-height: 100px;
                display: flex;
                flex-direction: column;
                overflow-x: auto;
            }
        }

        .swal2-container {
            z-index: 20000 !important;
        }

        .table-footer {}

        .table-container {
            overflow-x: auto;
            /* Enables horizontal scrolling */
            -webkit-overflow-scrolling: touch;
            /* Smooth scrolling for iOS devices */
            margin-bottom: 20px;
            /* Adjust as needed */
        }

        .table-container table {
            min-width: 100%;
            /* Makes sure the table takes up at least the full width of its container */
        }

        .table-footer nav {
            position: relative;
            width: 100%;
            text-align: center;
        }

        .table-footer nav * {
            display: inline-block;
        }

        .table-footer nav .showing {
            color: #b3b3b3;
        }

        @media (min-width: 1025px) {
            .table-footer nav .showing {
                display: inline-block;
                position: absolute;
                left: 14.75%;
            }
        }

        .table-footer nav>.primary-btn {
            vertical-align: middle;
        }

        @media (min-width: 1025px) {
            .table-footer nav>.primary-btn {
                position: absolute;
                right: 1em;
            }
        }

        .pagination .pager li {
            display: inline-block;
            line-height: 1.2;
        }

        .pagination .pager li.active a {
            font-weight: 700;
            border-bottom: 3px solid #057ed8;
            color: #000;
        }

        .pagination a {
            text-decoration: none;
            color: #66696a;
            padding: 0.3333333333ex 0.25em 0.2ex;
            font-size: 16px;
        }

        .pagination .prev,
        .pagination .next {
            width: 8px;
            height: 16px;
        }

        .search-container {
            flex: 1 1 auto;
            /* Allow the search container to grow and shrink, but it won’t force overflow */
            position: absolute;
            margin-bottom: 15px;
            flex-grow: 1;
            /* Allows the search container to grow to use available space */
        }

        /* Style the search input field */
        .search {
            width: 100%;
            /* Ensure input fills container */
            padding-left: 30px;
            /* Space for the icon */
            border-radius: 20px;
            /* Round the edges */
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            padding: 8px 12px;
            /* Padding inside the input */
            text-align: center;
        }

        .c_search {
            width: 100%;
            /* Ensure input fills container */
            padding-left: 30px;
            /* Space for the icon */
            border-radius: 20px;
            /* Round the edges */
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            padding: 8px 12px;
            /* Padding inside the input */
            text-align: center;
        }

        .cl_search {
            width: 100%;
            /* Ensure input fills container */
            padding-left: 30px;
            /* Space for the icon */
            border-radius: 20px;
            /* Round the edges */
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            padding: 8px 12px;
            /* Padding inside the input */
            text-align: center;
        }

        .search-container::before {
            content: "\1F50D";
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #888;
        }

        .search-container input.c_search {
            width: 100%;
            /* Ensure input fills container */
            text-align: center;
            /* Center the placeholder and typed text */
        }

        .search-container input.cl_search {
            width: 100%;
            /* Ensure input fills container */
            text-align: center;
            /* Center the placeholder and typed text */
        }

        .search-container input.search {
            width: 100%;
            /* Ensure input fills container */
            text-align: center;
            /* Center the placeholder and typed text */
        }

        thead {
            position: sticky;
            top: 0;
            /* Keeps the header at the top of the container when scrolling */
            z-index: 1;
            /* Ensures the header stays above the content */
        }


        .dog_name {
            white-space: nowrap;
        }
    </style>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title text-black">Ticket List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card" style="background-color: #f2f2f2;">
                <div class="card-body px-0 py-0">
                    <ul class="nav nav-tabs nav-bordered mb-3" wire:ignore>
                        <li class="nav-item">
                            <a href="#settings-b1" data-bs-toggle="tab" aria-expanded="false"
                                class="active nav-link fw-bold text-black">
                                <svg class="d-md-none d-block" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0"
                                    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"
                                    class="hovered-paths">
                                    <g>
                                        <path fill="#2b4d66"
                                            d="M435.033 438.933H334.391c-4.143 0-7.501-3.358-7.501-7.501s3.358-7.501 7.501-7.501h100.642c4.143 0 7.501 3.358 7.501 7.501s-3.358 7.501-7.501 7.501z"
                                            opacity="1" data-original="#2b4d66"></path>
                                        <path fill="#407093"
                                            d="M382.683 372.854H124.647c-24.853 0-45-20.147-45-45V69.819c0-24.853 20.147-45 45-45h258.035c24.853 0 45 20.147 45 45v258.035c.001 24.853-20.147 45-44.999 45z"
                                            opacity="1" data-original="#407093" class="hovered-path"></path>
                                        <path fill="#365e7d"
                                            d="M382.677 24.819h-24.76V263.47c0 24.856-20.15 45.006-45.006 45.006H79.647v19.372c0 24.856 20.15 45.006 45.006 45.006h258.024c24.856 0 45.006-20.15 45.006-45.006V69.825c-.001-24.856-20.15-45.006-45.006-45.006z"
                                            opacity="1" data-original="#365e7d"></path>
                                        <path fill="#f6e266"
                                            d="M382.677 387.856H124.653c-33.088 0-60.008-26.919-60.008-60.008V69.825c0-33.088 26.92-60.008 60.008-60.008h258.024c33.088 0 60.008 26.92 60.008 60.008v258.024c0 33.088-26.92 60.007-60.008 60.007zM124.653 39.821c-16.544 0-30.004 13.46-30.004 30.004v258.024c0 16.544 13.46 30.004 30.004 30.004h258.024c16.544 0 30.004-13.46 30.004-30.004V69.825c0-16.544-13.46-30.004-30.004-30.004z"
                                            opacity="1" data-original="#f6e266"></path>
                                        <path fill="#f1d333"
                                            d="M417.152 20.753a59.71 59.71 0 0 1 10.829 34.367v272.715c0 25.028-20.289 45.317-45.316 45.317H109.949a59.71 59.71 0 0 1-34.367-10.829c10.87 15.427 28.807 25.533 49.071 25.533h258.024c33.088 0 60.008-26.919 60.008-60.008V69.825c0-20.264-10.107-38.201-25.533-49.072z"
                                            opacity="1" data-original="#f1d333"></path>
                                        <path fill="#2b4d66"
                                            d="M74.281 438.933H7.501c-4.143 0-7.501-3.358-7.501-7.501s3.358-7.501 7.501-7.501h66.78c4.143 0 7.501 3.358 7.501 7.501s-3.358 7.501-7.501 7.501z"
                                            opacity="1" data-original="#2b4d66"></path>
                                        <path fill="#90d8f9"
                                            d="M198.607 409.696h-89.041c-8.284 0-15-6.716-15-15V220.54c0-8.284 6.716-15 15-15h89.041c8.284 0 15 6.716 15 15v174.156c0 8.284-6.716 15-15 15z"
                                            opacity="1" data-original="#90d8f9"></path>
                                        <path fill="#6bbef6"
                                            d="M198.605 205.54h-11.311v162.841c0 8.285-6.717 15.002-15.002 15.002H94.566v11.311c0 8.285 6.717 15.002 15.002 15.002h89.037c8.285 0 15.002-6.717 15.002-15.002V220.541c0-8.285-6.716-15.001-15.002-15.001z"
                                            opacity="1" data-original="#6bbef6"></path>
                                        <path fill="#407093"
                                            d="M198.605 205.54h-89.037a15 15 0 0 0-3.446.413l14.929 25.858a14.265 14.265 0 0 0 12.353 7.132h41.366c5.096 0 9.805-2.719 12.353-7.132l14.929-25.858a15.009 15.009 0 0 0-3.447-.413z"
                                            opacity="1" data-original="#407093" class="hovered-path"></path>
                                        <path fill="#365e7d"
                                            d="M198.605 205.54h-19.49l-14.484 25.088a16.629 16.629 0 0 1-14.401 8.314h24.54c5.096 0 9.805-2.719 12.353-7.132l14.929-25.858a15.064 15.064 0 0 0-3.447-.412z"
                                            opacity="1" data-original="#365e7d"></path>
                                        <path fill="#2b4d66"
                                            d="M198.605 417.197h-89.037c-12.408 0-22.503-10.095-22.503-22.503V220.541c0-12.408 10.095-22.503 22.503-22.503h89.037c12.408 0 22.503 10.095 22.503 22.503v174.153c0 12.408-10.095 22.503-22.503 22.503zM109.568 213.04c-4.136 0-7.501 3.365-7.501 7.501v174.153c0 4.136 3.365 7.501 7.501 7.501h89.037c4.136 0 7.501-3.365 7.501-7.501V220.541c0-4.136-3.365-7.501-7.501-7.501z"
                                            opacity="1" data-original="#2b4d66"></path>
                                        <path fill="#e48e81"
                                            d="M140.469 291.521h-11.637a7.86 7.86 0 0 1-7.86-7.86v-11.637a7.86 7.86 0 0 1 7.86-7.86h11.637a7.86 7.86 0 0 1 7.86 7.86v11.637a7.861 7.861 0 0 1-7.86 7.86z"
                                            opacity="1" data-original="#e48e81"></path>
                                        <path fill="#f6e266"
                                            d="m170.952 291.629-8.228-8.228a7.86 7.86 0 0 1 0-11.115l8.228-8.228a7.86 7.86 0 0 1 11.115 0l8.228 8.228a7.86 7.86 0 0 1 0 11.115l-8.228 8.228a7.858 7.858 0 0 1-11.115 0z"
                                            opacity="1" data-original="#f6e266"></path>
                                        <path fill="#f1d333"
                                            d="M187.294 269.284v17.118l3.001-3.001a7.86 7.86 0 0 0 0-11.115z"
                                            opacity="1" data-original="#f1d333"></path>
                                        <path fill="#e2dfe2"
                                            d="M140.469 373.45h-11.637a7.86 7.86 0 0 1-7.86-7.86v-11.637a7.86 7.86 0 0 1 7.86-7.86h11.637a7.86 7.86 0 0 1 7.86 7.86v11.637a7.861 7.861 0 0 1-7.86 7.86z"
                                            opacity="1" data-original="#e2dfe2"></path>
                                        <path fill="#78d0b1"
                                            d="M134.652 332.384h-.004c-7.553 0-13.676-6.123-13.676-13.676v-.004c0-7.553 6.123-13.676 13.676-13.676h.004c7.553 0 13.676 6.123 13.676 13.676v.004c0 7.553-6.123 13.676-13.676 13.676z"
                                            opacity="1" data-original="#78d0b1"></path>
                                        <path fill="#407093"
                                            d="M469.545 498.173v-22.288a3.988 3.988 0 0 1 3.019-3.871c5.779-1.445 9.972-6.94 9.375-13.282-.608-6.451-6.28-11.251-12.76-11.251h-44.558a5.001 5.001 0 0 1-5.001-5.001v-20.003a5.001 5.001 0 0 1 5.001-5.001h44.17c23.756 0 43.609 19.44 43.202 43.193-.37 21.59-16.937 39.306-38.045 41.491-2.354.246-4.403-1.619-4.403-3.987z"
                                            opacity="1" data-original="#407093" class="hovered-path"></path>
                                        <path fill="#365e7d"
                                            d="M484.754 420.545c8.731 7.914 14.208 19.29 13.992 31.879-.316 18.464-12.483 34.085-29.201 39.591v6.158c0 2.368 2.048 4.232 4.404 3.989 21.108-2.185 37.675-19.901 38.045-41.491.31-18.141-11.202-33.756-27.24-40.126z"
                                            opacity="1" data-original="#365e7d"></path>
                                        <path fill="#e48e81"
                                            d="m350.127 438.73 3.377-5.37a3.622 3.622 0 0 0 0-3.856l-3.377-5.37a38.838 38.838 0 0 1 0-41.347l4.319-6.868c1.668-2.652-.591-6.028-3.679-5.498L78.199 417.192a14.448 14.448 0 0 0 0 28.48l272.568 46.771c3.088.53 5.346-2.845 3.679-5.498l-4.319-6.868a38.836 38.836 0 0 1 0-41.347z"
                                            opacity="1" data-original="#e48e81"></path>
                                        <path fill="#dd636e"
                                            d="M350.127 480.077a38.838 38.838 0 0 1 0-41.347l3.377-5.37a3.622 3.622 0 0 0 0-3.856l-3.377-5.37a38.838 38.838 0 0 1 0-41.347l4.319-6.868c1.668-2.652-.591-6.028-3.679-5.498l-36.366 6.24a38.77 38.77 0 0 0 4.992 12.123l3.377 5.37a3.622 3.622 0 0 1 0 3.856l-3.377 5.37a38.838 38.838 0 0 0 0 41.347l4.319 6.868c1.668 2.652-.591 6.028-3.679 5.498l-237.186-40.7-4.648.798a14.448 14.448 0 0 0 0 28.48l272.568 46.771c3.088.53 5.346-2.845 3.679-5.498z"
                                            opacity="1" data-original="#dd636e"></path>
                                        <circle cx="258.966" cy="290.863" r="8.485" fill="#f6f1f1" opacity="1"
                                            data-original="#f6f1f1"></circle>
                                        <path fill="#f6f1f1"
                                            d="M258.966 253.95a7.5 7.5 0 0 1-7.501-7.501v-52.974a7.5 7.5 0 0 1 7.501-7.501c11.946 0 23.061-4.778 31.298-13.453 8.232-8.671 12.423-20.039 11.801-32.012-1.165-22.45-19.704-40.391-42.206-40.844-21.868-.432-40.621 15.518-43.637 37.121a43.795 43.795 0 0 0-.416 6.029c0 4.143-3.358 7.501-7.501 7.501s-7.501-3.358-7.501-7.501c0-2.713.189-5.439.561-8.103 4.063-29.124 29.299-50.633 58.797-50.046 30.327.611 55.314 24.799 56.885 55.065.836 16.122-4.812 31.436-15.904 43.119-9.353 9.851-21.462 15.972-34.676 17.654v45.946a7.5 7.5 0 0 1-7.501 7.5z"
                                            opacity="1" data-original="#f6f1f1"></path>
                                    </g>
                                </svg>
                                <span class="d-none d-md-block">Lost and found</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile-b1" data-bs-toggle="tab" aria-expanded="true"
                                class=" text-black nav-link fw-bold">
                                <svg class="d-md-none d-block" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0"
                                    y="0" viewBox="0 0 100 100" style="enable-background:new 0 0 512 512"
                                    xml:space="preserve" class="">
                                    <g>
                                        <path
                                            d="M33.333 63.333c-6.426 0-11.667 5.219-11.667 11.667 0 6.426 5.241 11.667 11.667 11.667S45 81.426 45 75c0-6.448-5.241-11.667-11.667-11.667zm0 16.667a5.01 5.01 0 0 1-5-5c0-2.764 2.246-5 5-5s5 2.236 5 5c0 2.754-2.246 5-5 5zM90 86.667V73.333l-16.667-6.666V50H70l-3.333 6.667L60 58.333v5h6.667v23.334h6.666V73.848l10 4.001v8.818z"
                                            fill="#000000" opacity="1" data-original="#000000" class="">
                                        </path>
                                        <path
                                            d="M61.667 76.667v-8.334H55V54.431l8.223-2.058L66.907 45h11.426v18.281L90 67.949V20H53.333v-6.667h-6.667V20H40L26.667 43.333 10 50v26.667h6.667V75c0-9.189 7.478-16.667 16.667-16.667S50 65.811 50 75v1.667zM34.346 43.333l9.523-16.666h12.798v16.666z"
                                            fill="#000000" opacity="1" data-original="#000000" class="">
                                        </path>
                                    </g>
                                </svg> <span class="d-none d-md-block">Rounds </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#home-b1" data-bs-toggle="tab" aria-expanded="false"
                                class=" text-black nav-link  fw-bold">
                                <svg class="d-md-none d-block" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0"
                                    y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512"
                                    xml:space="preserve" class="">
                                    <g>
                                        <path
                                            d="M294.763 367.838h-56.187V145.736h30.628c49.88 0 90.315 40.435 90.315 90.315v67.031c0 35.763-28.992 64.756-64.756 64.756z"
                                            style="" fill="#d46b5c" data-original="#d46b5c"></path>
                                        <path
                                            d="M75.041 367.838h56.187V145.736H100.6c-49.88 0-90.315 40.435-90.315 90.315v67.031c0 35.763 28.992 64.756 64.756 64.756z"
                                            style="" fill="#b55348" data-original="#b55348"></path>
                                        <path
                                            d="M63.424 353.176V246.908c0-67.163 54.388-112.865 121.478-112.865 67.091 0 121.478 45.702 121.478 112.865v106.268H63.424z"
                                            style="" fill="#fde0be" data-original="#fde0be"></path>
                                        <path
                                            d="M160.22 293.134c0-58.507 17.708-112.878 48.057-158.047-5.676-.691-17.474-1.045-23.375-1.045-67.091 0-121.478 45.702-121.478 112.865v106.268h103.161c-4.169-19.353-6.365-39.441-6.365-60.041z"
                                            style="" fill="#f7b073" data-original="#f7b073"></path>
                                        <path d="M113.018 392.782h143.768v97.783H113.018z" style=""
                                            fill="#fde0be" data-original="#fde0be"></path>
                                        <path
                                            d="M172.215 392.782h-59.197v97.783h121.157c-26.875-27.736-48.139-60.94-61.96-97.783z"
                                            style="" fill="#f7b073" data-original="#f7b073"></path>
                                        <ellipse cx="184.902" cy="410.749" rx="46.916" ry="47.03"
                                            style="" fill="#db4b86" data-original="#db4b86"></ellipse>
                                        <path
                                            d="M184.902 405.844a8.982 8.982 0 0 1 8.525 6.136c8.786 26.418 30.493 38.602 61.089 38.602 38.447 0 69.614-31.201 69.614-69.69s-31.167-69.69-69.614-69.69H115.288c-38.447 0-69.614 31.201-69.614 69.69s31.168 69.69 69.614 69.69c30.596 0 52.303-12.184 61.089-38.602a8.983 8.983 0 0 1 8.525-6.136z"
                                            style="" fill="#ffffff" data-original="#ffffff"></path>
                                        <path
                                            d="M160.786 311.203h-45.498c-38.447 0-69.614 31.202-69.614 69.69s31.167 69.69 69.614 69.69c30.596 0 52.303-12.184 61.089-38.602.461-1.387 7.237-2.602 8.235-3.576-13.36-30.014-21.662-62.776-23.826-97.202z"
                                            style="" fill="#d2dcfd" data-original="#d2dcfd"></path>
                                        <path
                                            d="M480.064 248.168c-16.59 0-22.999 10.467-24.966 14.944-1.967-4.477-8.376-14.944-24.966-14.944-16.977 0-31.936 11.722-31.936 33.126 0 8.661 1.733 16.081 6.577 24.362 9.948 17.008 43.64 38.148 50.325 42.438 6.685-4.29 40.377-25.431 50.325-42.438 4.844-8.281 6.577-15.701 6.577-24.362 0-21.405-14.959-33.126-31.936-33.126z"
                                            style="" fill="#fd7da0" data-original="#fd7da0"></path>
                                        <ellipse cx="184.902" cy="338.783" rx="27.514" ry="27.58"
                                            style="" fill="#fd7da0" data-original="#fd7da0"></ellipse>
                                        <path
                                            d="M256.786 452.376v38.189H113.018v-38.189M242.277 145.736h26.927c49.88 0 90.316 40.435 90.316 90.314v67.033c0 25.191-14.385 47.022-35.388 57.728M127.006 145.736h-26.405c-49.88 0-90.316 40.435-90.316 90.314v67.033c0 25.191 14.384 47.022 35.388 57.728"
                                            style="stroke-width:20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"
                                            fill="none" stroke="#052a75" stroke-width="20" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" data-original="#052a75">
                                        </path>
                                        <path
                                            d="M63.424 333.188v-86.28c0-67.163 54.388-112.865 121.478-112.865h0c67.091 0 121.478 45.702 121.478 112.865v86.28"
                                            style="stroke-width:20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"
                                            fill="none" stroke="#052a75" stroke-width="20" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" data-original="#052a75">
                                        </path>
                                        <path
                                            d="M184.902 405.844a8.982 8.982 0 0 1 8.525 6.136c8.786 26.418 30.493 38.602 61.089 38.602 38.447 0 69.614-31.201 69.614-69.69s-31.167-69.69-69.614-69.69H115.288c-38.447 0-69.614 31.201-69.614 69.69s31.168 69.69 69.614 69.69c30.596 0 52.303-12.184 61.089-38.602a8.983 8.983 0 0 1 8.525-6.136h0zM228.016 236.431v26.581M141.788 236.431v26.581"
                                            style="stroke-width:20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"
                                            fill="none" stroke="#052a75" stroke-width="20" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" data-original="#052a75">
                                        </path>
                                        <path
                                            d="m10 88.747 25.029-66.228c.511-1.26 2.282-1.262 2.796-.003l24.802 66.231M17.806 78.754h37.141M422.603 22.186h-27.83v66.561h27.83M420.551 55.466h-25.778M136.032 56.153c0 17.961-9.892 32.174-25.586 32.45-5.224.092-18.725.144-18.725.144L91.59 23.56h18.32c17.214-.001 26.122 14.632 26.122 32.593zM501.721 54.94c0 18.463-10.168 33.073-26.3 33.357-5.37.095-19.248.148-19.248.148l-.135-67.008h18.832c17.694-.002 26.851 15.04 26.851 33.503zM327.751 21.573h36.811M346.082 23.718v65.029M262.542 21.573v67.174M300.281 40.529c0 10.469-8.79 18.957-19.179 18.957-5.152 0-18.431.084-18.431.084s-.083-13.763-.083-19.04c0-4.334-.046-18.957-.046-18.957h18.56c10.388 0 19.179 8.487 19.179 18.956z"
                                            style="stroke-width:20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"
                                            fill="none" stroke="#fd6050" stroke-width="20" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" data-original="#fd6050">
                                        </path>
                                        <ellipse cx="197.673" cy="55.16" rx="33.328" ry="33.587"
                                            style="stroke-width:20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"
                                            fill="none" stroke="#fd6050" stroke-width="20" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" data-original="#fd6050">
                                        </ellipse>
                                    </g>
                                </svg> <span class="d-none d-md-block">Adoption</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" style="background-color: #f2f2f2">
                        <div class="tab-pane show active" id="settings-b1" wire:ignore.self>
                            <div class="card" style="background-color: #f2f2f2;" id="claimcard">
                                <div class="px-3">
                                    <h3>Claim List</h3>
                                    <div class="table-responsive-xl" id="claim_list" wire:ignore.self>
                                        <div class="d-flex align-items-center">
                                            <div class="search-container ms-auto">
                                                <input type="text" class="cl_search form-control " id="searchtb"
                                                    wire:model="searchDogClaim" wire:keydown="changeStatus"
                                                    style="width: 150%;" placeholder="Search for dogs...">
                                            </div>
                                            <h3 class="mb-4 d-flex align-items-center ms-auto"></h3>
                                            <div class="mb-2 d-lg-block d-none"
                                                style="display: flex; align-items: center; justify-content: space-between;">
                                                <!-- Other elements on the left -->
                                                <label for="addressFilter"
                                                    style="white-space: nowrap; margin-right: 10px;">Filter by
                                                    Proof</label>
                                                <select id="addressFilter" class="form-select" wire:model="dog_proof"
                                                    wire:change="changeStatus">
                                                    <option value="all">All</option>
                                                    <option value="with">With Proof</option>
                                                    <option value="without">Without Proof</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-2  d-sm-block d-lg-none"
                                            style="display: flex; align-items: center; justify-content: space-between;">
                                            <!-- Other elements on the left -->
                                            <label for="addressFilter"
                                                style="white-space: nowrap; margin-right: 10px;">Filter by
                                                Proof</label>
                                            <select id="addressFilter2" class="form-select ">
                                                <option value="">All</option>
                                                <option value="with">With Proof</option>
                                                <option value="without">Without Proof</option>
                                            </select>
                                        </div>

                                        <div class="table-container">

                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead style="background-color: #0396a6;">
                                                    <tr>
                                                        <th class="text-white sort">Ticket Number</th>
                                                        <th class="text-white">Requestor</th>
                                                        <th class="text-white">Dog</th>
                                                        <th class="text-white">Contact</th>
                                                        <th class="text-white">Proof</th>
                                                        <th class="text-white">Status</th>
                                                        <th style="width: 125px;" class="text-white">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @if (isset($claimlist))
                                                        @foreach ($claimlist as $cdata)
                                                            @if (isset($cdata['id']))
                                                                @php
                                                                    $imagestc = json_decode($cdata['animal_images']);
                                                                @endphp
                                                                <tr>
                                                                    <td class="ticket_number text-black">
                                                                        C{{ $cdata['created_at']->format('ym') . '-' . str_pad($cdata['id'], 4, '0', STR_PAD_LEFT) ?? 'N/A' }}
                                                                    <td class="requestor text-black">
                                                                        {{ $cdata['fullname'] ?? 'N/A' }}
                                                                    </td>
                                                                    <td class="dog_name">
                                                                        <div class="d-flex">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="flex-shrink-0">
                                                                                    @if (!is_null($imagestc) && isset($imagestc[0]))
                                                                                        <img src="{{ asset('storage/' . $imagestc[0]) }}"
                                                                                            class="rounded-circle avatar-xs"
                                                                                            alt="friend">
                                                                                    @else
                                                                                        <img src="{{ asset('storage/profile_pictures/xjxxrQTF3FiMAJ92RTzIrh15XRKYVLP9rtQt6g1E.png') }}"
                                                                                            class="rounded-circle avatar-xs"
                                                                                            alt="default">
                                                                                    @endif
                                                                                </div>
                                                                                <div
                                                                                    class="flex-grow-1 ms-2 text-black">
                                                                                    <h5 class="my-0">
                                                                                        {{ $cdata['dog_name'] }}
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td class="contact text-black">
                                                                        {{ $cdata['contact'] ?? 'N/A' }}
                                                                    </td>
                                                                    <td class="address"
                                                                        data-address-status="{{ isset($cdata['proof']) ? 'with' : 'without' }}">
                                                                        @if (isset($cdata['proof']))
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                version="1.1"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                width="20" height="20" x="0"
                                                                                y="0" viewBox="0 0 2.54 2.54"
                                                                                style="enable-background:new 0 0 512 512"
                                                                                xml:space="preserve"
                                                                                fill-rule="evenodd" class="">
                                                                                <g>
                                                                                    <circle cx="1.27"
                                                                                        cy="1.27" r="1.27"
                                                                                        fill="#00ba00" opacity="1"
                                                                                        data-original="#00ba00"
                                                                                        class=""></circle>
                                                                                    <path fill="#ffffff"
                                                                                        d="M.873 1.89.41 1.391a.17.17 0 0 1 .008-.24.17.17 0 0 1 .24.009l.358.383.567-.53a.17.17 0 0 1 .016-.013l.266-.249a.17.17 0 0 1 .24.008.17.17 0 0 1-.008.24l-.815.76-.283.263-.125-.134z"
                                                                                        opacity="1"
                                                                                        data-original="#ffffff"
                                                                                        class=""></path>
                                                                                </g>
                                                                            </svg>
                                                                        @else
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                version="1.1"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                width="20" height="20" x="0"
                                                                                y="0" viewBox="0 0 512 512"
                                                                                style="enable-background:new 0 0 512 512"
                                                                                xml:space="preserve" class="">
                                                                                <g>
                                                                                    <g data-name="Layer 2">
                                                                                        <circle cx="256"
                                                                                            cy="256" r="256"
                                                                                            fill="#f44336"
                                                                                            opacity="1"
                                                                                            data-original="#f44336"
                                                                                            class=""></circle>
                                                                                        <path fill="#ffffff"
                                                                                            d="M348.6 391a42.13 42.13 0 0 1-30-12.42L256 316l-62.6 62.61a42.41 42.41 0 1 1-60-60L196 256l-62.61-62.6a42.41 42.41 0 0 1 60-60L256 196l62.6-62.61a42.41 42.41 0 1 1 60 60L316 256l62.61 62.6a42.41 42.41 0 0 1-30 72.4z"
                                                                                            opacity="1"
                                                                                            data-original="#ffffff">
                                                                                        </path>
                                                                                    </g>
                                                                                </g>
                                                                            </svg>
                                                                        @endif

                                                                    </td>
                                                                    <td class="status">
                                                                        <h5 class="my-0">

                                                                            @if ($cdata['status_name'] == 'Found Dog')
                                                                                <span class="badge bg-danger">
                                                                                    Claim Rejected
                                                                                </span>
                                                                            @elseif($cdata['status_name'] == 'Lost Dog')
                                                                                <span class="badge bg-danger">
                                                                                    Lost Dog Rejected
                                                                                </span>
                                                                            @elseif ($cdata['status_name'] == 'Lost Dog Found')
                                                                                <span class="badge bg-info">
                                                                                    Missing Dog Found
                                                                                </span>
                                                                            @else
                                                                                <span class="badge bg-info">
                                                                                    {{ $cdata['status_name'] }}
                                                                                </span>
                                                                            @endif

                                                                        </h5>
                                                                    </td>
                                                                    <td class="action text-black">
                                                                        @if ($cdata['status_name'] == 'Pending Claim' || $cdata['status_name'] == 'Lost Dog Found')
                                                                            <a href="#"
                                                                                onclick="hidethis('{{ $cdata['status_name'] }}')"
                                                                                wire:click.prevent="lostclaim('{{ $cdata['dog_id_unique'] ?? 0 }}')"
                                                                                class="action-icon "
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#primary-header-modal2">
                                                                                <i
                                                                                    class="mdi mdi-square-edit-outline"></i>
                                                                            </a>
                                                                        @endif

                                                                        <a href="javascript:void(0);"
                                                                            class="action-icon text-danger"
                                                                            onclick="deleteClaim('{{ $cdata['dog_id_unique'] }}')"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Delete Claim">
                                                                            <i class="mdi mdi-delete"></i>
                                                                        </a>

                                                                        <a href="javascript:void(0);"
                                                                            class="action-icon text-info"
                                                                            onclick="archiveClaim('{{ $cdata['dog_id_unique'] }}')"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Archive Claim">
                                                                            <i class="mdi mdi-archive"></i>
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- <div class="card-footer mt-3">
                                            <div class="table-footer">
                                                <nav>
                                                    <div class="page-item cl_jPaginateBack">
                                                        <a class="page-link" href="javascript: void(0);"
                                                            aria-label="Previous">
                                                            <span>&laquo;</span>
                                                        </a>
                                                    </div>
                                                    <ul class="pagination pagination-rounded mb-0">

                                                    </ul>
                                                    <div class="page-item ">
                                                        <a class="page-link cl_jPaginateNext"
                                                            href="javascript: void(0);" aria-label="Next">
                                                            <span>&raquo;</span>
                                                        </a>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div> --}}
                                        @if ($claimlist instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                            {{ $claimlist->links() }}
                                        @endif
                                    </div>
                                </div> <!-- end card-body-->
                            </div>
                        </div>
                        <div class="tab-pane " id="profile-b1" wire:ignore.self>
                            <div class="card" style="background-color: #f2f2f2; overflow-y: hidden;"
                                id="roundscard" wire:ignore.self style="">
                                <div class=" px-3">
                                    <h3>Rounds List</h3>
                                    <div class="" id="round_lists" wire:ignore.self>
                                        <div class="d-flex align-items-center ">
                                            <div class="search-container ms-auto">
                                                <input type="text" class="c_search form-control " id="searchtb"
                                                    wire:model="ticket_num" wire:keydown="changeStatus"
                                                    style="width: 150%;" placeholder="Search rounds...">
                                            </div>
                                            <h3 class="mb-4 d-flex align-items-center ms-auto"></h3>

                                        </div>
                                        <div class="table-container">

                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead style="background-color: #0396a6;">
                                                    <tr>
                                                        <th class="text-white">Ticket Number</th>
                                                        <th class="text-white">Requestor</th>
                                                        <th class="text-white">Where</th>

                                                        <th class="text-white">Contact</th>
                                                        <th class="text-white">Date Requested</th>
                                                        <th class="text-white">Status</th>
                                                        <th style="width: 125px;" class="text-white">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @if (isset($reqrounds))
                                                        @foreach ($reqrounds as $data)
                                                            <tr>
                                                                <td class="ticket_number text-black">
                                                                    R{{ $data['created_at']->format('ym') . '-' . str_pad($data['id'], 4, '0', STR_PAD_LEFT) ?? 'N/A' }}
                                                                </td>
                                                                <td class="requestor text-black">
                                                                    {{ $data['name'] ?? 'N/A' }} </td>
                                                                <td class="address text-black">
                                                                    {{ $data['address'] ?? 'N/A' }}
                                                                </td>

                                                                <td class="contact text-black">
                                                                    {{ $data['contact'] ?? 'N/A' }}</td>
                                                                <td class="created  text-black">
                                                                    {{ $data['created_at']->format('M d, Y h:i A') ?? 'N/A' }}
                                                                </td>

                                                                <td class="status text-black">
                                                                    <h5 class="my-0">
                                                                        @if (isset($data['is_approved']))
                                                                            @if ($data['is_approved'] == 1)
                                                                                <span class="badge bg-success">
                                                                                    <span>Approved</span>
                                                                                </span>
                                                                            @elseif ($data['is_approved'] == 0)
                                                                                <span class="badge bg-danger">
                                                                                    <span>Rejected</span>
                                                                                </span>
                                                                            @endif
                                                                        @else
                                                                            <span class="badge bg-info">
                                                                                <span>Pending</span>
                                                                            </span>
                                                                        @endif

                                                                    </h5>
                                                                </td>
                                                                <td class="action text-black">

                                                                    @if (isset($data['is_approved']))
                                                                    @else
                                                                        <a href="javascript:void(0);"
                                                                            wire:click="getrounds({{ $data['id'] ?? 0 }})"
                                                                            class="action-icon" data-bs-toggle="modal"
                                                                            data-bs-target="#primary-header-modal"> <i
                                                                                class="mdi mdi-square-edit-outline"></i></a>
                                                                    @endif
                                                                    <a href="javascript:void(0);" class="action-icon">
                                                                        <i class="mdi mdi-delete"
                                                                            onclick="deleteRounds({{ $data['id'] ?? 0 }})"></i>
                                                                        </a>
                                                                    <a href="javascript:void(0);"
                                                                        class="action-icon text-info"
                                                                        onclick="archiveRounds('{{ $data['id'] ?? 0 }}')"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="Archive Claim">
                                                                        <i class="mdi mdi-archive"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- <div class="card-footer mt-3">
                                            <div class="table-footer" wire:ignore>
                                                <nav>
                                                    <div class="page-item claimjPaginateBack">
                                                        <a class="page-link" href="javascript: void(0);"
                                                            aria-label="Previous">
                                                            <span>&laquo;</span>
                                                        </a>
                                                    </div>
                                                    <ul class="pagination pagination-rounded mb-0">

                                                    </ul>
                                                    <div class="page-item ">
                                                        <a class="page-link claimjPaginateNext"
                                                            href="javascript: void(0);" aria-label="Next">
                                                            <span>&raquo;</span>
                                                        </a>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div> --}}
                                        @if ($reqrounds instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                            {{ $reqrounds->links() }}
                                        @endif
                                    </div>
                                </div> <!-- end card-body-->
                            </div>
                        </div>
                        <div class="tab-pane " id="home-b1" wire:ignore.self>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card" style="background-color: #f2f2f2" id="adoptcard">
                                        <div class="px-3">
                                            <h3>Adoption List</h3>
                                            <div class="table-responsive-xl" id="adoption_list" wire:ignore.self>
                                                <div class="d-flex align-items-center ">
                                                    <div class="search-container ms-auto">
                                                        <input type="text" class="search form-control "
                                                            id="searchtb" wire:model="changeName"
                                                            wire:keydown="changeStatus" style="width: 150%;"
                                                            placeholder="Search for dogs...">
                                                    </div>

                                                    <h3 class="mb-4 d-flex align-items-center ms-auto"></h3>
                                                </div>
                                                <div class="table-container">

                                                    <table class="table table-centered table-nowrap mb-0">
                                                        <thead style="background-color: #0396a6;">
                                                            <tr>
                                                                <th class="text-white">Ticket Number</th>
                                                                <th class="text-white">Name</th>
                                                                <th class="text-white">Dog Name</th>
                                                                <th class="text-white">Contact</th>
                                                                <th class="text-white">Address</th>
                                                                <th class="text-white">Date Requested</th>
                                                                <th class="text-white">Status</th>
                                                                <th style="width: 125px;" class="text-white">Action
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="list">
                                                            @if (isset($adoptionlist))
                                                                @foreach ($adoptionlist as $data)
                                                                    @php
                                                                        $imagest = json_decode($data['animal_images']);
                                                                    @endphp
                                                                    <tr id="claim-{{ $data['dog_id_unique'] }}">
                                                                        <td class="ticket_number text-black">
                                                                            A{{ $data['created_at']->format('ym') . '-' . str_pad($data['id'], 4, '0', STR_PAD_LEFT) ?? 'N/A' }}
                                                                        <td class="requestor text-black">
                                                                            {{ $data['fullname'] }}
                                                                        </td>
                                                                        <td class="dog_name text-black">
                                                                            <div class="d-flex">
                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="flex-shrink-0">
                                                                                        @if (!is_null($imagest) && isset($imagest[0]))
                                                                                            <img src="{{ asset('storage/' . $imagest[0]) }}"
                                                                                                class="rounded-circle avatar-xs"
                                                                                                alt="friend">
                                                                                        @else
                                                                                            <img src="{{ asset('storage/profile_pictures/xjxxrQTF3FiMAJ92RTzIrh15XRKYVLP9rtQt6g1E.png') }}"
                                                                                                class="rounded-circle avatar-xs"
                                                                                                alt="default">
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="flex-grow-1 ms-2">
                                                                                        <h5 class="my-0 text-black">
                                                                                            {{ $data['dog_name'] }}
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="contact text-black">
                                                                            <p class="mb-0 txt-muted">
                                                                                {{ $data['c_number'] }}</p>
                                                                        </td>
                                                                        <td class="address text-black">
                                                                            {{ $data['address'] }}</td>
                                                                        <td class="date_request text-black">
                                                                            {{ $data['created_at']->format('M-d-Y') }}
                                                                        </td>
                                                                        <td class="status text-black">
                                                                            <h5 class="my-0">
                                                                                @if ($data['status_name'] == 'For Adoption')
                                                                                    <span class="badge bg-danger">
                                                                                        Rejected
                                                                                    </span>
                                                                                @else
                                                                                    <span class="badge bg-info">
                                                                                        {{ $data['status_name'] }}
                                                                                    </span>
                                                                                @endif

                                                                            </h5>
                                                                        </td>
                                                                        <td class="actions">
                                                                            @if ($data['status_name'] == 'Pending Adoption')
                                                                                <a href="javascript:void(0);"
                                                                                    wire:click="adoptionpending('{{ $data['dog_id_unique'] }}')"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#viewdog"
                                                                                    class="action-icon">
                                                                                    <i
                                                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                                            @endif
                                                                            <a href="javascript:void(0);"
                                                                                class="action-icon text-danger"
                                                                                onclick="deleteAdoption('{{ $data['dog_id_unique'] }}')">
                                                                                <i class="mdi mdi-delete"></i>
                                                                            </a>

                                                                            <a href="javascript:void(0);"
                                                                                class="action-icon text-info"
                                                                                onclick="archiveAdoption('{{ $data['dog_id_unique'] }}')"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Archive Claim">
                                                                                <i class="mdi mdi-archive"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{-- <div class="card-footer mt-3">

                                                    <div class="table-footer">
                                                        <nav>
                                                            <div class="page-item jPaginateBack">
                                                                <a class="page-link" href="javascript: void(0);"
                                                                    aria-label="Previous">
                                                                    <span>&laquo;</span>
                                                                </a>
                                                            </div>
                                                            <ul class="pagination pagination-rounded mb-0">

                                                            </ul>
                                                            <div class="page-item ">
                                                                <a class="page-link jPaginateNext"
                                                                    href="javascript: void(0);" aria-label="Next">
                                                                    <span>&raquo;</span>
                                                                </a>
                                                            </div>
                                                        </nav>
                                                    </div>
                                                </div> --}}
                                                @if ($adoptionlist instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                                    {{ $adoptionlist->links() }}
                                                @endif
                                            </div>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div>
    <div class="modal fade" id="viewdog" tabindex="-1" style="z-index: 10050 !important;" role="dialog"
        aria-labelledby="myLargeModalLabel" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myLargeModalLabel">Adoption Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <!-- Product image -->
                                            @php
                                                $images = [];
                                                if (isset($activedog)) {
                                                    $images = json_decode($activedog['animal_images']);
                                                }
                                            @endphp
                                            <div class="d-lg-flex justify-content-center">
                                                <div id="carouselExampleIndicators" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner" role="listbox">
                                                        @foreach ($images as $img)
                                                            <div
                                                                class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                                <img class="d-block img-fluid img-thumbnail responsive-img"
                                                                    src="{{ asset('storage/' . $img) }}"
                                                                    alt="Slide {{ $loop->iteration }}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="text-center mt-3">
                                                        @foreach ($images as $key => $img)
                                                            <a href="javascript: void(0);">
                                                                <img src="{{ asset('storage/' . $img) }}"
                                                                    class="img-fluid img-thumbnail p-2"
                                                                    data-bs-target="#carouselExampleIndicators"
                                                                    class="active"
                                                                    data-bs-slide-to="{{ $key }}"
                                                                    style="min-width: 75px; min-height: 75px; width: 75px; height: 75px; object-fit: cover;"
                                                                    alt="Product-img" />
                                                            </a>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-lg-7">
                                            <form class="ps-lg-4">
                                                <!-- Product title -->
                                                <h3 class="mt-0">{{ $activedog['dog_name'] ?? 'N/A' }} <a
                                                        href="javascript: void(0);" class="text-muted"><i
                                                            class="mdi mdi-check-decagram text-success"></i></a>
                                                </h3>
                                                <p class="mb-1">Added Date:
                                                    {{ isset($activedog['created_at']) ? \Carbon\Carbon::parse($activedog['created_at'])->format('m/d/Y') : 'N/A' }}
                                                </p>

                                                <!-- Product stock -->
                                                <div class="mt-3">
                                                    <h4><span class="badge badge-success-lighten"> For Adoption </span>
                                                    </h4>
                                                </div>

                                                <!-- Product description -->
                                                <div class="mt-4">
                                                    <h6 class="font-14">Breed:</h6>
                                                    <h4 class="me-3"> {{ $activedog['breed_name'] ?? 'N/A' }} </h4>
                                                </div>

                                                <!-- Quantity -->

                                                <!-- Product description -->
                                                <div class="mt-4">
                                                    <h6 class="font-14">Description:</h6>
                                                    <p> {{ $activedog['description'] ?? 'N/A' }} </p>
                                                </div>

                                                <!-- Product information -->
                                                <div class="mt-3">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h6 class="font-14">Color</h6>
                                                            <div class="d-flex">
                                                                <i class="font-18 text-success me-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="18" height="18" x="0" y="0"
                                                                        viewBox="0 0 256 256"
                                                                        style="enable-background:new 0 0 512 512"
                                                                        xml:space="preserve" class="">
                                                                        <g>
                                                                            <path fill="#49e849"
                                                                                d="M163.3 102.3c-25.5 0-46.3-20.8-46.3-46.3s20.8-46.3 46.3-46.3 46.3 20.8 46.3 46.3-20.7 46.3-46.3 46.3zm0-83.2c-20.3 0-36.9 16.5-36.9 36.9 0 20.3 16.5 36.9 36.9 36.9s36.9-16.5 36.9-36.9c0-20.3-16.5-36.9-36.9-36.9z"
                                                                                opacity="1" data-original="#49e849"
                                                                                class=""></path>
                                                                            <path fill="#49e849"
                                                                                d="M157 74.9c-1.3 0-2.6-.5-3.5-1.5l-12.4-13.2c-1.8-1.9-1.7-5 .2-6.8s5-1.7 6.8.2l9.2 9.9 21.5-18.6c2-1.7 5-1.5 6.8.5 1.7 2 1.5 5-.5 6.8l-25 21.6c-.8.7-2 1.1-3.1 1.1z"
                                                                                opacity="1" data-original="#49e849"
                                                                                class=""></path>
                                                                            <path fill="#e2b471"
                                                                                d="M63.7 167.6s2.4 8.6 4.9 16 5 36.6 3.9 41.6-6.3 5.8-8.8 6.3-7.6 2.7-7.6 5.9 2.9 5.6 8.9 5.3c6.1-.3 13.9-2.4 13.9-2.4l5.8-9.6 2.3-34.5-13.7-22.8zM150.2 190.1s5.5 11.8 21.4 16.6 11.3 3.5 14.1 5.5c2.7 1.9 11.5 8 11.5 9.9s-.8 9.3-4.6 10.4-9.9 3.1-10.2 7.4c-.2 4.3 3.7 5.4 7.4 5.1s15.3-1.4 15.3-1.4l7.3-11.2-.5-19.3-33.6-20.8s-15.4-13.6-16-13.5-12.8 6.6-12.8 6.6z"
                                                                                opacity="1" data-original="#e2b471"
                                                                                class=""></path>
                                                                            <path fill="#f7ce94"
                                                                                d="M193 136.9s16.3-4.2 17.1-16.5c.8-13.2-1.4-22.1.6-32s7.3-15.2 9.1-14.5c1.8.8.2 9.9 1.4 25s3.4 19.2 0 29.9-11.1 18.4-17.2 20.4z"
                                                                                opacity="1" data-original="#f7ce94"
                                                                                class=""></path>
                                                                            <path fill="#ffdd99"
                                                                                d="M220.4 206.9c-7.5-4.2-11.1-8-11.2-13.7-.1-4.2 3.4-12 3.8-21.3.5-9.4-.7-19.5-11.3-30.3-13.1-13.4-36.4-8.7-48.9-6.9s-28 .8-39.1-6.1c-12.1-7.4-11.1-32.1-21.8-44-9.1-10.1-30.9-7.2-35.1-4.8-6.9 3.8-5.5 9.9-7.9 12.6-1.4 1.6-4.6 1.4-7.1 1-.2 2.1-1.4 7.4-7.7 9.8 1.2 1.8 2.5 2.6 2.5 2.6-1.8 8.5 5.2 12.3 10.1 12.9 6.4.8 9.7 3.2 13.6 12.6 4.6 11.4.3 19 2.9 33.2 1.9 10.5 10.7 13.1 16.1 23.2 4.5 8.2 5.3 22.2 5.3 36.1 0 8.2-4.6 11.3-9.3 12.2-3.3.6-9.1 4-7 8.1 1.3 2.5 24 3.2 27.4.6 3.7-2.7 8.1-43.6 8.1-43.6 10.8-9.4 30.2-10.9 41.1-10 9.6.8 17.1-6.8 17.1-6.8 4.8 12.7 17 18.4 26.3 20.4 7.2 1.5 17.5 8.5 20 12.8 2.4 4.3 1.7 11.6 1.2 13.9-.9 4.5-9.9-.2-11.4 10.7-.6 4.4 20 3 21.6 1.2 1.9-2 3.6-20.8 4.4-29.8 0-2.7-1.3-5.3-3.7-6.6z"
                                                                                opacity="1" data-original="#ffdd99"
                                                                                class=""></path>
                                                                            <path fill="#efc889"
                                                                                d="M92.4 101.1c3-3.3 7.1-10.6 3.3-23.4-.4-1.3-1.7-2.1-3.1-1.8-4 .8-10.2 2.5-13.8 13.2-.4 1.1.1 2.2 1.1 2.7 2.2 1.1 6 3.5 8.8 8.8.7 1.4 2.6 1.6 3.7.5z"
                                                                                opacity="1"
                                                                                data-original="#efc889"></path>
                                                                            <circle cx="59.8" cy="91.6"
                                                                                r="3.4" fill="#141414" opacity="1"
                                                                                data-original="#141414"></circle>
                                                                            <circle cx="59.1" cy="91.2"
                                                                                r="1.7" fill="#ffffff" opacity="1"
                                                                                data-original="#ffffff"></circle>
                                                                            <path fill="#1e1e1e"
                                                                                d="M41.7 93.5c-.3-.1-.6-.1-.9-.2-2-.4-4-.7-6-.9l-.7-.1c-.8-.1-1.6.5-1.8 1.4-.8 4.5.4 7.6 1.6 9.5 6.4-2.3 7.6-7.6 7.8-9.7z"
                                                                                opacity="1"
                                                                                data-original="#1e1e1e"></path>
                                                                            <g fill="#d6ae6e">
                                                                                <path
                                                                                    d="M36.5 105.8s6.5 3 20 1.7c0 0-7.1 3.6-19.7 4.2-.1 0-1.1-2.5-.3-5.9zM90.9 98.3s4.6-6.3 3.4-16.2c0 0-3.7 7.8-7.9 9.8 0 .1 3.7 2 4.5 6.4z"
                                                                                    fill="#d6ae6e" opacity="1"
                                                                                    data-original="#d6ae6e"></path>
                                                                            </g>
                                                                        </g>
                                                                    </svg> </i>
                                                                <div>
                                                                    <h5 class="mt-1 font-14">
                                                                        {{ $activedog['color'] ?? 'N/A' }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="font-14">Gender</h6>
                                                            <div class="d-flex">
                                                                <i class="font-18 text-success me-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="18" height="18" x="0" y="0"
                                                                        viewBox="0 0 488 488.33"
                                                                        style="enable-background:new 0 0 512 512"
                                                                        xml:space="preserve" class="">
                                                                        <g>
                                                                            <g fill="#4671c6">
                                                                                <path
                                                                                    d="M44.766 213.77h-.735c-22.02 0-39.867-17.852-39.867-39.872V145c0-22.02 17.848-39.867 39.867-39.867h.735c22.02 0 39.87 17.847 39.87 39.867v28.898c0 22.02-17.85 39.872-39.87 39.872zM394.672 213.77h.738c22.016 0 39.867-17.852 39.867-39.872V145c0-22.02-17.851-39.867-39.867-39.867h-.738c-22.016 0-39.867 17.847-39.867 39.867v28.898c0 22.02 17.847 39.872 39.867 39.872zM149.91 112.637h-.734c-22.02 0-39.867-17.848-39.867-39.867V43.87c0-22.02 17.847-39.867 39.867-39.867h.734c22.02 0 39.867 17.848 39.867 39.867V72.77c0 22.02-17.847 39.867-39.867 39.867zM286.566 112.637h.735c22.02 0 39.867-17.848 39.867-39.867V43.87c0-22.02-17.848-39.867-39.867-39.867h-.735c-22.02 0-39.87 17.848-39.87 39.867V72.77c0 22.02 17.85 39.867 39.87 39.867zm0 0"
                                                                                    fill="#4671c6" opacity="1"
                                                                                    data-original="#4671c6"
                                                                                    class=""></path>
                                                                            </g>
                                                                            <path fill="#3762cc"
                                                                                d="M44.77 217.77h-.739c-24.187 0-43.867-19.68-43.867-43.872v-28.902c0-24.187 19.68-43.867 43.867-43.867h.739c24.19 0 43.867 19.68 43.867 43.867v28.902c0 24.192-19.68 43.872-43.867 43.872zm-.739-108.641c-19.777 0-35.867 16.09-35.867 35.867v28.902c0 19.778 16.09 35.872 35.867 35.872h.739c19.777 0 35.867-16.094 35.867-35.872v-28.902c0-19.777-16.09-35.867-35.867-35.867zM395.406 217.77h-.734c-24.188 0-43.867-19.68-43.867-43.872v-28.902c0-24.187 19.68-43.867 43.867-43.867h.734c24.192 0 43.871 19.68 43.871 43.867v28.902c0 24.192-19.68 43.872-43.87 43.872zm-.734-108.641c-19.777 0-35.867 16.09-35.867 35.867v28.902c0 19.778 16.09 35.872 35.867 35.872h.734c19.778 0 35.871-16.094 35.871-35.872v-28.902c0-19.777-16.093-35.867-35.87-35.867zM149.91 116.637h-.734c-24.188 0-43.867-19.68-43.867-43.867V43.867C105.309 19.68 124.989 0 149.176 0h.734c24.192 0 43.871 19.68 43.871 43.867V72.77c-.004 24.187-19.68 43.867-43.87 43.867zm-.734-108.633c-19.778 0-35.867 16.09-35.867 35.867V72.77c0 19.777 16.09 35.87 35.867 35.87h.734c19.778 0 35.871-16.093 35.871-35.87V43.87c0-19.777-16.09-35.867-35.87-35.867zM287.3 116.637h-.734c-24.191 0-43.87-19.68-43.87-43.867V43.867C242.695 19.68 262.374 0 286.565 0h.735c24.187 0 43.867 19.68 43.867 43.867V72.77c0 24.187-19.68 43.867-43.867 43.867zm-.738-108.633c-19.777 0-35.87 16.09-35.87 35.867V72.77c0 19.777 16.093 35.87 35.87 35.87h.735c19.777 0 35.871-16.093 35.871-35.87V43.87c0-19.777-16.094-35.867-35.871-35.867zm0 0"
                                                                                opacity="1"
                                                                                data-original="#3762cc"></path>
                                                                            <path fill="#4671c6"
                                                                                d="M322.723 240.137c-4.641-1.098-7.868-4.828-7.868-9.082 0-46.528-42.593-84.25-95.132-84.25-52.543 0-95.137 37.718-95.137 84.25 0 4.254-3.227 7.984-7.867 9.082-40.106 9.488-69.653 41.867-69.653 80.379v2.058c0 45.961 42.075 83.219 93.973 83.219h157.367c51.899 0 93.973-37.258 93.973-83.219v-2.058c0-38.512-29.547-70.891-69.656-80.38zm0 0"
                                                                                opacity="1" data-original="#4671c6"
                                                                                class=""></path>
                                                                            <path fill="#3762cc"
                                                                                d="M298.402 409.79H141.04c-54.023 0-97.973-39.126-97.973-87.216v-2.058c0-39.485 29.907-74.137 72.73-84.274 2.821-.664 4.79-2.797 4.79-5.187 0-48.66 44.473-88.246 99.137-88.246s99.132 39.586 99.132 88.246c0 2.386 1.97 4.523 4.79 5.187h.003c42.82 10.137 72.73 44.79 72.73 84.274v2.058c0 48.09-43.952 87.215-97.976 87.215zm-78.68-258.985c-50.253 0-91.136 36-91.136 80.246 0 6.117-4.504 11.453-10.95 12.976-39.195 9.278-66.57 40.727-66.57 76.485v2.058c0 43.68 40.36 79.215 89.973 79.215h157.363c49.614 0 89.977-35.539 89.977-79.215v-2.058c0-35.758-27.379-67.211-66.574-76.485-6.446-1.523-10.95-6.863-10.95-12.976 0-44.246-40.878-80.246-91.132-80.246zm0 0"
                                                                                opacity="1"
                                                                                data-original="#3762cc"></path>
                                                                            <path fill="#f9a7a7"
                                                                                d="M426.371 484.328h-69c-31.754 0-57.5-25.742-57.5-57.5v-69c0-31.754 25.746-57.5 57.5-57.5h69c31.758 0 57.5 25.746 57.5 57.5v69c0 31.762-25.738 57.5-57.5 57.5zm0 0"
                                                                                opacity="1"
                                                                                data-original="#f9a7a7"></path>
                                                                            <path fill="#ffea92"
                                                                                d="M357.2 464.328c-20.68 0-37.5-16.82-37.5-37.5v-69c0-20.68 16.82-37.5 37.5-37.5h69c20.679 0 37.5 16.82 37.5 37.5v69c0 20.68-16.821 37.5-37.5 37.5zm0 0"
                                                                                opacity="1"
                                                                                data-original="#ffea92"></path>
                                                                            <path fill="#3762cc"
                                                                                d="M426.375 488.328h-69c-33.91 0-61.5-27.586-61.5-61.5v-69c0-33.91 27.59-61.5 61.5-61.5h69c33.91 0 61.5 27.59 61.5 61.5v69c0 33.914-27.59 61.5-61.5 61.5zm-69-184c-29.5 0-53.5 24-53.5 53.5v69c0 29.5 24 53.5 53.5 53.5h69c29.5 0 53.5-24 53.5-53.5v-69c0-29.5-24-53.5-53.5-53.5zm0 0"
                                                                                opacity="1"
                                                                                data-original="#3762cc"></path>
                                                                            <path fill="#a4c9ff"
                                                                                d="m237.66 285.664 30.809-30.809a3.994 3.994 0 0 1 5.652 0l10.227 10.223c2.398 2.399 6.504.914 6.812-2.465l3.043-33.496 1.262-13.887a4.002 4.002 0 0 0-4.348-4.347l-13.887 1.262-33.496 3.046c-3.379.305-4.863 4.414-2.464 6.813l10.222 10.223a3.999 3.999 0 0 1 0 5.656l-30.457 30.457a1.985 1.985 0 0 1-2.476.258c-22.446-14.168-52.696-11.172-71.82 9.015-20.079 21.188-20.743 54.848-1.466 76.762 21.915 24.914 60.07 25.824 83.165 2.727 18.68-18.68 21.644-47.204 8.921-69.024a1.99 1.99 0 0 1 .301-2.414zm-72.855 54.473c-12.868-12.867-12.868-33.805 0-46.672 12.867-12.863 33.8-12.863 46.672 0 12.863 12.867 12.863 33.805 0 46.672-12.868 12.867-33.805 12.867-46.672 0zm0 0"
                                                                                opacity="1"
                                                                                data-original="#a4c9ff"></path>
                                                                            <path fill="#4671c6"
                                                                                d="M386.691 422.152v32.114a2.472 2.472 0 0 0 2.473 2.468h9.879a2.469 2.469 0 0 0 2.469-2.468v-56.48c0-.583.41-1.075.976-1.2 23.395-5.293 38.035-33.941 17.977-60.059-28.899-22.222-60.942-1.918-60.942 25.73 0 16.313 11.16 30.06 26.243 34.032.543.145.925.621.925 1.184zm-6.867-44.996c-16.695-21.71 8.078-46.492 29.793-29.8 16.695 21.71-8.082 46.492-29.793 29.8zm0 0"
                                                                                opacity="1" data-original="#4671c6"
                                                                                class=""></path>
                                                                        </g>
                                                                    </svg> </i>
                                                                <div>
                                                                    <h5 class="mt-1 font-14">
                                                                        {{ $activedog['gender'] ?? 'N/A' }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="font-14">Contact Person</h6>
                                                            <div class="d-flex">
                                                                <i class="font-18 text-success me-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="18" height="18" x="0" y="0"
                                                                        viewBox="0 0 256 256"
                                                                        style="enable-background:new 0 0 512 512"
                                                                        xml:space="preserve" class="">
                                                                        <g>
                                                                            <circle cx="164.927" cy="106.758"
                                                                                r="82.422" fill="#5fcdff"
                                                                                opacity="1"
                                                                                data-original="#5fcdff"></circle>
                                                                            <path fill="#30b6ff"
                                                                                d="M247.357 106.75c0 45.535-36.909 82.424-82.424 82.424a83.206 83.206 0 0 1-15.151-1.394c38.283-7.111 67.273-40.666 67.273-81.03 0-40.344-28.99-73.899-67.273-81.01a83.214 83.214 0 0 1 15.151-1.394c45.515 0 82.424 36.889 82.424 82.404z"
                                                                                opacity="1" data-original="#30b6ff"
                                                                                class=""></path>
                                                                            <path fill="#73d7f9"
                                                                                d="M134.098 162.057c-13.23-14.62-21.29-34.02-21.29-55.31 0-40.34 28.97-73.9 67.28-81.01-4.91-.91-9.98-1.39-15.15-1.39-45.54 0-82.43 36.89-82.43 82.4 0 31.35 17.49 58.61 43.24 72.54l17.03 41.44 13.16-32.04c2.95.33 5.96.49 9 .49 5.17 0 10.24-.49 15.15-1.4a81.879 81.879 0 0 1-20.94-6.91 82.85 82.85 0 0 1-25.05-18.81z"
                                                                                opacity="1"
                                                                                data-original="#73d7f9"></path>
                                                                            <circle cx="164.928" cy="106.758"
                                                                                r="67.078" fill="#ffe2e2"
                                                                                opacity="1" data-original="#ffe2e2"
                                                                                class=""></circle>
                                                                            <path fill="#ffcfcf"
                                                                                d="M232.012 106.752c0 37.058-30.038 67.079-67.079 67.079-4.209 0-8.336-.395-12.331-1.134 31.156-5.787 54.749-33.096 54.749-65.945 0-32.833-23.593-60.142-54.749-65.929a67.703 67.703 0 0 1 12.331-1.134c37.041 0 67.079 30.021 67.079 67.063z"
                                                                                opacity="1" data-original="#ffcfcf"
                                                                                class=""></path>
                                                                            <path fill="#ffefee"
                                                                                d="M177.264 172.697a67.703 67.703 0 0 1-12.331 1.134c-37.058 0-67.08-30.021-67.08-67.079 0-37.042 30.021-67.063 67.08-67.063 4.209 0 8.336.395 12.331 1.134-31.172 5.787-54.749 33.096-54.749 65.929 0 32.849 23.576 60.157 54.749 65.945z"
                                                                                opacity="1" data-original="#ffefee"
                                                                                class=""></path>
                                                                            <path fill="#b76c6c"
                                                                                d="M151.021 114.298c6.607-11.444 23.124-11.444 29.731 0l5.921 10.256c6.607 11.444-1.652 25.748-14.866 25.748h-11.843c-13.214 0-21.473-14.305-14.866-25.748a34121 34121 0 0 0 5.923-10.256z"
                                                                                opacity="1"
                                                                                data-original="#b76c6c"></path>
                                                                            <path fill="#c98585"
                                                                                d="M178.217 149.094c-1.956.789-4.11 1.216-6.412 1.216h-11.838c-13.219 0-21.472-14.32-14.863-25.763 3.636-6.282 2.286-3.946 5.919-10.243 5.886-10.193 19.614-11.311 27.193-3.354a16.685 16.685 0 0 0-2.532 3.354c-3.633 6.297-2.283 3.961-5.919 10.243-5.457 9.454-.771 20.864 8.452 24.547z"
                                                                                opacity="1"
                                                                                data-original="#c98585"></path>
                                                                            <ellipse cx="148.118" cy="78.138"
                                                                                fill="#b76c6c" rx="9.246"
                                                                                ry="13.719"
                                                                                transform="rotate(-20 148.134 78.134)"
                                                                                opacity="1"
                                                                                data-original="#b76c6c"></ellipse>
                                                                            <ellipse cx="124.634" cy="104.137"
                                                                                fill="#b76c6c" rx="9.246"
                                                                                ry="13.719"
                                                                                transform="rotate(-20 124.65 104.138)"
                                                                                opacity="1"
                                                                                data-original="#b76c6c"></ellipse>
                                                                            <ellipse cx="181.745" cy="78.138"
                                                                                fill="#b76c6c" rx="13.719"
                                                                                ry="9.246"
                                                                                transform="rotate(-70 181.673 78.121)"
                                                                                opacity="1"
                                                                                data-original="#b76c6c"></ellipse>
                                                                            <ellipse cx="205.228" cy="104.137"
                                                                                fill="#b76c6c" rx="13.719"
                                                                                ry="9.246"
                                                                                transform="rotate(-70 205.145 104.111)"
                                                                                opacity="1"
                                                                                data-original="#b76c6c"></ellipse>
                                                                            <path fill="#44c7b6"
                                                                                d="M73.614 230.183c10.8 7.735 25.692 9.175 39.044 6.92 8.431-1.424 12.919-10.764 8.784-18.247l-17.384-31.455c-2.409-4.36-7.056-6.969-12.036-6.845-3.997.099-7.82-.466-11.427-1.695-10.969-3.736-27.711-18.653-32.189-35.565-2.521-9.521-9.29-24.041 1.843-48.949 2.893-6.471 7.794-11.628 14.345-15.159 3.825-2.061 6.22-6.052 6.484-10.389l2.307-37.903c.515-8.475-7.585-14.918-15.697-12.412-7.86 2.429-16.486 6.782-23.28 11.824-5.723 4.247-10.071 10.072-12.575 16.844 0 0-52.41 108.405 51.781 183.031z"
                                                                                opacity="1"
                                                                                data-original="#44c7b6"></path>
                                                                            <path fill="#4bdbc3"
                                                                                d="M108.918 237.627c-12.33 1.41-25.5-.43-35.3-7.44-104.19-74.63-51.78-183.03-51.78-183.03 2.5-6.78 6.85-12.6 12.57-16.85 6.79-5.04 15.42-9.39 23.28-11.82 3.76-1.16 7.52-.4 10.42 1.6-6.52 2.52-13.21 6.15-18.7 10.22-5.72 4.25-10.07 10.07-12.57 16.85 0 0-52.41 108.4 51.78 183.03 5.86 4.19 12.93 6.54 20.3 7.44z"
                                                                                opacity="1"
                                                                                data-original="#4bdbc3"></path>
                                                                            <g fill="#5f266d">
                                                                                <path
                                                                                    d="M164.926 20.336c-47.653 0-86.422 38.769-86.422 86.422 0 31.289 16.854 60.028 44.081 75.353l16.488 40.135c1.361 3.307 6.049 3.29 7.4-.001l12.04-29.309c50.044 3.744 92.834-36.019 92.834-86.178.001-47.653-38.767-86.422-86.421-86.422zm-8.557 164.37a4 4 0 0 0-4.132 2.457l-9.463 23.035-13.323-32.43a3.997 3.997 0 0 0-1.796-1.997c-25.383-13.739-41.15-40.184-41.15-69.014 0-43.242 35.18-78.422 78.422-78.422s78.422 35.18 78.422 78.422c-.001 46.259-40.188 83.026-86.98 77.949z"
                                                                                    fill="#5f266d" opacity="1"
                                                                                    data-original="#5f266d"
                                                                                    class=""></path>
                                                                                <path
                                                                                    d="M164.927 35.681c-39.192 0-71.077 31.885-71.077 71.077s31.885 71.078 71.077 71.078 71.078-31.886 71.078-71.078-31.885-71.077-71.078-71.077zm0 134.155c-34.781 0-63.077-28.297-63.077-63.078s28.296-63.077 63.077-63.077 63.078 28.296 63.078 63.077-28.296 63.078-63.078 63.078z"
                                                                                    fill="#5f266d" opacity="1"
                                                                                    data-original="#5f266d"
                                                                                    class=""></path>
                                                                                <path
                                                                                    d="m190.137 122.554-5.922-10.256c-8.141-14.102-28.505-14.121-36.659 0l-5.921 10.256c-8.146 14.109 2.022 31.748 18.329 31.748h11.843c16.291 0 26.484-17.626 18.33-31.748zm-18.33 23.748h-11.843c-10.134 0-16.473-10.964-11.401-19.748l5.921-10.256c5.067-8.776 17.732-8.784 22.804 0l5.922 10.256c5.065 8.776-1.259 19.748-11.403 19.748zM154.178 94.789c7.009-2.551 9.748-11.948 6.386-21.181-3.338-9.172-11.452-14.69-18.507-12.121-6.979 2.541-9.784 11.845-6.387 21.182 3.395 9.324 11.518 14.663 18.508 12.12zm-9.384-25.784c2.321-.842 6.356 2.127 8.253 7.34 1.91 5.247.693 10.091-1.604 10.927-2.327.852-6.352-2.113-8.254-7.339-1.903-5.227-.722-10.081 1.605-10.928zM118.574 87.487c-7.009 2.551-9.748 11.948-6.386 21.181 3.395 9.329 11.52 14.662 18.507 12.12 6.979-2.54 9.784-11.844 6.387-21.181-3.337-9.165-11.444-14.692-18.508-12.12zm9.385 25.783c-2.321.85-6.351-2.111-8.253-7.339-1.912-5.253-.689-10.092 1.604-10.927 2.289-.836 6.338 2.077 8.254 7.339 1.902 5.228.722 10.08-1.605 10.927zM175.684 94.789c7.549 2.749 15.409-3.609 18.507-12.12 3.398-9.336.594-18.64-6.386-21.182-6.98-2.538-15.108 2.785-18.508 12.121-3.334 9.163-.676 18.61 6.387 21.181zm1.131-18.444c1.903-5.229 5.932-8.188 8.254-7.34 2.326.847 3.507 5.7 1.604 10.928-1.907 5.239-5.948 8.173-8.253 7.339-2.297-.837-3.515-5.679-1.605-10.927zM211.288 87.487c-6.992-2.547-15.138 2.866-18.507 12.12-3.335 9.159-.682 18.608 6.387 21.181 6.99 2.543 15.113-2.796 18.507-12.12 3.334-9.16.682-18.608-6.387-21.181zm-1.131 18.444c-1.901 5.226-5.925 8.188-8.253 7.339-2.3-.837-3.515-5.682-1.605-10.927 1.891-5.194 5.921-8.185 8.253-7.339 2.3.837 3.514 5.682 1.605 10.927zM201.757 142.006a47.382 47.382 0 0 1-10.471 8.966 4 4 0 1 0 4.262 6.77 55.384 55.384 0 0 0 12.238-10.476 4.002 4.002 0 0 0-.385-5.645 4.002 4.002 0 0 0-5.644.385zM178.644 156.63a58.415 58.415 0 0 1-6.386 1.488 4 4 0 0 0-3.248 4.631 3.997 3.997 0 0 0 4.631 3.248 66.56 66.56 0 0 0 7.263-1.693 4 4 0 0 0-2.26-7.674zM107.559 185.466c-3.126-5.657-9.095-9.061-15.637-8.91-3.509.088-6.894-.411-10.039-1.482-9.4-3.202-25.354-16.725-29.61-32.803a126.503 126.503 0 0 0-1.049-3.645c-2.768-9.278-6.559-21.984 2.677-42.648 2.534-5.669 6.771-10.134 12.592-13.271 4.94-2.663 8.227-7.899 8.577-13.666l2.307-37.902c.686-11.249-10.094-19.808-20.869-16.476-8.417 2.601-17.341 7.132-24.482 12.433-6.298 4.673-11.094 11.065-13.878 18.493-1.25 2.645-13.417 29.304-13.495 65.085-.073 34.178 11.427 83.22 66.633 122.761 11.754 8.419 27.796 10.018 42.039 7.612 11.292-1.907 17.019-14.356 11.619-24.126zm4.433 47.692c-14.065 2.378-27.205.106-36.049-6.228-42-30.082-63.294-69.086-63.291-115.928.002-35.164 12.656-61.848 12.783-62.11.483-1 2.893-9.091 11.357-15.373 6.349-4.712 14.602-8.903 22.076-11.214 5.452-1.684 10.869 2.659 10.523 8.347l-2.307 37.902c-.185 3.026-1.866 5.751-4.389 7.11-7.307 3.938-12.874 9.832-16.1 17.048-10.446 23.373-5.988 38.313-3.039 48.2.359 1.205.698 2.337.98 3.404 5.029 18.996 23.422 34.465 34.766 38.328 4.041 1.377 8.358 2.011 12.816 1.908 3.499-.079 6.758 1.744 8.437 4.781l17.384 31.455c2.809 5.084-.229 11.405-5.947 12.37z"
                                                                                    fill="#5f266d" opacity="1"
                                                                                    data-original="#5f266d"
                                                                                    class=""></path>
                                                                            </g>
                                                                        </g>
                                                                    </svg> </i>
                                                                <div>
                                                                    <h5 class="mt-1 font-14">
                                                                        {{ $activedog['contact_number'] ?? 'N/A' }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                    <hr>
                                    <div class="text-center fw-bold ">
                                        <h4> User Details </h4>
                                    </div>
                                    @if (isset($adoptdetails))
                                        <div class="mt-3">
                                            <div class="row">
                                                <div class="col-xl-6 col-sm-12 mb-2">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <h4 class="header-title mb-3">Adoption Details</h4>
                                                            <ul class="list-unstyled mb-0">
                                                                <li>
                                                                    <p class="mb-2"><span
                                                                            class="fw-bold me-2">Fullname:</span>
                                                                        {{ $adoptdetails['fullname'] }} </p>
                                                                    <p class="mb-2"><span
                                                                            class="fw-bold me-2">Address:</span>
                                                                        {{ $adoptdetails['address'] }} </p>
                                                                    <p class="mb-2"><span
                                                                            class="fw-bold me-2">Mobile Number:</span>
                                                                        {{ $adoptdetails['c_number'] }} </p>
                                                                    <p class="mb-2"><span
                                                                            class="fw-bold me-2">Materials:</span>
                                                                        {{ $adoptdetails['materials'] }} </p>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-sm-12 mb-2">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <h4 class="header-title mb-3 ">Reason for adoption</h4>
                                                            <p class="py-1 px-3">
                                                                {{ $adoptdetails['reason'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="approve_adoption">Approve Adoption</button>
                    <button type="button" class="btn btn-danger" id="reject_adoption">Reject Adoption</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->


    </div>
    <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="ri-information-line h1 text-info"></i>
                        <h4 class="mt-2">Heads up!</h4>
                        <p class="mt-3">Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                            facilisis in, egestas eget quam.</p>
                        <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Continue</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div id="primary-header-modal" class="modal fade" role="dialog" data-bs-focus="false"
        aria-labelledby="primary-header-modalLabel" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">Rounds Details</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class=" d-block">
                        @if (isset($activerounds))
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="px-2 py-2">
                                            <h4 class="header-title mb-3">Information</h4>
                                            <ul class="list-unstyled mb-0">
                                                <li>
                                                    <p class="mb-2"><span class="fw-bold me-2">Requestor:</span>
                                                        {{ $activerounds['name'] }}</p>
                                                    <p class="mb-2"><span class="fw-bold me-2">Barangay:</span>
                                                        {{ $activerounds['barangay'] }}</p>
                                                    <p class="mb-2"><span class="fw-bold me-2">Address:</span>
                                                        {{ $activerounds['address'] }}</p>

                                                    <p class="mb-0"><span class="fw-bold me-2">Contact
                                                            Number:</span>
                                                        {{ $activerounds['contact'] }} </p>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="px-2 py-2">
                                            <h4>Reason</h4>
                                            <div class="text-center">
                                                <p class="mb-0">{{ $activerounds['reason'] }}</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="approve_rounds">Approve Rounds</button>
                    <button type="button" class="btn btn-danger" id="reject_rounds">Reject Rounds</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div id="primary-header-modal2" class="modal fade" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">Claim Details</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class=" d-block">
                        <div class="row">
                            <div class="col-xl-12 col-sm-12">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12">
                                        <div class="card h-100">
                                            <div class="px-2 py-2 d-none" id="dog_claimer" wire:ignore.self>
                                                <h4 class="header-title mb-3">Claim Information</h4>
                                                <ul class="list-unstyled mb-0">
                                                    @if (isset($claimdetails))
                                                        <li>
                                                            <p class="mb-2"><span
                                                                    class="fw-bold me-2">Requestor:</span>
                                                                {{ $claimdetails['fullname'] }}</p>
                                                            <p class="mb-2"><span
                                                                    class="fw-bold me-2">Address:</span>
                                                                {{ $claimdetails['address'] }}</p>
                                                            <p class="mb-2"><span class="fw-bold me-2">Contact
                                                                    Number:</span> {{ $claimdetails['contact'] }} </p>
                                                            <p class="mb-2"><span class="fw-bold me-2">Location
                                                                    Found:</span> {{ $claimdetails['last_loc'] }} </p>

                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="px-2 py-2  d-none" id="dog_lost" wire:ignore.self>
                                                <h4 class="header-title mb-3">Reporter Information</h4>
                                                <ul class="list-unstyled mb-0">
                                                    @if (isset($claimdetails))
                                                        <li>
                                                            <p class="mb-2"><span
                                                                    class="fw-bold me-2">Reporter:</span>
                                                                {{ $claimdetails['fullname'] }}</p>
                                                            <p class="mb-2"><span
                                                                    class="fw-bold me-2">Address:</span>
                                                                {{ $claimdetails['address'] }}</p>

                                                            <p class="mb-2"><span class="fw-bold me-2">Last Location
                                                                    Seen</span> {{ $claimdetails['last_loc'] }} </p>

                                                            <p class="mb-2"><span class="fw-bold me-2">Contact
                                                                    Number:</span>
                                                                {{ $claimdetails['contact'] }} </p>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-sm-12">
                                        <div class="card h-100">
                                            <div class="px-2 py-2">
                                                @if (isset($claimdetails))
                                                    <h4>Proof</h4>
                                                    @if ($claimdetails['proof'])
                                                        <div class="text-center">
                                                            <img src="" alt="">
                                                            <img src="{{ asset('storage/' . $claimdetails['proof']) }}"
                                                                class="img-thumbnail" alt="friend"
                                                                style="min-width: 250px; min-height: 170px; width: 250px; height: 170px; object-fit: cover;">
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-sm-12">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12">
                                        <div class="card  h-100">
                                            <div class="px-2 py-2">
                                                <h4>Dog Details</h4>
                                                @php
                                                    $images = [];
                                                    if (isset($activedog)) {
                                                        $images = json_decode($activedog['animal_images']);
                                                    }
                                                @endphp
                                                <div class="d-lg-flex justify-content-center">
                                                    <div id="carouselExampleCaption" class="carousel slide"
                                                        data-bs-ride="carousel">
                                                        <div class="carousel-inner" role="listbox">
                                                            @foreach ($images as $img)
                                                                <div
                                                                    class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                                    <img src="{{ asset('storage/' . $img) }}"
                                                                        alt="..." class="d-block img-fluid"
                                                                        style="min-width: 300px; min-height: 210px; width: 300px; height: 210px; object-fit: cover;">
                                                                    <div class="carousel-caption d-none d-md-block">
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <a class="carousel-control-prev"
                                                            href="#carouselExampleCaption" role="button"
                                                            data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next"
                                                            href="#carouselExampleCaption" role="button"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-12">
                                        <div class="card  h-100">
                                            <div class="px-2 py-2">
                                                <h4 class="header-title mb-3">Dog Information</h4>
                                                <ul class="list-unstyled mb-0">
                                                    <li>
                                                        <p class="mb-2"><span class="fw-bold me-2">Dog Name:</span>
                                                            {{ $activedog['dog_name'] ?? 'N/A' }}
                                                        </p>
                                                        <p class="mb-2"><span class="fw-bold me-2">Contact
                                                                Name:</span>
                                                            {{ $activedog['contact_name'] ?? 'N/A' }}
                                                        </p>
                                                        <p class="mb-2"><span class="fw-bold me-2">Contact
                                                                Number:</span>
                                                            {{ $activedog['contact_number'] ?? 'N/A' }}
                                                        </p>
                                                        <p class="mb-2"><span
                                                                class="fw-bold me-2">Description:</span>
                                                            {{ $activedog['description'] ?? 'N/A' }}
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="approve_claim"
                        onclick="approve_claim('{{ isset($activedog['dog_id_unique']) ? $activedog['dog_id_unique'] : '' }}')">Approve</button>

                    <button type="button" class="btn btn-danger" id="reject_claim" wire:ignore
                        onclick="reject_claim('{{ isset($activedog['dog_id_unique']) ? $activedog['dog_id_unique'] : '' }}')">Reject</button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <script>
        function closemodals() {
            var modals = document.querySelectorAll('.modal');
            modals.forEach(function(modal) {
                var bsModal = bootstrap.Modal.getInstance(
                    modal); // Get the modal instance
                if (bsModal) {
                    bsModal.hide(); // Hide the modal
                }
            });
        }

        var htmlHeight = document.documentElement.clientHeight;
        var cardHeight = htmlHeight - 300;

        // document.getElementById('claimcard').style.minHeight = cardHeight + 'px';
        // document.getElementById('claimcard').style.maxHeight = cardHeight + 'px';

        // document.getElementById('claim_list').style.minHeight = (cardHeight - 50) + 'px';
        // document.getElementById('claim_list').style.maxHeight = (cardHeight - 50) + 'px';
        // document.getElementById('claim_list').style.overflow = 'hidden';

        // document.getElementById('roundscard').style.minHeight = cardHeight + 'px';
        // document.getElementById('roundscard').style.maxHeight = cardHeight + 'px';

        // document.getElementById('round_lists').style.minHeight = (cardHeight - 50) + 'px';
        // document.getElementById('round_lists').style.maxHeight = (cardHeight - 50) + 'px';
        // document.getElementById('round_lists').style.overflow = 'hidden';

        // document.getElementById('adoptcard').style.minHeight = cardHeight + 'px';
        // document.getElementById('adoptcard').style.maxHeight = cardHeight + 'px';

        // document.getElementById('adoption_list').style.minHeight = (cardHeight - 50) + 'px';
        // document.getElementById('adoption_list').style.maxHeight = (cardHeight - 50) + 'px';
        // document.getElementById('adoption_list').style.overflow = 'hidden';


        function deleteClaim(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this claim request?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the approval action here
                    Livewire.dispatch('delete_claim', {
                        id: id
                    });
                    closemodals();
                    Swal.fire(
                        'Deleted!',
                        'The request has been deleted.',
                        'success'
                    ).then(() => {

                    });
                }
            });
        }

        
        function archiveClaim(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to archive this claim request?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, archive it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the approval action here
                    Livewire.dispatch('archive_claim', {
                        id: id
                    });
                    closemodals();
                    Swal.fire(
                        'Archived!',
                        'The has been archived.',
                        'success'
                    ).then(() => {

                    });
                }
            });
        }
        function archiveRounds(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to archive this round request?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, archive it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the approval action here
                    Livewire.dispatch('archive_rounds', {
                        id: id
                    });
                    closemodals();
                    Swal.fire(
                        'Archived!',
                        'The request has been archived.',
                        'success'
                    ).then(() => {

                    });
                }
            });
        }
        
        function deleteRounds(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this round request?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the approval action here
                    Livewire.dispatch('delete_rounds', {
                        id: id
                    });
                    closemodals();
                    Swal.fire(
                        'Deleted!',
                        'The request has been deleted.',
                        'success'
                    ).then(() => {

                    });
                }
            });
        }

        function deleteAdoption(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this adoption request?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the approval action here
                    Livewire.dispatch('delete_adoption', {
                        id: id
                    });
                    closemodals();
                    Swal.fire(
                        'Deleted!',
                        'The request has been deleted.',
                        'success'
                    ).then(() => {
                        // Reload the page after the user clicks "OK" or clicks outside the modal

                    });
                }
            });
        }

        function archiveAdoption(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to archive this claim request?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, archive it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the approval action here
                    Livewire.dispatch('archive_adoption', {
                        id: id
                    });
                    closemodals();
                    Swal.fire(
                        'Archived!',
                        'The request has been archived.',
                        'success'
                    ).then(() => {

                    });
                }
            });
        }


        function approve_claim(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to approve this claim?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the approval action here
                    Livewire.dispatch('claim_approved', {
                        id: id
                    });
                    closemodals();
                    Swal.fire(
                        'Approved!',
                        'The claim has been approved.',
                        'success'
                    ).then(() => {
                        // Reload the page after the user clicks "OK" or clicks outside the modal

                    });
                }
            });
        }

        function reject_claim(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to reject this claim?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, reject it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('claim_dog_rejected', {
                        id: id
                    });
                    closemodals();
                    Swal.fire(
                        'Rejected!',
                        'The claim has been rejected.',
                        'success'
                    ).then(() => {
                        // Reload the page after the user clicks "OK" or clicks outside the modal

                    });
                }
            });
        }
    </script>
    <script>
        function hidethis(status) {
            console.log(status);
            if (status === 'Lost Dog Found') {


                document.getElementById('dog_lost').classList.remove('d-none');
                document.getElementById('dog_lost').classList.add('d-block');

                document.getElementById('dog_claimer').classList.remove('d-block');
                document.getElementById('dog_claimer').classList.add('d-none');
            } else {

                document.getElementById('dog_claimer').classList.remove('d-none');
                document.getElementById('dog_claimer').classList.add('d-block');

                document.getElementById('dog_lost').classList.remove('d-block');
                document.getElementById('dog_lost').classList.add('d-none');
            }
        }



        var adoptionlist = [];
        var cdoptionlist = [];
        var cl_list = [];

        var a_options = {
            valueNames: ['ticket_number', 'requestor', 'dog_name', 'contact', 'address', 'date_request', 'status',
                'actions'
            ],
            searchClass: 'search',
            page: 6,
            pagination: true,
            paginationClass: 'pagination pagination-rounded', // Adds pagination classes (rounded pagination)
            nextClass: 'next', // Custom class for the next button
            prevClass: 'previous', // Custom class for the previous button
            activeClass: 'active', // Custom class for active page
            pageClass: 'page-item', // Class for each page item
            linkClass: 'page-link' // Class for each link inside the pagination
        };

        var c_options = {
            valueNames: ['ticket_number', 'requestor', 'address', 'specific', 'contact', 'created', 'status',
                'actions'
            ],
            searchClass: 'c_search',
            page: 6,
            pagination: true,
            paginationClass: 'pagination', // Adds pagination classes (rounded pagination)
            nextClass: 'next', // Custom class for the next button
            prevClass: 'previous', // Custom class for the previous button
            activeClass: 'active', // Custom class for active page
            pageClass: 'page-item', // Class for each page item
            linkClass: 'page-link' // Class for each link inside the pagination
        };

        var cl_options = {
            valueNames: ['ticket_number', 'requestor', 'dog_name', 'contact', 'address', 'status', 'actions'],
            searchClass: 'cl_search',
            page: 6,
            pagination: true,
            paginationClass: 'pagination', // Adds pagination classes (rounded pagination)
            nextClass: 'next', // Custom class for the next button
            prevClass: 'previous', // Custom class for the previous button
            activeClass: 'active', // Custom class for active page
            pageClass: 'page-item', // Class for each page item
            linkClass: 'page-link' // Class for each link inside the pagination
        };


        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('livewire:init', function() {

                function areinitializeList() {
                    console.log(adoptionlist);
                    console.log('reinit');
                    // adoptionlist = new List('adoption_list', a_options);
                    // cdoptionlist = new List('round_lists', c_options);
                    // cl_list = new List('claim_list', cl_options);
                }


                areinitializeList();

                document.querySelector('.search').addEventListener('input', function(event) {
                    adoptionlist.search(event.target
                        .value); // Filter results based on the search input
                });
                document.querySelector('.c_search').addEventListener('input', function(event) {
                    cdoptionlist.search(event.target
                        .value); // Filter results based on the search input
                });
                document.querySelector('.cl_search').addEventListener('input', function(event) {
                    cl_list.search(event.target
                        .value); // Filter results based on the search input
                });

                document.getElementById('addressFilter').addEventListener('change', function() {
                    var selectedOption = this.value;

                    cl_list.filter(function(item) {
                        var addressStatus = item.elm.querySelector('.address').getAttribute(
                            'data-address-status');
                        if (selectedOption === '') {
                            return true;
                        } else if (selectedOption === 'with') {
                            return addressStatus === 'with';
                        } else if (selectedOption === 'without') {
                            return addressStatus === 'without';
                        }
                    });
                });

                document.getElementById('addressFilter2').addEventListener('change', function() {
                    var selectedOption = this.value;

                    cl_list.filter(function(item) {
                        var addressStatus = item.elm.querySelector('.address').getAttribute(
                            'data-address-status');
                        if (selectedOption === '') {
                            return true;
                        } else if (selectedOption === 'with') {
                            return addressStatus === 'with';
                        } else if (selectedOption === 'without') {
                            return addressStatus === 'without';
                        }
                    });
                });

                $('.cl_PaginateNext').on('click', function() {
                    var list = $('.pagination').find('li');
                    $.each(list, function(position, element) {
                        if ($(element).is('.active')) {
                            $(list[position + 1]).trigger('click');
                        }
                    })
                });

                $('.cl_jPaginateBack').on('click', function() {
                    var list = $('.pagination').find('li');
                    $.each(list, function(position, element) {
                        if ($(element).is('.active')) {
                            $(list[position - 1]).trigger('click');
                        }
                    })
                });

                $('.claimjPaginateNext').on('click', function() {
                    var list = $('.pagination').find('li');
                    $.each(list, function(position, element) {
                        if ($(element).is('.active')) {
                            $(list[position + 1]).trigger('click');
                        }
                    })
                });


                $('.claimjPaginateBack').on('click', function() {
                    var list = $('.pagination').find('li');
                    $.each(list, function(position, element) {
                        if ($(element).is('.active')) {
                            $(list[position - 1]).trigger('click');
                        }
                    })
                });

                $('.cjPaginateNext').on('click', function() {
                    var list = $('.pagination').find('li');
                    $.each(list, function(position, element) {
                        if ($(element).is('.active')) {
                            $(list[position + 1]).trigger('click');
                        }
                    })
                });


                $('.cjPaginateBack').on('click', function() {
                    var list = $('.pagination').find('li');
                    $.each(list, function(position, element) {
                        if ($(element).is('.active')) {
                            $(list[position - 1]).trigger('click');
                        }
                    })
                });

                Livewire.on('reinit_table', event => {

                    setTimeout(() => {
                        areinitializeList();
                    }, 1000);


                });

            });


            document.getElementById('approve_rounds').addEventListener('click', function() {
                setTimeout(() => {}, 1000);
                // Swal.fire({
                //     title: 'Approve Rounds?',
                //     text: "Are you sure you want to approve this rounds request?",
                //     icon: 'warning',
                //     showCancelButton: true,
                //     confirmButtonColor: '#28a745',
                //     cancelButtonColor: '#d33',
                //     confirmButtonText: 'Yes, approve rounds!'
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         Livewire.dispatch('rounds_accepted')
                //         Swal.fire(
                //             'Approved!',
                //             'The rounds have been approved successfully.',
                //             'success'
                //         ).then(() => {
                //             // Reload the page after approval
                //         });
                //     }
                // });

                // First prompt: Text input for the title
                Swal.fire({
                    title: 'Approve Rounds?',
                    html: `
                                <div style="text-align: left;">
                                <div >
                                    <label for="title" style="display: block; font-weight: bold;">Title:</label>
                                    <input type="text" id="titled" class="swal2-input" placeholder="Enter title here" style="width: 88%;">
                                </div>
                                <div>
                                    <label for="remarks" style="display: block; font-weight: bold;">Remarks:</label>
                                    <textarea id="remarksd" class="swal2-textarea" placeholder="Enter remarks here" style="width: 88%;"></textarea>
                                </div>
                                </div>
                            `,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    preConfirm: () => {
                        const title = document.getElementById('titled').value;
                        const remarks = document.getElementById('remarksd').value;
                        if (!title || !remarks) {
                            Swal.showValidationMessage('Please enter both title and remarks');
                        }
                        return {
                            title,
                            remarks
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Rounds Approved!',
                            text: 'The announcement will now be posted.',
                            icon: 'success'
                        });
                        Livewire.dispatch('rounds_accepted', {
                            data: result.value
                        });
                        closemodals();
                    }
                });



            });

            document.getElementById('reject_rounds').addEventListener('click', function() {
                Swal.fire({
                    title: 'Reject Rounds?',
                    text: "Are you sure you want to approve this rounds request?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#28a745',
                    confirmButtonText: 'Yes, reject rounds!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Emit Livewire event to handle the rejection logic
                        Livewire.dispatch('rounds_rejected');
                        closemodals();
                        Swal.fire(
                            'Rejected!',
                            'The rounds have been rejected successfully.',
                            'success'
                        ).then(() => {
                            // Reload the page after rejection
                        });
                    }
                });
            });

            document.getElementById('approve_adoption').addEventListener('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to approve the adoption! Please call the Adopter first to confirm the details.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, approve it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('adopted');
                        closemodals();
                        Swal.fire(
                            'Approved!',
                            'The adoption has been approved.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {

                            }
                        });

                    }
                });
            });


            document.getElementById('reject_adoption').addEventListener('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to reject the adoption!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, reject it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform the reject action here
                        Livewire.dispatch('r_adopted');
                        closemodals();
                        Swal.fire(
                            'Rejected!',
                            'The adoption has been rejected.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {

                            }
                        });
                    }
                });
            });


        });
    </script>
</div>
