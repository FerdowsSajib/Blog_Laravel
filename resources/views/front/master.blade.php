<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> @yield('front-title') </title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/') }}front/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/') }}front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}front/css/modern-business.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
@include('front.include.navigation')

@yield('front-body')

<!-- Footer -->
@include('front.include.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('/') }}front/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('/') }}front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
