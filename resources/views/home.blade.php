@extends('layouts.public')

@section('title', 'Home')

@section('content')
            <section>
                <h1>home</h1>
                <!--<div id="slider">
                        <button onclick="prec()"><</button>
                        <div id="img_slider">
                        
                            <img src="{{'images/lebron.jpg'}}">
                            <img src="{{'images/maps.jpg'}}">
                            <img src="{{'images/coup.jpg'}}">
                            <img src="{{'images/lebron.jpg'}}">
                        </div>
                        <button onclick="succ()">></button>
                    </div>-->
                    <div id="slider">
                        <figure>
                            <img src="{{'images/lebron.jpg'}}">
                            <img src="{{'images/coup.jpg'}}">
                            <img src="{{'images/lebron.jpg'}}">
                        <figure>
                    </div>
            </section>
@endsection