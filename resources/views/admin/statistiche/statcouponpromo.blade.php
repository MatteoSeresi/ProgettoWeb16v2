@extends('layouts.adminlayout')

@section('title', 'Statistiche sito')

@section('content')

<div id="aziende-container">
    @isset($aziende)
        @foreach ($aziende as $azienda)
            @isset($azienda->offerte)
                @if(count($azienda->offerte) > 0)
                    <div class="catalogo">
                        <div class="name_a">
                            <h1>{{ $azienda->Ragione_Sociale}}</h1>
                        </div>
                        @foreach ($azienda->offerte as $offer)
                            <div class="promo">
                                <div class="left_c">
                                    <h2>{{ $offer->Nome }}</h2>
                                    <p>Data di scadenza: {{ $offer->Scadenza }}</p>
                                    <p>Descrizione: {{ $offer->Descrizione }}</p>
                                    <button onclick="window.open('{{ route('coupon', ['offertaId' => $offer->ID_Offerta, 'aziendaId' => $azienda->id]) }}')" name= "genera-coupon" class="generate-coupon">Visualizza Statistica</button>
                                </div>
                                <div class="right_c">
                                    <img src="../../../../public/images/{{ $offer->Immagine }}" alt="Coupon">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endisset
        @endforeach
    @endisset
</div>
@endsection