@extends('layouts.public')

@section('title', 'Catalogo offerte')

<head><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script></head>

@section('content')
<div id="filter">
    <input type="text" class="filtro" id="filter-azienda" placeholder="Azienda">
    <input type="text" class="filtro" id="filter-descrizione" placeholder="Tipo di Promozione">
</div>

<div id="aziende-container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
  @isset($aziende)
      @foreach ($aziende as $azienda)
          @isset($azienda->offerte)
              @if(count($azienda->offerte) > 0)
                  <div class="catalogo">
                      <div class="name_a">
                          <h1>{{ $azienda->Ragione_Sociale}}</h1>
                      </div>
                     @foreach ($azienda->offerte as $offer)
                    @php
                        $scadenza = \Carbon\Carbon::createFromFormat('Y-m-d', $offer->Scadenza);
                        $oggi = \Carbon\Carbon::today();
                        $scaduta = $scadenza->isPast();
                        $result = app('App\Http\Controllers\CouponController')->checkCoupon($offer->ID_Offerta, $azienda->id);
                    @endphp
                          <div class="promo">
                            <div class="info">
                                <div class="coup">
                                    <img src="../../public/img/{{ $offer->Immagine }}">
                                </div>
                                <h2>{{ $offer->Nome }}</h2>
                                <p id="desc_off">{{ $offer->Descrizione }}</p>
                                <p id="scade">Data di scadenza: {{ $offer->Scadenza }}</p>
                            </div>
                                  
                                @can('isUser')
                                    @if ($scaduta)
                                        <button class="disabilita-bottone">Coupon Scaduto</button>
                                    @else
                                        @if($result) 
                                            <button class="disabilita-bottone">Coupon Già Generato</button>
                                        @else
                                            <button onclick="openCouponPage('{{ route('coupon', ['offertaId' => $offer->ID_Offerta, 'aziendaId' => $azienda->id]) }}')" name="genera-coupon" class="generate-coupon">Genera Coupon</button>
                                        @endif
                                    @endif
                                    @else
                                    <button class="disabilita-bottone">Genera Coupon</button>
                                @endcan
                          </div>
                      @endforeach
                  </div>
              @endif
          @endisset
      @endforeach
  @endisset
</div>
@endsection



<script>

$(document).ready(function() {
    // Evento di ascolto per il pulsante di filtro
    $('#filter-button').on('click', function() {
        filterResults();
    });

    // Evento di ascolto per gli input di filtro
    $('#filter-azienda, #filter-descrizione').on('input', function() {
        filterResults();
    });

    function filterResults() {
      var aziendaFilter = $('#filter-azienda').val().toLowerCase();
      var descrizioneFilter = $('#filter-descrizione').val().toLowerCase();

      $('.catalogo').each(function() {
          var aziendaName = $(this).find('.name_a h1').text().toLowerCase();
          var offerte = $(this).find('.promo');
          var showAzienda = false;

          // Nascondi l'azienda inizialmente
          $(this).hide();

          offerte.each(function() {
              var nomeOfferta = $(this).find('.promo .info h2').text().toLowerCase();
              var descrizioneOfferta = $(this).find('.info h2:eq(0)').text().toLowerCase();

              // Mostra l'offerta solo se corrisponde ai filtri
              if (aziendaName.includes(aziendaFilter) && (nomeOfferta.includes(descrizioneFilter) || descrizioneOfferta.includes(descrizioneFilter))) {
                  showAzienda = true;
                  return false; // Esci dal ciclo each per le offerte
              }
          });

          // Mostra o nascondi l'azienda in base alla corrispondenza dei filtri
          if (showAzienda) {
              $(this).show();
          } else {
              $(this).hide();
          }
      });
    }
});

function openCouponPage(url) {
        window.open(url);
        window.onfocus = function () {
            window.location.reload();
        };
}

</script>