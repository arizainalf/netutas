<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('learn/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('learn/css/icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('learn/css/bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('learn/css/magnific-popup.css') }}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('learn/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('learn/css/owl.theme.default.min.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('learn/css/style.css') }}">

    <style>
        .fh5co-nav .top-menu {
            padding: 5px 0;
        }

        .fh5co-nav .top {
            padding: 3px 0;
            margin-bottom: 0;
        }

        /* CSS untuk membuat navbar tetap di atas layar */
        .fixed-navbar {
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            /* Pastikan navbar berada di atas elemen lain */
        }

        .sticky-navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            /* Pastikan navbar berada di atas elemen lain */
        }

        /* Navbar transparan */
        .transparent-navbar {
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        /* Navbar berwarna setelah di-scroll */
        .colored-navbar {
            background-color: rgb(0, 0, 0);
            transition: background-color 0.3s ease;
        }

        .fh5co-cover .display-t,
        .fh5co-cover .display-tc {
            z-index: 9;
            height: 350px;
            display: table;
            width: 100%;
        }

        .fh5co-cover {
            height: 475px;
            background-size: cover;
            background-position: top center;
            background-repeat: no-repeat;
            position: relative;
            float: left;
            width: 100%;
        }

        #fh5co-explore .fh5co-explore1 {
            margin-bottom: 4em;
        }

        .mt {
            margin-top: 40px;
        }

        #fh5co-testimonial .testimony-slide figure img {
            width: 250px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 10%;
        }

        .fh5co-heading {
            margin-bottom: 1em;
        }

        #fh5co-explore,
        #fh5co-pricing,
        #fh5co-testimonial,
        #fh5co-started,
        #fh5co-project,
        #fh5co-blog,
        #fh5co-contact,
        #fh5co-footer {
            padding: 3em 0;
            clear: both;
        }

        @media screen and (max-width: 768px) {

            #fh5co-explore,
            #fh5co-pricing,
            #fh5co-testimonial,
            #fh5co-started,
            #fh5co-project,
            #fh5co-blog,
            #fh5co-contact,
            #fh5co-footer {
                padding: 2em 0;
            }
        }

        #fh5co-header .display-tc,
        #fh5co-counter .display-tc,
        .fh5co-cover .display-tc {
            display: table-cell !important;
            vertical-align: middle;
        }

        @media screen and (max-width: 768px) {

            .fh5co-cover .display-t,
            .fh5co-cover .display-tc {
                height: 350px;
            }
        }

        .fh5co-nav-toggle i::before,
        .fh5co-nav-toggle i::after {
            content: "";
            width: 25px;
            height: 2px;
            background: #252525;
            position: absolute;
            left: 0;
            transition: all 0.2s ease-out;
        }

        #fh5co-testimonial {
            background: white;
        }

        .fh5co-blog .blog-text {
            margin-bottom: 30px;
            position: relative;
            background: #fff;
            width: 100%;
            padding: 30px;
            float: left;
            -webkit-box-shadow: 0px 10px 20px -12px rgba(0, 0, 0, 0.18);
            -moz-box-shadow: 0px 10px 20px -12px rgba(0, 0, 0, 0.18);
            box-shadow: 0px 10px 20px -12px rgba(0, 0, 0, 0.18);
        }

        .fh5co-project {
            margin-bottom: 30px;
        }

        .fh5co-project>a {
            display: block;
            color: #000;
            position: relative;
            bottom: 0;
            overflow: hidden;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }

        .fh5co-project>a img {
            position: relative;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }

        .fh5co-project>a:after {
            opacity: 0;
            visibility: hidden;
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            -webkit-box-shadow: inset 0px -34px 98px 8px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: inset 0px -34px 98px 8px rgba(0, 0, 0, 0.75);
            -ms-box-shadow: inset 0px -34px 98px 8px rgba(0, 0, 0, 0.75);
            -o-box-shadow: inset 0px -34px 98px 8px rgba(0, 0, 0, 0.75);
            box-shadow: inset 0px -34px 98px 8px rgba(0, 0, 0, 0.75);
            z-index: 8;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }

        .fh5co-project>a h2,
        .fh5co-project>a h3,
        .fh5co-project>a span {
            z-index: 12;
            position: absolute;
            right: 20px;
            left: 20px;
            color: #fff;
            outline-color: aquamarine margin: 0;
            padding: 0;
            opacity: 1;
            visibility: visible;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }

        .fh5co-project>a h2 {
            font-size: 17px;
            bottom: 75px;
        }

        .fh5co-project>a h3 {
            bottom: 45px;
            font-size: 15px;
        }

        .fh5co-project>a span {
            font-size: 15px;
            bottom: 20px;
        }

        .fh5co-project>a:hover {
            -webkit-box-shadow: 0px 18px 71px -10px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 18px 71px -10px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 18px 71px -10px rgba(0, 0, 0, 0.75);
        }

        .fh5co-project>a:hover:after {
            opacity: 1;
            visibility: visible;
        }

        @media screen and (max-width: 768px) {
            .fh5co-project>a:hover:after {
                opacity: 0;
                visibility: hidden;
            }
        }

        .fh5co-project>a:hover h2,
        .fh5co-project>a:hover h3,
        .fh5co-project>a:hover span {
            opacity: 1;
        }

        .fh5co-project>a:hover h2 {
            bottom: 85px;
            /* Adjust the hover position as needed */
        }

        .fh5co-project>a:hover h3 {
            bottom: 55px;
        }

        .fh5co-project>a:hover img {
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -o-transform: scale(1.1);
            transform: scale(1.1);
        }

        @media screen and (max-width: 768px) {
            .fh5co-project>a:hover img {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                transform: scale(1);
            }
        }
    </style>
    <script src="{{ asset('learn/js/modernizr-2.6.2.min.js') }}"></script>

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

    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.fh5co-nav .top-menu');
            if (window.scrollY > 50) {
                navbar.classList.add('sticky-navbar');
                navbar.classList.remove('transparent-navbar');
                navbar.classList.add('colored-navbar');
            } else {
                navbar.classList.remove('sticky-navbar');
                navbar.classList.remove('colored-navbar');
                navbar.classList.add('transparent-navbar');
            }
        });
    </script>
    <!-- jQuery -->
    <script src="{{ asset('learn/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('learn/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('learn/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('learn/js/jquery.waypoints.min.js') }}"></script>
    <!-- Stellar Parallax -->
    <script src="{{ asset('learn/js/jquery.stellar.min.js') }}"></script>
    <!-- Carousel -->
    <script src="{{ asset('learn/js/owl.carousel.min.js') }}"></script>
    <!-- countTo -->
    <script src="{{ asset('learn/js/jquery.countTo.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('learn/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('learn/js/magnific-popup-options.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('learn/js/main.js') }}"></script>
</body>

</html>
