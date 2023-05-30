@extends('layouts.userlayout')

@section('title', 'Area Utente')

@section('content')
<section id="us_ar">
    <div id="central">
        <div id="col_1"></div>
        
        <div id="col_2">
            <div id="dati">
                <p>Benvenuto</p>
                <p>Nome: {{$user->name}}</p>
                <p>Cognome: {{$user->surname}}</p>
                <p>Data di nascita: {{$user->data_nascita}}</p>
                <p>Telefono: {{$user->telefono}}</p>
                <p>Email: {{$user->email}}</p>
                <i class="fa fa-pencil" aria-hidden="true" onclick="window.location.href = '{{ route('usermodify') }}'"></i>
            </div>
        </div>
        <div id="col_3"></div>
    </div>
</section>
@endsection


