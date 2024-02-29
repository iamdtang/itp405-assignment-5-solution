<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretController;
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

Route::middleware(['maintenance-mode'])->group(function () {
    Route::view('/', 'welcome')->name('home'); 
    Route::view('/maintenance', 'maintenance')->name('maintenance');
    Route::view('/test', 'test');
});

Route::get('/secret', [SecretController::class, 'index'])->name('secret.index');
Route::post('/secret', [SecretController::class, 'store'])->name('secret.store');