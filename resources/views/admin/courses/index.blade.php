@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Latest Courses</h1>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add New Course
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
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Category</th>
                    <th>Duration</th>
                    <th>Audience</th>
                    <th>Price</th>
                    <th>Instructor</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                    <tr class="text-center">
                        <td>{{ $course->id }}</td>
                        <td>
                            @if($course->image)
    <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
         class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
@else
    <span class="text-muted">No Image</span>
@endif

                        </td>
                        <td class="fw-bold">{{ $course->title }}</td>
                        <td>{{ $course->subtitle }}</td>
                        <td>{{ $course->category ?? '—' }}</td>   <!-- 🔹 add this -->
                        
                       

                        <td><span class="badge bg-info text-dark">{{ $course->duration }}</span></td>
                        <td><span class="badge bg-secondary">{{ $course->audience }}</span></td>
                        <td><span class="badge bg-success">${{ $course->price }}</span></td>
                        <td>{{ $course->instructor }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.courses.edit', $course->id) }}" 
                                   class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.courses.destroy', $course->id) }}" 
                                      method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
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
                        <td colspan="9" class="text-center text-muted">No courses available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
