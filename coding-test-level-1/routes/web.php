<?php

use App\Http\Controllers\EventController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/event/index', [EventController::class, 'index'])->name('index');
    Route::get('/event/create', [EventController::class, 'create'])->name('create');
    Route::put('/event/create', [EventController::class, 'put'])->name('put');
    Route::delete('/event/delete', [EventController::class, 'delete'])->name('delete');
    Route::get('/event/{id}', [EventController::class, 'show'])->name('show');
    Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('edit');
    Route::patch('/event/{id}/edit', [EventController::class, 'update'])->name('update');
});

