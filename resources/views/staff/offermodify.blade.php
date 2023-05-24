@extends('layouts.stafflayout')

@section('title', 'Modifica Offerte')

@section('content')
<section>
@isset($aziende)
    @foreach ($aziende as $azienda)
        @isset($azienda->offerte)
            @if(count($azienda->offerte) > 0)
                <div id="catalogo">
                    <div id="name_a">
                        <h1>{{ $azienda->Ragione_Sociale}}</h1>
                    </div>
                    @foreach ($azienda->offerte as $offer)
                        <div id="promo">
                            <div id="left_c">
                                <h2>{{ $offer->Nome }}</h2>
                                <p>Data di scadenza: {{ $offer->Scadenza }}</p>
                                <p>Descrizione: {{ $offer->Descrizione }}</p>
                                <a href="#">Genera Coupon</a>
                            </div>
                            <div id="right_c">
                                <img src="../../../public/images/coup.jpg" alt="Coupon">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endisset
    @endforeach
@endisset
</section>
@endsection