@extends('layouts.public')

@section('title', 'Aziende')

@section('content')
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
                    <iframe src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=Rome%2C%20Italy+(Titolo)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed""  width="200" height="200"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="">measure distance on map</a>
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
            <div id="end_c">
                <button onclick="window.open('https://www.youtube.com/')">Vai alle offerte</button>
            </div>
        </section>
        @endforeach
    @endisset
@endsection