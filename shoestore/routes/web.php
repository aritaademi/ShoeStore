<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShoeController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {  // /dashboard: responds to the dashboard URL
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//auth: Ensures the user is authenticated, verified: Ensures the user's email is verified 
//name('dashboard'): Assigns the name dashboard to this route. This allows you to reference it using route('dashboard') in views or controllers.

//Route::middleware('auth') method groups routes that require authentication.
//All routes inside this group will only be accessible to logged-in users.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/shoes', ShoeController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    //ensures the user is authenticated before accessing /dashboard.
});

require __DIR__.'/auth.php';
