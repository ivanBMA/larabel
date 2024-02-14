<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\BookController;
use GuzzleHttp\Psr7\Response;

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

//"Bienvenido a la Api Laravel 20"


    /*
    Route::fallback(function(){
        return response()->json(['error' => 'Recurso no disponible'], 400);
    });
    */

Route::get('/dashboard', function () {
    $books = Book::all();
    return view('dashboard',compact('books'));
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::resource('/books', BookController::class);
    Route::get('/books/edit/{id}',[BookController::class, 'mostrarEdit']);
    Route::get('/books/destroy/{id}',[BookController::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
