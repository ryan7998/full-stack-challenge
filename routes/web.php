<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PostController as FrontendPostController;
use App\Http\Controllers\CompanyController as FrontendCompanyController;

// Admin Routes
Route::middleware(['auth', 'can:isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('posts', PostController::class);
});

// Frontend Routes
// Route::get('/', [FrontendPostController::class, 'index'])->name('posts.index');
// Route::get('/posts/{post}', [FrontendPostController::class, 'show'])->name('posts.show');
// Route::get('/bookmarks', [FrontendPostController::class, 'bookmarks'])->name('posts.bookmarks');
