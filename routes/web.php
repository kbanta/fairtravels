<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('landing_page');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin/', 'middleware' => ['role:administrator']], function () {
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin_ui');
    Route::get('home', [App\Http\Controllers\AdminController::class, 'home_page']);
    Route::get('profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile');
    Route::put('update_profile', [App\Http\Controllers\AdminController::class, 'update_profile']);
    Route::post('profile/admin-changeProfilePic', [App\Http\Controllers\AdminController::class, 'changeProfilePic'])->name('adminProfilePic');
    Route::get('home/tequila/search', [App\Http\Controllers\TequilaController::class, 'search'])->name('search');
});
Route::group(['prefix' => 'user/', 'middleware' => ['role:user']], function () {
    Route::get('home', [App\Http\Controllers\UserController::class, 'index'])->name('user_ui');
});
