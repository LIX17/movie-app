<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('src/assets/clip-logo.png')}}">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    {{-- CSS Style --}}
    <style>
        .header__logo img{
            max-height: 30px !important;
        }

        @media (max-width: 369px) { 
            .header__logo img{
                max-height: 30px !important;
                max-width: 50px !important;
            }
        }
        .scroll-up{
            border: 2px solid maroon; 
            background:red; 
            color:white; 
            padding: 1vh 2vh 1vh 2vh;
            font-size: 2vw;        
        }
      
    </style>
    @include('include.style')
    @stack('addon-style')
</head>

<body>
    <!-- Page Preloder -->
    @include('include.loader')

    <!-- Header -->
    @include('include.header')

    <!-- Searcher -->
    @include('include.searcher')

    <!-- Page Content -->
    @yield('content')

    <!-- Footer -->
    @include('include.footer')

    <!-- Js Plugins -->    
    @include('include.script')
    @stack('addon-script')
</body>

</html>