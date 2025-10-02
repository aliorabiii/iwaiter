<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // Show all services
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services'));
    }

    // Show form to create new service
    public function create()
    {
        return view('admin.services.create');
    }

    // Store new service
    public function store(Request $request)
{
    $validated = $request->validate([
        'title'             => 'required|string|max:255',
        'icon'              => 'nullable|string|max:255',
        'short_description' => 'required|string',
        'full_description'  => 'nullable|string',
        'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'order'             => 'nullable|integer',
        'is_active'         => 'boolean',
    ]);

    if ($request->hasFile('image')) {
        // ✅ store in storage/app/public/services
        $validated['image'] = $request->file('image')->store('services', 'public');
    }

    $validated['is_active'] = $request->has('is_active');

    Service::create($validated);

    return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
}



     /*  if ($request->hasFile('image')) {
            // delete old image
            if ($feature->image && Storage::disk('public')->exists($feature->image)) {
                Storage::disk('public')->delete($feature->image);
            }
            $validated['image'] = $request->file('image')->store('features', 'public');
        }

        $feature->update($validated);

        return redirect()->route('admin.features.index')->with('success', 'Feature updated successfully!');
    }
 */



    // Show form to edit service
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    // Update service
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'short_description' => 'required|string',
            'full_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    // Delete service
    public function destroy(Service $service)
    {
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
    }
}