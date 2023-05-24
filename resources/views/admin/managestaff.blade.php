@extends('layouts.adminlayout')

@section('title', 'Gestione staff')

@section('content')
<section id="azienda">
    
   
    <div id="filter">
    <input id="" type="text" placeholder="Nome">
        <input id="" type="text" placeholder="Cognome">
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn" id="bot">Staff<i class="fa fa-angle-down" aria-hidden="true"></i></button>
            <div id="myDropdown" class="dropdown-content">
                <input type="text" placeholder="Aziende" id="myInput" onkeyup="filterFunction()">
                <a href="#about">About</a>
            </div>
        </div>
        <input id="invio" type="submit" value="Filtra">
    </div>
    <button title="Crea un nuovo utente staff" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-60 mb-3 lh-1 rounded" onclick="window.open('https://www.youtube.com/')"> <i class="fas fa-user-plus"></i></button>
    @isset($staffs)
        @foreach ($staffs as $staff)
        <section id="azienda">
            <h1 class="text-center">{{ $staff->Nome }} {{ $staff->Cognome }}</h1>
            <div id="dati">
                <p>Data di nascita: {{ $staff->Data_Nascita }}</p>
                <p>Telefono: {{ $staff->Telefono }}</p>
                <p>Email: {{ $staff->Email }}</p>
            </div>
            <div class="d-flex justify-content-center align-items-center ">
                <button title="Modifica dati utente" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded" onclick="window.open('https://www.youtube.com/')"><i class="fas fa-pencil-alt"></i></button>
                <button title="Elimina utente staff" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded" onclick="window.open('https://www.youtube.com/')"><i class="fa fa-trash"></i></button>
            </div>
        </section>
        @endforeach
    @endisset
    
</section>
@endsection