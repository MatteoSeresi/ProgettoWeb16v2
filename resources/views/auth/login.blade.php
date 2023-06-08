@extends('layouts.public')

@section('title', 'Login')

@section('content')
<section id="autorizzazione">
    <div class="log">
        <div class="log-head">
            <h1>BENVENUTO</h1>
        </div>
        <div class="log-form">
            <h2>Effettua l'accesso</h2>
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}           
                @csrf
                <div class="log-slot">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                    {{ Form::text('username', '', ['class' => 'input in-box','id' => 'username', 'required' => true]) }}
                </div>
                <div class="log-slot">
                    <i class="fa fa-key" aria-hidden="true"></i>
                    {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                    {{ Form::password('password', ['class' => 'input in-box', 'id' => 'password', 'required' => true]) }}
                </div>
                {{ Form::submit('Login', ['class' => 'log-sub']) }}
                <a href="{{ route('registrazione') }}">Se non sei ancora registrato crea il tuo account</a>       
            {{ Form::close() }}
        </div>
    </div>
</section>
@endsection