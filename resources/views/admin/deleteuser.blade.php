@extends('layouts.adminlayout')

@section('title', 'Cancella utenti')

@section('content')
<section id="azienda">
   
    <div id="filter">
        <input id="" type="text" placeholder="Nome">
        <input id="" type="text" placeholder="Cognome">
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
            <h1 class="text-center">{{ $utente->name }} {{ $utente->surname }}</h1> 
            <div id="dati">
                <p>Data di nascita: {{ $utente->data_nascita }}</p>
                <p>Telefono: {{ $utente->telefono }}</p>
                <p>Email: {{ $utente->email }}</p>
            </div>
            <div class="d-flex justify-content-center align-items-center ">
            <a href="{{ route('elimina', ['user_id' => $utente->id]) }}" title="Elimina utente" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded" onclick="event.preventDefault(); if (confirm('Sei sicuro di voler eliminare questo utente?')) { document.getElementById('delete-form-{{ $utente->id }}').submit(); }"> <i class="fa fa-trash"></i></a>
            <form id="delete-form-{{ $utente->id }}" action="{{ route('elimina', ['user_id' => $utente->id]) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
            </div>
        </section>
        @endforeach
    @endisset
</section>
@endsection