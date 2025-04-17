<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon/favicon.ico')}}" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/pdfjs-dist@5.1.91/web/pdf_viewer.min.css" rel="stylesheet"> -->
    <!-- darkmode js -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/5.0.375/pdf_viewer.min.css" integrity="sha512-bt54/qzXTxutlNalAuK/V3dxe1T7ZDqeEYbZPle3G1kOH+K1zKlQE0ZOkdYVwPDxdCFrdLHwneslj7sA5APizQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/5.0.375/pdf.min.mjs"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@5.1.91/wasm/openjpeg_nowasm_fallback.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.min.js"></script>
    <script src="{{asset('assets/js/vendors/darkMode.js')}}"></script>

    <!-- Libs CSS -->
    <link href="{{asset('assets/fonts/feather/feather.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/libs/simplebar/dist/simplebar.min.css')}}s" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/theme.min.css')}}">

    <!-- <link rel="canonical" href="course-category" /> -->
    <link rel="stylesheet" href="{{asset('assets/libs/tiny-slider/dist/tiny-slider.css')}}" />

    <title>Reccobook || Home</title>
</head>

<body class="bg-white">
    @include('includes.header')
    @yield('content')
    @include('includes.footer')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script> -->
    <script src="{{asset('assets/libs/%40popperjs/core/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/dist/simplebar.min.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{asset('assets/js/theme.min.js')}}"></script>

    <script src="{{asset('assets/libs/tiny-slider/dist/min/tiny-slider.js')}}"></script>
    <script src="{{asset('assets/js/vendors/tnsSlider.js')}}"></script>
</body>

</html>