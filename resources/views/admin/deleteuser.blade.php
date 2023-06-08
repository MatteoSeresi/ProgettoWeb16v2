@extends('layouts.adminlayout')

@section('title', 'Cancella utenti')
<head><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script></head>
@section('content')
<div id="filter">
    <input type="text" class="filtro" id="filter-nome" placeholder="Filtro per nome">
    <input type="text" class="filtro" id="filter-cognome" placeholder="Filtro per cognome">
</div>
<div class="catalogo">
    <div class="name_a">
        <h1>Elenco degli utenti registrati</h1>
    </div>
    @isset($utenti)
        @foreach ($utenti as $utente)
        <section id="azienda" class="azienda filterable" style="background-color: rgba(255, 165, 0, 0.2)">
            <h1>{{ $utente->name }} {{ $utente->surname }}</h1>
            <div id="dati">
                <p>Data di nascita: {{ $utente->data_nascita }}</p>
                <p>Telefono: {{ $utente->telefono }}</p>
                <p>Email: {{ $utente->email }}</p>
            </div>
                <a href="{{ route('elimina', ['user_id' => $utente->id]) }}" title="Elimina utente" class="offmod" onclick="event.preventDefault(); if (confirm('Sei sicuro di voler eliminare questo utente?')) { document.getElementById('delete-form-{{ $utente->id }}').submit(); }"> <i class="fa fa-trash"></i></a>
                <form id="delete-form-{{ $utente->id }}" action="{{ route('elimina', ['user_id' => $utente->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
        </section>
        @endforeach
    @endisset
</div>
</section>
@endsection
<script>

$(document).ready(function() {

    // Evento di ascolto per gli input di filtro
    $('.filtro').on('input', function() {
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