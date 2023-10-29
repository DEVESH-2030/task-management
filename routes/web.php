<?php

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

    // Task section routes
    Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('/home');
    Route::get('/create-task', [App\Http\Controllers\TaskController::class, 'create'])->name('create-task');
    Route::post('/create', [App\Http\Controllers\TaskController::class, 'store'])->name('createTask');
    Route::get('/edit-task/{task}', [App\Http\Controllers\TaskController::class, 'edit'])->name('edit-task');
    Route::post('/update-task/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('update-task');
    Route::get('/delete/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('delete');
    Route::get('/create-sheet', [App\Http\Controllers\TaskController::class, 'createSheet'] )->name('create-sheet');
    Route::post('task/updateOrder', [App\Http\Controllers\TaskController::class, 'updateOrder'])->name('task.updateOrder');


    // Project Section routes
    Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects');
    Route::get('/create-project', [App\Http\Controllers\ProjectController::class, 'create'])->name('create-project');
    Route::post('/storeProject', [App\Http\Controllers\ProjectController::class, 'store'])->name('storeProject');

    // but project edit pages not implemented
    Route::get('/edit-project/{project}', [App\Http\Controllers\ProjectController::class, 'edit'])->name('edit-project');
    Route::post('/update-project/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('update-project');
