<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\HouseDetailController;
use App\Http\Controllers\HouseImageController;
use App\Http\Controllers\LandlordController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UtilityController;
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
    $properties = \App\Models\House::all();
    return view('welcome', compact('properties'));
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resource('locations' , LocationController::class);
    Route::resource('categories' , CategoryController::class);
    Route::resource('utilities' , UtilityController::class);
    Route::resource('landlords' , LandlordController::class);
    Route::resource('houses' , HouseController::class);

    Route::get('/house/{id}/images', [HouseImageController::class, 'index'])->name('house_images');
    Route::get('/house/images_upload/{id}', [HouseImageController::class, 'upload'])->name('house_images_upload');
});

Route::get('/house_details/{id}', [HouseDetailController::class, 'show'])->name('house_details');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.verify');
