<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    // List all courses
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    // Show create form
    public function create()
    {
        return view('admin.courses.create');
    }

    // Store a new course
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:50',
            'audience' => 'nullable|string|max:255',
            'instructor' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $course = new Course($request->except('image'));

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('courses', 'public');
            $course->image = 'storage/' . $path;
        }

        $course->save();

        return redirect()->route('admin.courses.index')->with('success', 'Course added successfully!');
    }

    // Show edit form
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    // Update course
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:50',
            'audience' => 'nullable|string|max:255',
            'instructor' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle new image
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($course->image && Storage::disk('public')->exists(str_replace('storage/', '', $course->image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $course->image));
            }
            $path = $request->file('image')->store('courses', 'public');
            $data['image'] = 'storage/' . $path;
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }

    // Delete course
    public function destroy(Course $course)
    {
        // Delete image file if exists
        if ($course->image && Storage::disk('public')->exists(str_replace('storage/', '', $course->image))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $course->image));
        }

        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully!');
    }
}
