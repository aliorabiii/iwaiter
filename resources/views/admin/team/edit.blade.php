@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="h3 mb-4">Edit Team Member</h1>

    <form action="{{ route('admin.team.update', $team_member->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $team_member->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" name="job_title" class="form-control" value="{{ $team_member->job_title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if($team_member->image)
                <img src="{{ asset($team_member->image) }}" class="rounded mt-2" style="width:120px;">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Facebook URL</label>
            <input type="url" name="facebook_url" class="form-control" value="{{ $team_member->facebook_url }}">
        </div>

        <div class="mb-3">
            <label class="form-label">LinkedIn URL</label>
            <input type="url" name="linkedin_url" class="form-control" value="{{ $team_member->linkedin_url }}">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-arrow-repeat me-1"></i> Update
            </button>
            <a href="{{ route('admin.team.index') }}" class="btn btn-secondary d-flex align-items-center">
                <i class="bi bi-arrow-left me-1"></i> Back
            </a>
        </div>
    </form>
</div>
@endsection
