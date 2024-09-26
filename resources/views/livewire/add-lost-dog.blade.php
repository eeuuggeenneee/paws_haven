<div>
    <!-- plugin js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Data Management</a></li>
                        <li class="breadcrumb-item active">Report Lost Dog</li>
                    </ol>
                </div>
                <h4 class="page-title">Report Form</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="dog_name" class="form-label">Dog Name</label>
                                <input type="text" id="dog_name" class="form-control" placeholder="Enter dog name"
                                    wire:model="dog_name">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="dog_name" class="form-label">Breed</label>
                                        <input type="text" id="dog_name" class="form-control"
                                            placeholder="Enter dog name" wire:model="breed">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="dog_name" class="form-label">Color</label>
                                        <input type="text" id="dog_name" class="form-control"
                                            placeholder="Enter dog name" wire:model="color">
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" rows="5" placeholder="Enter a description..."
                                    wire:model="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Date Lost</label>
                                <input class="form-control" type="date" name="date_found" wire:model="date_found">
                            </div>

                            <div class="mb-3">
                                <label for="location_found" class="form-label">Last Location</label>
                                <input type="text" id="location_found" class="form-control"
                                    placeholder="Enter last location" wire:model="location_found">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">What Are You Reporting?</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="report_type" id="lost_dog"
                                        value="2" wire:model="report_type">
                                    <label class="form-check-label" for="lost_dog">Lost Dog</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="report_type" id="found_dog"
                                        value="3" wire:model="report_type">
                                    <label class="form-check-label" for="found_dog">Found Dog</label>
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-xl-6">
                            <div class="mb-3 mt-3 mt-xl-0">
                                <label for="projectname" class="mb-0">Dog Images</label>
                                <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>

                                <!-- File Upload -->
                                <form action="{{ route('upload.images') }}" method="post" enctype="multipart/form-data"
                                    class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone"
                                    data-previews-container="#file-previews"
                                    data-upload-preview-template="#uploadPreviewTemplate">
                                    @csrf
                                    <div class="fallback">
                                        <input type="file" wire:model="images" multiple>
                                    </div>

                                    <div class="dz-message needsclick">
                                        <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                        <h3>Drop files here or click to upload.</h3>
                                        <span class="text-muted font-13">(This is just a demo dropzone. Selected files
                                            are <strong>not</strong> actually uploaded.)</span>
                                    </div>
                                </form>

                                <!-- Preview -->
                                <div class="dropzone-previews mt-3 row" id="file-previews"></div>

                                <!-- file preview template -->
                                <div class="d-none" id="uploadPreviewTemplate">
                                    <div class="card mt-1 mb-0 shadow-none border col-xl-6 col-lg-12 ">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img data-dz-thumbnail src="#"
                                                        class="avatar-sm rounded bg-light" alt="">
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold"
                                                        data-dz-name></a>
                                                    <p class="mb-0" data-dz-size></p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="" class="btn btn-link btn-lg text-muted"
                                                        data-dz-remove>
                                                        <i class="ri-close-line"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end file preview template -->
                            </div>

                            <div class="mb-3 position-relative">
                                <label class="form-label">Contact Name</label>
                                <input class="form-control" type="text" wire:model="contact_name">
                            </div>

                            <div class="mb-3 position-relative">
                                <label class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="validationCustom03"
                                    placeholder="09123456789" required wire:model="contact_number"
                                    pattern="09[0-9]{9}"
                                    title="Phone number must start with 09 and contain exactly 11 digits."
                                    maxlength="11"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);">
                            </div>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->
                    <div class="d-flex">
                        <button type="button" class="btn btn-info col-2 me-2" wire:click="submitForm"><i
                                class="uil-exit"></i> Submit</button>
                        <button type="button" class="me-1 btn btn-outline-primary col-1"><i
                                class="uil-cloud-times"></i> Cancel</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
    <script>
        document.addEventListener('livewire:init', function() {
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
        });
    </script>
</div> <!-- container -->
