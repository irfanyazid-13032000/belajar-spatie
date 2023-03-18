<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function(){
    Route::controller(RoleController::class)->group(function(){
        
        Route::get('konfigurasi/roles','index')->middleware('can:read role')->name('konfigurasi.roles');
        Route::get('konfigurasi/roles/create','create')->middleware('can:create role');
        Route::get('konfigurasi/roles/{id}/edit','edit')->middleware('can:create role');
        Route::post('konfigurasi/roles/{id}/update','update')->middleware('can:create role')->name('roles.update');
        
    });
});
