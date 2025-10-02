@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Feature</h1>

    <form action="{{ route('admin.features.update', $feature->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Feature Title</label>
            <input type="text" name="title" id="title" 
                   class="form-control @error('title') is-invalid @enderror" 
                   value="{{ old('title', $feature->title) }}" required>
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" 
                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $feature->description) }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Icon</label>
            <input type="text" name="icon" id="icon" 
                   class="form-control @error('icon') is-invalid @enderror" 
                   value="{{ old('icon', $feature->icon) }}">
            @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Feature Image</label>
            <input type="file" name="image" id="image" 
                   class="form-control @error('image') is-invalid @enderror">
            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror

            @if($feature->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$feature->image) }}" 
                         alt="{{ $feature->title }}" class="img-thumbnail" style="width:150px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Feature</button>
        <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
