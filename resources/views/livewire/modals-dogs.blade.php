<div>

    <div id="info-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="needs-validation" novalidate id="formadddog">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-white" id="info-header-modalLabel">Add Dogs</h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-hidden="true"></button>
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
                            <input type="text" class="form-control" id="breed" placeholder="Breed"
                                wire:model="breed" required>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <input type="hidden" class="form-control" wire:model="dog_unique">
                        <div class="mb-3">
                            <label class="form-label" for="color">Color</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="color" placeholder="Color"
                                    wire:model="color" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="color">Gender</label>
                            <div class="input-group">
                                <select class="form-select mb-3" required wire:model="gender">
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
                            <input class="form-control" type="file" id="dogImages" wire:model="dogImages" multiple>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" wire:click="saveDogData">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- /.modal -->
    <div class="modal fade" id="viewdog" tabindex="-1" style="z-index: 10050 !important;" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myLargeModalLabel">View Dog Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
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
                                                                <img class="d-block img-fluid img-thumbnail"
                                                                    src="{{ asset('storage/' . $img) }}"
                                                                    alt="Slide {{ $loop->iteration }}"
                                                                    style="min-width: 420px; min-height: 320px; width: 420px; height: 320px; object-fit: cover;">
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
                                                            class="mdi mdi-square-edit-outline ms-2"></i></a>
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
                                                    <h4 class="me-3"> {{ $activedog['breed'] ?? 'N/A' }} </h4>
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
                                                                        {{ $activedog['contact'] ?? 'N/A' }}
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
                                    <div class="container mt-3 d-none" id="adoptionform">
                                        <div class="card">
                                            <div class="card-header bg-info text-white">
                                                <h5 class="card-title">Adoption Form</h5>
                                                <h6 class="card-subtitle ">Every Information is important</h6>
                                            </div>
                                            <div class="card-body">

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

                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom03">Contact
                                                            Number</label>
                                                        <input type="tel" class="form-control"
                                                            id="validationCustom03" placeholder="09123456789" required
                                                            wire:model="a_contact" pattern="09[0-9]{9}"
                                                            title="Phone number must start with 09 and contain exactly 11 digits."
                                                            maxlength="11"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
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
                                                            id="validationCustom02" placeholder="Last name"
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
                                                                for="invalidCheck">Agree to terms
                                                                and conditions</label>
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
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success d-none" id="adopt_dog">Confirm Adoption</button>
                    <button type="button" class="btn btn-success d-none" id="hidden_dog"
                        wire:click="confirmadoption">Confirm Adoption</button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="lostdog" tabindex="-1" style="z-index: 10050 !important;" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="myLargeModalLabel">View Dog Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
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
                                                            <img class="d-block img-fluid img-thumbnail"
                                                                src="{{ asset('storage/' . $img) }}"
                                                                alt="Slide {{ $loop->iteration }}"
                                                                style="min-width: 420px; min-height: 320px; width: 420px; height: 320px; object-fit: cover;">
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
                                                        class="mdi mdi-square-edit-outline ms-2"></i></a>
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
                                                <h4 class="me-3"> {{ $activedog['breed'] ?? 'N/A' }} </h4>
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
                                                                    {{ $activedog['contact'] ?? 'N/A' }}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" id="adoptiontoggle"
                                                class="mt-3 btn btn-outline-success rounded-pill w-100"><i
                                                    class="uil-heart"></i> Claim Dog <i
                                                    class="uil-heart"></i></button>
                                         
                                        </form>
                                    </div> <!-- end col -->
                                </div> <!-- end row-->
                               
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success d-none" id="adopt_dog">Confirm Adoption</button>
                <button type="button" class="btn btn-success d-none" id="hidden_dog"
                    wire:click="confirmadoption">Confirm Adoption</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
    <div class="modal fade" id="adoptdog" tabindex="100" style="z-index: 10051 !important;" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white" id="myLargeModalLabel">Adoption Form</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="request_rounds" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="primary-header-modalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">Request Rounds</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom01">Requestor</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name"
                            value="{{ Auth::user()->name }}" disabled>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom03">Address, where you want rounds to be
                            conducted</label>
                        <input type="text" class="form-control" id="validationCustom03"
                            placeholder="Full address" wire:model="fulladdress" required>
                        <div class="invalid-feedback">
                            Please provide a valid address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom03">Contact number</label>
                        <input type="text" type="tel" class="form-control" id="validationCustom03"
                            placeholder="09123456789" required wire:model="contact" pattern="09[0-9]{9}"
                            title="Phone number must start with 09 and contain exactly 11 digits." maxlength="11"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);">
                        <div class="invalid-feedback">
                            Please provide a valid phone number.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom04">Specific Locations, Mention any particular
                            spots</label>
                        <input type="text" class="form-control" id="validationCustom04"
                            placeholder="ex. New york street" wire:model="specificloc" required>
                        <div class="invalid-feedback">
                            Please provide a valid locations.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom04">Reason for request</label>
                        <textarea class="form-control" id="description" rows="5" placeholder="Enter a reason..." wire:model="reason"></textarea>
                        <div class="invalid-feedback">
                            Please provide a valid locations.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom05">Preferred Schedule</label>
                        <input type="text" id="datetime-datepicker" class="form-control"
                            placeholder="Date and Time" wire:model="schedule">
                        <div class="invalid-feedback">
                            Please provide a valid schedule.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="saveRounds">Submit Request</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
        document.getElementById('adoptiontoggle').addEventListener('click', function() {
            var adopt_dog = document.getElementById('adopt_dog');
            var adoptionform = document.getElementById('adoptionform');

            adopt_dog.classList.toggle('d-none');
            adoptionform.classList.toggle('d-none');
        });
        document.getElementById('adopt_dog').addEventListener('click', function() {
            var form = document.getElementById('checkform');

            // Add 'was-validated' class to trigger Bootstrap validation styles
            form.classList.add('was-validated');

            // Check if all required fields are filled and valid
            if (!form.checkValidity()) {
                // Form is incomplete or invalid, prevent further action
                alert('Please fill out all required fields.');
                return false; // Stop further actions
            }
            document.getElementById('hidden_dog').click();
        });

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
        document.addEventListener('livewire:init', function() {
            Livewire.on('dogAdopted', event => {
                closeAllModals();
                var successlabel = document.getElementById('datatoedit');
                successlabel.innerHTML = event[0];
                var modalElement = document.getElementById('success-alert-modal');
                var modal = new bootstrap.Modal(modalElement);
                modal.show();
            });
        });
    </script>

</div>
