<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
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
Route::get('/',[HomeController::class,'goto']);
Route::get('/dashboard',[HomeController::class,'gotos']);

Route::get('/acceuil',[HomeController::class,'acceuil']);

Route::get('/home',[HomeController::class,'redirect']);

Route::get('/librery',[HomeController::class,'librery']);


//__________________--filter -- and --search--_____________________________________

Route::get('/searchBook', [BookController::class, 'searchBook']);

Route::get('/filterByCategory', [BookController::class, 'filterByCategory']);

//__________________--Rating--_____________________________________

Route::post('/rating/{id}',[BookController::class,'rating']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});








Route::prefix('admin')->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified', 'is_library_admin'])->group(function () {

    Route::get('/add_loanBook',[AdminController::class,'add_loanBook']);

    Route::get('/add_book',[AdminController::class,'add_book']);

    Route::post('/upload_loanBook',[BookController::class,'upload_loanBook']);

    Route::post('/upload_book',[BookController::class,'upload_book']);

    Route::get('/loan_books',[BookController::class,'loan_books']);

    Route::get('/books',[BookController::class,'books']);

    Route::get('/update_loanBook/{id}',[BookController::class,'update_loanBook']);

    Route::post('/edit_loanBook/{id}',[BookController::class,'edit_loanBook']);

    Route::post('/retrieved/{id}',[BookController::class,'retrieved']);

    Route::post('/loaned/{id}',[BookController::class,'loaned']);

    Route::get('/delete_loanBook/{id}',[BookController::class,'delete_loanBook']);

    Route::get('/update_Book/{id}',[BookController::class,'update_Book']);

    Route::post('/edit_Book/{id}',[BookController::class,'edit_Book']);

    Route::get('/delete_Book/{id}',[BookController::class,'delete_Book']);

    Route::get('/users',[AdminController::class,'users']);

});


Route::prefix('Admin')->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified', 'is_admin'])->group(function () {

    Route::get('/add_admin',[AdminController::class,'add_admin']);

    Route::post('/upload_Admin',[AdminController::class,'upload_Admin']);



});


