  <!-- JavaScript libraries -->
  <script src="{{url('/')}}/main_assets/lib/jquery/jquery.min.js"></script>
  <script src="{{url('/')}}/main_assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="{{url('/')}}/main_assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{url('/')}}/main_assets/lib/easing/easing.min.js"></script>
  <script src="{{url('/')}}/main_assets/lib/superfish/hoverIntent.js"></script>
  <script src="{{url('/')}}/main_assets/lib/superfish/superfish.min.js"></script>
  <script src="{{url('/')}}/main_assets/lib/wow/wow.min.js"></script>
  <script src="{{url('/')}}/main_assets/lib/waypoints/waypoints.min.js"></script>
  <script src="{{url('/')}}/main_assets/lib/counterup/counterup.min.js"></script>
  <script src="{{url('/')}}/main_assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="{{url('/')}}/main_assets/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="{{url('/')}}/main_assets/lib/lightbox/js/lightbox.min.js"></script>
  <script src="{{url('/')}}/main_assets/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{url('/')}}/main_assets/contactform/contactform.js"></script>

  <!-- Sweet Alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- Template Main Javascript File -->
  <script src="{{url('/')}}/main_assets/js/main.js"></script>

  
<script>
  @if(session('message-success') !== null)
    swal({
      text: "Your message has been sent successfully",
      icon: "success",
    }); 
  @endif

  @if(session('message-failure') !== null)
    swal({
      text: "Failed to send message",
      icon: "warning",
    }); 
  @endif

  @if(session('newsletter-success') !== null)
    swal({
      text: "Your email has been sent successfully!",
      icon: "success",
    }); 
  @endif

  @if(session('newsletter-failure') !== null)
    swal({
      text: "Failed to subscribe, Invalid Email!",
      icon: "warning",
    }); 
  @endif
</script>