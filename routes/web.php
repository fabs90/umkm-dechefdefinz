<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', [ReviewController::class, 'showReview'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('onlyGuest');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::get('/login/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('adminPage')->middleware('isLogin');

Route::get('/landing', [ReviewController::class, 'showReview'])->name('review');
Route::post('/landing', [ReviewController::class, 'reviewController'])->name('review.post');
