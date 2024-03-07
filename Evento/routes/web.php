<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategorieController;


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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', [EventController::class, 'index'])->name('home');
Route::post('/dashboard', [EventController::class, 'store'])->middleware(['auth', 'verified'])->name('createEvent');
Route::put('/dashboard/{id}', [EventController::class, 'update'])->name('updateevent');
Route::delete('/delete/{id}', [EventController::class, 'destroy'])->name('deleteevent');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('/dashboard', 'EventController');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);




require __DIR__.'/auth.php';
