@extends('layouts.adminlayout')

@section('title', 'Gestione aziende')
<head><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script></head>
@section('content')
<section id="azienda">
<div id="filter">
    <input type="text" class="filter" id="filter-azienda" placeholder="Filtro per azienda">
    <input type="text" class="filter" id="filter-descrizione" placeholder="Filtro per descrizione">
</div>
    <button title="Crea una nuova azienda" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-60 mb-3 lh-1 rounded" onclick="window.location.href = '{{ route('addcompany') }}'"> <i class="fas fa-user-plus"></i></button>
    @isset($aziende)
        @foreach ($aziende as $azienda)
        <section id="azienda" class="azienda filterable">
            <div id="high_c">
                <div id="immagine azienda">
                    @include('helpers/aziendeImg', ['attrs' => 'imagefrm', 'imgFile' => $azienda->Logo])
                </div>
               <div class="name_a">
                    <h1>{{ $azienda->Ragione_Sociale}}, {{ $azienda->id }}</h1>
                </div>
            </div>
            <div id="low_c">
                <div id="slot">
                    <iframe src="https://maps.google.com/maps?width=200&amp;height=200&amp;hl=en&amp;
                        q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"  width="200" height="200"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/distance-area-calculator.html">measure distance on map</a>
                    </iframe>
                </div>

                <div id="slot-descrizione">
                    <h3>Descrizione:</h3>
                    <p>{{ $azienda->Descrizione }}</p>
                </div>

                <div id="slot">
                    <p>Qui ci sono i contatti dell'azienda</p>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center ">
                <a href="{{ route('companymodify', ['company_id' => $azienda->id])}}" title="Modifica i dati dell'offerta" 
                   class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded"><i class="fas fa-pencil-alt"></i></a>
                <a href="{{ route('deletecompany', ['company_id' => $azienda->id]) }}" title="Elimina azienda" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded" 
                   onclick="event.preventDefault(); if (confirm('Sei sicuro di voler eliminare questa azienda?')) { document.getElementById('delete-form-{{ $azienda->id }}').submit(); }"> <i class="fa fa-trash"></i></a>
                <form id="delete-form-{{ $azienda->id }}" action="{{ route('deletecompany', ['company_id' => $azienda->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </section>
        @endforeach
    @endisset
    </section>
@endsection
<script>

$(document).ready(function() {
   
   
    // Evento di ascolto per gli input di filtro
    $('.filter').on('input', function() {
        filterResults();
    });

    function filterResults() {
      var aziendaFilter = $('#filter-azienda').val().toLowerCase();
      var descrizioneFilter = $('#filter-descrizione').val().toLowerCase();

      $('.filterable').each(function() {
          var aziendaName = $(this).find('.name_a h1').text().toLowerCase();
          var descrizioneAzienda = $(this).find('#slot-descrizione p').text().toLowerCase();
          var showAzienda = true;

          
          if (aziendaFilter !== '' && !aziendaName.includes(aziendaFilter)) {
                showAzienda = false;
            }

            if (descrizioneFilter !== '' && !descrizioneAzienda.includes(descrizioneFilter)) {
                showAzienda = false;
            }
          // Nascondi l'azienda inizialmente
          
  

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