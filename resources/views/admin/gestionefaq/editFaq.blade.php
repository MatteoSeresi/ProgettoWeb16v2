@extends('layouts.adminlayout')

@section('title', 'Modifica FAQ')

@section('content')
<section id="autorizzazione">
<button onclick="window.location.href='{{route('managefaq')}}'" class="back" title="Indietro"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
    <div class="log">
        <div class="log-head">
            <h1>BENVENUTO</h1>
        </div>
        <div class="log-form">
            <h2>Modifica FAQ</h2>
            {{ Form::open(array('route' => ['editFaq', 'faq_id' => $faq->id], 'class' => 'contact-form')) }}
            <div class="log-slot">
                {{ Form::label('Domanda', 'Domanda', ['class' => 'label-input']) }}
                {{ Form::textarea('Domanda', $faq->Domanda ?? old('Domanda'), ['class' => 'input in-box','id' => 'Domanda', 'required' => true, 'maxlength' => 500, value($faq->Domanda), 'style' => 'height: 150px']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('Risposta', 'Risposta', ['class' => 'label-input']) }}
                {{ Form::textarea('Risposta', $faq->Risposta ?? old('Risposta'), ['class' => 'input in-box','id' => 'Risposta', 'required' => true, 'maxlength' => 2500, value($faq->Risposta), 'style' => 'height: 150px']) }}
            </div>
            <button title="Conferma" class="send" type = "submit"><i class="fa fa-check"></i></button>
            <button title="Scarta modifiche" class="send" type = "reset"><i class="fa fa-undo" aria-hidden="true"></i></button>       
            {{ Form::close() }}
        </div>
    </div>
</section>
@endsection