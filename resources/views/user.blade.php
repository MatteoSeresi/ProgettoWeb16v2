@extends('layouts.userlayout')

@section('title', 'Area Utente')

@section('content')
<section id="us_ar">
    <div id="dati">
    <i class="fa fa-pencil" id="edit" aria-hidden="true" onclick="window.location.href = '{{ route('usermodify') }}'"></i>
        <h1>Benvenuto</h1>
        <p>Nome: {{$user->name}}</p><br>
        <p>Cognome: {{$user->surname}}</p><br>
        <p>Data di nascita: {{$user->data_nascita}}</p><br>
        <i class="fa fa-phone" id="tel" aria-hidden="true"></i><p>Telefono: {{$user->telefono}}</p><br>
        <i class="fa fa-envelope-o" id="mail" aria-hidden="true"></i><p>Email: {{$user->email}}</p>
    </div>

</section>
@endsection


