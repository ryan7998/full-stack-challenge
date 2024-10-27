<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CompanyController as AdminCompanyController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
use App\Http\Controllers\Frontend\CompanyController as FrontendCompanyController;

// Admin Routes
// Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
//     Route::resource('companies', CompanyController::class);
//     Route::resource('posts', PostController::class);
// });
Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Posts CRUD
        Route::resource('posts', AdminPostController::class);

        // Companies CRUD
        Route::resource('companies', AdminCompanyController::class);
    });
// Frontend Routes
// Home Route - Display latest job posts
Route::get('/', [FrontendPostController::class, 'index'])->name('posts.index');

// View Single Job Post
Route::get('/posts/{post}', [FrontendPostController::class, 'show'])->name('posts.show');

// Browse Companies (Optional: If you want users to view companies)
Route::get('/companies', [FrontendCompanyController::class, 'index'])->name('frontend.companies.index');
Route::get('/companies/{company}', [FrontendCompanyController::class, 'show'])->name('frontend.companies.show');

// Additional Frontend Routes (e.g., Filtering)
Route::get('/search', [FrontendPostController::class, 'search'])->name('posts.search');
