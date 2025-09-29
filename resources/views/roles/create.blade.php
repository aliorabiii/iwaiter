@extends('layouts.app')

@section('title', 'Create New Role')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create New Role
    </h2>
@endsection

@section('content')
<div class="py-8">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    
                    <div class="space-y-6">
                        <!-- Role Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name:</label>
                            <input type="text" name="name" id="name" 
                                   class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Enter role name" required>
                        </div>

                        <!-- Permissions Section -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-4">Permissions:</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($permissions as $module => $modulePermissions)
                                <div class="border border-gray-200 rounded-lg">
                                    <div class="bg-gray-50 px-4 py-3 border-b border-gray-200">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="module-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" 
                                                   data-module="{{ $module }}">
                                            <label class="ml-2 text-sm font-medium text-gray-700 uppercase">{{ $module }}</label>
                                        </div>
                                    </div>
                                    <div class="p-4 space-y-2">
                                        @foreach($modulePermissions as $permission)
                                        <div class="flex items-center">
                                            <input type="checkbox" name="permissions[]" 
                                                   value="{{ $permission->name }}" 
                                                   class="permission-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" 
                                                   data-module="{{ $module }}"
                                                   id="permission_{{ $permission->id }}">
                                            <label for="permission_{{ $permission->id }}" class="ml-2 text-sm text-gray-700">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                            <a href="{{ route('roles.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                                Cancel
                            </a>
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                                Create Role
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
        // Module checkbox functionality
        document.querySelectorAll('.module-checkbox').forEach(function(checkbox) {
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
                const moduleCheckbox = document.querySelector('.module-checkbox[data-module="' + module + '"]');
                const permissions = document.querySelectorAll('.permission-checkbox[data-module="' + module + '"]');
                const allChecked = Array.from(permissions).every(p => p.checked);
                
                moduleCheckbox.checked = allChecked;
            });
        });
    });
</script>
@endsection
@endsection