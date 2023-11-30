<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingsController;
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
Route::get('/', function() {
return redirect('/listings');
});
Route::resource('listings', ListingsController::class);
Route::resource('account', AccountController::class);
Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store');
    Route::delete('/logout', 'destroy');
});