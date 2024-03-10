<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\UserController;

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


Route::get('/home', [EventController::class, 'index'])->name('home');
Route::post('/home', [EventController::class, 'store'])->middleware(['auth', 'verified'])->name('createEvent');
Route::put('/home/{id}', [EventController::class, 'update'])->name('updateevent');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('/dashboard', 'EventController');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);


Route::get('/myevent', [EventController::class, 'viewMyEvent'])->name('event');
Route::post('/myevent/{id}', [EventController::class, 'addTicket'])->name('addticket');
Route::delete('/delete/{id}', [EventController::class, 'destroy'])->name('deleteevent');
Route::put('/home/{id}', [EventController::class, 'update'])->name('updateevent');

Route::get('/details/{id}', [EventController::class,'eventDetails'])->name('details');

Route::post('/details/reservation/{id}', [EventController::class,'reservation'])->name('reservation');


Route::get('/dashboard',[UserController::class,'EventsInfo']);
Route::get('/dashboard/accepting/{id}',[UserController::class,'acceptingEvent'])->name('validation');
Route::post('/dashboard/category', [UserController::class,'category'])->name('category');

Route::get('/categories', [CategorieController::class,'index'])->name('index');
Route::delete('/categories/{id}', [CategorieController::class,'destroy'])->name('destroy');
Route::put('/categories/update/{id}', [CategorieController::class,'update'])->name('update');





// Route::post('/details/typeoftickets',[EventController::class,'CheckTicketType'] )->name('typeoftickets');










require __DIR__.'/auth.php';
