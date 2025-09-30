@extends('layouts.admin') {{-- Assuming you have a main admin layout --}}

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Features</h2>
        <a href="{{ route('admin.features.create') }}" class="btn btn-primary">Add Feature</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($features as $feature)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $feature->title }}</td>
                    <td>{{ $feature->description }}</td>
                    <td>
                        <a href="{{ route('admin.features.edit', $feature->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No features found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
