@extends('layouts.public')

@section('title', 'Home')

@section('content')
<section>
<div id="slider">
            <button onclick="prec()"><</button>
            <div id="img_slider">
                <img src="{{'images/coup.jpg'}}">
                <img src="{{'images/lebron.jpg'}}">
                <img src="{{'images/maps.jpg'}}">
                <img src="{{'images/coup.jpg'}}">
                <img src="{{'images/lebron.jpg'}}">
            </div>
            <button onclick="succ()">></button>
        </div>
</section>
@endsection