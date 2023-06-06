@extends('layouts.public')

@section('title', 'FAQ')

@section('content')
<section id="faq">
<h1>FAQ</h1><br>
    @isset($faqs)
        @foreach ($faqs as $faq)
            <div id="question">
                <h2>{{$faq->Domanda}} </h2>
                <p>{{$faq->Risposta}}</p><br><br>
            </div>
        @endforeach
    @endisset
</section>
@endsection