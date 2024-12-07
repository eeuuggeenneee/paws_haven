<?php

use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use App\Livewire\AddLostDog;
use App\Models\AnimalList;
use Livewire\Livewire;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

Route::get('/', function () {
    // Fetch data from the model
    $data = AnimalList::where('animal_lists.isActive',1)
    ->leftJoin('animal_list_statuses', 'animal_list_statuses.animal_id','=','animal_lists.dog_id_unique')
    ->whereIn('animal_list_statuses.status',[1,2,3])
    ->where('animal_list_statuses.isActive',1)
    ->select('animal_lists.*','animal_list_statuses.status')
    ->get(); 
    return view('welcome', compact('data'));
})->name('landing')->middleware('check_login');



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

Route::get('/announcements', function () {
    return view('dashboard');
})->middleware('is_login');

Route::get('/request-rounds', function () {
    return view('rounds');
})->middleware('is_login');

Route::get('/ticket-list', function () {
    return view('ticket');
})->middleware('is_login');

Route::get('/lost-n-found', function () {
    return view('lostfound');
})->middleware('is_login');

Route::get('/about', function () {
    return view('aboutus');
})->middleware('is_login');


Route::get('/test', function () {
    return view('testevent');
})->middleware('is_login');

Route::get('/emailview', function () {
    return view('testemail');
})->middleware('is_login');


Route::get('/archive', function () {
    return view('archivedata');
})->middleware('is_login');

Route::get('auth/google', [GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle'])->name('google.callback');



Route::post('/upload-images', [AddLostDog::class, 'uploadImages'])->name('upload.images');

// Route::post('/login', [AuthController::class, 'login'])->name('login');


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
