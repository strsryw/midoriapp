<?php

use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritasController;
use App\Http\Controllers\landingpage\GalleryController as galleryLandingPage;

// Route - Landing Page
// Route index landing page 
Route::get('/', function () {
    return view(
        'landingpage.index',
        ['hero' => 'index']
    );
});

// Route gallery landing page
Route::get('/berita', function () {
    return view(
        'landingpage.berita',
        ['hero' => 'Berita']
    );
});
Route::get('/artikel', function () {
    return view(
        'landingpage.artikel',
        ['hero' => 'Artikel']
    );
});
Route::get('/gallery', [galleryLandingPage::class, 'index'])->name('landingpage.gallery');

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
    // Route::resource('/berita', BeritaController::class);

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::post('/berita/image/upload', [BeritaController::class, 'imageUpload'])->name('berita.imageUpload');
});


Route::get('admin/artikel', function () {
    return view(
        'admin.artikel',
        ['title' => 'Artikel']
    );
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
