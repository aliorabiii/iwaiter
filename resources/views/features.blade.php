
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

<!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
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

    <!-- Feature Cards -->
    <div class="features-wrapper" style="display:flex; justify-content:space-around; flex-wrap:wrap; gap:40px; position:relative; z-index:2;">
      <!-- Feature Card 1 -->
      <div class="feature-card" data-feature>
        <div class="icon">⚡</div>
        <h4>Instant Orders</h4>
        <p>Orders go directly to the kitchen, reducing wait time and mistakes.</p>
      </div>

      <!-- Feature Card 2 -->
      <div class="feature-card" data-feature>
        <div class="icon">😊</div>
        <h4>Happy Customers</h4>
        <p>Customers enjoy interactive menus and faster service at their table.</p>
      </div>

      <!-- Feature Card 3 -->
      <div class="feature-card" data-feature>
        <div class="icon">💰</div>
        <h4>Boost Sales</h4>
        <p>Upsell dishes and track popular items for maximum revenue.</p>
      </div>

      <!-- Feature Card 4 -->
      <div class="feature-card" data-feature>
        <div class="icon">⚙️</div>
        <h4>Seamless Operations</h4>
        <p>Streamlined workflow from table to kitchen reduces errors.</p>
      </div>
    </div>

    <!-- iPad Mockup -->
  
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

/* Responsive */
@media(max-width:992px){
  .ipad-mockup { position:static; transform:none; margin:50px auto 0; }
  .features-wrapper { justify-content:center; }
}
</style>

<!-- Optional JS: floating animation for cards -->
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




<!-- Features Section -->
<section class="features-section py-5 bg-light">
  <div class="container">
    <!-- Section Header -->
    <div class="text-center mb-5 mt-5">
      <h2 class="fw-bold">All-in-One Features for Modern Restaurants</h2>
      <p class="text-muted">Explore our smart iPad features designed to streamline your restaurant operations.</p>
    </div>

    <!-- Features Grid -->
    <div class="row g-4">
      <!-- Feature Item Template -->
      <div class="col-md-4">
        <div class="feature-card d-flex flex-column align-items-center p-4 bg-white shadow-lg rounded-4 hover-effect">
          <i class="bi bi-receipt-cutoff display-4 text-primary mb-3"></i>
          <h5 class="fw-bold mb-2">Order Management</h5>
          <p class="text-muted text-center">Track orders from kitchen to table seamlessly with real-time updates.</p>
          <img src="assets/images/order management.webp" alt="Order Management" class="feature-img mt-auto">
        </div>
      </div>

      <div class="col-md-4">
        <div class="feature-card d-flex flex-column align-items-center p-4 bg-white shadow-lg rounded-4 hover-effect">
          <i class="bi bi-box-seam display-4 text-success mb-3"></i>
          <h5 class="fw-bold mb-2">Inventory Tracking</h5>
          <p class="text-muted text-center">Receive automated stock alerts to reduce waste and optimize resources.</p>
          <img src="assets/images/inventory tracking.jpg" alt="Inventory Tracking" class="feature-img mt-auto">
        </div>
      </div>

      <div class="col-md-4">
        <div class="feature-card d-flex flex-column align-items-center p-4 bg-white shadow-lg rounded-4 hover-effect">
          <i class="bi bi-people-fill display-4 text-warning mb-3"></i>
          <h5 class="fw-bold mb-2">Staff Scheduling</h5>
          <p class="text-muted text-center">Optimize shifts, track attendance, and manage payroll effortlessly.</p>
          <img src="assets/images/staff sceduale.jpg" alt="Staff Scheduling" class="feature-img mt-auto">
        </div>
      </div>

      <div class="col-md-4">
        <div class="feature-card d-flex flex-column align-items-center p-4 bg-white shadow-lg rounded-4 hover-effect">
          <i class="bi bi-journal-text display-4 text-danger mb-3"></i>
          <h5 class="fw-bold mb-2">Menu Management</h5>
          <p class="text-muted text-center">Update menus instantly and manage pricing with ease.</p>
          <img src="assets/images/menu management.jpeg" alt="Menu Management" class="feature-img mt-auto">
        </div>
      </div>

      <div class="col-md-4">
        <div class="feature-card d-flex flex-column align-items-center p-4 bg-white shadow-lg rounded-4 hover-effect">
          <i class="bi bi-chat-left-text display-4 text-info mb-3"></i>
          <h5 class="fw-bold mb-2">Customer Feedback</h5>
          <p class="text-muted text-center">Collect ratings, reviews, and feedback to enhance customer satisfaction.</p>
          <img src="assets/images/resturant feedback.png" alt="Customer Feedback" class="feature-img mt-auto">
        </div>
      </div>

      <div class="col-md-4">
        <div class="feature-card d-flex flex-column align-items-center p-4 bg-white shadow-lg rounded-4 hover-effect">
          <i class="bi bi-bar-chart-line display-4 text-secondary mb-3"></i>
          <h5 class="fw-bold mb-2">Analytics Dashboard</h5>
          <p class="text-muted text-center">Visualize sales, trends, and performance metrics in a user-friendly dashboard.</p>
          <img src="assets/images/analytics dashboard.png" alt="Analytics Dashboard" class="feature-img mt-auto">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Custom CSS -->
<style>
.feature-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 100%;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
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
</style>




<!-- Auto Year Script -->
<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>

<!-- Bootstrap CSS + JS + Icons (include if not already in your project) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"> 





  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
 <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('assets/js/counter.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>


  </body>
</html>