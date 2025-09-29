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


   

    <!-- HEADER AND FOOTER-->
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

<div id="topAlertContainer" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050; width: auto; max-width: 500px;"></div>


  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->



<section class="hero-banner position-relative d-flex align-items-center text-center text-white" style="height: 100vh; overflow: hidden;">

  <!-- Background Video -->
  <video autoplay muted loop playsinline class="position-absolute w-100 h-100 object-fit-cover" style="z-index:-1; object-fit:cover;">
    <source src="assets/images/banner bg.mp4" type="video/mp4">
    Your browser does not support the video tag.


  </video>

  <!-- Overlay -->
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.55); z-index:-1;"></div>

  <!-- Content -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <!-- Small tagline -->
        <span class="badge bg-light text-dark mb-3 px-3 py-2 fs-6 shadow-sm rounded-pill animate__animated animate__fadeInDown">🚀 Smarter Dining Starts Here</span>

        <!-- Main Title -->
        <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInUp">
          <span class="text-warning">IWaiter</span> Say goodbye to traditional waiters .

    {{--     <!-- Subtitle -->
        <p class="lead mb-5 animate__animated animate__fadeInUp animate__delay-1s">
          Say goodbye to traditional waiters – order faster, easier, and smarter with our iPad-powered service.
        </p> --}}

        <!-- Buttons -->
        <div class="d-flex justify-content-center gap-3 animate__animated animate__fadeInUp animate__delay-1s">
         <a href="{{ url('/features') }}" class="btn btn-warning btn-lg px-4 rounded-pill shadow">
  Explore Features
</a>


          
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Extra Styling -->
<style>
.hero-banner h1 span {
  text-shadow: 2px 2px 10px rgba(0,0,0,0.6);
}
.hero-banner p {
  text-shadow: 1px 1px 8px rgba(0,0,0,0.5);
}
.object-fit-cover {
  object-fit: cover;
}
</style>

<!-- Animate.css for smooth entrance effects -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>



  <!-- ***** Main Banner Area End ***** -->


<!-- Ultimate How It Works Section -->

<section class="how-it-works py-5 position-relative">
  <div class="container">
    <!-- Header -->
    <div class="text-center mb-5">
      <h2 class="fw-bold">Get Started in 3 Easy Steps</h2>
      <p class="text-muted">Manage your restaurant efficiently with our Smart iPad system—fast, easy, and professional.</p>
    </div>

    <!-- Timeline / Steps -->
    <div class="timeline d-flex justify-content-between align-items-start position-relative">
      <!-- Line -->
      <div class="timeline-line position-absolute top-50 start-0 w-100 translate-middle-y"></div>

      <!-- Step 1 -->
      <div class="timeline-step text-center">
        <div class="step-circle bg-primary text-white mx-auto mb-3">
          <i class="bi bi-person-plus-fill"></i>
        </div>
        <div class="step-card p-4 bg-white shadow-lg rounded">
          <h5 class="fw-bold mb-2">Sign Up & Setup</h5>
          <p>Create your account, configure settings, and set up your restaurant in minutes.</p>
          <img src="assets/images/sign up.jpg" alt="iPad Setup" class="step-ipad mt-3">
        </div>
      </div>

      <!-- Step 2 -->
      <div class="timeline-step text-center">
        <div class="step-circle bg-success text-white mx-auto mb-3">
          <i class="bi bi-layout-text-sidebar-reverse"></i>
        </div>
        <div class="step-card p-4 bg-white shadow-lg rounded">
          <h5 class="fw-bold mb-2">Manage Your Restaurant</h5>
          <p>Handle orders, inventory, staff schedules, and menus from one dashboard.</p>
          <img src="assets/images/manage.jpg" alt="iPad Manage" class="step-ipad mt-3">
        </div>
      </div>

      <!-- Step 3 -->
      <div class="timeline-step text-center">
        <div class="step-circle bg-warning text-dark mx-auto mb-3">
          <i class="bi bi-graph-up"></i>
        </div>
        <div class="step-card p-4 bg-white shadow-lg rounded">
          <h5 class="fw-bold mb-2">Grow & Optimize</h5>
          <p>Analyze reports, optimize operations and delight your customers.</p>
          <img src="assets/images/optimaize.jpg" alt="iPad Optimize" class="step-ipad mt-3">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CSS -->
<style>

/* Make all step images same size */
.step-ipad {
  width: 100%;
  max-width: 200px;  /* keep consistent size */
  height: 150px;     /* fixed height */
  object-fit: cover; /* crop nicely */
  display: block;
  margin: 0 auto;
}

/* Make sure all cards align equally */
.timeline-step {
  flex: 1;
  margin: 0 10px;
}

.timeline-step .step-card {
  min-height: 380px; /* adjust so all cards same height */
}


.how-it-works {
  background: linear-gradient(135deg, #f0f4f8 0%, #ffffff 100%);
  position: relative;
}

.timeline {
  position: relative;
  gap: 2rem;
}

.timeline-line {
  height: 4px;
  background-color: #ddd;
  top: 50%;
  left: 0;
  z-index: 1;
}

.timeline-step {
  width: 30%;
  position: relative;
  z-index: 2;
}

.step-circle {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.8rem;
  margin: 0 auto;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  transition: transform 0.3s;
}

.timeline-step:hover .step-circle {
  transform: scale(1.2);
}

.step-card {
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.05);
  padding: 1.5rem;
  transition: transform 0.4s, box-shadow 0.4s;
  overflow: hidden;
}

.step-card:hover {
  transform: translateY(-15px);
  box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

.step-ipad {
  width: 100%;
  max-width: 180px;
  margin-top: 1rem;
  border-radius: 15px;
  transition: transform 0.3s, box-shadow 0.3s;
}

.step-card:hover .step-ipad {
  transform: scale(1.05);
  box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}

/* Responsive */
@media (max-width: 991px) {
  .timeline {
    flex-direction: column;
    align-items: center;
  }
  .timeline-step {
    width: 80%;
    margin-bottom: 3rem;
  }
  .timeline-line {
    top: 0;
    left: 50%;
    width: 4px;
    height: 100%;
    transform: translateX(-50%);
  }
}
</style>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">





<section class="py-5 bg-white text-dark">
  <div class="container">
    
    <!-- Header -->
    <div class="row mb-5">
      <div class="col text-center">
        <h6 class="text-warning fw-bold">Our Courses</h6>
        <h2 class="fw-bold display-5">Latest Courses</h2>
        <p class="text-muted">Explore our most popular courses and enhance your skills.</p>
      </div>
    </div>

    <!-- Courses Grid -->
    <div class="row g-4">
      
      <!-- Course Card 1 -->
      <div class="col-lg-4 col-md-6 design">
        <a href="{{ url('/contact') }}" class="text-decoration-none">
          <div class="card h-100 shadow hover-scale">
            <img src="assets/images/introductry.webp" class="card-img-top course-img" alt="Course">
            <div class="card-body">
              <span class="badge bg-warning text-dark mb-2 rounded-pill">Introductory</span>
              <h5 class="card-title mt-2 fw-bold">Introductory course for restaurant owners and managers.</h5>
              <p class="text-muted mb-2 fw-bold">Duration: 5 hours</p>
              <p class="text-muted mb-2 fw-bold">Audience: Restaurant managers, supervisors.</p>
              <p class="text-muted mb-2 fw-bold">by Ali Orabi</p>
              <p class="fw-bold text-dark">$300</p>
            </div>
          </div>
        </a>
      </div>

      <!-- Course Card 2 -->
      <div class="col-lg-4 col-md-6 development">
        <a href="{{ url('/contact') }}" class="text-decoration-none">
          <div class="card h-100 shadow hover-scale">
            <img src="assets/images/management.jpg" class="card-img-top course-img" alt="Course">
            <div class="card-body">
              <span class="badge bg-warning text-dark mb-2 rounded-pill">Management</span>
              <h5 class="card-title mt-2 fw-bold">Kitchen & Order Management</h5>
              <p class="text-muted mb-2 fw-bold">Duration: 7 hours</p>
              <p class="text-muted mb-2 fw-bold">Audience: Kitchen staff.</p>
              <p class="text-muted mb-2 fw-bold">by Hassan Younis</p>
              <p class="fw-bold text-dark">$300</p>
            </div>
          </div>
        </a>
      </div>

      <!-- Course Card 3 -->
      <div class="col-lg-4 col-md-6 wordpress">
        <a href="{{ url('/contact') }}" class="text-decoration-none">
          <div class="card h-100 shadow hover-scale">
            <img src="assets/images/optimaize.webp" class="card-img-top course-img" alt="Course">
            <div class="card-body">
              <span class="badge bg-warning text-dark mb-2 rounded-pill">Optimization</span>
              <h5 class="card-title mt-2 fw-bold">Analytics & Business Optimization</h5>
              <p class="text-muted mb-2 fw-bold">Duration: 7 hours</p>
              <p class="text-muted mb-2 fw-bold">Audience: Restaurant owners & managers.</p>
              <p class="text-muted mb-2 fw-bold">by Majd Rabie</p>
              <p class="fw-bold text-dark">$300</p>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>
</section>

<!-- CSS -->
<style>
.course-img {
  height: 220px;       /* fixed height for all images */
  object-fit: cover;   /* crop images nicely */
}
.hover-scale:hover {
  transform: scale(1.03);
  transition: 0.3s ease-in-out;
}
</style>


<!-- agency section -->
<section class="py-5">
  <div class="container text-center">
    <h6 class="text-warning">Our Clients</h6>
    <h2 class="fw-bold mb-4">Restaurants That Trust iWaiter</h2>

    <div class="row g-4 align-items-center justify-content-center">
      <!-- Logo 1 -->
      <div class="col-6 col-md-3">
        <div class="logo-card">
          <img src="assets/images/1stlogo.webp" 
               class="img-fluid mx-auto d-block logo-img" alt="Restaurant 1">
        </div>
      </div>

      <!-- Logo 2 -->
      <div class="col-6 col-md-3">
        <div class="logo-card">
          <img src="assets/images/3rdlogo.jpg" 
               class="img-fluid mx-auto d-block logo-img" alt="Restaurant 2">
        </div>
      </div>

      <!-- Logo 3 -->
      <div class="col-6 col-md-3">
        <div class="logo-card">
          <img src="assets/images/1600w-Dvz9NG3gqk0.webp" 
               class="img-fluid mx-auto d-block logo-img" alt="Restaurant 3">
        </div>
      </div>

      <!-- Logo 4 -->
      <div class="col-6 col-md-3">
        <div class="logo-card">
          <img src="assets/images/4thlogo.png" 
               class="img-fluid mx-auto d-block logo-img" alt="Restaurant 4">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Custom CSS -->
<style>
  /* Remove card background & border */
  .logo-card {
    background: transparent !important;
    border: none !important;
    padding: 20px;
    transition: transform 0.3s ease, filter 0.3s ease;
  }

  /* Logo image hover effect */
  .logo-img {
    transition: transform 0.3s ease, filter 0.3s ease;
    max-height: 200px; /* keep them uniform */
    object-fit: contain;
  }

  /* Hover effect (scale + glow) */
  .logo-card:hover .logo-img {
    transform: scale(1.1);
    filter: drop-shadow(0px 4px 8px rgba(0,0,0,0.15));
  }
</style>


<!-- Custom CSS -->
<section class="py-5 bg-white text-dark" id="stats">
  <div class="container">
    <!-- Header -->
    <div class="row mb-5 text-center">
      <div class="col">
        <h6 class="text-warning fw-bold">Our Achievements</h6>
        <h2 class="fw-bold display-5">Facts & Stats</h2>
        <p class="text-muted">Some key metrics that showcase our expertise and growth.</p>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 text-center">
      <div class="col-lg-3 col-md-6">
        <div class="card shadow hover-scale p-4">
          <h2 class="counter text-warning mb-2" data-target="150">0</h2>
          <p class="fw-bold mb-0">Projects Completed</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card shadow hover-scale p-4">
          <h2 class="counter text-warning mb-2" data-target="320">0</h2>
          <p class="fw-bold mb-0">Happy Clients</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card shadow hover-scale p-4">
          <h2 class="counter text-warning mb-2" data-target="500">0</h2>
          <p class="fw-bold mb-0">Hours Worked</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card shadow hover-scale p-4">
          <h2 class="counter text-warning mb-2" data-target="80">0</h2>
          <p class="fw-bold mb-0">Team Members</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Custom CSS -->
<style>
  /* Card hover effect */
  .hover-scale {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 0.5rem;
  }
  .hover-scale:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
  }

  /* Counter style */
  .counter {
    font-size: 2.5rem;
    font-weight: 700;
  }
</style>

<!-- Counter JS: start when scrolled into view -->
<script>
  function animateCounter(el) {
    const target = +el.getAttribute('data-target');
    const duration = 2000;
    let start = 0;
    const stepTime = Math.abs(Math.floor(duration / target));

    const counterInterval = setInterval(() => {
      start += 1;
      el.textContent = start;
      if (start >= target) clearInterval(counterInterval);
    }, stepTime);
  }

  function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
      rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.bottom >= 0
    );
  }

  const counters = document.querySelectorAll('.counter');
  let counted = false;

  window.addEventListener('scroll', () => {
    const statsSection = document.getElementById('stats');
    if (!counted && isElementInViewport(statsSection)) {
      counters.forEach(counter => animateCounter(counter));
      counted = true;
    }
  });
</script>









<!-- Updated Team Section -->
<section class="team section bg-white py-5" id="team">
  <div class="container">
    <div class="row mb-5 text-center">
      <div class="col">
        <h6 class="text-warning fw-bold">Meet Our Team</h6>
        <h2 class="fw-bold display-5">Our Experts</h2>
        <p class="text-muted">Learn from professionals who bring expertise and passion to every project.</p>
      </div>
    </div>

    <div class="row g-4 justify-content-center">
      <!-- Member 1 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow hover-scale text-center border-0 team-card">
          <div class="team-img-wrapper">
            <img src="assets/images/ali.png" class="card-img-top team-img" alt="Ali Orabi">
          </div>
          <div class="card-body">
            <span class="text-warning fw-bold">Full Stack Developer</span>
            <h5 class="mt-2">Ali Orabi</h5>
            <ul class="list-inline mt-2">
              <li class="list-inline-item"><a href="#" class="text-warning fs-5"><i class="fab fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#" class="text-warning fs-5"><i class="fab fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Member 2 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow hover-scale text-center border-0 team-card">
          <div class="team-img-wrapper">
            <img src="assets/images/mjd.png" class="card-img-top team-img " alt="Majd Rabie">
          </div>
          <div class="card-body">
            <span class="text-warning fw-bold">IT Specialist</span>
            <h5 class="mt-2">Majd Rabie</h5>
            <ul class="list-inline mt-2">
              <li class="list-inline-item"><a href="https://www.facebook.com/share/1SosscGsbA/?mibextid=wwXIfr" class="text-warning fs-5"><i class="fab fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="https://www.linkedin.com/in/MajdRabie" class="text-warning fs-5"><i class="fab fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Member 3 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow hover-scale text-center border-0 team-card">
          <div class="team-img-wrapper">
            <img src="assets/images/hassan.png" class="card-img-top team-img" alt="Hassan Younis">
          </div>
          <div class="card-body">
            <span class="text-warning fw-bold">Web Developer</span>
            <h5 class="mt-2">Hassan Younis</h5>
            <ul class="list-inline mt-2">
              <li class="list-inline-item"><a href="#" class="text-warning fs-5"><i class="fab fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="https://www.linkedin.com/in/hasan-younes-69b2b82b1?" class="text-warning fs-5"><i class="fab fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Custom CSS -->
<style>
  /* Keep all cards same size */
  .team-card {
    max-height: 360px;
    border-radius: 0.5rem;
    overflow: hidden;
    background-color: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  /* Image wrapper to contain faces */
  .team-img-wrapper {
    height: 180px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }

  .team-img {
    max-height: 100%;
    width: auto;
    object-fit: contain; /* Keep face visible */
  }

  /* Card hover animation */
  .hover-scale:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
  }

  /* Text styling */
  .card-body h5 {
    font-weight: 600;
    color: #212529;
    font-size: 1.1rem;
  }
  .card-body span {
    font-size: 0.95rem;
    letter-spacing: 0.5px;
  }

  /* Social icons hover */
  .list-inline-item a:hover {
    color: #ffc107;
    transform: translateY(-2px);
    transition: 0.2s;
  }

  /* Scroll fade-in animation */
  .team-card {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease-out;
  }
  .team-card.visible {
    opacity: 1;
    transform: translateY(0);
  }
</style>

<!-- Scroll Animation JS -->
<script>
  const teamCards = document.querySelectorAll('.team-card');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if(entry.isIntersecting){
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });
  teamCards.forEach(card => observer.observe(card));
</script>


<section class="section schedule bg-light py-5" id="schedule">
  <div class="container">
    <!-- Section Header -->
    <div class="row mb-5">
      <div class="col text-center">
        <h6 class="text-warning fw-bold">Schedule</h6>
        <h2 class="fw-bold display-5">Smart Service in Action</h2>
        <p class="text-muted">
          See how our smart iPad waiter system streamlines your restaurant workflow every day.
        </p>
      </div>
    </div>

    <!-- Schedule Cards -->
    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow border-0 schedule-card text-center animate-up">
          <div class="card-body p-4">
            <div class="icon mb-3">
              <i class="fas fa-utensils fa-3x text-warning"></i>
            </div>
            <h5 class="fw-bold">Instant Ordering</h5>
            <p class="text-muted">
              Customers browse the digital menu and place orders directly on the iPad, reducing wait times.
            </p>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow border-0 schedule-card text-center animate-up delay-1">
          <div class="card-body p-4">
            <div class="icon mb-3">
              <i class="fas fa-concierge-bell fa-3x text-warning"></i>
            </div>
            <h5 class="fw-bold">Smart Scheduling</h5>
            <p class="text-muted">
              Orders are synced with the kitchen instantly, helping staff manage peak hours efficiently.
            </p>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow border-0 schedule-card text-center animate-up delay-2">
          <div class="card-body p-4">
            <div class="icon mb-3">
              <i class="fas fa-credit-card fa-3x text-warning"></i>
            </div>
            <h5 class="fw-bold">Seamless Payment</h5>
            <p class="text-muted">
              Customers can pay directly via the iPad, ensuring a fast, contactless, and convenient checkout.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Styles -->
<style>
  .schedule-card {
    border-radius: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: #fff;
  }
  .schedule-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
  }
  .icon i {
    transition: transform 0.3s ease;
  }
  .schedule-card:hover .icon i {
    transform: scale(1.1);
  }

  /* Animation on scroll */

  
  .animate-up.visible {
    opacity: 1;
    transform: translateY(0);
    transition: all 0.7s ease-out;
  }
  .delay-1 { transition-delay: 0.2s; }
  .delay-2 { transition-delay: 0.4s; }
</style>

<!-- Scroll Animation Script -->
<script>
  const cards = document.querySelectorAll('.animate-up');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });
  cards.forEach(card => observer.observe(card));
</script>

<!-- Scroll Animation Script -->



<!-- Scroll Animation JS -->

 







<script>
window.addEventListener('DOMContentLoaded', () => {
    const topAlertContainer = document.getElementById('topAlertContainer');

    @if(session('success'))
        topAlertContainer.innerHTML = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>`;
    @elseif($errors->any())
        topAlertContainer.innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('email') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>`;
    @endif

    // Scroll to alert if exists
    const alertEl = topAlertContainer.querySelector('.alert');
    if(alertEl){
        topAlertContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
        setTimeout(() => alertEl.classList.remove('show'), 5000); // auto-hide
    }
});
</script>





<!-- Auto Year Script -->
<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>


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