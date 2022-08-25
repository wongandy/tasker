<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TaskController as AdminTask;
use App\Http\Controllers\User\TaskController as UserTask;
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
        Route::get('/tasks', [AdminTask::class, 'index'])->name('tasks');
        Route::post('/tasks', [AdminTask::class, 'store'])->name('tasks.store');
        Route::get('/tasks/create', [AdminTask::class, 'create'])->name('tasks.create');
        Route::get('/tasks/{task}', [AdminTask::class, 'show'])->name('tasks.show');
        Route::get('/tasks/edit/{task}', [AdminTask::class, 'edit'])->name('tasks.edit');
        Route::put('/tasks/update/{task}', [AdminTask::class, 'update'])->name('tasks.update');
        Route::delete('/tasks/delete/{task}', [AdminTask::class, 'destroy'])->name('tasks.delete');
        Route::get('/tasks/completed', [AdminTask::class, 'completed'])->name('tasks.completed');
        Route::get('/tasks/not-started', [AdminTask::class, 'notStarted'])->name('tasks.not_started');
        Route::get('/tasks/started', [AdminTask::class, 'started'])->name('tasks.started');
    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
        'middleware' => 'is_user',
    ], function () {
        Route::get('/dashboard', [User::class, 'index'])->name('dashboard');
        Route::get('/tasks', [UserTask::class, 'index'])->name('tasks');
        Route::get('/tasks/edit/{task}', [UserTask::class, 'edit'])->name('tasks.edit');
        Route::put('/tasks/update/{task}', [UserTask::class, 'update'])->name('tasks.update');
        Route::get('/tasks/completed', [UserTask::class, 'completed'])->name('tasks.completed');
        Route::get('/tasks/not-started', [UserTask::class, 'notStarted'])->name('tasks.not_started');
        Route::get('/tasks/started', [UserTask::class, 'started'])->name('tasks.started');
    });
});

require __DIR__.'/auth.php';
