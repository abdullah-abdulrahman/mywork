<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tag Adv</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- StyleSheet Files -->
    @include('main.links.styles')

    @yield('styles')
</head>

<body>

    <!-- Header -->
    @include('main.inc.header')

    @yield('content')

    <!-- Footer -->
    @include('main.inc.footer')

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Script Files -->
    @include('main.links.scripts')

</body>
</html>