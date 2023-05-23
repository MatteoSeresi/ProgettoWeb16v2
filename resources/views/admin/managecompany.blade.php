@extends('layouts.adminlayout')

@section('title', 'Modifica Admin')

@section('content')
<section id="azienda">
    <div class="d-flex justify-content-center align-items-center ">
    <button class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-60 mb-3 lh-1 rounded" onclick="window.open('https://www.youtube.com/')">crea nuova azienda</button>
    </div>
   
    <div id="filter">
        <input id="desc" type="text" placeholder="Descrizione">
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn" id="bot">Aziende<i class="fa fa-angle-down" aria-hidden="true"></i></button>
            <div id="myDropdown" class="dropdown-content">
                <input type="text" placeholder="Aziende" id="myInput" onkeyup="filterFunction()">
                <a href="#about">About</a>
            </div>
        </div>
        <input id="invio" type="submit" value="Filtra">
    </div>
    @isset($aziende)
        @foreach ($aziende as $azienda)
        <section id="azienda">
            <div id="high_c">
                <div id="immagine azienda">
                    @include('helpers/aziendeImg', ['attrs' => 'imagefrm', 'imgFile' => $azienda->Logo])
                </div>
                <h1>Nome azienda: {{ $azienda->Ragione_Sociale }}</h1>
            </div>
            <div id="low_c">
                <div id="slot">
                    <iframe src="https://maps.google.com/maps?width=200&amp;height=200&amp;hl=en&amp;
                        q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"  width="200" height="200"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/distance-area-calculator.html">measure distance on map</a>
                    </iframe>
                </div>

                <div id="slot">
                    <h3>Descrizione:</h3>
                    <p>{{ $azienda->Descrizione }}</p>
                </div>

                <div id="slot">
                    <p>Qui ci sono i contatti dell'azienda</p>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center ">
                <button title="Modifica i dati" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded" onclick="window.open('https://www.youtube.com/')"><i class="fa fa-pencil"></i></button>
                <button title="Elimina azienda" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded" onclick="window.open('https://www.youtube.com/')"><i class="fa fa-trash"></i></button>
            </div>
        </section>
        @endforeach
    @endisset
</section>
@endsection