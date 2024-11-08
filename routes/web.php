<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuAdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Dashboard Route
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    $user = Auth::user();
    if ($user && $user->role === 'admin') {
        return Inertia::render('DashboardView');
    }
    return redirect()->route('landing')->with('error', 'Unauthorized access.');
})->name('dashboard');

// Menu Admin Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/menu-admin', [MenuAdminController::class, 'index'])->name('menu-admin.index');
    Route::post('/menu-admin', function () {
        $user = Auth::user();
        if ($user && $user->role === 'admin') {
            return app(MenuAdminController::class)->store(request()); // Your store logic
        }
        return redirect()->route('landing')->with('error', 'Unauthorized access.');
    })->name('menu-admin.store');

      // Modify this route to use the MenuItem model
      Route::post('/menu-admin/{menuItem}', function (\App\Models\MenuItem $menuItem) {
        $user = Auth::user();
        if ($user && $user->role === 'admin') {
            return app(MenuAdminController::class)->update(request(), $menuItem); // Your update logic
        }
        return redirect()->route('landing')->with('error', 'Unauthorized access.');
    })->name('menu-admin.update');

    Route::delete('/menu-admin/{menuItem}', function (\App\Models\MenuItem $menuItem) {
        $user = Auth::user();
        if ($user && $user->role === 'admin') {
            return app(MenuAdminController::class)->destroy($menuItem); // Your destroy logic
        }
        return redirect()->route('landing')->with('error', 'Unauthorized access.');
    })->name('menu-admin.destroy');
});

// Landing Route
Route::get('/', function () {
    return Inertia::render('HomeView');
})->name('landing');

// routes/web.php
Route::get('/api/auth/status', function () {
    return response()->json(['isLoggedIn' => auth()->check()]);
});


// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Contact Route
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Menu Route
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

// Menu Route
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');

//Kelola Order Route
Route::get('/order', [OrderController::class, 'index'])->name('order');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include Auth Routes
require __DIR__.'/auth.php';
