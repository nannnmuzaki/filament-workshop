<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/buku/{id}', [HomeController::class, 'show'])->name('detail');
Route::get('/search', [HomeController::class, 'search'])->name('search');


Route::get('/fitur', function () {
    return view('feature');
})->name('feature');