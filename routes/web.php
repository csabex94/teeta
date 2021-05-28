<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use Inertia\Inertia;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/create-task', function() {
       return Inertia::render('CreateTask');
    })->name('create.task');

    Route::get('/events', function() {
        return Inertia::render('Events/Show');
    })->name('events.show');
    
    Route::get('/events/create', function() {
        return Inertia::render('Events/Create');
    })->name('events.create');

    Route::post('/events/store', [EventsController::class, 'store'])->name('events.store');

    Route::post('/create-task', [TaskController::class, 'store'])->name('create.task.post');

    Route::delete('/delete-task', [TaskController::class, 'deleteTask'])->name('delete.task');
    Route::put('/complete-task', [TaskController::class, 'completeTask'])->name('complete.task');
});

