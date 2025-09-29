<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            transition: all 0.3s;
        }
        .submenu {
            display: none;
        }
        .submenu.active {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar bg-gray-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <!-- Logo -->
            <div class="text-white flex items-center space-x-2 px-4">
                <i class="fas fa-utensils text-2xl"></i>
                <span class="text-2xl font-extrabold">iWaiter Admin</span>
            </div>

            <!-- Navigation -->
            <nav>
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>

                <!-- Content Management -->
                @canany(['homepage-view', 'homepage-edit', 'about-us-view', 'about-us-edit'])
                <div class="menu-group">
                    <div class="menu-header py-2.5 px-4 cursor-pointer hover:bg-gray-700 rounded flex justify-between items-center">
                        <span><i class="fas fa-file-alt mr-2"></i>Content Management</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <div class="submenu pl-6">
                        @can('homepage-view')
                        <a href="{{ route('admin.homepage') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Homepage</a>
                        @endcan
                        @can('about-us-view')
                        <a href="{{ route('admin.about') }}" class="block py-2 px-4 rounded hover:bg-gray-700">About Us</a>
                        @endcan
                        @can('features-view')
                        <a href="{{ route('admin.features') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Features</a>
                        @endcan
                        @can('services-view')
                        <a href="{{ route('admin.services') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Services</a>
                        @endcan
                    </div>
                </div>
                @endcanany

                <!-- Product Management -->
                @canany(['product-view', 'product-create', 'product-edit', 'product-delete'])
                <div class="menu-group">
                    <div class="menu-header py-2.5 px-4 cursor-pointer hover:bg-gray-700 rounded flex justify-between items-center">
                        <span><i class="fas fa-box mr-2"></i>Product Management</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <div class="submenu pl-6">
                        @can('product-view')
                        <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Product List</a>
                        @endcan
                        @can('product-create')
                        <a href="{{ route('admin.products.create') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Create Product</a>
                        @endcan
                    </div>
                </div>
                @endcanany

                <!-- Course Management -->
                @canany(['courses-view', 'courses-create', 'courses-edit', 'courses-delete'])
                <div class="menu-group">
                    <div class="menu-header py-2.5 px-4 cursor-pointer hover:bg-gray-700 rounded flex justify-between items-center">
                        <span><i class="fas fa-book mr-2"></i>Course Management</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <div class="submenu pl-6">
                        @can('courses-view')
                        <a href="{{ route('admin.courses.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Course List</a>
                        @endcan
                        @can('courses-create')
                        <a href="{{ route('admin.courses.create') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Create Course</a>
                        @endcan
                    </div>
                </div>
                @endcanany

                <!-- Testimonial Management -->
                @canany(['testimonials-view', 'testimonials-create', 'testimonials-edit', 'testimonials-delete'])
                <div class="menu-group">
                    <div class="menu-header py-2.5 px-4 cursor-pointer hover:bg-gray-700 rounded flex justify-between items-center">
                        <span><i class="fas fa-star mr-2"></i>Testimonials</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <div class="submenu pl-6">
                        @can('testimonials-view')
                        <a href="{{ route('admin.testimonials.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Testimonial List</a>
                        @endcan
                        @can('testimonials-create')
                        <a href="{{ route('admin.testimonials.create') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Add Testimonial</a>
                        @endcan
                    </div>
                </div>
                @endcanany

                <!-- User Management (Super Admin only) -->
                @canany(['users-view', 'roles-view'])
                <div class="menu-group">
                    <div class="menu-header py-2.5 px-4 cursor-pointer hover:bg-gray-700 rounded flex justify-between items-center">
                        <span><i class="fas fa-users-cog mr-2"></i>System</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    <div class="submenu pl-6">
                        @can('users-view')
                        <a href="{{ route('users.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">User Management</a>
                        @endcan
                        @can('roles-view')
                        <a href="{{ route('roles.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Role Management</a>
                        @endcan
                    </div>
                </div>
                @endcanany
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <button id="sidebarToggle" class="md:hidden text-gray-600">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h1 class="text-2xl font-semibold text-gray-800 ml-4">@yield('title', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">Welcome, {{ auth()->user()->name }}</span>
                        <div class="relative">
                            <button id="userMenu" class="flex items-center space-x-2 text-gray-700">
                                <i class="fas fa-user-circle text-2xl"></i>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('-translate-x-full');
        });

        // Menu dropdown functionality
        document.querySelectorAll('.menu-header').forEach(header => {
            header.addEventListener('click', function() {
                const submenu = this.nextElementSibling;
                const icon = this.querySelector('.fa-chevron-down');
                
                submenu.classList.toggle('active');
                icon.classList.toggle('fa-rotate-180');
            });
        });

        // User dropdown
        document.getElementById('userMenu').addEventListener('click', function() {
            document.getElementById('userDropdown').classList.toggle('hidden');
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('#userMenu')) {
                document.getElementById('userDropdown').classList.add('hidden');
            }
        });
    </script>
</body>
</html>