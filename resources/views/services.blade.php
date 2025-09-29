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

<body>
    







    

<!-- Services Section -->
<section class="services section bg-white text-dark py-5 mt-5" id="services">
  <div class="container mt-5">
    <!-- Section Header -->
    <div class="row text-center mb-5">
      <div class="col">
        <h6 class="text-warning fw-semibold">Our Services</h6>
        <h2 class="fw-bold">What iWaiter Offers</h2>
        <p class="text-muted">
          iWaiter brings your restaurant to the digital era. Streamline your service, increase efficiency, and enhance customer satisfaction.
        </p>
      </div>
    </div>

    <!-- Services Cards -->
    <div class="row g-4">
      <!-- Service 1 -->
      <div class="col-lg-4 col-md-6">
        <div class="service-card bg-white shadow-lg rounded-4 p-5 text-center">
          <div class="icon mb-4 text-warning" style="font-size: 50px;">
            <i class="fas fa-tablet-alt"></i>
          </div>
          <h4 class="text-warning fw-bold mb-3">Digital Ordering</h4>
          <p class="text-dark mb-4">
            Let customers place orders from their tables using iPads.
            
          </p>
          <a href="#" class="btn btn-warning btn-sm fw-bold text-dark px-4 py-2" data-bs-toggle="modal" data-bs-target="#modal1">Read More</a>
        </div>
      </div>

      <!-- Service 2 -->
      <div class="col-lg-4 col-md-6">
        <div class="service-card bg-white shadow-lg rounded-4 p-5 text-center">
          <div class="icon mb-4 text-warning" style="font-size: 50px;">
            <i class="fas fa-receipt"></i>
          </div>
          <h4 class="text-warning fw-bold mb-3">Smart Billing</h4>
          <p class="text-dark mb-4">
            Automatically calculate bills and process payments directly.
          </p>
          <a href="#" class="btn btn-warning btn-sm fw-bold text-dark px-4 py-2" data-bs-toggle="modal" data-bs-target="#modal2">Read More</a>
        </div>
      </div>

      <!-- Service 3 -->
      <div class="col-lg-4 col-md-6">
        <div class="service-card bg-white shadow-lg rounded-4 p-5 text-center">
          <div class="icon mb-4 text-warning" style="font-size: 50px;">
            <i class="fas fa-utensils"></i>
          </div>
          <h4 class="text-warning fw-bold mb-3">Kitchen Integration</h4>
          <p class="text-dark mb-4">
            Orders go directly to the kitchen in real-time.
          </p>
          <a href="#" class="btn btn-warning btn-sm fw-bold text-dark px-4 py-2" data-bs-toggle="modal" data-bs-target="#modal3">Read More</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modals -->
<!-- Modal 1: Digital Ordering -->
<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="modal1Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title text-warning fw-bold" id="modal1Label">Digital Ordering</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          iWaiter's Digital Ordering allows customers to browse the menu and place orders directly from iPads at their tables.  
          No more waiting for waiters or handling errors from handwritten notes.  
          Orders are instantly transmitted to the kitchen, reducing mistakes and improving service speed.  
          Restaurants using this feature report faster table turnover and happier customers.
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Modal 2: Smart Billing -->
<div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title text-warning fw-bold" id="modal2Label">Smart Billing</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          iWaiter's Smart Billing automatically calculates the bill for each table, including taxes and discounts.  
          Customers can pay directly through the iPad using multiple payment options.  
          This reduces waiting time, improves accuracy, and provides a seamless dining experience.
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Modal 3: Kitchen Integration -->
<div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="modal3Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title text-warning fw-bold" id="modal3Label">Kitchen Integration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          Every order placed through iWaiter is instantly sent to the kitchen staff.  
          Chefs and cooks receive clear instructions with table numbers and special notes.  
          This integration minimizes errors, speeds up food preparation, and ensures customers get exactly what they ordered, improving overall satisfaction.
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS (needed for modals) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<style>
.service-card {
  transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.service-card:hover {
  transform: translateY(-10px) scale(1.03);
  box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12);
}
.service-card .btn {
  transition: transform 0.3s ease, background-color 0.3s ease;
}
.service-card .btn:hover {
  transform: scale(1.05);
  background-color: #e6b800; /* slightly darker yellow on hover */
}
</style>

<!-- Why Choose iWaiter Section -->
<section class="why-choose section bg-light text-dark py-5 mt-5" id="why-choose">
  <div class="container">
    <!-- Section Header -->
    <div class="row text-center mb-5">
      <div class="col">
        <h6 class="text-warning fw-semibold">Why iWaiter</h6>
        <h2 class="fw-bold">Benefits of Using iWaiter</h2>
        <p class="text-muted">
          Transform your restaurant operations and customer experience with our smart digital solutions.
        </p>
      </div>
    </div>

    <!-- Feature Cards -->
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="feature-card bg-white shadow-lg rounded-4 p-4 text-center">
          <div class="icon mb-3 text-warning" style="font-size:40px;">
            <i class="fas fa-clock"></i>
          </div>
          <h5 class="fw-bold mb-2">Faster Service</h5>
          <p class="text-dark">Reduce wait times and serve more customers efficiently with digital ordering.</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-card bg-white shadow-lg rounded-4 p-4 text-center">
          <div class="icon mb-3 text-warning" style="font-size:40px;">
            <i class="fas fa-user-friends"></i>
          </div>
          <h5 class="fw-bold mb-2">Happier Customers</h5>
          <p class="text-dark">Interactive iPads enhance customer experience and reduce errors.</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-card bg-white shadow-lg rounded-4 p-4 text-center">
          <div class="icon mb-3 text-warning" style="font-size:40px;">
            <i class="fas fa-chart-line"></i>
          </div>
          <h5 class="fw-bold mb-2">Increase Sales</h5>
          <p class="text-dark">Upsell dishes and special offers directly through iPads to boost revenue.</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="feature-card bg-white shadow-lg rounded-4 p-4 text-center">
          <div class="icon mb-3 text-warning" style="font-size:40px;">
            <i class="fas fa-cogs"></i>
          </div>
          <h5 class="fw-bold mb-2">Seamless Operation</h5>
          <p class="text-dark">Orders are sent instantly to the kitchen, improving workflow .</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Feature Card Hover Animation -->
<style>
.feature-card {
  transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.feature-card:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}
</style>




</body>
</html>