<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
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

Route::get('/',[ProductController::class,'index'])->name('home');


Route::get('/products/create', [ProductController::class, 'create'])->middleware('can:create, App\Models\Product')->name('create');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('show');
Route::get('/products', [ProductController::class, 'index'])->name('index');
Route::post('/products', [ProductController::class, 'store'])->name('store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
