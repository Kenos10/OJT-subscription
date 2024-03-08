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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\ProviderController;
use App\Http\Controllers\SubscriberController;

Route::get('/', [SubscriberController::class, 'index'])->name('index');
// Route::get('/subscribers', [SubscriberController::class, 'index']);
Route::post('/subscribers', [SubscriberController::class, 'store'])->name('subscribers.store');
Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
Route::get('/subscribers/{id}/edit', [SubscriberController::class, 'edit'])->name('subscribers.edit');
Route::put('/subscribers/{id}', [SubscriberController::class, 'update'])->name('subscribers.update');
Route::delete('/subscribers/{id}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');

// Route::get('/providers', [ProviderController::class, 'index']);
Route::post('/providers', [ProviderController::class, 'store'])->name('providers.store');
Route::get('/providers', [ProviderController::class, 'index'])->name('providers.index');
Route::get('/providers/{id}/edit', [ProviderController::class, 'edit'])->name('providers.edit');
Route::put('/providers/{id}', [ProviderController::class, 'update'])->name('providers.update');
Route::delete('/providers/{id}', [ProviderController::class, 'destroy'])->name('providers.destroy');
