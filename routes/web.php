<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MediaController;
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

//Pages
Route::get('/blogs', [PagesController::class, 'blogs'])->name('page.blog');
Route::get('/media', [PagesController::class, 'media'])->name('page.media');
Route::get('/projecten', [PagesController::class, 'projects'])->name('page.project');
Route::get('/findpage/{id}', [PagesController::class, 'findpage'])->name('page.find');
Route::get('/', [PagesController::class, 'homepage'])->name('page.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    //adminpage
    Route::get('/media/{id}', [PagesController::class, 'show'])->name('media.show');
    Route::get('/create', [PagesController::class, 'create'])->name('page.create');
    Route::get('/remove', [PagesController::class, 'destroy'])->name('page.destroy');
    //Edit forms
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/project/update/{id}', [ProjectController::class, 'update'])->name('project.update');
    //Create forms
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::post('/media/store', [MediaController::class, 'store'])->name('media.store');
    Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
    //Destroy forms
    Route::get('/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::get('/project/destroy/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::get('/media/destroy/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
});

require __DIR__.'/auth.php';
