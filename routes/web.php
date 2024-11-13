<?php

use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'index'])->name('main');

Route::get('/ekz/stud', [IndexController::class, 'ekzstud'])->name('ekzstud');
Route::get('/ekz/pred', [IndexController::class, 'ekzpred'])->name('ekzpred');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/add', [IndexController::class, 'create'])->name('create');
    Route::post('/add', [IndexController::class, 'store'])->name('store');

    Route::get('/edit/{ekz}', [IndexController::class, 'edit'])->name('edit');
    Route::post('/edit/{ekz}', [IndexController::class, 'update'])->name('update');

    Route::delete('/delete/{ekz}', [IndexController::class, 'destroy'])->name('delete');
});

require __DIR__.'/auth.php';
