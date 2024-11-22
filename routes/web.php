<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuAdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\EnsureUserRole;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Dashboard Route
Route::middleware(['auth', 'verified', EnsureUserRole::class.':admin'])->get('/dashboard', function () {
    $user = Auth::user();
    if ($user && $user->role === 'admin') {
        $totalIncome = Order::where('status', 'Pesanan Selesai')
        ->groupBy('status')
        ->select('status', DB::raw('SUM(total_price) as total_price_sum'))
        ->first();
        $totalOrder = Order::where('status', 'Pesanan Selesai')->count();
        $recentOrder = Order::join('users', 'order.user_id', '=', 'users.id')->get(['order.id', 'users.name', 'order.status', 'order.total_price', 'order.created_at'])->toArray();
        return Inertia::render('DashboardView', [
            'income' => $totalIncome->total_price_sum,
            'order' => $totalOrder,
            'recentOrder' => $recentOrder
        ]);
    }
    return redirect()->route('landing')->with('error', 'Unauthorized access.');
})->name('dashboard');

// Menu Admin Routes
Route::middleware(['auth', 'verified', EnsureUserRole::class.':admin'])->group(function () {
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

    Route::post('/edit-order', [OrderController::class, 'editOrder'])->name('admin.order.edit');
    Route::post('/delete-order', [OrderController::class, 'deleteOrder'])->name('admin.order.delete');
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

// Book Route
Route::post('/book', [BookController::class, 'index'])->name('book')->middleware(EnsureUserRole::class.':user');

// Order History Route
Route::get('/order-history', [OrderHistoryController::class, 'index'])->name('order-history')->middleware(EnsureUserRole::class.':user');

//Kelola Order Route
Route::get('/order', [OrderController::class, 'index'])->name('order')->middleware(EnsureUserRole::class.':admin');
Route::post('/order', [BookController::class, 'store'])->name('user.order.book')->middleware(EnsureUserRole::class.':user');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include Auth Routes
require __DIR__.'/auth.php';
