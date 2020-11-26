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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin', 'role' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth.role']], function () {
    Route::get('/home', [\App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('/users/list', [\App\Http\Controllers\AdminHomeController::class, 'getUsers'])->name('users.list');
    Route::get('/send-email', [\App\Http\Controllers\AdminHomeController::class, 'sendEmail'])->name('send-email');
    Route::get('/save-json', [\App\Http\Controllers\AdminHomeController::class, 'saveJson'])->name('save-json');
});



Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('user.home');

