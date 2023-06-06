@extends('layouts.adminlayout')

@section('title', 'Area Admin')



@section('content')

<section id="us_ar">
   

    <div id="central">
        
        <div id="col_1"></div>
        
        <div id="col_2">
        <h1 class="text-center">Account Admin</h1>
            <div id="dati">
                <p>Nome: {{$admin->name}}</p>
                <p>Cognome: {{$admin->surname}}</p>
                <p>Data di nascita: {{$admin->data_nascita}}</p>
                <p>Telefono: {{$admin->tel}}</p>
                <p>Email: {{$admin->email}}</p>
            </div>
        </div>

        <div id="col_3"></div>
    </div>
</section>
@endsection


