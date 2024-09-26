<div>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row first">
                <div class="col-12 first">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Management</a></li>
                                <li class="breadcrumb-item active">Fur Community</li>
                            </ol>
                        </div>
                        <h4 class="page-title">News Feed</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xxl-3 col-lg-6 order-lg-1 order-xxl-1 fixed-column">
                    <!-- start profile info -->
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Edit Profile</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                </div>
                            </div>

                            <div class="d-flex align-self-start">
                                <img class="d-flex align-self-start rounded me-2"
                                    src="{{ asset('storage/' . Auth::user()->profile_path) }}" alt="Dominic Keller"
                                    height="48">
                                <div class="w-100 overflow-hidden">
                                    <h5 class="mt-1 mb-0">{{ Auth::user()->name }}</h5>
                                    <p class="mb-1 mt-1 text-muted">User</p>
                                </div>
                            </div>
                            <div class="list-group list-group-flush mt-2">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical" wire:ignore>
                                    <a class="nav-link active show list-group-item list-group-item-action border-0"
                                        id="v-pills-timeline-tab" data-bs-toggle="pill" href="#v-pills-timeline"
                                        role="tab" aria-controls="v-pills-timeline" aria-selected="false">
                                        <i class='uil uil-comment-alt-message me-1'></i> Community Posts
                                    </a>
                                    <a class="nav-link  list-group-item list-group-item-action border-0"
                                        id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab"
                                        aria-controls="v-pills-home" aria-selected="true">
                                        <i class='uil uil-images me-1'></i> Profile
                                    </a>
                                    <a class="nav-link list-group-item list-group-item-action border-0"
                                        id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile"
                                        role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                        <i class='uil uil-comment-alt-message me-1'></i> My Post
                                    </a>
                                    <a class="nav-link list-group-item list-group-item-action border-0"
                                        data-bs-toggle="modal" data-bs-target="#request_rounds">
                                        <i class='uil uil-comment-alt-message me-1'></i> Request Rounds
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end profile info -->

                    <!-- event info -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="header-title">Most Clicked Dogs</h4>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Today</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Yesterday</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Last Week</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Last Month</a>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex mt-3">
                                <i class='uil uil-arrow-growth me-2 font-18 text-primary'></i>
                                <div>
                                    <a class="mt-1 font-14" href="javascript:void(0);">
                                        <strong>Jaleel</strong>
                                        <span class="text-muted"><br>
                                            Iure maxime quibusdam nihil facilis sunt quia.
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex mt-3">
                                <i class='uil uil-arrow-growth me-2 font-18 text-primary'></i>
                                <div>
                                    <a class="mt-1 font-14" href="javascript:void(0);">
                                        <strong>Gina </strong><br>
                                        <span class="text-muted">
                                            Omnis voluptas quam quaerat ut dolore velit.
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex mt-3">
                                <i class='uil uil-arrow-growth me-2 font-18 text-primary'></i>
                                <div>
                                    <a class="mt-1 font-14" href="javascript:void(0);">
                                        <strong>Gracie </strong>
                                        <span class="text-muted"><br>
                                            Culpa ab asperiores veritatis nam ea qui.
                                        </span>
                                    </a>
                                </div>
                            </div>

                        </div> <!-- end card-body-->
                    </div>
                    {{-- <div class="card">
                        <div class="card-body p-2">
                            <div class="list-group list-group-flush my-2">
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action border-0"><i
                                        class='uil uil-calendar-alt me-1'></i> Jeel • BullDog • Male </a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action border-0"><i
                                        class='uil uil-calender me-1'></i> Eva's birthday today</a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action border-0"><i
                                        class='uil uil-bookmark me-1'></i> Jenny's wedding tomorrow</a>
                            </div>
                        </div>
                    </div> --}}
                    <!-- end event info -->

                    <!-- news -->
                    <!-- end card-->
                </div> <!-- end col -->

                <div class="col-xxl-9 col-lg-12 order-lg-2 order-xxl-1">
                    <!-- new post -->

                    <!-- end new post -->
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" id="v-pills-timeline" role="tabpanel"
                            aria-labelledby="v-pills-timeline-tab">
                            <div class="card">
                                <div class="card-body p-0">
                                    <ul class="nav nav-tabs nav-bordered">
                                        <li class="nav-item">
                                            <a href="#newpost" data-bs-toggle="tab" aria-expanded="false"
                                                class="nav-link active px-3 py-2">
                                                <i class="mdi mdi-pencil-box-multiple font-18 d-md-none d-block"></i>
                                                <span class="d-none d-md-block">Create Post</span>
                                            </a>
                                        </li>

                                    </ul> <!-- end nav-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active p-3" id="newpost">
                                            <!-- comment box -->
                                            <div class="border rounded">
                                                <form action="#" class="comment-area-box">
                                                    <textarea rows="4" class="form-control border-0 resize-none" placeholder="Write something...."
                                                        wire:model="message"></textarea>
                                                    <div
                                                        class="p-2 bg-light d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <a href="#"
                                                                class="btn btn-sm px-2 font-16 btn-light"
                                                                id="uploadBtn">
                                                                <i class="uil uil-scenery"></i>
                                                            </a>
                                                            <input class="form-control" type="file" id="files"
                                                                wire:model="files" multiple hidden>
                                                        </div>
                                                        <button type="button" wire:click="savePost"
                                                            class="btn btn-sm btn-success"><i
                                                                class='uil uil-message me-1'></i>Post</button>
                                                    </div>
                                                </form>
                                            </div> <!-- end .border-->
                                            <!-- end comment box -->
                                        </div> <!-- end preview-->
                                    </div> <!-- end tab-content-->
                                </div>
                            </div>
                            @foreach ($posts as $p)
                                <div class="card" wire:ignore>
                                    <div class="card-body pb-1">
                                        <div class="d-flex">
                                            <img class="me-2 rounded"
                                                src="{{ asset('storage/' . $p['profile_path']) }}"
                                                alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <div class="dropdown float-end text-muted">
                                                    <a href="#" class="dropdown-toggle arrow-none card-drop"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Edit</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                    </div>
                                                </div>
                                                <h5 class="m-0">{{ $p->user->name }}</h5>
                                                <p class="text-muted">
                                                    <small>{{ \Carbon\Carbon::parse($p['created_at'])->diffForHumans() }}
                                                        <span class="mx-1">⚬</span>
                                                        <span>Public</span></small>
                                                </p>
                                            </div>
                                        </div>

                                        <hr class="m-0" />

                                        <div class="font-16 text-center text-dark my-3">
                                            {{ $p->message }}
                                        </div>

                                        <hr class="m-0" />

                                        <div class="">
                                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i
                                                    class='uil uil-comments-alt'></i> 200 Comments</a>
                                        </div>
                                        <hr class="m-0" />
                                        <div class="mt-3">
                                            <!-- para sa comments -->
                                            <div id="appendhere-{{ $p['post_id_unique'] }}">
                                                @if (isset($comments[$p['post_id_unique']]))
                                                    @foreach ($comments[$p['post_id_unique']] as $c)
                                                        <div class="d-flex">
                                                            <img class="me-2 mt-1 rounded"
                                                                src="{{ asset('storage/' . $c['profile_path']) }}"
                                                                alt="Generic placeholder image" height="32">
                                                            <div class="w-100">
                                                                <div class="d-flex">
                                                                    <h5 class="m-0"> {{ $c['name'] }} </h5>
                                                                    <a onclick="addflex('{{ $c['comment_unique_id'] }}')"
                                                                        class="btn btn-sm btn-link text-muted p-0 ps-2">
                                                                        <i class='uil uil-comments-alt me-1'></i> Reply
                                                                    </a>
                                                                </div>
                                                                <p class="text-muted mb-0">
                                                                    <small>{{ \Carbon\Carbon::parse($c['created_at'])->diffForHumans() }}
                                                                    </small>
                                                                </p>
                                                                <p class="my-1">{{ $c['messages'] }}</p>
                                                                <div>


                                                                </div>
                                                                <!-- for reply in the comment  -->
                                                                <div id="appendhere-{{ $c['comment_unique_id'] }}">
                                                                    @if (isset($replies[$c['comment_unique_id']]))
                                                                        @foreach ($replies[$c['comment_unique_id']] as $r)
                                                                            <div class="d-flex mb-1">
                                                                                <img class="me-2 mt-1 rounded"
                                                                                    src="{{ asset('storage/' . $r['profile_path']) }}"
                                                                                    alt="Generic placeholder image"
                                                                                    height="32">
                                                                                <div>
                                                                                    <h5 class="m-0">
                                                                                        {{ $r['name'] }}
                                                                                    </h5>
                                                                                    <p class="text-muted mb-0">
                                                                                        <small>{{ \Carbon\Carbon::parse($r['created_at'])->diffForHumans() }}</small>
                                                                                    </p>
                                                                                    <p class="">
                                                                                        {{ $r['messages'] }}</p>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                                <div id="reply-{{ $c['comment_unique_id'] }}">

                                                                </div>
                                                                <!-- end d-flex-->
                                                            </div> <!-- end div -->
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <hr />

                                            <!-- reply sa post  -->
                                            <div class="d-flex mb-2">
                                                <img src="{{ asset('storage/' . Auth::user()->profile_path) }}"
                                                    height="32" class="align-self-start rounded me-2"
                                                    alt="Arya Stark" />
                                                <div class="w-100">
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control border-1 form-control-sm"
                                                            wire:model="replycomment" placeholder="Write a comment">
                                                        <a class="input-group-text"
                                                            wire:click="saveComment('{{ $p['post_id_unique'] }}')"
                                                            style="cursor: pointer;"> <i
                                                                class="uil uil-envelope-send"></i>
                                                            <!-- Replace with your desired icon -->
                                                        </a>
                                                    </div>
                                                </div> <!-- end w-100 -->
                                            </div> <!-- end d-flex -->
                                        </div>
                                    </div> <!-- end card-body -->
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade " id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            @livewire('profile')
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <p class="mb-0">.hehehe.</p>
                        </div>
                    </div> <!-- end tab-content-->
                    <div class="text-center mb-3">
                        <a href="javascript:void(0);" class="text-danger"><i
                                class="mdi mdi-spin mdi-loading me-1 font-16"></i> Load more </a>
                    </div>
                    <!-- end loader -->
                </div>


                <!-- end col -->
            </div> <!--end row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Hyper - Coderthemes.com
                </div>
                <div class="col-md-6">
                    <div class="text-md-end footer-links d-none d-md-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- end Footer -->
    <script>
        document.getElementById('uploadprof').addEventListener('click', function() {
            // Trigger the hidden file input click
            document.getElementById('profilepic-input').click();
        });
        document.getElementById('edit').addEventListener('click', function() {
            // Name display and input field
            var nameDisplay = document.getElementById('auth-name');
            var nameInput = document.getElementById('simpleinput');

            // About Me display and textarea
            var aboutMeDisplay = document.getElementById('about-me-display');
            var aboutMeTextarea = document.getElementById('aboutme');

            // Contact display and input field
            var contactDisplay = document.getElementById('contact-display');
            var contactInput = document.getElementById('contact-input');

            // Email display and input field
            var emailDisplay = document.getElementById('email-display');
            var emailInput = document.getElementById('email-input');

            // Address display and input field
            var addressDisplay = document.getElementById('address-display');
            var addressInput = document.getElementById('address-input');

            var saveprof = document.getElementById('saveprof');

            var uploadprof = document.getElementById('uploadprof');


            // Toggle visibility for Name
            uploadprof.classList.toggle('d-none');

            saveprof.classList.toggle('d-none');

            nameDisplay.classList.toggle('d-none');
            nameInput.classList.toggle('d-none');

            // Toggle visibility for About Me
            aboutMeDisplay.classList.toggle('d-none');
            aboutMeTextarea.classList.toggle('d-none');

            // Toggle visibility for Contact
            contactDisplay.classList.toggle('d-none');
            contactInput.classList.toggle('d-none');

            // Toggle visibility for Email
            emailDisplay.classList.toggle('d-none');
            emailInput.classList.toggle('d-none');

            // Toggle visibility for Address
            addressDisplay.classList.toggle('d-none');
            addressInput.classList.toggle('d-none');
        });


        document.addEventListener('livewire:init', function() {
            Livewire.on('saveRounds', event => {
                closeAllModals();
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
            Livewire.on('dogAdopted', event => {
                closeAllModals();
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
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            window.Echo.channel('newpost_received').listen('NewPostEvent', (event) => {
                console.log(event);
            });
            window.Echo.channel('reply_channel').listen('NewReplyEvent', (event) => {
                var reply = event.newreply[0];
                var comment_id = event.comment_id;
                appendNewReply(reply, comment_id);
            });
            window.Echo.channel('new_comment').listen('NewCommentEvent', (event) => {
                var comment = event.newcomment[0];
                var post_id = event.post_id;
                console.log(comment);
                appendNewComment(comment, post_id); // Assuming the event has a comment object

            });
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


        document.getElementById('uploadBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default anchor click behavior
            document.getElementById('files').click(); // Trigger the file input click
        });

        function addflex(id) {
            console.log(id);

            // Create the new HTML content
            const newHtml = `
                <div class="d-flex mt-1 mb-2" id="removethis">
                    <img class="me-2 rounded" src="{{ asset('storage/' . Auth::user()->profile_path) }}" alt="Generic placeholder image" height="32">
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-1 form-control-sm" wire:model="replyrepl" placeholder="Write a reply">
                            <a class="input-group-text" wire:click="saveReply('${id}')" style="cursor: pointer;">
                                <i class="uil uil-envelope-send"></i>
                            </a>
                        </div>
                    </div>
                </div>
            `;

            var element = document.getElementById('removethis');
            if (element) {
                element.parentNode.removeChild(element);
            }
            // Find the container by id
            const container = document.getElementById('reply-' + id);
            if (container) {
                // Remove any previously added reply box

                // Add the new reply box
                container.insertAdjacentHTML('beforeend', newHtml);
            } else {
                console.error(`Element with id reply-${id} not found.`);
            }
        }
    </script>
</div>
