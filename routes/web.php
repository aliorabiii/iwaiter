<?php


use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Course;

use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomepageController;

use Spatie\Permission\Middlewares\PermissionMiddleware;
use Spatie\Permission\Middlewares\Permission;
use App\Http\Controllers\Admin\ServiceController;


Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

// Public services page
Route::get('/services', function () {
    $services = \App\Models\Service::where('is_active', true)->orderBy('order')->get();
    return view('services', compact('services'));
})->name('services');

// Admin services management
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::resource('services', ServiceController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('team-members', TeamMemberController::class, [
        'names' => [
            'index' => 'team.index',
            'create' => 'team.create',
            'store' => 'team.store',
            'edit' => 'team.edit',
            'update' => 'team.update',
            'destroy' => 'team.destroy',
        ]
    ]);
});

 

// ✅ PUBLIC FEATURES PAGE (accessible to everyone - must come FIRST)
Route::get('/features', function () {
    $features = \App\Models\Feature::all();
    return view('features', compact('features'));
})->name('features');

// ✅ ADMIN FEATURES MANAGEMENT (requires authentication)
Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(function () {
        Route::get('/features', [FeatureController::class, 'index'])->name('features.index');
        Route::get('/features/create', [FeatureController::class, 'create'])->name('features.create');
        Route::post('/features', [FeatureController::class, 'store'])->name('features.store');
        Route::get('/features/{feature}/edit', [FeatureController::class, 'edit'])->name('features.edit');
        Route::put('/features/{feature}', [FeatureController::class, 'update'])->name('features.update');
        Route::delete('/features/{feature}', [FeatureController::class, 'destroy'])->name('features.destroy');
    });
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {

    // Courses management
    Route::resource('courses', CourseController::class);

    // Homepage management
    Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage');
    Route::post('/homepage/update', [HomepageController::class, 'update'])->name('homepage.update');
    Route::post('/homepage/store', [HomepageController::class, 'store'])->name('homepage.store');
    Route::delete('/homepage/{course}', [HomepageController::class, 'destroy'])->name('homepage.destroy');

    // You can add other admin routes here (team members, features, etc.)
});

Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
Route::post('/admin/courses', [CourseController::class, 'store'])->name('admin.courses.store');




// routes/web.php

$placeholderPages = [
   
    
    'admin.courses.index' => 'Courses',
    'admin.staff.index' => 'Staff Scheduling',
    'admin.menu.index' => 'Menu Management',
    'admin.feedback.index' => 'Customer Feedback',
    'admin.analytics.index' => 'Analytics Dashboard',
    'admin.clients.index' => 'Our Valued Clients',
];

foreach ($placeholderPages as $route => $title) {
    Route::get('/'.str_replace('.', '/', $route), function() use ($title) {
        return view('admin.placeholder', ['title' => $title]);
    })->name($route);
}

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

 
    /* Route::get('/services', function () {
        return view('admin.services.index');
    })->name('services')->middleware('can:services-view'); */

    // Settings (if you want it)
    Route::get('/settings', function () {
        return view('admin.settings.index');
    })->name('settings')->middleware('can:settings-view');
});


// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// });





Route::get('/', function () {
    $courses = Course::all(); // fetch all courses
    return view('home', compact('courses')); // pass them to the view
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



Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');

Route::get('/services', function () {
    $services = \App\Models\Service::where('is_active', true)->orderBy('order')->get();
    return view('services', compact('services'));
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