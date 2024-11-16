<div>
    <style>
        .responsive-div {
            overflow-y: auto;
        }

        @media (min-width: 1200px) {

            /* For large screens (XL and above) */
            .responsive-div {
                min-height: 500px;
                max-height: 500px;
                display: flex;
                flex-direction: row;
                overflow-y: auto;
                padding: 0;
            }
        }

        @media (max-width: 576px) {

            /* For small screens (SM and below) */
            .responsive-div {
                min-height: 100px;
                max-height: 100px;
                display: flex;
                flex-direction: column;
                overflow-x: auto;
            }
        }
    </style>
    <div class="modal fade" id="ticketlist" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Ticket Lists</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-3 col-sm-12 border-end ">
                            <h5 class="text-center">Ticket Number</h5>
                            <hr class="mt-1 mb-1">
                            <ul class="nav nav-tabs nav-bordered responsive-div d-flex justify-content-center align-items-center"
                                role="tablist">
                                @if (isset($notifModal))
                                    @foreach ($notifModal as $notif)
                                        @php
                                            $ticketno = '';
                                            $statusP = '';
                                            $statusExtact = '';
                                            if ($notif['table_source'] == 'claims') {
                                                $ticketno =
                                                    'C' .
                                                    (new DateTime($notif['created_at']))->format('ym') .
                                                    '-' .
                                                    str_pad($notif['id'], 4, '0', STR_PAD_LEFT);
                                                    $statusP = $notif['status_name'];
                                            } elseif ($notif['table_source'] == 'adoption') {
                                                $ticketno =
                                                    'A' .
                                                    (new DateTime($notif['created_at']))->format('ym') .
                                                    '-' .
                                                    str_pad($notif['id'], 4, '0', STR_PAD_LEFT);
                                                if($notif['status_name'] == 'For Adoption'){
                                                    $statusP = 'Adoption Rejected';
                                                }else{
                                                    $statusP = $notif['status_name'];
                                                }

                                               
                                            } elseif ($notif['table_source'] == 'rounds') {
                                                $ticketno =
                                                    'R' .(new DateTime($notif['created_at']))->format('ym') .
                                                    '-' .
                                                    str_pad($notif['id'], 4, '0', STR_PAD_LEFT);
                                                if ($notif['is_approved'] == null && $notif['is_approved'] != 0) {
                                                    $statusP = 'Rounds Pending';
                                                }else if($notif['is_approved'] == 0){
                                                    $statusP = 'Rounds Rejected';
                                                }else{
                                                    $statusP = 'Rounds Approved';
                                                }

                                            } elseif ($notif['table_source'] == 'found_form') {
                                                $ticketno =
                                                    'F' .
                                                    (new DateTime($notif['created_at']))->format('ym') .
                                                    '-' .
                                                    str_pad($notif['id'], 4, '0', STR_PAD_LEFT);
                                                if($notif['status_name'] == 'Found Dog'){
                                                    $statusP = 'Request Approved';
                                                }else{
                                                    $statusP = $notif['status_name'];
                                                }
                                            }
                                        @endphp
                                        <li class="nav-item" role="presentation">
                                            <a href="#{{ $ticketno }}" id="click-{{ $ticketno }}"
                                                class="bordered text-black nav-link @if ($loop->first) active @endif"
                                                data-bs-toggle="tab" role="tab" aria-controls="nav-preview"
                                                aria-selected="true">
                                                {{ $ticketno }}<br>
                                                <small><span class="badge rounded-pill text-black"
                                                        style="background-color: #9cddd7">{{ $statusP }}</span></small>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="col-xl-9 col-sm-12"
                            style="min-height: 500px; max-height: 500px;  overflow-y: auto;">
                            <div class="tab-content">
                                @if (isset($notifModal))
                                    @foreach ($notifModal as $notif)
                                        @php
                                            $ticketno = '';
                                            $statusP = '';
                                            $statusExtact = '';
                                            if ($notif['table_source'] == 'claims') {
                                                $ticketno =
                                                    'C' .
                                                    (new DateTime($notif['created_at']))->format('ym') .
                                                    '-' .
                                                    str_pad($notif['id'], 4, '0', STR_PAD_LEFT);
                                                $statusP = $notif['status_name'];
                                                if($notif['status_name'] == 'Adoption Rejected'){
                                                    $statusP = $notif['status_name'];
                                                }
                                        
                                            } elseif ($notif['table_source'] == 'adoption') {
                                                $ticketno =
                                                    'A' .
                                                    (new DateTime($notif['created_at']))->format('ym') .
                                                    '-' .
                                                    str_pad($notif['id'], 4, '0', STR_PAD_LEFT);
                                                $statusP = $notif['status_name'];
                                            } elseif ($notif['table_source'] == 'rounds') {
                                                $ticketno =
                                                    'R' .(new DateTime($notif['created_at']))->format('ym') .
                                                    '-' .
                                                    str_pad($notif['id'], 4, '0', STR_PAD_LEFT);
                                                if ($notif['is_approved'] == null && $notif['is_approved'] != 0) {
                                                    $statusP = 'Rounds Pending';
                                                }else if($notif['is_approved'] == 0){
                                                    $statusP = 'Rounds Rejected';
                                                }
                                            } elseif ($notif['table_source'] == 'found_form') {
                                                $ticketno =
                                                    'F' .
                                                    (new DateTime($notif['created_at']))->format('ym') .
                                                    '-' .
                                                    str_pad($notif['id'], 4, '0', STR_PAD_LEFT);
                                                $statusP = $notif['status_name'];
                                            }
                                        @endphp
                                        <div class="tab-pane @if ($loop->first) active show @endif"
                                            id="{{ $ticketno }}" role="tabpanel">
                                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                                <h4 class="mb-0">Ticket Number : {{ $ticketno }}</h4>
                                                @if($statusP != 'Rounds Rejected')
                                                <button type="button"
                                                    class="btn btn-danger mt-1 btn-sm d-flex align-items-center"
                                                    onclick="cancelR('{{ $notif['id'] }}','{{ $notif['table_source'] }}','{{ $ticketno }}')">
                                                    <i class="uil uil-cancel"></i> <span
                                                        class="d-lg-block d-none ms-2">Cancel</span>
                                                </button>
                                                

                                                @endif
                                               
                                            </div>
                                            @if ($notif['table_source'] == 'rounds')
                                                <div class="row text-black">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="px-2 py-2">
                                                                <h4 class="header-title mb-3">Information</h4>
                                                                <ul class="list-unstyled mb-0">
                                                                    <li>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Requestor:</span>
                                                                            {{ $notif['name'] }}</p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Barangay:</span>
                                                                            {{ $notif['barangay'] }}</p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Address:</span>
                                                                            {{ $notif['address'] }}</p>

                                                                        <p class="mb-0"><span
                                                                                class="fw-bold me-2">Contact
                                                                                Number:</span>
                                                                            {{ $notif['contact'] }} </p>
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="px-2 py-2">
                                                                <h4>Reason</h4>
                                                                <div class="text-center">
                                                                    <p class="mb-0">{{ $notif['reason'] }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($notif['table_source'] == 'claims')
                                                <div class="row text-black">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="px-2 py-2">
                                                                <h4 class="header-title mb-3">Claim Information</h4>
                                                                <ul class="list-unstyled mb-0">
                                                                    <li>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Requestor:</span>
                                                                            {{ $notif['fullname'] }}</p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Address:</span>
                                                                            {{ $notif['address'] }}</p>
                                                                        </p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Breed:</span>
                                                                            {{ $notif['breed'] }}
                                                                        </p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Gender:</span>
                                                                            {{ $notif['gender'] }}
                                                                        </p>
                                                                        <p class="mb-0"><span
                                                                                class="fw-bold me-2">Contact
                                                                                Number:</span>
                                                                            {{ $notif['contact'] }} </p>
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="px-2 py-2">
                                                                <h4>Proof</h4>
                                                                <div class="text-center">
                                                                    <img src="{{ asset('storage/' . $notif['proof']) }}"
                                                                        class="img-thumbnail" alt="friend"
                                                                        style="min-width: 250px; min-height: 170px; width: 250px; height: 170px; object-fit: cover;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="px-2 py-2">
                                                                <h4>Dog Details</h4>
                                                                @php
                                                                    $images = [];
                                                                    if (isset($notif)) {
                                                                        $images = json_decode($notif['animal_images']);
                                                                    }
                                                                @endphp
                                                                <div class="d-lg-flex justify-content-center">
                                                                    <div id="carouselExampleCaption"
                                                                        class="carousel slide" data-bs-ride="carousel">
                                                                        <div class="carousel-inner" role="listbox">
                                                                            @foreach ($images as $img)
                                                                                <div
                                                                                    class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                                                    <img src="{{ asset('storage/' . $img) }}"
                                                                                        alt="..."
                                                                                        class="d-block img-fluid w-100"
                                                                                        style="height: 200px; object-fit: cover; border-radius: 10px;">
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <a class="carousel-control-prev"
                                                                            href="#carouselExampleCaption"
                                                                            role="button" data-bs-slide="prev">
                                                                            <span class="carousel-control-prev-icon"
                                                                                aria-hidden="true"></span>
                                                                            <span
                                                                                class="visually-hidden">Previous</span>
                                                                        </a>
                                                                        <a class="carousel-control-next"
                                                                            href="#carouselExampleCaption"
                                                                            role="button" data-bs-slide="next">
                                                                            <span class="carousel-control-next-icon"
                                                                                aria-hidden="true"></span>
                                                                            <span class="visually-hidden">Next</span>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="px-2 py-2">
                                                                <h4 class="header-title mb-3">Dog Information</h4>
                                                                <ul class="list-unstyled mb-0">
                                                                    <li>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Dog Name:</span>
                                                                            {{ $notif['dog_name'] ?? 'N/A' }}
                                                                        </p>

                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Gender:</span>
                                                                            {{ $notif['gender'] ?? 'N/A' }}
                                                                        </p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Description:</span>
                                                                            {{ $notif['description'] ?? 'N/A' }}
                                                                        </p>
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            @elseif($notif['table_source'] == 'adoption')
                                                <div class="row text-black">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="px-2 py-2">
                                                                <h4 class="header-title mb-3">Adoption Information</h4>
                                                                <ul class="list-unstyled mb-0">
                                                                    <li>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Requestor:</span>
                                                                            {{ $notif['fullname'] ?? 'N/A' }}</p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Address:</span>
                                                                            {{ $notif['address'] ?? 'N/A' }}</p>
                                                                        </p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Contact
                                                                                Number:</span>
                                                                            {{ $notif['c_number'] ?? 'N/A' }}
                                                                        </p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Materials:</span>
                                                                            {{ $notif['materials'] ?? 'N/A' }}
                                                                        </p>
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="px-2 py-2">
                                                                <h4>Reason for adoption</h4>
                                                                <div class="text-center">
                                                                    <p class="mb-0">{{ $notif['reason'] }}</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="px-2 py-2">
                                                                <h4>Dog Details</h4>
                                                                @php
                                                                    $images = [];
                                                                    if (isset($notif)) {
                                                                        $images = json_decode($notif['animal_images']);
                                                                    }
                                                                @endphp
                                                                <div class="d-lg-flex justify-content-center">
                                                                    <div id="carouselExampleCaption"
                                                                        class="carousel slide"
                                                                        data-bs-ride="carousel">
                                                                        <div class="carousel-inner" role="listbox">
                                                                            @foreach ($images as $img)
                                                                                <div
                                                                                    class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                                                    <img src="{{ asset('storage/' . $img) }}"
                                                                                        alt="..."
                                                                                        class="d-block img-fluid w-100"
                                                                                        style="height: 200px; object-fit: cover; border-radius: 10px;">
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <a class="carousel-control-prev"
                                                                            href="#carouselExampleCaption"
                                                                            role="button" data-bs-slide="prev">
                                                                            <span class="carousel-control-prev-icon"
                                                                                aria-hidden="true"></span>
                                                                            <span
                                                                                class="visually-hidden">Previous</span>
                                                                        </a>
                                                                        <a class="carousel-control-next"
                                                                            href="#carouselExampleCaption"
                                                                            role="button" data-bs-slide="next">
                                                                            <span class="carousel-control-next-icon"
                                                                                aria-hidden="true"></span>
                                                                            <span class="visually-hidden">Next</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="px-2 py-2">
                                                                <h4 class="header-title mb-3">Dog Information</h4>
                                                                <ul class="list-unstyled mb-0">
                                                                    <li>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Dog Name:</span>
                                                                            {{ $notif['dog_name'] ?? 'N/A' }}
                                                                        </p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Gender:</span>
                                                                            {{ $notif['gender'] ?? 'N/A' }}
                                                                        </p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Description:</span>
                                                                            {{ $notif['description'] ?? 'N/A' }}
                                                                        </p>

                                                                    </li>
                                                                </ul>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            @elseif($notif['table_source'] == 'found_form')
                                                <div class="row text-black">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="px-2 py-2">
                                                                <h4 class="header-title mb-3">Lost Dog Information</h4>
                                                                <ul class="list-unstyled mb-0">
                                                                    <li>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Requested
                                                                                by:</span>
                                                                            {{ $notif['fullname'] ?? 'N/A' }}</p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Dog Name:</span>
                                                                            {{ $notif['dog_name'] ?? 'N/A' }}</p>
                                                                        </p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Contact
                                                                                Number:</span>
                                                                            {{ $notif['contact_number'] ?? 'N/A' }}
                                                                        </p>
                                                                        <p class="mb-2"><span
                                                                                class="fw-bold me-2">Description:</span>
                                                                            {{ $notif['description'] ?? 'N/A' }}
                                                                        </p>
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="px-2 py-2">
                                                                <h4>Dog Images</h4>
                                                                @php
                                                                    $images = [];
                                                                    if (isset($notif)) {
                                                                        $images = json_decode($notif['animal_images']);
                                                                    }
                                                                @endphp
                                                                <div class="d-lg-flex justify-content-center">
                                                                    <div id="carouselExampleCaption"
                                                                        class="carousel slide"
                                                                        data-bs-ride="carousel">
                                                                        <div class="carousel-inner" role="listbox">
                                                                            @foreach ($images as $img)
                                                                                <div
                                                                                    class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                                                    <img src="{{ asset('storage/' . $img) }}"
                                                                                        alt="..."
                                                                                        class="d-block img-fluid w-100"
                                                                                        style="height: 200px; object-fit: cover; border-radius: 10px;">
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <a class="carousel-control-prev"
                                                                            href="#carouselExampleCaption"
                                                                            role="button" data-bs-slide="prev">
                                                                            <span class="carousel-control-prev-icon"
                                                                                aria-hidden="true"></span>
                                                                            <span
                                                                                class="visually-hidden">Previous</span>
                                                                        </a>
                                                                        <a class="carousel-control-next"
                                                                            href="#carouselExampleCaption"
                                                                            role="button" data-bs-slide="next">
                                                                            <span class="carousel-control-next-icon"
                                                                                aria-hidden="true"></span>
                                                                            <span class="visually-hidden">Next</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            @endif
                                        </div> <!-- end preview-->
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


    <script>
        function cancelR(id, form, ticketN) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('cancelRequest', {
                        id: id,
                        source: form,
                        ticketN: ticketN
                    })
                    Swal.fire(
                        'Ticket #' + ticketN + ' Cancelled!',
                        'Your request has been cancelled.',
                        'success'
                    );
                }
            });
        }
        var connotif = document.getElementById('notification_here');
        var notif = [];




        function timeAgo(createdAt) {
            var now = new Date();
            var createdAtDate = new Date(createdAt);
            var diffInSeconds = Math.floor((now - createdAtDate) / 1000); // difference in seconds
            var diffInMinutes = Math.floor(diffInSeconds / 60); // difference in minutes
            var diffInHours = Math.floor(diffInMinutes / 60); // difference in hours
            var diffInDays = Math.floor(diffInHours / 24); // difference in days
            var diffInMonths = Math.floor(diffInDays / 30); // difference in months (approx)
            var diffInYears = Math.floor(diffInMonths / 12); // difference in years (approx)

            // Human-readable format based on the time difference
            if (diffInSeconds < 60) {
                return `${diffInSeconds} second${diffInSeconds !== 1 ? 's' : ''} ago`;
            } else if (diffInMinutes < 60) {
                return `${diffInMinutes} minute${diffInMinutes !== 1 ? 's' : ''} ago`;
            } else if (diffInHours < 24) {
                return `${diffInHours} hour${diffInHours !== 1 ? 's' : ''} ago`;
            } else if (diffInDays < 30) {
                return `${diffInDays} day${diffInDays !== 1 ? 's' : ''} ago`;
            } else if (diffInMonths < 12) {
                return `${diffInMonths} month${diffInMonths !== 1 ? 's' : ''} ago`;
            } else {
                return `${diffInYears} year${diffInYears !== 1 ? 's' : ''} ago`;
            }
        }

        function moveActive(id) {
            document.getElementById('click-' + id).click();
        }

        document.addEventListener('livewire:init', function() {

            var connotif = document.getElementById('notification_here');

            Livewire.on('notif', event => {
                connotif.innerHTML = '';
              
                let notif = [];

                event[0].forEach((element, index) => {
                    console.log(element)
                    var createdAt = new Date(element.created_at);
                    var year = createdAt.getFullYear().toString().slice(-2);
                    var month = (createdAt.getMonth() + 1).toString().padStart(2, '0');
                    let formattedDate = '';

                    if (element.table_source == 'adoption') {
                        formattedDate = 'A' + year + '' + month;
                    } else if (element.table_source == 'rounds') {
                        formattedDate = 'R' + year + '' + month;
                    } else if (element.table_source == 'claims') {
                        formattedDate = 'C' + year + '' + month;
                    } else if (element.table_source == "found_form") {
                        formattedDate = 'F' + year + '' + month;
                    }

                    var myid = (element.id).toString().padStart(4, '0');
                    var timeAgoText = timeAgo(element.date_notif);
                    var statusP = '';
                    var statusText = '';

                    if (element.table_source == 'adoption') {
                        if (element.status_name == 'Pending Adoption') {
                            statusText = 'Please expect a call from the pound.';
                            statusP = element.status_name;
                        } else if (element.status_name == "Adopted") {
                            statusText = 'Adoption Approved';
                            statusP = '';
                        } else {
                            statusP = 'Adoption Rejected';
                        }
                    }

                    if (element.table_source == 'claims') {
                        if (element.status_name == 'Pending Claim') {
                            statusText = 'Please expect a call from the pound.';
                            statusP = 'Pending Claim';
                        } else if (element.status_name == 'Claimed') {
                            statusText = 'Claim Approved';
                            statusP = '';
                        } else {
                            statusP = '';
                            statusText = 'Lost Claim Rejected';
                        }
                    }

                    if (element.table_source == 'rounds') {
                        if (element.is_approved == null) {
                            statusText = 'Please wait for the announcement';
                            statusP = 'Rounds Pending';
                        } else if (element.is_approved == 1) {
                            statusText = 'Rounds Approved';
                            statusP = '';
                        } else {
                            statusText = 'Rounds Rejected';
                            statusP = '';
                        }
                    }

                    if (element.table_source == 'found_form') {
                        if (element.status_name == 'For Publish') {
                            statusText = 'Please expect a call from the pound.';
                            statusP = 'Request Pending';
                        } else if (element.status_name == 'Found Dog') {
                            statusText = 'Request Approved';
                            statusP = '';
                        } else {
                            statusP = '';
                            statusText = 'Request Rejected';
                        }
                    }



                    // Push the formatted notification HTML string to the notif array
                    notif.push(`
            <a id="show-${formattedDate}-${myid}" wire:key="${element.dog_id_unique}" onclick="moveActive('${formattedDate}-${myid}')" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ticketlist" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                <div class="py-1 px-1">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 text-truncate ms-2">
                            <h5 class="noti-item-title fw-semibold font-14">Ticket #
                                ${formattedDate}-${myid} <small class="fw-normal text-muted ms-1">${timeAgoText}</small>
                            </h5>
                            <small class="noti-item-subtitle text-muted">${statusText}</small>   <br>
                            <small class="noti-item-subtitle text-muted">${statusP}</small>
                        </div>
                    </div>
                </div>
            </a>
        `);
                });

                // After looping, set the innerHTML to the notifications list
                connotif.innerHTML = notif.join('');
            });

        });
    </script>

</div>
