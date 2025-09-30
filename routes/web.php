<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Course;


use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomepageController;

use App\Http\Controllers\Admin\FeatureController;

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('features', FeatureController::class)
        ->names([
            'index' => 'admin.features.index',
            'create' => 'admin.features.create',
            'store' => 'admin.features.store',
            'edit' => 'admin.features.edit',
            'update' => 'admin.features.update',
            'destroy' => 'admin.features.destroy',
        ]);
});




// Admin routes, all routes behind auth middleware
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
   
    'admin.services.index' => 'Services',
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

Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'can:team-manage'])
    ->group(function () {
        Route::get('/team', [TeamMemberController::class, 'index'])->name('team.index'); // show table
        Route::put('/team/{id}', [TeamMemberController::class, 'update'])->name('team.update'); // update member
    });



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