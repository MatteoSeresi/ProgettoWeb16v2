@extends('layouts.adminlayout')

@section('title', 'Gestione staff')
<head><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script></head>
@section('content')
<section id="azienda">
<div id="filter">
<input type="text" class="filter" id="filter-nome" placeholder="Filtro per nome">
<input type="text" class="filter" id="filter-cognome" placeholder="Filtro per cognome">
    
</div>
    <button title="Crea un nuovo utente staff" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-60 mb-3 lh-1 rounded" onclick="window.location.href = '{{ route('addstaff') }}'"> <i class="fas fa-user-plus"></i></button>
    @isset($staffs)
        @foreach ($staffs as $staff)
        <section id="azienda" class="azienda filterable">
            <h1 class="text-center">{{ $staff->name }} </h1>
            <h1 class="text-center"> {{ $staff->surname }}</h1>
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