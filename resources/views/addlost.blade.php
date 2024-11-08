@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        {{-- @livewire('add-lost-dog') --}}
        @livewire('lost-table-list')
        @livewire('modals-dogs')
        @livewire('notification')

    </div>
@endsection
