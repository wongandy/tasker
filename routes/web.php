<?php

use App\Http\Controllers\Admin\DashboardController as Admin;
use App\Http\Controllers\User\DashboardController as User;
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

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'is_admin',
    ], function () {
        Route::get('/dashboard', [Admin::class, 'index'])->name('dashboard');
    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
        'middleware' => 'is_user',
    ], function () {
        Route::get('/dashboard', [User::class, 'index'])->name('dashboard');
    });
});

require __DIR__.'/auth.php';
