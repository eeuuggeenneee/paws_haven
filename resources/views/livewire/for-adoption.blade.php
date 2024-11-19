<div>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid" id="adoption_list">
            <!-- start page title -->
            <div class="row">
                <div class="col-xl-6 col-sm-12 page-title-box">
                    <h4 class="page-title text-black">Adoption List</h4>
                </div>
                <div class="col-xl-6 col-sm-12 ms-auto d-flex mb-1">
                    <nav class="d-none">
                        <div class="page-item claimjPaginateBack">
                            <a class="page-item" href="javascript: void(0);" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </div>
                        <ul class="pagination pagination-rounded mb-0">

                        </ul>
                        <div class="page-item">
                            <a class="page-item claimjPaginateNext" href="javascript: void(0);" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </div>
                    </nav>

                    <div class="mt-3 me-3">
                        <ul id="pagination-list" class="pagination pagination-rounded mb-0">
                        </ul>
                    </div>

                    <input type="search" class="mt-3 form-control search" style=" height: 40px"
                        placeholder="Search name,breed..." id="top-search">
                </div>
            </div>
            <!-- end page title -->

            <div class="row list">
                @foreach ($doglist as $d)
                    @php
                        $images = json_decode($d['animal_images']);
                    @endphp
                    <div class="col-md-6 col-xxl-3">
                        <div class="card">
                            <div class="card-body py-3 px-3">
                                <div class="text-center">
                                    <a data-bs-toggle="modal" data-bs-target="#viewdog"
                                        wire:click="adoptionform('{{ $d['dog_id_unique'] }}')">
                                        <img src="{{ asset('storage/' . $images[0]) }}" class="img-thumbnail"
                                            alt="friend"
                                            style="min-width: 300px; min-height: 170px; width: 300px; height: 170px; object-fit: cover;"></a>

                                    <h4 class="mt-2 dogname"><a data-bs-toggle="modal" data-bs-target="#viewdog"
                                            wire:click="adoptionform('{{ $d['dog_id_unique'] }}')"
                                            class="text-reset">{{ $d['dog_name'] }} <i
                                                class="mdi mdi-check-decagram text-success"></i></a></h4>

                                    <div class="row">
                                        <div style="width: 15%">
                                            <div class="d-flex">
                                                <i class="font-18 text-success me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18"
                                                        height="18" x="0" y="0" viewBox="0 0 128 128"
                                                        style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                        class="">
                                                        <g>
                                                            <path fill="#f95353"
                                                                d="M88.365 12.2A32.548 32.548 0 0 0 64 23.133 32.636 32.636 0 0 0 9.623 57.667s.862 1.888 1.332 2.75C30.545 95.592 64 115.8 64 115.8s33.455-20.208 53.045-55.383c.471-.862 1.332-2.75 1.332-2.75A32.646 32.646 0 0 0 88.365 12.2z"
                                                                opacity="1" data-original="#f95353" class="">
                                                            </path>
                                                            <g fill="#ffd3c2">
                                                                <path
                                                                    d="M64 54.715c12.333 0 25.525 16.542 20.109 27.488-3.287 6.646-10 6.939-14.759 6.145a32.509 32.509 0 0 0-10.7 0c-4.763.794-11.472.5-14.76-6.145C38.475 71.257 51.667 54.715 64 54.715z"
                                                                    fill="#ffd3c2" opacity="1"
                                                                    data-original="#ffd3c2"></path>
                                                                <ellipse cx="54.539" cy="41.807" rx="6.259"
                                                                    ry="7.706" fill="#ffd3c2" opacity="1"
                                                                    data-original="#ffd3c2">
                                                                </ellipse>
                                                                <ellipse cx="73.461" cy="41.807" rx="6.259"
                                                                    ry="7.706" fill="#ffd3c2" opacity="1"
                                                                    data-original="#ffd3c2">
                                                                </ellipse>
                                                                <path
                                                                    d="M44.715 53.434c0 3.675-2.42 6.654-5.406 6.654s-5.4-2.979-5.4-6.654 2.42-6.655 5.4-6.655 5.406 2.979 5.406 6.655zM83.285 53.434c0 3.675 2.42 6.654 5.406 6.654s5.409-2.979 5.409-6.654-2.42-6.655-5.405-6.655-5.41 2.979-5.41 6.655z"
                                                                    fill="#ffd3c2" opacity="1"
                                                                    data-original="#ffd3c2"></path>
                                                            </g>
                                                        </g>
                                                    </svg> </i>
                                                <div>
                                                    <h5 class="mt-1 font-14" id="clicked-{{ $d['dog_id_unique'] }}"
                                                        wire:ignore>
                                                        {{ $d['clicked'] ?? '0' }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <!-- end due date -->
                                        </div>
                                        <!-- end col -->
                                        <div style="width: 22%">
                                            <div class="d-flex">
                                                <i class="font-18 text-success me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18"
                                                        height="18" x="0" y="0" viewBox="0 0 256 256"
                                                        style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                        class="">
                                                        <g>
                                                            <path fill="#49e849"
                                                                d="M163.3 102.3c-25.5 0-46.3-20.8-46.3-46.3s20.8-46.3 46.3-46.3 46.3 20.8 46.3 46.3-20.7 46.3-46.3 46.3zm0-83.2c-20.3 0-36.9 16.5-36.9 36.9 0 20.3 16.5 36.9 36.9 36.9s36.9-16.5 36.9-36.9c0-20.3-16.5-36.9-36.9-36.9z"
                                                                opacity="1" data-original="#49e849" class="">
                                                            </path>
                                                            <path fill="#49e849"
                                                                d="M157 74.9c-1.3 0-2.6-.5-3.5-1.5l-12.4-13.2c-1.8-1.9-1.7-5 .2-6.8s5-1.7 6.8.2l9.2 9.9 21.5-18.6c2-1.7 5-1.5 6.8.5 1.7 2 1.5 5-.5 6.8l-25 21.6c-.8.7-2 1.1-3.1 1.1z"
                                                                opacity="1" data-original="#49e849"
                                                                class="">
                                                            </path>
                                                            <path fill="#e2b471"
                                                                d="M63.7 167.6s2.4 8.6 4.9 16 5 36.6 3.9 41.6-6.3 5.8-8.8 6.3-7.6 2.7-7.6 5.9 2.9 5.6 8.9 5.3c6.1-.3 13.9-2.4 13.9-2.4l5.8-9.6 2.3-34.5-13.7-22.8zM150.2 190.1s5.5 11.8 21.4 16.6 11.3 3.5 14.1 5.5c2.7 1.9 11.5 8 11.5 9.9s-.8 9.3-4.6 10.4-9.9 3.1-10.2 7.4c-.2 4.3 3.7 5.4 7.4 5.1s15.3-1.4 15.3-1.4l7.3-11.2-.5-19.3-33.6-20.8s-15.4-13.6-16-13.5-12.8 6.6-12.8 6.6z"
                                                                opacity="1" data-original="#e2b471"
                                                                class="">
                                                            </path>
                                                            <path fill="#f7ce94"
                                                                d="M193 136.9s16.3-4.2 17.1-16.5c.8-13.2-1.4-22.1.6-32s7.3-15.2 9.1-14.5c1.8.8.2 9.9 1.4 25s3.4 19.2 0 29.9-11.1 18.4-17.2 20.4z"
                                                                opacity="1" data-original="#f7ce94"
                                                                class="">
                                                            </path>
                                                            <path fill="#ffdd99"
                                                                d="M220.4 206.9c-7.5-4.2-11.1-8-11.2-13.7-.1-4.2 3.4-12 3.8-21.3.5-9.4-.7-19.5-11.3-30.3-13.1-13.4-36.4-8.7-48.9-6.9s-28 .8-39.1-6.1c-12.1-7.4-11.1-32.1-21.8-44-9.1-10.1-30.9-7.2-35.1-4.8-6.9 3.8-5.5 9.9-7.9 12.6-1.4 1.6-4.6 1.4-7.1 1-.2 2.1-1.4 7.4-7.7 9.8 1.2 1.8 2.5 2.6 2.5 2.6-1.8 8.5 5.2 12.3 10.1 12.9 6.4.8 9.7 3.2 13.6 12.6 4.6 11.4.3 19 2.9 33.2 1.9 10.5 10.7 13.1 16.1 23.2 4.5 8.2 5.3 22.2 5.3 36.1 0 8.2-4.6 11.3-9.3 12.2-3.3.6-9.1 4-7 8.1 1.3 2.5 24 3.2 27.4.6 3.7-2.7 8.1-43.6 8.1-43.6 10.8-9.4 30.2-10.9 41.1-10 9.6.8 17.1-6.8 17.1-6.8 4.8 12.7 17 18.4 26.3 20.4 7.2 1.5 17.5 8.5 20 12.8 2.4 4.3 1.7 11.6 1.2 13.9-.9 4.5-9.9-.2-11.4 10.7-.6 4.4 20 3 21.6 1.2 1.9-2 3.6-20.8 4.4-29.8 0-2.7-1.3-5.3-3.7-6.6z"
                                                                opacity="1" data-original="#ffdd99"
                                                                class=""></path>
                                                            <path fill="#efc889"
                                                                d="M92.4 101.1c3-3.3 7.1-10.6 3.3-23.4-.4-1.3-1.7-2.1-3.1-1.8-4 .8-10.2 2.5-13.8 13.2-.4 1.1.1 2.2 1.1 2.7 2.2 1.1 6 3.5 8.8 8.8.7 1.4 2.6 1.6 3.7.5z"
                                                                opacity="1" data-original="#efc889"></path>
                                                            <circle cx="59.8" cy="91.6" r="3.4"
                                                                fill="#141414" opacity="1"
                                                                data-original="#141414"></circle>
                                                            <circle cx="59.1" cy="91.2" r="1.7"
                                                                fill="#ffffff" opacity="1"
                                                                data-original="#ffffff"></circle>
                                                            <path fill="#1e1e1e"
                                                                d="M41.7 93.5c-.3-.1-.6-.1-.9-.2-2-.4-4-.7-6-.9l-.7-.1c-.8-.1-1.6.5-1.8 1.4-.8 4.5.4 7.6 1.6 9.5 6.4-2.3 7.6-7.6 7.8-9.7z"
                                                                opacity="1" data-original="#1e1e1e"></path>
                                                            <g fill="#d6ae6e">
                                                                <path
                                                                    d="M36.5 105.8s6.5 3 20 1.7c0 0-7.1 3.6-19.7 4.2-.1 0-1.1-2.5-.3-5.9zM90.9 98.3s4.6-6.3 3.4-16.2c0 0-3.7 7.8-7.9 9.8 0 .1 3.7 2 4.5 6.4z"
                                                                    fill="#d6ae6e" opacity="1"
                                                                    data-original="#d6ae6e"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </i>
                                                <div>
                                                    <h5 class="mt-1 font-14 color">
                                                        {{ $d['color'] ?? 'N/A' }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <!-- end due date -->
                                        </div>
                                        <div style="width: 23%">
                                            <div class="d-flex">
                                                <i class="font-18 text-success me-1 ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18"
                                                        height="18" x="0" y="0" viewBox="0 0 488 488.33"
                                                        style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                        class="">
                                                        <g>
                                                            <g fill="#4671c6">
                                                                <path
                                                                    d="M44.766 213.77h-.735c-22.02 0-39.867-17.852-39.867-39.872V145c0-22.02 17.848-39.867 39.867-39.867h.735c22.02 0 39.87 17.847 39.87 39.867v28.898c0 22.02-17.85 39.872-39.87 39.872zM394.672 213.77h.738c22.016 0 39.867-17.852 39.867-39.872V145c0-22.02-17.851-39.867-39.867-39.867h-.738c-22.016 0-39.867 17.847-39.867 39.867v28.898c0 22.02 17.847 39.872 39.867 39.872zM149.91 112.637h-.734c-22.02 0-39.867-17.848-39.867-39.867V43.87c0-22.02 17.847-39.867 39.867-39.867h.734c22.02 0 39.867 17.848 39.867 39.867V72.77c0 22.02-17.847 39.867-39.867 39.867zM286.566 112.637h.735c22.02 0 39.867-17.848 39.867-39.867V43.87c0-22.02-17.848-39.867-39.867-39.867h-.735c-22.02 0-39.87 17.848-39.87 39.867V72.77c0 22.02 17.85 39.867 39.87 39.867zm0 0"
                                                                    fill="#4671c6" opacity="1"
                                                                    data-original="#4671c6" class=""></path>
                                                            </g>
                                                            <path fill="#3762cc"
                                                                d="M44.77 217.77h-.739c-24.187 0-43.867-19.68-43.867-43.872v-28.902c0-24.187 19.68-43.867 43.867-43.867h.739c24.19 0 43.867 19.68 43.867 43.867v28.902c0 24.192-19.68 43.872-43.867 43.872zm-.739-108.641c-19.777 0-35.867 16.09-35.867 35.867v28.902c0 19.778 16.09 35.872 35.867 35.872h.739c19.777 0 35.867-16.094 35.867-35.872v-28.902c0-19.777-16.09-35.867-35.867-35.867zM395.406 217.77h-.734c-24.188 0-43.867-19.68-43.867-43.872v-28.902c0-24.187 19.68-43.867 43.867-43.867h.734c24.192 0 43.871 19.68 43.871 43.867v28.902c0 24.192-19.68 43.872-43.87 43.872zm-.734-108.641c-19.777 0-35.867 16.09-35.867 35.867v28.902c0 19.778 16.09 35.872 35.867 35.872h.734c19.778 0 35.871-16.094 35.871-35.872v-28.902c0-19.777-16.093-35.867-35.87-35.867zM149.91 116.637h-.734c-24.188 0-43.867-19.68-43.867-43.867V43.867C105.309 19.68 124.989 0 149.176 0h.734c24.192 0 43.871 19.68 43.871 43.867V72.77c-.004 24.187-19.68 43.867-43.87 43.867zm-.734-108.633c-19.778 0-35.867 16.09-35.867 35.867V72.77c0 19.777 16.09 35.87 35.867 35.87h.734c19.778 0 35.871-16.093 35.871-35.87V43.87c0-19.777-16.09-35.867-35.87-35.867zM287.3 116.637h-.734c-24.191 0-43.87-19.68-43.87-43.867V43.867C242.695 19.68 262.374 0 286.565 0h.735c24.187 0 43.867 19.68 43.867 43.867V72.77c0 24.187-19.68 43.867-43.867 43.867zm-.738-108.633c-19.777 0-35.87 16.09-35.87 35.867V72.77c0 19.777 16.093 35.87 35.87 35.87h.735c19.777 0 35.871-16.093 35.871-35.87V43.87c0-19.777-16.094-35.867-35.871-35.867zm0 0"
                                                                opacity="1" data-original="#3762cc"></path>
                                                            <path fill="#4671c6"
                                                                d="M322.723 240.137c-4.641-1.098-7.868-4.828-7.868-9.082 0-46.528-42.593-84.25-95.132-84.25-52.543 0-95.137 37.718-95.137 84.25 0 4.254-3.227 7.984-7.867 9.082-40.106 9.488-69.653 41.867-69.653 80.379v2.058c0 45.961 42.075 83.219 93.973 83.219h157.367c51.899 0 93.973-37.258 93.973-83.219v-2.058c0-38.512-29.547-70.891-69.656-80.38zm0 0"
                                                                opacity="1" data-original="#4671c6"
                                                                class=""></path>
                                                            <path fill="#3762cc"
                                                                d="M298.402 409.79H141.04c-54.023 0-97.973-39.126-97.973-87.216v-2.058c0-39.485 29.907-74.137 72.73-84.274 2.821-.664 4.79-2.797 4.79-5.187 0-48.66 44.473-88.246 99.137-88.246s99.132 39.586 99.132 88.246c0 2.386 1.97 4.523 4.79 5.187h.003c42.82 10.137 72.73 44.79 72.73 84.274v2.058c0 48.09-43.952 87.215-97.976 87.215zm-78.68-258.985c-50.253 0-91.136 36-91.136 80.246 0 6.117-4.504 11.453-10.95 12.976-39.195 9.278-66.57 40.727-66.57 76.485v2.058c0 43.68 40.36 79.215 89.973 79.215h157.363c49.614 0 89.977-35.539 89.977-79.215v-2.058c0-35.758-27.379-67.211-66.574-76.485-6.446-1.523-10.95-6.863-10.95-12.976 0-44.246-40.878-80.246-91.132-80.246zm0 0"
                                                                opacity="1" data-original="#3762cc"></path>
                                                            <path fill="#f9a7a7"
                                                                d="M426.371 484.328h-69c-31.754 0-57.5-25.742-57.5-57.5v-69c0-31.754 25.746-57.5 57.5-57.5h69c31.758 0 57.5 25.746 57.5 57.5v69c0 31.762-25.738 57.5-57.5 57.5zm0 0"
                                                                opacity="1" data-original="#f9a7a7"></path>
                                                            <path fill="#ffea92"
                                                                d="M357.2 464.328c-20.68 0-37.5-16.82-37.5-37.5v-69c0-20.68 16.82-37.5 37.5-37.5h69c20.679 0 37.5 16.82 37.5 37.5v69c0 20.68-16.821 37.5-37.5 37.5zm0 0"
                                                                opacity="1" data-original="#ffea92"></path>
                                                            <path fill="#3762cc"
                                                                d="M426.375 488.328h-69c-33.91 0-61.5-27.586-61.5-61.5v-69c0-33.91 27.59-61.5 61.5-61.5h69c33.91 0 61.5 27.59 61.5 61.5v69c0 33.914-27.59 61.5-61.5 61.5zm-69-184c-29.5 0-53.5 24-53.5 53.5v69c0 29.5 24 53.5 53.5 53.5h69c29.5 0 53.5-24 53.5-53.5v-69c0-29.5-24-53.5-53.5-53.5zm0 0"
                                                                opacity="1" data-original="#3762cc"></path>
                                                            <path fill="#a4c9ff"
                                                                d="m237.66 285.664 30.809-30.809a3.994 3.994 0 0 1 5.652 0l10.227 10.223c2.398 2.399 6.504.914 6.812-2.465l3.043-33.496 1.262-13.887a4.002 4.002 0 0 0-4.348-4.347l-13.887 1.262-33.496 3.046c-3.379.305-4.863 4.414-2.464 6.813l10.222 10.223a3.999 3.999 0 0 1 0 5.656l-30.457 30.457a1.985 1.985 0 0 1-2.476.258c-22.446-14.168-52.696-11.172-71.82 9.015-20.079 21.188-20.743 54.848-1.466 76.762 21.915 24.914 60.07 25.824 83.165 2.727 18.68-18.68 21.644-47.204 8.921-69.024a1.99 1.99 0 0 1 .301-2.414zm-72.855 54.473c-12.868-12.867-12.868-33.805 0-46.672 12.867-12.863 33.8-12.863 46.672 0 12.863 12.867 12.863 33.805 0 46.672-12.868 12.867-33.805 12.867-46.672 0zm0 0"
                                                                opacity="1" data-original="#a4c9ff"></path>
                                                            <path fill="#4671c6"
                                                                d="M386.691 422.152v32.114a2.472 2.472 0 0 0 2.473 2.468h9.879a2.469 2.469 0 0 0 2.469-2.468v-56.48c0-.583.41-1.075.976-1.2 23.395-5.293 38.035-33.941 17.977-60.059-28.899-22.222-60.942-1.918-60.942 25.73 0 16.313 11.16 30.06 26.243 34.032.543.145.925.621.925 1.184zm-6.867-44.996c-16.695-21.71 8.078-46.492 29.793-29.8 16.695 21.71-8.082 46.492-29.793 29.8zm0 0"
                                                                opacity="1" data-original="#4671c6"
                                                                class=""></path>
                                                        </g>
                                                    </svg> </i>
                                                <div>
                                                    <h5 class="mt-1 font-14 gender">
                                                        {{ $d['gender'] ?? 'N/A' }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <!-- end due date -->
                                        </div>
                                        <div style="width: 40%">
                                            <div class="d-flex">
                                                <i class="font-18 text-success me-1 ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18"
                                                        height="18" x="0" y="0" viewBox="0 0 64 64"
                                                        style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                        class="">
                                                        <g>
                                                            <path fill="#d3843d"
                                                                d="M47.429 39.928 49 36V16s-8-7-17-7-17 7-17 7v20l1.571 3.928z"
                                                                opacity="1" data-original="#d3843d"
                                                                class=""></path>
                                                            <path fill="#e8e7d6"
                                                                d="M34 31V17a2 2 0 0 0-2-2 2 2 0 0 0-2 2v14c-2.591 6.909-11.143 8.6-13.429 8.928L21 51c.992 2.381 6.42 5 9 5h4c2.58 0 8.008-2.619 9-5l4.429-11.072C45.143 39.6 36.591 37.909 34 31z"
                                                                opacity="1" data-original="#e8e7d6"
                                                                class=""></path>
                                                            <path fill="#f98c96"
                                                                d="M32 52a4 4 0 0 0 4-4v-1c-2.761 0-4-1.343-4-3 0 1.657-1.239 3-4 3v1a4 4 0 0 0 4 4z"
                                                                opacity="1" data-original="#f98c96"
                                                                class=""></path>
                                                            <path fill="#ad6327"
                                                                d="M15 16 5 24c-3.328 3.129-1.4 7.375 0 10 1.781 3.349 3 11.37 3 15 0 6.39 7 6.781 7-6z"
                                                                opacity="1" data-original="#ad6327"
                                                                class=""></path>
                                                            <path fill="#db527d" d="M31 45h2v4h-2z" opacity="1"
                                                                data-original="#db527d" class=""></path>
                                                            <path fill="#394d5c"
                                                                d="M36 39a4.406 4.406 0 0 1-4 4 4.406 4.406 0 0 1-4-4c0-1.657 1.791-2 4-2s4 .343 4 2z"
                                                                opacity="1" data-original="#394d5c"
                                                                class=""></path>
                                                            <circle cx="24" cy="29" r="2"
                                                                fill="#143441" opacity="1" data-original="#143441"
                                                                class=""></circle>
                                                            <path fill="#ad6327"
                                                                d="m49 16 10 8c3.328 3.129 1.4 7.375 0 10-1.781 3.349-3 11.37-3 15 0 6.39-7 6.781-7-6z"
                                                                opacity="1" data-original="#ad6327"
                                                                class=""></path>
                                                            <g fill="#143441">
                                                                <circle cx="40" cy="29" r="2"
                                                                    fill="#143441" opacity="1"
                                                                    data-original="#143441" class=""></circle>
                                                                <path
                                                                    d="M40 44c0 .944-1.71 2-4 2-1.121 0-3-.26-3-2h-2c0 1.74-1.879 2-3 2-2.29 0-4-1.056-4-2h-2c0 2.243 2.636 4 6 4a5.2 5.2 0 0 0 4-1.449A5.2 5.2 0 0 0 36 48c3.364 0 6-1.757 6-4z"
                                                                    fill="#143441" opacity="1"
                                                                    data-original="#143441" class=""></path>
                                                            </g>
                                                        </g>
                                                    </svg> </i>
                                                <div>
                                                    <h5 class="mt-1 font-14 breed">
                                                        {{ $d['breed_name'] ?? 'N/A' }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <!-- end due date -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End col -->
            </div> <!-- End row -->
        </div> <!-- container -->
    </div> <!-- content -->

    <!-- Footer Start -->

    <!-- end Footer -->
    <script>
        var adoptionlist;
        document.addEventListener('livewire:init', function() {
            function areinitializeList() {
                console.log('reinit');

                var options = {
                    valueNames: ['dogname', 'color', 'gender', 'breed'],
                    searchClass: 'search',
                    page: 8,
                    pagination: true,
                    paginationClass: 'pagination', // Adds pagination classes (rounded pagination)
                    nextClass: 'next', // Custom class for the next button
                    prevClass: 'previous', // Custom class for the previous button
                    activeClass: 'active', // Custom class for active page
                    pageClass: 'page-item', // Class for each page item
                    linkClass: 'page-link' // Class for each link inside the pagination
                };

                var adoptionlist = new List('adoption_list', options);

                // Initialize pagination update

                // Update pagination links dynamically based on List.js
                function updatePagination(list) {
                    const totalPages = list.pages;
                    const currentPage = list.page;

                    // Clear existing pagination
                    const pagination = document.getElementById('pagination-list');
                    pagination.innerHTML = '';

                    // Add Previous page button
                    const prevDiv = document.createElement('div');
                    prevDiv.classList.add('page-item', 'claimjPaginateBack');

                    const prevButton = document.createElement('li');
                    prevButton.classList.add('page-link');
                    prevButton.innerHTML =
                        `<a class="" href="javascript:void(0);" id="previous-page" aria-label="Previous">&laquo;</a>`;

                    prevDiv.appendChild(prevButton);
                    pagination.appendChild(prevDiv);


                    const nextDiv = document.createElement('div');
                    nextDiv.classList.add('page-item', 'claimjPaginateNext');

                    const nextButton = document.createElement('li');
                    nextButton.classList.add('page-link');
                    nextButton.innerHTML =
                        `<a class="" href="javascript:void(0);" id="next-page" aria-label="Next">&raquo;</a>`;
                    nextDiv.appendChild(nextButton);
                    pagination.appendChild(nextDiv);


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
                }
                updatePagination(adoptionlist);

            }

            areinitializeList();
            Livewire.hook('commit', ({
                component,
                commit,
                respond,
                succeed,
                fail
            }) => {
                // Equivalent of 'message.sent'
                succeed(({
                    snapshot,
                    effect
                }) => {
                    // Equivalent of 'message.received'
                    queueMicrotask(() => {
                        if (component.effects.dispatches[0].name == 'activedogModal' || component.effects.dispatches[0].name == 'notif') {
                            areinitializeList();
                        }
                    })
                })
                fail(() => {
                    // Equivalent of 'message.failed'
                })
            })

            Livewire.on('dogSaved', event => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: event[0],
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Reload the page
                        location.reload();
                    }
                });

            });

            Livewire.on('heart_dog', event => {
                let dogid = document.getElementById('clicked-' + event[0]);
                dogid.textContent = event[1];
                console.log(event);
            });

        });
    </script>
</div>
