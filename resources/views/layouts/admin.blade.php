<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon/favicon.ico')}}" />
    <script type="text/javascript" id="www-widgetapi-script" src="https://www.youtube.com/s/player/9599b765/www-widgetapi.vflset/www-widgetapi.js" async=""></script>

    <!-- darkmode js -->
    <!-- <script src="{{asset('assets/js/vendors/darkMode.js')}}"></script> -->

    <!-- Libs CSS -->
    <link href="{{asset('assets/fonts/feather/feather.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/libs/glightbox/dist/css/glightbox.min.css')}}">
    <link href="{{asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/theme.min.css')}}">

    <!-- <link rel="canonical" href="course-category" /> -->
    <link rel="stylesheet" href="{{asset('assets/libs/tiny-slider/dist/tiny-slider.css')}}" />
    <link
        href="{{asset('assets/libs/%40yaireo/tagify/dist/tagify.css')}}"
        rel="stylesheet " />
    <link
        href="{{asset('assets/libs/dragula/dist/dragula.min.css')}}"
        rel="stylesheet " />

    <title>Edu Resource Recommender || Admin Dashboard</title>
    <script src="https://www.youtube.com/iframe_api" async=""></script>
</head>

<body>
    <div id="db-wrapper">
        @include('includes.admin_header')
        @yield('content')
    </div>
    <script src="{{asset('assets/libs/glightbox/dist/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/js/vendors/glight.js')}}"></script>
    <script src="{{asset('assets/libs/%40popperjs/core/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/dist/simplebar.min.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{asset('assets/js/theme.min.js')}}"></script>

    <script src="{{asset('assets/libs/tiny-slider/dist/min/tiny-slider.js')}}"></script>
    <script src="{{asset('assets/js/vendors/tnsSlider.js')}}"></script>
</body>

</html>