<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingsController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/listings');
});
Route::resource('listings', ListingsController::class)->except(['destroy']);
Route::resource('account', AccountController::class);
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store');
    Route::delete('/logout', 'destroy');
});

Route::prefix('realtor')->name('realtor.')->group(function () {
    Route::resource('listings', RealtorListingController::class)->only(['index', 'destroy']);
    Route::resource('listing.images', RealtorListingImageController::class)->only(['create', 'store', 'destroy']);
});
