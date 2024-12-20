<div>
    <style>
        .responsive-img {
            min-width: 100%;
            min-height: 250px;
            width: 300px;
            height: 300px;
            object-fit: cover;
        }

        @media (min-width: 1200px) {

            /* For large screens (XL and above) */
            .responsive-img {
                min-width: 420px;
                min-height: 320px;
                width: 420px;
                height: 320px;
            }
        }
    </style>
    <div id="info-header-modal" class="modal fade" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="needs-validation" novalidate id="formadddog">
                    <div class="modal-header" style="background-color: #0396a6;">
                        <h4 class="modal-title text-white" id="info-header-modalLabel">Add Dogs</h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="dogName">Dog name</label>
                            <input type="text" class="form-control" id="dogName" placeholder="Dog name"
                                wire:model="dogName" required>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="breed">Breed</label>
                            <select id="dog-breed" name="dog-breed" class="form-select" wire:model="breed" required>
                                <option value="" disabled selected>Select a breed</option>
                                @foreach ($breedlist as $breed)
                                    <option value="{{ $breed['id'] }}">{{ $breed['name'] }}</option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <input type="hidden" class="form-control" wire:model="dog_unique">
                        <div class="mb-3">
                            <label class="form-label" for="color">Color</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="color" placeholder="Color"
                                    wire:model="color">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="color">Gender</label>
                            <div class="input-group">
                                <select class="form-select mb-3" wire:model="gender" required>
                                    <option selected>Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" placeholder="Description" id="description" wire:model="description"
                                style="height: 100px;" required></textarea>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                            <label for="dogImages" class="form-label">Dog Images</label>
                            <input class="form-control" type="file" id="dogImages" wire:model="dogImages" multiple
                                accept="image/*" onchange="validateFiles(event)"
                                @if (!$updatedog) required @endif>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn text-white" onclick="confimSaveAdd()"
                            style="background-color: #0396a6;">Save changes</button>

                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div id="lostandfounddog" class="modal fade" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel">
                        @if (Auth::user()->type != 1)
                            Report Lost Dog
                        @else
                            Report Found Dog
                        @endif

                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                @livewire('add-lost-dog')
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="viewdog" tabindex="-1" style="z-index: 10050 !important;" role="dialog"
        wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myLargeModalLabel">View Dog Details</h4>
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
                                                        @if (isset($images))
                                                            @foreach ($images as $img)
                                                                <div
                                                                    class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                                    <img class="d-block img-fluid img-thumbnail responsive-img"
                                                                        src="{{ asset('storage/' . $img) }}"
                                                                        alt="Slide {{ $loop->iteration }}">
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                    <div class="text-center mt-3">
                                                        @if (isset($images))
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
                                                        @endif
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
                                                    </div>
                                                </div>

                                                <button type="button" id="adoptiontoggle"
                                                    class="mt-3 btn btn-outline-success rounded-pill w-100"><i
                                                        class="uil-heart"></i> Adopt the dog <i
                                                        class="uil-heart"></i></button>
                                            </form>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                    <div class="container mt-3 d-none" id="adoptionform" wire:ignore.self>
                                        <div class="card shadow">
                                            <div class="card-header bg-info text-white">
                                                <h5 class="card-title">Adoption Form</h5>
                                                <h6 class="card-subtitle ">Every Information is important</h6>
                                            </div>
                                            <div class="px-3 py-3">
                                                <form class="needs-validation" id="checkform" novalidate>
                                                    <div class="row">
                                                        <div class="mb-3 col-6">
                                                            <label class="form-label" for="validationCustom01">First
                                                                name</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom01" placeholder="First name"
                                                                wire:model="a_fname" required>
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-6">
                                                            <label class="form-label" for="validationCustom02">Last
                                                                name</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom02" placeholder="Last name"
                                                                wire:model="a_lname" required>
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3" wire:ignore>
                                                        <label class="form-label" for="validationCustom03"
                                                            id="label_phonenumber_claim4">Contact Number</label>

                                                        <div class="input-group" wire:ignore.self>
                                                            <input type="tel" class="form-control" wire:ignore.self
                                                                id="phonenumber_claim4"
                                                                placeholder="09123456789" required
                                                                wire:model="a_contact" pattern="09[0-9]{9}"
                                                                title="Phone number must start with 09 and contain exactly 11 digits."
                                                                maxlength="11"
                                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11); validatePhoneNumber4(this);">

                                                            <input type="number" wire:ignore.self class="form-control d-none"
                                                                id="otp_input4" wire:model="otp_input"
                                                                max="999999"
                                                                oninput="this.value = this.value.slice(0, 6)"
                                                                placeholder="Please input 6 digits code">

                                                            <button class="btn btn-outline-secondary" wire:ignore.self
                                                                id="verify_button4" type="button"
                                                                wire:click="verifyMobile('adoptdog')"
                                                                disabled>Verify</button>

                                                            <button class="btn btn-outline-secondary d-none" wire:ignore.self
                                                                id="verify_otp4" type="button"
                                                                wire:click="checkOTP">Submit</button>
                                                        </div>
                                                        <small id="resend_container4" wire:ignore.self>
                                                          
                                                        </small>
                                                        
                                                        <div class="invalid-feedback">
                                                            Please provide a valid phone number.
                                                        </div>
                                                    </div>
                                                   

                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="validationCustom04">Address</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="a_address" id="validationCustom04"
                                                            placeholder="Address" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid address.
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom02">Materials
                                                            ex. dog cage</label>
                                                        <input type="text" class="form-control"
                                                            id="validationCustom02" placeholder="Materials"
                                                            wire:model="a_materials" required>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="validationCustom05">Reason</label>
                                                        <textarea class="form-control" rows="4" wire:model="a_reason" required></textarea>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid reason.
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="invalidCheck" required wire:model="a_tos">
                                                            <label class="form-check-label form-label"
                                                                for="invalidCheck">Agree to <a class="text-primary"
                                                                    onclick="openTerms()">
                                                                    terms and conditions </a></label>
                                                            <div class="invalid-feedback">
                                                                You must agree before submitting.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" wire:ignore.self>Close</button>
                    <button type="button" class="btn btn-success d-none" id="adopt_dog" wire:ignore.self>Confirm Adoption</button>
                    <button type="button" class="btn btn-success d-none" id="hidden_dog" wire:ignore.self
                        wire:click="confirmadoption">Confirm Adoption</button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="lostdog" tabindex="-1" style="z-index: 10050 !important;" role="dialog"
        wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myLargeModalLabel">View Dog Details</h4>
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
                                                        @if (isset($images))
                                                            @foreach ($images as $img)
                                                                <div
                                                                    class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                                    <img class="d-block img-fluid img-thumbnail responsive-img"
                                                                        src="{{ asset('storage/' . $img) }}"
                                                                        alt="Slide {{ $loop->iteration }}">
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                    <div class="text-center mt-3">
                                                        @if (isset($images))
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
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-lg-7">
                                            <form class="ps-lg-4">
                                                <!-- Product title -->
                                                <h3 class="mt-0">{{ $activedog['dog_name'] ?? 'N/A' }}
                                                    <a href="javascript: void(0);" class="text-muted">
                                                        @if (isset($activedog))
                                                            @if ($activedog['status_name'] == 'Lost Dog')
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24" height="24" x="0" y="0"
                                                                    viewBox="0 0 512 512"
                                                                    style="enable-background:new 0 0 512 512"
                                                                    xml:space="preserve" class="">
                                                                    <g>
                                                                        <path
                                                                            d="M512 256c0 69.141-27.408 131.897-71.962 177.946C393.488 482.074 328.244 512 256 512s-137.498-29.926-184.048-78.064C27.408 387.887 0 325.13 0 256S27.408 124.113 71.952 78.064C118.502 29.926 183.756 0 256 0c36.456 0 71.126 7.617 102.505 21.347l.01.01C448.867 60.886 512 151.071 512 256z"
                                                                            style="" fill="#005572"
                                                                            data-original="#60c5e8" class=""
                                                                            opacity="0"></path>
                                                                        <path
                                                                            d="M440.043 102.881v331.065C393.493 482.074 328.249 512 256.005 512s-137.498-29.926-184.048-78.064V0h265.216l21.337 21.347 81.533 81.534z"
                                                                            style="" fill="#ea5a52"
                                                                            data-original="#ea5a52" class="">
                                                                        </path>
                                                                        <path
                                                                            d="M119.118 87.803h273.763v273.763H119.118z"
                                                                            style="" fill="#ffffff"
                                                                            data-original="#ffffff" class=""
                                                                            opacity="1"></path>
                                                                        <path
                                                                            d="m317.143 178.775-4.104-70.989c-.271-4.679-6.195-6.523-9.074-2.825l-34.036 43.717"
                                                                            style="" fill="#a03510"
                                                                            data-original="#a03510" class="">
                                                                        </path>
                                                                        <path
                                                                            d="M327.747 362.129h-164.77c-.251-.178-.491-.376-.742-.564l12.309-212.888h126.589c8.004 0 14.629 6.248 15.088 14.242l.919 15.851 10.607 183.359z"
                                                                            style="" fill="#ba4c20"
                                                                            data-original="#ba4c20"></path>
                                                                        <path
                                                                            d="M209.517 362.129h-46.54c-.251-.178-.491-.376-.742-.564l12.309-212.888h30.71l4.263 213.452z"
                                                                            style="" fill="#a03510"
                                                                            data-original="#a03510" class="">
                                                                        </path>
                                                                        <ellipse cx="299.426" cy="196.305"
                                                                            rx="11.546" ry="17.975"
                                                                            style="" fill="#3c363f"
                                                                            data-original="#3c363f"></ellipse>
                                                                        <ellipse cx="303.512" cy="194.79"
                                                                            rx="3.769" ry="9.172"
                                                                            style="" fill="#5c5560"
                                                                            data-original="#5c5560" class="">
                                                                        </ellipse>
                                                                        <path
                                                                            d="m220.017 148.68-20.512 13.072-6.529 4.161-5.006 3.196c-6.332 4.003-14.565-.837-14.127-8.33l3.061-52.996c.272-4.674 6.196-6.521 9.076-2.826l34.037 43.723z"
                                                                            style="" fill="#ba4c20"
                                                                            data-original="#ba4c20"></path>
                                                                        <ellipse cx="251.361" cy="196.305"
                                                                            rx="11.546" ry="17.975"
                                                                            style="" fill="#3c363f"
                                                                            data-original="#3c363f"></ellipse>
                                                                        <ellipse cx="255.446" cy="194.79"
                                                                            rx="3.769" ry="9.172"
                                                                            style="" fill="#5c5560"
                                                                            data-original="#5c5560" class="">
                                                                        </ellipse>
                                                                        <path
                                                                            d="M240.453 218.536h115.331v69.128a25.66 25.66 0 0 1-15.406 23.522l-42.752 18.636c-16.02 6.983-34.554-1.516-39.714-18.213l-25.429-82.268c-1.66-5.366 2.353-10.805 7.97-10.805z"
                                                                            style="" fill="#d8d8d8"
                                                                            data-original="#d8d8d8" class="">
                                                                        </path>
                                                                        <path
                                                                            d="M338.01 239.739v53.018a29.709 29.709 0 0 1-17.821 27.229c-.007 0-.007.007-.015.007l-22.548 9.83c-16.019 6.981-34.557-1.515-39.713-18.213l-25.428-82.268c-1.658-5.368 2.352-10.811 7.968-10.811h92.844l4.713 21.208z"
                                                                            style="" fill="#eaeaea"
                                                                            data-original="#eaeaea" class="">
                                                                        </path>
                                                                        <path
                                                                            d="M352.015 218.536H317.84c-6.522 0-11.811 5.287-11.811 11.81 0 6.522 5.287 11.81 11.811 11.81h34.174c6.522 0 11.81-5.287 11.81-11.81 0-6.523-5.287-11.81-11.809-11.81z"
                                                                            style="" fill="#3c363f"
                                                                            data-original="#3c363f"></path>
                                                                        <path
                                                                            d="M354.149 222.305h-17.087a5.905 5.905 0 0 0 0 11.81h17.087a5.905 5.905 0 1 0 0-11.81z"
                                                                            style="" fill="#5c5560"
                                                                            data-original="#5c5560" class="">
                                                                        </path>
                                                                        <circle cx="272.781" cy="275.425"
                                                                            r="9.047" style="" fill="#d8d8d8"
                                                                            data-original="#d8d8d8" class="">
                                                                        </circle>
                                                                        <circle cx="305.455" cy="275.425"
                                                                            r="9.047" style="" fill="#d8d8d8"
                                                                            data-original="#d8d8d8" class="">
                                                                        </circle>
                                                                        <circle cx="290.377" cy="295.027"
                                                                            r="9.047" style="" fill="#d8d8d8"
                                                                            data-original="#d8d8d8" class="">
                                                                        </circle>
                                                                        <path
                                                                            d="m199.507 161.751-6.533 4.164-5.003 3.195a7.488 7.488 0 0 1-.537.313c-.029.018-.06.029-.089.047-6.231 3.325-13.927-1.441-13.502-8.695l3.059-52.992c.272-4.678 6.196-6.52 9.078-2.83 2.628 6.408 6.462 16.455 10.071 26.07 1.016 2.705 2.008 5.369 2.959 7.914a5126.72 5126.72 0 0 1 4.288 11.594 9.442 9.442 0 0 1-3.791 11.22z"
                                                                            style="" fill="#f9b7d2"
                                                                            data-original="#f9b7d2" class="">
                                                                        </path>
                                                                        <path d="M440.039 102.875H337.163V0z"
                                                                            style="" fill="#d33531"
                                                                            data-original="#d33531" class="">
                                                                        </path>
                                                                        <path
                                                                            d="M163.662 444.454c-.796 2.385-3.738 3.499-6.76 3.499-2.941 0-6.044-1.113-6.601-3.499l-5.09-21.473-5.169 21.473c-.556 2.385-3.658 3.499-6.6 3.499-3.023 0-6.045-1.113-6.76-3.499l-15.747-50.023a3.432 3.432 0 0 1-.159-.954c0-2.307 3.659-4.136 6.601-4.136 1.59 0 3.023.557 3.42 2.068l12.565 43.104 6.759-27.675c.478-1.988 2.784-2.863 5.09-2.863 2.228 0 4.534.875 5.01 2.863l6.76 27.675 12.565-43.104c.398-1.511 1.83-2.068 3.42-2.068 2.941 0 6.6 1.829 6.6 4.136 0 .318-.079.716-.158.954l-15.746 50.023zM178.696 443.182c0-.159.079-.478.159-.795l15.348-50.023c.717-2.387 3.658-3.499 6.601-3.499 3.023 0 5.964 1.113 6.681 3.499l15.349 50.023c.079.319.159.557.159.795 0 2.465-3.738 4.294-6.521 4.294-1.75 0-3.102-.557-3.5-2.068l-3.022-10.577h-18.21l-3.022 10.577c-.398 1.511-1.75 2.068-3.5 2.068-2.784 0-6.522-1.75-6.522-4.294zm29.029-16.462-6.919-24.415-6.918 24.415h13.837zM256.717 444.215l-17.099-31.971v31.971c0 2.147-2.625 3.261-5.169 3.261-2.625 0-5.169-1.113-5.169-3.261v-51.614c0-2.227 2.545-3.261 5.169-3.261 3.738 0 5.249.795 7.714 5.488l15.348 29.664v-31.971c0-2.227 2.545-3.181 5.169-3.181 2.545 0 5.169.955 5.169 3.181v51.693c0 2.147-2.625 3.261-5.169 3.261-2.464.001-4.611-.795-5.963-3.26zM311.274 389.34c2.228 0 3.261 2.387 3.261 4.613 0 2.465-1.193 4.693-3.261 4.693h-11.611v45.569c0 2.147-2.625 3.261-5.169 3.261-2.625 0-5.169-1.113-5.169-3.261v-45.569h-11.69c-2.068 0-3.261-2.147-3.261-4.693 0-2.227 1.033-4.613 3.261-4.613h33.639zM331.317 414.312h12.088c2.068 0 3.26 1.988 3.26 4.136 0 1.829-1.033 3.976-3.26 3.976h-12.088v15.985h22.506c2.068 0 3.261 2.147 3.261 4.613 0 2.147-1.033 4.453-3.261 4.453h-28.312c-2.306 0-4.534-1.113-4.534-3.261V392.6c0-2.147 2.228-3.261 4.534-3.261h28.312c2.228 0 3.261 2.307 3.261 4.453 0 2.465-1.193 4.613-3.261 4.613h-22.506v15.907zM382.535 389.34c10.497 0 18.689 4.931 18.689 18.213v21.711c0 13.281-8.192 18.212-18.689 18.212h-14.077c-2.704 0-4.534-1.511-4.534-3.181v-51.773c0-1.67 1.83-3.181 4.534-3.181h14.077v-.001zm-8.271 9.067v40.003h8.271c5.247 0 8.35-2.942 8.35-9.145v-21.711c0-6.204-3.102-9.146-8.35-9.146h-8.271v-.001z"
                                                                            style="" fill="#ffffff"
                                                                            data-original="#ffffff" class=""
                                                                            opacity="1"></path>
                                                                    </g>
                                                                </svg>
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24" height="24" x="0" y="0"
                                                                    viewBox="0 0 512 512"
                                                                    style="enable-background:new 0 0 512 512"
                                                                    xml:space="preserve" class="">
                                                                    <g>
                                                                        <path
                                                                            d="M512 256c0 69.141-27.408 131.897-71.962 177.946C393.488 482.074 328.244 512 256 512s-137.498-29.926-184.048-78.064C27.408 387.887 0 325.13 0 256S27.408 124.113 71.952 78.064C118.502 29.926 183.756 0 256 0c36.456 0 71.126 7.617 102.505 21.347l.01.01C448.867 60.886 512 151.071 512 256z"
                                                                            style="" fill="#60c5e8"
                                                                            data-original="#60c5e8" class=""
                                                                            opacity="0"></path>
                                                                        <path
                                                                            d="M440.043 102.881v331.065C393.493 482.074 328.249 512 256.005 512s-137.498-29.926-184.048-78.064V0h265.216l21.337 21.347 81.533 81.534z"
                                                                            style="" fill="#ea5a52"
                                                                            data-original="#ea5a52" class="">
                                                                        </path>
                                                                        <path
                                                                            d="M119.118 87.803h273.763v273.763H119.118z"
                                                                            style="" fill="#ffffff"
                                                                            data-original="#ffffff" class=""
                                                                            opacity="0"></path>
                                                                        <path
                                                                            d="m317.143 178.775-4.104-70.989c-.271-4.679-6.195-6.523-9.074-2.825l-34.036 43.717"
                                                                            style="" fill="#a03510"
                                                                            data-original="#a03510" class="">
                                                                        </path>
                                                                        <path
                                                                            d="M327.747 362.129h-164.77c-.251-.178-.491-.376-.742-.564l12.309-212.888h126.589c8.004 0 14.629 6.248 15.088 14.242l.919 15.851 10.607 183.359z"
                                                                            style="" fill="#ba4c20"
                                                                            data-original="#ba4c20" class="">
                                                                        </path>
                                                                        <path
                                                                            d="M209.517 362.129h-46.54c-.251-.178-.491-.376-.742-.564l12.309-212.888h30.71l4.263 213.452z"
                                                                            style="" fill="#a03510"
                                                                            data-original="#a03510" class="">
                                                                        </path>
                                                                        <ellipse cx="299.426" cy="196.305"
                                                                            rx="11.546" ry="17.975"
                                                                            style="" fill="#3c363f"
                                                                            data-original="#3c363f"></ellipse>
                                                                        <ellipse cx="303.512" cy="194.79"
                                                                            rx="3.769" ry="9.172"
                                                                            style="" fill="#5c5560"
                                                                            data-original="#5c5560" class="">
                                                                        </ellipse>
                                                                        <path
                                                                            d="m220.017 148.68-20.512 13.072-6.529 4.161-5.006 3.196c-6.332 4.003-14.565-.837-14.127-8.33l3.061-52.996c.272-4.674 6.196-6.521 9.076-2.826l34.037 43.723z"
                                                                            style="" fill="#ba4c20"
                                                                            data-original="#ba4c20" class="">
                                                                        </path>
                                                                        <ellipse cx="251.361" cy="196.305"
                                                                            rx="11.546" ry="17.975"
                                                                            style="" fill="#3c363f"
                                                                            data-original="#3c363f"></ellipse>
                                                                        <ellipse cx="255.446" cy="194.79"
                                                                            rx="3.769" ry="9.172"
                                                                            style="" fill="#5c5560"
                                                                            data-original="#5c5560" class="">
                                                                        </ellipse>
                                                                        <path
                                                                            d="M240.453 218.536h115.331v69.128a25.66 25.66 0 0 1-15.406 23.522l-42.752 18.636c-16.02 6.983-34.554-1.516-39.714-18.213l-25.429-82.268c-1.66-5.366 2.353-10.805 7.97-10.805z"
                                                                            style="" fill="#d8d8d8"
                                                                            data-original="#d8d8d8" class="">
                                                                        </path>
                                                                        <path
                                                                            d="M338.01 239.739v53.018a29.709 29.709 0 0 1-17.821 27.229c-.007 0-.007.007-.015.007l-22.548 9.83c-16.019 6.981-34.557-1.515-39.713-18.213l-25.428-82.268c-1.658-5.368 2.352-10.811 7.968-10.811h92.844l4.713 21.208z"
                                                                            style="" fill="#eaeaea"
                                                                            data-original="#eaeaea" class="">
                                                                        </path>
                                                                        <path
                                                                            d="M352.015 218.536H317.84c-6.522 0-11.811 5.287-11.811 11.81 0 6.522 5.287 11.81 11.811 11.81h34.174c6.522 0 11.81-5.287 11.81-11.81 0-6.523-5.287-11.81-11.809-11.81z"
                                                                            style="" fill="#3c363f"
                                                                            data-original="#3c363f"></path>
                                                                        <path
                                                                            d="M354.149 222.305h-17.087a5.905 5.905 0 0 0 0 11.81h17.087a5.905 5.905 0 1 0 0-11.81z"
                                                                            style="" fill="#5c5560"
                                                                            data-original="#5c5560" class="">
                                                                        </path>
                                                                        <circle cx="272.781" cy="275.425"
                                                                            r="9.047" style="" fill="#d8d8d8"
                                                                            data-original="#d8d8d8" class="">
                                                                        </circle>
                                                                        <circle cx="305.455" cy="275.425"
                                                                            r="9.047" style="" fill="#d8d8d8"
                                                                            data-original="#d8d8d8" class="">
                                                                        </circle>
                                                                        <circle cx="290.377" cy="295.027"
                                                                            r="9.047" style="" fill="#d8d8d8"
                                                                            data-original="#d8d8d8" class="">
                                                                        </circle>
                                                                        <path
                                                                            d="m199.507 161.751-6.533 4.164-5.003 3.195a7.488 7.488 0 0 1-.537.313c-.029.018-.06.029-.089.047-6.231 3.325-13.927-1.441-13.502-8.695l3.059-52.992c.272-4.678 6.196-6.52 9.078-2.83 2.628 6.408 6.462 16.455 10.071 26.07 1.016 2.705 2.008 5.369 2.959 7.914a5126.72 5126.72 0 0 1 4.288 11.594 9.442 9.442 0 0 1-3.791 11.22z"
                                                                            style="" fill="#f9b7d2"
                                                                            data-original="#f9b7d2" class="">
                                                                        </path>
                                                                        <path d="M440.039 102.875H337.163V0z"
                                                                            style="" fill="#d33531"
                                                                            data-original="#d33531" class="">
                                                                        </path>
                                                                        <path
                                                                            d="M163.662 444.454c-.796 2.385-3.738 3.499-6.76 3.499-2.941 0-6.044-1.113-6.601-3.499l-5.09-21.473-5.169 21.473c-.556 2.385-3.658 3.499-6.6 3.499-3.023 0-6.045-1.113-6.76-3.499l-15.747-50.023a3.432 3.432 0 0 1-.159-.954c0-2.307 3.659-4.136 6.601-4.136 1.59 0 3.023.557 3.42 2.068l12.565 43.104 6.759-27.675c.478-1.988 2.784-2.863 5.09-2.863 2.228 0 4.534.875 5.01 2.863l6.76 27.675 12.565-43.104c.398-1.511 1.83-2.068 3.42-2.068 2.941 0 6.6 1.829 6.6 4.136 0 .318-.079.716-.158.954l-15.746 50.023zM178.696 443.182c0-.159.079-.478.159-.795l15.348-50.023c.717-2.387 3.658-3.499 6.601-3.499 3.023 0 5.964 1.113 6.681 3.499l15.349 50.023c.079.319.159.557.159.795 0 2.465-3.738 4.294-6.521 4.294-1.75 0-3.102-.557-3.5-2.068l-3.022-10.577h-18.21l-3.022 10.577c-.398 1.511-1.75 2.068-3.5 2.068-2.784 0-6.522-1.75-6.522-4.294zm29.029-16.462-6.919-24.415-6.918 24.415h13.837zM256.717 444.215l-17.099-31.971v31.971c0 2.147-2.625 3.261-5.169 3.261-2.625 0-5.169-1.113-5.169-3.261v-51.614c0-2.227 2.545-3.261 5.169-3.261 3.738 0 5.249.795 7.714 5.488l15.348 29.664v-31.971c0-2.227 2.545-3.181 5.169-3.181 2.545 0 5.169.955 5.169 3.181v51.693c0 2.147-2.625 3.261-5.169 3.261-2.464.001-4.611-.795-5.963-3.26zM311.274 389.34c2.228 0 3.261 2.387 3.261 4.613 0 2.465-1.193 4.693-3.261 4.693h-11.611v45.569c0 2.147-2.625 3.261-5.169 3.261-2.625 0-5.169-1.113-5.169-3.261v-45.569h-11.69c-2.068 0-3.261-2.147-3.261-4.693 0-2.227 1.033-4.613 3.261-4.613h33.639zM331.317 414.312h12.088c2.068 0 3.26 1.988 3.26 4.136 0 1.829-1.033 3.976-3.26 3.976h-12.088v15.985h22.506c2.068 0 3.261 2.147 3.261 4.613 0 2.147-1.033 4.453-3.261 4.453h-28.312c-2.306 0-4.534-1.113-4.534-3.261V392.6c0-2.147 2.228-3.261 4.534-3.261h28.312c2.228 0 3.261 2.307 3.261 4.453 0 2.465-1.193 4.613-3.261 4.613h-22.506v15.907zM382.535 389.34c10.497 0 18.689 4.931 18.689 18.213v21.711c0 13.281-8.192 18.212-18.689 18.212h-14.077c-2.704 0-4.534-1.511-4.534-3.181v-51.773c0-1.67 1.83-3.181 4.534-3.181h14.077v-.001zm-8.271 9.067v40.003h8.271c5.247 0 8.35-2.942 8.35-9.145v-21.711c0-6.204-3.102-9.146-8.35-9.146h-8.271v-.001z"
                                                                            style="" fill="#ffffff"
                                                                            data-original="#ffffff" class=""
                                                                            opacity="0"></path>
                                                                    </g>
                                                                </svg>
                                                            @endif
                                                        @endif
                                                    </a>
                                                </h3>
                                                <p class="mb-1">Added Date:
                                                    {{ isset($activedog['created_at']) ? \Carbon\Carbon::parse($activedog['created_at'])->format('m/d/Y') : 'N/A' }}
                                                </p>

                                                <!-- Product stock -->
                                                <div class="mt-3">
                                                    <h4><span class="badge badge-success-lighten">
                                                            {{ $activedog['status_name'] ?? 'N/A' }} </span>
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
                                                        <!--<div class="col-md-4">-->
                                                        <!--    <h6 class="font-14">Contact Person</h6>-->
                                                        <!--    <div class="d-flex">-->
                                                        <!--        <i class="font-18 text-success me-1">-->
                                                        <!--            <svg xmlns="http://www.w3.org/2000/svg"-->
                                                        <!--                version="1.1"-->
                                                        <!--                xmlns:xlink="http://www.w3.org/1999/xlink"-->
                                                        <!--                width="18" height="18" x="0" y="0"-->
                                                        <!--                viewBox="0 0 256 256"-->
                                                        <!--                style="enable-background:new 0 0 512 512"-->
                                                        <!--                xml:space="preserve" class="">-->
                                                        <!--                <g>-->
                                                        <!--                    <circle cx="164.927" cy="106.758"-->
                                                        <!--                        r="82.422" fill="#5fcdff"-->
                                                        <!--                        opacity="1"-->
                                                        <!--                        data-original="#5fcdff"></circle>-->
                                                        <!--                    <path fill="#30b6ff"-->
                                                        <!--                        d="M247.357 106.75c0 45.535-36.909 82.424-82.424 82.424a83.206 83.206 0 0 1-15.151-1.394c38.283-7.111 67.273-40.666 67.273-81.03 0-40.344-28.99-73.899-67.273-81.01a83.214 83.214 0 0 1 15.151-1.394c45.515 0 82.424 36.889 82.424 82.404z"-->
                                                        <!--                        opacity="1" data-original="#30b6ff"-->
                                                        <!--                        class=""></path>-->
                                                        <!--                    <path fill="#73d7f9"-->
                                                        <!--                        d="M134.098 162.057c-13.23-14.62-21.29-34.02-21.29-55.31 0-40.34 28.97-73.9 67.28-81.01-4.91-.91-9.98-1.39-15.15-1.39-45.54 0-82.43 36.89-82.43 82.4 0 31.35 17.49 58.61 43.24 72.54l17.03 41.44 13.16-32.04c2.95.33 5.96.49 9 .49 5.17 0 10.24-.49 15.15-1.4a81.879 81.879 0 0 1-20.94-6.91 82.85 82.85 0 0 1-25.05-18.81z"-->
                                                        <!--                        opacity="1"-->
                                                        <!--                        data-original="#73d7f9"></path>-->
                                                        <!--                    <circle cx="164.928" cy="106.758"-->
                                                        <!--                        r="67.078" fill="#ffe2e2"-->
                                                        <!--                        opacity="1" data-original="#ffe2e2"-->
                                                        <!--                        class=""></circle>-->
                                                        <!--                    <path fill="#ffcfcf"-->
                                                        <!--                        d="M232.012 106.752c0 37.058-30.038 67.079-67.079 67.079-4.209 0-8.336-.395-12.331-1.134 31.156-5.787 54.749-33.096 54.749-65.945 0-32.833-23.593-60.142-54.749-65.929a67.703 67.703 0 0 1 12.331-1.134c37.041 0 67.079 30.021 67.079 67.063z"-->
                                                        <!--                        opacity="1" data-original="#ffcfcf"-->
                                                        <!--                        class=""></path>-->
                                                        <!--                    <path fill="#ffefee"-->
                                                        <!--                        d="M177.264 172.697a67.703 67.703 0 0 1-12.331 1.134c-37.058 0-67.08-30.021-67.08-67.079 0-37.042 30.021-67.063 67.08-67.063 4.209 0 8.336.395 12.331 1.134-31.172 5.787-54.749 33.096-54.749 65.929 0 32.849 23.576 60.157 54.749 65.945z"-->
                                                        <!--                        opacity="1" data-original="#ffefee"-->
                                                        <!--                        class=""></path>-->
                                                        <!--                    <path fill="#b76c6c"-->
                                                        <!--                        d="M151.021 114.298c6.607-11.444 23.124-11.444 29.731 0l5.921 10.256c6.607 11.444-1.652 25.748-14.866 25.748h-11.843c-13.214 0-21.473-14.305-14.866-25.748a34121 34121 0 0 0 5.923-10.256z"-->
                                                        <!--                        opacity="1"-->
                                                        <!--                        data-original="#b76c6c"></path>-->
                                                        <!--                    <path fill="#c98585"-->
                                                        <!--                        d="M178.217 149.094c-1.956.789-4.11 1.216-6.412 1.216h-11.838c-13.219 0-21.472-14.32-14.863-25.763 3.636-6.282 2.286-3.946 5.919-10.243 5.886-10.193 19.614-11.311 27.193-3.354a16.685 16.685 0 0 0-2.532 3.354c-3.633 6.297-2.283 3.961-5.919 10.243-5.457 9.454-.771 20.864 8.452 24.547z"-->
                                                        <!--                        opacity="1"-->
                                                        <!--                        data-original="#c98585"></path>-->
                                                        <!--                    <ellipse cx="148.118" cy="78.138"-->
                                                        <!--                        fill="#b76c6c" rx="9.246"-->
                                                        <!--                        ry="13.719"-->
                                                        <!--                        transform="rotate(-20 148.134 78.134)"-->
                                                        <!--                        opacity="1"-->
                                                        <!--                        data-original="#b76c6c"></ellipse>-->
                                                        <!--                    <ellipse cx="124.634" cy="104.137"-->
                                                        <!--                        fill="#b76c6c" rx="9.246"-->
                                                        <!--                        ry="13.719"-->
                                                        <!--                        transform="rotate(-20 124.65 104.138)"-->
                                                        <!--                        opacity="1"-->
                                                        <!--                        data-original="#b76c6c"></ellipse>-->
                                                        <!--                    <ellipse cx="181.745" cy="78.138"-->
                                                        <!--                        fill="#b76c6c" rx="13.719"-->
                                                        <!--                        ry="9.246"-->
                                                        <!--                        transform="rotate(-70 181.673 78.121)"-->
                                                        <!--                        opacity="1"-->
                                                        <!--                        data-original="#b76c6c"></ellipse>-->
                                                        <!--                    <ellipse cx="205.228" cy="104.137"-->
                                                        <!--                        fill="#b76c6c" rx="13.719"-->
                                                        <!--                        ry="9.246"-->
                                                        <!--                        transform="rotate(-70 205.145 104.111)"-->
                                                        <!--                        opacity="1"-->
                                                        <!--                        data-original="#b76c6c"></ellipse>-->
                                                        <!--                    <path fill="#44c7b6"-->
                                                        <!--                        d="M73.614 230.183c10.8 7.735 25.692 9.175 39.044 6.92 8.431-1.424 12.919-10.764 8.784-18.247l-17.384-31.455c-2.409-4.36-7.056-6.969-12.036-6.845-3.997.099-7.82-.466-11.427-1.695-10.969-3.736-27.711-18.653-32.189-35.565-2.521-9.521-9.29-24.041 1.843-48.949 2.893-6.471 7.794-11.628 14.345-15.159 3.825-2.061 6.22-6.052 6.484-10.389l2.307-37.903c.515-8.475-7.585-14.918-15.697-12.412-7.86 2.429-16.486 6.782-23.28 11.824-5.723 4.247-10.071 10.072-12.575 16.844 0 0-52.41 108.405 51.781 183.031z"-->
                                                        <!--                        opacity="1"-->
                                                        <!--                        data-original="#44c7b6"></path>-->
                                                        <!--                    <path fill="#4bdbc3"-->
                                                        <!--                        d="M108.918 237.627c-12.33 1.41-25.5-.43-35.3-7.44-104.19-74.63-51.78-183.03-51.78-183.03 2.5-6.78 6.85-12.6 12.57-16.85 6.79-5.04 15.42-9.39 23.28-11.82 3.76-1.16 7.52-.4 10.42 1.6-6.52 2.52-13.21 6.15-18.7 10.22-5.72 4.25-10.07 10.07-12.57 16.85 0 0-52.41 108.4 51.78 183.03 5.86 4.19 12.93 6.54 20.3 7.44z"-->
                                                        <!--                        opacity="1"-->
                                                        <!--                        data-original="#4bdbc3"></path>-->
                                                        <!--                    <g fill="#5f266d">-->
                                                        <!--                        <path-->
                                                        <!--                            d="M164.926 20.336c-47.653 0-86.422 38.769-86.422 86.422 0 31.289 16.854 60.028 44.081 75.353l16.488 40.135c1.361 3.307 6.049 3.29 7.4-.001l12.04-29.309c50.044 3.744 92.834-36.019 92.834-86.178.001-47.653-38.767-86.422-86.421-86.422zm-8.557 164.37a4 4 0 0 0-4.132 2.457l-9.463 23.035-13.323-32.43a3.997 3.997 0 0 0-1.796-1.997c-25.383-13.739-41.15-40.184-41.15-69.014 0-43.242 35.18-78.422 78.422-78.422s78.422 35.18 78.422 78.422c-.001 46.259-40.188 83.026-86.98 77.949z"-->
                                                        <!--                            fill="#5f266d" opacity="1"-->
                                                        <!--                            data-original="#5f266d"-->
                                                        <!--                            class=""></path>-->
                                                        <!--                        <path-->
                                                        <!--                            d="M164.927 35.681c-39.192 0-71.077 31.885-71.077 71.077s31.885 71.078 71.077 71.078 71.078-31.886 71.078-71.078-31.885-71.077-71.078-71.077zm0 134.155c-34.781 0-63.077-28.297-63.077-63.078s28.296-63.077 63.077-63.077 63.078 28.296 63.078 63.077-28.296 63.078-63.078 63.078z"-->
                                                        <!--                            fill="#5f266d" opacity="1"-->
                                                        <!--                            data-original="#5f266d"-->
                                                        <!--                            class=""></path>-->
                                                        <!--                        <path-->
                                                        <!--                            d="m190.137 122.554-5.922-10.256c-8.141-14.102-28.505-14.121-36.659 0l-5.921 10.256c-8.146 14.109 2.022 31.748 18.329 31.748h11.843c16.291 0 26.484-17.626 18.33-31.748zm-18.33 23.748h-11.843c-10.134 0-16.473-10.964-11.401-19.748l5.921-10.256c5.067-8.776 17.732-8.784 22.804 0l5.922 10.256c5.065 8.776-1.259 19.748-11.403 19.748zM154.178 94.789c7.009-2.551 9.748-11.948 6.386-21.181-3.338-9.172-11.452-14.69-18.507-12.121-6.979 2.541-9.784 11.845-6.387 21.182 3.395 9.324 11.518 14.663 18.508 12.12zm-9.384-25.784c2.321-.842 6.356 2.127 8.253 7.34 1.91 5.247.693 10.091-1.604 10.927-2.327.852-6.352-2.113-8.254-7.339-1.903-5.227-.722-10.081 1.605-10.928zM118.574 87.487c-7.009 2.551-9.748 11.948-6.386 21.181 3.395 9.329 11.52 14.662 18.507 12.12 6.979-2.54 9.784-11.844 6.387-21.181-3.337-9.165-11.444-14.692-18.508-12.12zm9.385 25.783c-2.321.85-6.351-2.111-8.253-7.339-1.912-5.253-.689-10.092 1.604-10.927 2.289-.836 6.338 2.077 8.254 7.339 1.902 5.228.722 10.08-1.605 10.927zM175.684 94.789c7.549 2.749 15.409-3.609 18.507-12.12 3.398-9.336.594-18.64-6.386-21.182-6.98-2.538-15.108 2.785-18.508 12.121-3.334 9.163-.676 18.61 6.387 21.181zm1.131-18.444c1.903-5.229 5.932-8.188 8.254-7.34 2.326.847 3.507 5.7 1.604 10.928-1.907 5.239-5.948 8.173-8.253 7.339-2.297-.837-3.515-5.679-1.605-10.927zM211.288 87.487c-6.992-2.547-15.138 2.866-18.507 12.12-3.335 9.159-.682 18.608 6.387 21.181 6.99 2.543 15.113-2.796 18.507-12.12 3.334-9.16.682-18.608-6.387-21.181zm-1.131 18.444c-1.901 5.226-5.925 8.188-8.253 7.339-2.3-.837-3.515-5.682-1.605-10.927 1.891-5.194 5.921-8.185 8.253-7.339 2.3.837 3.514 5.682 1.605 10.927zM201.757 142.006a47.382 47.382 0 0 1-10.471 8.966 4 4 0 1 0 4.262 6.77 55.384 55.384 0 0 0 12.238-10.476 4.002 4.002 0 0 0-.385-5.645 4.002 4.002 0 0 0-5.644.385zM178.644 156.63a58.415 58.415 0 0 1-6.386 1.488 4 4 0 0 0-3.248 4.631 3.997 3.997 0 0 0 4.631 3.248 66.56 66.56 0 0 0 7.263-1.693 4 4 0 0 0-2.26-7.674zM107.559 185.466c-3.126-5.657-9.095-9.061-15.637-8.91-3.509.088-6.894-.411-10.039-1.482-9.4-3.202-25.354-16.725-29.61-32.803a126.503 126.503 0 0 0-1.049-3.645c-2.768-9.278-6.559-21.984 2.677-42.648 2.534-5.669 6.771-10.134 12.592-13.271 4.94-2.663 8.227-7.899 8.577-13.666l2.307-37.902c.686-11.249-10.094-19.808-20.869-16.476-8.417 2.601-17.341 7.132-24.482 12.433-6.298 4.673-11.094 11.065-13.878 18.493-1.25 2.645-13.417 29.304-13.495 65.085-.073 34.178 11.427 83.22 66.633 122.761 11.754 8.419 27.796 10.018 42.039 7.612 11.292-1.907 17.019-14.356 11.619-24.126zm4.433 47.692c-14.065 2.378-27.205.106-36.049-6.228-42-30.082-63.294-69.086-63.291-115.928.002-35.164 12.656-61.848 12.783-62.11.483-1 2.893-9.091 11.357-15.373 6.349-4.712 14.602-8.903 22.076-11.214 5.452-1.684 10.869 2.659 10.523 8.347l-2.307 37.902c-.185 3.026-1.866 5.751-4.389 7.11-7.307 3.938-12.874 9.832-16.1 17.048-10.446 23.373-5.988 38.313-3.039 48.2.359 1.205.698 2.337.98 3.404 5.029 18.996 23.422 34.465 34.766 38.328 4.041 1.377 8.358 2.011 12.816 1.908 3.499-.079 6.758 1.744 8.437 4.781l17.384 31.455c2.809 5.084-.229 11.405-5.947 12.37z"-->
                                                        <!--                            fill="#5f266d" opacity="1"-->
                                                        <!--                            data-original="#5f266d"-->
                                                        <!--                            class=""></path>-->
                                                        <!--                    </g>-->
                                                        <!--                </g>-->
                                                        <!--            </svg> </i>-->
                                                        <!--        <div>-->
                                                        <!--            <h5 class="mt-1 font-14">-->
                                                        <!--                {{ $activedog['contact'] ?? 'N/A' }}-->
                                                        <!--            </h5>-->
                                                        <!--        </div>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                                @if (isset($activedog))
                                                    @if (Auth::user()->type == 0)
                                                        @if (Auth::user()->id != $activedog['user_id'] || $activedog['user_id'] == null)
                                                            <button type="button" onclick="claimtoggle()"
                                                                class="mt-3 btn btn-outline-success rounded-pill w-100">
                                                                <i class="uil-heart"></i>
                                                                @if (isset($activedog['status_name']) && $activedog['status_name'] == 'Lost Dog')
                                                                    Lost Dog
                                                                @else
                                                                    Claim Dog
                                                                @endif
                                                                <i class="uil-heart"></i>
                                                            </button>
                                                        @else
                                                            <button type="button"
                                                                class="mt-3 btn btn-outline-success rounded-pill w-100"
                                                                onclick="cancellostDog()">
                                                                Cancel Lost Dog </button>
                                                        @endif
                                                    @endif
                                                @endif
                                            </form>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                    <div class="container mt-3 d-none" id="claimformtoggle" wire:ignore>
                                        <div class="card shadow">
                                            <div class="card-header bg-warning text-white">
                                                <h5 class="card-title" id="form_title">Claim Form</h5>
                                                <h6 class="card-subtitle ">Every Information is important</h6>
                                            </div>
                                            <div class="py-3 px-3">

                                                <form class="needs-validation" id="claimcheckform" novalidate>
                                                    <div class="row">

                                                        <div class="mb-3 col-6">
                                                            <label class="form-label" for="validationCustom01">First
                                                                name</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom01" placeholder="First name"
                                                                wire:model="c_fname" required>
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-6">
                                                            <label class="form-label" for="validationCustom02">Last
                                                                name</label>
                                                            <input type="text" class="form-control"
                                                                id="validationCustom02" placeholder="Last name"
                                                                wire:model="c_lname" required>
                                                            <div class="valid-feedback">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="validationCustom04">Address</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="c_address" id="validationCustom04"
                                                            placeholder="Address" required>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid address.
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="validationCustom02">Gender</label>
                                                                <select class="form-select mb-3" required
                                                                    wire:model="c_gender">
                                                                    <option selected>Select gender</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="validationCustom02"
                                                                    id="proof"> </label>
                                                                <input type="file" class="form-control"
                                                                    id="validationCustom02file" placeholder=""
                                                                    accept="image/*" wire:model="c_proof"
                                                                    onchange="validateImage()" />
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="validationCustom02"
                                                                    id="lastloc"> </label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom02"
                                                                    placeholder="Last Location" wire:model="c_loc"
                                                                    required>
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3" wire:ignore>
                                                                <label class="form-label" for="validationCustom03"
                                                                    id="label_phonenumber_claim3">Contact Number</label>

                                                                <div class="input-group" wire:ignore.self>
                                                                    <input type="tel" class="form-control" wire:ignore.self
                                                                        id="phonenumber_claim3"
                                                                        placeholder="09123456789" required
                                                                        wire:model="c_contact" pattern="09[0-9]{9}"
                                                                        title="Phone number must start with 09 and contain exactly 11 digits."
                                                                        maxlength="11"
                                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11); validatePhoneNumber3(this);">

                                                                    <input type="number" wire:ignore.self class="form-control d-none"
                                                                        id="otp_input3" wire:model="otp_input"
                                                                        max="999999"
                                                                        oninput="this.value = this.value.slice(0, 6)"
                                                                        placeholder="Please input 6 digits code">

                                                                    <button class="btn btn-outline-secondary" wire:ignore.self
                                                                        id="verify_button3" type="button"
                                                                        wire:click="verifyMobile('lostdog')"
                                                                        disabled>Verify</button>

                                                                    <button class="btn btn-outline-secondary d-none" wire:ignore.self
                                                                        id="verify_otp3" type="button"
                                                                        wire:click="checkOTP">Submit</button>
                                                                </div>
                                                                <small id="resend_container3" wire:ignore.self>
                                                                  
                                                                </small>
                                                                
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid phone number.
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom05">Dog
                                                            Description</label>
                                                        <textarea class="form-control" rows="4" wire:model="c_desc" required></textarea>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid reason.
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="invalidCheck" required wire:model="a_tos">
                                                            <label class="form-check-label form-label"
                                                                for="invalidCheck">Agree to <a class="text-primary"
                                                                    onclick="openTerms()">
                                                                    terms and conditions </a> </label>
                                                            <div class="invalid-feedback">
                                                                You must agree before submitting.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success d-none" id="claim_dog" wire:ignore>Confirm
                        Claim</button>
                    <button type="button" class="btn btn-success d-none" id="claimhidden_dog"
                        wire:click="confirmclaim">Confirm Claim</button>
                    @if (Auth::user()->type == 1)
                        <button type="button" class="btn btn-success" onclick="confirmApprove()" wire:ignore>Approve
                            Request</button>
                        <button type="button" class="btn btn-danger" onclick="confirmReject()" wire:ignore>Reject
                            Request</button>

                        <button type="button" class="btn btn-success d-none" id="reject_fdog"
                            wire:click="rejectDRequest">Reject Request</button>
                        <button type="button" class="btn btn-success d-none" id="approve_fdog"
                            wire:click="approveDRequest">Approve Request</button>
                    @endif
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="adoptdog" tabindex="100" style="z-index: 10051 !important;" role="dialog"
        wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white" id="myLargeModalLabel">Adoption Form</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="request_rounds" class="modal fade" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">Request Rounds</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>



                <div class="modal-body" id="add_requestR">
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom01">Requestor</label>
                        <input type="text" class="form-control" id="validationCustom01"
                            placeholder="First name" value="{{ Auth::user()->name }}" disabled>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="fulladdress">Address, where you want rounds to be
                            conducted</label>
                        <input type="text" class="form-control" id="fulladdressR" placeholder="Full address"
                            wire:model="fulladdress" required>
                        <div class="invalid-feedback">
                            Please provide a valid address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom03">Barangay</label>
                        <select class="form-select mb-3" wire:model="barangay" id="barangayR" required>
                            <option value="" selected>Select a Barangay</option>
                            <option value="Bagbaguin">Bagbaguin</option>
                            <option value="Bulac">Bulac</option>
                            <option value="Balasing">Balasing</option>
                            <option value="Beunavista">Beunavista</option>
                            <option value="Camangyanan">Camangyanan</option>
                            <option value="Catmon">Catmon</option>
                            <option value="Caypombo">Caypombo</option>
                            <option value="Caysio">Caysio</option>
                            <option value="Guyong">Guyong</option>
                            <option value="Lalakhan">Lalakhan</option>
                            <option value="Mag-asawang sapa">Mag-asawang Sapa</option>
                            <option value="Mahabang parang">Mahabang Parang</option>
                            <option value="Manggahan">Manggahan</option>
                            <option value="Parada">Parada</option>
                            <option value="Poblacion">Poblacion</option>
                            <option value="Pulong Buhangin">Pulong Buhangin</option>
                            <option value="San Gabriel">San Gabriel</option>
                            <option value="San Jose Patag">San Jose Patag</option>
                            <option value="San Vicente">San Vicente</option>
                            <option value="Santa Clara">Santa Clara</option>
                            <option value="Santa Cruz">Santa Cruz</option>
                            <option value="Silangan">Silangan</option>
                            <option value="Tabing Bakod">Tabing Bakod</option>
                            <option value="Tumana">Tumana</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a barangay.
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3" wire:ignore>
                            <label class="form-label" for="validationCustom03"
                                id="label_phonenumber_claim2">Contact Number</label>

                            <div class="input-group" wire:ignore.self>
                                <input type="tel" class="form-control" wire:ignore.self
                                    id="phonenumber_claim2"
                                    placeholder="09123456789" required
                                    wire:model="contact" pattern="09[0-9]{9}"
                                    title="Phone number must start with 09 and contain exactly 11 digits."
                                    maxlength="11"
                                    oninput=" validatePhoneNumber2(this);">

                                <input type="number" wire:ignore.self class="form-control d-none"
                                    id="otp_input2" wire:model="otp_input"
                                    max="999999"
                                    oninput="this.value = this.value.slice(0, 6)"
                                    placeholder="Please input 6 digits code">

                                <button class="btn btn-outline-secondary" wire:ignore.self
                                    id="verify_button2" type="button"
                                    wire:click="verifyMobile('rounds')"
                                    disabled>Verify</button>
                                <button class="btn btn-outline-secondary d-none" wire:ignore.self
                                    id="verify_otp2" type="button"
                                    wire:click="checkOTP">Submit</button>
                            </div>
                            <small id="resend_container2" wire:ignore.self>
                              
                            </small>
                            
                            <div class="invalid-feedback">
                                Please provide a valid phone number.
                            </div>
                        </div>
                    </div>
                    {{-- 
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom04">Specific Locations, Mention any particular
                                spots</label>
                            <input type="text" class="form-control" id="validationCustom04"
                                placeholder="ex. New york street" wire:model="specificloc" required>
                            <div class="invalid-feedback">
                                Please provide a valid locations.
                            </div>
                        </div> --}}
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom04">Reason for request</label>
                        <textarea class="form-control" id="reasonR" rows="5" placeholder="Enter a reason..." required
                            wire:model="reason"></textarea>
                        <div class="invalid-feedback">
                            Please provide a valid reason.
                        </div>
                    </div>
                    {{-- <div class="mb-3">
                            <label class="form-label" for="validationCustom05">Preferred Schedule</label>
                            <input type="text" id="datetime-datepicker" class="form-control"
                                placeholder="Date and Time" wire:model="schedule">
                            <div class="invalid-feedback">
                                Please provide a valid schedule.
                            </div>
                        </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary text-white" onclick="saveRounds()">Submit
                        Request</button>
                    <button type="button " class="btn btn-primary d-none" id="real_btn_rounds"
                        wire:click="saveRounds">Submit Request</button>

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="terms-modal" class="modal" data-bs-backdrop="static" style="z-index: 1000000000;" tabindex="-1"
        role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Terms and Conditions for Adopting or Claiming a
                        Dog</h4>
                    <button type="button" class="btn-close" onclick="closeTerms()"></button>
                </div>
                <div class="modal-body">
                    <h5>1. Agreement to Provide a Safe and Caring Environment</h5>
                    <p>By adopting or claiming a dog, you agree to provide a safe, loving, and healthy environment for
                        the dog, including adequate food, water, shelter, and companionship.</p>

                    <h5>2. Health and Medical Care Responsibility</h5>
                    <p>You acknowledge that it is your responsibility to provide regular veterinary care, including
                        vaccinations, flea prevention, deworming, and any other necessary medical treatments.</p>
                    <p>If adopting, you accept that any known health conditions of the dog have been disclosed to you
                        and that the dog pound is not responsible for future health issues that may arise.</p>

                    <h5>3. Spay/Neuter Requirement</h5>
                    <p>All adopted dogs must be spayed or neutered, either before adoption or within a specified time
                        frame if not already done. If adopting an unaltered dog, you agree to follow through with this
                        requirement and provide proof of completion to the dog pound.</p>

                    <h5>4. Compliance with Local Laws</h5>
                    <p>You agree to abide by all local, state, and federal regulations regarding dog ownership,
                        including but not limited to licensing, leash laws, and breed-specific legislation (where
                        applicable).</p>

                    <h5>5. No Return Policy or Limited Return Period</h5>
                    <p>If you decide you are unable to care for the dog, you agree to return the dog to the pound or
                        rehome the dog responsibly. Some adoption facilities may have a limited return period or may
                        require approval before rehoming.</p>

                    <h5>6. Non-Transferable Adoption</h5>
                    <p>The adopted or claimed dog is non-transferable, meaning it may not be sold, gifted, or
                        transferred to another individual without prior consent from the dog pound.</p>

                    <h5>7. Home Check and Follow-Up</h5>
                    <p>You may be subject to a home visit or follow-up check within a specified time frame after
                        adoption to ensure the dog is being well cared for.</p>

                    <h5>8. Waiver of Liability</h5>
                    <p>You release the dog pound from any liability arising from the dog’s behavior or any incidents
                        involving the dog after adoption or claim. This includes any harm or damage the dog may cause to
                        property, people, or other animals.</p>

                    <h5>9. Disclosure of Information</h5>
                    <p>You agree to provide accurate information during the adoption or claim process, including details
                        of any previous pets, living situation, and household members to ensure the adoption is in the
                        dog’s best interest.</p>

                    <h5>10. Financial Responsibility</h5>
                    <p>You understand that any fees paid for the adoption are non-refundable and that all future costs
                        related to the dog’s care, including but not limited to food, supplies, grooming, and medical
                        expenses, are solely your responsibility.</p>

                    <h5>11. Commitment to Training and Socialization</h5>
                    <p>You commit to providing proper training, socialization, and, if necessary, behavioral
                        interventions for the dog. This includes but is not limited to basic obedience training,
                        housebreaking, and social interaction.</p>

                    <h5>12. Right to Reclaim</h5>
                    <p>The dog pound reserves the right to reclaim the dog if it is discovered that any of the above
                        terms and conditions are violated or if the dog is found to be in an unsafe environment.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" onclick="closeTerms()">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="addmorebreed" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Add Dog Breed</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Breed name</label>
                        <input type="text" id="breed_name_add" class="form-control" wire:model="breedName">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary text-white" onclick="addbreed()"
                        data-bs-dismiss="modal">Submit</button>
                    <button type="button" class="btn btn-primary text-white d-none" id="confirmedBreed"
                        wire:click="addDogBreed" data-bs-dismiss="modal">Submit</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="create_aa" class="modal fade" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel">Create Annoucements</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="add_annoucment">
                    <div class="modal-body">
                        <label for="a_title" class="form-label">Title</label>
                        <input type="text" id="a_title" wire:model="a_title" class="form-control" required>

                        <label for="sub_title" class="form-label mt-2">Sub Title</label>
                        <input type="text" id="sub_title" wire:model="sub_title" class="form-control mb-2"
                            required>

                        <label for="snow-editor" class="form-label mt-2">Messages</label>
                        <div id="snow-editor" class="mt-2" style="height: auto;">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary text-white"
                            onclick="fconfirm()">Submit</button>
                        <button type="button" class="btn btn-primary d-none" id="saveannouce"
                            wire:click="saveAnnoucement">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="update_aa" class="modal fade" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel">Create Annoucements</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="add_annoucment2">
                    <div class="modal-body">
                        <label for="a_title" class="form-label">Title</label>
                        <input type="text" id="a_title" wire:model="edit_a_title" class="form-control"
                            required value="{{ $edit_a_title ?? 'N/A' }}">

                        <label for="sub_title" class="form-label mt-2">Sub Title</label>
                        <input type="text" id="sub_title" wire:model="edit_sub_title"
                            class="form-control mb-2" value="{{ $edit_sub_title ?? 'N/A' }}" required>

                        <label for="snow-editor2" class="form-label mt-2">Messages</label>
                        <div id="snow-editor2" class="mt-2" style="height: auto;">
                            {!! $edit_message ?? 'N/A' !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary text-white"
                            onclick="fconfirm2()">Submit</button>

                        <button type="button" class="btn btn-primary d-none text-white" id="saveUpdateAnnounce"
                            wire:click="saveUpdateAnnounce">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function validatePhoneNumber(input) {
            const button2 = document.getElementById('verify_button');
            const phoneNumber3 = input.value.trim();

            // Check if the input is 11 digits and starts with '09'
            if (/^09\d{9}$/.test(phoneNumber3)) {
                button2.disabled = false; // Enable button
                console.log('Valid phone number. Button enabled.');
            } else {
                button2.disabled = true; // Disable button
                console.log('Invalid phone number. Button disabled.');
            }
        }

        function validatePhoneNumber3(input) {
            const button4 = document.getElementById('verify_button3');
            const phoneNumber4 = input.value.trim();

            // Check if the input is 11 digits and starts with '09'
            if (/^09\d{9}$/.test(phoneNumber4)) {
                button4.disabled = false; // Enable button
                console.log('Valid phone number. Button enabled.');
            } else {
                button4.disabled = true; // Disable button
                console.log('Invalid phone number. Button disabled.');
            }
        }
        function validatePhoneNumber4(input) {
            const button4 = document.getElementById('verify_button4');
            const phoneNumber4 = input.value.trim();

            // Check if the input is 11 digits and starts with '09'
            if (/^09\d{9}$/.test(phoneNumber4)) {
                button4.disabled = false; // Enable button
                console.log('Valid phone number. Button enabled.');
            } else {
                button4.disabled = true; // Disable button
                console.log('Invalid phone number. Button disabled.');
            }
        }
        function validatePhoneNumber2(input) {
            // Enable or disable the button based on the phone number's validity
            const button = document.getElementById('verify_button2');
            const phoneNumber = input.value.trim(); // Remove any leading/trailing spaces
            
            // Check if the input is 11 digits and starts with '09'
            if (/^09\d{9}$/.test(phoneNumber)) {
                button.disabled = false; // Enable button
            } else {
                button.disabled = true; // Disable button
            }
        }

        function changeInput() {
            // Toggle visibility of phone number and OTP input
            document.getElementById('phonenumber_claim').classList.toggle('d-none');
            document.getElementById('otp_input').classList.toggle('d-none');
            document.getElementById('verify_otp').classList.toggle('d-none');
            document.getElementById('verify_button').classList.toggle('d-none');

            // Change the label text
            const label = document.getElementById('label_phonenumber_claim');
            label.textContent = label.textContent === "Contact Number" ? "OTP" : "Contact Number";

            // Reset the phone number input when switching back
            if (!document.getElementById('phonenumber_claim').classList.contains('d-none')) {
                document.getElementById('phonenumber_claim').value = ''; // Reset the phone number input
                document.getElementById('otp_input').value = ''; // Clear OTP input
            }
        }
        function changeInput2() {
            // Toggle visibility of phone number and OTP input
            document.getElementById('phonenumber_claim2').classList.toggle('d-none');
            document.getElementById('otp_input2').classList.toggle('d-none');
            document.getElementById('verify_otp2').classList.toggle('d-none');
            document.getElementById('verify_button2').classList.toggle('d-none');

            // Change the label text
            const label = document.getElementById('label_phonenumber_claim2');
            label.textContent = label.textContent === "Contact Number" ? "OTP" : "Contact Number";

            // Reset the phone number input when switching back
            if (!document.getElementById('phonenumber_claim2').classList.contains('d-none')) {
                document.getElementById('phonenumber_claim2').value = ''; // Reset the phone number input
                document.getElementById('otp_input2').value = ''; // Clear OTP input
            }
        }
        function changeInput3() {
            // Toggle visibility of phone number and OTP input
            document.getElementById('phonenumber_claim3').classList.toggle('d-none');
            document.getElementById('otp_input3').classList.toggle('d-none');
            document.getElementById('verify_otp3').classList.toggle('d-none');
            document.getElementById('verify_button3').classList.toggle('d-none');

            // Change the label text
            const label = document.getElementById('label_phonenumber_claim3');
            label.textContent = label.textContent === "Contact Number" ? "OTP" : "Contact Number";

            // Reset the phone number input when switching back
            if (!document.getElementById('phonenumber_claim3').classList.contains('d-none')) {
                document.getElementById('phonenumber_claim3').value = ''; // Reset the phone number input
                document.getElementById('otp_input3').value = ''; // Clear OTP input
            }
        }
        function changeInput4() {
            // Toggle visibility of phone number and OTP input
            document.getElementById('phonenumber_claim4').classList.toggle('d-none');
            document.getElementById('otp_input4').classList.toggle('d-none');
            document.getElementById('verify_otp4').classList.toggle('d-none');
            document.getElementById('verify_button4').classList.toggle('d-none');

            // Change the label text
            const label = document.getElementById('label_phonenumber_claim4');
            label.textContent = label.textContent === "Contact Number" ? "OTP" : "Contact Number";

            // Reset the phone number input when switching back
            if (!document.getElementById('phonenumber_claim4').classList.contains('d-none')) {
                document.getElementById('phonenumber_claim4').value = ''; // Reset the phone number input
                document.getElementById('otp_input4').value = ''; // Clear OTP input
            }
        }

        function validateImage() {
            const fileInput = document.getElementById('validationCustom02file');
            const file = fileInput.files[0];

            if (file) {
                const fileType = file.type.split('/')[0]; // Get the type (e.g., image)

                // Check if the file is an image
                if (fileType !== 'image') {
                    // Display SweetAlert error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid file type',
                        text: 'Only images are allowed!',
                        toast: true, // Enable toast mode
                        position: 'top-end', // Position the toast at the top-right
                        showConfirmButton: false, // Hide the confirm button
                        timer: 3000, // Toast duration (3 seconds)
                        timerProgressBar: true, // Show progress bar
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    // Clear the file input
                    fileInput.value = '';
                }
            }
        }

        function cancellostDog() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to cancel?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('cancelPosing');
                    Swal.fire(
                        'Cancelled!',
                        'The lost dog report has been successfully canceled.',
                        'success'
                    );
                    closeAllModals();
                }
            });
        }


        function validateFiles(event) {
            const files = event.target.files;
            const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
            let invalidFile = false;

            // Check each file's type
            for (let i = 0; i < files.length; i++) {
                if (!validImageTypes.includes(files[i].type)) {
                    invalidFile = true;
                    break;
                }
            }

            if (invalidFile) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid File',
                    text: 'Only image files are allowed!',
                });

                // Clear the file input
                event.target.value = '';
            }
        }


        function confirmApprove() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to approve this request?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('approve_fdog').click();
                    Swal.fire({
                        icon: 'success',
                        title: 'Approved!',
                        text: 'The request has been approved successfully.',
                        confirmButtonColor: '#28a745'
                    });
                    closeAllModals();
                }
            });
        }

        function confirmReject() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to reject this request?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#28a745',
                confirmButtonText: 'Yes, reject it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('reject_fdog').click();
                    Swal.fire({
                        icon: 'success',
                        title: 'Rejected!',
                        text: 'The request has been rejected successfully.',
                        confirmButtonColor: '#d33'
                    });
                    closeAllModals();

                }
            });
        }

        function fconfirm2() {
            var add_annoucment = document.getElementById('add_annoucment2');
            add_annoucment.classList.add('was-validated');
            if (!add_annoucment.checkValidity()) {
                // Form is incomplete or invalid, prevent further action
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end', // Position of the toast
                    showConfirmButton: false,
                    timer: 3000, // Duration before the toast disappears (in milliseconds)
                    timerProgressBar: true,
                });
                Toast.fire({
                    icon: 'warning',
                    title: 'Please fill out all required fields.'
                });
                return false; // Stop further actions
            }

            var quilltext2 = document.getElementById('snow-editor2');
            const htmlContent2 = quilltext2.innerHTML;

            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to update this form?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.set('edit_message', htmlContent2);
                    document.getElementById('saveUpdateAnnounce').click();
                    closeAllModals();
                    Swal.fire({
                        icon: 'success',
                        title: 'Saved Successfully',
                        text: 'The announcement successfully updated',
                        confirmButtonText: 'Okay'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            });
        }

        function fconfirm() {
            var add_annoucment = document.getElementById('add_annoucment');
            add_annoucment.classList.add('was-validated');
            if (!add_annoucment.checkValidity()) {
                // Form is incomplete or invalid, prevent further action
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end', // Position of the toast
                    showConfirmButton: false,
                    timer: 3000, // Duration before the toast disappears (in milliseconds)
                    timerProgressBar: true,
                });
                Toast.fire({
                    icon: 'warning',
                    title: 'Please fill out all required fields.'
                });
                return false; // Stop further actions
            }

            var quilltext = document.getElementById('snow-editor');
            const htmlContent = quilltext.innerHTML;
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to save this form?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.set('texteditor', htmlContent);
                    document.getElementById('saveannouce').click();
                    closeAllModals();
                    Swal.fire({
                        icon: 'success',
                        title: 'Saved Successfully',
                        text: 'The announcement will now be posted.',
                        confirmButtonText: 'Okay'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Reload the page
                            location.reload();
                        }
                    });



                }
            });
        }
        var quill = new Quill('#snow-editor', {
            theme: 'snow',
            modules: {
                imageResize: {
                    displaySize: true
                },
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'align': []
                    }],
                    ['link', 'image'],

                    ['clean']
                ]
            }
        });

        function claimtoggle() {
            var claim_dog = document.getElementById('claim_dog');
            var claimformtoggle = document.getElementById('claimformtoggle');

            claim_dog.classList.toggle('d-none');
            claimformtoggle.classList.toggle('d-none');

            toggledclaim = true;
        }

        function clearForm() {
            var claimformtoggle = document.getElementById('claimformtoggle');

            // Clear input fields
            var inputs = claimformtoggle.querySelectorAll('input');
            inputs.forEach(function(input) {
                if (input.type === 'checkbox' || input.type === 'radio') {
                    input.checked = false; // Uncheck checkboxes and radio buttons
                } else {
                    input.value = ''; // Clear other input types (text, number, etc.)
                }
            });

            // Clear select options
            var selects = claimformtoggle.querySelectorAll('select');
            selects.forEach(function(select) {
                select.selectedIndex = -1; // Deselect selected option
            });

            // Clear textareas
            var textareas = claimformtoggle.querySelectorAll('textarea');
            textareas.forEach(function(textarea) {
                textarea.value = ''; // Clear text area contents
            });
        }
    </script>
    <script>
        var toggledclaim = false;
        let timerInterval;
        let timerInterval2;

        let countdownTime = 60; // Countdown time in seconds
        let countdownTime2 = 10; // Countdown time in seconds

        let resend_otp = false;
        try {
            document.getElementById('create_aa').addEventListener('show.bs.modal', function() {
                document.getElementById('annc_active').classList.add('active')
            });
            document.getElementById('create_aa').addEventListener('hide.bs.modal', function() {
                document.getElementById('annc_active').classList.remove('active')
                activeElement.classList.add('active');
            });

            document.getElementById('request_rounds').addEventListener('show.bs.modal', function() {
                document.getElementById('rounds_active').classList.add('active')
            });

            document.getElementById('request_rounds').addEventListener('hide.bs.modal', function() {
                document.getElementById('rounds_active').classList.remove('active')
                activeElement.classList.add('active');
            });

            document.getElementById('lostandfounddog').addEventListener('show.bs.modal', function() {
                document.getElementById('lostandfoudSelect').classList.add('active')
            });

            document.getElementById('lostandfounddog').addEventListener('hide.bs.modal', function() {
                document.getElementById('lostandfoudSelect').classList.remove('active')
                activeElement.classList.add('active');
            });

        } catch (error) {

        }



        function closeAllModals() {
            // Select all modals
            const modals = document.querySelectorAll('.modal.show');

            // Loop through each modal and hide it
            modals.forEach(modal => {
                const bootstrapModal = bootstrap.Modal.getInstance(modal);
                if (bootstrapModal) {
                    bootstrapModal.hide();
                }
            });

            // Remove all backdrop elements
            const backdrops = document.querySelectorAll('.modal-backdrop');
            backdrops.forEach(backdrop => {
                backdrop.parentNode.removeChild(backdrop); // Remove each backdrop
            });
        }

        function saveRounds() {

            var add_requestR = document.getElementById('add_requestR');
            add_requestR.classList.add('was-validated');



            const fulladdress = document.getElementById('fulladdressR').value.trim();
            const barangaySelect = document.getElementById('barangayR');
            const barangay = barangaySelect.options[barangaySelect.selectedIndex].value; // Get the selected value
            const contact = document.getElementById('phonenumber_claim2');
            const reason = document.getElementById('reasonR').value.trim();

            // Initialize an array to hold missing field names
            let missingFields = [];

            // Check each field and add to missingFields if empty or invalid
            if (!fulladdress) missingFields.push('Address');
            if (!barangay || barangay === 'Select a Barangay') missingFields.push('Barangay'); // Validate selected value
            if (!contact.value.trim() || !contact.classList.contains('verified')) {
                missingFields.push('Contact number');
                contact.classList.add('is-invalid');
            }else{

            }
            if (!reason) missingFields.push('Reason for request');

            // If there are missing fields, show a warning toast
            if (missingFields.length > 0) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });

                Toast.fire({
                    icon: 'warning',
                    title: 'Please fill out all required fields.'
                });

                return; // Stop the submission process
            }


            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to request rounds?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var phone_clear = document.getElementById('phonenumber_claim2');
                    phone_clear.disabled = false;
                    phone_clear.classList.remove('verified','is-valid')
                    document.getElementById('verify_button2').classList.toggle('d-none');
                    phone_clear.value = ''; // Reset the phone number input
                    document.getElementById('otp_input2').value = ''; // Clear OTP input

                    document.getElementById('real_btn_rounds').click();

                }
            });
        }

        function addbreed() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to add this breed to the list?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('confirmedBreed').click();
                    let newBreedId = "new-breed-id";
                    let newBreedName = "New Breed Name";

                    let newOption = document.createElement('option');
                    newOption.value = newBreedId;
                    newOption.textContent = newBreedName;

                    document.getElementById('dog-breed').appendChild(newOption);
                    breed_name_add
                }
            });
        }



        function confimSaveAdd() {
            var form3 = document.getElementById('formadddog');

            form3.classList.add('was-validated');

            if (!form3.checkValidity()) {
                // Form is incomplete or invalid, prevent further action
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end', // Position of the toast
                    showConfirmButton: false,
                    timer: 3000, // Duration before the toast disappears (in milliseconds)
                    timerProgressBar: true,
                });
                Toast.fire({
                    icon: 'warning',
                    title: 'Please fill out all required fields.'
                });

                return false; // Stop further actions
            }
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to save this form?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('saveDogData');
                }
            });
        }


        function openTerms() {
            $('#terms-modal').modal('show');
        }

        function closeTerms() {
            $('#terms-modal').modal('hide');
        }

        function startCountdown() {
            const resendContainer = document.getElementById("resend_container");

            // Clear any existing interval to avoid multiple timers
            if (timerInterval) {
                clearInterval(timerInterval);
            }

            // Update the inner HTML with the countdown
            resendContainer.innerHTML = `<small>You can resend in <span id="countdown_time">${countdownTime}</span> seconds.</small>`;

            // Start the timer
            timerInterval = setInterval(() => {
                countdownTime--;

                // Update the countdown text
                document.getElementById("countdown_time").textContent = countdownTime;

                // When the countdown reaches 0
                if (countdownTime <= 0) {
                    clearInterval(timerInterval); // Stop the timer
                    countdownTime = 60; // Reset for next use

                    // Restore the "resend" link
                    resendContainer.innerHTML = `
                        <small>
                            Click <a class="text-primary" onclick="resendOTP()">here</a> to resend
                        </small>
                    `;
                }
            }, 1000);
        }
        function startCountdown2() {
            const resendContainer = document.getElementById("resend_container2");
            // Clear any existing interval to avoid multiple timers
            if (timerInterval2) {
                clearInterval(timerInterval2);
            }

            // Update the inner HTML with the countdown
            resendContainer.innerHTML = `<small>You can resend in <span id="countdown_time2">${countdownTime2}</span> seconds.</small>`;

            // Start the timer
            timerInterval2 = setInterval(() => {
                countdownTime2--;

                // Update the countdown text
                document.getElementById("countdown_time2").textContent = countdownTime2;

                // When the countdown reaches 0
                if (countdownTime2 <= 0) {
                    clearInterval(timerInterval2); // Stop the timer
                    countdownTime2 = 60; // Reset for next use

                    // Restore the "resend" link
                    resendContainer.innerHTML = `
                        <small>
                            Click <a class="text-primary" onclick="resendOTP2()">here</a> to resend
                        </small>
                    `;
                }
            }, 1000);
        }
        function startCountdown3() {
            const resendContainer = document.getElementById("resend_container3");
            // Clear any existing interval to avoid multiple timers
            if (timerInterval2) {
                clearInterval(timerInterval2);
            }

            // Update the inner HTML with the countdown
            resendContainer.innerHTML = `<small>You can resend in <span id="countdown_time3">${countdownTime2}</span> seconds.</small>`;

            // Start the timer
            timerInterval2 = setInterval(() => {
                countdownTime2--;

                // Update the countdown text
                document.getElementById("countdown_time3").textContent = countdownTime2;

                // When the countdown reaches 0
                if (countdownTime2 <= 0) {
                    clearInterval(timerInterval2); // Stop the timer
                    countdownTime2 = 60; // Reset for next use

                    // Restore the "resend" link
                    resendContainer.innerHTML = `
                        <small>
                            Click <a class="text-primary" onclick="resendOTP3()">here</a> to resend
                        </small>
                    `;
                }
            }, 1000);
        }
        function startCountdown4() {
            const resendContainer = document.getElementById("resend_container4");
            // Clear any existing interval to avoid multiple timers
            if (timerInterval2) {
                clearInterval(timerInterval2);
            }

            // Update the inner HTML with the countdown
            resendContainer.innerHTML = `<small>You can resend in <span id="countdown_time4">${countdownTime2}</span> seconds.</small>`;

            // Start the timer
            timerInterval2 = setInterval(() => {
                countdownTime2--;

                // Update the countdown text
                document.getElementById("countdown_time4").textContent = countdownTime2;

                // When the countdown reaches 0
                if (countdownTime2 <= 0) {
                    clearInterval(timerInterval2); // Stop the timer
                    countdownTime2 = 60; // Reset for next use

                    // Restore the "resend" link
                    resendContainer.innerHTML = `
                        <small>
                            Click <a class="text-primary" onclick="resendOTP4()">here</a> to resend
                        </small>
                    `;
                }
            }, 1000);
        }
        function resendOTP(){
            resend_otp = true;
            Livewire.dispatch('verifyMobile',{
                request:'requestdog'
            });
            startCountdown();
        }
        function resendOTP2(){
            resend_otp = true;
            Livewire.dispatch('verifyMobile',{
                request:'rounds'
            });
            startCountdown2();
        }

        function resendOTP3(){
            resend_otp = true;
            Livewire.dispatch('verifyMobile',{
                request:'lostdog'
            });
            startCountdown3();
        }
        function resendOTP4(){
            resend_otp = true;
            Livewire.dispatch('verifyMobile',{
                request:'adoptdog'
            });
            startCountdown4();
        }


        document.getElementById('adoptiontoggle').addEventListener('click', function() {
            var adopt_dog = document.getElementById('adopt_dog');
            var adoptionform = document.getElementById('adoptionform');


            adopt_dog.classList.toggle('d-none');
            adoptionform.classList.toggle('d-none');
        });

        document.getElementById('claim_dog').addEventListener('click', function() {
            var form2 = document.getElementById('claimcheckform');
            var phone_dog_c = document.getElementById('phonenumber_claim3');
        
     
       
            form2.classList.add('was-validated');

            if (!form2.checkValidity()) {
                // Form is incomplete or invalid, prevent further action
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end', // Position of the toast
                    showConfirmButton: false,
                    timer: 3000, // Duration before the toast disappears (in milliseconds)
                    timerProgressBar: true,
                });
                Toast.fire({
                    icon: 'warning',
                    title: 'Please fill out all required fields.'
                });
                return false; // Stop further actions
            }

            if(!phone_dog_c.classList.contains('verified')){
                phone_dog_c.classList.add('is-invalid');
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end', // Position of the toast
                    showConfirmButton: false,
                    timer: 3000, // Duration before the toast disappears (in milliseconds)
                    timerProgressBar: true,
                });
                Toast.fire({
                    icon: 'warning',
                    title: 'Please verify your phone number'
                });  
                return;
            }

            Swal.fire({

                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('claimhidden_dog').click();
                    clearForm();
                    form2.classList.remove('was-validated');
                }
            });

        });



        document.getElementById('adopt_dog').addEventListener('click', function() {
            var form = document.getElementById('checkform');
            var phone_dog_a = document.getElementById('phonenumber_claim4');

            // Add 'was-validated' class to trigger Bootstrap validation styles
            form.classList.add('was-validated');

            // Check if all required fields are filled and valid
            if (!form.checkValidity()) {
                // Form is incomplete or invalid, prevent further action
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end', // Position of the toast
                    showConfirmButton: false,
                    timer: 3000, // Duration before the toast disappears (in milliseconds)
                    timerProgressBar: true,
                });
                Toast.fire({
                    icon: 'warning',
                    title: 'Please fill out all required fields. '
                });
                return false; // Stop further actions
            }

            if(!phone_dog_a.classList.contains('verified')){
                phone_dog_a.classList.add('is-invalid');
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end', // Position of the toast
                    showConfirmButton: false,
                    timer: 3000, // Duration before the toast disappears (in milliseconds)
                    timerProgressBar: true,
                });
                Toast.fire({
                    icon: 'warning',
                    title: 'Please verify your phone number'
                });  
                return;
            }
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to confirm the adoption?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, confirm it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('hidden_dog').click();

                }
            });
        });

        document.addEventListener('livewire:init', function() {

            Livewire.on('activedogModal', event => {
                if (event[0] == 'Lost Dog') {

                    document.getElementById('form_title').textContent = 'Lost Dog Form';
                    document.getElementById('claim_dog').textContent = 'Confim Lost Dog';
                    document.getElementById('proof').textContent = 'Proof of Lost Dog';
                    document.getElementById('lastloc').textContent = 'Last Location Seen';
                } else {
                    document.getElementById('form_title').textContent = 'Claim Form';
                    document.getElementById('claim_dog').textContent = 'Confim Claim';
                    document.getElementById('proof').textContent = 'Proof of Ownership';
                    document.getElementById('lastloc').textContent = 'Last Location';

                }
            });
            Livewire.on('otp_result', event => {
                console.log(event);
                
                if(event[1] == 'rounds'){
                    var phone = document.getElementById('phonenumber_claim2');
                    var otp_input = document.getElementById('otp_input2');
                    if (event[0]) {
                        changeInput2();
                        phone.disabled = true;
                        phone.classList.remove('is-invalid')
                        phone.classList.add('verified', 'is-valid')
                        phone.value = event[2];
                        document.getElementById('verify_button2').classList.toggle('d-none');
                        document.getElementById('resend_container2').classList.toggle('d-none');
                    }else{
                        otp_input.classList.add('is-invalid')
                    }
                }else if(event[1] == 'lostdog'){
                    var phone = document.getElementById('phonenumber_claim3');
                    var otp_input = document.getElementById('otp_input3');
                    if (event[0]) {
                        changeInput3();
                        phone.disabled = true;
                        phone.classList.remove('is-invalid')
                        phone.classList.add('verified', 'is-valid')
                        phone.value = event[2];

                        document.getElementById('verify_button3').classList.toggle('d-none');
                        document.getElementById('resend_container3').classList.toggle('d-none');
                    }else{
                        otp_input.classList.add('is-invalid')
                    }
                }else if(event[1] == 'requestdog'){
                    var phone = document.getElementById('phonenumber_claim');
                    var otp_input = document.getElementById('otp_input');
                    if (event[0]) {
                        changeInput();
                        phone.disabled = true;
                        phone.classList.remove('is-invalid')
                        phone.classList.add('verified', 'is-valid')
                        phone.value = event[2];

                        document.getElementById('verify_button').classList.toggle('d-none');
                        document.getElementById('resend_container').classList.toggle('d-none');
                    }else{
                        otp_input.classList.add('is-invalid')
                    }
                }else if(event[1] == 'adoptdog'){
                    var phone = document.getElementById('phonenumber_claim4');
                    var otp_input = document.getElementById('otp_input4');
                    if (event[0]) {
                        changeInput4();
                        phone.disabled = true;
                        phone.classList.remove('is-invalid')
                        phone.classList.add('verified', 'is-valid')
                        phone.value = event[2];

                        document.getElementById('verify_button4').classList.toggle('d-none');
                        document.getElementById('resend_container4').classList.toggle('d-none');
                    }else{
                        otp_input.classList.add('is-invalid')
                    }
                }
            });

            Livewire.on('open_otp', event => {
                if (event[0]) {
                    if(!resend_otp){
                        if(event[1] == 'rounds'){
                            changeInput2();
                            startCountdown2();
                        }else if (event[1] == 'lostdog'){
                            changeInput3();
                            startCountdown3();
                        }else if (event[1] == 'adoptdog'){
                            changeInput4();
                            startCountdown4();
                        }
                        changeInput();
                        startCountdown();
                    }
                    // change_html
                }
            });
            

            Livewire.on('dogAdopted', event => {
                closeAllModals();

                var phone = document.getElementById('phonenumber_claim4');
                phone.disabled = false; // Enable the phone number input field
                phone.classList.remove('verified', 'is-valid'); // Remove verification classes
                phone.value = ''; // Reset the value of the phone input

                // Reset the OTP input
                var otpInput = document.getElementById('otp_input4');
                otpInput.value = ''; // Clear the OTP input field

                // Toggle visibility of the verify button
                document.getElementById('verify_button4').classList.remove('d-none');
                Swal.fire({
                    icon: 'success',
                    title: 'Ticket Number ' + event[1],
                    text: event[0],
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {

                    }
                });
            });
            Livewire.on('dogClaimed', event => {
                closeAllModals();
                var phone = document.getElementById('phonenumber_claim3');
                phone.disabled = false; // Enable the phone number input field
                phone.classList.remove('verified', 'is-valid'); // Remove verification classes
                phone.value = ''; // Reset the value of the phone input

                // Reset the OTP input
                var otpInput = document.getElementById('otp_input3');
                otpInput.value = ''; // Clear the OTP input field

                // Toggle visibility of the verify button
                document.getElementById('verify_button3').classList.remove('d-none');
                Swal.fire({
                    icon: 'success',
                    title: 'Ticket Number ' + event[1],
                    text: event[0],
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Reload the page
                    }
                });
            });
            Livewire.on('annoucementSave', event => {
                closeAllModals();
                Swal.fire({
                    icon: 'success',
                    title: 'Data saved successfully!',
                    text: event[0],
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Reload the page
                        location.reload();
                    }
                });
            });

            Livewire.on('saveRounds', event => {
                closeAllModals();
                Swal.fire({
                    icon: 'success',
                    title: 'Ticket Number ' + event[1],
                    text: event[0],
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {

                    }
                });

            });

            Livewire.on('editAnnouncement', event => {
                setTimeout(() => {
                    var quill2 = new Quill('#snow-editor2', {
                        theme: 'snow',
                        modules: {
                            imageResize: {
                                displaySize: true
                            },
                            toolbar: [
                                [{
                                    'header': [1, 2, 3, 4, 5, 6, false]
                                }],
                                ['bold', 'italic', 'underline', 'strike'],
                                [{
                                    'color': []
                                }, {
                                    'background': []
                                }],
                                [{
                                    'align': []
                                }],
                                ['link', 'image'],

                                ['clean']
                            ]
                        }
                    });

                    var quill = new Quill('#snow-editor', {
                        theme: 'snow',
                        modules: {
                            imageResize: {
                                displaySize: true
                            },
                            toolbar: [
                                [{
                                    'header': [1, 2, 3, 4, 5, 6, false]
                                }],
                                ['bold', 'italic', 'underline', 'strike'],
                                [{
                                    'color': []
                                }, {
                                    'background': []
                                }],
                                [{
                                    'align': []
                                }],
                                ['link', 'image'],

                                ['clean']
                            ]
                        }
                    });
                }, 1000);

            });

        });
    </script>

</div>
