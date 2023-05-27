@extends('layouts.public')

@section('title', 'Catalogo offerte')

<head><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script></head>

@section('content')
<div id="filter">
    <input id="desc" type="text" placeholder="Descrizione">
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn" id="bot">Aziende<i class="fa fa-angle-down" aria-hidden="true"></i></button>
        <div id="myDropdown" class="dropdown-content">
            <input type="text" placeholder="Aziende" id="myInput" onkeyup="filterFunction()">
            <a href="#about">About</a>
        </div>
    </div>
    <input id="invio" type="submit" value="Filtra">
</div>

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
                                <img src="../../public/images/{{ $offer->Immagine }}" alt="Coupon">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endisset
    @endforeach
@endisset
@endsection



<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

$(document).ready(function() {
  // Funzione di filtro
  function filterOffers() {
    var searchDesc = $('#desc').val().toUpperCase();
    var searchCompany = $('#myInput').val().toUpperCase();

    $('.promo').each(function() {
      var offerDesc = $(this).find('p:nth-child(3)').text().toUpperCase();
      var companyName = $(this).closest('.catalogo').find('.name_a h1').text().toUpperCase();

      if ((searchDesc === '' || offerDesc.includes(searchDesc)) &&
          (searchCompany === '' || companyName.includes(searchCompany))) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }

  // Evento di ricerca per descrizione
  $('#desc').keyup(function() {
    filterOffers();
  });

  // Evento di ricerca per azienda
  $('#myInput').keyup(function() {
    filterOffers();
  });
});

</script>