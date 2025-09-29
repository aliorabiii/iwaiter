@extends('layouts.app')

@section('title', 'Edit Role')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Role: {{ $role->name }}
    </h2>
@endsection

@section('content')
<div class="py-8">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    {{-- Debug Info --}}
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                        <h4 class="font-bold text-yellow-800">Debug Info:</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                            <div>
                                <strong>Role:</strong> {{ $role->name }}
                            </div>
                            <div>
                                <strong>Role ID:</strong> {{ $role->id }}
                            </div>
                            <div>
                                <strong>Permissions Count:</strong> {{ $role->permissions->count() }}
                            </div>
                            <div class="md:col-span-3">
                                <strong>Current Permissions:</strong> 
                                <span class="{{ $role->permissions->count() ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $role->permissions->pluck('name')->implode(', ') ?: 'No permissions assigned' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Role Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Role Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}" 
                                   class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Enter role name" required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Permissions Section -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <label class="block text-sm font-medium text-gray-700">Permissions:</label>
                                <div class="text-sm text-gray-500">
                                    Total: {{ $permissions->flatten()->count() }} permissions
                                </div>
                            </div>
                            
                            @if($permissions->isEmpty())
                                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                                    <p class="text-red-600">No permissions found in the system. Please run the seeder.</p>
                                </div>
                            @else
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 mb-4">
                                    <p class="text-sm text-blue-800">
                                        <strong>Tip:</strong> Check the module header to select all permissions in that category.
                                    </p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 max-h-96 overflow-y-auto p-2 border border-gray-200 rounded-lg">
                                    @foreach($permissions as $module => $modulePermissions)
                                    <div class="border border-gray-200 rounded-lg bg-white">
                                        <div class="bg-gray-50 px-4 py-3 border-b border-gray-200">
                                            @php
                                                $modulePermissionCount = count($modulePermissions);
                                                $roleModulePermissionCount = $modulePermissions->filter(function($permission) use ($role) {
                                                    return $role->hasPermissionTo($permission->name);
                                                })->count();
                                            @endphp
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center">
                                                    <input type="checkbox" class="module-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" 
                                                           data-module="{{ $module }}"
                                                           id="module_{{ $loop->index }}">
                                                    <label for="module_{{ $loop->index }}" class="ml-2 text-sm font-medium text-gray-700 uppercase">
                                                        {{ $module }}
                                                    </label>
                                                </div>
                                                <span class="text-xs bg-gray-200 px-2 py-1 rounded-full">
                                                    {{ $roleModulePermissionCount }}/{{ $modulePermissionCount }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="p-3 space-y-2 max-h-48 overflow-y-auto">
                                            @foreach($modulePermissions as $permission)
                                            <div class="flex items-start">
                                                @php
                                                    $hasPermission = $role->hasPermissionTo($permission->name);
                                                @endphp
                                                <input type="checkbox" name="permissions[]" 
                                                       value="{{ $permission->name }}" 
                                                       class="permission-checkbox h-4 w-4 mt-1 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" 
                                                       data-module="{{ $module }}"
                                                       id="permission_{{ $permission->id }}"
                                                       {{ $hasPermission ? 'checked' : '' }}>
                                                <label for="permission_{{ $permission->id }}" class="ml-2 text-sm text-gray-700 flex-1">
                                                    <span class="font-medium {{ $hasPermission ? 'text-green-600' : 'text-gray-600' }}">
                                                        {{ $permission->name }}
                                                        @if($hasPermission)
                                                        <span class="text-green-500 ml-1">✓</span>
                                                        @endif
                                                    </span>
                                                    @if($permission->description)
                                                    <br><span class="text-xs text-gray-500">{{ $permission->description }}</span>
                                                    @endif
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                            
                            @error('permissions')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Selected Permissions Summary -->
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <h4 class="font-medium text-green-800 mb-2">Selected Permissions Summary:</h4>
                            <div id="selectedPermissions" class="text-sm text-green-600">
                                No permissions selected yet
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                            <a href="{{ route('roles.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                                ← Back to Roles
                            </a>
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Role
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
        // Function to update selected permissions summary
        function updateSelectedPermissions() {
            const selectedPermissions = document.querySelectorAll('.permission-checkbox:checked');
            const selectedCount = selectedPermissions.length;
            const summaryElement = document.getElementById('selectedPermissions');
            
            if (selectedCount === 0) {
                summaryElement.innerHTML = 'No permissions selected';
                summaryElement.className = 'text-sm text-yellow-600';
            } else {
                const permissionNames = Array.from(selectedPermissions).map(cb => {
                    const label = document.querySelector(`label[for="${cb.id}"]`);
                    return label ? label.querySelector('.font-medium').textContent.trim() : cb.value;
                });
                
                summaryElement.innerHTML = `
                    <strong>${selectedCount} permissions selected:</strong><br>
                    <div class="mt-1 max-h-20 overflow-y-auto">${permissionNames.join(', ')}</div>
                `;
                summaryElement.className = 'text-sm text-green-600';
            }
        }

        // Module checkbox functionality
        document.querySelectorAll('.module-checkbox').forEach(function(checkbox) {
            const module = checkbox.dataset.module;
            const permissions = document.querySelectorAll('.permission-checkbox[data-module="' + module + '"]');
            
            // Set initial state
            const allChecked = Array.from(permissions).every(p => p.checked);
            checkbox.checked = allChecked;
            checkbox.indeterminate = !allChecked && Array.from(permissions).some(p => p.checked);

            checkbox.addEventListener('change', function() {
                permissions.forEach(function(permission) {
                    permission.checked = this.checked;
                }.bind(this));
                updateSelectedPermissions();
            });
        });

        // Individual permission checkbox functionality
        document.querySelectorAll('.permission-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const module = this.dataset.module;
                const moduleCheckbox = document.querySelector('.module-checkbox[data-module="' + module + '"]');
                const permissions = document.querySelectorAll('.permission-checkbox[data-module="' + module + '"]');
                
                const allChecked = Array.from(permissions).every(p => p.checked);
                const someChecked = Array.from(permissions).some(p => p.checked);
                
                moduleCheckbox.checked = allChecked;
                moduleCheckbox.indeterminate = !allChecked && someChecked;
                
                updateSelectedPermissions();
            });
        });

        // Initialize on page load
        updateSelectedPermissions();

        // Add search functionality
        const searchInput = document.createElement('input');
        searchInput.type = 'text';
        searchInput.placeholder = 'Search permissions...';
        searchInput.className = 'w-full p-2 border border-gray-300 rounded-md mb-4';
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            document.querySelectorAll('.permission-checkbox').forEach(function(checkbox) {
                const label = document.querySelector(`label[for="${checkbox.id}"]`);
                const permissionText = label ? label.textContent.toLowerCase() : '';
                const permissionContainer = checkbox.closest('.border-gray-200');
                
                if (permissionText.includes(searchTerm)) {
                    permissionContainer.style.display = 'block';
                } else {
                    permissionContainer.style.display = 'none';
                }
            });
        });

        // Insert search box at the top of permissions section
        const permissionsSection = document.querySelector('label[for="permissions"]');
        if (permissionsSection) {
            permissionsSection.parentNode.insertBefore(searchInput, permissionsSection.nextSibling);
        }
    });
</script>

<style>
    .module-checkbox:indeterminate {
        background-color: #3b82f6;
        border-color: #3b82f6;
    }
    
    .permission-checkbox:checked {
        background-color: #10b981;
        border-color: #10b981;
    }
</style>
@endsection
@endsection