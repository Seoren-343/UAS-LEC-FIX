<?php

use App\Http\Controllers\AboutUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FounderController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    return view('homepage.index');
})->name('home');

Route::get('admin/login', [CustomAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [CustomAuthController::class, 'login']);
Route::post('admin/logout', [CustomAuthController::class, 'logout'])->name('admin.logout');
Route::get('/category-bus', [BusController::class, 'categoryBus'])->name('busFol.bus');
Route::get('/bus/{id}', [BusController::class, 'show'])->name('busFol.busshow');
Route::get('/founders', [FounderController::class, 'founder'])->name('homepage.founder');
Route::get('/galleries', [GalleryController::class, 'gallery'])->name('homepage.gallery');
Route::get('/aboutUs', [AboutUsController::class, 'aboutus'])->name('homepage.aboutus');
Route::get('/contacts', [ContactController::class, 'contacts'])->name('contactFol.contacts');

//Authenticated Users Access
Route::middleware(['auth'])->group(function () {
    Route::get('/buscreation', [BusController::class, 'creation'])->name('busFol.buscreation');
    Route::post('/bus/store', [BusController::class, 'store'])->name('bus.store');
    Route::get('/bus/edit/{id}', [BusController::class, 'edit'])->name('busFol.busedit');
    Route::put('/bus/update/{id}', [BusController::class, 'update'])->name('busFol.update');
    Route::delete('/bus/delete/{id}', [BusController::class, 'destroy'])->name('busFol.delete');
    
    Route::get('/contacts/edit/{contact}', [ContactController::class, 'edit'])->name('contactFol.contactedit');
    Route::put('/contacts/update/{contact}', [ContactController::class, 'update'])->name('contactFol.contactupdate');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contactFol.contactcreate');
    Route::post('/contacts/store', [ContactController::class, 'store'])->name('contactFol.contactstore');
    Route::delete('/contacts/delete/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});


