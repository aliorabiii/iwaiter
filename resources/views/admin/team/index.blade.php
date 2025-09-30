<!-- resources/views/admin/team/index.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Team Members</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Facebook</th>
                <th>LinkedIn</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($teamMembers as $member)
            <tr>
                <td>
                    <img src="{{ $member->photo ?? 'https://via.placeholder.com/50' }}" alt="{{ $member->name }}" class="rounded-circle" width="50">
                </td>
                <td>{{ $member->name }}</td>
                <td>
                    @if($member->facebook)
                        <a href="{{ $member->facebook }}" target="_blank" class="btn btn-sm btn-primary">FB</a>
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    @if($member->linkedin)
                        <a href="{{ $member->linkedin }}" target="_blank" class="btn btn-sm btn-info">LI</a>
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <!-- Edit Button triggers modal -->
                    <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $member->id }}">Edit</button>

                    <!-- Delete Form -->
                    <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $member->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('admin.team.update', $member->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $member->id }}">Edit {{ $member->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $member->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Facebook</label>
                                    <input type="url" name="facebook" class="form-control" value="{{ $member->facebook }}">
                                </div>
                                <div class="mb-3">
                                    <label>LinkedIn</label>
                                    <input type="url" name="linkedin" class="form-control" value="{{ $member->linkedin }}">
                                </div>
                                <div class="mb-3">
                                    <label>Photo URL</label>
                                    <input type="url" name="photo" class="form-control" value="{{ $member->photo }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
