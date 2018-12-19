<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('admin.links.styles')
  </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


  <!-- header -->
  @include('admin.inc.header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.inc.sidebar')

  <!-- Content Wrapper. Contains page content -->
   @yield('content')
  <!-- /.content-wrapper -->

  <!-- Footer -->
  @include('admin.inc.footer')

</div>
<!-- ./wrapper -->

  @include('admin.links.scripts')

</body>
</html>