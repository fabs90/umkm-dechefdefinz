<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\kalkulatorController;
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
Route::get('/kue', [ReviewController::class, 'showMenuKue'])->name('landing.menuKue');
Route::get('/kue-kering', [ReviewController::class, 'showMenuKueKering'])->name('landing.menuKueKering');
Route::get('/nasi', [ReviewController::class, 'showMenuNasi'])->name('landing.menuNasi');

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

    // Bahan
    Route::get('/admin/bahan/tambah', [BahanController::class, 'createBahan'])->name('create-bahan');
    Route::post('/admin/bahan/store', [BahanController::class, 'storeBahan'])->name('create-bahan.store');
    Route::get('/admin/bahan', [AdminController::class, 'showUbahHargaBahan'])->name('harga-bahan');
    Route::patch('/admin/bahan/{nama_bahan}/baku', [BahanController::class, 'updateBahanBaku'])->name('harga-bahan-baku.update');
    Route::patch('/admin/bahan/{nama_bahan}/kemasan', [BahanController::class, 'updateBahanKemasan'])->name('harga-bahan-kemasan.update');
    Route::delete('/admin/bahan-baku/{nama_bahan}/delete', [BahanController::class, 'deleteBahanBaku'])->name('harga-bahan-baku.delete');
    Route::delete('/admin/bahan-kemasan/{nama_bahan}/delete', [BahanController::class, 'deleteBahanKemasan'])->name('harga-bahan-kemasan.delete');

    // Kalkulator
    Route::get("/admin/calculator/buttercake", [kalkulatorController::class, 'buttercake']);
    Route::post("/admin/calculator/buttercake/hp", [kalkulatorController::class, 'buttercakeHP'])->name('buttercake.hp');
    Route::get("/admin/calculator/kue-sus-vanilla", [kalkulatorController::class, 'kueSusVanilla']);
    Route::post("/admin/calculator/kue-sus-vanilla/hp", [kalkulatorController::class, 'kueSusVanillaHP'])->name('kueSusVanilla.hp');

});

Route::get('/landing', [ReviewController::class, 'showReview'])->name('review');
Route::post('/landing', [ReviewController::class, 'reviewController'])->name('review.post');
