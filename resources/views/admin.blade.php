@extends('layouts.adminlayout')

@section('title', 'Area Admin')



@section('content')
<section id="us_ar">
    <div id="dati">
        <h1>Benvenuto</h1>
        <p>Nome: {{$admin->name}}</p><br>
        <p>Cognome: {{$admin->surname}}</p><br>
        <p>Data di nascita: {{$admin->data_nascita}}</p><br>
        <i class="fa fa-phone" id="tel" aria-hidden="true"></i><p>Telefono: {{$admin->telefono}}</p><br>
        <i class="fa fa-envelope-o" id="mail" aria-hidden="true"></i><p>Email: {{$admin->email}}</p>
    </div>
</section>
@endsection


