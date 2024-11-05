<div>
    <!-- Datatable css -->
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Lost and Found List</h4>
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
                            <a data-bs-toggle="modal" data-bs-target="#lostandfounddog" wire:click="$dispatch('adddog')"
                                class="btn btn-info mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Dog </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered w-100 dt-responsive nowrap" id="animals-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th class="all">Dog Name</th>
                                    <th>Breed</th>
                                    <th>Color</th>
                                    <th>Description</th>
                                    <th style="width: 120px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($doglist))
                                    @foreach ($doglist as $item)
                                        @php
                                            $images = json_decode($item['animal_images']);
                                        @endphp
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $images[0]) }}" alt="Animal Image"
                                                    title="Animal Image" class="rounded me-3" height="48" />


                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html"
                                                        class="text-body">{{ $item['dog_name'] }}</a>
                                                    <br />

                                                </p>
                                            </td>
                                            <td>
                                                {{ $item['breed'] }}
                                            </td>
                                            <td>
                                                {{ $item['color'] }}
                                            </td>
                                            <td>
                                                {{ $item['description'] }}
                                            </td>
                                            <td class="table-action">

                                                <a data-bs-toggle="modal" data-bs-target="#lostandfounddog"
                                                    wire:click="editDog('{{ $item['dog_id_unique'] }}')"
                                                    class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <a onclick="confirmDelete('{{ $item['dog_id_unique'] }}')" class="action-icon"> <i
                                                        class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

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
                    Livewire.dispatch('deleteDog',{
                        dog_id: dogid
                    })
                }
            });
        }
        document.addEventListener('livewire:init', function() {
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
        document.getElementById('closeButton').addEventListener('click', closeAllModals);

        function closeAllModals() {
            location.reload();
        }
    </script>
</div>
