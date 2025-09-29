<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    
                    <!-- Website Navigation for All Users -->
                    <x-nav-link href="/" :active="request()->is('/')">
                        {{ __('Home') }}
                    </x-nav-link>
                    
                    <x-nav-link href="/about" :active="request()->is('about')">
                        {{ __('About') }}
                    </x-nav-link>
                    
                    <x-nav-link href="/features" :active="request()->is('features')">
                        {{ __('Features') }}
                    </x-nav-link>
                    
                    <x-nav-link href="/services" :active="request()->is('services')">
                        {{ __('Services') }}
                    </x-nav-link>
                    
                    <x-nav-link href="/contact" :active="request()->is('contact')">
                        {{ __('Contact') }}
                    </x-nav-link>

                    <!-- Admin Dashboard Link (Only for authorized users) -->
                    @can('dashboard-view')
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->is('admin*')">
                        <div class="flex items-center">
                            <i class="fas fa-cog mr-1 text-sm"></i>
                            {{ __('Admin Panel') }}
                        </div>
                    </x-nav-link>
                    @endcan

                    <!-- Quick Admin Links for Super Admin -->
                    @canany(['users-view', 'roles-view'])
                    <div class="relative group">
                        <x-nav-link href="#" :active="request()->is('users*') || request()->is('roles*')">
                            <div class="flex items-center">
                                <i class="fas fa-users-cog mr-1 text-sm"></i>
                                {{ __('Management') }}
                                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </x-nav-link>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            @can('users-view')
                            <a href="{{ route('users.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ request()->is('users*') ? 'bg-gray-100' : '' }}">
                                <i class="fas fa-users mr-2 text-xs"></i>User Management
                            </a>
                            @endcan
                            @can('roles-view')
                            <a href="{{ route('roles.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ request()->is('roles*') ? 'bg-gray-100' : '' }}">
                                <i class="fas fa-user-tag mr-2 text-xs"></i>Role Management
                            </a>
                            @endcan
                        </div>
                    </div>
                    @endcanany
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- User Role Badge -->
                @auth
                <span class="mr-3 px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                    {{ Auth::user()->getRoleNames()->first() ?: 'User' }}
                </span>
                @endauth

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="flex items-center">
                                <i class="fas fa-user-circle mr-2 text-lg"></i>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- User Info -->
                        <div class="px-4 py-2 border-b border-gray-100">
                            <div class="font-medium text-gray-900">{{ Auth::user()->name }}</div>
                            <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            <div class="text-xs text-blue-600 mt-1">
                                Role: {{ Auth::user()->getRoleNames()->first() ?: 'User' }}
                            </div>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fas fa-user-edit mr-2"></i>{{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Admin Dashboard Link in Dropdown -->
                        @can('dashboard-view')
                        <x-dropdown-link :href="route('admin.dashboard')">
                            <i class="fas fa-tachometer-alt mr-2"></i>{{ __('Admin Dashboard') }}
                        </x-dropdown-link>
                        @endcan

                        <!-- Quick Admin Links -->
                        @can('users-view')
                        <x-dropdown-link :href="route('users.index')">
                            <i class="fas fa-users mr-2"></i>{{ __('User Management') }}
                        </x-dropdown-link>
                        @endcan

                        @can('roles-view')
                        <x-dropdown-link :href="route('roles.index')">
                            <i class="fas fa-user-tag mr-2"></i>{{ __('Role Management') }}
                        </x-dropdown-link>
                        @endcan

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            <!-- Website Navigation -->
            <x-responsive-nav-link href="/" :active="request()->is('/')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="/about" :active="request()->is('about')">
                {{ __('About') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="/features" :active="request()->is('features')">
                {{ __('Features') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="/services" :active="request()->is('services')">
                {{ __('Services') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="/contact" :active="request()->is('contact')">
                {{ __('Contact') }}
            </x-responsive-nav-link>

            <!-- Admin Links for Mobile -->
            @can('dashboard-view')
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->is('admin*')">
                <i class="fas fa-cog mr-2"></i>{{ __('Admin Panel') }}
            </x-responsive-nav-link>
            @endcan

            @can('users-view')
            <x-responsive-nav-link :href="route('users.index')" :active="request()->is('users*')">
                <i class="fas fa-users mr-2"></i>{{ __('User Management') }}
            </x-responsive-nav-link>
            @endcan

            @can('roles-view')
            <x-responsive-nav-link :href="route('roles.index')" :active="request()->is('roles*')">
                <i class="fas fa-user-tag mr-2"></i>{{ __('Role Management') }}
            </x-responsive-nav-link>
            @endcan
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                <div class="text-xs text-blue-600 mt-1">
                    Role: {{ Auth::user()->getRoleNames()->first() ?: 'User' }}
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    <i class="fas fa-user-edit mr-2"></i>{{ __('Profile') }}
                </x-responsive-nav-link>

                @can('dashboard-view')
                <x-responsive-nav-link :href="route('admin.dashboard')">
                    <i class="fas fa-tachometer-alt mr-2"></i>{{ __('Admin Dashboard') }}
                </x-responsive-nav-link>
                @endcan

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    .group:hover .group-hover\:visible {
        visibility: visible;
    }
    .group:hover .group-hover\:opacity-100 {
        opacity: 1;
    }
</style>