@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Services Management</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-success d-flex align-items-center">
            <i class="bi bi-plus-lg me-1"></i> Add Service
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Short Description</th>
                    <th>Status</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr class="text-center">
                        <td>{{ $service->order }}</td>

                        <!-- Icon -->
                        <td>
                            @if($service->icon)
                                <i class="{{ $service->icon }}" style="font-size: 24px;"></i>
                            @else
                                <span class="text-muted">No Icon</span>
                            @endif
                        </td>

                        <!-- Image -->
                        <td>
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" 
                                     alt="{{ $service->title }}" 
                                     class="rounded" 
                                     width="80">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>

                        <!-- Title -->
                        <td>{{ $service->title }}</td>

                        <!-- Short Description -->
                        <td>{{ Str::limit($service->short_description, 50) }}</td>

                        <!-- Status -->
                        <td>
                            <span class="badge bg-{{ $service->is_active ? 'success' : 'danger' }}">
                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>

                        <!-- Actions -->
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.services.edit', $service->id) }}" 
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                      onsubmit="return confirm('Delete this service?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No services found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
