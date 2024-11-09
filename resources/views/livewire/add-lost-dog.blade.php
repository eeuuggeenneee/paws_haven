<div>
    <!-- plugin js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" id="add_dog_lost">
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="dog_name" class="form-label">Dog Name</label>
                                        <input type="text" id="dog_name" class="form-control"
                                            placeholder="Enter dog name" wire:model="dog_name" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="color">Gender</label>
                                        <div class="input-group">
                                            <select class="form-select " required wire:model="gender">
                                                <option selected>Select gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="dog_name" class="form-label">Breed <small> (missing dog breed?
                                                <a data-bs-toggle="modal" data-bs-target="#addmorebreed"
                                                    class="text-primary">click here)</a></small></label>
                                        <select id="dog-breed" name="dog-breed" class="form-select" wire:model="breed"
                                            required>
                                            <option value="" disabled selected>Select a breed</option>
                                            @foreach ($breedlist as $breed)
                                                <option value="{{ $breed['id'] }}">{{ $breed['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="dog_name" class="form-label">Color</label>
                                        <input type="text" id="dog_name" class="form-control" 
                                            placeholder="Enter dog color" wire:model="color">
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" rows="5" placeholder="Enter a description..."
                                    wire:model="description" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Date Lost</label>
                                <input class="form-control" type="date" name="date_found" required
                                    wire:model="date_found">
                            </div>

                            <div class="mb-3">
                                <label for="location_found" class="form-label">Last Location</label>
                                <input type="text" id="location_found" class="form-control" required
                                    placeholder="Enter last location" wire:model="location_found">
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label">What Are You Reporting?</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="report_type" id="lost_dog"
                                        value="2" wire:model="report_type">
                                    <label class="form-check-label" for="lost_dog">Lost Dog</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="report_type" id="found_dog"
                                        value="3" wire:model="report_type" checked>
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
                                        <input type="file" class="d-none" wire:model="images" multiple>
                                    </div>

                                    <div class="dz-message needsclick">
                                        <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                        <h3>Drop files here or click to upload.</h3>
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
                            </div>

                            <div class="mb-3 position-relative">
                                <label class="form-label">Contact Name</label>
                                <input class="form-control" type="text" wire:model="contact_name" required>
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
                        @if ($updatedog)
                            <button type="button" class="btn btn-primary me-2" onclick="updateSave()"><i
                                    class="uil-exit"></i> Update </button>

                            <button type="button" class="btn btn-info  me-2 d-none" id="update_dog"
                                wire:click="updateForm"><i class="uil-exit "></i></button>
                        @else
                            <button type="button" class="btn btn-info me-2" onclick="confirmSave()"><i
                                    class="uil-exit"></i> Submit</button>
                        @endif
                        <button type="button" class="btn btn-info me-2 d-none " wire:click="submitForm"
                            id="add_dog_form"><i class="uil-exit"></i> Submit</button>
                        <button type="button" class="me-1 btn btn-outline-primary "><i class="uil-cloud-times"></i>
                            Cancel</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
    <script>
        function confirmSave() {
            var div = document.getElementById('add_dog_lost');
            div.classList.add('was-validated');
            var inputs = div.querySelectorAll(
                'input[required], select[required], textarea[required]'
                );
            var isValid = true;

            inputs.forEach(function(input) {
                if (input.tagName === 'SELECT') {
                    // Check if a valid option is selected
                    if (input.value === '' || input.value === 'Select gender') {
                        isValid = false; // If not valid, set isValid to false
                        input.classList.add('is-invalid'); // Add invalid class for visual feedback
                    } else {
                        input.classList.remove('is-invalid'); // Remove invalid class if filled
                    }
                } else if (input.tagName === 'TEXTAREA') {
                    // Check if the textarea is empty
                    if (input.value.trim() === '') {
                        isValid = false; // If empty, set isValid to false
                        input.classList.add('is-invalid'); // Add invalid class for visual feedback
                    } else {
                        input.classList.remove('is-invalid'); // Remove invalid class if filled
                    }
                } else {
                    // For input elements
                    if (input.value.trim() === '') {
                        isValid = false; // If any input is empty, set isValid to false
                        input.classList.add('is-invalid'); // Add invalid class for visual feedback
                    } else {
                        input.classList.remove('is-invalid'); // Remove invalid class if filled
                    }
                }
            });

            if (!isValid) {
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
                return false; // Return false to indicate validation failed
            }

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to save this form?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('add_dog_form').click();
                }
            });
        }

        function updateSave() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to update this form?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('update_dog').click();
                }
            });
        }
        document.addEventListener('livewire:init', function() {
         
        });
    </script>
</div> <!-- container -->
