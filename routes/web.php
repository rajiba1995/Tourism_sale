<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\HotelCategoryController;

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
        

        Route::get('/employee', [EmployeeController::class, 'index'])->name('admin.employee');
        Route::get('/employee/create', [EmployeeController::class, 'create'])->name('admin.employee.create');
        Route::post('/employee/store', [EmployeeController::class, 'store'])->name('admin.employee.store');
        Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
        Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('admin.employee.update');
        Route::get('/employee/destroy/{id}', [EmployeeController::class, 'destroy'])->name('admin.employee.destroy');


        Route::get('/hotelCategory', [HotelCategoryController::class, 'index'])->name('admin.hotelCategory');
        Route::get('/hotelCategory/create', [HotelCategoryController::class, 'create'])->name('admin.hotelCategory.create');
        Route::post('/hotelCategory/store', [HotelCategoryController::class, 'store'])->name('admin.hotelCategory.store');
        
        Route::get('/hotelCategory/edit/{id}', [HotelCategoryController::class, 'edit'])->name('admin.hotelCategory.edit');
        Route::put('/hotelCategory/update/{id}', [HotelCategoryController::class, 'update'])->name('admin.hotelCategory.update');
        Route::get('/hotelCategory/destroy/{id}', [HotelCategoryController::class, 'destroy'])->name('admin.hotelCategory.destroy');
        // Route::get('/dashboard', function () {
        //     return view('admin.dashboard'); // Admin dashboard view
        // })->name('admin.dashboard');
    });
});
