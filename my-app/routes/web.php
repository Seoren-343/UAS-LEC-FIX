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
});

Route::get('/category-bus', [BusController::class, 'categoryBus'])->name('category.bus');
Route::get('/contacts', [ContactController::class, 'contacts'])->name('category.contacts');