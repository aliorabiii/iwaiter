@extends('layouts.admin')

@section('title', 'Homepage Management')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Homepage Content Management</h2>
        @can('homepage-edit')
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            <i class="fas fa-edit mr-2"></i>Edit Homepage
        </button>
        @endcan
    </div>

    <!-- 3 Easy Steps Section -->
    <div class="mb-8 p-4 border border-gray-200 rounded-lg">
        <h3 class="text-xl font-semibold mb-4">3 Easy Steps Section</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="p-4 bg-gray-50 rounded-lg">
                <h4 class="font-semibold">Sign Up & Setup</h4>
                <p class="text-gray-600">Current content will be displayed here...</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <h4 class="font-semibold">Manage Your Restaurant</h4>
                <p class="text-gray-600">Current content will be displayed here...</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <h4 class="font-semibold">Grow & Optimize</h4>
                <p class="text-gray-600">Current content will be displayed here...</p>
            </div>
        </div>
    </div>

    <!-- Latest Courses Section -->
    <div class="mb-8 p-4 border border-gray-200 rounded-lg">
        <h3 class="text-xl font-semibold mb-4">Latest Courses Section</h3>
        @can('courses-view')
        <a href="{{ route('admin.courses.index') }}" class="text-blue-600 hover:text-blue-800">
            Manage Courses →
        </a>
        @endcan
    </div>

    <!-- Restaurant Logos Section -->
    <div class="mb-8 p-4 border border-gray-200 rounded-lg">
        <h3 class="text-xl font-semibold mb-4">Restaurants That Trust iWaiter</h3>
        @can('restaurant-logos-view')
        <a href="{{ route('admin.restaurants.index') }}" class="text-blue-600 hover:text-blue-800">
            Manage Restaurant Logos →
        </a>
        @endcan
    </div>
</div>
@endsection