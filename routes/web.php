<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard
   

    // Page Management Routes
    Route::get('/homepage', function () {
        return view('admin.homepage.index');
    })->name('homepage')->middleware('can:homepage-view');

    Route::get('/about', function () {
        return view('admin.about.index');
    })->name('about')->middleware('can:about-us-view');

    Route::get('/contact', function () {
        return view('admin.contact.index');
    })->name('contact')->middleware('can:contact-page-view');

    Route::get('/features', function () {
        return view('admin.features.index');
    })->name('features')->middleware('can:features-view');

    Route::get('/services', function () {
        return view('admin.services.index');
    })->name('services')->middleware('can:services-view');

    // Settings (if you want it)
    Route::get('/settings', function () {
        return view('admin.settings.index');
    })->name('settings')->middleware('can:settings-view');
});
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/features', function () {
    return view('features');
})->name('features');

Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');

Route::get('/services', function () {
    return view('services');
})->name('services');


// Admin Dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware(['auth', 'verified', 'can:dashboard-view']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Role management routes (only for Super Admin)
    Route::middleware('role:Super Admin')->group(function () {
        Route::resource('roles', RoleController::class);
    });

    // User management routes (for Super Admin and Admin)
    Route::middleware('role:Super Admin|Admin')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});

require __DIR__.'/auth.php';