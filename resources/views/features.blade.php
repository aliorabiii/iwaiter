<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>IWaiter</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    @extends('layouts.header')
    @extends('layouts.footer')

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-scholar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  </head>

<body class="mt-5">

<!-- iWaiter Experience Section -->
<section id="iwaiter-experience" style="background: linear-gradient(135deg, #fff8e1, #ffffff); padding: 100px 20px; position: relative; overflow: hidden;">
  <div class="container " style="max-width:1200px; margin:auto; position:relative;">
    
    <!-- Section Header -->
    <div style="text-align:center; margin-bottom:60px;">
      <h6 style="color:#ffc107; font-weight:600; letter-spacing:1px;">The iWaiter Experience</h6>
      <h2 style="font-size:2.8rem; font-weight:700; margin-top:10px;">Smart Service That Replaces Waiters</h2>
      <p style="color:#555; max-width:700px; margin:15px auto 0;">
        iWaiter revolutionizes restaurant service. Faster orders, happier customers, and seamless kitchen integration—all from a smart iPad system.
      </p>
    </div>

    <!-- Feature Cards (STATIC - Original) -->
    <div class="features-wrapper" style="display:flex; justify-content:space-around; flex-wrap:wrap; gap:40px; position:relative; z-index:2;">
      <div class="feature-card" data-feature>
        <div class="icon">⚡</div>
        <h4>Instant Orders</h4>
        <p>Orders go directly to the kitchen, reducing wait time and mistakes.</p>
      </div>

      <div class="feature-card" data-feature>
        <div class="icon">😊</div>
        <h4>Happy Customers</h4>
        <p>Customers enjoy interactive menus and faster service at their table.</p>
      </div>

      <div class="feature-card" data-feature>
        <div class="icon">💰</div>
        <h4>Boost Sales</h4>
        <p>Upsell dishes and track popular items for maximum revenue.</p>
      </div>

      <div class="feature-card" data-feature>
        <div class="icon">⚙️</div>
        <h4>Seamless Operations</h4>
        <p>Streamlined workflow from table to kitchen reduces errors.</p>
      </div>
    </div>
</section>

<!-- Features Section (DYNAMIC from DB) -->
<section class="features-section py-5 bg-light">
  <div class="container">
    <!-- Section Header -->
    <div class="text-center mb-5 mt-5">
      <h2 class="fw-bold">All-in-One Features for Modern Restaurants</h2>
      <p class="text-muted">Explore our smart iPad features designed to streamline your restaurant operations.</p>
    </div>

    <!-- Features Grid -->
    <div class="row g-4">
      @foreach($features as $feature)
      <div class="col-md-4">
        <div class="feature-card d-flex flex-column align-items-center p-4 bg-white shadow-lg rounded-4 hover-effect">
          @if($feature->icon)
            <i class="{{ $feature->icon }} display-4 text-primary mb-3"></i>
          @endif

          <h5 class="fw-bold mb-2">{{ $feature->title }}</h5>
          <p class="text-muted text-center">{{ $feature->description }}</p>

          @if($feature->image)
            <img src="{{ asset('storage/'.$feature->image) }}" alt="{{ $feature->title }}" class="feature-img mt-auto">
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Custom CSS -->
<style>
.features-wrapper {
  position:relative;
  z-index:2;
}
.feature-card {
  padding:30px 20px;
  border-radius:20px;
  box-shadow:0 15px 35px rgba(0,0,0,0.1);
  width:250px;
  text-align:center;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  cursor:pointer;
}
.feature-card .icon {
  font-size:3rem;
  margin-bottom:15px;
  color:#ffc107;
  transition: transform 0.4s ease;
}
.feature-card h4 {
  font-weight:700;
  margin-bottom:10px;
}
.feature-card p {
  color:#555;
  font-size:0.95rem;
  line-height:1.5;
}
.feature-card:hover {
  transform: translateY(-15px) rotate(-2deg) scale(1.05);
  box-shadow:0 30px 50px rgba(0,0,0,0.15);
}
.feature-card:hover .icon {
  transform: rotate(10deg) scale(1.2);
}
.feature-card .feature-img {
  width: 100%;
  max-width: 180px;
  object-fit: contain;
  margin-top: 20px;
  transition: transform 0.3s ease;
}
.feature-card:hover .feature-img {
  transform: scale(1.05);
}
.feature-card p {
  flex-grow: 1;
}

/* Responsive */
@media(max-width:992px){
  .ipad-mockup { position:static; transform:none; margin:50px auto 0; }
  .features-wrapper { justify-content:center; }
}
</style>

<!-- Optional JS: floating animation for static cards -->
<script>
const features = document.querySelectorAll('[data-feature]');
features.forEach(card=>{
  let offset = Math.random()*10;
  card.animate([
    { transform: `translateY(0px)` },
    { transform: `translateY(${offset}px)` },
    { transform: `translateY(0px)` }
  ], {
    duration: 4000 + Math.random()*2000,
    iterations: Infinity,
    direction: 'alternate'
  });
});
</script>

<!-- Auto Year Script -->
<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>

<!-- Bootstrap CSS + JS + Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"> 

<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('assets/js/counter.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

  </body>
</html>
