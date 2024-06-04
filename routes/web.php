<?php

use App\Http\Controllers\CrewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;

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

// Route login
Route::get('/', [LoginController::class, 'show'])->middleware('guest');
Route::post('/', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route for User
Route::get('/dashboard', [IndexController::class, 'show'])->name('dashboard')->middleware('auth');
Route::get('/crew', [CrewController::class, 'show'])->name('crew')->middleware('auth');
Route::post('/crew', [CrewController::class, 'store'])->middleware('auth')->name('tambah-crew');
Route::put('/crew/{id}', [CrewController::class, 'updateCrew'])->middleware('auth')->name('update-crew');
Route::post('/update-notif', [CrewController::class, 'UpdateNotif'])->middleware('auth');
