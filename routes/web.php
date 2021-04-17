<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(
    [
        'register' => false
    ]
);

Route::redirect('/', '/login');

// Admin Routes
Route::middleware(['admin'])->group(function () {

    // Super user routes
    Route::middleware(['super.admin'])->group(function () {
        Route::get('/admin_home', 'HomeController@adminHome');
        Route::post('/add_new_category', 'HomeController@addNewCategory');
    });

    // Normal users routes

    Route::middleware(['user.admin'])->group(function () {
        Route::get('/user_home', 'HomeController@userHome');
    });
});
