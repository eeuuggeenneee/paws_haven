<div>
    <style>
        .table-footer {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            padding: 20px;
            text-align: center;
            width: 100%;
        }

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
        .table td,
        .table th {
            white-space: nowrap;
            /* Prevent text from wrapping */
            overflow: hidden;
            /* Prevent overflow beyond cell boundary */
            text-overflow: ellipsis;
            /* Add ellipsis (...) for overflowing content */
        }
        @media (min-width: 1025px) {
            .table-footer nav .showing {
                display: inline-block;
                position: absolute;
                left: 14.75%;
            }
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
            .search-container {
                margin-right: 20px;
                margin-top: 35px;
                margin-bottom: 25px;
            }
        }
        .search-container input.search {
            text-align: center;
            /* Align text to the left */
            padding-left: 30px;
            /* Space between text and icon */
        }
    </style>
    <!-- Datatable css -->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title text-black">Adoption List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #f2f2f2" id="cardhe" wire:ignore.self>
                    <div class="card-body">
                        <div class="table-responsive-xl" id="animals-datatable" wire:ignore.self>
                            <div class="d-flex align-items-center ">
                                <div class="search-container ms-auto" onclick="focusSearchInput()">
                                    <input type="text" class="search form-control " id="searchtb" wire:keydown="changeStatus" wire:model="dogname"
                                        style="width: 150%;" placeholder="Search for dogs...">
                                </div>
                                <a data-bs-toggle="modal" data-bs-target="#info-header-modal"
                                    wire:click="$dispatch('clearData')"
                                    class="btn d-lg-block d-none text-white mb-2 d-flex align-items-center ms-auto" style="background-color: #0396a6;">
                                    <i class="mdi mdi-plus-circle me-2"></i> Add Dog
                                </a>
                            </div>
                            <a data-bs-toggle="modal" data-bs-target="#info-header-modal"
                                wire:click="$dispatch('clearData')"
                                class="btn d-sm-block d-lg-none col-5 mt-4  text-white mb-2 d-flex align-items-center ms-auto" style="background-color: #0396a6;">
                                <i class="mdi mdi-plus-circle me-2"></i> Add Dog
                             </a>
                             <div class="table-container">
                            <table class="table table-centered w-100 dt-responsive nowrap">
                                <thead style="background-color: #0396a6;">
                                    <tr>
                                        <th class="text-white" class="all">Dog Name</th>
                                        <th class="text-white">Breed</th>
                                        <th class="text-white">Color</th>
                                        <th style="width: 120px;" class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list ">
                                    @if (isset($doglist))
                                        @foreach ($doglist as $item)
                                            @php
                                                $images = json_decode($item['animal_images']);
                                            @endphp
                                            <tr id="dog-{{ $item['dog_id_unique'] }}">
                                                <td class="dog_name text-black">
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
                                                    </p>
                                                </td>
                                                <td class="breed text-black">{{ $item['breed_name'] }}</td>
                                                <td class="color text-black">{{ $item['color'] }}</td>
                                                <td class="table-action text-black">
                                                    <a data-bs-toggle="modal" data-bs-target="#info-header-modal"
                                                        wire:click="$dispatch('editDoggo', [ '{{ $item['dog_id_unique'] }}' ])"
                                                        class="action-icon">
                                                        <i class="mdi mdi-square-edit-outline"></i>
                                                    </a>
                                                    <a onclick="confirmDelete('{{ $item['dog_id_unique'] }}')"
                                                        class="action-icon">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>

                            </table>
                            </div>
                            @if($doglist instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $doglist->links() }}
                            @endif
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

                            <!-- Add a search box -->

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        @livewire('modals-dogs')

        <script>
              var htmlHeight = document.documentElement.clientHeight;
            var cardHeight = htmlHeight - 300;
    
            // document.getElementById('cardhe').style.minHeight = cardHeight + 'px';
            // document.getElementById('cardhe').style.maxHeight = cardHeight + 'px';
    
            // document.getElementById('animals-datatable').style.minHeight = (cardHeight - 50) + 'px';
            // document.getElementById('animals-datatable').style.maxHeight = (cardHeight - 50) + 'px';
            // document.getElementById('animals-datatable').style.overflow = 'hidden';
            
            function focusSearchInput() {
                document.getElementById('searchtb').focus();
                console.log('hehe');
            }
            var dogList = [];

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
                        Livewire.dispatch('deleteDogAdopt', {
                            dog_id: dogid
                        })
                        document.getElementById(`dog-${dogid}`).remove();

                    }
                });
            }
            var options = {
                valueNames: ['dog_name', 'breed', 'color', 'description'],
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

            function clearmodals() {

            }
            document.addEventListener('DOMContentLoaded', function() {
                document.addEventListener('livewire:init', function() {
                    function reinitializeList() {
                        console.log(dogList);

                        var modals = document.querySelectorAll('.modal');
                        modals.forEach(function(modal) {
                            var bsModal = bootstrap.Modal.getInstance(
                                modal); // Get the modal instance
                            if (bsModal) {
                                bsModal.hide(); // Hide the modal
                            }
                        });
                        // dogList = new List('animals-datatable', options);

                    }


                    // reinitializeList();

                    document.querySelector('.search').addEventListener('input', function(event) {
                        dogList.search(event.target.value); // Filter results based on the search input
                    });


                    $('.jPaginateNext').on('click', function() {
                        var list = $('.pagination').find('li');
                        $.each(list, function(position, element) {
                            if ($(element).is('.active')) {
                                $(list[position + 1]).trigger('click');
                            }
                        })
                    });

                    $('.jPaginateBack').on('click', function() {
                        var list = $('.pagination').find('li');
                        $.each(list, function(position, element) {
                            if ($(element).is('.active')) {
                                $(list[position - 1]).trigger('click');
                            }
                        })
                    });

                    Livewire.on('dogSaved', event => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: event[0],
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                clearmodals();
                                reinitializeList();
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
                                clearmodals();
                                reinitializeList();
                            }
                        });

                    });
                });

            });


            function closeAllModals() {
                location.reload();
            }
        </script>
    </div>
