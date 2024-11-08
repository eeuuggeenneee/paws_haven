<div>
    <div class="table-responsive">
        <div class="d-flex align-items-center ">

            <h3 class="ms-auto">Claim List</h3>

            <div class="search-container">
                <input type="text" class="search form-control " id="searchtb" style="width: 150%;"
                    placeholder="Search for dogs...">
            </div>

        </div>
        <table class="table table-centered table-nowrap mb-0">
            <thead class="table-light">
                <tr>
                    <th>Ticket Number</th>
                    <th>Requestor</th>
                    <th>Dog</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th style="width: 125px;">Action</th>
                </tr>
            </thead>
            <tbody class="list">
                @if (isset($claimlist))
                    @foreach ($claimlist as $cdata)
                        @if (isset($cdata['id']))
                            @php
                                $imagestc = json_decode($cdata['animal_images']);
                            @endphp
                            <tr>
                                <td> C{{ $cdata['created_at']->format('ym') . '-' . str_pad($cdata['id'], 4, '0', STR_PAD_LEFT) ?? 'N/A' }}
                                <td> {{ $cdata['fullname'] ?? 'N/A' }} </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                @if (!is_null($imagestc) && isset($imagestc[0]))
                                                    <img src="{{ asset('storage/' . $imagestc[0]) }}"
                                                        class="rounded-circle avatar-xs" alt="friend"
                                                        wire:ignore.self>
                                                @else
                                                    <img src="{{ asset('storage/profile_pictures/xjxxrQTF3FiMAJ92RTzIrh15XRKYVLP9rtQt6g1E.png') }}"
                                                        class="rounded-circle avatar-xs" alt="default"
                                                        wire:ignore.self>
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="my-0">{{ $cdata['dog_name'] }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 txt-muted">
                                        {{ $cdata['address'] ?? 'N/A' }} </p>
                                </td>
                                <td>{{ $cdata['contact'] ?? 'N/A' }}</td>
                                <td>
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
                                <td>
                                    @if ($cdata['status_name'] == 'Found Dog')
                                    @else
                                        <a href="#"
                                            onclick="dispatchthis('{{ $cdata['dog_id_unique'] ?? 0 }}'); event.preventDefault();"
                                            class="action-icon" data-bs-toggle="modal"
                                            data-bs-target="#primary-header-modal2">
                                            <i class="mdi mdi-square-edit-outline"></i>
                                        </a>
                                    @endif
                                    <a href="javascript:void(0);" class="action-icon"> <i
                                            class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="table-footer">
            <nav>
                <div class="page-item jPaginateBack">
                    <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </div>
                <ul class="pagination pagination-rounded mb-0">

                </ul>
                <div class="page-item ">
                    <a class="page-link jPaginateNext" href="javascript: void(0);" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>
    <script>
        function dispatchthis(id) {
            Livewire.dispatch('getlostclaim', {
                dog_id: id
            });
        }
    </script>
</div>
