<?php

use App\Http\Controllers\Admin\BusinessImageController; 
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/rzf', '/');
Route::get('/', [WelcomeController::class, 'index'])->name('landing');

// ========== CONTACT ROUTE ==========
Route::post('/contact/send', [WelcomeController::class, 'sendMessage'])->name('contact.send'); 

// Auth routes - guest only
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Auth protected routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('services', ServicesController::class);
        Route::resource('portfolios', PortfolioController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('messages', MessageController::class);
        Route::resource('testimonials', TestimonialController::class); 
        Route::resource('sliders', SliderController::class);
        Route::resource('users', UserController::class);
        Route::resource('business-images', BusinessImageController::class);  
        
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});