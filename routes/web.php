<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DesignationController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    
    // Protecting the admin dashboard with middleware
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/designation', [DesignationController::class, 'index'])->name('admin.designation');
        Route::get('/designation/create', [DesignationController::class, 'create'])->name('admin.designation.create');
        Route::post('/designation/store', [DesignationController::class, 'store'])->name('admin.designation.store');
        Route::get('/designation/edit/{id}', [DesignationController::class, 'edit'])->name('admin.designation.edit');
        Route::put('/designation/update/{id}', [DesignationController::class, 'update'])->name('admin.designation.update');
        Route::get('/designation/delete/{id}', [DesignationController::class, 'destroy'])->name('admin.designation.delete');
        

        // Route::get('/dashboard', function () {
        //     return view('admin.dashboard'); // Admin dashboard view
        // })->name('admin.dashboard');
    });
});
