<div>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid" id="lost_found_list">
            <!-- start page title -->
            <div class="row">
                <div class="col-xl-8 col-sm-12 page-title-box">
                    <h4 class="page-title text-black mb-0">Lost and Found List</h4>
                </div>
                <div class="col-xl-4 col-sm-12">
                    <div class="d-flex mb-2">
                        <select class="form-select mt-3 me-3" style="max-width: 300px; height: 40px" id="sortstatus"
                            wire:model="statusC" wire:change="changeStatus">
                            <option selected="">Sort By Status</option>
                            <option value="Lost Dog">Lost Dog</option>
                            <option value="Found Dog">Found Dog</option>
                        </select>

                        <input type="text" class="mt-3 form-control search" style="height: 40px"
                            wire:model="changeName" wire:keydown="changeStatus" placeholder="Search name, breed..."
                            id="top-search">
                    </div>
                </div>

            </div>
            <div class="row list">
                @if (isset($doglist))
                    @foreach ($doglist as $d)
                        @php
                            $images = json_decode($d['animal_images']);
                        @endphp
                        <div class="col-md-6 col-xxl-3"
                            wire:mouseover="$dispatch('activedog',['{{ $d['dog_id_unique'] }}'])">
                            <div class="card status" data-address-status="{{ $d['status_name'] ?? 'N/A' }}">
                                <div class="card-body py-3 px-3">
                                    <div class="float-end position-absolute">
                                        {{-- <button type="button" class="btn btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#bs-example-modal-lg">Claim
                                        </button> --}}
                                    </div>
                                    <div class="text-center">
                                        <a data-bs-toggle="modal" data-bs-target="#lostdog"
                                            onclick="Dogviewed('{{ $d['dog_id_unique'] }}')"
                                            wire:click="adoptionform('{{ $d['dog_id_unique'] }}')">
                                            @if (isset($images[0]))
                                                <img src="{{ asset('storage/' . $images[0]) }}" class="img-thumbnail"
                                                    alt="friend"
                                                    style="min-width: 300px; min-height: 170px; width: 300px; height: 170px; object-fit: cover;">
                                            @else
                                                <img src="https://placehold.co/600x400" class="img-thumbnail"
                                                    alt="friend"
                                                    style="min-width: 300px; min-height: 170px; width: 300px; height: 170px; object-fit: cover;">
                                            @endif
                                        </a>

                                        <h4 class="mt-2 dogname"><a data-bs-toggle="modal" data-bs-target="#lostdog"
                                                onclick="Dogviewed('{{ $d['dog_id_unique'] }}')"
                                                wire:click="adoptionform('{{ $d['dog_id_unique'] }}')"
                                                class="text-reset">{{ $d['dog_name'] }}
                                                @if (isset($d))
                                                    @if ($d['status_name'] == 'Lost Dog')
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24"
                                                            height="24" x="0" y="0" viewBox="0 0 512 512"
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
                                                                    data-original="#ea5a52" class=""></path>
                                                                <path d="M119.118 87.803h273.763v273.763H119.118z"
                                                                    style="" fill="#ffffff"
                                                                    data-original="#ffffff" class=""
                                                                    opacity="1"></path>
                                                                <path
                                                                    d="m317.143 178.775-4.104-70.989c-.271-4.679-6.195-6.523-9.074-2.825l-34.036 43.717"
                                                                    style="" fill="#a03510"
                                                                    data-original="#a03510" class=""></path>
                                                                <path
                                                                    d="M327.747 362.129h-164.77c-.251-.178-.491-.376-.742-.564l12.309-212.888h126.589c8.004 0 14.629 6.248 15.088 14.242l.919 15.851 10.607 183.359z"
                                                                    style="" fill="#ba4c20"
                                                                    data-original="#ba4c20">
                                                                </path>
                                                                <path
                                                                    d="M209.517 362.129h-46.54c-.251-.178-.491-.376-.742-.564l12.309-212.888h30.71l4.263 213.452z"
                                                                    style="" fill="#a03510"
                                                                    data-original="#a03510" class=""></path>
                                                                <ellipse cx="299.426" cy="196.305" rx="11.546"
                                                                    ry="17.975" style="" fill="#3c363f"
                                                                    data-original="#3c363f"></ellipse>
                                                                <ellipse cx="303.512" cy="194.79" rx="3.769"
                                                                    ry="9.172" style="" fill="#5c5560"
                                                                    data-original="#5c5560" class=""></ellipse>
                                                                <path
                                                                    d="m220.017 148.68-20.512 13.072-6.529 4.161-5.006 3.196c-6.332 4.003-14.565-.837-14.127-8.33l3.061-52.996c.272-4.674 6.196-6.521 9.076-2.826l34.037 43.723z"
                                                                    style="" fill="#ba4c20"
                                                                    data-original="#ba4c20">
                                                                </path>
                                                                <ellipse cx="251.361" cy="196.305" rx="11.546"
                                                                    ry="17.975" style="" fill="#3c363f"
                                                                    data-original="#3c363f"></ellipse>
                                                                <ellipse cx="255.446" cy="194.79" rx="3.769"
                                                                    ry="9.172" style="" fill="#5c5560"
                                                                    data-original="#5c5560" class=""></ellipse>
                                                                <path
                                                                    d="M240.453 218.536h115.331v69.128a25.66 25.66 0 0 1-15.406 23.522l-42.752 18.636c-16.02 6.983-34.554-1.516-39.714-18.213l-25.429-82.268c-1.66-5.366 2.353-10.805 7.97-10.805z"
                                                                    style="" fill="#d8d8d8"
                                                                    data-original="#d8d8d8" class=""></path>
                                                                <path
                                                                    d="M338.01 239.739v53.018a29.709 29.709 0 0 1-17.821 27.229c-.007 0-.007.007-.015.007l-22.548 9.83c-16.019 6.981-34.557-1.515-39.713-18.213l-25.428-82.268c-1.658-5.368 2.352-10.811 7.968-10.811h92.844l4.713 21.208z"
                                                                    style="" fill="#eaeaea"
                                                                    data-original="#eaeaea" class=""></path>
                                                                <path
                                                                    d="M352.015 218.536H317.84c-6.522 0-11.811 5.287-11.811 11.81 0 6.522 5.287 11.81 11.811 11.81h34.174c6.522 0 11.81-5.287 11.81-11.81 0-6.523-5.287-11.81-11.809-11.81z"
                                                                    style="" fill="#3c363f"
                                                                    data-original="#3c363f"></path>
                                                                <path
                                                                    d="M354.149 222.305h-17.087a5.905 5.905 0 0 0 0 11.81h17.087a5.905 5.905 0 1 0 0-11.81z"
                                                                    style="" fill="#5c5560"
                                                                    data-original="#5c5560" class=""></path>
                                                                <circle cx="272.781" cy="275.425" r="9.047"
                                                                    style="" fill="#d8d8d8"
                                                                    data-original="#d8d8d8" class=""></circle>
                                                                <circle cx="305.455" cy="275.425" r="9.047"
                                                                    style="" fill="#d8d8d8"
                                                                    data-original="#d8d8d8" class=""></circle>
                                                                <circle cx="290.377" cy="295.027" r="9.047"
                                                                    style="" fill="#d8d8d8"
                                                                    data-original="#d8d8d8" class=""></circle>
                                                                <path
                                                                    d="m199.507 161.751-6.533 4.164-5.003 3.195a7.488 7.488 0 0 1-.537.313c-.029.018-.06.029-.089.047-6.231 3.325-13.927-1.441-13.502-8.695l3.059-52.992c.272-4.678 6.196-6.52 9.078-2.83 2.628 6.408 6.462 16.455 10.071 26.07 1.016 2.705 2.008 5.369 2.959 7.914a5126.72 5126.72 0 0 1 4.288 11.594 9.442 9.442 0 0 1-3.791 11.22z"
                                                                    style="" fill="#f9b7d2"
                                                                    data-original="#f9b7d2" class=""></path>
                                                                <path d="M440.039 102.875H337.163V0z" style=""
                                                                    fill="#d33531" data-original="#d33531"
                                                                    class=""></path>
                                                                <path
                                                                    d="M163.662 444.454c-.796 2.385-3.738 3.499-6.76 3.499-2.941 0-6.044-1.113-6.601-3.499l-5.09-21.473-5.169 21.473c-.556 2.385-3.658 3.499-6.6 3.499-3.023 0-6.045-1.113-6.76-3.499l-15.747-50.023a3.432 3.432 0 0 1-.159-.954c0-2.307 3.659-4.136 6.601-4.136 1.59 0 3.023.557 3.42 2.068l12.565 43.104 6.759-27.675c.478-1.988 2.784-2.863 5.09-2.863 2.228 0 4.534.875 5.01 2.863l6.76 27.675 12.565-43.104c.398-1.511 1.83-2.068 3.42-2.068 2.941 0 6.6 1.829 6.6 4.136 0 .318-.079.716-.158.954l-15.746 50.023zM178.696 443.182c0-.159.079-.478.159-.795l15.348-50.023c.717-2.387 3.658-3.499 6.601-3.499 3.023 0 5.964 1.113 6.681 3.499l15.349 50.023c.079.319.159.557.159.795 0 2.465-3.738 4.294-6.521 4.294-1.75 0-3.102-.557-3.5-2.068l-3.022-10.577h-18.21l-3.022 10.577c-.398 1.511-1.75 2.068-3.5 2.068-2.784 0-6.522-1.75-6.522-4.294zm29.029-16.462-6.919-24.415-6.918 24.415h13.837zM256.717 444.215l-17.099-31.971v31.971c0 2.147-2.625 3.261-5.169 3.261-2.625 0-5.169-1.113-5.169-3.261v-51.614c0-2.227 2.545-3.261 5.169-3.261 3.738 0 5.249.795 7.714 5.488l15.348 29.664v-31.971c0-2.227 2.545-3.181 5.169-3.181 2.545 0 5.169.955 5.169 3.181v51.693c0 2.147-2.625 3.261-5.169 3.261-2.464.001-4.611-.795-5.963-3.26zM311.274 389.34c2.228 0 3.261 2.387 3.261 4.613 0 2.465-1.193 4.693-3.261 4.693h-11.611v45.569c0 2.147-2.625 3.261-5.169 3.261-2.625 0-5.169-1.113-5.169-3.261v-45.569h-11.69c-2.068 0-3.261-2.147-3.261-4.693 0-2.227 1.033-4.613 3.261-4.613h33.639zM331.317 414.312h12.088c2.068 0 3.26 1.988 3.26 4.136 0 1.829-1.033 3.976-3.26 3.976h-12.088v15.985h22.506c2.068 0 3.261 2.147 3.261 4.613 0 2.147-1.033 4.453-3.261 4.453h-28.312c-2.306 0-4.534-1.113-4.534-3.261V392.6c0-2.147 2.228-3.261 4.534-3.261h28.312c2.228 0 3.261 2.307 3.261 4.453 0 2.465-1.193 4.613-3.261 4.613h-22.506v15.907zM382.535 389.34c10.497 0 18.689 4.931 18.689 18.213v21.711c0 13.281-8.192 18.212-18.689 18.212h-14.077c-2.704 0-4.534-1.511-4.534-3.181v-51.773c0-1.67 1.83-3.181 4.534-3.181h14.077v-.001zm-8.271 9.067v40.003h8.271c5.247 0 8.35-2.942 8.35-9.145v-21.711c0-6.204-3.102-9.146-8.35-9.146h-8.271v-.001z"
                                                                    style="" fill="#ffffff"
                                                                    data-original="#ffffff" class=""
                                                                    opacity="1"></path>
                                                            </g>
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24"
                                                            height="24" x="0" y="0" viewBox="0 0 512 512"
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
                                                                    data-original="#ea5a52" class=""></path>
                                                                <path d="M119.118 87.803h273.763v273.763H119.118z"
                                                                    style="" fill="#ffffff"
                                                                    data-original="#ffffff" class=""
                                                                    opacity="0"></path>
                                                                <path
                                                                    d="m317.143 178.775-4.104-70.989c-.271-4.679-6.195-6.523-9.074-2.825l-34.036 43.717"
                                                                    style="" fill="#a03510"
                                                                    data-original="#a03510" class=""></path>
                                                                <path
                                                                    d="M327.747 362.129h-164.77c-.251-.178-.491-.376-.742-.564l12.309-212.888h126.589c8.004 0 14.629 6.248 15.088 14.242l.919 15.851 10.607 183.359z"
                                                                    style="" fill="#ba4c20"
                                                                    data-original="#ba4c20" class=""></path>
                                                                <path
                                                                    d="M209.517 362.129h-46.54c-.251-.178-.491-.376-.742-.564l12.309-212.888h30.71l4.263 213.452z"
                                                                    style="" fill="#a03510"
                                                                    data-original="#a03510" class=""></path>
                                                                <ellipse cx="299.426" cy="196.305" rx="11.546"
                                                                    ry="17.975" style="" fill="#3c363f"
                                                                    data-original="#3c363f"></ellipse>
                                                                <ellipse cx="303.512" cy="194.79" rx="3.769"
                                                                    ry="9.172" style="" fill="#5c5560"
                                                                    data-original="#5c5560" class=""></ellipse>
                                                                <path
                                                                    d="m220.017 148.68-20.512 13.072-6.529 4.161-5.006 3.196c-6.332 4.003-14.565-.837-14.127-8.33l3.061-52.996c.272-4.674 6.196-6.521 9.076-2.826l34.037 43.723z"
                                                                    style="" fill="#ba4c20"
                                                                    data-original="#ba4c20" class=""></path>
                                                                <ellipse cx="251.361" cy="196.305" rx="11.546"
                                                                    ry="17.975" style="" fill="#3c363f"
                                                                    data-original="#3c363f"></ellipse>
                                                                <ellipse cx="255.446" cy="194.79" rx="3.769"
                                                                    ry="9.172" style="" fill="#5c5560"
                                                                    data-original="#5c5560" class=""></ellipse>
                                                                <path
                                                                    d="M240.453 218.536h115.331v69.128a25.66 25.66 0 0 1-15.406 23.522l-42.752 18.636c-16.02 6.983-34.554-1.516-39.714-18.213l-25.429-82.268c-1.66-5.366 2.353-10.805 7.97-10.805z"
                                                                    style="" fill="#d8d8d8"
                                                                    data-original="#d8d8d8" class=""></path>
                                                                <path
                                                                    d="M338.01 239.739v53.018a29.709 29.709 0 0 1-17.821 27.229c-.007 0-.007.007-.015.007l-22.548 9.83c-16.019 6.981-34.557-1.515-39.713-18.213l-25.428-82.268c-1.658-5.368 2.352-10.811 7.968-10.811h92.844l4.713 21.208z"
                                                                    style="" fill="#eaeaea"
                                                                    data-original="#eaeaea" class=""></path>
                                                                <path
                                                                    d="M352.015 218.536H317.84c-6.522 0-11.811 5.287-11.811 11.81 0 6.522 5.287 11.81 11.811 11.81h34.174c6.522 0 11.81-5.287 11.81-11.81 0-6.523-5.287-11.81-11.809-11.81z"
                                                                    style="" fill="#3c363f"
                                                                    data-original="#3c363f"></path>
                                                                <path
                                                                    d="M354.149 222.305h-17.087a5.905 5.905 0 0 0 0 11.81h17.087a5.905 5.905 0 1 0 0-11.81z"
                                                                    style="" fill="#5c5560"
                                                                    data-original="#5c5560" class=""></path>
                                                                <circle cx="272.781" cy="275.425" r="9.047"
                                                                    style="" fill="#d8d8d8"
                                                                    data-original="#d8d8d8" class=""></circle>
                                                                <circle cx="305.455" cy="275.425" r="9.047"
                                                                    style="" fill="#d8d8d8"
                                                                    data-original="#d8d8d8" class=""></circle>
                                                                <circle cx="290.377" cy="295.027" r="9.047"
                                                                    style="" fill="#d8d8d8"
                                                                    data-original="#d8d8d8" class=""></circle>
                                                                <path
                                                                    d="m199.507 161.751-6.533 4.164-5.003 3.195a7.488 7.488 0 0 1-.537.313c-.029.018-.06.029-.089.047-6.231 3.325-13.927-1.441-13.502-8.695l3.059-52.992c.272-4.678 6.196-6.52 9.078-2.83 2.628 6.408 6.462 16.455 10.071 26.07 1.016 2.705 2.008 5.369 2.959 7.914a5126.72 5126.72 0 0 1 4.288 11.594 9.442 9.442 0 0 1-3.791 11.22z"
                                                                    style="" fill="#f9b7d2"
                                                                    data-original="#f9b7d2" class=""></path>
                                                                <path d="M440.039 102.875H337.163V0z" style=""
                                                                    fill="#d33531" data-original="#d33531"
                                                                    class=""></path>
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


                                        </h4>

                                        <div class="d-flex">
                                            <div class="">
                                                <div class="d-flex">
                                                    <i class="font-18 text-success me-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="18"
                                                            height="18" x="0" y="0" viewBox="0 0 128 128"
                                                            style="enable-background:new 0 0 512 512"
                                                            xml:space="preserve" class="">
                                                            <g>
                                                                <path fill="#f95353"
                                                                    d="M88.365 12.2A32.548 32.548 0 0 0 64 23.133 32.636 32.636 0 0 0 9.623 57.667s.862 1.888 1.332 2.75C30.545 95.592 64 115.8 64 115.8s33.455-20.208 53.045-55.383c.471-.862 1.332-2.75 1.332-2.75A32.646 32.646 0 0 0 88.365 12.2z"
                                                                    opacity="1" data-original="#f95353"
                                                                    class="">
                                                                </path>
                                                                <g fill="#ffd3c2">
                                                                    <path
                                                                        d="M64 54.715c12.333 0 25.525 16.542 20.109 27.488-3.287 6.646-10 6.939-14.759 6.145a32.509 32.509 0 0 0-10.7 0c-4.763.794-11.472.5-14.76-6.145C38.475 71.257 51.667 54.715 64 54.715z"
                                                                        fill="#ffd3c2" opacity="1"
                                                                        data-original="#ffd3c2"></path>
                                                                    <ellipse cx="54.539" cy="41.807"
                                                                        rx="6.259" ry="7.706" fill="#ffd3c2"
                                                                        opacity="1" data-original="#ffd3c2">
                                                                    </ellipse>
                                                                    <ellipse cx="73.461" cy="41.807"
                                                                        rx="6.259" ry="7.706" fill="#ffd3c2"
                                                                        opacity="1" data-original="#ffd3c2">
                                                                    </ellipse>
                                                                    <path
                                                                        d="M44.715 53.434c0 3.675-2.42 6.654-5.406 6.654s-5.4-2.979-5.4-6.654 2.42-6.655 5.4-6.655 5.406 2.979 5.406 6.655zM83.285 53.434c0 3.675 2.42 6.654 5.406 6.654s5.409-2.979 5.409-6.654-2.42-6.655-5.405-6.655-5.41 2.979-5.41 6.655z"
                                                                        fill="#ffd3c2" opacity="1"
                                                                        data-original="#ffd3c2"></path>
                                                                </g>
                                                            </g>
                                                        </svg> </i>
                                                    <div>
                                                        <h5 class="mt-1 font-14 " id="view-{{ $d['dog_id_unique'] }}">
                                                            {{ $d['clicked'] ?? '0' }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <!-- end due date -->
                                            </div>

                                            <div class="ms-auto">
                                                <div class="d-flex">
                                                    <i class="font-18 text-success me-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="18"
                                                            height="18" x="0" y="0" viewBox="0 0 64 64"
                                                            style="enable-background:new 0 0 512 512"
                                                            xml:space="preserve" class="">
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
                                                                    fill="#143441" opacity="1"
                                                                    data-original="#143441" class=""></circle>
                                                                <path fill="#ad6327"
                                                                    d="m49 16 10 8c3.328 3.129 1.4 7.375 0 10-1.781 3.349-3 11.37-3 15 0 6.39-7 6.781-7-6z"
                                                                    opacity="1" data-original="#ad6327"
                                                                    class=""></path>
                                                                <g fill="#143441">
                                                                    <circle cx="40" cy="29" r="2"
                                                                        fill="#143441" opacity="1"
                                                                        data-original="#143441" class="">
                                                                    </circle>
                                                                    <path
                                                                        d="M40 44c0 .944-1.71 2-4 2-1.121 0-3-.26-3-2h-2c0 1.74-1.879 2-3 2-2.29 0-4-1.056-4-2h-2c0 2.243 2.636 4 6 4a5.2 5.2 0 0 0 4-1.449A5.2 5.2 0 0 0 36 48c3.364 0 6-1.757 6-4z"
                                                                        fill="#143441" opacity="1"
                                                                        data-original="#143441" class=""></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </i>
                                                    <div>
                                                        <h5 class="mt-1 font-14 text-start breed">
                                                            {{ $d['breed_name'] ?? 'N/A' }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <!-- end due date -->
                                            </div>
                                            <div class="ms-auto">
                                                <div class="d-flex">
                                                    <i class="font-18 text-success me-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="18"
                                                            height="18" x="0" y="0" viewBox="0 0 488 488.33"
                                                            style="enable-background:new 0 0 512 512"
                                                            xml:space="preserve" class="">
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

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <!-- End col -->
                @endif
                <div class="text-black">
                    @if ($doglist instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{ $doglist->links() }}
                    @endif
                </div>
            </div> <!-- End row -->

        </div> <!-- container -->
    </div> <!-- content -->

    <!-- Footer Start -->

    <!-- end Footer -->
    <script>
        var adoptionlist;

        function Dogviewed(id) {
            Livewire.dispatch('dog_viewed', {
                dog_id: id,
            })
        }

        document.addEventListener('livewire:init', function() {
            function areinitializeList() {


                var options = {
                    valueNames: ['dogname', 'color', 'gender', 'breed', 'status'],
                    searchClass: 'search',
                    page: 5,
                    pagination: true,
                    paginationClass: 'pagination', // Adds pagination classes (rounded pagination)
                    nextClass: 'next', // Custom class for the next button
                    prevClass: 'previous', // Custom class for the previous button
                    activeClass: 'active', // Custom class for active page
                    pageClass: 'page-item', // Class for each page item
                    linkClass: 'page-link' // Class for each link inside the pagination
                };

                var adoptionlist = new List('lost_found_list', options);

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

                    document.getElementById('sortstatus').addEventListener('change', function() {
                        var selectedOption = this.value;
                        adoptionlist.filter(function(item) {
                            var addressStatus = item.elm.querySelector('.status').getAttribute(
                                'data-address-status');
                            if (selectedOption === '') {
                                return true;
                            } else if (selectedOption === 'Found Dog') {
                                return addressStatus === 'Found Dog';
                            } else if (selectedOption === 'Lost Dog') {
                                return addressStatus === 'Lost Dog';
                            }
                        });
                    });
                }

                updatePagination(adoptionlist);

            }

            // areinitializeList();
            $('.modal').on('hidden.bs.modal', function() {
                var claimformtoggle = document.getElementById('claimformtoggle');

                if (claimformtoggle.classList.contains('d-none')) {} else {
                    if (toggledclaim) {
                        claimtoggle();

                        toggledclaim = false;
                        var phone_v = document.getElementById('phonenumber_claim');

                        if (!phone_v.classList.contains('verified')) {
                       
                            if (phone_v.classList.contains('d-none')) {
                                changeInput();
                                phone_v.value = ''; // Reset the phone number input
                                document.getElementById('otp_input').value = ''; // Clear OTP input
                            }
                        }
                    }
                }

            });

            Livewire.on('click_dogs', event => {
                try {
                    setTimeout(() => {
                        let dogid = document.getElementById('view-' + event[0]);
                        dogid.textContent = event[1];
                    }, 1500);
                } catch (error) {

                }

            });
        });
    </script>
</div>
