<?php

use App\Http\Controllers\AboutUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FounderController;

Route::get('/', function () {
    return view('homepage.index');
})->name('home');

Route::get('/login', 'App\Http\Controllers\CustomAuthController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\CustomAuthController@login');
Route::get('/register', 'App\Http\Controllers\CustomAuthController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\CustomAuthController@register');
Route::post('/logout', 'App\Http\Controllers\CustomAuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    // Bus Routing
    Route::get('/category-bus', [BusController::class, 'categoryBus'])->name('busFol.bus');
    Route::get('/bus/create', [BusController::class, 'create'])->name('busFol.buscreate');
    Route::post('/bus/store', [BusController::class, 'store'])->name('bus.store');
    Route::get('/bus/edit/{id}', [BusController::class, 'edit'])->name('busFol.busedit');
    Route::put('/bus/update/{id}', [BusController::class, 'update'])->name('busFol.update');
    Route::delete('/bus/delete/{id}', [BusController::class, 'destroy'])->name('busFol.delete');
});

Route::get('/bus/{id}', [BusController::class, 'show'])->name('busFol.busshow');
Route::get('/founders', [FounderController::class, 'founder'])->name('homepage.founder');
Route::get('/aboutUs', [AboutUsController::class, 'aboutus'])->name('homepage.aboutus');

// Contacts Routing
Route::group(['middleware' => 'auth'], function () {
    Route::get('/contacts', [ContactController::class, 'contacts'])->name('contactFol.contacts');
    Route::get('/contacts/edit/{contact}', [ContactController::class, 'edit'])->name('contactFol.contactedit');
    Route::put('/contacts/update/{contact}', [ContactController::class, 'update'])->name('contactFol.contactupdate');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contactFol.contactcreate');
    Route::post('/contacts/store', [ContactController::class, 'store'])->name('contactFol.contactstore');
    Route::delete('/contacts/delete/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});
