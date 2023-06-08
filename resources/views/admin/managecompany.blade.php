@extends('layouts.adminlayout')

@section('title', 'Gestione aziende')
<head><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script></head>
@section('content')
<button title="Crea un nuova azienda" class="add" onclick="window.location.href = '{{ route('addcompany') }}'"><i class="fa fa-plus"></i></button>
    @isset($aziende)
        @foreach ($aziende as $azienda)
        <section id="azienda">
            <div id="high_c">
                <div id="immagine-azienda">
                    <img src="../../../public/images/aziende/{{ $azienda->Logo }}">
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
                    <p>{{ $azienda->Descrizione }}</p>
                </div>

                <div id="slot">
                    <p>{{$azienda->Localizzazione}}, {{$azienda->civico}}, {{$azienda->citta}}, {{$azienda->cap}}</p><br>
                    <p>Telefono: {{$azienda->tel}}</p><br>
                    <p>Email: <a href="mailto:{{$azienda->email}}" style="text-decoration: none">{{$azienda->email}}</a></p>
                </div>
            </div>
            <div id="end_c">
                <a href="{{ route('companymodify', ['company_id' => $azienda->id])}}" title="Modifica i dati ddell'azienda" class="offmod"><i class="fa fa-pencil"></i></a>
                <a href="{{ route('deletecompany', ['company_id' => $azienda->id]) }}" title="Elimina azienda" class="offmod" onclick="event.preventDefault(); if (confirm('Sei sicuro di voler eliminare questa azienda?')) { document.getElementById('delete-form-{{ $azienda->id }}').submit(); }"> <i class="fa fa-trash"></i></a>
                <form id="delete-form-{{ $azienda->id }}" action="{{ route('deletecompany', ['company_id' => $azienda->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </section>
        @endforeach
    @endisset
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