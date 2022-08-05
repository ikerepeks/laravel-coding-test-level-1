<?php

use App\Http\Controllers\EventAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/v1/events',[EventAPIController::class , 'index'])->name('APIEventindex');
Route::get('/v1/events/active-events', [EventAPIController::class , 'active'] )->name('APIEventactive');
Route::get('/v1/events/{id}',[EventAPIController::class , 'show'])->name('APIEventshow');
Route::post('/v1/events',[EventAPIController::class , 'create'])->name('APIEventcreate');
Route::put('/v1/events/{id}',[EventAPIController::class , 'update'])->name('APIEventupdate');
Route::patch('/v1/events/{id}',[EventAPIController::class , 'partial'])->name('APIEventpartial');
Route::delete('/v1/event/{id}',[EventAPIController::class , 'delete'])->name('APIEventdelete');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
