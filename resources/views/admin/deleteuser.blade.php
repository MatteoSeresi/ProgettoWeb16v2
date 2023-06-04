@extends('layouts.adminlayout')

@section('title', 'Cancella utenti')
<head><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script></head>
@section('content')
<section id="azienda">
<div id="filter">
    <input type="text" class="filter" id="filter-nome" placeholder="Filtro per nome">
    <input type="text" class="filter" id="filter-cognome" placeholder="Filtro per cognome">
</div>
    @isset($utenti)
        @foreach ($utenti as $utente)
        <section id="azienda" class="azienda filterable">
            <h1 class="text-center">{{ $utente->name }}</h1>
            <h1 class="text-center"> {{ $utente->surname }}</h1>
            <div id="dati">
                <p>Data di nascita: {{ $utente->data_nascita }}</p>
                <p>Telefono: {{ $utente->telefono }}</p>
                <p>Email: {{ $utente->email }}</p>
            </div>
            <div class="d-flex justify-content-center align-items-center ">
                <a href="{{ route('elimina', ['user_id' => $utente->id]) }}" title="Elimina utente" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded" onclick="event.preventDefault(); if (confirm('Sei sicuro di voler eliminare questo utente?')) { document.getElementById('delete-form-{{ $utente->id }}').submit(); }"> <i class="fa fa-trash"></i></a>
                <form id="delete-form-{{ $utente->id }}" action="{{ route('elimina', ['user_id' => $utente->id]) }}" method="POST" style="display: none;">
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
      var nomeFilter = $('#filter-nome').val().toLowerCase();
      var cognomeFilter = $('#filter-cognome').val().toLowerCase();
    

      $('.filterable').each(function() {
          var nomeUser = $(this).find('h1:eq(0)').text().toLowerCase();
          var cognomeUser = $(this).find('h1:eq(1)').text().toLowerCase();
          var showUser = true;

          if (nomeFilter !== '' && !nomeUser.includes(nomeFilter)) {
                showUser = false;
            }

            if (cognomeFilter !== '' && !cognomeUser.includes(cognomeFilter)) {
                showUser = false;
            }

          // Mostra o nascondi l'azienda in base alla corrispondenza dei filtri
          if (showUser) {
              $(this).show();
          } else {
              $(this).hide();
            }
      });
    }
});

</script>