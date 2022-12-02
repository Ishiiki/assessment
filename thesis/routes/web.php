<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::get('', function () {
    return view('welcome');
});

//Register Route
Route::get('register/',[AuthController::class, 'create'])->name('register');
Route::post('register/',[AuthController::class, 'store'])->name('register.store');

//Login Route
Route::get('login/',[AuthController::class, 'login'])->name('login');
Route::post('login/', [AuthController::class, 'authenticate'])->name('authenticate');

//Dashboard
Route::get('user/',[UserController::class, 'index'])->name('user.dashboard');