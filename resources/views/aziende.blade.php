@extends('layouts.public')

@section('title', 'Aziende')

@section('content')
    @isset($aziende)
        @foreach ($aziende as $azienda)
        <section id="azienda">
            <div id="high_c">
                <div id="immagine azienda">
                    <!--@include('helpers/aziendeImg', ['attrs' => 'imagefrm', 'imgFile' => $azienda->Logo])-->
                    <img src="../../public/images/aziende/{{ $azienda->Logo }}">
                </div>
                <h1>{{ $azienda->Ragione_Sociale }}</h1>
            </div>
            <div id="low_c">
                <div id="slot">
                    <iframe src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=
                        {{$azienda->Localizzazione}}+{{$azienda->civico}}+{{$azienda->cap}}+{{$azienda->citta}}
                        %2C%20Italy+(Titolo)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed"
                        width="100%" height="100%"frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                        <a href="">measure distance on map</a>
                    </iframe>
                </div>

                <div id="slot">
                    <h3>Descrizione:</h3>
                    <p>{{ $azienda->Descrizione }}</p>
                </div>

                <div id="slot" style="padding: 10px">
                    <p>Localizzazione: {{$azienda->Localizzazione}}, {{$azienda->civico}}, {{$azienda->citta}}, {{$azienda->cap}}</p>
                    <p>Telefono: {{$azienda->tel}}</p>
                    <p>Email: <a href="mailto:{{$azienda->email}}" style="text-decoration: none">{{$azienda->email}}</a></p>
                </div>
            </div>
            <div id="end_c">
                <a href="{{ route('catalogo') }}">Vai alle offerte</a>
            </div>
        </section>
        @endforeach
    @endisset
@endsection