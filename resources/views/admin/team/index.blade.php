@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Team Members</h1>
        @can('team-create')
        <a href="{{ route('admin.team.create') }}" class="btn btn-success d-flex align-items-center">
            <i class="bi bi-plus-lg me-1"></i> Add Member
        </a>
        @endcan
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Job Title</th>
                    <th>Image</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->job_title }}</td>
                        <td>
                            @if($member->image)
                                <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" class="rounded" width="80">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                @can('team-edit')
                                <a href="{{ route('admin.team.edit', $member->id) }}" 
                                   class="btn btn-sm btn-warning d-flex align-items-center">
                                    <i class="bi bi-pencil me-1"></i> Edit
                                </a>
                                @endcan

                                @can('team-delete')
                                <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this member?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center">
                                        <i class="bi bi-trash me-1"></i> Delete
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No team members found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
