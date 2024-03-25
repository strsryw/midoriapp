<?php

use App\Http\Controllers\admin\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// Route - Landing Page
// Route index landing page 
Route::get('/', function () {
    return view(
        'landingpage.index',
        ['hero' => 'index']
    );
});
// Route gallery landing page
Route::get('/gallery', function () {
    return view(
        'landingpage.gallery',
        ['hero' => 'Gallery']
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
});

// Route - admin gallery
Route::get('admin/gallery', function () {
    return view(
        'admin.gallery',
        ['title' => 'Gallery']
    );
});

Route::resource('/admin/gallery/ajax', GalleryController::class);
