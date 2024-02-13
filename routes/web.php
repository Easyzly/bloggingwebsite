<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PagesController;
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
Route::get('/tailwind', function () {
    return view('tailwind');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Pages
Route::get('/findpage/{id}', [PagesController::class, 'findpage'])->name('page.find');
Route::get('/', [PagesController::class, 'homepage'])->name('page.home');
//Comment systeem
Route::post('/comment/store/{id}', [CommentController::class, 'store'])->name('comment.store');
Route::get('/comment/update/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::get('/comment/destroy/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
    //adminpage
    Route::get('/adminpage', [PagesController::class, 'adminpage'])->name('page.admin');
    //Edit forms
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    //Create forms
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    //Destroy forms
    Route::get('/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
});

require __DIR__.'/auth.php';
