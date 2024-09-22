@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @livewire('add-lost-dog')
        @livewire('modals-dogs')
    </div>
@endsection
