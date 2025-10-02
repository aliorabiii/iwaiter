@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Create Feature</h2>
    <form action="{{ url('/admin/features') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="icon" class="form-label">Icon (optional)</label>
            <input type="text" name="icon" class="form-control">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Feature</button>
    </form>
</div>
@endsection
