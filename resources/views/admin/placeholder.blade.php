<!-- resources/views/admin/placeholder.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded shadow mt-6">
    <h2 class="text-3xl font-bold mb-4 text-gray-800">{{ $title }}</h2>
    <p class="text-gray-600 text-lg">
        This is a placeholder page for <strong>{{ $title }}</strong>. You can see the design and navigation here.
    </p>

    <!-- Optional: Add a dummy table for "Our Experts" page -->
    @if($title === 'Our Experts')
   @if($title === 'Our Experts')
    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full border rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Photo</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Facebook</th>
                    <th class="px-4 py-2 border">LinkedIn</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr class="text-center">
                        <td class="px-4 py-2 border">
                            <img src="{{ asset('uploads/team/'.$member->photo) }}" 
                                 class="rounded-full mx-auto w-12 h-12" 
                                 alt="{{ $member->name }}">
                        </td>
                        <td class="px-4 py-2 border">{{ $member->name }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ $member->facebook }}" class="text-blue-600 hover:underline" target="_blank">Facebook</a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ $member->linkedin }}" class="text-blue-600 hover:underline" target="_blank">LinkedIn</a>
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('team.edit', $member->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('team.destroy', $member->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

    @endif
</div>
@endsection
