<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\User\DashboardController as User;
use App\Http\Controllers\Admin\DashboardController as Admin;

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
        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::get('/tasks/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
        Route::put('/tasks/update/{task}', [TaskController::class, 'update'])->name('tasks.update');
        Route::delete('/tasks/delete/{task}', [TaskController::class, 'destroy'])->name('tasks.delete');
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
