@extends('layouts.adminlayout')

@section('title', 'Aggiungi azienda')

@section('content')
<section id="autorizzazione">
<button onclick="window.location.href='{{route('managecompany')}}'" class="back" title="Indietro"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
    <div class="log">
        <div class="log-head">
            <h1>BENVENUTO</h1>
        </div>
        <div class="log-form">
            <h2>Aggiungi una nuova azienda</h2> 
            {{ Form::open(array('route' => 'addcompany.store', 'class' => 'contact-form')) }}           
                @csrf
                <div class="log-slot">
                    {{ Form::label('P_Iva', 'Partita Iva', ['class' => 'label-input']) }}
                    {{ Form::text('P_Iva', '', ['class' => 'input in-box', 'required' => true,  'id' => 'P_Iva',  ]) }}
                    @if ($errors->first('P_Iva'))
                    <ul class="errors">
                        @foreach ($errors->get('P_Iva') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif             
                </div>
                <div class="log-slot">
                    {{ Form::label('Ragione_Sociale', 'Ragione sociale', ['class' => 'label-input']) }}
                    {{ Form::text('Ragione_Sociale', '', ['class' => 'input in-box','id' => 'Ragione_Sociale']) }}
                    @if ($errors->first('Ragione_Sociale'))
                    <ul class="errors">
                        @foreach ($errors->get('Ragione_Sociale') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>
                <div class="log-slot">
                    {{ Form::label('Localizzazione', 'Indirizzo', ['class' => 'label-input']) }}
                    {{ Form::text('Localizzazione', '', ['class' => 'input in-box','id' => 'Localizzazione']) }}
                    @if ($errors->first('Localizzazione'))
                    <ul class="errors">
                        @foreach ($errors->get('Localizzazione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>
                <div class="log-slot">
                    {{ Form::label('Descrizione', 'Descrizione', ['class' => 'label-input']) }}
                    {{ Form::text('Descrizione', '', ['class' => 'input in-box','id' => 'Descrizione']) }}
                    @if ($errors->first('Descrizione'))
                    <ul class="errors">
                        @foreach ($errors->get('Localizzazione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>

                <div class="log-slot">
                    {{ Form::label('civico', 'Civico', ['class' => 'label-input']) }}
                    {{ Form::text('civico', '', ['class' => 'input in-box','id' => 'civico']) }}
                    @if ($errors->first('civico'))
                    <ul class="errors">
                        @foreach ($errors->get('civico') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>

                <div class="log-slot">
                    {{ Form::label('citta', 'Città', ['class' => 'label-input']) }}
                    {{ Form::text('citta', '', ['class' => 'input in-box','id' => 'citta']) }}
                    @if ($errors->first('citta'))
                    <ul class="errors">
                        @foreach ($errors->get('citta') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>

                <div class="log-slot">
                    {{ Form::label('cap', 'CAP', ['class' => 'label-input']) }}
                    {{ Form::text('cap', '', ['class' => 'input in-box','id' => 'cap']) }}
                    @if ($errors->first('cap'))
                    <ul class="errors">
                        @foreach ($errors->get('cap') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>

                <div class="log-slot">
                    {{ Form::label('tel', 'Telefono', ['class' => 'label-input']) }}
                    {{ Form::tel('tel', '', ['class' => 'input in-box', 'required' => true, 'id' => 'tel']) }}
                    @if ($errors->first('tel'))
                    <ul class="errors">
                        @foreach ($errors->get('tel') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif                        
                </div>

                <div class="log-slot">
                    {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                    {{ Form::email('email', '', ['class' => 'input in-box', 'required' => true, 'id' => 'email']) }}
                    @if ($errors->first('email'))
                    <ul class="errors">
                        @foreach ($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif                   
                </div>   
                <div class="log-slot">
                    {{ Form::label('Logo', 'Logo', ['class' => 'label-input']) }}
                    {{ Form::file('Logo', ['class' => 'input in-box', 'required' => false, 'id' => 'Logo']) }}
                </div>
                {{ Form::submit('Inserisci', ['class' => 'log-sub']) }}    
            {{ Form::close() }}
        </div>   
    </div>
</section>
@endsection