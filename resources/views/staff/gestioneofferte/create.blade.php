@extends('layouts.stafflayout')

@section('title', 'Crea Offerta')

@section('content')
<section id="autorizzazione">
    <button onclick="window.location.href='{{route('offermodify')}}'" class="back" title="Indietro"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
    <div class="log">
        <div class="log-head">
            <h1>BENVENUTO</h1>
        </div>
        <div class="log-form">
            <h2>Crea Offerta</h2> 
            {{ Form::open(array('route' => 'addOffer.store', 'class' => 'contact-form', 'files' => true)) }}
            @csrf
            <div class="log-slot">
                {{ Form::label('ID_Azienda', 'Azienda', ['class' => 'label-input']) }}
                {{ Form::select('ID_Azienda', $aziende, '', ['class' => 'input log-sel', 'id' => 'ID_Azienda']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('Nome', 'Nome', ['class' => 'label-input']) }}
                {{ Form::text('Nome', '' , ['class' => 'input in-box', 'required' => true,  'id' => 'Nome']) }}              
            </div>
            <div class="log-slot">
                {{ Form::label('Descrizione', 'Descrizione', ['class' => 'label-input']) }}
                {{ Form::textarea('Descrizione', '' , ['class' => 'input in-box', 'required' => true, 'id' => 'Descrizione']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('Scadenza', 'Scadenza', ['class' => 'label-input']) }} 
                {{ Form::date('Scadenza', '' ,['class' => 'input in-box', 'required' => true, 'id' => 'Scadenza']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('Immagine', 'Immagine', ['class' => 'label-input']) }}
                {{ Form::file('image', ['class' => 'input in-box', 'required' => false, 'id' => 'Immagine']) }}
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ Form::submit('Inserisci', ['class' => 'log-sub']) }}      
            {{ Form::close() }}
        </div>   
    </div>
</section>
@endsection
