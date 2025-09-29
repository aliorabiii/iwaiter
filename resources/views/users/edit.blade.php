@extends('layouts.app')

@section('title', 'Edit User')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit User: {{ $user->name }}
    </h2>
@endsection

@section('content')
<div class="py-8">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6">
                        <!-- Basic Information -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ $user->email }}" 
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                        </div>

                        <!-- Role Assignment -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Assign Roles:</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @foreach($roles as $role)
                                <div class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50">
                                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" 
                                           id="role_{{ $role->id }}" 
                                           {{ $user->hasRole($role->name) ? 'checked' : '' }}
                                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <label for="role_{{ $role->id }}" class="ml-3 text-sm font-medium text-gray-700">
                                        {{ $role->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Direct Permission Assignment (Advanced - for Super Admin only) -->
                        @can('assign-permissions')
                        <div class="border-t pt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-3">Direct Permissions (Advanced):</label>
                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-4">
                                <p class="text-sm text-yellow-800">
                                    <strong>Note:</strong> Direct permissions override role permissions. Use with caution.
                                </p>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 max-h-96 overflow-y-auto p-3 border border-gray-200 rounded-lg">
                                @php
                                    $allPermissions = \Spatie\Permission\Models\Permission::all()->groupBy(function($permission) {
                                        $parts = explode('-', $permission->name);
                                        return $parts[0];
                                    });
                                @endphp
                                
                                @foreach($allPermissions as $module => $modulePermissions)
                                <div class="border border-gray-200 rounded-lg">
                                    <div class="bg-gray-50 px-3 py-2 border-b border-gray-200">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="module-permission-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" 
                                                   data-module="{{ $module }}">
                                            <label class="ml-2 text-sm font-medium text-gray-700 uppercase">{{ $module }}</label>
                                        </div>
                                    </div>
                                    <div class="p-3 space-y-2">
                                        @foreach($modulePermissions as $permission)
                                        <div class="flex items-center">
                                            <input type="checkbox" name="direct_permissions[]" 
                                                   value="{{ $permission->name }}" 
                                                   class="permission-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" 
                                                   data-module="{{ $module }}"
                                                   id="direct_permission_{{ $permission->id }}"
                                                   {{ $user->hasDirectPermission($permission->name) ? 'checked' : '' }}>
                                            <label for="direct_permission_{{ $permission->id }}" class="ml-2 text-sm text-gray-700">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endcan

                        <!-- Buttons -->
                        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                            <a href="{{ route('users.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                                Cancel
                            </a>
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                                Update User
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Module permission checkbox functionality
        document.querySelectorAll('.module-permission-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const module = this.dataset.module;
                const permissions = document.querySelectorAll('.permission-checkbox[data-module="' + module + '"]');
                
                permissions.forEach(function(permission) {
                    permission.checked = this.checked;
                }.bind(this));
            });
        });

        // Individual permission checkbox functionality
        document.querySelectorAll('.permission-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const module = this.dataset.module;
                const moduleCheckbox = document.querySelector('.module-permission-checkbox[data-module="' + module + '"]');
                const permissions = document.querySelectorAll('.permission-checkbox[data-module="' + module + '"]');
                const allChecked = Array.from(permissions).every(p => p.checked);
                
                moduleCheckbox.checked = allChecked;
            });
        });
    });
</script>
@endsection
@endsection