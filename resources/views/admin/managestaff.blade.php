@extends('layouts.adminlayout')

@section('title', 'Gestione staff')
<head><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script></head>
@section('content')
<div id="filter">
    <input type="text" class="filtro" id="filter-nome" placeholder="Filtro per nome">
    <input type="text" class="filtro" id="filter-cognome" placeholder="Filtro per cognome">
</div>
<button title="Crea un nuovo utente staff" class="add" onclick="window.location.href = '{{ route('addstaff') }}'"><i class="fa fa-plus"></i></button>
<div class="catalogo">
    <div class="name_a">
        <h1>Elenco degli utenti registrati</h1>
    </div>  
    @isset($staffs)
        @foreach ($staffs as $staff)
        <section id="azienda" class="azienda filterable" style="background-color: rgba(255, 165, 0, 0.2)">
            <h2>{{ $staff->name }}</h2>
            <h2>{{ $staff->surname }}</h2>
            <div id="dati">
                <p>Data di nascita: {{ $staff->data_nascita }}</p>
                <p>Telefono: {{ $staff->telefono }}</p>
                <p>Email: {{ $staff->email }}</p>
            </div>
                <a href="{{ route('editstaff', ['staff_id' => $staff->id])}}" title="Modifica i dati dell'utente staff" class="offmod"><i class="fa fa-pencil"></i></a>
                <a href="{{ route('eliminastaff', ['staff_id' => $staff->id]) }}" title="Elimina utente staff" class="offmod" onclick="event.preventDefault(); if (confirm('Sei sicuro di voler eliminare questo utente staff?')) { document.getElementById('delete-form-{{ $staff->id }}').submit(); }"> <i class="fa fa-trash"></i></a>
                <form id="delete-form-{{ $staff->id }}" action="{{ route('eliminastaff', ['staff_id' => $staff->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
        </section>
        @endforeach
    @endisset
</div>
</section>

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
      var nomeUser = $(this).find('h2:eq(0)').text().toLowerCase();
      var cognomeUser = $(this).find('h2:eq(1)').text().toLowerCase();
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
@endsection