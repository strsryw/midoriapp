<?php

use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\ArtikelController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\KontakKamiController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SocialMediaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;

// Route - Landing Page
Route::name('landing-page.')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('index');
    Route::get('/profil', [LandingPageController::class, 'profile'])->name('profile');
    Route::get('/berita', [LandingPageController::class, 'news'])->name('berita');
    Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('detail-berita');
    Route::get('/artikel', [LandingPageController::class, 'article'])->name('artikel');
    Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('detail-artikel');
    Route::get('/galeri', [LandingPageController::class, 'gallery'])->name('galeri');
    Route::get('/kontak-kami', [LandingPageController::class, 'contactUs'])->name('kontak-kami');
    Route::post('/kontak-kami', [LandingPageController::class, 'sendMessage']);
});

// Route - Login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authentication']);
});

// Route - Admin
Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/setting', SettingController::class);
    Route::resource('/social_media', SocialMediaController::class);
    Route::resource('/berita', BeritaController::class)->except(['show']);
    Route::resource('/artikel', ArtikelController::class)->except(['show']);
    Route::resource('/galeri', GalleryController::class)->except(['show']);
    Route::get('/kontak-kami', KontakKamiController::class)->name('kontak-kami');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
