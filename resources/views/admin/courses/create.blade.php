@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Course</h1>

    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Subtitle</label>
            <input type="text" name="subtitle" class="form-control">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control">
        </div>

        <div class="mb-3">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control">
        </div>

        <div class="mb-3">
            <label>Audience</label>
            <input type="text" name="audience" class="form-control">
        </div>

        <div class="mb-3">
            <label>Instructor</label>
            <input type="text" name="instructor" class="form-control">
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Add Course</button>
    </form>
</div>
@endsection
