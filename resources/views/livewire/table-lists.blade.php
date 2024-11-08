<div>
    <style>
        .swal2-container {
            z-index: 20000 !important;
        }

        .table-footer {}

        .table-footer nav {
            position: relative;
            width: 100%;
            text-align: center;
        }

        .table-footer nav * {
            display: inline-block;
        }

        .table-footer nav .showing {
            color: #b3b3b3;
        }

        @media (min-width: 1025px) {
            .table-footer nav .showing {
                display: inline-block;
                position: absolute;
                left: 14.75%;
            }
        }

        .table-footer nav>.primary-btn {
            vertical-align: middle;
        }

        @media (min-width: 1025px) {
            .table-footer nav>.primary-btn {
                position: absolute;
                right: 1em;
            }
        }

        .pagination .pager li {
            display: inline-block;
            line-height: 1.2;
        }

        .pagination .pager li.active a {
            font-weight: 700;
            border-bottom: 3px solid #057ed8;
            color: #000;
        }

        .pagination a {
            text-decoration: none;
            color: #66696a;
            padding: 0.3333333333ex 0.25em 0.2ex;
            font-size: 16px;
        }

        .pagination .prev,
        .pagination .next {
            width: 8px;
            height: 16px;
        }

        .search-container {
            position: absolute;
            max-width: 500px;
            margin-bottom: 15px;
        }

        /* Style the search input field */
        .search {
            /* Add padding for the search icon */
            border-radius: 20px;
            /* Round the edges */
            border: 1px solid #ddd;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }

        .c_search {
            /* Add padding for the search icon */
            border-radius: 20px;
            /* Round the edges */
            border: 1px solid #ddd;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }

        .cl_search {
            /* Add padding for the search icon */
            border-radius: 20px;
            /* Round the edges */
            border: 1px solid #ddd;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }

        .search-container::before {
            content: "\1F50D";
            position: absolute;
            left: 15px;
            top: 50%;
            width: 100% !important;
            transform: translateY(-50%);
            font-size: 18px;
            color: #888;
        }

        .search-container input.c_search {
            width: 100%;
            /* Ensure input fills container */
            text-align: center;
            /* Center the placeholder and typed text */
        }

        .search-container input.cl_search {
            width: 100%;
            /* Ensure input fills container */
            text-align: center;
            /* Center the placeholder and typed text */
        }

        .search-container input.search {
            width: 100%;
            /* Ensure input fills container */
            text-align: center;
            /* Center the placeholder and typed text */
        }
    </style>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Ticket</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <ul class="nav nav-tabs nav-bordered mb-3" wire:ignore>
                <li class="nav-item">
                    <a href="#settings-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link fw-bold">
                        <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                        <span class="d-none d-md-block">Lost and found</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile-b1" data-bs-toggle="tab" aria-expanded="true" class="nav-link fw-bold">
                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                        <span class="d-none d-md-block">Rounds </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#home-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link active fw-bold">
                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                        <span class="d-none d-md-block">Adoption</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="settings-b1" wire:ignore.self>
                    <div class="card">
                        <div class="card-body">

                            <h3>Claim List</h3>
                            <div class="table-responsive" id="claim_list">
                                <div class="d-flex align-items-center">
                                    <div class="search-container ms-auto">
                                        <input type="text" class="cl_search form-control " id="searchtb"
                                            style="width: 150%;" placeholder="Search for dogs...">
                                    </div>
                                    <h3 class="mb-4 d-flex align-items-center ms-auto"></h3>

                                </div>
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Ticket Number</th>
                                            <th>Requestor</th>
                                            <th>Dog</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th style="width: 125px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @if (isset($claimlist))
                                            @foreach ($claimlist as $cdata)
                                                @php
                                                    $imagestc = json_decode($cdata['animal_images']);
                                                @endphp
                                                <tr>
                                                    <td class="ticket_number">
                                                        C{{ $cdata['created_at']->format('ym') . '-' . str_pad($cdata['id'], 4, '0', STR_PAD_LEFT) ?? 'N/A' }}
                                                    <td class="requestor"> {{ $cdata['fullname'] ?? 'N/A' }} </td>
                                                    <td class="dog_name">
                                                        <div class="d-flex">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    @if (!is_null($imagestc) && isset($imagestc[0]))
                                                                        <img src="{{ asset('storage/' . $imagestc[0]) }}"
                                                                            class="rounded-circle avatar-xs"
                                                                            alt="friend">
                                                                    @else
                                                                        <img src="{{ asset('storage/profile_pictures/xjxxrQTF3FiMAJ92RTzIrh15XRKYVLP9rtQt6g1E.png') }}"
                                                                            class="rounded-circle avatar-xs"
                                                                            alt="default">
                                                                    @endif
                                                                </div>
                                                                <div class="flex-grow-1 ms-2">
                                                                    <h5 class="my-0">{{ $cdata['dog_name'] }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="contact">{{ $cdata['contact'] ?? 'N/A' }}</td>
                                                    <td class="address">
                                                        <p class="mb-0 txt-muted">
                                                            {{ $cdata['address'] ?? 'N/A' }} </p>
                                                    </td>
                                                    <td class="status">
                                                        <h5 class="my-0">

                                                            @if ($cdata['status_name'] == 'Found Dog')
                                                                <span class="badge bg-danger">
                                                                    Rejected
                                                                </span>
                                                            @else
                                                                <span class="badge bg-info">
                                                                    {{ $cdata['status_name'] }}
                                                                </span>
                                                            @endif

                                                        </h5>
                                                    </td>
                                                    <td class="action">
                                                        @if ($cdata['status_name'] == 'Pending Claim')
                                                            <a href="#"
                                                                wire:click.prevent="lostclaim('{{ $cdata['dog_id_unique'] ?? 0 }}')"
                                                                class="action-icon" data-bs-toggle="modal"
                                                                data-bs-target="#primary-header-modal2">
                                                                <i class="mdi mdi-square-edit-outline"></i>
                                                            </a>
                                                        @else
                                                            
                                                        @endif

                                                        <a href="javascript:void(0);" class="action-icon" onclick="deleteClaim('{{$cdata['dog_id_unique']}}')"> <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="table-footer">
                                    <nav>
                                        <div class="page-item cl_jPaginateBack">
                                            <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </div>
                                        <ul class="pagination pagination-rounded mb-0">

                                        </ul>
                                        <div class="page-item ">
                                            <a class="page-link cl_jPaginateNext" href="javascript: void(0);"
                                                aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div>
                </div>
                <div class="tab-pane " id="profile-b1" wire:ignore.self>
                    <div class="card">
                        <div class="card-body">
                            <h3>Rounds Lists</h3>
                            <div class="table-responsive" id="round_lists">
                                <div class="d-flex align-items-center ">
                                    <div class="search-container ms-auto">
                                        <input type="text" class="c_search form-control " id="searchtb"
                                            style="width: 150%;" placeholder="Search for dogs...">
                                    </div>
                                    <h3 class="mb-4 d-flex align-items-center ms-auto"></h3>

                                </div>
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Ticket Number</th>
                                            <th>Requestor</th>
                                            <th>Where</th>
                                            <th>Specific Location</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                            <th>Date Requested</th>
                                            <th style="width: 125px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @if (isset($reqrounds))
                                            @foreach ($reqrounds as $data)
                                                <tr>
                                                    <td class="ticket_number">
                                                        R{{ $data['created_at']->format('ym') . '-' . str_pad($data['id'], 4, '0', STR_PAD_LEFT) ?? 'N/A' }}
                                                    </td>
                                                    <td class="requestor"> {{ $data['name'] ?? 'N/A' }} </td>
                                                    <td class="address">
                                                        {{ $data['address'] ?? 'N/A' }}
                                                    </td>
                                                    <td class="specific">
                                                        <p class="mb-0 txt-muted">
                                                            {{ $data['specific_location'] ?? 'N/A' }} </p>
                                                    </td>
                                                    <td class="contact">{{ $data['contact'] ?? 'N/A' }}</td>
                                                    <td class="created">
                                                        {{ $data['created_at']->format('M d, Y h:i A') ?? 'N/A' }}</td>

                                                    <td class="status">
                                                        <h5 class="my-0">
                                                            @if (isset($data['is_approved']))
                                                                @if ($data['is_approved'] == 1)
                                                                    <span class="badge bg-success">
                                                                        <span>Approved</span>
                                                                    </span>
                                                                @elseif ($data['is_approved'] == 0)
                                                                    <span class="badge bg-danger">
                                                                        <span>Rejected</span>
                                                                    </span>
                                                                @endif
                                                            @else
                                                                <span class="badge bg-info">
                                                                    <span>Pending</span>
                                                                </span>
                                                            @endif

                                                        </h5>
                                                    </td>
                                                    <td class="action">
                                                        @if ($data['is_rejected'] == 0 && $data['is_approved'] == 0)
                                                            <a href="javascript:void(0);"
                                                                wire:click="getrounds({{ $data['id'] ?? 0 }})"
                                                                class="action-icon" data-bs-toggle="modal"
                                                                data-bs-target="#primary-header-modal"> <i
                                                                    class="mdi mdi-square-edit-outline"></i></a>
                                                        @endif
                                                        <a href="javascript:void(0);" class="action-icon"> <i
                                                                class="mdi mdi-delete"
                                                                onclick="deleteRounds({{ $data['id'] ?? 0 }})"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="table-footer">
                                    <nav>
                                        <div class="page-item claimjPaginateBack">
                                            <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </div>
                                        <ul class="pagination pagination-rounded mb-0">

                                        </ul>
                                        <div class="page-item ">
                                            <a class="page-link claimjPaginateNext" href="javascript: void(0);"
                                                aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div>
                </div>
                <div class="tab-pane show active" id="home-b1" wire:ignore.self>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Adoption List</h3>
                                    <div class="table-responsive" id="adoption_list">
                                        <div class="search-container ms-auto">
                                            <input type="text" class="search form-control " id="searchtb"
                                                style="width: 150%;" placeholder="Search for dogs...">
                                        </div>
                                        <h3 class="mb-4 d-flex align-items-center ms-auto"></h3>

                                        <table class="table table-centered table-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Ticket Number</th>
                                                    <th>Name</th>
                                                    <th>Dog Name</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Date Requested</th>
                                                    <th>Status</th>
                                                    <th style="width: 125px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @if (isset($adoptionlist))
                                                    @foreach ($adoptionlist as $data)
                                                        @php
                                                            $imagest = json_decode($data['animal_images']);
                                                        @endphp
                                                        <tr id="claim-{{ $data['dog_id_unique'] }}">
                                                            <td class="ticket_number">
                                                                A{{ $data['created_at']->format('ym') . '-' . str_pad($data['id'], 4, '0', STR_PAD_LEFT) ?? 'N/A' }}
                                                            <td class="requestor"> {{ $data['fullname'] }} </td>
                                                            <td class="dog_name">
                                                                <div class="d-flex">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0">
                                                                            @if (!is_null($imagest) && isset($imagest[0]))
                                                                                <img src="{{ asset('storage/' . $imagest[0]) }}"
                                                                                    class="rounded-circle avatar-xs"
                                                                                    alt="friend">
                                                                            @else
                                                                                <img src="{{ asset('storage/profile_pictures/xjxxrQTF3FiMAJ92RTzIrh15XRKYVLP9rtQt6g1E.png') }}"
                                                                                    class="rounded-circle avatar-xs"
                                                                                    alt="default">
                                                                            @endif
                                                                        </div>
                                                                        <div class="flex-grow-1 ms-2">
                                                                            <h5 class="my-0">{{ $data['dog_name'] }}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="contact">
                                                                <p class="mb-0 txt-muted">{{ $data['c_number'] }}</p>
                                                            </td>
                                                            <td class="address">{{ $data['address'] }}</td>
                                                            <td class="date_request">
                                                                {{ $data['created_at']->format('M-d-Y') }}</td>
                                                            <td class="status">
                                                                <h5 class="my-0">
                                                                    @if ($data['status_name'] == 'For Adoption')
                                                                        <span class="badge bg-danger">
                                                                            Rejected
                                                                        </span>
                                                                    @else
                                                                        <span class="badge bg-info">
                                                                            {{ $data['status_name'] }}
                                                                        </span>
                                                                    @endif

                                                                </h5>
                                                            </td>
                                                            <td class="actions">
                                                                @if ($data['status_name'] == 'For Adoption')
                                                                    <a href="javascript:void(0);"
                                                                        wire:click="adoptionpending('{{ $data['dog_id_unique'] }}')"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#viewdog" class="action-icon">
                                                                        <i class="mdi mdi-square-edit-outline"></i></a>
                                                                @endif
                                                                <a href="javascript:void(0);" class="action-icon"
                                                                    onclick="deleteAdoption('{{ $data['dog_id_unique'] }}')">
                                                                    <i class="mdi mdi-delete"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="table-footer">
                                            <nav>
                                                <div class="page-item jPaginateBack">
                                                    <a class="page-link" href="javascript: void(0);"
                                                        aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </div>
                                                <ul class="pagination pagination-rounded mb-0">

                                                </ul>
                                                <div class="page-item ">
                                                    <a class="page-link jPaginateNext" href="javascript: void(0);"
                                                        aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div>

        </div> <!-- container -->
    </div>
    <div class="modal fade" id="viewdog" tabindex="-1" style="z-index: 10050 !important;" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myLargeModalLabel">Adoption Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <!-- Product image -->
                                            @php
                                                $images = [];
                                                if (isset($activedog)) {
                                                    $images = json_decode($activedog['animal_images']);
                                                }
                                            @endphp
                                            <div class="d-lg-flex justify-content-center">
                                                <div id="carouselExampleIndicators" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner" role="listbox">
                                                        @foreach ($images as $img)
                                                            <div
                                                                class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                                <img class="d-block img-fluid img-thumbnail"
                                                                    src="{{ asset('storage/' . $img) }}"
                                                                    alt="Slide {{ $loop->iteration }}"
                                                                    style="min-width: 420px; min-height: 320px; width: 420px; height: 320px; object-fit: cover;">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="text-center mt-3">
                                                        @foreach ($images as $key => $img)
                                                            <a href="javascript: void(0);">
                                                                <img src="{{ asset('storage/' . $img) }}"
                                                                    class="img-fluid img-thumbnail p-2"
                                                                    data-bs-target="#carouselExampleIndicators"
                                                                    class="active"
                                                                    data-bs-slide-to="{{ $key }}"
                                                                    style="min-width: 75px; min-height: 75px; width: 75px; height: 75px; object-fit: cover;"
                                                                    alt="Product-img" />
                                                            </a>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-lg-7">
                                            <form class="ps-lg-4">
                                                <!-- Product title -->
                                                <h3 class="mt-0">{{ $activedog['dog_name'] ?? 'N/A' }} <a
                                                        href="javascript: void(0);" class="text-muted"><i
                                                            class="mdi mdi-square-edit-outline ms-2"></i></a>
                                                </h3>
                                                <p class="mb-1">Added Date:
                                                    {{ isset($activedog['created_at']) ? \Carbon\Carbon::parse($activedog['created_at'])->format('m/d/Y') : 'N/A' }}
                                                </p>

                                                <!-- Product stock -->
                                                <div class="mt-3">
                                                    <h4><span class="badge badge-success-lighten"> For Adoption </span>
                                                    </h4>
                                                </div>

                                                <!-- Product description -->
                                                <div class="mt-4">
                                                    <h6 class="font-14">Breed:</h6>
                                                    <h4 class="me-3"> {{ $activedog['breed'] ?? 'N/A' }} </h4>
                                                </div>

                                                <!-- Quantity -->

                                                <!-- Product description -->
                                                <div class="mt-4">
                                                    <h6 class="font-14">Description:</h6>
                                                    <p> {{ $activedog['description'] ?? 'N/A' }} </p>
                                                </div>

                                                <!-- Product information -->
                                                <div class="mt-3">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h6 class="font-14">Color</h6>
                                                            <div class="d-flex">
                                                                <i class="font-18 text-success me-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="18" height="18" x="0" y="0"
                                                                        viewBox="0 0 256 256"
                                                                        style="enable-background:new 0 0 512 512"
                                                                        xml:space="preserve" class="">
                                                                        <g>
                                                                            <path fill="#49e849"
                                                                                d="M163.3 102.3c-25.5 0-46.3-20.8-46.3-46.3s20.8-46.3 46.3-46.3 46.3 20.8 46.3 46.3-20.7 46.3-46.3 46.3zm0-83.2c-20.3 0-36.9 16.5-36.9 36.9 0 20.3 16.5 36.9 36.9 36.9s36.9-16.5 36.9-36.9c0-20.3-16.5-36.9-36.9-36.9z"
                                                                                opacity="1" data-original="#49e849"
                                                                                class=""></path>
                                                                            <path fill="#49e849"
                                                                                d="M157 74.9c-1.3 0-2.6-.5-3.5-1.5l-12.4-13.2c-1.8-1.9-1.7-5 .2-6.8s5-1.7 6.8.2l9.2 9.9 21.5-18.6c2-1.7 5-1.5 6.8.5 1.7 2 1.5 5-.5 6.8l-25 21.6c-.8.7-2 1.1-3.1 1.1z"
                                                                                opacity="1" data-original="#49e849"
                                                                                class=""></path>
                                                                            <path fill="#e2b471"
                                                                                d="M63.7 167.6s2.4 8.6 4.9 16 5 36.6 3.9 41.6-6.3 5.8-8.8 6.3-7.6 2.7-7.6 5.9 2.9 5.6 8.9 5.3c6.1-.3 13.9-2.4 13.9-2.4l5.8-9.6 2.3-34.5-13.7-22.8zM150.2 190.1s5.5 11.8 21.4 16.6 11.3 3.5 14.1 5.5c2.7 1.9 11.5 8 11.5 9.9s-.8 9.3-4.6 10.4-9.9 3.1-10.2 7.4c-.2 4.3 3.7 5.4 7.4 5.1s15.3-1.4 15.3-1.4l7.3-11.2-.5-19.3-33.6-20.8s-15.4-13.6-16-13.5-12.8 6.6-12.8 6.6z"
                                                                                opacity="1" data-original="#e2b471"
                                                                                class=""></path>
                                                                            <path fill="#f7ce94"
                                                                                d="M193 136.9s16.3-4.2 17.1-16.5c.8-13.2-1.4-22.1.6-32s7.3-15.2 9.1-14.5c1.8.8.2 9.9 1.4 25s3.4 19.2 0 29.9-11.1 18.4-17.2 20.4z"
                                                                                opacity="1" data-original="#f7ce94"
                                                                                class=""></path>
                                                                            <path fill="#ffdd99"
                                                                                d="M220.4 206.9c-7.5-4.2-11.1-8-11.2-13.7-.1-4.2 3.4-12 3.8-21.3.5-9.4-.7-19.5-11.3-30.3-13.1-13.4-36.4-8.7-48.9-6.9s-28 .8-39.1-6.1c-12.1-7.4-11.1-32.1-21.8-44-9.1-10.1-30.9-7.2-35.1-4.8-6.9 3.8-5.5 9.9-7.9 12.6-1.4 1.6-4.6 1.4-7.1 1-.2 2.1-1.4 7.4-7.7 9.8 1.2 1.8 2.5 2.6 2.5 2.6-1.8 8.5 5.2 12.3 10.1 12.9 6.4.8 9.7 3.2 13.6 12.6 4.6 11.4.3 19 2.9 33.2 1.9 10.5 10.7 13.1 16.1 23.2 4.5 8.2 5.3 22.2 5.3 36.1 0 8.2-4.6 11.3-9.3 12.2-3.3.6-9.1 4-7 8.1 1.3 2.5 24 3.2 27.4.6 3.7-2.7 8.1-43.6 8.1-43.6 10.8-9.4 30.2-10.9 41.1-10 9.6.8 17.1-6.8 17.1-6.8 4.8 12.7 17 18.4 26.3 20.4 7.2 1.5 17.5 8.5 20 12.8 2.4 4.3 1.7 11.6 1.2 13.9-.9 4.5-9.9-.2-11.4 10.7-.6 4.4 20 3 21.6 1.2 1.9-2 3.6-20.8 4.4-29.8 0-2.7-1.3-5.3-3.7-6.6z"
                                                                                opacity="1" data-original="#ffdd99"
                                                                                class=""></path>
                                                                            <path fill="#efc889"
                                                                                d="M92.4 101.1c3-3.3 7.1-10.6 3.3-23.4-.4-1.3-1.7-2.1-3.1-1.8-4 .8-10.2 2.5-13.8 13.2-.4 1.1.1 2.2 1.1 2.7 2.2 1.1 6 3.5 8.8 8.8.7 1.4 2.6 1.6 3.7.5z"
                                                                                opacity="1"
                                                                                data-original="#efc889"></path>
                                                                            <circle cx="59.8" cy="91.6"
                                                                                r="3.4" fill="#141414" opacity="1"
                                                                                data-original="#141414"></circle>
                                                                            <circle cx="59.1" cy="91.2"
                                                                                r="1.7" fill="#ffffff" opacity="1"
                                                                                data-original="#ffffff"></circle>
                                                                            <path fill="#1e1e1e"
                                                                                d="M41.7 93.5c-.3-.1-.6-.1-.9-.2-2-.4-4-.7-6-.9l-.7-.1c-.8-.1-1.6.5-1.8 1.4-.8 4.5.4 7.6 1.6 9.5 6.4-2.3 7.6-7.6 7.8-9.7z"
                                                                                opacity="1"
                                                                                data-original="#1e1e1e"></path>
                                                                            <g fill="#d6ae6e">
                                                                                <path
                                                                                    d="M36.5 105.8s6.5 3 20 1.7c0 0-7.1 3.6-19.7 4.2-.1 0-1.1-2.5-.3-5.9zM90.9 98.3s4.6-6.3 3.4-16.2c0 0-3.7 7.8-7.9 9.8 0 .1 3.7 2 4.5 6.4z"
                                                                                    fill="#d6ae6e" opacity="1"
                                                                                    data-original="#d6ae6e"></path>
                                                                            </g>
                                                                        </g>
                                                                    </svg> </i>
                                                                <div>
                                                                    <h5 class="mt-1 font-14">
                                                                        {{ $activedog['color'] ?? 'N/A' }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="font-14">Gender</h6>
                                                            <div class="d-flex">
                                                                <i class="font-18 text-success me-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="18" height="18" x="0" y="0"
                                                                        viewBox="0 0 488 488.33"
                                                                        style="enable-background:new 0 0 512 512"
                                                                        xml:space="preserve" class="">
                                                                        <g>
                                                                            <g fill="#4671c6">
                                                                                <path
                                                                                    d="M44.766 213.77h-.735c-22.02 0-39.867-17.852-39.867-39.872V145c0-22.02 17.848-39.867 39.867-39.867h.735c22.02 0 39.87 17.847 39.87 39.867v28.898c0 22.02-17.85 39.872-39.87 39.872zM394.672 213.77h.738c22.016 0 39.867-17.852 39.867-39.872V145c0-22.02-17.851-39.867-39.867-39.867h-.738c-22.016 0-39.867 17.847-39.867 39.867v28.898c0 22.02 17.847 39.872 39.867 39.872zM149.91 112.637h-.734c-22.02 0-39.867-17.848-39.867-39.867V43.87c0-22.02 17.847-39.867 39.867-39.867h.734c22.02 0 39.867 17.848 39.867 39.867V72.77c0 22.02-17.847 39.867-39.867 39.867zM286.566 112.637h.735c22.02 0 39.867-17.848 39.867-39.867V43.87c0-22.02-17.848-39.867-39.867-39.867h-.735c-22.02 0-39.87 17.848-39.87 39.867V72.77c0 22.02 17.85 39.867 39.87 39.867zm0 0"
                                                                                    fill="#4671c6" opacity="1"
                                                                                    data-original="#4671c6"
                                                                                    class=""></path>
                                                                            </g>
                                                                            <path fill="#3762cc"
                                                                                d="M44.77 217.77h-.739c-24.187 0-43.867-19.68-43.867-43.872v-28.902c0-24.187 19.68-43.867 43.867-43.867h.739c24.19 0 43.867 19.68 43.867 43.867v28.902c0 24.192-19.68 43.872-43.867 43.872zm-.739-108.641c-19.777 0-35.867 16.09-35.867 35.867v28.902c0 19.778 16.09 35.872 35.867 35.872h.739c19.777 0 35.867-16.094 35.867-35.872v-28.902c0-19.777-16.09-35.867-35.867-35.867zM395.406 217.77h-.734c-24.188 0-43.867-19.68-43.867-43.872v-28.902c0-24.187 19.68-43.867 43.867-43.867h.734c24.192 0 43.871 19.68 43.871 43.867v28.902c0 24.192-19.68 43.872-43.87 43.872zm-.734-108.641c-19.777 0-35.867 16.09-35.867 35.867v28.902c0 19.778 16.09 35.872 35.867 35.872h.734c19.778 0 35.871-16.094 35.871-35.872v-28.902c0-19.777-16.093-35.867-35.87-35.867zM149.91 116.637h-.734c-24.188 0-43.867-19.68-43.867-43.867V43.867C105.309 19.68 124.989 0 149.176 0h.734c24.192 0 43.871 19.68 43.871 43.867V72.77c-.004 24.187-19.68 43.867-43.87 43.867zm-.734-108.633c-19.778 0-35.867 16.09-35.867 35.867V72.77c0 19.777 16.09 35.87 35.867 35.87h.734c19.778 0 35.871-16.093 35.871-35.87V43.87c0-19.777-16.09-35.867-35.87-35.867zM287.3 116.637h-.734c-24.191 0-43.87-19.68-43.87-43.867V43.867C242.695 19.68 262.374 0 286.565 0h.735c24.187 0 43.867 19.68 43.867 43.867V72.77c0 24.187-19.68 43.867-43.867 43.867zm-.738-108.633c-19.777 0-35.87 16.09-35.87 35.867V72.77c0 19.777 16.093 35.87 35.87 35.87h.735c19.777 0 35.871-16.093 35.871-35.87V43.87c0-19.777-16.094-35.867-35.871-35.867zm0 0"
                                                                                opacity="1"
                                                                                data-original="#3762cc"></path>
                                                                            <path fill="#4671c6"
                                                                                d="M322.723 240.137c-4.641-1.098-7.868-4.828-7.868-9.082 0-46.528-42.593-84.25-95.132-84.25-52.543 0-95.137 37.718-95.137 84.25 0 4.254-3.227 7.984-7.867 9.082-40.106 9.488-69.653 41.867-69.653 80.379v2.058c0 45.961 42.075 83.219 93.973 83.219h157.367c51.899 0 93.973-37.258 93.973-83.219v-2.058c0-38.512-29.547-70.891-69.656-80.38zm0 0"
                                                                                opacity="1" data-original="#4671c6"
                                                                                class=""></path>
                                                                            <path fill="#3762cc"
                                                                                d="M298.402 409.79H141.04c-54.023 0-97.973-39.126-97.973-87.216v-2.058c0-39.485 29.907-74.137 72.73-84.274 2.821-.664 4.79-2.797 4.79-5.187 0-48.66 44.473-88.246 99.137-88.246s99.132 39.586 99.132 88.246c0 2.386 1.97 4.523 4.79 5.187h.003c42.82 10.137 72.73 44.79 72.73 84.274v2.058c0 48.09-43.952 87.215-97.976 87.215zm-78.68-258.985c-50.253 0-91.136 36-91.136 80.246 0 6.117-4.504 11.453-10.95 12.976-39.195 9.278-66.57 40.727-66.57 76.485v2.058c0 43.68 40.36 79.215 89.973 79.215h157.363c49.614 0 89.977-35.539 89.977-79.215v-2.058c0-35.758-27.379-67.211-66.574-76.485-6.446-1.523-10.95-6.863-10.95-12.976 0-44.246-40.878-80.246-91.132-80.246zm0 0"
                                                                                opacity="1"
                                                                                data-original="#3762cc"></path>
                                                                            <path fill="#f9a7a7"
                                                                                d="M426.371 484.328h-69c-31.754 0-57.5-25.742-57.5-57.5v-69c0-31.754 25.746-57.5 57.5-57.5h69c31.758 0 57.5 25.746 57.5 57.5v69c0 31.762-25.738 57.5-57.5 57.5zm0 0"
                                                                                opacity="1"
                                                                                data-original="#f9a7a7"></path>
                                                                            <path fill="#ffea92"
                                                                                d="M357.2 464.328c-20.68 0-37.5-16.82-37.5-37.5v-69c0-20.68 16.82-37.5 37.5-37.5h69c20.679 0 37.5 16.82 37.5 37.5v69c0 20.68-16.821 37.5-37.5 37.5zm0 0"
                                                                                opacity="1"
                                                                                data-original="#ffea92"></path>
                                                                            <path fill="#3762cc"
                                                                                d="M426.375 488.328h-69c-33.91 0-61.5-27.586-61.5-61.5v-69c0-33.91 27.59-61.5 61.5-61.5h69c33.91 0 61.5 27.59 61.5 61.5v69c0 33.914-27.59 61.5-61.5 61.5zm-69-184c-29.5 0-53.5 24-53.5 53.5v69c0 29.5 24 53.5 53.5 53.5h69c29.5 0 53.5-24 53.5-53.5v-69c0-29.5-24-53.5-53.5-53.5zm0 0"
                                                                                opacity="1"
                                                                                data-original="#3762cc"></path>
                                                                            <path fill="#a4c9ff"
                                                                                d="m237.66 285.664 30.809-30.809a3.994 3.994 0 0 1 5.652 0l10.227 10.223c2.398 2.399 6.504.914 6.812-2.465l3.043-33.496 1.262-13.887a4.002 4.002 0 0 0-4.348-4.347l-13.887 1.262-33.496 3.046c-3.379.305-4.863 4.414-2.464 6.813l10.222 10.223a3.999 3.999 0 0 1 0 5.656l-30.457 30.457a1.985 1.985 0 0 1-2.476.258c-22.446-14.168-52.696-11.172-71.82 9.015-20.079 21.188-20.743 54.848-1.466 76.762 21.915 24.914 60.07 25.824 83.165 2.727 18.68-18.68 21.644-47.204 8.921-69.024a1.99 1.99 0 0 1 .301-2.414zm-72.855 54.473c-12.868-12.867-12.868-33.805 0-46.672 12.867-12.863 33.8-12.863 46.672 0 12.863 12.867 12.863 33.805 0 46.672-12.868 12.867-33.805 12.867-46.672 0zm0 0"
                                                                                opacity="1"
                                                                                data-original="#a4c9ff"></path>
                                                                            <path fill="#4671c6"
                                                                                d="M386.691 422.152v32.114a2.472 2.472 0 0 0 2.473 2.468h9.879a2.469 2.469 0 0 0 2.469-2.468v-56.48c0-.583.41-1.075.976-1.2 23.395-5.293 38.035-33.941 17.977-60.059-28.899-22.222-60.942-1.918-60.942 25.73 0 16.313 11.16 30.06 26.243 34.032.543.145.925.621.925 1.184zm-6.867-44.996c-16.695-21.71 8.078-46.492 29.793-29.8 16.695 21.71-8.082 46.492-29.793 29.8zm0 0"
                                                                                opacity="1" data-original="#4671c6"
                                                                                class=""></path>
                                                                        </g>
                                                                    </svg> </i>
                                                                <div>
                                                                    <h5 class="mt-1 font-14">
                                                                        {{ $activedog['gender'] ?? 'N/A' }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="font-14">Contact Person</h6>
                                                            <div class="d-flex">
                                                                <i class="font-18 text-success me-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        version="1.1"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="18" height="18" x="0" y="0"
                                                                        viewBox="0 0 256 256"
                                                                        style="enable-background:new 0 0 512 512"
                                                                        xml:space="preserve" class="">
                                                                        <g>
                                                                            <circle cx="164.927" cy="106.758"
                                                                                r="82.422" fill="#5fcdff"
                                                                                opacity="1"
                                                                                data-original="#5fcdff"></circle>
                                                                            <path fill="#30b6ff"
                                                                                d="M247.357 106.75c0 45.535-36.909 82.424-82.424 82.424a83.206 83.206 0 0 1-15.151-1.394c38.283-7.111 67.273-40.666 67.273-81.03 0-40.344-28.99-73.899-67.273-81.01a83.214 83.214 0 0 1 15.151-1.394c45.515 0 82.424 36.889 82.424 82.404z"
                                                                                opacity="1" data-original="#30b6ff"
                                                                                class=""></path>
                                                                            <path fill="#73d7f9"
                                                                                d="M134.098 162.057c-13.23-14.62-21.29-34.02-21.29-55.31 0-40.34 28.97-73.9 67.28-81.01-4.91-.91-9.98-1.39-15.15-1.39-45.54 0-82.43 36.89-82.43 82.4 0 31.35 17.49 58.61 43.24 72.54l17.03 41.44 13.16-32.04c2.95.33 5.96.49 9 .49 5.17 0 10.24-.49 15.15-1.4a81.879 81.879 0 0 1-20.94-6.91 82.85 82.85 0 0 1-25.05-18.81z"
                                                                                opacity="1"
                                                                                data-original="#73d7f9"></path>
                                                                            <circle cx="164.928" cy="106.758"
                                                                                r="67.078" fill="#ffe2e2"
                                                                                opacity="1" data-original="#ffe2e2"
                                                                                class=""></circle>
                                                                            <path fill="#ffcfcf"
                                                                                d="M232.012 106.752c0 37.058-30.038 67.079-67.079 67.079-4.209 0-8.336-.395-12.331-1.134 31.156-5.787 54.749-33.096 54.749-65.945 0-32.833-23.593-60.142-54.749-65.929a67.703 67.703 0 0 1 12.331-1.134c37.041 0 67.079 30.021 67.079 67.063z"
                                                                                opacity="1" data-original="#ffcfcf"
                                                                                class=""></path>
                                                                            <path fill="#ffefee"
                                                                                d="M177.264 172.697a67.703 67.703 0 0 1-12.331 1.134c-37.058 0-67.08-30.021-67.08-67.079 0-37.042 30.021-67.063 67.08-67.063 4.209 0 8.336.395 12.331 1.134-31.172 5.787-54.749 33.096-54.749 65.929 0 32.849 23.576 60.157 54.749 65.945z"
                                                                                opacity="1" data-original="#ffefee"
                                                                                class=""></path>
                                                                            <path fill="#b76c6c"
                                                                                d="M151.021 114.298c6.607-11.444 23.124-11.444 29.731 0l5.921 10.256c6.607 11.444-1.652 25.748-14.866 25.748h-11.843c-13.214 0-21.473-14.305-14.866-25.748a34121 34121 0 0 0 5.923-10.256z"
                                                                                opacity="1"
                                                                                data-original="#b76c6c"></path>
                                                                            <path fill="#c98585"
                                                                                d="M178.217 149.094c-1.956.789-4.11 1.216-6.412 1.216h-11.838c-13.219 0-21.472-14.32-14.863-25.763 3.636-6.282 2.286-3.946 5.919-10.243 5.886-10.193 19.614-11.311 27.193-3.354a16.685 16.685 0 0 0-2.532 3.354c-3.633 6.297-2.283 3.961-5.919 10.243-5.457 9.454-.771 20.864 8.452 24.547z"
                                                                                opacity="1"
                                                                                data-original="#c98585"></path>
                                                                            <ellipse cx="148.118" cy="78.138"
                                                                                fill="#b76c6c" rx="9.246"
                                                                                ry="13.719"
                                                                                transform="rotate(-20 148.134 78.134)"
                                                                                opacity="1"
                                                                                data-original="#b76c6c"></ellipse>
                                                                            <ellipse cx="124.634" cy="104.137"
                                                                                fill="#b76c6c" rx="9.246"
                                                                                ry="13.719"
                                                                                transform="rotate(-20 124.65 104.138)"
                                                                                opacity="1"
                                                                                data-original="#b76c6c"></ellipse>
                                                                            <ellipse cx="181.745" cy="78.138"
                                                                                fill="#b76c6c" rx="13.719"
                                                                                ry="9.246"
                                                                                transform="rotate(-70 181.673 78.121)"
                                                                                opacity="1"
                                                                                data-original="#b76c6c"></ellipse>
                                                                            <ellipse cx="205.228" cy="104.137"
                                                                                fill="#b76c6c" rx="13.719"
                                                                                ry="9.246"
                                                                                transform="rotate(-70 205.145 104.111)"
                                                                                opacity="1"
                                                                                data-original="#b76c6c"></ellipse>
                                                                            <path fill="#44c7b6"
                                                                                d="M73.614 230.183c10.8 7.735 25.692 9.175 39.044 6.92 8.431-1.424 12.919-10.764 8.784-18.247l-17.384-31.455c-2.409-4.36-7.056-6.969-12.036-6.845-3.997.099-7.82-.466-11.427-1.695-10.969-3.736-27.711-18.653-32.189-35.565-2.521-9.521-9.29-24.041 1.843-48.949 2.893-6.471 7.794-11.628 14.345-15.159 3.825-2.061 6.22-6.052 6.484-10.389l2.307-37.903c.515-8.475-7.585-14.918-15.697-12.412-7.86 2.429-16.486 6.782-23.28 11.824-5.723 4.247-10.071 10.072-12.575 16.844 0 0-52.41 108.405 51.781 183.031z"
                                                                                opacity="1"
                                                                                data-original="#44c7b6"></path>
                                                                            <path fill="#4bdbc3"
                                                                                d="M108.918 237.627c-12.33 1.41-25.5-.43-35.3-7.44-104.19-74.63-51.78-183.03-51.78-183.03 2.5-6.78 6.85-12.6 12.57-16.85 6.79-5.04 15.42-9.39 23.28-11.82 3.76-1.16 7.52-.4 10.42 1.6-6.52 2.52-13.21 6.15-18.7 10.22-5.72 4.25-10.07 10.07-12.57 16.85 0 0-52.41 108.4 51.78 183.03 5.86 4.19 12.93 6.54 20.3 7.44z"
                                                                                opacity="1"
                                                                                data-original="#4bdbc3"></path>
                                                                            <g fill="#5f266d">
                                                                                <path
                                                                                    d="M164.926 20.336c-47.653 0-86.422 38.769-86.422 86.422 0 31.289 16.854 60.028 44.081 75.353l16.488 40.135c1.361 3.307 6.049 3.29 7.4-.001l12.04-29.309c50.044 3.744 92.834-36.019 92.834-86.178.001-47.653-38.767-86.422-86.421-86.422zm-8.557 164.37a4 4 0 0 0-4.132 2.457l-9.463 23.035-13.323-32.43a3.997 3.997 0 0 0-1.796-1.997c-25.383-13.739-41.15-40.184-41.15-69.014 0-43.242 35.18-78.422 78.422-78.422s78.422 35.18 78.422 78.422c-.001 46.259-40.188 83.026-86.98 77.949z"
                                                                                    fill="#5f266d" opacity="1"
                                                                                    data-original="#5f266d"
                                                                                    class=""></path>
                                                                                <path
                                                                                    d="M164.927 35.681c-39.192 0-71.077 31.885-71.077 71.077s31.885 71.078 71.077 71.078 71.078-31.886 71.078-71.078-31.885-71.077-71.078-71.077zm0 134.155c-34.781 0-63.077-28.297-63.077-63.078s28.296-63.077 63.077-63.077 63.078 28.296 63.078 63.077-28.296 63.078-63.078 63.078z"
                                                                                    fill="#5f266d" opacity="1"
                                                                                    data-original="#5f266d"
                                                                                    class=""></path>
                                                                                <path
                                                                                    d="m190.137 122.554-5.922-10.256c-8.141-14.102-28.505-14.121-36.659 0l-5.921 10.256c-8.146 14.109 2.022 31.748 18.329 31.748h11.843c16.291 0 26.484-17.626 18.33-31.748zm-18.33 23.748h-11.843c-10.134 0-16.473-10.964-11.401-19.748l5.921-10.256c5.067-8.776 17.732-8.784 22.804 0l5.922 10.256c5.065 8.776-1.259 19.748-11.403 19.748zM154.178 94.789c7.009-2.551 9.748-11.948 6.386-21.181-3.338-9.172-11.452-14.69-18.507-12.121-6.979 2.541-9.784 11.845-6.387 21.182 3.395 9.324 11.518 14.663 18.508 12.12zm-9.384-25.784c2.321-.842 6.356 2.127 8.253 7.34 1.91 5.247.693 10.091-1.604 10.927-2.327.852-6.352-2.113-8.254-7.339-1.903-5.227-.722-10.081 1.605-10.928zM118.574 87.487c-7.009 2.551-9.748 11.948-6.386 21.181 3.395 9.329 11.52 14.662 18.507 12.12 6.979-2.54 9.784-11.844 6.387-21.181-3.337-9.165-11.444-14.692-18.508-12.12zm9.385 25.783c-2.321.85-6.351-2.111-8.253-7.339-1.912-5.253-.689-10.092 1.604-10.927 2.289-.836 6.338 2.077 8.254 7.339 1.902 5.228.722 10.08-1.605 10.927zM175.684 94.789c7.549 2.749 15.409-3.609 18.507-12.12 3.398-9.336.594-18.64-6.386-21.182-6.98-2.538-15.108 2.785-18.508 12.121-3.334 9.163-.676 18.61 6.387 21.181zm1.131-18.444c1.903-5.229 5.932-8.188 8.254-7.34 2.326.847 3.507 5.7 1.604 10.928-1.907 5.239-5.948 8.173-8.253 7.339-2.297-.837-3.515-5.679-1.605-10.927zM211.288 87.487c-6.992-2.547-15.138 2.866-18.507 12.12-3.335 9.159-.682 18.608 6.387 21.181 6.99 2.543 15.113-2.796 18.507-12.12 3.334-9.16.682-18.608-6.387-21.181zm-1.131 18.444c-1.901 5.226-5.925 8.188-8.253 7.339-2.3-.837-3.515-5.682-1.605-10.927 1.891-5.194 5.921-8.185 8.253-7.339 2.3.837 3.514 5.682 1.605 10.927zM201.757 142.006a47.382 47.382 0 0 1-10.471 8.966 4 4 0 1 0 4.262 6.77 55.384 55.384 0 0 0 12.238-10.476 4.002 4.002 0 0 0-.385-5.645 4.002 4.002 0 0 0-5.644.385zM178.644 156.63a58.415 58.415 0 0 1-6.386 1.488 4 4 0 0 0-3.248 4.631 3.997 3.997 0 0 0 4.631 3.248 66.56 66.56 0 0 0 7.263-1.693 4 4 0 0 0-2.26-7.674zM107.559 185.466c-3.126-5.657-9.095-9.061-15.637-8.91-3.509.088-6.894-.411-10.039-1.482-9.4-3.202-25.354-16.725-29.61-32.803a126.503 126.503 0 0 0-1.049-3.645c-2.768-9.278-6.559-21.984 2.677-42.648 2.534-5.669 6.771-10.134 12.592-13.271 4.94-2.663 8.227-7.899 8.577-13.666l2.307-37.902c.686-11.249-10.094-19.808-20.869-16.476-8.417 2.601-17.341 7.132-24.482 12.433-6.298 4.673-11.094 11.065-13.878 18.493-1.25 2.645-13.417 29.304-13.495 65.085-.073 34.178 11.427 83.22 66.633 122.761 11.754 8.419 27.796 10.018 42.039 7.612 11.292-1.907 17.019-14.356 11.619-24.126zm4.433 47.692c-14.065 2.378-27.205.106-36.049-6.228-42-30.082-63.294-69.086-63.291-115.928.002-35.164 12.656-61.848 12.783-62.11.483-1 2.893-9.091 11.357-15.373 6.349-4.712 14.602-8.903 22.076-11.214 5.452-1.684 10.869 2.659 10.523 8.347l-2.307 37.902c-.185 3.026-1.866 5.751-4.389 7.11-7.307 3.938-12.874 9.832-16.1 17.048-10.446 23.373-5.988 38.313-3.039 48.2.359 1.205.698 2.337.98 3.404 5.029 18.996 23.422 34.465 34.766 38.328 4.041 1.377 8.358 2.011 12.816 1.908 3.499-.079 6.758 1.744 8.437 4.781l17.384 31.455c2.809 5.084-.229 11.405-5.947 12.37z"
                                                                                    fill="#5f266d" opacity="1"
                                                                                    data-original="#5f266d"
                                                                                    class=""></path>
                                                                            </g>
                                                                        </g>
                                                                    </svg> </i>
                                                                <div>
                                                                    <h5 class="mt-1 font-14">
                                                                        {{ $activedog['contact'] ?? 'N/A' }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                    <hr>
                                    <div class="text-center fw-bold ">
                                        <h4> User Details </h4>
                                    </div>
                                    @if (isset($adoptdetails))
                                        <div class="mt-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <h4 class="header-title mb-3">Adoption Details</h4>

                                                            <ul class="list-unstyled mb-0">
                                                                <li>
                                                                    <p class="mb-2"><span
                                                                            class="fw-bold me-2">Fullname:</span>
                                                                        {{ $adoptdetails['fullname'] }} </p>
                                                                    <p class="mb-2"><span
                                                                            class="fw-bold me-2">Address:</span>
                                                                        {{ $adoptdetails['address'] }} </p>
                                                                    <p class="mb-2"><span
                                                                            class="fw-bold me-2">Mobile Number:</span>
                                                                        {{ $adoptdetails['c_number'] }} </p>
                                                                    <p class="mb-2"><span
                                                                            class="fw-bold me-2">Materials:</span>
                                                                        {{ $adoptdetails['materials'] }} </p>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <h4 class="header-title mb-3 ">Reason for adoption</h4>
                                                            <p class="py-1 px-3">
                                                                {{ $adoptdetails['reason'] }}
                                                            </p>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="approve_adoption">Approve Adoption</button>
                    <button type="button" class="btn btn-danger" id="reject_adoption">Reject Adoption</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->


    </div>
    <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="ri-information-line h1 text-info"></i>
                        <h4 class="mt-2">Heads up!</h4>
                        <p class="mt-3">Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac
                            facilisis in, egestas eget quam.</p>
                        <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Continue</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="primary-header-modalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">Rounds Details</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class=" d-block">
                        @if (isset($activerounds))
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-3">Information</h4>
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <p class="mb-2"><span class="fw-bold me-2">Requestor:</span>
                                                {{ $activerounds['name'] }}</p>
                                            <p class="mb-2"><span class="fw-bold me-2">Barangay:</span>
                                                {{ $activerounds['barangay'] }}</p>
                                            <p class="mb-2"><span class="fw-bold me-2">Address:</span>
                                                {{ $activerounds['address'] }}</p>

                                            <p class="mb-2"><span class="fw-bold me-2">Specific Location:</span>
                                                {{ $activerounds['specific_location'] }}
                                            </p>
                                            <p class="mb-0"><span class="fw-bold me-2">Contact Number:</span>
                                                {{ $activerounds['contact'] }} </p>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4>Reason</h4>
                                    <div class="text-center">
                                        <p class="mb-0">{{ $activerounds['reason'] }}</p>

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="approve_rounds">Approve Rounds</button>
                    <button type="button" class="btn btn-danger" id="reject_rounds">Reject Rounds</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div id="primary-header-modal2" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="primary-header-modalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="primary-header-modalLabel">Claim Details</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-hidden="true"></button>
                </div>
                @if (isset($claimdetails))
                    <div class="modal-body">
                        <div class=" d-block">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title mb-3">Claim Information</h4>
                                            <ul class="list-unstyled mb-0">
                                                <li>
                                                    <p class="mb-2"><span class="fw-bold me-2">Requestor:</span>
                                                        {{ $claimdetails['fullname'] }}</p>
                                                    <p class="mb-2"><span class="fw-bold me-2">Address:</span>
                                                        {{ $claimdetails['address'] }}</p>
                                                    </p>
                                                    <p class="mb-2"><span class="fw-bold me-2">Breed:</span>
                                                        {{ $claimdetails['breed'] }}
                                                    </p>
                                                    <p class="mb-2"><span class="fw-bold me-2">Gender:</span>
                                                        {{ $claimdetails['gender'] }}
                                                    </p>
                                                    <p class="mb-0"><span class="fw-bold me-2">Contact
                                                            Number:</span>
                                                        {{ $claimdetails['contact'] }} </p>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Proof</h4>
                                            <div class="text-center">
                                                <img src="" alt="">
                                                <img src="{{ asset('storage/' . $claimdetails['proof']) }}"
                                                    class="img-thumbnail" alt="friend"
                                                    style="min-width: 250px; min-height: 170px; width: 250px; height: 170px; object-fit: cover;">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Dog Details</h4>
                                            @php
                                                $images = [];
                                                if (isset($activedog)) {
                                                    $images = json_decode($activedog['animal_images']);
                                                }
                                            @endphp
                                            <div class="d-lg-flex justify-content-center">
                                                <div id="carouselExampleCaption" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner" role="listbox">
                                                        @foreach ($images as $img)
                                                            <div
                                                                class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                                <img src="{{ asset('storage/' . $img) }}"
                                                                    alt="..." class="d-block img-fluid"
                                                                    style="min-width: 300px; min-height: 250px; width: 300px; height: 250px; object-fit: cover;">
                                                                <div class="carousel-caption d-none d-md-block">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleCaption"
                                                        role="button" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleCaption"
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
                                        <div class="card-body">
                                            <h4 class="header-title mb-3">Dog Information</h4>
                                            <ul class="list-unstyled mb-0">
                                                <li>
                                                    <p class="mb-2"><span class="fw-bold me-2">Dog Name:</span>
                                                        {{ $activedog['dog_name'] ?? 'N/A' }}
                                                    </p>
                                                    <p class="mb-2"><span class="fw-bold me-2">Breed:</span>
                                                        {{ $activedog['name'] ?? 'N/A' }}
                                                    </p>
                                                    <p class="mb-2"><span class="fw-bold me-2">Gender:</span>
                                                        {{ $activedog['gender'] ?? 'N/A' }}
                                                    </p>
                                                    <p class="mb-0"><span class="fw-bold me-2">Location
                                                            Found:</span>
                                                        {{ $activedog['location_found'] ?? 'N/A' }} </p>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                @endif
            </div>
            <div class="modal-footer">
                @if (isset($activedog))
                    <button type="button" class="btn btn-success" id="approve_claim"
                        onclick="approve_claim('{{ $activedog['dog_id_unique'] }}')">Approve
                        Claim</button>
                    <button type="button" class="btn btn-danger" id="reject_claim"
                        onclick="reject_claim('{{ $activedog['dog_id_unique'] }}')">Reject
                        Claim</button>
                @endif
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    <script>
         function deleteClaim(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this claim request?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the approval action here
                    Livewire.dispatch('delete_claim', {
                        id: id
                    });
                    Swal.fire(
                        'Deleted!',
                        'The round claim has been deleted.',
                        'success'
                    ).then(() => {

                    });
                }
            });
        }
        function deleteRounds(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this round request?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the approval action here
                    Livewire.dispatch('delete_rounds', {
                        id: id
                    });
                    Swal.fire(
                        'Deleted!',
                        'The round request has been deleted.',
                        'success'
                    ).then(() => {

                    });
                }
            });
        }

        function deleteAdoption(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this adoption request?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the approval action here
                    Livewire.dispatch('delete_adoption', {
                        id: id
                    });
                    Swal.fire(
                        'Deleted!',
                        'The adoption request has been deleted.',
                        'success'
                    ).then(() => {
                        // Reload the page after the user clicks "OK" or clicks outside the modal

                    });
                }
            });
        }

        function approve_claim(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to approve this claim?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the approval action here
                    Livewire.dispatch('claim_approved', {
                        id: id
                    });
                    Swal.fire(
                        'Approved!',
                        'The claim has been approved.',
                        'success'
                    ).then(() => {
                        // Reload the page after the user clicks "OK" or clicks outside the modal

                    });
                }
            });
        }

        function reject_claim(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to reject this claim?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, reject it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('claim_dog_rejected', {
                        id: id
                    });
                    Swal.fire(
                        'Rejected!',
                        'The claim has been rejected.',
                        'success'
                    ).then(() => {
                        // Reload the page after the user clicks "OK" or clicks outside the modal

                    });
                }
            });
        }
    </script>
    <script>
        var adoptionlist = [];
        var cdoptionlist = [];
        var cl_list = [];

        var a_options = {
            valueNames: ['ticket_number', 'requestor', 'dog_name', 'contact', 'address', 'date_request', 'status',
                'actions'
            ],
            searchClass: 'search',
            page: 5,
            pagination: true,
            paginationClass: 'pagination pagination-rounded', // Adds pagination classes (rounded pagination)
            nextClass: 'next', // Custom class for the next button
            prevClass: 'previous', // Custom class for the previous button
            activeClass: 'active', // Custom class for active page
            pageClass: 'page-item', // Class for each page item
            linkClass: 'page-link' // Class for each link inside the pagination
        };

        var c_options = {
            valueNames: ['ticket_number', 'requestor', 'address', 'specific', 'contact', 'created', 'status',
                'actions'
            ],
            searchClass: 'c_search',
            page: 5,
            pagination: true,
            paginationClass: 'pagination', // Adds pagination classes (rounded pagination)
            nextClass: 'next', // Custom class for the next button
            prevClass: 'previous', // Custom class for the previous button
            activeClass: 'active', // Custom class for active page
            pageClass: 'page-item', // Class for each page item
            linkClass: 'page-link' // Class for each link inside the pagination
        };

        var cl_options = {
            valueNames: ['ticket_number', 'requestor', 'dog_name', 'contact', 'address', 'status', 'actions'],
            searchClass: 'cl_search',
            page: 5,
            pagination: true,
            paginationClass: 'pagination', // Adds pagination classes (rounded pagination)
            nextClass: 'next', // Custom class for the next button
            prevClass: 'previous', // Custom class for the previous button
            activeClass: 'active', // Custom class for active page
            pageClass: 'page-item', // Class for each page item
            linkClass: 'page-link' // Class for each link inside the pagination
        };


        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('livewire:init', function() {

                function areinitializeList() {
                    console.log(adoptionlist);
                    console.log('reinit');
                    adoptionlist = new List('adoption_list', a_options);
                    cdoptionlist = new List('round_lists', c_options);
                    cl_list = new List('claim_list', cl_options);
                }


                areinitializeList();

                document.querySelector('.search').addEventListener('input', function(event) {
                    adoptionlist.search(event.target
                        .value); // Filter results based on the search input
                });
                document.querySelector('.c_search').addEventListener('input', function(event) {
                    cdoptionlist.search(event.target
                        .value); // Filter results based on the search input
                });
                document.querySelector('.cl_search').addEventListener('input', function(event) {
                    cl_list.search(event.target
                        .value); // Filter results based on the search input
                });

                $('.cl_PaginateNext').on('click', function() {
                    var list = $('.pagination').find('li');
                    $.each(list, function(position, element) {
                        if ($(element).is('.active')) {
                            $(list[position + 1]).trigger('click');
                        }
                    })
                });

                $('.cl_jPaginateBack').on('click', function() {
                    var list = $('.pagination').find('li');
                    $.each(list, function(position, element) {
                        if ($(element).is('.active')) {
                            $(list[position - 1]).trigger('click');
                        }
                    })
                });

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

                $('.cjPaginateNext').on('click', function() {
                    var list = $('.pagination').find('li');
                    $.each(list, function(position, element) {
                        if ($(element).is('.active')) {
                            $(list[position + 1]).trigger('click');
                        }
                    })
                });


                $('.cjPaginateBack').on('click', function() {
                    var list = $('.pagination').find('li');
                    $.each(list, function(position, element) {
                        if ($(element).is('.active')) {
                            $(list[position - 1]).trigger('click');
                        }
                    })
                });

                Livewire.on('reinit_table', event => {
                    setTimeout(() => {
                        areinitializeList();
                    }, 1000);
                });

            });


            document.getElementById('approve_rounds').addEventListener('click', function() {
                setTimeout(() => {
                    areinitializeList();
                }, 1000);
                Swal.fire({
                    title: 'Approve Rounds?',
                    text: "Are you sure you want to approve this rounds request?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, approve rounds!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('rounds_accepted')
                        Swal.fire(
                            'Approved!',
                            'The rounds have been approved successfully.',
                            'success'
                        ).then(() => {
                            // Reload the page after approval
                        });
                    }
                });
            });

            document.getElementById('reject_rounds').addEventListener('click', function() {
                Swal.fire({
                    title: 'Reject Rounds?',
                    text: "Are you sure you want to approve this rounds request?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#28a745',
                    confirmButtonText: 'Yes, reject rounds!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Emit Livewire event to handle the rejection logic
                        Livewire.dispatch('rounds_rejected')

                        Swal.fire(
                            'Rejected!',
                            'The rounds have been rejected successfully.',
                            'success'
                        ).then(() => {
                            // Reload the page after rejection
                        });
                    }
                });
            });

            document.getElementById('approve_adoption').addEventListener('click', function() {
                setTimeout(() => {
                    areinitializeList();
                }, 1000);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to approve the adoption! Please call the Adopter first to confirm the details.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, approve it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('adopted')
                        Swal.fire(
                            'Approved!',
                            'The adoption has been approved.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {

                            }
                        });

                    }
                });
            });


            document.getElementById('reject_adoption').addEventListener('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to reject the adoption!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, reject it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform the reject action here
                        Livewire.dispatch('r_adopted')
                        Swal.fire(
                            'Rejected!',
                            'The adoption has been rejected.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {

                            }
                        });
                    }
                });
            });
            document.getElementById('reject_adoption').addEventListener('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to reject the adoption!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, reject it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform the reject action here
                        Livewire.dispatch('r_adopted')
                        Swal.fire(
                            'Rejected!',
                            'The adoption has been rejected.',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {

                            }
                        });
                    }
                });
            });

        });
    </script>
</div>
