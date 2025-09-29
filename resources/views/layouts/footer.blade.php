<footer class="footer text-white pt-5 pb-3" style="background: rgba(0, 0, 0, 1);">
  <div class="container">
    <div class="row gy-4">
      
      <!-- Brand / About -->
      <div class="col-lg-4 col-md-6 pb-5">
        <div class="footer-logo mb-3">
          <a href="{{ url('/index') }}">
            <img src="assets/images/logo.png" alt="iWaiter Logo" style="height: 80px; width: auto;">
          </a>
        </div>
        <p class="text-white-50">
          Smarter dining starts here. With iWaiter, customers enjoy faster, easier, and smarter ordering powered by iPad technology.
        </p>
        <div class="d-flex gap-3 mt-3">
          <a href="https://www.facebook.com/share/1SosscGsbA/?mibextid=wwXIfr" class="text-white fs-5"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/majd.j.rabie?igsh=Ymp2a205YXY2NjRy&utm_source=qr" class="text-white fs-5"><i class="fab fa-instagram"></i></a>
          <a href="https://www.linkedin.com/in/MajdRabie" class="text-white fs-5"><i class="fab fa-linkedin-in"></i></a>
          <a href="https://x.com/majd_rabie?s=21&t=HYHNw-K41Nr1RG2BUA8xVg" class="text-white fs-5"><i class="fab fa-twitter"></i></a>
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
          <li><a href="contact" class="text-white-50 text-decoration-none">Contact Us</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-lg-3 col-md-6">
        <h5 class="fw-bold mb-3">Contact</h5>
        <p class="mb-2 text-white-50">
          <i class="fa fa-map-marker-alt me-2 text-warning"></i> 
          <a href="https://www.google.com/maps?q=Beirut,Lebanon" target="_blank" class="text-white-50 text-decoration-none">
            Lebanon, Beirut
          </a>
        </p>
        <p class="mb-2 text-white-50">
          <i class="fa fa-envelope me-2 text-warning"></i> 
          <a href="mailto:support@iwaiter.com" class="text-white-50 text-decoration-none">
            support@iwaiter.com
          </a>
        </p>
        <p class="text-white-50">
          <i class="fa fa-phone me-2 text-warning"></i> 
          <a href="tel:+96171978349" class="text-white-50 text-decoration-none">
            +961 71 978 349
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