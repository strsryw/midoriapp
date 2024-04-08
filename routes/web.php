<?php

use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\ArtikelController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\KontakKamiController;
use App\Http\Controllers\admin\OrganizationController;
use App\Http\Controllers\admin\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\landingpage\ArtikelController as LandingpageArtikelController;
use App\Http\Controllers\landingpage\BeritaController as LandingpageBeritaController;
use App\Http\Controllers\landingpage\GalleryController as galleryLandingPage;
use App\Http\Controllers\LandingPageController;

// Route - Landing Page
// Route index landing page 
Route::get('/', [LandingPageController::class, 'index']);

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

Route::get('/kontakkami', [LandingPageController::class, 'kontakkami']);
Route::post('/kontakkami/post', [LandingPageController::class, 'sendMessage'])->name('landingpage.kontakkami');
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

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::post('/berita/image/upload', [BeritaController::class, 'imageUpload'])->name('berita.imageUpload');

    Route::resource('/artikel', ArtikelController::class)->except(['show']);

    Route::resource('/organization', OrganizationController::class);
});

Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

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


Route::get('admin/kontakkami', function () {
    return view(
        'admin.kontakkami',
        ['title' => 'Kontak Kami']
    );
});
Route::get('/admin/kontakkami/ajax', [KontakKamiController::class, 'index'])->name('kontakkami.index');
