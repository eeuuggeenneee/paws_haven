<div>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Management</a></li>
                                <li class="breadcrumb-item active">Adoption Lists</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dogs List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                @foreach ($doglist as $d)
                    @php
                        $images = json_decode($d['animal_images']);
                    @endphp

                    <div class="col-md-6 col-xxl-3">
                        <div class="card alert alert-primary bg-transparent text-primary">
                            <div class="py-1 px-1 mt-2">
                                <div class="float-end position-absolute">
                                    <button type="button" class="btn btn-danger"
                                         data-bs-toggle="modal"
                                        data-bs-target="#bs-example-modal-lg"><i class="mdi mdi-heart-outline"></i>
                                    </button>
                                </div>
                                <div class="text-center">
                                    <a data-bs-toggle="modal" data-bs-target="#viewdog" wire:click="adoptionform('{{ $d['dog_id_unique'] }}')">
                                        <img src="{{ asset('storage/' . $images[0]) }}" class="img-thumbnail"
                                            alt="friend"
                                            style="min-width: 220px; min-height: 170px; width: 220px; height: 170px; object-fit: cover;"></a>

                                    <h4 class="mt-2"><a href="pages-profile-2.html"
                                            class="text-reset">{{ $d['dog_name'] }} <i
                                                class="mdi mdi-check-decagram text-success"></i></a></h4>

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="d-flex">
                                                <i class="font-18 text-success me-1"><svg
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18"
                                                        height="18" x="0" y="0" viewBox="0 0 512 512"
                                                        style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                        class="">
                                                        <g>
                                                            <path fill="#9dc6fb" fill-rule="evenodd"
                                                                d="M.007 347.855c.175 12.236 10.22 22.164 22.456 22.164H489.508c12.265 0 22.31-9.958 22.485-22.164V22.164C511.818 9.929 501.773 0 489.508 0H22.463C10.227 0 .182 9.929.007 22.135v325.399z"
                                                                clip-rule="evenodd" opacity="1"
                                                                data-original="#9dc6fb" class=""></path>
                                                            <path fill="#f9f3f1" fill-rule="evenodd"
                                                                d="M47.751 297.949c11.418 1.957 20.675 10.25 23.682 21.288 2.015 6.016 2.424 7.505 9.578 7.505h349.978c7.154 0 7.534-1.489 9.578-7.505 3.008-11.038 12.235-19.332 23.682-21.288 3.767-.642 4.38-.759 4.468-5.344V77.386c-.088-4.556-.701-4.672-4.468-5.315-11.447-1.986-20.674-10.279-23.682-21.288-2.044-6.045-2.424-7.534-9.578-7.534H81.011c-7.154 0-7.563 1.489-9.578 7.534-3.008 11.009-12.265 19.303-23.682 21.288-3.796.642-4.38.759-4.497 5.315v215.22c.117 4.584.701 4.7 4.497 5.343z"
                                                                clip-rule="evenodd" opacity="1"
                                                                data-original="#f9f3f1" class=""></path>
                                                            <path fill="#ffe077" fill-rule="evenodd"
                                                                d="M313.95 190.631c-12.498 11.593-13.082 37.787 10.717 37.787 9.695 0 10.921-5.607 22.573-5.607 11.681 0 12.907 5.607 22.602 5.607 23.799 0 23.215-26.194 10.717-37.787l-19.565-18.105c-4.555-4.205-9.14-6.337-13.754-6.337-4.585 0-9.169 2.132-13.725 6.337zM277.186 118.736c-8.498 4.088-10.688 17.142-4.935 29.144 5.782 12.002 17.346 18.427 25.843 14.338 8.498-4.088 10.688-17.142 4.906-29.144-5.753-12.002-17.346-18.397-25.814-14.338zM330.186 110.705c0 13.316 7.651 24.121 17.054 24.121 9.432 0 17.083-10.805 17.083-24.121s-7.651-24.121-17.083-24.121c-9.403 0-17.054 10.805-17.054 24.121zM391.479 133.074c-5.782 12.002-3.563 25.055 4.906 29.144 8.498 4.088 20.061-2.336 25.843-14.338s3.592-25.055-4.906-29.144c-8.497-4.059-20.061 2.336-25.843 14.338zM91.67 128.898h129.245c2.833 0 5.139-2.336 5.139-5.169V91.665a5.147 5.147 0 0 0-5.139-5.14H91.67a5.147 5.147 0 0 0-5.139 5.14v32.064c-.001 2.833 2.306 5.169 5.139 5.169z"
                                                                clip-rule="evenodd" opacity="1"
                                                                data-original="#ffe077"></path>
                                                            <path fill="#e2d8ec" fill-rule="evenodd"
                                                                d="M445.093 85.299V281.42c-.117 4.556-.701 4.672-4.497 5.315-11.418 1.957-20.674 21.464-23.682 32.502-2.015 6.016-2.424 7.505-9.578 7.505h23.653c7.154 0 7.534-1.489 9.578-7.505 3.008-11.038 12.235-19.332 23.682-21.288 3.767-.642 4.38-.759 4.468-5.344V77.386c-.088-4.556-.701-4.672-4.468-5.315-11.447-1.986-20.674-10.279-23.682-21.288-2.044-6.045-2.424-7.534-9.578-7.534h-23.653c7.154 0 7.563 1.489 9.578 7.534 3.008 11.009 12.265 27.246 23.682 29.202 3.796.642 4.38.759 4.497 5.314z"
                                                                clip-rule="evenodd" opacity="1"
                                                                data-original="#e2d8ec" class=""></path>
                                                            <path fill="#80b4fb" fill-rule="evenodd"
                                                                d="M480.047 22.456v325.399c-.175 12.206-10.22 22.164-22.485 22.164h31.946c12.265 0 22.31-9.958 22.485-22.164V22.164C511.818 9.929 501.773 0 489.508 0h-31.946c12.265 0 22.31 9.929 22.485 22.164z"
                                                                clip-rule="evenodd" opacity="1"
                                                                data-original="#80b4fb" class=""></path>
                                                            <path fill="#ffd05b" fill-rule="evenodd"
                                                                d="m341.37 177.607 19.565 18.105c8.906 8.206 11.768 23.829 4.147 32.151 1.372.35 2.92.555 4.76.555 23.799 0 23.215-26.194 10.717-37.787l-19.565-18.105c-4.555-4.205-9.14-6.337-13.754-6.337-4.555 0-9.111 2.073-13.637 6.249 2.598 1.052 5.197 2.774 7.767 5.169zM286.501 162.218c3.971 1.577 8.06 1.723 11.593 0 8.498-4.088 10.688-17.142 4.906-29.144-5.753-12.002-17.346-18.397-25.814-14.338l-.029.029c13.724 5.519 22.426 37.116 9.344 43.453zM351.736 110.705c0 10.454-3.738 19.332-10.308 22.69a12.58 12.58 0 0 0 5.811 1.431c9.432 0 17.083-10.805 17.083-24.121s-7.651-24.121-17.083-24.121c-2.044 0-4.001.526-5.811 1.431 6.571 3.358 10.308 12.265 10.308 22.69zM405.73 118.765c11.797 6.687.321 35.539-9.344 43.453 8.498 4.088 20.061-2.336 25.843-14.338s3.592-25.055-4.906-29.144c-3.534-1.694-7.622-1.577-11.593.029zM203.306 91.665v32.064c0 2.833-2.307 5.169-5.139 5.169h22.748c2.833 0 5.139-2.336 5.139-5.169V91.665a5.147 5.147 0 0 0-5.139-5.14h-22.748a5.148 5.148 0 0 1 5.139 5.14z"
                                                                clip-rule="evenodd" opacity="1"
                                                                data-original="#ffd05b"></path>
                                                            <path fill="#615260"
                                                                d="M226.054 178.996h-79.282a7.726 7.726 0 1 1 0-15.452h79.282a7.726 7.726 0 1 1 0 15.452zm-120.485 0H86.53a7.726 7.726 0 1 1 0-15.452h19.039a7.726 7.726 0 0 1 7.726 7.726 7.725 7.725 0 0 1-7.726 7.726zM255.985 221.69h-35.567a7.726 7.726 0 1 1 0-15.452h35.567a7.726 7.726 0 0 1 7.726 7.726 7.725 7.725 0 0 1-7.726 7.726zm-76.77 0H86.53a7.726 7.726 0 1 1 0-15.452h92.685a7.726 7.726 0 1 1 0 15.452zM179.215 264.383H86.53a7.726 7.726 0 1 1 0-15.452h92.685a7.726 7.726 0 1 1 0 15.452z"
                                                                opacity="1" data-original="#615260"></path>
                                                            <path fill="#ff7e92" fill-rule="evenodd"
                                                                d="M255.99 426.958v54.291l-7.726 4.275L200.411 512V397.238c6.985 2.277 15.69 2.627 25.147 3.884 8.066 10.518 13.928 20.655 22.849 24.343 2.298.968 4.791 1.493 7.583 1.493zM311.589 397.238V512l-47.873-26.476-7.726-4.275v-54.291c2.792 0 5.285-.525 7.582-1.483 8.932-3.698 14.783-13.825 22.87-24.353 9.436-1.257 18.131-1.607 25.147-3.884z"
                                                                clip-rule="evenodd" opacity="1"
                                                                data-original="#ff7e92"></path>
                                                            <path fill="#ff5f7a" fill-rule="evenodd"
                                                                d="M287.085 401.032v97.418l24.5 13.55V397.236c-4.147 1.373-8.906 2.044-14.046 2.628-3.329.38-6.833.701-10.454 1.168z"
                                                                clip-rule="evenodd" opacity="1"
                                                                data-original="#ff5f7a"></path>
                                                            <path fill="#ff5f7a"
                                                                d="M263.716 426.969v58.556l-7.726-4.275-7.726 4.275v-58.556c0-.515.052-1.02.144-1.504.701-3.554 3.822-6.222 7.582-6.222a7.72 7.72 0 0 1 7.726 7.726z"
                                                                opacity="1" data-original="#ff5f7a"></path>
                                                            <path fill="#ffe077" fill-rule="evenodd"
                                                                d="M255.985 269.798c13.666 0 20.295 12.615 30.457 25.844 16.528 2.19 30.778 1.606 37.611 13.433s-.788 23.917-7.154 39.306c6.366 15.389 13.987 27.479 7.154 39.306s-21.083 11.243-37.611 13.433c-10.162 13.229-16.791 25.844-30.457 25.844-13.637 0-20.295-12.615-30.428-25.844-16.528-2.19-30.807-1.606-37.611-13.433-6.833-11.827.788-23.917 7.154-39.306-6.366-15.389-13.987-27.479-7.154-39.306 6.804-11.827 21.083-11.243 37.611-13.433 10.134-13.229 16.791-25.844 30.428-25.844z"
                                                                clip-rule="evenodd" opacity="1"
                                                                data-original="#ffe077"></path>
                                                            <path fill="#ffd05b" fill-rule="evenodd"
                                                                d="M232.508 286.239c10.629 2.541 16.82 13.696 25.726 25.318 16.528 2.161 30.778 1.606 37.611 13.433.35.584.642 1.168.934 1.752 5.139 11.272-2.044 22.894-8.089 37.525a284.078 284.078 0 0 0 2.453 5.753c4.964 11.214 9.461 20.675 6.395 29.845 5.139-.584 9.899-1.256 14.046-2.628 5.256-1.694 9.549-4.497 12.469-9.549 3.3-5.724 3.212-11.506 1.548-17.667-1.781-6.6-5.431-13.667-8.702-21.639 3.271-7.972 6.921-15.039 8.702-21.639 1.664-6.162 1.752-11.944-1.548-17.667-6.833-11.827-21.083-11.243-37.611-13.433-10.162-13.228-16.791-25.844-30.457-25.844-10.308-.001-16.615 7.212-23.477 16.44z"
                                                                clip-rule="evenodd" opacity="1"
                                                                data-original="#ffd05b"></path>
                                                        </g>
                                                    </svg></i>
                                                <div>
                                                    <h5 class="mt-1 font-14">
                                                        {{ $d['breed'] ?? 'N/A' }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <!-- end due date -->
                                        </div> <!-- end col -->
                                        <div class="col-3">
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
                                                    <h5 class="mt-1 font-14">
                                                        {{ $d['color'] ?? 'N/A' }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <!-- end due date -->
                                        </div>
                                        <div class="col-3">
                                            <div class="d-flex">
                                                <i class="font-18 text-success me-1">
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
                                                    <h5 class="mt-1 font-14">
                                                        {{ $d['gender'] ?? 'N/A' }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <!-- end due date -->
                                        </div>
                                        <div class="col-3">
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
                                                                opacity="1" data-original="#f95353"
                                                                class=""></path>
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
                                                    <h5 class="mt-1 font-14">
                                                        {{ 100 }}
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
            <div class="row py-4">
                <div class="col-12 text-center">
                    <i class="mdi mdi-dots-circle mdi-spin font-24 text-muted"></i>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- content -->

    <!-- Footer Start -->
    
    <!-- end Footer -->

</div>
