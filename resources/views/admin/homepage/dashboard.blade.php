@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- Quick Stats -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                <i class="fas fa-users text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Users</p>
                <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\User::count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600">
                <i class="fas fa-star text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Testimonials</p>
                <p class="text-2xl font-semibold text-gray-900">0</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                <i class="fas fa-book text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Courses</p>
                <p class="text-2xl font-semibold text-gray-900">0</p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h3 class="text-xl font-semibold mb-4">Quick Actions</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @can('homepage-edit')
        <a href="{{ route('admin.homepage') }}" class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 text-center transition duration-200">
            <i class="fas fa-home text-2xl text-blue-600 mb-2"></i>
            <p class="font-medium">Edit Homepage</p>
        </a>
        @endcan
        
        @can('about-us-edit')
        <a href="{{ route('admin.about') }}" class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 text-center transition duration-200">
            <i class="fas fa-info-circle text-2xl text-green-600 mb-2"></i>
            <p class="font-medium">Edit About Page</p>
        </a>
        @endcan
        
        @can('contact-page-edit')
        <a href="{{ route('admin.contact') }}" class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 text-center transition duration-200">
            <i class="fas fa-envelope text-2xl text-yellow-600 mb-2"></i>
            <p class="font-medium">Edit Contact Page</p>
        </a>
        @endcan
        
        @can('testimonials-create')
        <a href="{{ route('admin.testimonials.create') }}" class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 text-center transition duration-200">
            <i class="fas fa-star text-2xl text-purple-600 mb-2"></i>
            <p class="font-medium">Add Testimonial</p>
        </a>
        @endcan
    </div>
</div>

<!-- Recent Activity -->
<div class="bg-white rounded-lg shadow-md p-6 mt-6">
    <h3 class="text-xl font-semibold mb-4">Recent Activity</h3>
    <div class="space-y-4">
        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
            <div class="flex items-center">
                <i class="fas fa-user-plus text-green-500 mr-3"></i>
                <div>
                    <p class="font-medium">New user registered</p>
                    <p class="text-sm text-gray-600">2 hours ago</p>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
            <div class="flex items-center">
                <i class="fas fa-edit text-blue-500 mr-3"></i>
                <div>
                    <p class="font-medium">Homepage updated</p>
                    <p class="text-sm text-gray-600">5 hours ago</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection