@extends('layouts.admin')

@section('content')
<h1>Add Team Member</h1>

<form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
    <input type="text" name="role" placeholder="Role" class="form-control mb-2" required>
    <input type="url" name="facebook" placeholder="Facebook URL" class="form-control mb-2">
    <input type="url" name="linkedin" placeholder="LinkedIn URL" class="form-control mb-2">
    <input type="file" name="image" class="form-control mb-2" required>
    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
