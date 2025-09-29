<header class="header-area header-sticky bg-dark bg-opacity-75 fixed-top shadow-sm">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-dark">
          
          <!-- Logo -->
          <a class="navbar-brand fw-bold fs-3 text-warning" href="{{ url('/index') }}">
            <img src="assets/images/logo.png" alt="iWaiter Logo" style="height: 90px; width: auto;">
          </a>

          <!-- Mobile Toggle -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Menu -->
          <div class="collapse navbar-collapse justify-content-end" id="navMenu">
            <ul class="navbar-nav mb-2 mb-lg-0">
             <li class="nav-item">
    <a class="nav-link {{ Request::is('index') ? 'active' : '' }}" href="{{ url('index') }}">Home</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About Us</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('features') ? 'active' : '' }}" href="{{ url('/features') }}">Features</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('services') ? 'active' : '' }}" href="{{ url('/services') }}">Services</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('testimonials') ? 'active' : '' }}" href="{{ url('/testimonials') }}">Testimonials</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact Us</a>
</li>

            </ul>
          </div>

        </nav>
      </div>
    </div>
  </div>
</header>
<style>
.header-area .nav-link {
  font-weight: 500;
  transition: color 0.3s ease;
}
.header-area .nav-link:hover,
.header-area .nav-link.active {
  color: #ffc107 !important; /* Bootstrap warning color */
}

</style>