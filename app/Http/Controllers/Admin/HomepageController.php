<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        // Check permission
        if (!auth()->user()->can('homepage-view')) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.homepage.index', [
            'title' => 'Homepage Management'
        ]);
    }

    public function update(Request $request)
    {
        if (!auth()->user()->can('homepage-edit')) {
            abort(403, 'Unauthorized action.');
        }

        // Update homepage content logic here
        return redirect()->route('admin.homepage')->with('success', 'Homepage updated successfully.');
    }
}