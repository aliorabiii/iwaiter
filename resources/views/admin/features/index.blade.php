@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Features</h1>
        <a href="{{ route('admin.features.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add New Feature
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($features as $feature)
                    <tr class="text-center">
                        <td>{{ $feature->id }}</td>
                        <td>
                            @if($feature->image)
                                <img src="{{ asset('storage/'.$feature->image) }}" alt="{{ $feature->title }}"
                                     class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $feature->icon ?? '-' }}</td>
                        <td class="fw-bold">{{ $feature->title }}</td>
                        <td>{{ $feature->description }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.features.edit', $feature->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this feature?');">
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
                        <td colspan="6" class="text-center text-muted">No features available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
