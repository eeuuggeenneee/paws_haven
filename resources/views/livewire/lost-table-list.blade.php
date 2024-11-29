<div>
    <style>
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

        .table td,
        .table th {
            white-space: nowrap;
            /* Prevent text from wrapping */
            overflow: hidden;
            /* Prevent overflow beyond cell boundary */
            text-overflow: ellipsis;
            /* Add ellipsis (...) for overflowing content */
        }

   
        .table-container {
            overflow-x: auto;
            /* Enables horizontal scrolling */
            -webkit-overflow-scrolling: touch;
            /* Smooth scrolling for iOS devices */
            margin-bottom: 20px;
            /* Adjust as needed */
        }

        .table-container table {
            min-width: 100%;
            /* Makes sure the table takes up at least the full width of its container */
        }
       

        .search-container {
            position: absolute;
            max-width: 500px;
            margin-bottom: 15px;
        }

        /* Style the search input field */
        .search {
            width: 100%;
            /* Ensure input fills container */
            padding-left: 30px;
            /* Space for the icon */
            border-radius: 20px;
            /* Round the edges */
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            padding: 8px 12px;
            /* Padding inside the input */
            text-align: center;
        }

        .search_dog2 {
            width: 100%;
            /* Ensure input fills container */
            padding-left: 30px;
            /* Space for the icon */
            border-radius: 20px;
            /* Round the edges */
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            padding: 8px 12px;
            /* Padding inside the input */
            text-align: center;
        }

        .search-container::before {
            content: "\1F50D";
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #888;
        }

        @media (max-width: 576px) {
            /* For small screens (SM and below) */
            .search-container {
                margin-top: 20px;
                margin-bottom: 20px;
            }
        }

        .search-container input.search {
            text-align: center;
            padding-left: 30px;
        }
    </style> <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title text-black">Lost and Found List</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="card" style="background-color: #f2f2f2">
        <ul class="nav nav-tabs nav-bordered mb-3" role="tablist" wire:ignore>
            <li class="nav-item" role="presentation" wire:ignore.self>
                <a href="#collapse-horizontal-preview" class="nav-link active text-black" data-bs-toggle="tab"
                    role="tab" aria-controls="nav-preview" aria-selected="true">
                    Lost and Found
                </a>
            </li>
            <li class="nav-item" role="presentation" wire:ignore.self>
                <a href="#collapse-horizontal-code" class="nav-link  text-black" data-bs-toggle="tab" role="tab"
                    aria-controls="nav-code" aria-selected="false" tabindex="-1">
                    Lost and Found Request
                </a>
            </li>
        </ul> <!-- end nav-->
        <div class="tab-content">
            <div class="tab-pane active show" id="collapse-horizontal-preview" role="tabpanel" wire:ignore.self>
                <div class="card" style="background-color: #f2f2f2" id="cardlost">
                    <div class="px-2">
                        <div class="table-responsive-xl" id="lost_list" wire:ignore.self>
                            <div class="d-flex align-items-center w-100">
                                <div class="search-container">
                                    <input type="text" class="search form-control" id="searchtb" wire:model="dogname"  wire:keydown="changeStatus"
                                        style="width: 150%;" placeholder="Search for dogs and breed">
                                     

                                </div>

                                <!-- Move the Add Dog button to the right -->
                                <a data-bs-toggle="modal" data-bs-target="#lostandfounddog"
                                    wire:click="$dispatch('adddog')"
                                    class="d-lg-block d-none text-end btn text-white mb-2 ms-auto"
                                    style="background-color: #0396a6;">
                                    <i class="mdi mdi-plus-circle me-2"></i> Add Dog
                                </a>

                            </div>
                            <a data-bs-toggle="modal" data-bs-target="#lostandfounddog" wire:click="$dispatch('adddog')"
                                class="d-sm-block d-lg-none mt-3 text-end btn text-white mb-2 ms-auto"
                                style="background-color: #0396a6;">
                                <i class="mdi mdi-plus-circle me-2"></i> Add Dog
                            </a>
                            <div class="table-container">
                                <table class="table table-centered w-100 dt-responsive nowrap" id="animals-datatable">
                                    <thead style="background-color: #0396a6;">
                                        <tr>
                                            <th class="all text-white">Dog Name</th>
                                            <th class="text-white">Breed</th>
                                            <th class="text-white">Color</th>
                                            <th class="text-white">Status</th>

                                            <th style="width: 120px;" class="text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @if (isset($doglist))
                                            @foreach ($doglist as $item)
                                                @php
                                                    $images = json_decode($item['animal_images']);
                                                @endphp
                                                <tr>
                                                    <td class="dog_name">
                                                        @if(isset($images[0]))
                                                            <img src="{{ asset('storage/' . $images[0]) }}" 
                                                                class="img-thumbnail" 
                                                                alt="friend" 
                                                                style="min-width: 70px; min-height: 50px; width: 70px; height: 50px; object-fit: cover;">
                                                        @else
                                                            <img src="https://placehold.co/600x400" 
                                                                class="img-thumbnail" 
                                                                alt="friend" 
                                                                style="min-width: 70px; min-height: 50px; width: 70px; height: 50px; object-fit: cover;">
                                                        @endif
                                                        <p class="m-0 d-inline-block align-middle font-16">
                                                            <a class="text-black">{{ $item['dog_name'] }}</a>
                                                            <br />
                                                        </p>
                                                    </td>
                                                    <td class="breed text-black">
                                                        {{ $item['breed_name'] }}
                                                    </td>
                                                    <td class="color text-black">
                                                        {{ $item['color'] }}
                                                    </td>
                                                    <td class="description text-black">
                                                        {{ $item['status_name'] }}
                                                    </td>
                                                    <td class="table-action action text-black">

                                                        <a data-bs-toggle="modal" data-bs-target="#lostandfounddog"
                                                            wire:click="editDog('{{ $item['dog_id_unique'] }}')"
                                                            class="action-icon"> <i
                                                                class="mdi mdi-square-edit-outline"></i></a>
                                                        <a onclick="confirmDelete('{{ $item['dog_id_unique'] }}')"
                                                            class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="table-footer">
                                <nav>
                                    <div class="page-item jPaginateBack">
                                        <a class="page-link" href="javascript: void(0);" aria-label="Previous">
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
                            </div> --}}
                            @if($doglist instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $doglist->links() }}
                            @endif
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>

            <div class="tab-pane " id="collapse-horizontal-code" role="tabpanel" wire:ignore.self>
                <div class="card" style="background-color: #f2f2f2" id="cardrequest">
                    <div class="px-2">
                        
                        <div class="table-responsive-xl" id="lost_list_dog2" wire:ignore.self>
                            <div class="d-flex align-items-center w-100">
                                <div class="search-container">
                                    <input type="text" class="search_dog2 form-control" id="searchtb" wire:model="dogname2" wire:keydown="changeStatus"
                                        style="width: 150%;" placeholder="Search for dogs...">
                                </div>
                                <h3 class="mb-4 d-flex align-items-center ms-auto"></h3>
                            </div>
                            <div class="table-container">
                            <table class="table table-centered w-100 dt-responsive nowrap" id="animals-datatable">
                                <thead style="background-color: #0396a6;">
                                    <tr>
                                        <th class="all text-white">Ticket Number</th>
                                        <th class="all text-white">Requestor</th>
                                        <th class="all text-white">Contact Number</th>
                                        <th class="all text-white">Dog Name</th>
                                        <th class="text-white">Breed</th>
                                        <th class="text-white">Color</th>
                                        <th class="text-white">Status</th>
                                        <th style="width: 120px;" class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @if (isset($doglist2))
                                        @foreach ($doglist2 as $item)
                                            @php
                                                $images = json_decode($item['animal_images']);
                                            @endphp
                                            <tr>
                                                 <td class="ticket text-black">
                                                     F{{ $item['created_at']->format('ym') . '-' . str_pad($item['id'], 4, '0', STR_PAD_LEFT) ?? 'N/A' }}
                                                </td>
                                                 <td class="requuestor text-black">
                                                    {{ $item['contact_name'] }}
                                                </td>
                                                   <td class="contact text-black">
                                                    {{ $item['contact_number'] }}
                                                </td>
                                                <td class="dog_name">
                                                    @if(isset($images[0]))
                                                        <img src="{{ asset('storage/' . $images[0]) }}" 
                                                             class="img-thumbnail" 
                                                             alt="friend" 
                                                             style="min-width: 70px; min-height: 50px; width: 70px; height: 50px; object-fit: cover;">
                                                    @else
                                                        <img src="https://placehold.co/600x400" 
                                                             class="img-thumbnail" 
                                                             alt="friend" 
                                                             style="min-width: 70px; min-height: 50px; width: 70px; height: 50px; object-fit: cover;">
                                                    @endif
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a class="text-black">{{ $item['dog_name'] }}</a>
                                                        <br />
                                                    </p>
                                                </td>
                                                <td class="breed text-black">
                                                    {{ $item['breed_name'] }}
                                                </td>
                                                <td class="color text-black">
                                                    {{ $item['color'] }}
                                                </td>
                                                <td class="description text-black">
                                                    {{ $item['status_name'] }}
                                                </td>
                                                <td class="table-action action text-black">
                                                    @if ($item['status_name'] == 'For Publish')
                                                        <a data-bs-toggle="modal" data-bs-target="#lostdog"
                                                            wire:click="$dispatch('activedog', [ '{{ $item['dog_id_unique'] }}' ])"
                                                            class="action-icon"> <i class="mdi mdi-eye-outline"></i>
                                                        </a>
                                                        <a data-bs-toggle="modal" data-bs-target="#lostandfounddog"
                                                            wire:click="editDog('{{ $item['dog_id_unique'] }}')"
                                                            class="action-icon"> <i
                                                                class="mdi mdi-square-edit-outline"></i></a>
                                                    @endif
                                                    <a onclick="confirmDelete('{{ $item['dog_id_unique'] }}')"
                                                        class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            </div>
                            {{-- <div class="table-footer">
                                <nav>
                                    <div class="page-item dog2_jPaginateBack">
                                        <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </div>
                                    <ul class="pagination pagination-rounded mb-0">

                                    </ul>
                                    <div class="page-item ">
                                        <a class="page-link dog2_jPaginateNext" href="javascript: void(0);"
                                            aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </div>
                                </nav>
                            </div> --}}
                            @if($doglist2 instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $doglist2->links() }}
                            @endif
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end preview code-->
        </div> <!-- end tab-content-->
    </div>

    <!-- end row -->

    @livewire('modals-dogs')

    <script>
        var dogList = [];
        var dogList2 = [];

        var htmlHeight = document.documentElement.clientHeight;
        var cardHeight = htmlHeight - 300;

        // document.getElementById('cardlost').style.minHeight = cardHeight + 'px';
        // document.getElementById('cardlost').style.maxHeight = cardHeight + 'px';

        // document.getElementById('lost_list').style.minHeight = (cardHeight - 50) + 'px';
        // document.getElementById('lost_list').style.maxHeight = (cardHeight - 50) + 'px';
        // document.getElementById('lost_list').style.overflow = 'hidden';

        // document.getElementById('cardrequest').style.minHeight = cardHeight + 'px';
        // document.getElementById('cardrequest').style.maxHeight = cardHeight + 'px';

        // document.getElementById('lost_list_dog2').style.minHeight = (cardHeight - 50) + 'px';
        // document.getElementById('lost_list_dog2').style.maxHeight = (cardHeight - 50) + 'px';
        // document.getElementById('lost_list_dog2').style.overflow = 'hidden';

        function confirmDelete(dogid) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to delete',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.dispatch('deleteDog', {
                        dog_id: dogid
                    })
                }
            });
        }
        function clearModal() {
        // dogList = new List('lost_list', options);
        // dogList2 = new List('lost_list_dog2', options2);
            var modals = document.querySelectorAll('.modal');
            modals.forEach(function(modal) {
                var bsModal = bootstrap.Modal.getInstance(
                    modal); // Get the modal instance
                if (bsModal) {
                    bsModal.hide(); // Hide the modal
                }
            });
        }
        document.addEventListener('DOMContentLoaded', function() {

            document.addEventListener('livewire:init', function() {
                var options = {
                    valueNames: ['dog_name', 'breed', 'color', 'description', 'status', 'action'],
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

                var options2 = {
                    valueNames: ['dog_name', 'breed', 'color', 'description', 'status', 'action'],
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

                function reinitializeList() {

                    // dogList = new List('lost_list', options);
                    // dogList2 = new List('lost_list_dog2', options2);

                    var modals = document.querySelectorAll('.modal');
                    modals.forEach(function(modal) {
                        var bsModal = bootstrap.Modal.getInstance(
                            modal); // Get the modal instance
                        if (bsModal) {
                            bsModal.hide(); // Hide the modal
                        }
                    });
                }

                // reinitializeList();

                // document.querySelector('.search').addEventListener('input', function(event) {
                //     dogList.search(event.target.value); // Filter results based on the search input
                // });
                // document.querySelector('.search_dog2').addEventListener('input', function(event) {
                //     dogList2.search(event.target.value); // Filter results based on the search input
                // });

                // $('.jPaginateNext').on('click', function() {
                //     var list = $('.pagination').find('li');
                //     $.each(list, function(position, element) {
                //         if ($(element).is('.active')) {
                //             $(list[position + 1]).trigger('click');
                //         }
                //     })
                // });


                // $('.jPaginateBack').on('click', function() {
                //     var list = $('.pagination').find('li');
                //     $.each(list, function(position, element) {
                //         if ($(element).is('.active')) {
                //             $(list[position - 1]).trigger('click');
                //         }
                //     })
                // });

                // $('.dog2_jPaginateNext').on('click', function() {
                //     var list = $('.pagination').find('li');
                //     $.each(list, function(position, element) {
                //         if ($(element).is('.active')) {
                //             $(list[position + 1]).trigger('click');
                //         }
                //     })
                // });


                // $('.dog2_jPaginateBack').on('click', function() {
                //     var list = $('.pagination').find('li');
                //     $.each(list, function(position, element) {
                //         if ($(element).is('.active')) {
                //             $(list[position - 1]).trigger('click');
                //         }
                //     })
                // });


                Livewire.on('editDoggo', event => {
                    setTimeout(() => {
                        dogList = new List('lost_list', options);
                        dogList2 = new List('lost_list_dog2', options2);
                    }, 1000);
                });

                Livewire.on('reinnitdata', event => {
                    // reinitializeList();
                });

                Livewire.on('dogUpdate', event => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: event[0],
                        confirmButtonText: 'Okay'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // reinitializeList();
                            closeAllModals();
                        }
                    });
                });
                Livewire.on('dogSaved', event => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: event[0],
                        confirmButtonText: 'Okay'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // reinitializeList();
                            closeAllModals();
                        }
                    });


                });


                Livewire.on('dogDeleted', event => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: event[0],
                        confirmButtonText: 'Okay'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // reinitializeList();

                        }
                    });
                });
                Livewire.on('editDogSave', event => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: event[0],
                        confirmButtonText: 'Okay'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Reload the page
                            // reinitializeList();
                            closeAllModals();
                        }
                    });

                });
            });
        });
    </script>
</div>
