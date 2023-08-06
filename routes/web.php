<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
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

Route::middleware(['isLogin'])->group(function () {
    Route::get('/admin', [MenuController::class, 'index'])->name('adminPage');
    Route::get('/admin/tambah', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/admin/tambah', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/admin/kueloyang/{slug}', [MenuController::class, 'showKueLoyang'])->name('menu.showKueLoyang');
    Route::get('/admin/kuekering/{slug}', [MenuController::class, 'showKueKering'])->name('menu.showKueKering');
    Route::get('/admin/menunasi/{slug}', [MenuController::class, 'showMenuNasi'])->name('menu.showMenuNasi');
    Route::patch('/admin/kueloyang/update/{slug}', [MenuController::class, 'updateKueLoyang'])->name('menu.prosesUpdateKueLoyang');
    Route::patch('/admin/kuekering/update/{slug}', [MenuController::class, 'updateKueKering'])->name('menu.prosesUpdateKueKering');
    Route::patch('/admin/menunasi/update/{slug}', [MenuController::class, 'updateMenuNasi'])->name('menu.prosesUpdateMenuNasi');
    Route::delete('/admin/deleteNasi/{slug}', [MenuController::class, 'hapusMenuNasi'])->name('menu.hapusMenuNasi');
    Route::delete('/admin/deleteKueLoyang/{slug}', [MenuController::class, 'hapusMenuKueLoyang'])->name('menu.hapusMenuKueLoyang');
    Route::delete('/admin/deleteKueKering/{slug}', [MenuController::class, 'hapusMenuKuekering'])->name('menu.hapusMenuKueKering');
});

Route::get('/landing', [ReviewController::class, 'showReview'])->name('review');
Route::post('/landing', [ReviewController::class, 'reviewController'])->name('review.post');
