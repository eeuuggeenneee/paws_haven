<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Paws Haven</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="icon_logo.png" type="image/png">

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
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark">
        <div class="container">

 


            <div class="collapse navbar-collapse" id="navbarNavDropdown">

            </div>
        </div>
    </nav>

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
                            class="btn btn-lg font-16 btn-success">Log in <i class="mdi mdi-arrow-right ms-1"></i></a>

                    </div>
                </div>
                <div class="col-md-5 offset-md-2">
                    <div class="text-md-end mt-3 mt-md-0">
                        <img src="assets/images/dogfound.png" alt="" class="img-fluid responsive-img" style="max-width: 100%; height: auto;" />

                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="mt-0"><i class="mdi mdi-heart-multiple-outline" style="color: #0396a6"></i></h1>
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
                                @foreach ($shuffled_data1 as $index => $animal)
                                    @php
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

            <div class="row pb-3 align-items-center">
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

                    <a class="btn btn-info rounded-pill mt-3 mb-4" data-bs-toggle="modal"
                        data-bs-target="#primary-header-modal">View Dog <i class="mdi mdi-arrow-right ms-1"></i></a>

                </div>
                <div class="col-lg-5 col-md-6 offset-md-1">
                    <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @php
                                $shuffled_data = collect($data->toArray())->shuffle();
                            @endphp
                            @if ($shuffled_data->isEmpty())
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
                                @foreach ($shuffled_data as $index => $animal)
                                    @php
                                        $images = json_decode($animal['animal_images'], true);
                                        $firstImage = $images[0] ?? '';
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
            </div>

        </div>
    </section>

  
 
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
                                        fill="#0396a6" opacity="1" data-original="#000000" class=""></path>
                                    <path
                                        d="M79.698 213.953h-10c-2.211 0-4 1.791-4 4v24c0 2.209 1.789 4 4 4h10c7.719 0 14-7.178 14-16s-6.281-16-14-16zm0 24h-6v-16h6c3.254 0 6 3.664 6 8s-2.746 8-6 8zM153.698 214.365c-2.211 0-4 1.791-4 4v10.564l-8.691-12.811a3.999 3.999 0 0 0-7.308 2.246v23.588c0 2.209 1.789 4 4 4s4-1.791 4-4v-10.564l8.691 12.811a4 4 0 0 0 7.309-2.246v-23.588a4 4 0 0 0-4.001-4zM179.042 216.371c-.668-1.539-2.262-2.52-3.891-2.412a3.998 3.998 0 0 0-3.609 2.818l-7.383 24a3.999 3.999 0 0 0 2.648 4.998c.391.121.789.18 1.176.18a4.005 4.005 0 0 0 3.824-2.826l4.184-13.605 6.031 14.012a4.005 4.005 0 0 0 5.258 2.092 4.005 4.005 0 0 0 2.094-5.256zM233.698 221.953c2.211 0 4-1.791 4-4s-1.789-4-4-4h-12c-2.211 0-4 1.791-4 4v24c0 2.209 1.789 4 4 4h12c2.211 0 4-1.791 4-4s-1.789-4-4-4h-8v-3.795h4c2.211 0 4-1.791 4-4s-1.789-4-4-4h-4v-4.205zM113.924 214.365c-7.625 0-13.828 6.203-13.828 13.828v3.932c0 7.625 6.203 13.828 13.828 13.828 7.629 0 13.832-6.203 13.832-13.828v-3.932c0-7.625-6.203-13.828-13.832-13.828zm5.832 17.76c0 3.213-2.617 5.828-5.832 5.828s-5.828-2.615-5.828-5.828v-3.932c0-3.213 2.613-5.828 5.828-5.828s5.832 2.615 5.832 5.828zM209.698 213.953h-16c-2.211 0-4 1.791-4 4s1.789 4 4 4h4v20c0 2.209 1.789 4 4 4s4-1.791 4-4v-20h4c2.211 0 4-1.791 4-4s-1.789-4-4-4zM132.991 115.377l-4.488 5.727c-4.027 5.135-8.945 9.453-13.66 13.357-6.113 5.062-8.863 12.791-7.355 20.674 1.605 8.393 8.316 15.139 16.695 16.789 8.367 1.645 16.629-1.564 21.594-8.379 1.273-1.752 3.488-2.799 5.922-2.799s4.648 1.045 5.926 2.799c4.109 5.639 10.465 8.805 17.266 8.805 1.457 0 2.938-.146 4.418-.443 8.109-1.631 14.734-8.146 16.488-16.211 1.727-7.943-1.035-16.066-7.203-21.201-3.281-2.725-7.07-6.02-10.332-9.791 0-.002 0-.002-.004-.002l-8.828-10.205a23.594 23.594 0 0 0-17.855-8.164c-7.303-.001-14.076 3.296-18.584 9.044zm6.297 4.936a15.516 15.516 0 0 1 12.285-5.98c4.535 0 8.84 1.967 11.809 5.398l8.828 10.205c3.641 4.211 7.738 7.777 11.266 10.709 3.926 3.268 5.609 8.258 4.5 13.352-1.086 5.008-5.203 9.053-10.246 10.066-5.285 1.072-10.512-.934-13.641-5.227-2.777-3.814-7.406-6.09-12.391-6.09s-9.617 2.277-12.387 6.09c-3.113 4.27-8.309 6.277-13.582 5.24-5.129-1.012-9.398-5.307-10.383-10.445-.953-4.973.766-9.836 4.598-13.008 5.059-4.188 10.359-8.854 14.855-14.584zM107.217 129.803c8.605 0 15.605-7 15.605-15.604s-7-15.602-15.605-15.602c-8.602 0-15.602 6.998-15.602 15.602s7.001 15.604 15.602 15.604zm0-23.205c4.195 0 7.605 3.41 7.605 7.602 0 4.193-3.41 7.604-7.605 7.604-4.191 0-7.602-3.41-7.602-7.604.001-4.192 3.411-7.602 7.602-7.602zM180.573 114.199c0 8.604 7 15.604 15.605 15.604 8.602 0 15.602-7 15.602-15.604s-7-15.602-15.602-15.602c-8.605.001-15.605 6.999-15.605 15.602zm15.605-7.601c4.191 0 7.602 3.41 7.602 7.602 0 4.193-3.41 7.604-7.602 7.604-4.195 0-7.605-3.41-7.605-7.604 0-4.192 3.41-7.602 7.605-7.602zM169.104 103.748c9.164 0 16.621-7.457 16.621-16.623s-7.457-16.623-16.621-16.623c-9.168 0-16.625 7.457-16.625 16.623s7.457 16.623 16.625 16.623zm0-25.246c4.754 0 8.621 3.869 8.621 8.623s-3.867 8.623-8.621 8.623-8.625-3.869-8.625-8.623 3.871-8.623 8.625-8.623zM134.292 103.748c9.168 0 16.625-7.457 16.625-16.623s-7.457-16.623-16.625-16.623c-9.164 0-16.621 7.457-16.621 16.623s7.456 16.623 16.621 16.623zm0-25.246c4.754 0 8.625 3.869 8.625 8.623s-3.871 8.623-8.625 8.623-8.621-3.869-8.621-8.623 3.867-8.623 8.621-8.623z"
                                        fill="#0396a6" opacity="1" data-original="#000000" class=""></path>
                                </g>
                            </svg></h1>
                        <h3>How you can <span class=" " style="color: #0396a6">help </span>us:</h3>
                        <p class="text-muted mt-2">Reminder: We do not accept Cash Donation
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-3 pt-3">
                <div class="col-md-6">
                    <div class="card card-pricing h-100">
                        <div class="card-body text-center">
                            <p class="card-pricing-plan-name fw-bold text-uppercase" style="color: #0396a6">Medical Care and Rehabilitation
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
                            <p class="card-pricing-plan-name fw-bold text-uppercase" style="color: #0396a6">Shelter and Daily Care</p>
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
                </div>
            </div>
        </div>
    </section>
 
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
                    <div class="card-header text-center py-2 px-2" style="border-radius: 0 !important; background-color: #53bbc0">
                        <a href="" class="navbar-brand">
                            <h3 class="text-white">
                                PAWS HAVEN
                            </h3>
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
                                <button class="btn btn-primary text-white" type="submit"> Log In </button>
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

    <script src="assets/js/vendor.min.js"></script>
 
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
