<div>
    <div class="card bg-primary">
        <div class="card-body profile-user-box">
            <div class="row">
                <div class="col-sm-8">
                    <div class="row align-items-center">
                        <div class="col-auto text-center">
                            <div class="avatar-lg ">
                                <img src="{{ asset('storage/' . Auth::user()->profile_path) }}" alt=""
                                    style="width: 86px; height: 86px; min-width: 86px; max-width: 86px; min-height: 86px; max-height: 86px;"
                                    class="rounded-circle img-thumbnail">
                            </div>
                            <button type="button" class="mt-1 d-none btn btn-success btn-sm" id="uploadprof"
                                wire:ignore.self>Upload</button>
                            <input type="file" hidden wire:model="profilepic" id="profilepic-input">
                        </div>
                        <div class="col">
                            <div>
                                <h4 class="mt-1 mb-1 text-white">
                                    <input type="text" wire:ignore.self id="simpleinput"
                                        class="w-50 text-white form-control bg-transparent d-none"
                                        value="{{ Auth::user()->name }}" wire:model="cfullname">
                                    <span id="auth-name" wire:ignore.self>{{ Auth::user()->name }}</span>
                                </h4>
                                <p class="font-13 text-white-50 text-capitalize">
                                    {{ Auth::user()->role }}</p>
                                <ul class="mb-0 list-inline text-light">
                                    <li class="list-inline-item me-3">
                                        <h5 class="mb-1 text-white">{{ $postcount }}</h5>
                                        <p class="mb-0 font-13 text-white-50">Total Post</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="mb-1 text-white">{{ $commentcount }}</h5>
                                        <p class="mb-0 font-13 text-white-50">Total Comments
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-sm-4">
                    <div class="text-center mt-sm-0 mt-3 text-sm-end">
                        <button type="button" class="btn btn-light" id="edit">
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
            <p id="about-me-display" wire:ignore.self>
                {{ Auth::user()->about_me ?? 'This Description might help you adopt your favorite dog' }}
            </p>
            <textarea class="form-control d-none" wire:ignore.self id="aboutme" rows="4" wire:model="cabout_me">{{ Auth::user()->about_me ?? 'This Description might help you adopt your favorite dog' }}</textarea>
            </p>
            <hr />

            <div class="text-start">
                <p class="text-muted">
                    <strong>Mobile Number:</strong>

                    <span id="contact-display" class="ms-2" wire:ignore.self>{{ Auth::user()->contact }}</span>

                    <input type="tel" id="contact-input" class="form-control d-none ms-2" id="validationCustom03" placeholder="09123456789"
                        required wire:model="c_contact" pattern="09[0-9]{9}"
                        title="Phone number must start with 09 and contain exactly 11 digits." maxlength="11"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);" wire:ignore.self>
                </p>

                <!-- Email -->
                <p class="text-muted">
                    <strong>Email:</strong>
                    <span id="email-display" class="ms-2" wire:ignore.self>{{ Auth::user()->email }}</span>
                    <input type="email" id="email-input" class="form-control d-none ms-2" wire:ignore.self
                        value="{{ Auth::user()->email }}" wire:model="c_email">
                </p>

                <!-- Address -->
                <p class="text-muted">
                    <strong>Address:</strong>
                    <span id="address-display" class="ms-2" wire:ignore.self>{{ Auth::user()->address }}</span>
                    <input type="text" id="address-input" class="form-control d-none ms-2" wire:ignore.self
                        value="{{ Auth::user()->address }}" wire:model="c_address">
                </p>
            </div>

            <div class="text-center">
                <button type="button" wire:click="saveProf" class="btn btn-success d-none" id="saveprof"
                    wire:ignore.self><i class="uil-cloud-computing"></i> Save Profile </button>

            </div>
        </div>
    </div>
</div>
