<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BinController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Help route
    Route::get('/help', function () {
        return view('help');
    })->name('help');
    
    // User routes (view only)
    Route::get('/bins', [BinController::class, 'index'])->name('bins.index');
    Route::get('/bins/view/{bin}', [BinController::class, 'show'])->name('bins.show');
    
    Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
    Route::get('/locations/view/{location}', [LocationController::class, 'show'])->name('locations.show');
    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    
    Route::get('messages/list', [MessageController::class, 'list'])->name('messages.list');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/view/{message}', [MessageController::class, 'show'])->name('messages.show');
     
    // Admin only routes
    Route::middleware(['role:admin'])->group(function () {
        // Bins
        Route::get('/bins/create', [BinController::class, 'create'])->name('bins.create');
        Route::post('/bins', [BinController::class, 'store'])->name('bins.store');
        Route::get('/bins/edit/{bin}', [BinController::class, 'edit'])->name('bins.edit');
        Route::put('/bins/{bin}', [BinController::class, 'update'])->name('bins.update');
        Route::delete('/bins/{bin}', [BinController::class, 'destroy'])->name('bins.destroy');
        
        // Locations
        Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
        Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
        Route::get('/locations/edit/{location}', [LocationController::class, 'edit'])->name('locations.edit');
        Route::put('/locations/{location}', [LocationController::class, 'update'])->name('locations.update');
        Route::delete('/locations/{location}', [LocationController::class, 'destroy'])->name('locations.destroy');
        
        // Users
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::post('/users/{user}/approve', [UserController::class, 'approve'])->name('users.approve');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

        // Messages
        Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
        Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
        Route::get('/messages/edit/{message}', [MessageController::class, 'edit'])->name('messages.edit');
        Route::put('/messages/{message}', [MessageController::class, 'update'])->name('messages.update');
        Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
        
        // Settings
        Route::resource('settings', SettingsController::class);
    });
});



// Password Reset Routes
Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');

});


// Logout route
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');
