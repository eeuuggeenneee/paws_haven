<div>
    <div class="card bg-primary">
        <div class="card-body profile-user-box">
            <div class="row">
                <div class="col-sm-8">
                    <div class="row align-items-center">
                        <div class="col-auto text-center">
                            <div class="avatar-lg" style="position: relative;">
                                <!-- Profile Image -->
                                <img id="profile-image-preview" src="{{ asset('storage/' . Auth::user()->profile_path) }}"
                                    wire:ignore alt="Profile Picture"
                                    style="width: 86px; height: 86px; min-width: 86px; max-width: 86px; min-height: 86px; max-height: 86px;"
                                    class="rounded-circle img-thumbnail">

                                <!-- Upload Button below the image (absolute position inside avatar-lg container) -->
                                <button type="button" class="mt-1 mb-2 btn btn-success btn-sm d-none" id="uploadprof"
                                    wire:ignore.self onclick="triggerFileInputClick()"
                                    style="position: absolute; bottom: -30px; left: 50%; transform: translateX(-50%); z-index: 10;">
                                    Upload
                                </button>
                            </div>

                            <!-- Hidden File Input -->
                            <input type="file" class="" wire:model="profilepic" id="profilepic-input"
                                style="display: none;" onchange="previewImage(event)">
                        </div>
                        <div class="col">
                            <div>
                                <h4 class="mt-1 mb-1 text-white">
                                    <input type="text" wire:ignore.self id="simpleinput"
                                        class="w-50 text-white form-control bg-transparent d-none"
                                        value="{{ Auth::user()->name }}" wire:model="cfullname">
                                    <span id="auth-name" class="text-black"
                                        wire:ignore.self>{{ Auth::user()->name }}</span>
                                </h4>
                                <p class="font-13 text-black-50 text-capitalize">
                                    @php
                                        $role = 'User';
                                        if (Auth::user()->type == 1) {
                                            $role = 'Admin';
                                        }
                                    @endphp
                                    {{ $role }}</p>
                                {{-- <ul class="mb-0 list-inline text-black">
                                    <li class="list-inline-item me-3">
                                        <h5 class="mb-1 text-black">{{ $postcount }}</h5>
                                        <p class="mb-0 font-13 ">Total Rounds Requested</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="mb-1 text-black">{{ $commentcount }}</h5>
                                        <p class="mb-0 font-13 ">Total Adoption Requested
                                        </p>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="mb-1 text-black">{{ $commentcount }}</h5>
                                        <p class="mb-0 font-13 ">Total Lost and Found Reported
                                        </p>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-sm-4">
                    <div class="text-center mt-sm-0 mt-3 text-sm-end">
                        <button type="button" class="btn btn-light" id="editProfile" onclick="toggleEdit()">
                            <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                        </button>
                    </div>
                </div> <!-- end col-->
            </div> <!-- end row -->

        </div> <!-- end card-body/ profile-user-box-->
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mt-0 mb-3">About</h4>
            <p class="text-muted font-13">
            <p id="about-me-display" wire:ignore>
                {{ Auth::user()->about_me ?? 'This Description might help you adopt your favorite dog' }}
            </p>
            <textarea class="form-control d-none" wire:ignore.self id="aboutme" rows="4" wire:model="cabout_me">{{ Auth::user()->about_me ?? 'This Description might help you adopt your favorite dog' }}</textarea>
            </p>
            <hr />

            <div class="text-start">
                <p class="text-black">
                    <strong>Mobile Number:</strong>
                    <span id="contact-display" class="ms-2" wire:ignore>{{ Auth::user()->contact }}</span>
                    <input type="tel" id="contact-input" class="form-control d-none ms-2" id="validationCustom03"
                        placeholder="09123456789" required wire:model="c_contact" pattern="09[0-9]{9}"
                        title="Phone number must start with 09 and contain exactly 11 digits." maxlength="11"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);" wire:ignore.self>
                </p>

                <!-- Email -->
                <p class="text-black">
                    <strong>Email:</strong>
                    <span id="email-display" class="ms-2" wire:ignore>{{ Auth::user()->email }}</span>
                    <input type="email" id="email-input" class="form-control d-none ms-2" wire:ignore.self
                        value="{{ Auth::user()->email }}" wire:model="c_email">
                </p>

                <!-- Address -->
                <p class="text-black">
                    <strong>Address:</strong>
                    <span id="address-display" class="ms-2" wire:ignore>{{ Auth::user()->address }}</span>
                    <input type="text" id="address-input" class="form-control d-none ms-2" wire:ignore.self
                        value="{{ Auth::user()->address }}" wire:model="c_address">
                </p>
            </div>

            <div class="text-center">
                <button type="button" onclick="fConfirm()" class="btn btn-success d-none" id="saveprof"
                    wire:ignore.self><i class="uil-cloud-computing"></i> Save Profile </button>
                <button type="button" wire:click="saveProf" class="btn btn-success d-none" id="saveprofDatabase"
                    wire:ignore.self><i class="uil-cloud-computing"></i> Save Profile </button>

            </div>
        </div>
    </div>
    <script>
        const fileInput = document.getElementById('profilepic-input');

        function triggerFileInputClick() {
            fileInput.click();
        }

        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                // Set the image source to the selected file
                const imagePreview = document.getElementById('profile-image-preview');
                imagePreview.src = e.target.result; // This is the base64 encoded image
            };

            // Read the file as Data URL to create a base64 string
            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function fConfirm() {
            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to update your profile?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('saveprofDatabase').click();

                    if (fileInput.files && fileInput.files[0]) {
                        Swal.fire({
                            title: 'Your profile has been updated.',
                            text: 'Please reload the page to sync the image to your new profile picture.',
                            icon: 'success',
                            confirmButtonText: 'Reload Now',
                            preConfirm: () => {
                                location
                                    .reload(); // Reload the page to reflect the updated profile picture
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Updated!',
                            text: 'Your profile has been updated.',
                            icon: 'success'
                        });
                    }

                    updateDisplayValues();
                    toggleEdit();
                }
            });
        }

        function updateDisplayValues() {
            // Update "About Me" display
            document.getElementById('about-me-display').textContent = document.getElementById('aboutme').value;

            // Update "Contact" display
            document.getElementById('contact-display').textContent = document.getElementById('contact-input').value;

            // Update "Email" display
            document.getElementById('email-display').textContent = document.getElementById('email-input').value;

            // Update "Address" display
            document.getElementById('address-display').textContent = document.getElementById('address-input').value;
        }

        function toggleEdit() {
            // Toggle visibility for 'about me' fields
            document.getElementById('about-me-display').classList.toggle('d-none');
            document.getElementById('aboutme').classList.toggle('d-none');

            // Toggle visibility for 'contact' fields
            document.getElementById('contact-display').classList.toggle('d-none');
            document.getElementById('contact-input').classList.toggle('d-none');

            // Toggle visibility for 'email' fields
            document.getElementById('email-display').classList.toggle('d-none');
            document.getElementById('email-input').classList.toggle('d-none');

            // Toggle visibility for 'address' fields
            document.getElementById('address-display').classList.toggle('d-none');
            document.getElementById('address-input').classList.toggle('d-none');

            // Toggle visibility for the 'Save Profile' button
            document.getElementById('saveprof').classList.toggle('d-none');

            document.getElementById('uploadprof').classList.toggle('d-none');

        }
    </script>
</div>
