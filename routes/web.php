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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/allTasks' , [App\Http\Controllers\TasksController::class, 'index'] )->name('tasks-index');
Route::get('/assignedTasks' , [App\Http\Controllers\TasksController::class, 'create'] )->name('assigned-tasks');
Route::post('/createNewTask' , [App\Http\Controllers\TasksController::class, 'store'] )->name('tasks-store');

Route::get('/statistics' , [App\Http\Controllers\TasksController::class, 'statisticsIndex'] )->name('statistics-index');