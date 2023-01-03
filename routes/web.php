<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {return view('welcome');});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('order/{id}', [App\Http\Controllers\OrderController::class, 'index'])->name('order');

Route::post('order/{id}', [App\Http\Controllers\OrderController::class, 'order']);

Route::get('checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');

Route::delete('removecart/{id}', [App\Http\Controllers\OrderController::class, 'delete']);

Route::get('confirm_checkout', [App\Http\Controllers\OrderController::class, 'confirm_checkout']);

Route::get('account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');

Route::post('account', [App\Http\Controllers\AccountController::class, 'update']);

// Make route group for motor that can only accessed by admin
Route::group(['middleware' => ['auth', 'is_admin'], "prefix" => "motor"], function () {
    Route::get('/', [App\Http\Controllers\MotorController::class, 'index'])->name('Motor');
    Route::get('/create', [App\Http\Controllers\MotorController::class, 'create'])->name('Tambah Motor');
    Route::post('/', [App\Http\Controllers\MotorController::class, 'store']);
    // Route::get('/{id}/edit', [App\Http\Controllers\MotorController::class, 'edit']);
    Route::put('/{id}', [App\Http\Controllers\MotorController::class, 'update']);
    Route::delete('/{id}', [App\Http\Controllers\MotorController::class, 'destroy']);
});

Route::get('/about', function () {
    return view('about');
})->name('about');
