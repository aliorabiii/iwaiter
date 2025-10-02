@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="h3 mb-4">Add Team Member</h1>

  <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" name="job_title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Facebook URL</label>
            <input type="url" name="facebook_url" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">LinkedIn URL</label>
            <input type="url" name="linkedin_url" class="form-control">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-save me-1"></i> Save
            </button>
            <a href="{{ route('admin.team.index') }}" class="btn btn-secondary d-flex align-items-center">
                <i class="bi bi-arrow-left me-1"></i> Back
            </a>
        </div>
    </form>
</div>
@endsection
