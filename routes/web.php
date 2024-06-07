<?php

use App\Http\Controllers\CrewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use Illuminate\Routing\RouteGroup;

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
Route::group(['middleware' => ['guest']], function (){
    Route::get('/', [LoginController::class, 'show']);
    Route::post('/', [LoginController::class, 'login'])->name('login');
});


// Route Utama
Route::group(['middleware' => ['auth', 'session.expired']], function (){
    Route::get('/dashboard', [IndexController::class, 'show'])->name('dashboard');
    Route::get('/crew', [CrewController::class, 'show'])->name('crew');
    Route::post('/crew', [CrewController::class, 'store'])->name('tambah-crew');
    Route::put('/crew/{id}', [CrewController::class, 'updateCrew'])->name('update-crew');
    Route::post('/update-notif', [CrewController::class, 'UpdateNotif']);
    Route::delete('/crew/hapus-sertif/{id}', [CrewController::class, 'hapusSertif'])->name('hapus-sertif');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
