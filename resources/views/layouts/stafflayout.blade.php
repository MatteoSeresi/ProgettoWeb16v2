<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/stile.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap5.css') }}" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" href="{{ asset('images/LogoSito16x16.png')}}" sizes="16x16">
        <title>CouponHub | @yield('title', 'Home')</title>
    </head>
    <body>
    <div class="container-fluid container-lg my-3 mb-0 pb-3 border-bottom border-2 border-black">
        <div class="row align-items-center justify-content-center">
        <div class="col d-none d-lg-block">
                <img src="{{ asset('images/LogoSito.png') }}" width="110" height="110">
            </div>
            <div class="col-12 col-lg-6 text-center">
                <h1 style=" font-size: 80px; font-family: Titillium Web" >CouponHub</h1>
            </div>
            <div class="col d-none d-lg-block "> </div>
        </div>
    </div>

    @include('layouts/_navstaff')

    <div id="container" class="overflow-hidden">
            <div class="container-fluid container-lg py-4 px-3 px-lg-0">
                @yield('content')
            </div>
        </div>
        <footer>
            <p> Author:<br> Matteo Fabbri | Diego Settimi | Matteo Seresi | Mattia Sisi</p>
            <a class="trans-color-text" href="{{route ('faq')}}"> FAQ </a> | <span itemprop="telephone"><a href="{{route ('contattaci')}}"> CONTATTACI </a></span>|
            <a target="_blank" href="#"> PRIVACY </a> | <a target="_blank" href="#"> GUIDE </a>
        </footer>
    </body>
</html>