<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AddLostDog;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/animal-list', function () {
    return view('animal-list');
});

Route::get('/report-lost-dog', function () {
    return view('addlost');
});

Route::post('/upload-images', [AddLostDog::class, 'uploadImages'])->name('upload.images');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
