@extends('layouts.adminlayout')

@section('title', 'Cancella utenti')

@section('content')
<section id="azienda">
   
    <div id="filter">
        <input id="desc" type="text" placeholder="Descrizione">
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn" id="bot">Utenti<i class="fa fa-angle-down" aria-hidden="true"></i></button>
            <div id="myDropdown" class="dropdown-content">
                <input type="text" placeholder="Aziende" id="myInput" onkeyup="filterFunction()">
                <a href="#about">About</a>
            </div>
        </div>
        <input id="invio" type="submit" value="Filtra">
    </div>
    @isset($utenti)
        @foreach ($utenti as $utente)
        <section id="azienda">
            <h1 class="text-center">Utente</h1>
            <div id="dati">
                <p>Nome: {{ $utente->Nome }}</p>
                <p>Cognome: {{ $utente->Cognome }}</p>
                <p>Data di nascita: {{ $utente->Data_Nascita }}</p>
                <p>Telefono: {{ $utente->Telefono }}</p>
                <p>Email: {{ $utente->Email }}</p>
            </div>
            <div class="d-flex justify-content-center align-items-center ">
                <button title="Elimina utente" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded" onclick="window.open('https://www.youtube.com/')"><i class="fa fa-trash"></i></button>
            </div>
        </section>
        @endforeach
    @endisset
</section>
@endsection