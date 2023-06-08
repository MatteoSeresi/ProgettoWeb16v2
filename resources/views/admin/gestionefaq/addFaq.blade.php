@extends('layouts.adminlayout')

@section('title', 'Aggiungi FAQ')

@section('content')
<section id="autorizzazione">
<button onclick="window.location.href='{{route('managefaq')}}'" class="back" title="Indietro"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
    <div class="log">
        <div class="log-head">
            <h1>BENVENUTO</h1>
        </div>
        <div class="log-form">
            <h2>Aggiungi nuova FAQ</h2>
            {{ Form::open(array('route' => 'addFaq', 'class' => 'contact-form')) }}
            @csrf
            <div class="log-slot">
                {{ Form::label('Domanda', 'Domanda', ['class' => 'label-input']) }}
                {{ Form::textarea('Domanda', '', ['class' => 'input in-box','id' => 'Domanda', 'required' => true, 'maxlength' => 500, 'style' => 'height: 150px']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('Risposta', 'Risposta', ['class' => 'label-input']) }}
                {{ Form::textarea('Risposta', '', ['class' => 'input in-box','id' => 'Risposta', 'required' => true, 'maxlength' => 2500, 'style' => 'height: 150px']) }}
            </div>
            {{ Form::submit('Inserisci', ['class' => 'log-sub']) }}    
            {{ Form::close() }}
        </div>   
    </div>
</section>
@endsection