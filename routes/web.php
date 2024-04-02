<?php

use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\ArtikelController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritasController;
use App\Http\Controllers\landingpage\ArtikelController as LandingpageArtikelController;
use App\Http\Controllers\landingpage\BeritaController as LandingpageBeritaController;
use App\Http\Controllers\landingpage\GalleryController as galleryLandingPage;

// Route - Landing Page
// Route index landing page 
Route::get('/', function () {
    return view(
        'landingpage.index',
        ['hero' => 'index']
    );
});

Route::get('/profil', function () {
    return view(
        'landingpage.profil',
        ['hero' => 'Profil LPK']
    );
});

// Route gallery landing page
Route::get('/berita', [LandingpageBeritaController::class, 'index']);
Route::get('/berita/{id}', [LandingpageBeritaController::class, 'singlePage']);

//routing artikel

Route::get('/artikel', [LandingpageArtikelController::class, 'index']);
Route::get('/artikel/{id}', [LandingpageArtikelController::class, 'singlePage']);

Route::get('/gallery', [galleryLandingPage::class, 'index'])->name('landingpage.gallery');

Route::get('/kontakkami', function () {
    return view(
        'landingpage.kontakkami',
        ['hero' => 'Kontak Kami']
    );
});
// Route - Login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authentication']);
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route - Admin
Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('/setting', SettingController::class);
    //Route backend berita

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::post('/berita/image/upload', [BeritaController::class, 'imageUpload'])->name('berita.imageUpload');

    Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
    Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::post('/artikel/image/upload', [ArtikelController::class, 'imageUpload'])->name('artikel.imageUpload');
});

// Route - admin gallery
Route::get('admin/gallery', function () {
    return view(
        'admin.gallery',
        ['title' => 'Gallery']
    );
});

// Route backend gallery
Route::resource('/admin/gallery/ajax', GalleryController::class);
Route::post('/admin/gallery/update', [GalleryController::class, 'updateGallery']);
