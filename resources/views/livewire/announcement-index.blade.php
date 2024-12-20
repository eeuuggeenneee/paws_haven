<div>
    <div class="content">
        <!-- Start Content-->
        <div class="px-xl-4">
            <!-- start page title -->
            <div class="row first">
                <div class="col-12 first">
                    <div class="page-title-box">
                        <h4 class="page-title">Annoucements</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xxl-3 col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-self-start">
                                        <img class="d-flex align-self-start rounded me-2"
                                            src="{{ asset('storage/' . Auth::user()->profile_path) }}"
                                            alt="Dominic Keller" height="48">
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
                                                <i class='uil uil-comment-alt-message me-1'></i> Annoucements
                                            </a>
                                            @if (Auth::user()->type == 1)
                                                <a class="nav-link list-group-item list-group-item-action border-0"
                                                    id="annc_active" onclick="activeRounds()" data-bs-toggle="modal"
                                                    data-bs-target="#create_aa">
                                                    <i class='uil uil-comment-alt-message me-1'></i> Create Annoucements
                                                </a>
                                            @endif
                                            <a class="nav-link  list-group-item list-group-item-action border-0"
                                                id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home"
                                                role="tab" aria-controls="v-pills-home" aria-selected="true">
                                                <i class='uil uil-images me-1'></i> Profile
                                            </a>
                                            {{-- <a class="nav-link list-group-item list-group-item-action border-0"
                                                id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile"
                                                role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                                <i class='uil uil-comment-alt-message me-1'></i> My Post
                                            </a> --}}
                                            @if (Auth::user()->type == 0)
                                                <a class="nav-link list-group-item list-group-item-action border-0"
                                                    onclick="activeRounds()" id="rounds_active" data-bs-toggle="modal"
                                                    data-bs-target="#request_rounds">
                                                    <i class='uil uil-comment-alt-message me-1'></i> Request Rounds
                                                </a>

                                                <a class="nav-link list-group-item list-group-item-action border-0"
                                                    data-bs-toggle="modal" href="#"
                                                    data-bs-target="#lostandfounddog" id="lostandfoudSelect"
                                                    onclick="activeRounds()">
                                                    <i class='uil uil-comment-alt-message me-1'></i> Report Lost Dog
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xl-12 d-lg-block d-none">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h4 class="header-title">Most Popular Dogs</h4>
                                                <div class="dropdown">

                                                </div>
                                            </div>
                                            @if (isset($dogclicked))
                                                @if (count($dogclicked) == 0)
                                                    <p>No Available Data</p>
                                                @else
                                                    @foreach ($dogclicked as $clicked)
                                                        <div class="d-flex mt-1">
                                                            <i
                                                                class='uil uil-arrow-growth me-2 font-18 text-primary'></i>
                                                            <div>
                                                                <p class="mt-1 font-14" href="javascript:void(0);">
                                                                    <strong>{{ $clicked['dog_name'] }}</strong>
                                                                    <span class="text-muted"><br>
                                                                        {{ $clicked['description'] }}
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            @endif
                                        </div> <!-- end card-body-->
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <div class="col-xxl-9 col-lg-12 scrollable-column">
                    <div class="tab-content scroll-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" id="v-pills-timeline" role="tabpanel"
                            aria-labelledby="v-pills-timeline-tab">
                            @if (isset($annoucements))
                                @foreach ($annoucements as $announcement)
                                    <div class="card" id="annoucement-{{ $announcement['id'] }}">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <h3 class="mt-0">{{ $announcement['title'] }}</h3>
                                                @if (Auth::user()->type == 1)
                                                    <div class="dropdown card-widgets ms-auto">
                                                        <a href="#" class="dropdown-toggle arrow-none"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="uil uil-ellipsis-h"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item"
                                                                wire:click="$dispatch('editAnnouncement', [ '{{ $announcement['id'] }}' ])"
                                                                data-bs-toggle="modal" data-bs-target="#update_aa">
                                                                <i class="uil uil-edit me-1"></i>Edit
                                                            </a>
                                                            <a href="javascript:void(0);"
                                                                onclick="deleteAnnouce('{{ $announcement['id'] }}')"
                                                                class="dropdown-item text-danger">
                                                                <i class="uil uil-trash-alt me-1"></i>Delete
                                                            </a>
                                                        </div> <!-- end dropdown menu-->
                                                    </div> <!-- end dropdown-->
                                                @endif
                                            </div>
                                            <p>
                                                {!! $announcement['sub_title'] !!}
                                            </p>
                                            <h5 class="mt-3">Overview:</h5>
                                            <p class="text-muted mb-3">
                                                {!! $announcement['message'] !!}
                                            </p>
                                            <div class="row">
                                                <div class="col-6">
                                                    <!-- assignee -->
                                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">
                                                        Posted By
                                                    </p>
                                                    <div class="d-flex">
                                                        <img src="{{ asset('storage/profile_pictures/' . basename($announcement['profile_path'])) }}"
                                                            alt="Arya S" class="rounded-circle me-2"
                                                            height="24">
                                                        <div>
                                                            <h5 class="mt-1 font-14">
                                                                {{ $announcement['name'] }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <!-- end assignee -->
                                                </div> <!-- end col -->
                                                <div class="col-6">
                                                    <!-- start due date -->
                                                    <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Date
                                                        Posted</p>
                                                    <div class="d-flex">
                                                        <i class="uil uil-schedule font-18 text-success me-1"></i>
                                                        <div>
                                                            <h5 class="mt-1 font-14">
                                                                {{ $announcement['created_at']->format('M d, y H:i A') }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <!-- end due date -->
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>
                                    </div>
                                @endforeach
                            @endif

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
                </div>
                <div class="col-xxl-3 col-lg-12 d-md-none d-block">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h4 class="header-title">Most Clicked Dogs</h4>
                                        <div class="dropdown">

                                        </div>
                                    </div>
                                    @if (isset($dogclicked))
                                        @foreach ($dogclicked as $clicked)
                                            <div class="d-flex mt-1">
                                                <i class='uil uil-arrow-growth  font-18 text-primary'></i>
                                                <div>
                                                    <p class="mt-1 font-14" href="javascript:void(0);">
                                                        <strong>{{ $clicked['dog_name'] }}</strong>
                                                        <span class="text-muted"><br>
                                                            {{ $clicked['description'] }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div> <!-- end card-body-->
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!--end row -->
        </div> <!-- container -->
    </div> <!-- content -->
    <script>
        document.querySelectorAll('[contenteditable="true"]').forEach(element => {
            element.removeAttribute('contenteditable');
        });

        let activeElement;

        function deleteAnnouce(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this announcement?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var card = document.getElementById('annoucement-' + id);
                    if (card) {
                        card.remove(); // Remove the card element from the DOM
                    }
                    Livewire.dispatch('deleteAnnoucement', {
                        a_id: id
                    })

                    Swal.fire('Deleted!', 'The announcement has been deleted.', 'success');
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Cancelled', 'Your announcement is safe :)', 'error');
                }
            });
        }

        function activeRounds() {
            activeElement = document.querySelector('#v-pills-tab .active');
            if (activeElement) {
                activeElement.classList.remove('active');
                console.log('Active element ID:', activeElement.id);

                return activeElement.id;
            } else {
                console.log('No active element found');
                return null;
            }
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
    </script>

</div>
