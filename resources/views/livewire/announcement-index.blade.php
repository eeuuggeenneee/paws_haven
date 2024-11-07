<div>
    <div class="content">
        <!-- Start Content-->
        <div class="px-4">
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

                <div class="col-xxl-3 col-lg-6 order-lg-1 order-xxl-1 fixed-column ">
                    <!-- start profi le info -->
                    <div class="card " >
                        <div class="card-body">

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
                                        <i class='uil uil-comment-alt-message me-1'></i> Annoucements
                                    </a>
                                    <a class="nav-link list-group-item list-group-item-action border-0"
                                        data-bs-toggle="modal" data-bs-target="#create_aa">
                                        <i class='uil uil-comment-alt-message me-1'></i> Create Annoucements
                                    </a>
                                    <a class="nav-link  list-group-item list-group-item-action border-0"
                                        id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab"
                                        aria-controls="v-pills-home" aria-selected="true">
                                        <i class='uil uil-images me-1'></i> Profile
                                    </a>
                                    {{-- <a class="nav-link list-group-item list-group-item-action border-0"
                                        id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile"
                                        role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                        <i class='uil uil-comment-alt-message me-1'></i> My Post
                                    </a> --}}
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

                <div class="col-xxl-9 col-lg-12 order-lg-2 order-xxl-1 scrollable-column">
                    <!-- new post -->
                    <div class="tab-content scroll-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" id="v-pills-timeline" role="tabpanel"
                            aria-labelledby="v-pills-timeline-tab">
                            @if (isset($annoucements))
                                @foreach ($annoucements as $announcement)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <h3 class="mt-0">{{ $announcement['title'] }}</h3>

                                                <div class="dropdown card-widgets ms-auto">
                                                    <a href="#" class="dropdown-toggle arrow-none"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="uil uil-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">
                                                            <i class="uil uil-edit me-1"></i>Edit
                                                        </a>
                                                        <!-- item-->
                                                        <div class="dropdown-divider"></div>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item text-danger">
                                                            <i class="uil uil-trash-alt me-1"></i>Delete
                                                        </a>
                                                    </div> <!-- end dropdown menu-->
                                                </div> <!-- end dropdown-->
                                            </div>
                                            <p>
                                                {!! nl2br(e($announcement['sub_title'])) !!}
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
            </div> <!--end row -->
        </div> <!-- container -->
    </div> <!-- content -->

</div>
