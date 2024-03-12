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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('/dashboard', 'EventController');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::middleware('role_id:2')->group(function(){
Route::get('/myevent', [EventController::class, 'viewMyEvent'])->name('event');
Route::post('/myevent/{id}', [EventController::class, 'addTicket'])->name('addticket');
Route::delete('/delete/{id}', [EventController::class, 'destroy'])->name('deleteevent')->middleware('auth');
Route::put('/home/{id}', [EventController::class, 'update'])->name('updateevent')->middleware('auth');
Route::get('/details/reservation/manuel/acceptreservation/{id}', [EventController::class,'acceptReservation'])->name('acceptReservation')->middleware('auth');
Route::get('/details/reservation/manuel/{id}', [EventController::class,'reservationManuelleInfo'])->name('reservationmanuelle')->middleware('auth');
Route::put('/home/{id}', [EventController::class, 'update'])->name('updateevent');


});
Route::post('/home', [EventController::class, 'store'])->middleware(['auth', 'verified'])->name('createEvent')->middleware('auth');

Route::middleware('role_id:3')->group(function(){
Route::post('/details/reservation/{id}', [EventController::class,'reservation'])->name('reservation')->middleware('auth');
Route::get('/search', [EventController::class, 'search']);
Route::get('/catgory/search', [EventController::class, 'searchCategorie'])->name('categorysearch');
Route::get('/details/{id}', [EventController::class,'eventDetails'])->name('details')->middleware('auth');
Route::get('/generatedTicket', [CategorieController::class,'ticketGenerated'])->name('yourticket')->middleware('auth');
});



Route::middleware('role_id:1')->group(function(){
    Route::get('/dashboard',[UserController::class,'EventsInfo'])->middleware('auth');
    Route::get('/dashboard/accepting/{id}',[UserController::class,'acceptingEvent'])->name('validation')->middleware('auth');
    Route::post('/dashboard/category', [UserController::class,'category'])->name('category')->middleware('auth');
    Route::get('/dashoard/users', [UserController::class, 'index'])->name('dashbordusers')->middleware('auth');
    Route::put('/dashoard/users/{id}', [UserController::class, 'updateRole'])->name('updaterole')->middleware('auth');
    Route::get('/categories', [CategorieController::class,'index'])->name('index')->middleware('auth');
    Route::delete('/categories/{id}', [CategorieController::class,'destroy'])->name('destroy')->middleware('auth');
    Route::put('/categories/update/{id}', [CategorieController::class,'update'])->name('update')->middleware('auth');
});








// Route::post('/details/typeoftickets',[EventController::class,'CheckTicketType'] )->name('typeoftickets');










require __DIR__.'/auth.php';
