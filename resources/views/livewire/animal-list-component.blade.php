<div>
    <style>
        /* Custom pagination styles */
        .pagination-rounded {
            display: flex;
            justify-content: center;
            padding: 0;
            list-style: none;
        }

        .pagination-rounded .page-item {
            margin: 0 5px;
            cursor: pointer;
        }

        .pagination-rounded .page-link {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 50px;
            /* Rounded corners */
        }

        .pagination-rounded .page-item.active .page-link {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pagination-rounded .page-item.disabled .page-link {
            cursor: not-allowed;
            opacity: 0.5;
        }

        .pagination-rounded .page-link:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
    <!-- Datatable css -->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Adoption List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-5">
                                <a data-bs-toggle="modal" data-bs-target="#info-header-modal"
                                    wire:click="$dispatch('clearData')" class="btn btn-info mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> Add Dogs </a>
                            </div>
                        </div>
                        <div class="table-responsive" id="animals-datatable">
                            <div class="mt-3">
                                <input class="search" placeholder="Search for dogs..." />
                            </div>

                            <table class="table table-centered w-100 dt-responsive nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th class="all">Dog Name</th>
                                        <th>Breed</th>
                                        <th>Color</th>
                                        <th>Description</th>
                                        <th style="width: 120px;">Action</th>
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
                                                    <img src="{{ asset('storage/' . $images[0]) }}" alt="Animal Image"
                                                        title="Animal Image" class="rounded me-3" height="48" />
                                                    <p class="m-0 d-inline-block align-middle font-16">
                                                        <a href="apps-ecommerce-products-details.html"
                                                            class="text-body">{{ $item['dog_name'] }}</a>
                                                    </p>
                                                </td>
                                                <td class="breed">
                                                    {{ $item['breed'] }}
                                                </td>
                                                <td class="color">
                                                    {{ $item['color'] }}
                                                </td>
                                                <td class="description">
                                                    {{ $item['description'] }}
                                                </td>
                                                <td class="table-action">
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
                            <div>


                                <button class="jPaginateBack paginate_button page-item previous disabled" id="basic-datatable_previous"><a
                                        href="#" aria-controls="basic-datatable" data-dt-idx="0" tabindex="0"
                                        class="page-link"><i class="mdi mdi-chevron-left"></i></a></button>
                                <ul class="pagination"></ul>
                                        
                                <button class="jPaginateNext paginate_button page-item previous disabled" id="basic-datatable_previous"><a
                                    href="#" aria-controls="basic-datatable" data-dt-idx="0" tabindex="0"
                                    class="page-link"><i class="mdi mdi-chevron-right"></i></a></button>

                            </div>

                            <!-- Add a search box -->

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        @livewire('modals-dogs')

        <script>
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
                    }
                });
            }
            document.addEventListener('DOMContentLoaded', function() {
                document.addEventListener('livewire:init', function() {

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

                    // Initialize the List.js instance on the table
                    var dogList = new List('animals-datatable', options);

                    // Handle live search input functionality
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
                    Livewire.hook('message.processed', () => {
                        dogList.update();
                    });
                    Livewire.on('dogSaved', event => {
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
                    Livewire.on('dogDeleted', event => {
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
                    Livewire.on('editDogSave', event => {
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

            });

            document.getElementById('closeButton').addEventListener('click', closeAllModals);

            function closeAllModals() {
                location.reload();
            }
        </script>
    </div>
