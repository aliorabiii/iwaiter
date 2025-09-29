

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
    
<section class="contact-us py-5 bg-white" id="contact">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- Left Section -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="section-heading">
          <h6 class="text-uppercase text-warning fw-semibold">Contact Us</h6>
          <h2 class="fw-bold mb-3 text-dark">We’d love to hear from you</h2>
          <p class="text-muted">
            Have questions about iWaiter or want to see how our smart iPad system can
            streamline your restaurant operations? Drop us a message and our team will
            get back to you quickly.
          </p>

          <!-- Subtle Offer Card -->
          <div class="p-4 mt-4 bg-light rounded shadow-sm border-0">
            <h6 class="mb-1 text-muted">Special Offer</h6>
            <h4 class="fw-bold text-dark">50% OFF for early adopters</h4>
            <small class="text-muted">Valid until 24 April 2036</small>
          </div>
        </div>
      </div>

      <!-- Right Section (Form) -->
      <div class="col-lg-6">
        <div class="bg-light rounded shadow-sm p-4">

         @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
@endif

@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


         <form action="" method="POST">
    @csrf
    <input type="text" name="name" class="form-control mb-3" placeholder="Your Name">
    <input type="email" name="email" class="form-control mb-3" placeholder="Your Email">
    <textarea name="message" class="form-control mb-3" rows="5" placeholder="Your Message"></textarea>
    <button type="submit" class="btn btn-warning">Send Message</button>
</form>

        </div>
      </div>

    </div>
  </div>
</section>


</body>

</body>
</html>

