<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\footer_settings;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    public function index()
    {
        // Fetch the first footer row
        $footer = footer_settings::first();
        return view('footer_settings.index', compact('footer'));
    }

    public function edit()
    {
        $footerSettings = footer_settings::first();

        // If footer does not exist, create an empty row
        if (!$footerSettings) {
            $footerSettings = footer_settings::create([
                'logo' => null,
                'about_text' => null,
                'facebook' => null,
                'instagram' => null,
                'linkedin' => null,
                'twitter' => null,
                'address' => null,
                'email' => null,
                'phone' => null,
                'link_home' => null,
                'link_about' => null,
                'link_features' => null,
                'link_services' => null,
                'link_testimonials' => null,
                'link_contact' => null,
            ]);
        }

        return view('admin.footer_settings.edit', compact('footerSettings'));
    }

    public function update(Request $request)
    {
        $footerSettings = footer_settings::first();
        if (!$footerSettings) {
            $footerSettings = footer_settings::create([]);
        }

        // Reset footer
        if ($request->has('reset') && $request->input('reset') == 1) {
            if ($footerSettings->logo && Storage::disk('public')->exists($footerSettings->logo)) {
                Storage::disk('public')->delete($footerSettings->logo);
            }

            $footerSettings->update([
                'logo' => null,
                'about_text' => null,
                'facebook' => null,
                'instagram' => null,
                'linkedin' => null,
                'twitter' => null,
                'address' => null,
                'email' => null,
                'phone' => null,
                'link_home' => null,
                'link_about' => null,
                'link_features' => null,
                'link_services' => null,
                'link_testimonials' => null,
                'link_contact' => null,
            ]);

            return redirect()->back()->with('success', 'Footer reset successfully.');
        }

        // Update footer fields
        $footerSettings->update([
            'about_text' => $request->input('about_text'),
            'link_home' => $request->input('link_home'),
            'link_about' => $request->input('link_about'),
            'link_features' => $request->input('link_features'),
            'link_services' => $request->input('link_services'),
            'link_testimonials' => $request->input('link_testimonials'),
            'link_contact' => $request->input('link_contact'),
            'facebook' => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'linkedin' => $request->input('linkedin'),
            'twitter' => $request->input('twitter'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            if ($footerSettings->logo && Storage::disk('public')->exists($footerSettings->logo)) {
                Storage::disk('public')->delete($footerSettings->logo);
            }

            $logoPath = $request->file('logo')->store('footer', 'public');
            $footerSettings->update(['logo' => $logoPath]);
        }

        return redirect()->back()->with('success', 'Footer updated successfully.');
    }

    // Share footer globally
    public function boot()
    {
        View::composer('*', function ($view) {
            $footer = footer_settings::first();
            $view->with('footer', $footer);
        });
    }

    public function __construct()
    {
        // optional middleware
    }
}
