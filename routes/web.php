<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AddLostDog;


Route::get('/', function () {
    return view('welcome');
})->name('landing');


Route::get('/animal-list', function () {
    return view('animal-list');
})->middleware('is_login');
Route::get('/report-lost-dog', function () {
    return view('addlost');
})->middleware('is_login');

Route::get('/adopt-a-dog', function () {
    return view('adoption');
})->middleware('is_login');
Route::get('/fur-community', function () {
    return view('furcomm');
})->middleware('is_login');

Route::get('/request-rounds', function () {
    return view('rounds');
})->middleware('is_login');


Route::get('/test', function () {
    return view('testevent');
})->middleware('is_login');


Route::post('/upload-images', [AddLostDog::class, 'uploadImages'])->name('upload.images');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
