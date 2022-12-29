<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\OfficeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

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

// Route::get('/', function () {
//     return view('main');
// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::resource('user', UserController::class);
Route::resource('car',CarController::class);
Route::resource('office',OfficeController::class);
Route::get('/search', [CarController::class, 'search'])->name('car.search');
Route::get('/change', [CarController::class, 'change'])->name('car.change');
Route::get('/model', [CarController::class, 'model'])->name('car.model');
Route::get('/advanced', [CarController::class, 'advanced'])->name('car.advanced');
Route::get('/', [CarController::class, 'random'])->name('car.random');
Route::get('/home', [CarController::class, 'random']);

Route::post('/alert', [App\Http\Controllers\MycartController::class, 'add_item'])->name('add_item');
Route::get('/mycart', [App\Http\Controllers\MycartController::class, 'mycart'])->name('mycart')->middleware('auth');
Route::delete('mycart/{id}', [App\Http\Controllers\MycartController::class, 'destroy'])->name('mycart.destroy');
Route::post('/Checkout', [App\Http\Controllers\MycartController::class, 'checkout'])->name('checkout')->middleware('auth');





