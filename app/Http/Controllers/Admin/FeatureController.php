<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    // Show all features
    public function index()
    {
        $features = Feature::latest()->get();
        return view('admin.features.index', compact('features'));
    }

    // Show form to create a new feature
    public function create()
    {
        return view('admin.features.create');
    }

    // Store new feature
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('features', 'public');
        }

        Feature::create($validated);

        return redirect()->route('admin.features.index')->with('success', 'Feature created successfully!');
    }

    // Show form to edit feature
    public function edit(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    // Update feature
    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // delete old image
            if ($feature->image && Storage::disk('public')->exists($feature->image)) {
                Storage::disk('public')->delete($feature->image);
            }
            $validated['image'] = $request->file('image')->store('features', 'public');
        }

        $feature->update($validated);

        return redirect()->route('admin.features.index')->with('success', 'Feature updated successfully!');
    }

    // Delete feature
    public function destroy(Feature $feature)
    {
        if ($feature->image && Storage::disk('public')->exists($feature->image)) {
            Storage::disk('public')->delete($feature->image);
        }

        $feature->delete();

        return redirect()->route('admin.features.index')->with('success', 'Feature deleted successfully!');
    }
}
