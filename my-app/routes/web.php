<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('homepage.index');
})->name('home');

Route::get('/login', 'App\Http\Controllers\CustomAuthController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\CustomAuthController@login');
Route::get('/register', 'App\Http\Controllers\CustomAuthController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\CustomAuthController@register');
Route::post('/logout', 'App\Http\Controllers\CustomAuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/category-bus', [BusController::class, 'categoryBus'])->name('category.bus');
    Route::get('/contacts', [ContactController::class, 'contacts'])->name('contactFol.contacts');
    // Route group for admin-accessible contact management
    Route::middleware(['admin'])->group(function () {
        Route::get('/contacts/edit/{contact}', [ContactController::class, 'edit'])->name('contactFol.contactedit');
        Route::put('/contacts/update/{contact}', [ContactController::class, 'update'])->name('contactFol.update');
        Route::get('/contacts/create', [ContactController::class, 'create'])->name('contactFol.contactcreate');
        Route::post('/contacts/store', [ContactController::class, 'store'])->name('contactsFol.contactstore');
        Route::delete('/contacts/delete/{contact}', [ContactController::class, 'destroy'])->name('contactFol.delete');
    });
});

