<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('education/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('education/css/icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('education/css/bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('education/css/magnific-popup.css') }}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('education/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('education/css/owl.theme.default.min.css') }}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset('education/css/flexslider.css') }}">

    <!-- Pricing -->
    <link rel="stylesheet" href="{{ asset('education/css/pricing.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('education/css/style.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('education/js/modernizr-2.6.2.min.js') }}"></script>

    @laravelPWA
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Header -->
            @include('components.header')

            <!-- Sidebar -->
            @include('components.navbar')

            <!-- Content -->
            @yield('main')

            <!-- Footer -->
            @include('components.footer')
        </div>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('education/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('education/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('education/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('education/js/jquery.waypoints.min.js') }}"></script>
    <!-- Stellar Parallax -->
    <script src="{{ asset('education/js/jquery.stellar.min.js') }}"></script>
    <!-- Carousel -->
    <script src="{{ asset('education/js/owl.carousel.min.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('education/js/jquery.flexslider-min.js') }}"></script>
    <!-- countTo -->
    <script src="{{ asset('education/js/jquery.countTo.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('education/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('education/js/magnific-popup-options.js') }}"></script>
    <!-- Count Down -->
    <script src="{{ asset('education/js/simplyCountdown.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('education/js/main.js') }}"></script>
    <script>
        var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

        // default example
        simplyCountdown('.simply-countdown-one', {
            year: d.getFullYear(),
            month: d.getMonth() + 1,
            day: d.getDate()
        });

        //jQuery example
        $('#simply-countdown-losange').simplyCountdown({
            year: d.getFullYear(),
            month: d.getMonth() + 1,
            day: d.getDate(),
            enableUtc: false
        });
    </script>
</body>

</html>
