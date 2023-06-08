<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/stile.css') }}" >
        <!--<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap5.css') }}" >-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" href="{{ asset('images/LogoSito16x16.png')}}" sizes="16x16">
        <title>CouponHub | @yield('title', 'Home')</title>
    </head>
    <body>
    <header class="top">
    <div class="title">
        <div class="wb_logo">
            <img src="{{ asset('images/LogoSito.png') }}" width="110" height="110">
        </div>
        <div class="wb_title">
            <h1 style=" font-size: 80px; font-family: Titillium Web" >CouponHub</h1>
        </div>
    </div>
    <div class="navb">
        @include('layouts/_navadmin')
    </div>
    <div class="navb">
        @include('layouts/_navadminoptions')
    </div>
    </header>

    <div class="cont-admin">
        @yield('content')
    </div>
    <footer>
        <p> Author:<br> Matteo Fabbri | Diego Settimi | Matteo Seresi | Mattia Sisi</p>
        <a class="trans-color-text" href="{{route ('faq')}}"> FAQ </a> | <span itemprop="telephone"><a href="{{route ('contattaci')}}"> CONTATTACI </a></span>|
        <a target="_blank" href="#"> PRIVACY </a> | <a target="_blank" href="#"> GUIDE </a>
    </footer>
    </body>
</html>