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

<body >







<!-- Testimonials Section -->
<section class="testimonials py-5 bg-light text-dark">
  <div class="container pt-5">
    <div class="row align-items-center">

      <!-- Heading -->
      <div class="col-lg-5 mb-lg-0">
        <div class="section-heading pe-lg-4">
          <h6 class="text-warning fw-semibold">Testimonials</h6>
          <h2 class="fw-bold">What Our Clients Say</h2>
          <p class="text-muted">
            Restaurants using <span class="text-warning fw-bold">iWaiter</span> 
            enjoy smoother operations, fewer mistakes, and happier customers.  
            Here’s what some of them had to say.
          </p>
        </div>
      </div>

      <!-- Testimonials Carousel -->
      <div class="col-lg-7 pt-5">
        <div class="owl-carousel owl-testimonials">

          <!-- Testimonial 1 -->
          <div class="item bg-white shadow-lg rounded-4 p-4 position-relative testimonial-card">
            <p class="mb-4 text-dark">
              "iWaiter has completely changed the way we serve customers. Orders go 
              directly from the table to the kitchen, saving us time and avoiding mistakes."
            </p>
            <div class="author d-flex align-items-center mt-3">
              <img src="assets/images/resturant owner.jpg" 
                   class="rounded-circle me-3" alt="Restaurant Owner">
              <div>
                <span class="text-warning fw-semibold small">Restaurant Manager</span>
                <h6 class="mb-0 fw-bold">Maria Lobez</h6>
              </div>
            </div>
          </div>

          <!-- Testimonial 2 -->
          <div class="item bg-white shadow-lg rounded-4 p-4 position-relative testimonial-card">
            <p class="mb-4 text-dark">
              "Our staff productivity has doubled since using iWaiter. Customers 
              enjoy faster service and we can focus more on hospitality."
            </p>
            <div class="author d-flex align-items-center mt-3">
              <img src="assets/images/resturant manager.jpg" 
                   class="rounded-circle me-3" alt="Restaurant Manager">
              <div>
                <span class="text-warning fw-semibold small">Restaurant Owner</span>
                <h6 class="mb-0 fw-bold">Omar Jamal</h6>
              </div>
            </div>
          </div>

          <!-- Testimonial 3 -->
          <div class="item bg-white shadow-lg rounded-4 p-4 position-relative testimonial-card">
            <p class="mb-4 text-dark">
              "iWaiter is so easy to use! Customers place their orders in seconds, 
              and our kitchen team gets them instantly. It boosted efficiency and sales."
            </p>
            <div class="author d-flex align-items-center mt-3">
              <img src="assets/images/resturant head chef.jpeg" 
                   class="rounded-circle me-3" alt="Head Chef">
              <div>
                <span class="text-warning fw-semibold small">Head Chef</span>
                <h6 class="mb-0 fw-bold">Omar Khalil</h6>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- Client Logos Section -->
<section class="client-logos py-5 bg-white">
  <div class="container">
    <div class="row text-center mb-4">
      <div class="col">
        <h6 class="text-warning fw-semibold">Trusted By</h6>
        <h2 class="fw-bold">Our Valued Clients</h2>
        <p class="text-muted">
          We work with restaurants of all sizes, helping them streamline operations and delight customers.
        </p>
      </div>
    </div>

    <div class="row justify-content-center align-items-center g-4">
      <!-- Logo 1 -->
      <div class="col-6 col-md-3 col-lg-2 text-center">
        <img src="assets/images/1stlogo.webp" alt="Client 1" class="img-fluid client-logo">
      </div>
      <!-- Logo 3 -->
      <div class="col-6 col-md-3 col-lg-2 text-center">
        <img src="assets/images/3rdlogo.jpg" alt="Client 3" class="img-fluid client-logo">
      </div>
      <!-- Logo 4 -->
      <div class="col-6 col-md-3 col-lg-2 text-center">
        <img src="assets/images/4thlogo.png" alt="Client 4" class="img-fluid client-logo">
      </div>
      <!-- Logo 5 -->
      <div class="col-6 col-md-3 col-lg-2 text-center">
        <img src="assets/images/1600w-Dvz9NG3gqk0.webp" alt="Client 5" class="img-fluid client-logo">
      </div>
    </div>
  </div>
</section>

<!-- Additional CSS -->
<style>
/* Testimonials Cards */
.owl-testimonials .item {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  min-height: 250px; /* increase card height */
}
.owl-testimonials .item:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}
.testimonial-card img {
 
  height: 100px;
  object-fit: cover;
  border: 2px solid #ffc107;
}

/* Client Logos Hover Animation */
.client-logo {
  filter: grayscale(100%);
  transition: filter 0.3s ease, transform 0.3s ease;
  max-height: 150px;
}
.client-logo:hover {
  filter: grayscale(0%);
  transform: scale(1.1);
}
</style>





  
</body>
















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


  

</html>