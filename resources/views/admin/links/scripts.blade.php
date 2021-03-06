<!-- jQuery 3 -->
<script src="{{url('/')}}/admin_assets/bower_components/jquery/dist/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{url('/')}}/admin_assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="{{url('/')}}/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Morris.js charts -->
<script src="{{url('/')}}/admin_assets/bower_components/raphael/raphael.min.js"></script>
<script src="{{url('/')}}/admin_assets/bower_components/morris.js/morris.min.js"></script>

<!-- Sparkline -->
<script src="{{url('/')}}/admin_assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jvectormap -->
<script src="{{url('/')}}/admin_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{url('/')}}/admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- jQuery Knob Chart -->
<script src="{{url('/')}}/admin_assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

<!-- daterangepicker -->
<script src="{{url('/')}}/admin_assets/bower_components/moment/min/moment.min.js"></script>
<script src="{{url('/')}}/admin_assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- datepicker -->
<script src="{{url('/')}}/admin_assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('/')}}/admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- Slimscroll -->
<script src="{{url('/')}}/admin_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="{{url('/')}}/admin_assets/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="{{url('/')}}/admin_assets/dist/js/adminlte.min.js"></script>

<!-- Custom -->
<script src="{{url('/')}}/admin_assets/dist/js/custom.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('/')}}/admin_assets/dist/js/pages/dashboard.js"></script>

<!-- ckeditor -->
<script src="{{url('/')}}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

<!-- AdminLTE for demo purposes -->
<script src="{{url('/')}}/admin_assets/dist/js/demo.js"></script>

<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  @if(session('create-success') !== null)
    swal({
      text: "Created successfully",
      icon: "success",
    }); 
  @endif

  @if(session('create-failure') !== null)
    swal({
      text: "Failed to create!",
      icon: "warning",
    }); 
  @endif

  @if(session('edit-success') !== null)
    swal({
      text: "Edited successfully!",
      icon: "success",
    }); 
  @endif

  @if(session('edit-failure') !== null)
    swal({
      text: "Failed to edit!",
      icon: "warning",
    }); 
  @endif
</script>