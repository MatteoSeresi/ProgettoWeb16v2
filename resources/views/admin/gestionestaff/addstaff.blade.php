@extends('layouts.adminlayout')

@section('title', 'Aggiungi utente staff')

@section('content')
<section id="autorizzazione">
<button onclick="window.location.href='{{route('managestaff')}}'" class="back" title="Indietro"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
    <div class="log">
        <div class="log-head">
            <h1>BENVENUTO</h1>
        </div>
        <div class="log-form">
            <h2>Aggiungi un nuovo membro dello staff</h2>
            {{ Form::open(array('route' => 'addstaff.store', 'class' => 'contact-form')) }}           
                @csrf
                <div class="log-slot">
                    {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('name', '', ['class' => 'input in-box', 'required' => true,  'id' => 'name',  ]) }}
                    @if ($errors->first('name'))
                    <ul class="errors">
                        @foreach ($errors->get('name') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif             
                </div>
                <div class="log-slot">
                    {{ Form::label('surname', 'Cognome', ['class' => 'label-input']) }}
                    {{ Form::text('surname', '', ['class' => 'input in-box','id' => 'surname']) }}
                    @if ($errors->first('surname'))
                    <ul class="errors">
                        @foreach ($errors->get('surname') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>
                <div class="log-slot">
                    {{ Form::label('username', 'Nome Utente', ['class' => 'label-input']) }}
                    {{ Form::text('username', '', ['class' => 'input in-box', 'required' => true, 'id' => 'username']) }}
                    @if ($errors->first('username'))
                    <ul class="errors">
                        @foreach ($errors->get('username') as $message)
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
                    {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                    {{ Form::password('password', ['class' => 'input in-box', 'required' => true, 'id' => 'password']) }}
                    @if ($errors->first('password'))
                    <ul class="errors">
                        @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif   
                </div>
                <div class="log-slot">
                    {{ Form::label('password-confirm', 'Conferma Password', ['class' => 'label-input']) }}
                    {{ Form::password('password_confirmation', ['class' => 'input in-box', 'required' => true, 'id' => 'password-confirm']) }}
                </div>
                <div class="log-slot">
                    {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'label-input']) }}
                    {{ Form::date('data_nascita', '', ['class' => 'input in-box', 'required' => true, 'id' => 'data_nascita']) }}
                    @if ($errors->first('data_nascita'))
                    <ul class="errors">
                        @foreach ($errors->get('data_nascita') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif                      
                </div>
                <div class="log-slot">
                    {{ Form::label('telefono', 'Telefono', ['class' => 'label-input']) }}
                    {{ Form::tel('telefono', '', ['class' => 'input in-box', 'required' => true, 'id' => 'telefono']) }}
                    @if ($errors->first('telefono'))
                    <ul class="errors">
                        @foreach ($errors->get('telefono') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif                        
                </div>
                <div class="log-slot">
                    {{ Form::label('genere', 'Genere', ['class' => 'label-input']) }}
                    {{ Form::select('genere',  ['Uomo' => 'Maschio', 'Donna' => 'Femmina'], ['class' => 'input in-sel', 'required' => true, 'id' => 'genere']) }}
                    @if ($errors->first('genere'))
                    <ul class="errors">
                        @foreach ($errors->get('genere') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif                 
                </div>
            {{ Form::submit('Inserisci', ['class' => 'log-sub']) }}    
            {{ Form::close() }}
        </div>   
    </div>
</section>
@endsection