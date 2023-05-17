<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Capsule\Manager;
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
    return redirect('login');
});

Route::get('login',[AuthController::class,'index'])->name('login');
Route::get('register',[AuthController::class,'register'])->name('register');
Route::post('proses',[AuthController::class,'proses'])->name('proses');
Route::post('proses_register',[AuthController::class,'proses_register'])->name('proses_register');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['cek_login:user']], function () {
        Route::resource('user', UserController::class);
    });
    Route::group(['middleware' => ['cek_login:manager']], function () {
        Route::resource('manager', ManagerController::class);
    });
    Route::group(['middleware' => ['cek_login:executive']], function () {
        Route::resource('executive', ExecutiveController::class);
    });
});