
@php
    $footerSettings = \App\Models\footer_settings::first();
@endphp


{{-- <footer class="footer text-white pt-5 pb-3" style="background: rgba(0, 0, 0, 1);">
  <div class="container">
    <div class="row gy-4">
      
      <!-- Brand / About -->
      <div class="col-lg-4 col-md-6 pb-5">
        <div class="footer-logo mb-3">
          <a href="{{ url('/index') }}">
            <img src="{{ isset($footer) && $footer->logo ? asset('storage/'.$footer->logo) : asset('assets/images/logo.png') }}" 
                 alt="Logo" style="height: 80px; width: auto;">
          </a>
        </div>
        <p class="text-white-50">
          {{ $footer->about_text ?? 'Smarter dining starts here. With iWaiter, customers enjoy faster, easier, and smarter ordering powered by iPad technology.' }}
        </p>
        <div class="d-flex gap-3 mt-3">
          @if(isset($footer) && $footer->facebook)
            <a href="{{ $footer->facebook }}" class="text-white fs-5"><i class="fab fa-facebook-f"></i></a>
          @endif
          @if(isset($footer) && $footer->instagram)
            <a href="{{ $footer->instagram }}" class="text-white fs-5"><i class="fab fa-instagram"></i></a>
          @endif
          @if(isset($footer) && $footer->linkedin)
            <a href="{{ $footer->linkedin }}" class="text-white fs-5"><i class="fab fa-linkedin-in"></i></a>
          @endif
          @if(isset($footer) && $footer->twitter)
            <a href="{{ $footer->twitter }}" class="text-white fs-5"><i class="fab fa-twitter"></i></a>
          @endif
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-2 col-md-6">
        <h5 class="fw-bold mb-3">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="{{ url('/index') }}" class="text-white-50 text-decoration-none">Home</a></li>
          <li><a href="{{ url('/about') }}" class="text-white-50 text-decoration-none">About Us</a></li>
          <li><a href="{{ url('/features') }}" class="text-white-50 text-decoration-none">Features</a></li>
          <li><a href="{{ url('/services') }}" class="text-white-50 text-decoration-none">Services</a></li>
          <li><a href="{{ url('/testimonials') }}" class="text-white-50 text-decoration-none">Testimonials</a></li>
          <li><a href="{{ url('/contact') }}" class="text-white-50 text-decoration-none">Contact Us</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-lg-3 col-md-6">
        <h5 class="fw-bold mb-3">Contact</h5>
        <p class="mb-2 text-white-50">
          <i class="fa fa-map-marker-alt me-2 text-warning"></i> 
          <a href="https://www.google.com/maps?q={{ urlencode($footer->address ?? 'Lebanon, Beirut') }}" 
             target="_blank" class="text-white-50 text-decoration-none">
            {{ $footer->address ?? 'Lebanon, Beirut' }}
          </a>
        </p>
        <p class="mb-2 text-white-50">
          <i class="fa fa-envelope me-2 text-warning"></i> 
          <a href="mailto:{{ $footer->email ?? 'support@iwaiter.com' }}" 
             class="text-white-50 text-decoration-none">
            {{ $footer->email ?? 'support@iwaiter.com' }}
          </a>
        </p>
        <p class="text-white-50">
          <i class="fa fa-phone me-2 text-warning"></i> 
          <a href="tel:{{ $footer->phone ?? '+96171978349' }}" class="text-white-50 text-decoration-none">
            {{ $footer->phone ?? '+961 71 978 349' }}
          </a>
        </p>
      </div>

      <!-- Newsletter -->
      <div class="col-lg-3 col-md-6">
        <h5 class="fw-bold mb-3">Stay Updated</h5>
        <p class="mb-3 text-white-50">Subscribe to get the latest updates & offers from iWaiter.</p>
        <form action="" method="POST" class="d-flex">
            @csrf
            <input type="email" name="email" class="form-control rounded-start-pill" placeholder="Your email" required>
            <button type="submit" class="btn btn-warning rounded-end-pill px-3">Go</button>
        </form>
      </div>

    </div>

    <hr class="border-light mt-4">

    <!-- Bottom -->
    <div class="row">
      <div class="col text-center">
        <p class="mb-0 small text-white-50">© <span id="year"></span> iWaiter. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer> --}}


@php
    $footer = \App\Models\footer_settings::first();
@endphp

<!-- Full Footer -->
<footer class="footer text-white pt-5 pb-3" style="background: rgba(0, 0, 0, 1);">
  <div class="container">
    <div class="row gy-4">
      
      <!-- Brand / About -->
      <div class="col-lg-4 col-md-6 pb-5">
        <div class="footer-logo mb-3">
          <a href="{{ url('/index') }}">
            <img src="{{ $footer && $footer->logo ? asset('storage/'.$footer->logo) : asset('assets/images/logo.png') }}" 
                 alt="Logo" style="height: 80px; width: auto;">
          </a>
        </div>
        <p class="text-white-50">
          {{ $footer->about_text ?? 'Smarter dining starts here. With iWaiter, customers enjoy faster, easier, and smarter ordering powered by iPad technology.' }}
        </p>
      <div class="d-flex gap-3 mt-3">
    <a href="{{ $footer->facebook ?? 'https://facebook.com' }}" class="text-white fs-5"><i class="fab fa-facebook-f"></i></a>
    <a href="{{ $footer->instagram ?? 'https://instagram.com' }}" class="text-white fs-5"><i class="fab fa-instagram"></i></a>
    <a href="{{ $footer->linkedin ?? 'https://linkedin.com' }}" class="text-white fs-5"><i class="fab fa-linkedin-in"></i></a>
    <a href="{{ $footer->twitter ?? 'https://twitter.com' }}" class="text-white fs-5"><i class="fab fa-twitter"></i></a>
</div>
      </div>

     <!-- Quick Links -->
<div class="col-lg-2 col-md-6">
    <h5 class="fw-bold mb-3">Quick Links</h5>
    <ul class="list-unstyled">
        <li>
            <a href="{{ $footer->link_home ?? url('/') }}" class="text-white-50 text-decoration-none">Home</a>
        </li>
        <li>
            <a href="{{ $footer->link_about ?? url('/about') }}" class="text-white-50 text-decoration-none">About Us</a>
        </li>
        <li>
            <a href="{{ $footer->link_features ?? url('/features') }}" class="text-white-50 text-decoration-none">Features</a>
        </li>
        <li>
            <a href="{{ $footer->link_services ?? url('/services') }}" class="text-white-50 text-decoration-none">Services</a>
        </li>
        <li>
            <a href="{{ $footer->link_testimonials ?? url('/testimonials') }}" class="text-white-50 text-decoration-none">Testimonials</a>
        </li>
        <li>
            <a href="{{ $footer->link_contact ?? url('/contact') }}" class="text-white-50 text-decoration-none">Contact Us</a>
        </li>
    </ul>
</div>

      <!-- Contact -->
      <div class="col-lg-3 col-md-6">
        <h5 class="fw-bold mb-3">Contact</h5>
        <p class="mb-2 text-white-50">
          <i class="fa fa-map-marker-alt me-2 text-warning"></i> 
          <a href="https://www.google.com/maps?q={{ urlencode($footer->address ?? 'Lebanon, Beirut') }}" 
             target="_blank" class="text-white-50 text-decoration-none">
            {{ $footer->address ?? 'Lebanon, Beirut' }}
          </a>
        </p>
        <p class="mb-2 text-white-50">
          <i class="fa fa-envelope me-2 text-warning"></i> 
          <a href="mailto:{{ $footer->email ?? 'support@iwaiter.com' }}" 
             class="text-white-50 text-decoration-none">
            {{ $footer->email ?? 'support@iwaiter.com' }}
          </a>
        </p>
        <p class="text-white-50">
          <i class="fa fa-phone me-2 text-warning"></i> 
          <a href="tel:{{ $footer->phone ?? '+96171978349' }}" class="text-white-50 text-decoration-none">
            {{ $footer->phone ?? '+961 71 978 349' }}
          </a>
        </p>
      </div>

      <!-- Newsletter -->
      <div class="col-lg-3 col-md-6">
        <h5 class="fw-bold mb-3">Stay Updated</h5>
        <p class="mb-3 text-white-50">Subscribe to get the latest updates & offers from iWaiter.</p>
        <form action="" method="POST" class="d-flex">
            @csrf
            <input type="email" name="email" class="form-control rounded-start-pill" placeholder="Your email" required>
            <button type="submit" class="btn btn-warning rounded-end-pill px-3">Go</button>
        </form>
      </div>

    </div>

    <hr class="border-light mt-4">

    <!-- Bottom -->
    <div class="row">
      <div class="col text-center">
        <p class="mb-0 small text-white-50">© <span id="year"></span> iWaiter. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>





<style>
  /* Footer link hover effect */
  .footer a {
    transition: color 0.3s ease, transform 0.2s ease;
  }

  .footer a:hover {
    color: #ffc107 !important; /* Bootstrap yellow (warning) */
    transform: translateY(-2px); /* small lift animation */
  }

  /* Social icons hover */
  .footer .fs-5:hover {
    color: #ffc107 !important;
    transform: scale(1.2); /* zoom in slightly */
  }
</style>