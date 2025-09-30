<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class HomepageController extends Controller
{
    // Show homepage management
  public function index() {
    $courses = \App\Models\Course::all();
    return view('home', compact('courses'));
}

    // Store new course from homepage panel
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'instructor' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:50',
            'price' => 'nullable|numeric',
        ]);

        Course::create($validated);

        return redirect()->route('admin.homepage')->with('success', 'Course added successfully.');
    }

    // Update course
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'instructor' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:50',
            'price' => 'nullable|numeric',
        ]);

        $course->update($validated);

        return redirect()->route('admin.homepage')->with('success', 'Course updated successfully.');
    }

    // Delete course
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.homepage')->with('success', 'Course deleted successfully.');
    }
}
