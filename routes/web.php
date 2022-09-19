<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/products',ProductController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//route that handles rendering the menu page
Route::get('/menu',[MenuController::class,'index'])->name('menu');

//route that handles making and editing a reservation
Route::resource('/reservation',ReservationController::class);