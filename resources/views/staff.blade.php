@extends('layouts.stafflayout')

@section('title', 'Area Staff')


@section('content')
<section id="us_ar">
    <div id="central">
        
        <div id="col_1"></div>
        
        <div id="col_2">
        <h1 class="text-center">Account Staff</h1>
            <div id="dati">
                <p>Benvenuto</p>
                <p>Nome: {{$user->name}}</p>
                <p>Cognome: {{$user->surname}}</p>
                <p>Data di nascita: {{$user->data_nascita}}</p>
                <p>Telefono: {{$user->telefono}}</p>
                <p>Email: {{$user->email}}</p>
                <i class="fa fa-pencil" aria-hidden="true" onclick="window.location.href = '{{ route('staffmodify') }}'"></i><br>
                <a href="{{ route('offermodify') }}">Modifica le offerte</a>
            </div>
        </div>

        <div id="col_3"></div>
    </div>
</section>
@endsection
