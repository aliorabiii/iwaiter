<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
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
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @can('dashboard-view')
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->is('admin*')">
                        <i class="fas fa-cog mr-1 text-sm"></i>{{ __('Admin Panel') }}
                    </x-nav-link>
                    @endcan

                    @can('users-view')
                    <x-nav-link :href="route('admin.team.index')" :active="request()->is('admin/team*')">
                        <i class="fas fa-user-friends mr-1 text-sm"></i>{{ __('Our Experts') }}
                    </x-nav-link>
                    @endcan

                    @can('services-view')
                    <x-nav-link :href="route('admin.services.index')" :active="request()->is('admin/services*')">
                        <i class="fas fa-concierge-bell mr-1 text-sm"></i>{{ __('Services') }}
                    </x-nav-link>
                    @endcan

                    @can('courses-view')
                    <x-nav-link :href="route('admin.courses.index')" :active="request()->is('admin/courses*')">
                        <i class="fas fa-graduation-cap mr-1 text-sm"></i>{{ __('Courses') }}
                    </x-nav-link>
                    @endcan

      


                    @can('expected-edit')
                    <x-nav-link :href="route('admin.staff.index')" :active="request()->is('admin/staff*')">
                        <i class="fas fa-calendar-alt mr-1 text-sm"></i>{{ __('Staff Scheduling') }}
                    </x-nav-link>
                    @endcan

                    @can('active-edge')
                    <x-nav-link :href="route('admin.clients.index')" :active="request()->is('admin/clients*')">
                        <i class="fas fa-handshake mr-1 text-sm"></i>{{ __('Clients') }}
                    </x-nav-link>
                    @endcan
                </div>
            </div>

            <!-- User Dropdown -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center">
                        {{ Auth::user()->name }}
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    @if(Auth::user()->hasRole('Super Admin'))
                        <div class="border-t border-gray-200"></div>
                        <x-dropdown-link :href="route('users.index')">{{ __('Manage Users') }}</x-dropdown-link>
                        <x-dropdown-link :href="route('users.create')">{{ __('Create User') }}</x-dropdown-link>
                        <x-dropdown-link :href="route('roles.index')">{{ __('Manage Roles') }}</x-dropdown-link>
                        <x-dropdown-link :href="route('roles.create')">{{ __('Create Role') }}</x-dropdown-link>
                    @endif

                    <div class="border-t border-gray-200"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>

            <!-- Hamburger for Mobile -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')">{{ __('Dashboard') }}</x-responsive-nav-link>
            @can('dashboard-view')
            <x-responsive-nav-link :href="route('admin.dashboard')">{{ __('Admin Panel') }}</x-responsive-nav-link>
            @endcan
            @can('users-view')
            <x-responsive-nav-link :href="route('admin.team.index')">{{ __('Our Experts') }}</x-responsive-nav-link>
            @endcan
            @can('services-view')
            <x-responsive-nav-link :href="route('admin.services.index')">{{ __('Services') }}</x-responsive-nav-link>
            @endcan
            @can('courses-view')
            <x-responsive-nav-link :href="route('admin.courses.index')">{{ __('Courses') }}</x-responsive-nav-link>
            @endcan
            
            @can('expected-edit')
            <x-responsive-nav-link :href="route('admin.staff.index')">{{ __('Staff Scheduling') }}</x-responsive-nav-link>
            @endcan
            @can('active-edge')
            <x-responsive-nav-link :href="route('admin.clients.index')">{{ __('Clients') }}</x-responsive-nav-link>
            @endcan

            <!-- Super Admin Management -->
            @can('super-admin')
                <div class="border-t border-gray-200 mt-2"></div>
                <div class="px-4 py-2 text-xs text-gray-400">Management</div>
                <x-responsive-nav-link :href="route('users.index')">Manage Users</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('users.create')">Create User</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('roles.index')">Manage Roles</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('roles.create')">Create Role</x-responsive-nav-link>
            @endcan

            <!-- Logout -->
            <div class="border-t border-gray-200 mt-2"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Logout') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
