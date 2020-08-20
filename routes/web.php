<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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

// Auth Routes
Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => true,
]);

// Redirect "/" to login and add the hability do logout with get request
Route::redirect('/', '/login');
Route::get('/logout', [LoginController::class, 'logout']);

// Admin Routes
Route::middleware('auth')
    ->prefix('/admin')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/home', 'HomeController@index')->name('admin.home');
    });
