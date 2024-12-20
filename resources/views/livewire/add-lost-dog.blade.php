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
                                        <label for="dog_name" class="form-label">Breed
                                            @if (Auth::user()->type == 1)
                                                <small> (missing dog breed?
                                                    <a onclick="clickDogbreed()" class="text-primary">click
                                                        here)</a></small>
                                            @endif
                                        </label>
                                        <select id="dog_breed" name="dog-breed" class="form-select" wire:model="breed"
                                            required wire:ignore>
                                            <option value="" selected>Select a breed</option>
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
                                    wire:model="date_found" min="2024-01-01" max="{{ date('Y-m-d') }}">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom03">Barangay</label>
                                        <select class="form-select mb-3" wire:model="barangay_f" required>
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
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="location_found" class="form-label">Specific Location</label>
                                        <input type="text" id="location_found" class="form-control"
                                            placeholder="Enter specific location (optional)"
                                            wire:model="location_found">
                                    </div>
                                </div>
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
                        <div class="col-xl-6" wire:ignore>
                            <div class="mb-3 mt-3 mt-xl-0">
                                <label for="projectname" class="mb-0">Dog Images</label>
                                <p class="text-muted font-14">Recommended thumbnail size 800x400 (px).</p>

                                <!-- File Upload -->
                                <form action="{{ route('upload.images') }}" method="post" wire:ignore
                                    enctype="multipart/form-data" class="dropzone" id="myAwesomeDropzone"
                                    data-plugin="dropzone" data-previews-container="#file-previews"
                                    data-upload-preview-template="#uploadPreviewTemplate">
                                    @csrf
                                    <div class="fallback">
                                        <input type="file" class="d-none" wire:ignore wire:model="images" multiple
                                            accept="image/*">
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
                            @if (Auth::user()->type != 1)
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Contact Name</label>
                                    <input class="form-control" type="text" wire:model="contact_name" required>
                                </div>
                                <div class="mb-3" wire:ignore>
                                    <label class="form-label" for="validationCustom03"
                                        id="label_phonenumber_claim">Contact Number</label>

                                    <div class="input-group" wire:ignore.self>
                                        <input type="tel" class="form-control" wire:ignore.self
                                            id="phonenumber_claim" placeholder="09123456789" required
                                            wire:model="contact_number" pattern="09[0-9]{9}"
                                            title="Phone number must start with 09 and contain exactly 11 digits."
                                            maxlength="11" oninput="validatePhoneNumber(this);">

                                        <input type="number" wire:ignore.self class="form-control d-none"
                                            id="otp_input" wire:model="otp_input" max="999999"
                                            oninput="this.value = this.value.slice(0, 6)"
                                            placeholder="Please input 6 digits code">

                                        <button class="btn btn-outline-secondary" wire:ignore.self id="verify_button"
                                            type="button" wire:click="verifyMobile('requestdog')"
                                            disabled>Verify</button>
                                        <button class="btn btn-outline-secondary d-none" wire:ignore.self
                                            id="verify_otp" type="button" wire:click="checkOTP">Submit</button>
                                    </div>
                                    <small id="resend_container" wire:ignore.self>

                                    </small>

                                    <div class="invalid-feedback">
                                        Please provide a valid phone number.
                                    </div>
                                </div>
                            @endif
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->
                    <div class="d-flex">
                        @if ($updatedog)
                            <button type="button" class="btn btn-primary me-2 text-white" onclick="updateSave()"><i
                                    class="uil-exit"></i> Update </button>

                            <button type="button" class="btn btn-info  me-2 d-none" id="update_dog"
                                wire:click="updateForm"><i class="uil-exit "></i></button>
                        @else
                            <button type="button" class="btn btn-info me-2" onclick="confirmSave()"><i
                                    class="uil-exit"></i> Submit</button>
                        @endif
                        <button type="button" class="btn btn-info me-2 d-none " wire:click="submitForm"
                            id="add_dog_form"><i class="uil-exit"></i> Submit</button>
                        <button type="reset" class="me-1 btn btn-outline-primary " data-bs-dismiss="modal"
                            aria-label="Close"><i class="uil-cloud-times"></i>
                            Cancel</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
    <script>
        function clickDogbreed() {
            $('#addmorebreed').modal('show');
        }

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

            const filePreviewsContainer = document.getElementById('file-previews');
            if (filePreviewsContainer.children.length > 0) {
                console.log('There is at least one file preview.');
            } else {
                isValid = false;
                console.log('No files uploaded.');
            }

            var phone_dog_c2 = document.getElementById('phonenumber_claim');



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

            if (!phone_dog_c2.classList.contains('verified')) {
                phone_dog_c2.classList.add('is-invalid');
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

            Livewire.on('newdogbreed', event => {
                let newbreed = event[0];
                console.log(event[0])

                let newBreedId = newbreed.id;
                let newBreedName = newbreed.name;

                let newOption = document.createElement('option');
                newOption.value = newBreedId;
                newOption.textContent = newBreedName;
                document.getElementById('dog_breed').appendChild(newOption);
            });


            Livewire.on('dogSaved', event => {
                closeAllModals();

                const dropzoneInstance = Dropzone.forElement("#myAwesomeDropzone");
                if (dropzoneInstance) {
                    dropzoneInstance.removeAllFiles(true); // Remove all files (true: cancel uploads)
                }

                var phone_v = document.getElementById('phonenumber_claim');
                if (!phone_v.classList.contains('verified')) {
                    console.log('walang verified');
                    if (phone_v.classList.contains('d-none')) {
                        changeInput();
                        phone_v.value = ''; // Reset the phone number input
                        document.getElementById('otp_input').value = ''; // Clear OTP input
                    }
                } else {
                    console.log('verified');
                    if (!phone_v.classList.contains('d-none')) {
                        // changeInput();
                        phone_v.disabled = false;
                        phone_v.classList.remove('verified','is-valid')
                        document.getElementById('verify_button').classList.toggle('d-none');
                        phone_v.value = ''; // Reset the phone number input
                        document.getElementById('otp_input').value = ''; // Clear OTP input
                    }
                }
                Swal.fire({
                    icon: 'success',
                    title: 'Ticket Number : ' + event[0],
                    text: 'Your report has been submitted. Please expect a call from the pound.',
                    confirmButtonText: 'Okay'
                }).then((result) => {


                });
            });



            Livewire.on('otp_result2', event => {
                console.log(event);
                if (event[1] == 'requestdog') {
                    var phone5 = document.getElementById('phonenumber_claim');
                    var otp_input5 = document.getElementById('otp_input');
                    if (event[0]) {
                        changeInput();
                        phone5.disabled = true;
                        phone5.classList.remove('is-invalid')
                        phone5.classList.add('verified', 'is-valid')
                        phone5.value = event[2];

                        document.getElementById('verify_button').classList.toggle('d-none');
                        document.getElementById('resend_container').classList.toggle('d-none');
                    } else {
                        otp_input5.classList.add('is-invalid')
                    }
                }
            });


        });
    </script>
</div> <!-- container -->
