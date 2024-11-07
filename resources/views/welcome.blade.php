<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Paws Haven</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="assets/js/hyper-config.js"></script>

    <!-- App css -->
    <link href="assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <script src="https://code.jscharting.com/latest/jscharting.js"></script>

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        /* Default size for larger screens */
        .responsive-img {
            width: 540px;
            height: 390px;
            object-fit: cover;
        }

        /* Size for screens 400px wide or less */
        @media (max-width: 400px) {
            .responsive-img {
                margin-top: 50px;
                width: 100%;
                height: 230px;
            }
        }

        .chartDiv {
            background-color: transparent !important;
        }

        .carousel-item img {
            width: 530px;
            height: 370px;
            object-fit: cover;
            /* Ensures the image covers the box without distortion */
        }
    </style>
</head>

<body>

    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark">
        <div class="container">

            <!-- logo -->
            <a href="" class="navbar-brand me-lg-5">
                PAWS HAVEN
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- menus -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <!-- left menu -->
                <ul class="navbar-nav me-auto align-items-center">
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="#">Adopt</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="#">Lost and Found</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="#">Donate</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>

                <!-- right menu -->
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-0">
                        <a class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex" data-bs-toggle="modal"
                            data-bs-target="#primary-header-modal">
                            <i class="uil uil-user-circle me-1"></i> Log in
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- START HERO -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="mt-md-4 text-black">
                        <div>
                            <span class="text-black-50 ms-1">Welcome to Paws Haven</span>
                        </div>
                        <h2 class="text-black fw-normal mb-4 mt-3 lh-base">
                            Cityland Dog Pound
                        </h2>

                        <p class="mb-4 font-16 text-black-50">Cityland Dog Pound in Sta. Maria, Bulacan, is an animal
                            control facility that serves the local community by managing and caring for stray dogs and
                            other animals found within the municipality. </p>
                        <a data-bs-toggle="modal" data-bs-target="#primary-header-modal"
                            class="btn btn-lg font-16 btn-success">View More <i
                                class="mdi mdi-arrow-right ms-1"></i></a>

                    </div>
                </div>
                <div class="col-md-5 offset-md-2">
                    <div class="text-md-end mt-3 mt-md-0">
                        <img src="assets/images/dogfound.png" alt="" class="img-fluid responsive-img" />

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->

    <!-- START SERVICES -->
    {{-- <section class="mt-4">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="mt-0"><svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" x="0" y="0"
                                viewBox="0 0 512 511" style="enable-background:new 0 0 512 512" xml:space="preserve"
                                class="">
                                <g>
                                    <path fill="#80c0e4"
                                        d="M36.031 243.777C-65.582 59.578 126.996-72.203 256 64.371c171.824-181.906 456.441 112.262 8.438 372.27-5.27 3.046-11.61 3.046-16.88 0a917.061 917.061 0 0 1-12.632-7.461l-79.262-106.95zm0 0"
                                        opacity="1" data-original="#80c0e4" class=""></path>
                                    <path fill="#5ba0d3"
                                        d="M248.578 437.188a17.027 17.027 0 0 0 4.36 1.449c1.105.207 2.218.3 3.335.281a885.654 885.654 0 0 1-26.863-17.18l5.516 7.442c2.07 1.246 4.16 2.492 6.265 3.734 2.102 1.242 7.043 4.102 7.387 4.274zm0 0"
                                        opacity="1" data-original="#5ba0d3" class=""></path>
                                    <path fill="#e9e9e9"
                                        d="M373.031 294.746c-16.41 16.461-79.652 77.844-138.105 134.434C130.883 366.719 68.465 302.578 36.03 243.777c50.074-50.843 122.305-124.015 143.074-144.425 17.98-17.852 44.82-19.97 59.934-4.739 6.598 6.66 9.879 15.528 9.957 24.899a51.734 51.734 0 0 1 3.41-3.719c17.992-17.852 44.813-19.973 59.934-4.75 11.148 11.238 12.789 28.789 5.66 44.39 15.648-7.011 33.191-5.242 44.352 6 15.109 15.231 12.777 42.04-5.204 59.891a55.123 55.123 0 0 1-3.75 3.38c9.372.151 18.223 3.5 24.832 10.16 15.11 15.23 12.782 42.042-5.199 59.882zm0 0"
                                        opacity="1" data-original="#e9e9e9" class=""></path>
                                    <path fill="#5ba0d3"
                                        d="M196.95 21.242c-30.669-13.867-65.88-17.504-98.247-7.46-23.156 7.183-44.281 21.077-59.969 39.765C11.945 85.453 3.262 129.063 9.602 169.633c.058.37.12.738.183 1.11 4.168 25.66 13.723 50.327 26.246 73.034l34.274 22.477a309.255 309.255 0 0 1-4.274-7.477C-18.547 105.457 100.7-11.539 217.453 32.305a167.983 167.983 0 0 0-20.504-11.063zm0 0"
                                        opacity="1" data-original="#5ba0d3" class=""></path>
                                    <g fill="#e1738c">
                                        <path
                                            d="M286.273 134.172c-7.617-7.68-22.086-5.68-32.308 4.469-10.227 10.148-12.336 24.597-4.719 32.273 7.621 7.68 22.086 5.68 32.313-4.469 10.222-10.144 12.336-24.597 4.714-32.273zM220.035 120.992c-7.62-7.676-22.086-5.676-32.312 4.469-10.223 10.148-12.336 24.598-4.715 32.277 7.62 7.68 22.086 5.676 32.312-4.468 10.223-10.149 12.336-24.598 4.715-32.278zM336.281 184.563c-7.617-7.68-22.086-5.676-32.308 4.468-10.227 10.149-12.336 24.598-4.72 32.278 7.622 7.675 22.087 5.675 32.313-4.47 10.223-10.148 12.336-24.597 4.715-32.276zM351.91 253.938c-7.62-7.676-22.086-5.676-32.308 4.472-10.227 10.145-12.34 24.594-4.72 32.274 7.622 7.68 22.087 5.68 32.313-4.47 10.223-10.148 12.336-24.597 4.715-32.277zM278.71 270.645c-18.089-18.227.688-35.06-20.21-56.118-20.902-21.058-37.875-2.406-55.965-20.636-14.086-14.192-53.508-6.645-62.168 27.66-8.656 34.304 26.942 40.476 48.442 62.14s27.402 57.305 61.773 48.91c34.367-8.398 42.215-47.761 28.129-61.956zm0 0"
                                            fill="#e1738c" opacity="1" data-original="#e1738c" class="">
                                        </path>
                                    </g>
                                    <path fill="#d3d2d8"
                                        d="M237.273 426.906C149.664 369.965 95.48 312.168 66.035 258.777c-5.758-10.433-10.558-20.691-14.492-30.746-5.34 5.418-10.535 10.692-15.512 15.746 11.657 21.13 27.184 42.95 47.125 65.137 1.735 1.93 3.5 3.86 5.301 5.793 9.906 10.64 20.836 21.355 32.84 32.113 1.09.98 2.191 1.957 3.3 2.938 22.184 19.57 47.958 39.265 77.669 58.875a913.07 913.07 0 0 0 32.66 20.547c.785-.758 1.566-1.516 2.347-2.274zm0 0"
                                        opacity="1" data-original="#d3d2d8"></path>
                                    <path
                                        d="M274.21 122.063c-9.339.132-19.038 4.812-25.534 11.261-10.918 10.836-16.965 30.582-4.754 42.883 12.219 12.313 32 6.402 42.918-4.43 10.918-10.836 16.957-30.586 4.754-42.882-4.895-4.934-11.055-6.926-17.383-6.833zm9.114 26.265c-.847 4.887-4.148 9.918-7.054 12.8-4.844 4.81-15.61 10.653-21.704 4.509-6.078-6.125-.144-16.883 4.676-21.668 4.863-4.824 15.602-10.656 21.703-4.508 2.426 2.445 2.942 5.621 2.38 8.867zM220.598 158.598c13.144-13.043 15.277-32.282 4.757-42.883-12.218-12.309-32-6.403-42.917 4.433-10.91 10.829-16.946 30.598-4.758 42.88 12.218 12.312 32 6.406 42.918-4.43zm-34.645-15c.852-4.891 4.149-9.922 7.047-12.801 4.871-4.836 15.602-10.668 21.707-4.516 4.617 4.653 2.477 14.574-4.676 21.672-4.86 4.824-15.605 10.652-21.703 4.508-2.426-2.441-2.937-5.621-2.375-8.863zM341.602 179.281c-12.22-12.312-32-6.402-42.918 4.434-13.145 13.043-15.278 32.281-4.754 42.883 12.21 12.308 32.004 6.398 42.914-4.434 10.922-10.836 16.965-30.582 4.758-42.883zm-8.41 19.414c-.649 4.434-3.169 9.106-6.91 12.825-4.84 4.8-15.618 10.644-21.708 4.507-4.613-4.648-2.472-14.57 4.676-21.668 7.125-7.07 26.34-12.078 23.941 4.336zM309.559 295.969c12.214 12.312 32 6.406 42.918-4.43 10.918-10.836 16.96-30.582 4.753-42.883-12.21-12.308-31.996-6.406-42.917 4.43-13.141 13.047-15.278 32.281-4.754 42.883zm15.32-32.235c4.746-4.71 15.57-10.695 21.707-4.507 6.082 6.128.152 16.87-4.676 21.664-4.855 4.816-15.61 10.656-21.707 4.511-4.613-4.648-2.473-14.574 4.676-21.668zM133.094 219.73c-7.348 29.114 12.422 42.149 29.86 53.653 15.304 10.094 26.003 20.875 35.98 36.254 12.59 19.406 28.156 36.441 53.425 30.265 18.946-4.629 33.371-18.43 38.582-36.918 4.149-14.718 1.5-29.129-6.914-37.605-6.597-6.649-6.707-12.61-6.855-20.867-.18-9.89-.406-22.207-13.352-35.25-12.949-13.047-25.257-13.364-35.152-13.621-8.25-.211-14.215-.368-20.813-7.016-5.761-5.805-14.433-9-24.421-9-19.371 0-43.387 12.55-50.34 40.105zm50.34-25.105c5.875 0 10.894 1.664 13.773 4.566 10.84 10.922 22.059 11.211 31.074 11.446 9.043.23 16.188.418 24.89 9.187 8.708 8.774 8.84 15.918 9.005 24.961.164 9.016.367 20.238 11.207 31.16 4.472 4.504 5.726 13.735 3.125 22.97-3.727 13.21-14.086 23.089-27.711 26.417-18.754 4.582-28.23-9.914-37.277-23.86-11.102-17.113-23.282-29.382-40.305-40.613-18.606-12.27-28.106-19.511-23.574-37.457 4.988-19.773 22.05-28.777 35.793-28.777zm0 0"
                                        fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                    <path
                                        d="M440.32 295.723c3.157 2.511 7.973 2.023 10.54-1.203 40.277-50.684 61.417-103.372 61.136-152.372-.246-43.453-17.27-82.02-47.926-108.597C436.34 9.516 400.473-2.055 363.074.973c-38.504 3.117-75.379 21.289-107.082 52.68C226.027 23.995 191.22 6.038 154.898 1.581c-35.32-4.332-70.187 4.535-98.183 24.969-28.98 21.156-48.352 53.094-54.54 89.937-6.859 40.856 2.575 86.13 27.286 130.926 17.387 31.52 42.273 62.852 73.98 93.129 42.028 40.133 90.168 73.523 140.356 102.602 7.531 4.367 16.871 4.355 24.402-.004 67.492-39.168 122.238-81.348 162.723-125.368a7.501 7.501 0 0 0-.442-10.597 7.502 7.502 0 0 0-10.597.445c-39.461 42.906-93.031 84.137-159.203 122.543-2.934 1.7-6.438 1.7-9.364.004a901.11 901.11 0 0 1-4.129-2.406c42.86-41.504 128.18-124.719 131.125-127.676 20.887-20.727 23.239-52.344 5.239-70.488-4.29-4.32-9.477-7.598-15.235-9.692a59.48 59.48 0 0 0 6.993-12.054c2.996-6.961 4.496-14.262 4.46-21.356-.054-11.355-4.03-22.2-12.097-30.332-9.813-9.879-23.988-14.004-38.52-11.785.707-4.418.848-8.942.34-13.39-2.465-21.641-20.46-37.278-42.082-37.54-12.004-.144-23.87 4.102-33.488 11.2-11.363-32-50.926-33.688-74.836-15.22-1.836 1.423-56.379 55.848-85.05 84.872a7.502 7.502 0 0 0 .062 10.61 7.504 7.504 0 0 0 10.605-.067c26.508-26.766 52.817-53.75 79.684-80.153 11.543-11.343 31.336-17.93 45.855-7.71 7.305 5.14 11.176 13.792 11.254 22.609.059 6.836 8.871 9.984 13.254 4.75 12.117-14.488 37.145-23.176 52.262-8 9.437 9.496 9.449 24.43 4.164 35.992-2.778 6.082 3.765 12.703 9.887 9.961 13.269-5.941 27.382-4.2 35.96 4.437 10.27 10.352 10.227 27.711.957 41.825a46.666 46.666 0 0 1-9.343 10.37c-5.27 4.333-2.16 13.184 4.64 13.298 12.407.199 23.41 8.027 26.5 20.25 2.73 10.8-.562 23.773-9.39 34.117-24.762 29.02-54.23 53.453-81.567 79.926-18.035 18.03-36.64 35.53-54.96 53.273-47.07-28.652-87.442-58.945-120.06-90.09-28.96-27.656-51.968-56.117-68.46-84.672 2.644-2.687 28.222-28.632 38.289-38.836a7.497 7.497 0 0 0-.07-10.605c-2.914-2.875-7.735-2.84-10.606.07a80808.419 80808.419 0 0 0-35.074 35.57c-19.531-38.812-26.754-77.437-20.91-112.25C22.504 86.02 39.762 57.5 65.559 38.673c24.91-18.184 55.988-26.067 87.511-22.2 35.035 4.298 68.742 22.65 97.473 53.067 1.418 1.5 3.39 2.352 5.453 2.352s4.035-.852 5.453-2.352c30.301-32.078 65.86-50.617 102.836-53.61 33.356-2.702 65.3 7.583 89.961 28.962 51.82 44.921 67.242 136.648-15.133 240.296a7.497 7.497 0 0 0 1.207 10.536zm0 0"
                                        fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                </g>
                            </svg></h1>
                        <h3><span class="text-primary">Paws Haven</span> is a <span class="text-primary">lost and
                                found</span> website <br> dedicated to helping dog owners report and locate lost or
                            found
                            dogs within their community.</h3>
                        <p class="text-muted mt-2">These pounds are typically overseen by the
                            local government unit (LGU) or by private organizations in collaboration with the LGU. Their
                            primary functions include rescuing stray or abandoned dogs, providing temporary shelter,
                            ensuring the animals are fed and cared for, and facilitating the adoption or return of these
                            animals to their owners.
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <hr>
    </section> --}}
    <!-- END SERVICES -->
    <!-- START SERVICES -->
    <section class="py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <h1 class="mt-0 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="80" height="80" x="0" y="0"
                            viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve"
                            class="">
                            <g>
                                <linearGradient id="a" x1="4" x2="60" y1="32"
                                    y2="32" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#00c0ff"></stop>
                                    <stop offset="1" stop-color="#5558ff"></stop>
                                </linearGradient>
                                <path fill="url(#a)"
                                    d="M45.509 54.098v2.83a.86.86 0 0 1-.01.16 2.557 2.557 0 0 1-2.56 2.41H21.031a2.57 2.57 0 0 1-2.57-2.57v-2.83a6.504 6.504 0 0 1 4.43-6.15c.662-.196 2.091-.706 2.76-.92a9.574 9.574 0 0 0 12.678 0c.421.135 1.822.616 2.26.76a6.561 6.561 0 0 1 4.92 6.31zm10.779-6.72-1.51-.5a8.314 8.314 0 0 1-9.26 1.76 8.372 8.372 0 0 1 1.99 5.46v2.83a.86.86 0 0 1-.01.16h10.24a2.272 2.272 0 0 0 2.26-2.27v-2.28a5.442 5.442 0 0 0-3.71-5.16zM15.122 34.83a6.264 6.264 0 1 0 6.259 6.27 6.273 6.273 0 0 0-6.26-6.27zm9.339 5.11a7.524 7.524 0 1 0 7.529-7.52 7.532 7.532 0 0 0-7.53 7.52zm24.417 7.419a6.264 6.264 0 1 0-6.259-6.26 6.271 6.271 0 0 0 6.26 6.26zm-39.656-.48-1.51.5a5.442 5.442 0 0 0-3.71 5.16v2.279a2.272 2.272 0 0 0 2.26 2.27h10.21a.865.865 0 0 1-.01-.16c-.092-2.89-.09-6.03 1.98-8.27a8.32 8.32 0 0 1-9.22-1.78zm-1.37-9.73a8.612 8.612 0 0 1 1.2-1.65 26.673 26.673 0 0 1-2.91-3.999A29.941 29.941 0 0 1 32 17.071 29.941 29.941 0 0 1 57.858 31.5a26.673 26.673 0 0 1-2.91 4 8.612 8.612 0 0 1 1.2 1.65 27.394 27.394 0 0 0 3.74-5.2.956.956 0 0 0 0-.9A31.9 31.9 0 0 0 32 15.071 31.9 31.9 0 0 0 4.112 31.05a.956.956 0 0 0 0 .9 27.394 27.394 0 0 0 3.74 5.2zM32 11.502a1 1 0 0 0 1-1v-5a1 1 0 0 0-2 0v5a1 1 0 0 0 1 1zm-17.798 2.6a1 1 0 1 0 1.6-1.2l-3-4a1 1 0 0 0-1.6 1.2zm34.795.4a.998.998 0 0 0 .801-.4l3-4a1 1 0 0 0-1.6-1.2l-3 4a1.006 1.006 0 0 0 .8 1.6zM43.53 34.81a11.985 11.985 0 0 0-1.87-10.43 1 1 0 0 0-1.49-.12 1.483 1.483 0 0 1-1.01.39 1.497 1.497 0 0 1-1.24-2.34 1.003 1.003 0 0 0-.36-1.439c-7.75-4.24-17.713 1.78-17.558 10.63a11.657 11.657 0 0 0 .47 3.309 8.12 8.12 0 0 1 2.23 3.01 9.531 9.531 0 0 1 3.84-5.68 5.498 5.498 0 1 1 10.919.01 9.57 9.57 0 0 1 3.82 5.71 8.31 8.31 0 0 1 2.249-3.05zm-8.06-3.73a3.495 3.495 0 0 0-6.939-.01 9.518 9.518 0 0 1 6.94.01z"
                                    opacity="1" data-original="url(#a)" class=""></path>
                            </g>
                        </svg>
                    </h1>
                    <h3 class="text-center"> <span class="text-primary">Mission</span> & <span
                            class="text-primary">Vission</span></h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="text-center p-2 p-sm-3">
                                <div class="avatar-sm m-auto">
                                    <span class="avatar-title bg-primary-lighten rounded-circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30"
                                            x="0" y="0" viewBox="0 0 512 512"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve"
                                            class="">
                                            <g>
                                                <g fill-rule="evenodd" clip-rule="evenodd">
                                                    <path fill="#f6b600"
                                                        d="M482.39 16h-81.229v42.347h81.229l-21.173-21.173z"
                                                        opacity="1" data-original="#f6b600"></path>
                                                    <path fill="#397399"
                                                        d="m152.801 294.974-20.236 60.148c41.293-17.049 75.528 14.264 67.431 76.228l-31.228-.354c8.945-49.475-18.975-63.189-75.491-26.734l-27.689 63.911H34.414l42.275-99.68 34.135-94.09 79.61-27.536c11.494-3.976 18.657.745 21.245 8.209 2.573 7.421.63 17.724-11.214 22.137z"
                                                        opacity="1" data-original="#397399"></path>
                                                    <path fill="#00bfa9"
                                                        d="M353.793 271.778h4.947c8.922 0 26.085 13.547 26.085 22.469v73.913h-32.442V312.554c-12.793-1.345-37.83.328-46.677 12.574l-58.416 97.9h-33.274l82.134-144.733 1.237-36.836-61.84 22.889c-26.588 9.841-31.481-22.029-15.179-28.473l84.609-33.436 27.718-18.472 68.467-75.266c4.809-5.287 28.305 17.766 11.33 36.37l-58.699 64.335z"
                                                        opacity="1" data-original="#00bfa9" class=""></path>
                                                    <path fill="#c90a4f" d="M29.61 463.133h136.217V496H29.61z"
                                                        opacity="1" data-original="#c90a4f"></path>
                                                    <path fill="#fcb500" d="M165.827 423.027h136.217V496H165.827z"
                                                        opacity="1" data-original="#fcb500"></path>
                                                    <path fill="#019fce" d="M302.044 362.219h136.217V496H302.044z"
                                                        opacity="1" data-original="#019fce"></path>
                                                    <circle cx="299.02" cy="141.335" r="27.942" fill="#00bfa9"
                                                        opacity="1" data-original="#00bfa9" class="">
                                                    </circle>
                                                    <circle cx="157.838" cy="211.89" r="27.942" fill="#397399"
                                                        transform="rotate(-79.75 157.751 211.876)" opacity="1"
                                                        data-original="#397399"></circle>
                                                    <path fill="#941234" d="M138.521 463.133h27.305V496h-27.305z"
                                                        opacity="1" data-original="#941234"></path>
                                                    <path fill="#dc9602" d="M270.521 423.027h31.522V496h-31.522z"
                                                        opacity="1" data-original="#dc9602"></path>
                                                    <path fill="#397399" d="M401.521 362.219h36.739V496h-36.739z"
                                                        opacity="1" data-original="#397399"></path>
                                                    <path fill="#0a456d"
                                                        d="M157.839 188.952c12.648 0 22.939 10.287 22.939 22.939s-10.291 22.939-22.939 22.939c-12.652 0-22.939-10.287-22.939-22.939 0-12.653 10.286-22.939 22.939-22.939zm0 55.877c18.16 0 32.939-14.778 32.939-32.939 0-18.16-14.778-32.938-32.939-32.938-18.17 0-32.939 14.778-32.939 32.938 0 18.161 14.769 32.939 32.939 32.939zM299.018 118.39c12.652 0 22.939 10.291 22.939 22.953 0 12.648-10.287 22.934-22.939 22.934-12.648 0-22.939-10.286-22.939-22.934.001-12.661 10.292-22.953 22.939-22.953zm0 55.892c18.16 0 32.939-14.783 32.939-32.938 0-18.174-14.778-32.953-32.939-32.953-18.16 0-32.938 14.778-32.938 32.953 0 18.155 14.778 32.938 32.938 32.938zM406.159 53.351V21h64.16l-12.638 12.638a5.01 5.01 0 0 0 0 7.074l12.638 12.638h-64.16zm6.312 70.909c-2.121-5.931-6.472-9.929-8.659-11.039l-67.425 74.108c-1.084 1.205-25.086 16.856-28.639 19.27-1.163.79-77.306 30.664-85.547 33.921-4.901 1.938-6.843 7.46-6.034 12.29l.903 2.94c2.502 5.498 8.541 6.942 16.739 3.908l61.842-22.887c3.325-1.238 6.85 1.304 6.726 4.859l-1.228 36.828a4.97 4.97 0 0 1-.649 2.3L222.601 418.03h21.848l56.959-95.462c.08-.127.164-.249.24-.367 10.63-14.712 38.173-16.001 51.263-14.623a5 5 0 0 1 4.468 4.972v44.669h22.44v-62.97c0-5.55-14.383-17.469-21.081-17.469h-4.948a5 5 0 0 1-5-5v-62.368a5.01 5.01 0 0 1 1.308-3.372l58.699-64.339c4.723-5.169 5.951-11.039 3.674-17.441zm-16.312 232.959h-6.34v-62.97c0-11.839-19.491-27.417-31.029-27.468v-55.44l37.369-40.948zM433.26 491H307.038V367.218H433.26zM297.038 362.219v55.812h-40.939l53.779-90.138c6.298-8.443 24.298-11.18 37.501-10.681v40.008h-45.342a5.002 5.002 0 0 0-4.999 4.999zM170.83 428.03h126.209V491H170.83zM34.608 468.132H160.83V491H34.608zm130.7-50.05a4.974 4.974 0 0 0-4.478 4.948v35.097H75.392l21.866-50.478c26.772-17.017 48.248-22.972 59.062-16.312 8.08 4.973 9.529 16.534 8.988 26.745zM81.29 370.45l-37.191 87.678h20.39l24.199-55.844a4.944 4.944 0 0 1 1.881-2.225c31.631-20.399 56.178-26.358 70.99-17.238 6.989 4.313 14.731 13.899 13.748 35.21h20.803c.898-25.498-6.392-45.647-20.324-55.718-11.147-8.062-25.817-8.97-41.315-2.573-3.948 1.628-8.013-2.159-6.641-6.209l20.229-60.148a5.006 5.006 0 0 1 2.992-3.095l47.665-17.76c7.822-2.907 9.633-8.81 8.781-13.715l-.908-3.01c-2.262-5.183-7.38-6.683-14.52-4.214l-77.363 26.763zm155.991-101.407 54.857-20.31-.95 28.169-80.087 141.128h-4.99c.927-28.739-7.85-51.823-24.472-63.831-11.589-8.367-25.921-10.738-41.151-6.961l16.293-48.408 45.431-16.933c7.525-2.808 11.966-7.638 14.04-13.014 5.056 2.737 12.035 3.476 21.029.16zM468.292 37.171l17.638-17.633c3.124-3.119.913-8.537-3.542-8.537h-81.229a5 5 0 0 0-5 5v90.772l-66.752 73.379-26.758 17.826-84.122 33.239c-5.616 2.225-9.238 6.496-11.086 11.382-4.595-2.469-10.771-3.18-18.645-.461l-79.607 27.539a5.005 5.005 0 0 0-3.071 3.024l-34.091 93.957-38.79 91.468h-3.631c-2.761 0-5 2.244-5 5.005V496a5 5 0 0 0 5 5H438.26a5 5 0 0 0 5-5V362.219c0-2.756-2.239-5-5-5h-32.101V159.433l10.032-10.992c16.434-18.019 1.747-41.292-10.032-44.989V63.35h76.229c4.447 0 6.67-5.413 3.542-8.541z"
                                                        opacity="1" data-original="#0a456d" class=""></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <h4 class="mt-3">Our Mission</h4>
                                <p class="text-muted mt-2 mb-0">is “Promote and maintenance of a safe, orderly and
                                    clean
                                    environment towards social and economic
                                    upliftment of the people through strong political will”.
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="text-center p-2 p-sm-3">
                                <div class="avatar-sm m-auto">
                                    <span class="avatar-title bg-primary-lighten rounded-circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30"
                                            x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512"
                                            xml:space="preserve" class="">
                                            <g>
                                                <g data-name="Color copy">
                                                    <ellipse cx="32" cy="28" fill="#aae1f9"
                                                        rx="29" ry="15" opacity="1"
                                                        data-original="#aae1f9" class=""></ellipse>
                                                    <path fill="#57b7eb"
                                                        d="M36.933 37c-10.37 0-19.841-4.413-27.115-11.684A39.9 39.9 0 0 1 34 17a40.209 40.209 0 0 1 26.029 9.808C52.949 18.3 43.015 13 32 13c-11.524 0-21.874 5.8-29 15 7.126 9.2 17.476 15 29 15 11.412 0 21.668-5.69 28.787-14.739A37.6 37.6 0 0 1 36.933 37z"
                                                        opacity="1" data-original="#57b7eb" class=""></path>
                                                    <path fill="#fcbc04"
                                                        d="M47 28a15 15 0 1 0-24 11.98V43h18v-3.02A14.963 14.963 0 0 0 47 28z"
                                                        opacity="1" data-original="#fcbc04" class=""></path>
                                                    <rect width="24" height="4" x="20" y="43" fill="#d0d8da"
                                                        rx="2" opacity="1" data-original="#d0d8da"></rect>
                                                    <rect width="24" height="4" x="20" y="47" fill="#d0d8da"
                                                        rx="2" opacity="1" data-original="#d0d8da"></rect>
                                                    <path fill="#93999a"
                                                        d="M23 51h18v1a9 9 0 0 1-9 9 9 9 0 0 1-9-9v-1z" opacity="1"
                                                        data-original="#93999a"></path>
                                                    <path fill="#e59730"
                                                        d="M43 38a20 20 0 0 1-20-20 20.269 20.269 0 0 1 .105-2.058A14.96 14.96 0 0 0 23 39.98V43h18v-3.02a15.2 15.2 0 0 0 2.141-1.987c-.048 0-.094.007-.141.007z"
                                                        opacity="1" data-original="#e59730"></path>
                                                    <circle cx="32" cy="28" r="7" fill="#57b7eb"
                                                        opacity="1" data-original="#57b7eb" class="">
                                                    </circle>
                                                    <circle cx="36" cy="24" r="3" fill="#aae1f9"
                                                        opacity="1" data-original="#aae1f9" class="">
                                                    </circle>
                                                    <path fill="#4891d3"
                                                        d="M25.1 26.878A6.958 6.958 0 0 0 32 35c.156 0 .31-.013.464-.023a20.059 20.059 0 0 1-7.364-8.099z"
                                                        opacity="1" data-original="#4891d3"></path>
                                                    <path fill="#93999a"
                                                        d="M23 43h-1a2 2 0 0 0 0 4h20a2 2 0 0 0 2-2H25a2 2 0 0 1-2-2zM23 47h-1a2 2 0 0 0 0 4h20a2 2 0 0 0 2-2H25a2 2 0 0 1-2-2z"
                                                        opacity="1" data-original="#93999a"></path>
                                                    <path fill="#656b76"
                                                        d="M35 55h5.477A8.956 8.956 0 0 0 41 52v-1H23v1a8.995 8.995 0 0 0 6.026 8.486A6 6 0 0 1 35 55z"
                                                        opacity="1" data-original="#656b76"></path>
                                                    <g fill="#f9e109">
                                                        <path
                                                            d="M38.151 9.5a1.029 1.029 0 0 1-.288-.042 1 1 0 0 1-.671-1.245l1.162-3.869a1 1 0 1 1 1.916.574l-1.162 3.867a1 1 0 0 1-.957.715zM44.932 11.177a1 1 0 0 1-.878-1.477l1.936-3.567a1 1 0 1 1 1.758.955l-1.936 3.566a1 1 0 0 1-.88.523zM51.943 14.317a1 1 0 0 1-.764-1.644l2.629-3.122a1 1 0 1 1 1.529 1.289l-2.629 3.122a1 1 0 0 1-.765.355zM57.042 19.285a1 1 0 0 1-.642-1.765l3.1-2.6a1 1 0 0 1 1.286 1.531l-3.1 2.6a1 1 0 0 1-.644.234zM12.057 14.317a1 1 0 0 1-.765-.355L8.663 10.84a1 1 0 0 1 1.529-1.289l2.629 3.122a1 1 0 0 1-.764 1.644zM19.068 11.177a1 1 0 0 1-.88-.523l-1.936-3.566a1 1 0 1 1 1.758-.955L19.946 9.7a1 1 0 0 1-.878 1.478zM6.958 19.285a.994.994 0 0 1-.611-.209l-2.958-2.285a1 1 0 1 1 1.222-1.582l2.958 2.285a1 1 0 0 1-.611 1.791zM25.849 9.5a1 1 0 0 1-.957-.713L23.73 4.916a1 1 0 0 1 1.916-.574l1.162 3.869a1 1 0 0 1-.671 1.245 1.029 1.029 0 0 1-.288.044zM32 9a1 1 0 0 1-1-1V4a1 1 0 0 1 2 0v4a1 1 0 0 1-1 1zM36 43h-2v-8.683a1 1 0 0 1 .57-.9A6.027 6.027 0 0 0 38 28c0-.175-.008-.35-.024-.523a4 4 0 0 1-5.453-5.454A6.063 6.063 0 0 0 32 22a6 6 0 0 0-2.57 11.414 1 1 0 0 1 .57.9V43h-2v-8.08A7.995 7.995 0 0 1 32 20a7.951 7.951 0 0 1 2.792.511 1 1 0 0 1 .172 1.79A1.981 1.981 0 0 0 34 24a2 2 0 0 0 2 2 1.981 1.981 0 0 0 1.7-.965.99.99 0 0 1 .949-.473 1 1 0 0 1 .842.645A7.966 7.966 0 0 1 36 34.92zM53.573 46.374a1 1 0 0 1-.765-.355L50.179 42.9a1 1 0 1 1 1.529-1.289l2.629 3.122a1 1 0 0 1-.764 1.645zM60.137 40.885a.991.991 0 0 1-.642-.235l-3.1-2.6a1 1 0 1 1 1.286-1.531l3.1 2.6a1 1 0 0 1-.644 1.766zM10.427 46.374a1 1 0 0 1-.764-1.645l2.629-3.122a1 1 0 1 1 1.529 1.293l-2.629 3.123a1 1 0 0 1-.765.351zM4 40.569a1 1 0 0 1-.611-1.791l2.958-2.284a1 1 0 1 1 1.222 1.582L4.611 40.36a.994.994 0 0 1-.611.209z"
                                                            fill="#f9e109" opacity="1" data-original="#f9e109">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <h4 class="mt-3">Our Vission</h4>
                                <p class="text-muted mt-2 mb-0">“A God-loving community with participatory governance
                                    towards genuine and sustainable
                                    development and the most competitive municipality in the region”.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICES -->

    <section class="py-5 hero-section2">
        <div class="col-lg-12">
            <div class="text-center">
                <div class="row">
                    <div id="chartDiv" style="height: 200%; width: 5000px !important"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- START FEATURES 2 -->
    {{-- <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="mt-0"><i class="mdi mdi-heart-multiple-outline"></i></h1>
                        <h3>Adoptable dogs you'll <span class="text-danger">love</span></h3>
                        <p class="text-muted mt-2">Adopting from the Cityland Dog Pound not only provides a loving home
                            for a dog in need but also helps alleviate the burden on the pound, making space for more
                            dogs to be rescued and cared for.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-2 py-5 align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="assets/images/small/small-1.jpg" alt="..." class="d-block img-fluid">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">First slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/small/small-3.jpg" alt="..." class="d-block img-fluid">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">Second slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/small/small-2.jpg" alt="..." class="d-block img-fluid">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">Third slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaption" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaption" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 offset-md-1 col-md-5">
                    <h3 class="fw-normal mt-3">Why Adopt a Dog</h3>
                    <p class="text-muted mt-3">It fosters a sense of responsibility and compassion, helping to create a
                        kinder society where animals are given the care and respect they deserve. Additionally, adopted
                        dogs often develop a deep bond with their new families, as they sense the second chance they’ve
                        been given.</p>

                    <div class="mt-4">
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i> Save a Life </p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i> Companionship and
                            Love </p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-primary"></i> Lower Costs </p>

                    </div>

                    <a class="btn btn-success rounded-pill mt-3" data-bs-toggle="modal"
                        data-bs-target="#primary-header-modal">Adopt Dog <i class="mdi mdi-arrow-right ms-1"></i></a>

                </div>
            </div>

            <div class="row pb-3 pt-5 align-items-center">
                <div class="col-lg-6 col-md-5">
                    <h3 class="fw-normal">Lost Dogs</h3>
                    <p class="text-muted mt-3">Owners of lost dogs can visit the pound to check if their pet has been
                        taken in. The facility usually keeps the dogs for a specific period, allowing time for owners to
                        reclaim their pets. After this holding period, if a dog is not claimed, it might be put up for
                        adoption or, in some unfortunate cases, humanely euthanized, depending on local regulations.</p>
                    <h4 class="mt-4 fw-normal">What Happens to Lost Dogs at the Pound:</h4>

                    <div class="ms-3 mt-1">

                        <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Safe and Cared For
                        </p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Health Check &
                            Shelter Care </p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Efforts to Locate
                            Owners </p>
                        <p class="text-muted"><i class="mdi mdi-circle-medium text-success"></i> Adoption
                            Opportunities </p>
                    </div>

                    <a class="btn btn-info rounded-pill mt-3" data-bs-toggle="modal"
                        data-bs-target="#primary-header-modal">View Dog <i class="mdi mdi-arrow-right ms-1"></i></a>

                </div>
                <div class="col-lg-5 col-md-6 offset-md-1">
                    <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="assets/images/small/small-1.jpg" alt="..." class="d-block img-fluid">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">First slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/small/small-3.jpg" alt="..." class="d-block img-fluid">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">Second slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/small/small-2.jpg" alt="..." class="d-block img-fluid">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">Third slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaption" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaption" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section> --}}
    <section class="">
        <div class="container">
            <div class="row">
            </div>
            <div class="row mt-2 py-5 align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @php
                                $shuffled_data1 = collect($data->toArray())->shuffle();
                            @endphp
                            @if ($shuffled_data1->isEmpty())
                                <!-- If no data, display the placeholder images -->
                                <div class="carousel-item active">
                                    <img src="assets/images/small/small-1.jpg" alt="..."
                                        class="d-block img-fluid">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3 class="text-white">First slide label</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/small/small-3.jpg" alt="..."
                                        class="d-block img-fluid">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3 class="text-white">Second slide label</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/small/small-2.jpg" alt="..."
                                        class="d-block img-fluid">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3 class="text-white">Third slide label</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                            @else
                                <!-- If data is available, display the shuffled items -->
                                @foreach ($shuffled_data1 as $index => $animal)
                                    @php
                                        // Decode the animal_images JSON string into an array
                                        $images = json_decode($animal['animal_images'], true);
                                        $firstImage = $images[0] ?? ''; // Get the first image URL (if exists)
                                    @endphp

                                    @if ($firstImage)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $firstImage) }}" alt="..."
                                                class="d-block img-fluid">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h3 class="text-white">{{ $animal['dog_name'] }}</h3>
                                                <p>{{ $animal['description'] }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaption" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaption" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 offset-md-1 col-md-5">
                    <h3 class="fw-normal mt-3 text-black">Mandalte</h3>
                    <p class="text-secondary mt-3">The Republic Act 7160 also known as the Local Government Code of
                        1991
                        ensure that the local government is empowered to exercise powers and functions which promotes
                        the improvements and enhancement of each individuals, including but not limited to preservation
                        and development of local culture, maintenance of health and safety, right of people to a
                        balanced ecology, development of technological capabilities, improvement of public morals,
                        economic prosperity and social justice, full employment of residents, thus ensuring peace and
                        order, and the convince of all.</p>

                </div>
            </div>

            <div class="row pb-3 pt-5 align-items-center">
                <div class="col-lg-6 col-md-5">
                    <h3 class="fw-normal text-black">Service Peldge</h3>
                    <p class="text-muted mt-3">We the Officials and employees of Local Government Unit of Santa Maria,
                        commit to:*</p>

                    <div class="ms-3 mt-1">

                        <p class="text-secondary"><i class="mdi mdi-circle-medium text-success"></i>
                            Create an enabling and competent workforce that can easily adapt to the changing
                            environment;
                        </p>
                        <p class="text-secondary"><i class="mdi mdi-circle-medium text-success"></i>
                            Attend to all applicants or requesting parties who are within the premises of the office
                            prior to the end of official working hours and during lunch break;
                        </p>
                        <p class="text-secondary"><i class="mdi mdi-circle-medium text-success"></i>
                            Respond to appreciation, feedback, criticisms, and complaints of our service at the soonest
                            possible time through our Public Assistance and Complaint Desk and other
                            appropriate/concerned departments and officials;
                        </p>
                        <p class="text-secondary"><i class="mdi mdi-circle-medium text-success"></i> Ensure continuous
                            innovation, improvement and streamlining procedures of services being offered to better
                            serve the public;
                        </p>
                        <p class="text-secondary"><i class="mdi mdi-circle-medium text-success"></i> Serve the people
                            with utmost sincerity, integrity, transparency, and courtesy.
                        </p>
                    </div>

                </div>
                <div class="col-lg-5 col-md-6 offset-md-1">
                    <div id="carouselExampleCaption2" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @php
                                $shuffled_data = collect($data->toArray())->shuffle();
                            @endphp
                            @if ($shuffled_data->isEmpty())
                            <!-- If no data, display the placeholder images -->
                            <div class="carousel-item active">
                                <img src="assets/images/small/small-1.jpg" alt="..."
                                    class="d-block img-fluid">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">First slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/small/small-3.jpg" alt="..."
                                    class="d-block img-fluid">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">Second slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/small/small-2.jpg" alt="..."
                                    class="d-block img-fluid">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3 class="text-white">Third slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        @else
                            <!-- If data is available, display the shuffled items -->
                            @foreach ($shuffled_data as $index => $animal)
                                @php
                                    // Decode the animal_images JSON string into an array
                                    $images = json_decode($animal['animal_images'], true);
                                    $firstImage = $images[0] ?? ''; // Get the first image URL (if exists)
                                @endphp

                                @if ($firstImage)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $firstImage) }}" alt="..."
                                            class="d-block img-fluid">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3 class="text-white">{{ $animal['dog_name'] }}</h3>
                                            <p>{{ $animal['description'] }}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaption2" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaption2" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- END FEATURES 2 -->

    <!-- START PRICING -->
    <section class="py-5 bg-light-lighten border-top border-bottom border-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="mt-0"><svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" x="0" y="0"
                                viewBox="0 0 300 300" style="enable-background:new 0 0 512 512" xml:space="preserve"
                                class="">
                                <g>
                                    <path
                                        d="M239.698 173.953c7.719 0 14-6.281 14-14s-6.281-14-14-14-14 6.281-14 14 6.281 14 14 14zm0-20c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6zM262.026 112.621a4.276 4.276 0 1 0 0-8.553 4.276 4.276 0 0 0 0 8.553zM53.542 62.115h.078a4.003 4.003 0 0 0 3.922-4.08l-.16-8a4.001 4.001 0 0 0-4-3.92h-.078a4.003 4.003 0 0 0-3.922 4.08l.16 8a4 4 0 0 0 4 3.92zM53.858 70.111h-.082a4.002 4.002 0 0 0-3.918 4.08l.16 7.998a4.001 4.001 0 0 0 4 3.92h.078a4.003 4.003 0 0 0 3.922-4.08l-.16-7.998a4.002 4.002 0 0 0-4-3.92zM45.698 69.953c2.211 0 4-1.791 4-4s-1.789-4-4-4h-8c-2.211 0-4 1.791-4 4s1.789 4 4 4zM61.698 69.953h.082l8-.16c2.207-.045 3.961-1.871 3.918-4.08s-1.809-3.811-4.082-3.92l-8 .16a4.001 4.001 0 0 0 .082 8zM102.589 42.6a4.276 4.276 0 1 0 0-8.552 4.276 4.276 0 0 0 0 8.552zM229.698 193.953h-156c-19.852 0-36 16.15-36 36s16.148 36 36 36h156c19.852 0 36-16.15 36-36s-16.149-36-36-36zm0 64h-156c-15.438 0-28-12.561-28-28s12.562-28 28-28h156c15.438 0 28 12.561 28 28s-12.563 28-28 28z"
                                        fill="#727cf5" opacity="1" data-original="#000000" class=""></path>
                                    <path
                                        d="M79.698 213.953h-10c-2.211 0-4 1.791-4 4v24c0 2.209 1.789 4 4 4h10c7.719 0 14-7.178 14-16s-6.281-16-14-16zm0 24h-6v-16h6c3.254 0 6 3.664 6 8s-2.746 8-6 8zM153.698 214.365c-2.211 0-4 1.791-4 4v10.564l-8.691-12.811a3.999 3.999 0 0 0-7.308 2.246v23.588c0 2.209 1.789 4 4 4s4-1.791 4-4v-10.564l8.691 12.811a4 4 0 0 0 7.309-2.246v-23.588a4 4 0 0 0-4.001-4zM179.042 216.371c-.668-1.539-2.262-2.52-3.891-2.412a3.998 3.998 0 0 0-3.609 2.818l-7.383 24a3.999 3.999 0 0 0 2.648 4.998c.391.121.789.18 1.176.18a4.005 4.005 0 0 0 3.824-2.826l4.184-13.605 6.031 14.012a4.005 4.005 0 0 0 5.258 2.092 4.005 4.005 0 0 0 2.094-5.256zM233.698 221.953c2.211 0 4-1.791 4-4s-1.789-4-4-4h-12c-2.211 0-4 1.791-4 4v24c0 2.209 1.789 4 4 4h12c2.211 0 4-1.791 4-4s-1.789-4-4-4h-8v-3.795h4c2.211 0 4-1.791 4-4s-1.789-4-4-4h-4v-4.205zM113.924 214.365c-7.625 0-13.828 6.203-13.828 13.828v3.932c0 7.625 6.203 13.828 13.828 13.828 7.629 0 13.832-6.203 13.832-13.828v-3.932c0-7.625-6.203-13.828-13.832-13.828zm5.832 17.76c0 3.213-2.617 5.828-5.832 5.828s-5.828-2.615-5.828-5.828v-3.932c0-3.213 2.613-5.828 5.828-5.828s5.832 2.615 5.832 5.828zM209.698 213.953h-16c-2.211 0-4 1.791-4 4s1.789 4 4 4h4v20c0 2.209 1.789 4 4 4s4-1.791 4-4v-20h4c2.211 0 4-1.791 4-4s-1.789-4-4-4zM132.991 115.377l-4.488 5.727c-4.027 5.135-8.945 9.453-13.66 13.357-6.113 5.062-8.863 12.791-7.355 20.674 1.605 8.393 8.316 15.139 16.695 16.789 8.367 1.645 16.629-1.564 21.594-8.379 1.273-1.752 3.488-2.799 5.922-2.799s4.648 1.045 5.926 2.799c4.109 5.639 10.465 8.805 17.266 8.805 1.457 0 2.938-.146 4.418-.443 8.109-1.631 14.734-8.146 16.488-16.211 1.727-7.943-1.035-16.066-7.203-21.201-3.281-2.725-7.07-6.02-10.332-9.791 0-.002 0-.002-.004-.002l-8.828-10.205a23.594 23.594 0 0 0-17.855-8.164c-7.303-.001-14.076 3.296-18.584 9.044zm6.297 4.936a15.516 15.516 0 0 1 12.285-5.98c4.535 0 8.84 1.967 11.809 5.398l8.828 10.205c3.641 4.211 7.738 7.777 11.266 10.709 3.926 3.268 5.609 8.258 4.5 13.352-1.086 5.008-5.203 9.053-10.246 10.066-5.285 1.072-10.512-.934-13.641-5.227-2.777-3.814-7.406-6.09-12.391-6.09s-9.617 2.277-12.387 6.09c-3.113 4.27-8.309 6.277-13.582 5.24-5.129-1.012-9.398-5.307-10.383-10.445-.953-4.973.766-9.836 4.598-13.008 5.059-4.188 10.359-8.854 14.855-14.584zM107.217 129.803c8.605 0 15.605-7 15.605-15.604s-7-15.602-15.605-15.602c-8.602 0-15.602 6.998-15.602 15.602s7.001 15.604 15.602 15.604zm0-23.205c4.195 0 7.605 3.41 7.605 7.602 0 4.193-3.41 7.604-7.605 7.604-4.191 0-7.602-3.41-7.602-7.604.001-4.192 3.411-7.602 7.602-7.602zM180.573 114.199c0 8.604 7 15.604 15.605 15.604 8.602 0 15.602-7 15.602-15.604s-7-15.602-15.602-15.602c-8.605.001-15.605 6.999-15.605 15.602zm15.605-7.601c4.191 0 7.602 3.41 7.602 7.602 0 4.193-3.41 7.604-7.602 7.604-4.195 0-7.605-3.41-7.605-7.604 0-4.192 3.41-7.602 7.605-7.602zM169.104 103.748c9.164 0 16.621-7.457 16.621-16.623s-7.457-16.623-16.621-16.623c-9.168 0-16.625 7.457-16.625 16.623s7.457 16.623 16.625 16.623zm0-25.246c4.754 0 8.621 3.869 8.621 8.623s-3.867 8.623-8.621 8.623-8.625-3.869-8.625-8.623 3.871-8.623 8.625-8.623zM134.292 103.748c9.168 0 16.625-7.457 16.625-16.623s-7.457-16.623-16.625-16.623c-9.164 0-16.621 7.457-16.621 16.623s7.456 16.623 16.621 16.623zm0-25.246c4.754 0 8.625 3.869 8.625 8.623s-3.871 8.623-8.625 8.623-8.621-3.869-8.621-8.623 3.867-8.623 8.621-8.623z"
                                        fill="#727cf5" opacity="1" data-original="#000000" class=""></path>
                                </g>
                            </svg></h1>
                        <h3>How you can <span class="text-primary">help </span>us:</h3>
                        <p class="text-muted mt-2">Reminder: We do not accept Cash Donation
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-3 pt-3">
                <div class="col-md-6">
                    <div class="card card-pricing h-100">
                        <div class="card-body text-center">
                            <p class="card-pricing-plan-name fw-bold text-uppercase">Medical Care and Rehabilitation
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="90" height="90" x="0" y="0"
                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"
                                class="">
                                <g>
                                    <path
                                        d="M504.485 320.134c0-79.685-68.186-144.282-152.297-144.282S199.89 240.45 199.89 320.134s68.186 144.282 152.297 144.282c12.281 0 24.218-1.387 35.658-3.987l68.546 44.065-21.139-63.418c41.678-25.744 69.233-70.292 69.233-120.942z"
                                        style="" fill="#75e0f1" data-original="#75e0f1" class=""></path>
                                    <path
                                        d="M504.485 320.134c0-33.405-11.988-64.155-32.105-88.61 10.279 19.427 16.073 41.352 16.073 64.563 0 79.685-68.186 144.282-152.297 144.282-48.85 0-92.324-21.793-120.194-55.672 25.01 47.268 76.613 79.719 136.225 79.719 12.281 0 24.218-1.387 35.658-3.987l68.546 44.065-21.139-63.418c41.678-25.744 69.233-70.292 69.233-120.942z"
                                        style="" fill="#3dc9d9" data-original="#3dc9d9"></path>
                                    <path
                                        d="M298.082 370.232c0-29.881 24.224-54.106 54.106-54.106s54.106 24.224 54.106 54.106c0 29.881-24.224 42.082-54.106 42.082s-54.106-12.201-54.106-42.082zM304.094 280.056c0-9.96 8.075-24.047 18.035-24.047s18.035 14.086 18.035 24.047c0 9.96-8.075 18.035-18.035 18.035s-18.035-8.075-18.035-18.035zM364.211 280.056c0-9.96 8.075-24.047 18.035-24.047s18.035 14.086 18.035 24.047c0 9.96-8.075 18.035-18.035 18.035s-18.035-8.075-18.035-18.035zM412.305 316.126c0-9.96 8.075-24.047 18.035-24.047s18.035 14.087 18.035 24.047-8.075 18.035-18.035 18.035c-9.96.001-18.035-8.074-18.035-18.035zM256 316.126c0-9.96 8.075-24.047 18.035-24.047s18.035 14.087 18.035 24.047-8.075 18.035-18.035 18.035c-9.96.001-18.035-8.074-18.035-18.035z"
                                        style="" fill="#ffffff" data-original="#ffffff"></path>
                                    <path
                                        d="M7.515 151.805C7.515 72.12 75.701 7.523 159.812 7.523S312.11 72.121 312.11 151.805s-68.186 144.282-152.297 144.282a160.763 160.763 0 0 1-35.658-3.987l-68.546 44.065 21.139-63.418C35.069 247.003 7.515 202.455 7.515 151.805z"
                                        style="" fill="#aed45b" data-original="#aed45b"></path>
                                    <path
                                        d="M257.656 41.247c19.092 24.104 30.406 54.056 30.406 86.512 0 79.685-68.186 144.282-152.297 144.282-37.221 0-71.316-12.656-97.771-33.665 10.694 13.481 23.809 25.14 38.754 34.371l-21.139 63.419 68.546-44.065a160.756 160.756 0 0 0 35.658 3.987c84.111 0 152.297-64.597 152.297-144.282 0-44.391-21.168-84.093-54.454-110.559z"
                                        style="" fill="#9ac932" data-original="#9ac932"></path>
                                    <path
                                        d="M231.953 127.758h-48.094V79.665h-48.094v48.093H87.671v48.094h48.094v48.094h48.094v-48.094h48.094z"
                                        style="" fill="#ffffff" data-original="#ffffff"></path>
                                    <path
                                        d="M512 320.134c0-83.701-71.692-151.796-159.812-151.796a168.78 168.78 0 0 0-33.95 3.455 145.004 145.004 0 0 0 1.387-19.987c0-42.44-18.899-83.236-51.851-111.926a7.515 7.515 0 0 0-9.87 11.334c29.672 25.834 46.691 62.499 46.691 100.591 0 75.414-64.949 136.767-144.783 136.767a153.57 153.57 0 0 1-33.993-3.799 7.506 7.506 0 0 0-5.729 1.007l-50.611 32.536 14.397-43.19a7.515 7.515 0 0 0-3.18-8.77c-41.117-25.4-65.666-68.221-65.666-114.55 0-75.414 64.949-136.767 144.783-136.767 24.164 0 48.078 5.734 69.156 16.581a7.515 7.515 0 0 0 6.878-13.364C212.649 6.318 186.358.009 159.812.009 71.692.009 0 68.105 0 151.805c0 49.654 25.219 95.622 67.773 124.103l-19.294 57.88c-.93 2.788-.108 5.948 2.064 7.927 2.489 2.268 6.294 2.592 9.128.77l65.928-42.382a168.823 168.823 0 0 0 34.213 3.497c11.648 0 23.005-1.2 33.951-3.46a145.911 145.911 0 0 0-1.388 19.992c0 83.701 71.692 151.796 159.812 151.796 11.514 0 23.007-1.175 34.212-3.497l65.929 42.382c2.834 1.823 6.64 1.498 9.129-.77 2.173-1.981 2.994-5.139 2.064-7.927l-19.294-57.881C486.781 415.754 512 369.787 512 320.134zm-80.697 114.549a7.516 7.516 0 0 0-3.18 8.77l14.397 43.19-50.612-32.536a7.515 7.515 0 0 0-5.729-1.007 153.541 153.541 0 0 1-33.992 3.799c-79.834 0-144.783-61.353-144.783-136.767 0-8.098.763-16.195 2.25-24.101 51.973-16.246 92.247-57.172 105.386-108.112a153.247 153.247 0 0 1 37.146-4.553c79.834 0 144.783 61.353 144.783 136.767.002 46.329-24.547 89.15-65.666 114.55z"
                                        fill="#000000" opacity="1" data-original="#000000"></path>
                                    <path
                                        d="M352.188 308.612c-33.977 0-61.62 27.643-61.62 61.62 0 31.056 23.035 49.597 61.62 49.597s61.62-18.541 61.62-49.597c0-33.977-27.643-61.62-61.62-61.62zm0 96.188c-17.4 0-46.591-4.491-46.591-34.568 0-25.691 20.9-46.591 46.591-46.591s46.591 20.9 46.591 46.591c0 30.076-29.191 34.568-46.591 34.568zM322.129 305.606c14.089 0 25.55-11.461 25.55-25.55 0-12.565-10.191-31.562-25.55-31.562s-25.55 18.997-25.55 31.562c0 14.087 11.462 25.55 25.55 25.55zm0-42.082c4.523 0 10.521 9.424 10.521 16.532 0 5.801-4.719 10.521-10.521 10.521s-10.521-4.719-10.521-10.521c.001-7.108 5.998-16.532 10.521-16.532zM382.247 305.606c14.089 0 25.55-11.461 25.55-25.55 0-12.565-10.191-31.562-25.55-31.562s-25.55 18.997-25.55 31.562c0 14.087 11.461 25.55 25.55 25.55zm0-42.082c4.523 0 10.521 9.424 10.521 16.532 0 5.801-4.719 10.521-10.521 10.521-5.801 0-10.521-4.719-10.521-10.521 0-7.108 5.998-16.532 10.521-16.532zM430.341 284.565c-15.359 0-25.55 18.997-25.55 31.562 0 14.089 11.461 25.55 25.55 25.55s25.55-11.461 25.55-25.55c-.001-12.565-10.191-31.562-25.55-31.562zm0 42.082c-5.801 0-10.521-4.719-10.521-10.521 0-7.108 5.998-16.532 10.521-16.532 4.523 0 10.521 9.424 10.521 16.532-.001 5.802-4.72 10.521-10.521 10.521zM299.585 316.126c0-12.565-10.191-31.562-25.55-31.562s-25.55 18.997-25.55 31.562c0 14.089 11.461 25.55 25.55 25.55s25.55-11.462 25.55-25.55zm-25.55 10.521c-5.801 0-10.521-4.719-10.521-10.521 0-7.108 5.998-16.532 10.521-16.532 4.523 0 10.521 9.424 10.521 16.532 0 5.802-4.719 10.521-10.521 10.521zM135.765 231.461h48.094a7.514 7.514 0 0 0 7.515-7.515v-40.579h40.579a7.514 7.514 0 0 0 7.515-7.515v-48.094a7.514 7.514 0 0 0-7.515-7.515h-40.579V79.665a7.514 7.514 0 0 0-7.515-7.515h-48.094a7.514 7.514 0 0 0-7.515 7.515v40.579H87.671a7.514 7.514 0 0 0-7.515 7.515v48.094a7.514 7.514 0 0 0 7.515 7.515h40.579v40.579a7.515 7.515 0 0 0 7.515 7.514zm-40.579-63.123v-33.065h40.579a7.514 7.514 0 0 0 7.515-7.515V87.179h33.065v40.579a7.514 7.514 0 0 0 7.515 7.515h40.579v33.065H183.86a7.514 7.514 0 0 0-7.515 7.515v40.579H143.28v-40.579a7.514 7.514 0 0 0-7.515-7.515H95.186z"
                                        fill="#000000" opacity="1" data-original="#000000"></path>
                                </g>
                            </svg>
                            <ul class="card-pricing-features">
                                <li>Provide essential vaccinations to protect against diseases.
                                </li>
                                <li>Cover costs for surgeries, treatments, and emergency medical care.</li>
                                <li>Support rehabilitation for injured or abused dogs to ensure full recovery.
                                </li>
                                <li>Offer ongoing health check-ups and preventative care.
                                </li>
                                <li>Ensure dogs are healthy and ready for adoption into loving <br>homes.

                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end Pricing_card -->
                </div>
                <!-- end col -->

                <div class="col-md-6 ">
                    <div class="card card-pricing h-100">
                        <div class="card-body text-center">
                            <p class="card-pricing-plan-name fw-bold text-uppercase">Shelter and Daily Care</p>
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="90" height="90" x="0" y="0"
                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"
                                class="">
                                <g>
                                    <path
                                        d="M267.246 60.787c-3.342-2.227-7.23-3.403-11.246-3.403s-7.904 1.177-11.246 3.403L49.487 190.869v264.272h413.027V190.869L267.246 60.787z"
                                        style="" fill="#eaf9fa" data-original="#eaf9fa" class=""></path>
                                    <path
                                        d="M433 171.208v244.549c0 5.523-4.477 10-10 10H49.487v29.384h413.027V190.869L433 171.208z"
                                        style="" fill="#d4f2f6" data-original="#d4f2f6" class=""></path>
                                    <path
                                        d="M256 190.976c-71.625 0-129.896 58.271-129.896 129.896v134.269h259.792V320.872c0-71.625-58.271-129.896-129.896-129.896z"
                                        style="" fill="#a6e7f0" data-original="#a6e7f0"></path>
                                    <path
                                        d="M256 219.391c-56.047 0-101.481 45.435-101.481 101.481V455.14h202.963V320.872c-.001-56.046-45.435-101.481-101.482-101.481z"
                                        style="" fill="#6bd9e7" data-original="#6bd9e7"></path>
                                    <path
                                        d="M256 219.391c-5.014 0-9.941.37-14.759 1.072 49.05 7.148 86.722 49.376 86.722 100.409V455.14h29.519V320.872c-.001-56.046-45.435-101.481-101.482-101.481z"
                                        style="" fill="#2ed1e2" data-original="#2ed1e2"></path>
                                    <path
                                        d="M474.521 200.07 266.692 61.619a19.284 19.284 0 0 0-21.384 0L37.479 200.07c-8.864 5.905-20.836 3.506-26.741-5.358-5.905-8.864-3.506-20.837 5.358-26.741L245.308 15.275a19.282 19.282 0 0 1 21.383 0l229.213 152.696c8.864 5.905 11.263 17.878 5.358 26.741-5.904 8.864-17.877 11.263-26.741 5.358z"
                                        style="" fill="#fe646f" data-original="#fe646f" class=""></path>
                                    <path
                                        d="M495.905 167.971 266.692 15.275a19.282 19.282 0 0 0-21.383 0l-7.058 4.702 222.155 147.994c8.752 5.831 11.186 17.572 5.561 26.4l8.555 5.699c8.864 5.905 20.836 3.506 26.741-5.358 5.905-8.864 3.506-20.836-5.358-26.741z"
                                        style="" fill="#fd4755" data-original="#fd4755" class=""></path>
                                    <path
                                        d="M186.204 455.141V334.877c0-12.216-9.903-22.119-22.119-22.119-20.977 0-37.981 17.005-37.981 37.981v104.402h60.1z"
                                        style="" fill="#bb5d4c" data-original="#bb5d4c"></path>
                                    <path
                                        d="M186.204 455.141V334.877c0-12.216-9.903-22.119-22.119-22.119-20.977 0-37.981 17.005-37.981 37.981v104.402h60.1z"
                                        style="" fill="#bb5d4c" data-original="#bb5d4c"></path>
                                    <path d="M126.104 425.757h60.101v29.384h-60.101z" style="" fill="#a44f3e"
                                        data-original="#a44f3e"></path>
                                    <path
                                        d="M385.896 455.141V350.739c0-20.976-17.005-37.981-37.981-37.981-12.216 0-22.119 9.903-22.119 22.119V455.14h60.1z"
                                        style="" fill="#bb5d4c" data-original="#bb5d4c"></path>
                                    <path d="M325.795 425.757h60.101v29.384h-60.101z" style="" fill="#a44f3e"
                                        data-original="#a44f3e"></path>
                                    <path
                                        d="m192.962 454.165 1.7.976h122.677l1.7-.976c15.409 0 28.017-12.608 28.017-28.017 0-8.786-4.1-16.66-10.48-21.805-6.688-5.393-10.779-13.358-10.779-21.95v-47.516c0-6.971 3.232-13.179 8.27-17.234-3.009-6.173-7.787-11.448-13.937-14.998l-10.406-6.008c-33.244-19.192-74.201-19.192-107.444 0l-10.406 6.008c-6.15 3.551-10.928 8.826-13.937 14.998 5.039 4.054 8.271 10.263 8.271 17.234v47.516c0 8.591-4.091 16.557-10.779 21.95-6.381 5.145-10.48 13.019-10.48 21.805-.004 15.409 12.604 28.017 28.013 28.017z"
                                        style="" fill="#c96e59" data-original="#c96e59"></path>
                                    <path
                                        d="M347.055 426.148c0-.131-.01-.26-.011-.391H164.957c-.002.131-.011.26-.011.391 0 15.409 12.608 28.017 28.017 28.017l1.7.976H317.34l1.7-.976c15.407 0 28.015-12.608 28.015-28.017z"
                                        style="" fill="#bb5d4c" data-original="#bb5d4c"></path>
                                    <path
                                        d="M304.566 455.141a49.278 49.278 0 0 0 1.101-10.335v-13.638c0-27.276-22.316-49.592-49.592-49.592s-49.592 22.316-49.592 49.592v13.638c0 3.543.386 6.998 1.101 10.335h96.982z"
                                        style="" fill="#ffbd86" data-original="#ffbd86"></path>
                                    <path
                                        d="M305.666 431.168c0-1.828-.108-3.632-.303-5.411h-98.578a49.609 49.609 0 0 0-.303 5.411v13.638c0 3.542.386 6.998 1.101 10.335h96.983a49.278 49.278 0 0 0 1.1-10.335v-13.638z"
                                        style="" fill="#f6a96c" data-original="#f6a96c"></path>
                                    <path
                                        d="M261.966 413.413h-11.783c-8.633 0-15.697-7.064-15.697-15.697v-.443c0-8.633 7.064-15.697 15.697-15.697h11.783c8.633 0 15.697 7.064 15.697 15.697v.443c0 8.633-7.064 15.697-15.697 15.697z"
                                        style="" fill="#766e6e" data-original="#766e6e"></path>
                                    <path
                                        d="M262.945 381.625c.024.356.055.71.055 1.072v.443c0 8.633-7.064 15.697-15.697 15.697h-12.76c.582 8.113 7.385 14.576 15.64 14.576h11.783c8.633 0 15.697-7.064 15.697-15.697v-.443c0-8.303-6.538-15.135-14.718-15.648z"
                                        style="" fill="#5b5555" data-original="#5b5555"></path>
                                    <path
                                        d="M494.287 499.961H17.713c-5.641 0-10.213-4.573-10.213-10.213v-25.409c0-5.641 4.573-10.213 10.213-10.213h476.574c5.641 0 10.213 4.573 10.213 10.213v25.409c0 5.64-4.573 10.213-10.213 10.213z"
                                        style="" fill="#a6e7f0" data-original="#a6e7f0"></path>
                                    <path
                                        d="M494.287 454.126H469v13.497c0 5.641-4.573 10.213-10.213 10.213H7.5v11.912c0 5.641 4.573 10.213 10.213 10.213h476.574c5.641 0 10.213-4.573 10.213-10.213v-25.409c0-5.641-4.573-10.213-10.213-10.213z"
                                        style="" fill="#6bd9e7" data-original="#6bd9e7"></path>
                                    <circle cx="256" cy="179.766" r="67.993" style="" fill="#ffd15b"
                                        data-original="#ffd15b"></circle>
                                    <path
                                        d="M257.623 111.815C279.247 123.197 294 145.873 294 172.007 294 209.559 263.559 240 226.008 240c-.545 0-1.082-.028-1.624-.041a67.68 67.68 0 0 0 31.616 7.8c37.551 0 67.992-30.441 67.992-67.992 0-37.007-29.57-67.087-66.369-67.952z"
                                        style="" fill="#ffc344" data-original="#ffc344" class=""></path>
                                    <path
                                        d="M275.516 189.106c-2.458-2.01-4.406-4.58-5.508-7.558-2.106-5.695-7.582-9.754-14.009-9.754s-11.903 4.06-14.009 9.754c-1.101 2.978-3.05 5.548-5.508 7.558a14.9 14.9 0 0 0-5.486 11.701c.073 8.011 6.575 14.609 14.584 14.792a14.943 14.943 0 0 0 4.876-.694 18.263 18.263 0 0 1 11.083 0c1.533.487 3.173.733 4.876.694 8.009-.183 14.512-6.781 14.584-14.792a14.884 14.884 0 0 0-5.483-11.701z"
                                        style="" fill="#c96e59" data-original="#c96e59"></path>
                                    <path
                                        d="M275.516 189.106c-2.458-2.01-4.406-4.58-5.507-7.558a14.948 14.948 0 0 0-11.224-9.484 28.545 28.545 0 0 1 6.224 17.829c0 10.781-5.952 20.168-14.747 25.066.065-.02.132-.033.196-.054a18.263 18.263 0 0 1 11.083 0c1.533.487 3.173.733 4.876.694 8.009-.183 14.512-6.781 14.584-14.792a14.892 14.892 0 0 0-5.485-11.701z"
                                        style="" fill="#bb5d4c" data-original="#bb5d4c"></path>
                                    <path
                                        d="M193.67 206.938c-40.233 22.098-67.566 64.883-67.566 113.934v133.254h259.792V320.872c0-49.052-27.333-91.836-67.566-113.934"
                                        style="stroke-width:15;stroke-linejoin:round;stroke-miterlimit:10;"
                                        fill="none" stroke="#000000" stroke-width="15" stroke-linejoin="round"
                                        stroke-miterlimit="10" data-original="#000000" class=""></path>
                                    <path
                                        d="M229.874 343.574v7.917M282.126 343.574v7.917M243.229 143.929v4.644M268.771 143.929v4.644M219.427 161.345v4.644M292.573 161.345v4.644M275.516 189.106c-2.458-2.01-4.406-4.58-5.508-7.558-2.106-5.695-7.582-9.754-14.009-9.754s-11.903 4.06-14.009 9.754c-1.101 2.978-3.05 5.548-5.508 7.558a14.9 14.9 0 0 0-5.486 11.701c.073 8.011 6.575 14.609 14.584 14.792a14.943 14.943 0 0 0 4.876-.694 18.263 18.263 0 0 1 11.083 0c1.533.487 3.173.733 4.876.694 8.009-.183 14.512-6.781 14.584-14.792a14.884 14.884 0 0 0-5.483-11.701z"
                                        style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"
                                        fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"
                                        class=""></path>
                                    <circle cx="256" cy="179.766" r="67.993"
                                        style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"
                                        fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"
                                        class=""></circle>
                                    <path
                                        d="M261.966 413.413h-11.783c-8.633 0-15.697-7.064-15.697-15.697v-.443c0-8.633 7.064-15.697 15.697-15.697h11.783c8.633 0 15.697 7.064 15.697 15.697v.443c0 8.633-7.064 15.697-15.697 15.697z"
                                        style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"
                                        fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"
                                        class=""></path>
                                    <path
                                        d="M242.955 383.362c-20.961 5.79-36.473 25.069-36.473 47.806v13.638c0 3.186.327 6.297.91 9.32h97.364c.583-3.023.91-6.134.91-9.32v-13.638c0-22.737-15.513-42.015-36.473-47.806M494.287 499.961H17.713c-5.641 0-10.213-4.573-10.213-10.213v-25.409c0-5.641 4.573-10.213 10.213-10.213h476.574c5.641 0 10.213 4.573 10.213 10.213v25.409c0 5.64-4.573 10.213-10.213 10.213zM177.937 317.638a22.024 22.024 0 0 0-13.852-4.88c-20.976 0-37.981 17.005-37.981 37.981v103.386M385.896 454.126V350.739c0-20.976-17.005-37.981-37.981-37.981-12.216 0-22.119 9.903-22.119 22.119"
                                        style="stroke-width:15;stroke-linejoin:round;stroke-miterlimit:10;"
                                        fill="none" stroke="#000000" stroke-width="15" stroke-linejoin="round"
                                        stroke-miterlimit="10" data-original="#000000" class=""></path>
                                    <path
                                        d="M319.038 454.165c15.409 0 28.017-12.608 28.017-28.017 0-8.786-4.1-16.66-10.48-21.805-6.688-5.393-10.779-13.358-10.779-21.95v-47.516c0-6.971 3.232-13.179 8.27-17.234-3.009-6.173-7.787-11.448-13.937-14.998l-10.406-6.008c-33.244-19.192-74.201-19.192-107.444 0l-10.406 6.008c-6.15 3.551-10.928 8.826-13.937 14.998 5.039 4.054 8.271 10.263 8.271 17.234v47.516c0 8.591-4.091 16.557-10.779 21.95-6.381 5.145-10.48 13.019-10.48 21.805 0 15.409 12.607 28.017 28.017 28.017M357.239 313.915c-2.484-36.677-24.451-68.004-55.638-83.719M210.399 230.196c-31.188 15.715-53.154 47.043-55.638 83.719"
                                        style="stroke-width:15;stroke-linejoin:round;stroke-miterlimit:10;"
                                        fill="none" stroke="#000000" stroke-width="15" stroke-linejoin="round"
                                        stroke-miterlimit="10" data-original="#000000" class=""></path>
                                    <path
                                        d="M129.266 92.579 16.095 167.971c-8.864 5.905-11.263 17.878-5.358 26.742s17.877 11.263 26.741 5.358l207.83-138.452a19.284 19.284 0 0 1 21.384 0L474.521 200.07c8.864 5.905 20.836 3.506 26.741-5.358 5.905-8.864 3.506-20.837-5.358-26.742L266.692 15.275a19.282 19.282 0 0 0-21.383 0l-86.854 57.86M49.487 330v124.126h413.026V419M462.513 384V192.071M49.487 192.071V295"
                                        style="stroke-width:15;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;"
                                        fill="none" stroke="#000000" stroke-width="15" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-miterlimit="10" data-original="#000000"
                                        class=""></path>
                                </g>
                            </svg>
                            <ul class="card-pricing-features">
                                <li>Supply nutritious food to maintain the dogs' health and energy.
                                </li>
                                <li>Provide clean and comfortable bedding for rest and recovery.
                                </li>
                                <li>Maintain safe, sanitary shelter conditions to prevent illness.
                                </li>
                                <li>Cover utility costs for heating, cooling, and water in the shelter.
                                </li>
                                <li>Offer enrichment activities and toys to improve dogs’ <br>well-being while they
                                    await
                                    adoption.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- end Pricing_card -->
                </div>
                <!-- end col -->

            </div>

        </div>
    </section>
    <!-- END PRICING -->


    <!-- START CONTACT -->
    <section class="py-5 bg-light-lighten border-top border-bottom border-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h3><span class="text-primary">About</span> us</h3>
                        <p class="text-muted mt-2"> For more information please contact us.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col-md-4">
                    <p class="text-muted"><span class="fw-bold">Customer Support:</span><br> <span
                            class="d-block mt-1">+1 234 56 7894</span></p>
                    <p class="text-muted mt-4"><span class="fw-bold">Email Address:</span><br> <span
                            class="d-block mt-1">info@gmail.com</span></p>
                    <p class="text-muted mt-4"><span class="fw-bold">Office Address:</span><br> <span
                            class="d-block mt-1">4461 Cedar Street Moro, AR 72368</span></p>
                    <p class="text-muted mt-4"><span class="fw-bold">Office Time:</span><br> <span
                            class="d-block mt-1">9:00AM To 6:00PM</span></p>
                </div>

                <div class="col-md-7">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1535.241857099605!2d121.00039165144975!3d14.871589059077712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397a9435a2e096f%3A0x1dff22aaf74463ba!2sPulong%20Buhangin%20Youth%20Band!5e0!3m2!1sen!2sph!4v1726316707307!5m2!1sen!2sph"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTACT -->

    <!-- START FOOTER -->
    <footer class="bg-dark py-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <p class="text-light text-opacity-50 mt-2 text-center mb-0">© 2024 -
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Paws Haven .
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <div id="primary-header-modal" class="modal fade " tabindex="-1" role="dialog"
        aria-labelledby="primary-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="card">
                    <!-- Logo -->
                    <div class="card-header  text-center bg-white  " style="border-radius: 0 !important">
                        <a href="{{ url('/home') }}">
                            <span>
                                <img src="assets/logo2.png" alt="logo" height="100%">
                            </span>
                        </a>
                    </div>

                    <div class="card-body p-2">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                            <p class="text-muted mb-4">Enter your email address and password to access website</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                {{-- <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your
                                        password?</small></a> --}}
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-primary" type="submit"> Log In </button>
                            </div>

                        </form>
                        <div class="text-center mt-4">
                            <p class="text-muted font-16">Sign in with</p>
                            <ul class="social-list list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="{{ route('google-auth') }}" class=" text-danger"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25"
                                            x="0" y="0" viewBox="0 0 512 512"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve"
                                            class="">
                                            <g>
                                                <path fill="#0085f7"
                                                    d="M34.909 448.047h81.455V250.229l-53.338-93.138L0 162.956v250.182c0 19.287 15.622 34.909 34.909 34.909z"
                                                    opacity="1" data-original="#0085f7"></path>
                                                <path fill="#00a94b"
                                                    d="M395.636 448.047h81.455c19.287 0 34.909-15.622 34.909-34.909V162.956l-62.935-5.865-53.428 93.138v197.818z"
                                                    opacity="1" data-original="#00a94b"></path>
                                                <path fill="#ffbc00"
                                                    d="m395.636 98.956-47.847 91.303 47.847 59.97L512 162.956v-46.545c0-43.142-49.251-67.782-83.782-41.891z"
                                                    opacity="1" data-original="#ffbc00" class=""></path>
                                                <path fill="#ff4131" fill-rule="evenodd"
                                                    d="m116.364 250.229-45.593-96.31 45.593-54.963L256 203.683 395.636 98.956v151.273L256 354.956z"
                                                    clip-rule="evenodd" opacity="1" data-original="#ff4131"
                                                    class=""></path>
                                                <path fill="#e51c19"
                                                    d="M0 116.411v46.545l116.364 87.273V98.956L83.782 74.52C49.251 48.629 0 73.269 0 116.411z"
                                                    opacity="1" data-original="#e51c19"></path>
                                            </g>
                                        </svg></a>
                                </li>

                            </ul>
                        </div>
                    </div> <!-- end card-body -->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- END FOOTER -->
    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>
    <script>
        var chartConfig = {
            type: 'organizational down',
            defaultTooltip_enabled: false,
            defaultPoint: {
                outline_width: 4,
                connectorLine_width: 5,
                color: 'transparent',
                focusGlow: false,
                annotation: {
                    padding: 18,
                    margin: [15, 5, 10, 0],
                    corners: [
                        'cut',
                        'square',
                        'cut',
                        'square'
                    ],
                    label: {
                        autoWrap: false,
                        style_fontWeight: 'normal',
                        text: '<br><span style="font-size:14px; color: white;"><b>%position</b><br>%name</span>'
                    }
                },
            },
            series: [{
                points: [{
                        name: 'Head of office: Arnel M. Garcia DV',
                        id: 'gm',
                        photo: '',
                        attributes: {
                            position: 'MUNICIPAL NURSERY AND DOG POUND',
                            people: '',
                            tasks: '',
                            progress: ''
                        },
                        tooltip: '',
                        annotation_label_text: ' <img src="{{ asset('assets/images/picture.PNG') }}" width="150" height="150"  margin-top:4px;"><br><br><span style="font-size:14px; color: white;"><b>%position</b><br>%name</span>'
                    },
                    {
                        name: 'Laborer 1',
                        id: 'seo',
                        parent: 'gm',
                        attributes: {
                            position: 'LUISITO DC. HERNANDEZ',
                            people: 6,
                            tasks: 4,
                            progress: 41
                        }
                    },
                    {
                        name: 'Laborer 1',
                        id: 'dev',
                        parent: 'gm',
                        attributes: {
                            position: 'JC LITO HERNANDEZ',
                            people: 6,
                            tasks: 6,
                            progress: 27
                        }
                    },
                    {
                        name: 'Laborer 1',
                        id: 'ft2',
                        parent: 'gm',
                        attributes: {
                            position: 'MYRIAM DG. NAVARRO',
                            people: 7,
                            tasks: 2,
                            progress: 30
                        }
                    },
                    {
                        name: 'Laborer 1',
                        id: 'ft',
                        parent: 'gm',
                        attributes: {
                            position: 'NENA R. FABABIER',
                            people: 7,
                            tasks: 2,
                            progress: 30
                        }
                    }
                ]
            }],
            box_fill: 'transparent',
            height: '400px',
        };

        var chart = JSC.chart('chartDiv', chartConfig);
    </script>
    <!-- App js     -->
    <script src="assets/js/app.min.js"></script>
    <script>
        var errorMessage = @json(session('error'));
        var validationErrors = @json($errors->toArray());
        if (Object.keys(validationErrors).length > 0) {
            if (validationErrors.is_register) {
                var modalElement = document.getElementById('primary-header-modal');
                var modal = new bootstrap.Modal(modalElement);
                modal.show();
                document.getElementById('regtab').click();
            } else {
                var modalElement = document.getElementById('primary-header-modal');
                var modal = new bootstrap.Modal(modalElement);
                modal.show();
            }
        }
        if (errorMessage) {
            var modalElement = document.getElementById('primary-header-modal');
            var modal = new bootstrap.Modal(modalElement);
            modal.show();
        }
    </script>
</body>

</html>
