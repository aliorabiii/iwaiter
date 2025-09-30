@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Course</h1>

    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-bold">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $course->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Subtitle</label>
            <input type="text" name="subtitle" class="form-control" value="{{ $course->subtitle }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Category</label>
            <input type="text" name="category" class="form-control" value="{{ $course->category }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Duration</label>
            <input type="text" name="duration" class="form-control" value="{{ $course->duration }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Audience</label>
            <input type="text" name="audience" class="form-control" value="{{ $course->audience }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Instructor</label>
            <input type="text" name="instructor" class="form-control" value="{{ $course->instructor }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Price</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ $course->price }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Course Image</label>
            <input type="file" name="image" class="form-control">
            
            @if($course->image)
                <div class="mt-3">
                    <p class="mb-2">Current Image:</p>
                    <img src="{{ asset($course->image) }}" alt="{{ $course->title }}" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Update Course
            </button>
        </div>
    </form>
</div>
@endsection
