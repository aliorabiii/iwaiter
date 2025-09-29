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



<!-- About Us Section -->
<section class="about-section py-5 bg-light text-dark mt-5">
  <div class="container">
    <div class="row align-items-center pt-5">

      <!-- About Text Column -->
      <div class="col-lg-5 mb-5 mb-lg-0">
        <div class="section-heading">
          <h6 class="text-warning fw-semibold mb-3" style="letter-spacing:1px;">About iWaiter</h6>
          <h2 class="fw-bold mb-4">Revolutionizing Restaurant Service with iWaiter</h2>
          <p class="text-dark mb-4">
            iWaiter is a smart iPad system designed to replace traditional waiters, streamline restaurant operations, and enhance the dining experience.  
            Customers place orders instantly, bills are generated automatically, and the kitchen receives accurate instructions—all in real time.
          </p>
          <a href="{{ url('/contact') }}" class="btn btn-warning text-dark fw-semibold px-4 py-2">Get Started</a>
        </div>
      </div>

      <!-- Accordion Column -->
    <div class="col-lg-6">
  <div class="accordion" id="accordionExample">

    <!-- Accordion Item 1 -->
    <div class="accordion-item mb-3 shadow-sm rounded">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed bg-white text-dark fw-semibold" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapseOne" 
                aria-expanded="false" 
                aria-controls="collapseOne">
          How does iWaiter improve order accuracy?
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
        <div class="accordion-body text-dark">
          All orders are sent digitally to the kitchen instantly, eliminating human errors and ensuring customers receive exactly what they ordered.
        </div>
      </div>
    </div>

    <!-- Accordion Item 2 -->
    <div class="accordion-item mb-3 shadow-sm rounded">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed bg-white text-dark fw-semibold" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapseTwo" 
                aria-expanded="false" 
                aria-controls="collapseTwo">
          Can iWaiter speed up service?
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
        <div class="accordion-body text-dark">
          Yes! With iPads at every table, orders are processed immediately, boosting table turnover and overall efficiency.
        </div>
      </div>
    </div>

    <!-- Accordion Item 3 -->
    <div class="accordion-item mb-3 shadow-sm rounded">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed bg-white text-dark fw-semibold" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapseThree" 
                aria-expanded="false" 
                aria-controls="collapseThree">
          Is it easy for staff to use?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
        <div class="accordion-body text-dark">
          Absolutely! iWaiter is intuitive for both staff and customers, requiring minimal training and simplifying daily operations.
        </div>
      </div>
    </div>

  </div>
</div>


    </div>
  </div>
</section>



<!-- JS for toggle + / - -->
<script>


// js for send message 
document.getElementById('contactForm').addEventListener('submit', function(e){
    e.preventDefault();

    let formData = new FormData(this);
   
    .then(res => res.text())
    .then(data => {
        document.getElementById('contactAlert').innerHTML = 
            '<div class="alert alert-success">Message sent successfully!</div>';
        this.reset();
    })
    .catch(err => {
        document.getElementById('contactAlert').innerHTML = 
            '<div class="alert alert-danger">Failed to send message.</div>';
    });
});



document.querySelectorAll('.accordion-button').forEach(button => {
  button.addEventListener('click', () => {
    const collapse = button.parentElement.nextElementSibling; // the accordion content
    const icon = button.querySelector('.accordion-icon');

    // Toggle the 'show' class
    collapse.classList.toggle('show');

    // Optional: toggle arrow or icon text
    if(collapse.classList.contains('show')) {
      icon.textContent = '▲'; // up arrow when open
    } else {
      icon.textContent = '▼'; // down arrow when closed
    }
  });
});

</script>
<!-- Custom CSS -->
<style>
.about-section h2 {
  font-size: 2.2rem;
}
.about-section p {
  font-size: 1rem;
  line-height: 1.7;
}
.accordion-button {
  transition: all 0.3s ease;
  font-size: 1rem;
}
.accordion-button:focus {
  box-shadow: none;
}
.accordion-button:not(.collapsed) {
  background-color: #fff;
  color: #000;
}
.accordion-body {
  font-size: 0.95rem;
  line-height: 1.6;
}
.accordion-item {
  border: none;
}
.accordion-item:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
}
.btn-warning {
  transition: all 0.3s ease;
}
.btn-warning:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.accordion-arrow {
  display: inline-block;
  transition: transform 0.3s ease;
}

/* Rotate arrow when expanded */
.accordion-button:not(.collapsed) .accordion-arrow {
  transform: rotate(-180deg); /* points up */
}

</style>

<section class="iwaiter-features py-5 position-relative" style="background: white; overflow: hidden;">
  <div class="container text-center position-relative" style="z-index: 2;">
    <h6 class="text-warning fw-semibold mb-3" style="letter-spacing:2px;">Discover iWaiter</h6>
    <h2 class="fw-bold mb-4" style="font-size:2.5rem;">The Smart iPad Solution for Restaurants</h2>
    <p class="text-dark mb-5" style="font-size:1.1rem; max-width:700px; margin:auto;">
      iWaiter replaces traditional waiters with a smart, intuitive system. Orders go directly to the kitchen, bills are calculated automatically, and customer satisfaction skyrockets.
    </p>

    <!-- Floating Icons / Features -->
    <div class="features-floating position-relative">
      <!-- Digital Ordering -->
      <div class="feature-icon" style="top:10%; left:30%;" data-title="Digital Ordering" data-description="Customers place orders instantly from iPads.">
        <div class="icon-circle">
          <img src="assets/images/digital orderino.jpeg" alt="Digital Ordering">
        </div>
      </div>

      <!-- Smart Billing -->
      <div class="feature-icon" style="top:15%; left:60%;" data-title="Smart Billing" data-description="Automated billing and payment system.">
        <div class="icon-circle">
          <img src="assets/images/digital billino.jpeg" alt="Smart Billing">
        </div>
      </div>

      <!-- Kitchen Integration -->
      <div class="feature-icon" style="top:50%; left:30%;" data-title="Kitchen Integration" data-description="Orders sent instantly to the kitchen.">
        <div class="icon-circle">
          <img src="assets/images/kitchen integration.jpg" alt="Kitchen Integration">
        </div>
      </div>

      <!-- Analytics -->
      <div class="feature-icon" style="top:40%; left:50%;" data-title="Analytics Dashboard" data-description="Track performance and sales easily.">
        <div class="icon-circle">
          <img src="assets/images/analytics.png" alt="Analytics">
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.iwaiter-features {
  position: relative;
}

/* Set the iPad icon as a background for the floating section */
.features-floating {
  position: relative;
  height: 650px;
  background: url('assets/images/IPAD ICON.jpg') no-repeat center center;
  background-size: cover;
  /* subtle background effect */
}

/* Feature bubbles */
.feature-icon {
  position: absolute;
  cursor: pointer;
  animation: float 4s ease-in-out infinite;
}

.icon-circle {
  width: 200px;
  height: 200px;
  border-radius: 50%;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 12px 35px rgba(0,0,0,0.1);
  transition: transform 0.15s ease, box-shadow 0.15s ease;
}

.icon-circle img {
  width: 150px;
  height: 150px;
  object-fit: cover;
  border-radius: 50%;
  z-index: 2;
  transition: transform 0.15s ease, filter 0.15s ease;
}

.feature-icon:hover .icon-circle {
  transform: scale(1.3);
  box-shadow: 0 20px 50px rgba(0,0,0,0.25);
}

/* Tooltip */
.feature-icon::after {
  content: attr(data-title) " - " attr(data-description);
  position: absolute;
  top: -110px;
  left: 50%;
  transform: translateX(-50%);
  background: #ffc107;
  color: #000;
  padding: 10px 18px;
  font-size: 1rem;
  border-radius: 25px;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s ease, transform 0.3s ease;
}
.feature-icon:hover::after {
  opacity: 1;
  transform: translateX(-50%) translateY(-10px);
}

/* Floating animation */
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-12px); }
}
</style>





<!-- Bootstrap JS (ensure accordion works) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>







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