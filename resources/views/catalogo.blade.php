@extends('layouts.public')

@section('title', 'Catalogo offerte')

<head><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script></head>

@section('content')
<div id="filter">
    <input type="text" id="filter-azienda" placeholder="Filtro per azienda">
    <input type="text" id="filter-descrizione" placeholder="Filtro per descrizione">
</div>

<div id="aziende-container">
  @isset($aziende)
      @foreach ($aziende as $azienda)
          @isset($azienda->offerte)
              @if(count($azienda->offerte) > 0)
                  <div class="catalogo azienda">
                      <div class="name_a">
                          <h1>{{ $azienda->Ragione_Sociale}}</h1>
                      </div>
                      @foreach ($azienda->offerte as $offer)
                          <div class="promo">
                              <div class="left_c">
                                  <h2>{{ $offer->Nome }}</h2>
                                  <p>Data di scadenza: {{ $offer->Scadenza }}</p>
                                  <p>Descrizione: {{ $offer->Descrizione }}</p>
                                  @guest
                                    <a href="#" class='disabilita-bottone'>Genera Coupon</a>
                                  @endguest
                                  @can('isUser')
                                    <a href="#">Genera Coupon</a>
                                  @endcan
                              </div>
                              <div class="right_c">
                                  <img src="../../public/images/{{ $offer->Immagine }}" alt="Coupon">
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

      $('.azienda').each(function() {
          var aziendaName = $(this).find('.name_a h1').text().toLowerCase();
          var offerte = $(this).find('.promo');
          var showAzienda = false;

          // Nascondi l'azienda inizialmente
          $(this).hide();

          offerte.each(function() {
              var nomeOfferta = $(this).find('.left_c h2').text().toLowerCase();
              var descrizioneOfferta = $(this).find('.left_c p:eq(1)').text().toLowerCase();

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

</script>