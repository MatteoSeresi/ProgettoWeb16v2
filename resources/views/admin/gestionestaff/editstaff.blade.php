@extends('layouts.adminlayout')

@section('title', 'Modifica Utente Staff')

@section('content')
<section id="autorizzazione">
<button onclick="window.location.href='{{route('managestaff')}}'" class="back" title="Indietro"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
    <div class="log">
        <div class="log-head">
            <h1>BENVENUTO</h1>
        </div>
        <div class="log-form">
            <h2>Modifica i dati di {{$staff->name}} {{$staff->surname}}</h2>
            {{ Form::open(array('route' => ['editstaff', 'staff_id' => $staff->id], 'class' => 'contact-form')) }}
                <div class="log-slot">
                    {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                    {{ Form::text('name', $staff->name ?? old('name'), ['class' => 'input in-box', 'required' => true,  'id' => 'name',  ]) }}
                </div>
                <div class="log-slot">
                    {{ Form::label('surname', 'Cognome', ['class' => 'label-input']) }}
                    {{ Form::text('surname', $staff->surname ?? old('surname'), ['class' => 'input in-box','id' => 'surname']) }}
                </div>
                <div class="log-slot">
                    {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                    {{ Form::text('username', $staff->username ?? old('username'), ['class' => 'input in-box', 'required' => true, 'id' => 'username']) }}
                </div>
                <div class="log-slot">
                    {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                    {{ Form::email('email', $staff->email ?? old('email'), ['class' => 'input in-box', 'required' => true, 'id' => 'email']) }}
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
                    {{ Form::date('data_nascita', $staff->data_nascita ?? old('data_nascita'), ['class' => 'input in-box', 'required' => true, 'id' => 'data_nascita']) }}
                </div>
                <div class="log-slot">
                    {{ Form::label('telefono', 'Telefono', ['class' => 'label-input']) }}
                    {{ Form::tel('telefono', $staff->telefono ?? old('telefono'), ['class' => 'input in-box', 'required' => true, 'id' => 'telefono']) }}
                </div>
                <button title="Conferma" class="send" type = "submit"><i class="fa fa-check"></i></button>
                <button title="Scarta modifiche" class="send" type = "reset"><i class="fa fa-undo" aria-hidden="true"></i></button>       
            {{ Form::close() }}
        </div>
    </div>
</section>
@endsection