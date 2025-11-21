<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BsoController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profile Routes
Route::prefix('profil')->name('profile.')->group(function () {
    Route::get('/sejarah', [ProfileController::class, 'sejarah'])->name('sejarah');
    Route::get('/visi-misi', [ProfileController::class, 'visiMisi'])->name('visi-misi');
    Route::get('/struktur-organisasi', [ProfileController::class, 'struktur'])->name('struktur');
});

// Department Routes
Route::prefix('departemen')->name('departments.')->group(function () {
    Route::get('/', [DepartmentController::class, 'index'])->name('index');
    Route::get('/{department:slug}', [DepartmentController::class, 'show'])->name('show');
    Route::get('/{department:slug}/program/{program}', [DepartmentController::class, 'showProgram'])->name('program.show');
});

// News Routes
Route::prefix('berita')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{news:slug}', [NewsController::class, 'show'])->name('show');
});

// Event Routes
Route::prefix('event')->name('events.')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('/{event:slug}', [EventController::class, 'show'])->name('show');
});

// Gallery Routes
Route::prefix('galeri')->name('gallery.')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
    Route::get('/{gallery:slug}', [GalleryController::class, 'show'])->name('show');
});

// BSO Routes
Route::prefix('bso')->name('bso.')->group(function () {
    Route::get('/{bso:slug}', [BsoController::class, 'show'])->name('show');
});

// Contact Routes
Route::prefix('kontak')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/', [ContactController::class, 'store'])->name('store');
});
