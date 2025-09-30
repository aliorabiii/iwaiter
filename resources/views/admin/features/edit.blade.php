@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Edit Feature</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.features.update', $feature->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $feature->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="4" class="form-control">{{ old('description', $feature->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Feature</button>
        <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
