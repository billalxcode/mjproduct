<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogGuestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/blog', [BlogGuestController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogGuestController::class, 'show'])->name('blog.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/dashboard')->group(function () {
    Route::prefix('blog')->group(function () {
        Route::get('', [BlogController::class, 'index'])->name('dashboard.blog');
        Route::get('new', [BlogController::class, 'create'])->name('dashboard.blog.create');
        Route::get('edit/{id}', [BlogController::class, 'edit'])->name('dashboard.blog.edit');
        Route::post('create', [BlogController::class, 'store'])->name('dashboard.blog.store');
        Route::post('update/{id}', [BlogController::class, 'update'])->name('dashboard.blog.update');
        Route::delete('destroy', [BlogController::class, 'destroy'])->name('dashboard.blog.destroy');
    });
    Route::prefix('category')->group(function () {
        Route::post('create', [CategoryController::class, 'store'])->name('dashboard.category.create');
    });
    Route::get('projects', [ProfileController::class, 'edit'])->name('dashboard.projects');
})->middleware(['auth' => 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
