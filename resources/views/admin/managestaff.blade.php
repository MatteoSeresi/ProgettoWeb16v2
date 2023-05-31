@extends('layouts.adminlayout')

@section('title', 'Gestione staff')

@section('content')
<section id="azienda">
    
<div id="filter">
<input type="text" id="filter-azienda" placeholder="Filtro per nome">
    <input type="text" id="filter-azienda" placeholder="Filtro per cognome">
    <input type="text" id="filter-descrizione" placeholder="Filtro per descrizione">
</div>
    <button title="Crea un nuovo utente staff" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-60 mb-3 lh-1 rounded" onclick="window.open('https://www.youtube.com/')"> <i class="fas fa-user-plus"></i></button>
    @isset($staffs)
        @foreach ($staffs as $staff)
        <section id="azienda">
            <h1 class="text-center">{{ $staff->name }} {{ $staff->surname }}</h1>
            <div id="dati">
                <p>Data di nascita: {{ $staff->data_nascita }}</p>
                <p>Telefono: {{ $staff->telefono }}</p>
                <p>Email: {{ $staff->email }}</p>
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