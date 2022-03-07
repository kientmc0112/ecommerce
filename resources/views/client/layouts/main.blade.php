<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Electronics - eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('client/assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/responsive.css') }}">
    <script src="{{ asset('client/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    @include('client.layouts.header')

    @yield('content')

    @include('client.layouts.footer')

    <script src="{{ asset('client/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/popper.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('client/assets/js/main.js') }}"></script>
</body>

</html>