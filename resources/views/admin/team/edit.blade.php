@extends('layouts.admin')

@section('content')
<h1>Edit Team Member</h1>

<form action="{{ route('admin.team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $team->name }}" class="form-control mb-2" required>
    <input type="text" name="role" value="{{ $team->role }}" class="form-control mb-2" required>
    <input type="url" name="facebook" value="{{ $team->facebook }}" class="form-control mb-2">
    <input type="url" name="linkedin" value="{{ $team->linkedin }}" class="form-control mb-2">
    <input type="file" name="image" class="form-control mb-2">
    <img src="{{ asset('assets/images/'.$team->image) }}" width="100" class="mb-2" alt="{{ $team->name }}">
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
