@extends('layouts.admin')
@include('layouts.navigation')

 

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Footer Settings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Update Footer Form -->
    <form action="{{ route('admin.footer.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- About Text -->
        <div class="mb-3">
            <label for="about_text" class="form-label">About Text</label>
            <textarea name="about_text" id="about_text" class="form-control" rows="4">{{ $footerSettings->about_text ?? 'Smarter dining starts here. With iWaiter, customers enjoy faster, easier, and smarter ordering powered by iPad technology.' }}</textarea>
        </div>

        <!-- Logo -->
<div class="mb-3">
    <label for="logo" class="form-label">Logo</label>
    <input type="file" name="logo" id="logo" class="form-control">

    <div class="mt-2">
        <p>Current Logo:</p>
        <img src="{{ $footerSettings && $footerSettings->logo 
                    ? asset('storage/'.$footerSettings->logo) 
                    : asset('assets/images/logo.png') }}" 
             alt="Logo" 
             style="height:50px; width:auto; border:1px solid #ddd; padding:2px;">
    </div>
</div>


        <!-- Social Links -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $footerSettings->facebook ?? 'www.facebook.com' }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="text" name="instagram" id="instagram" class="form-control" value="{{ $footerSettings->instagram ?? 'www.instagram.com' }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="linkedin" class="form-label">LinkedIn</label>
                <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{ $footerSettings->linkedin ?? 'www.linkedin.com' }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="twitter" class="form-label">Twitter</label>
                <input type="text" name="twitter" id="twitter" class="form-control" value="{{ $footerSettings->twitter ?? 'www.twitter.com' }}">
            </div>
        </div>


        <!-- Quick Links -->

<h4 class="mt-4">Quick Links</h4>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="link_home" class="form-label">Home Link</label>
        <input type="text" name="link_home" id="link_home" class="form-control"
               value="{{ $footerSettings->link_home ?? url('/') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="link_about" class="form-label">About Link</label>
        <input type="text" name="link_about" id="link_about" class="form-control"
               value="{{ $footerSettings->link_about ?? url('/about') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="link_features" class="form-label">Features Link</label>
        <input type="text" name="link_features" id="link_features" class="form-control"
               value="{{ $footerSettings->link_features ?? url('/features') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="link_services" class="form-label">Services Link</label>
        <input type="text" name="link_services" id="link_services" class="form-control"
               value="{{ $footerSettings->link_services ?? url('/services') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="link_testimonials" class="form-label">Testimonials Link</label>
        <input type="text" name="link_testimonials" id="link_testimonials" class="form-control"
               value="{{ $footerSettings->link_testimonials ?? url('/testimonials') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="link_contact" class="form-label">Contact Link</label>
        <input type="text" name="link_contact" id="link_contact" class="form-control"
               value="{{ $footerSettings->link_contact ?? url('/contact') }}">
    </div>
</div>











        <!-- Contact Info -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $footerSettings->address ?? ' Lebanon, Beirut' }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $footerSettings->email ?? ' support@iwaiter.com' }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $footerSettings->phone ?? ' +961 71 978 349' }}">
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Update Footer</button>
        </div>
    </form>

    <!-- Reset/Delete Footer Form -->
    @if($footerSettings)
    <form action="{{ route('admin.footer.update') }}" method="POST" onsubmit="return confirm('Are you sure you want to reset the footer?');" class="mt-3">
        @csrf
        <input type="hidden" name="reset" value="1">
        <button type="submit" class="btn btn-danger">Reset Footer</button>
    </form>
    @endif
</div>
@endsection
