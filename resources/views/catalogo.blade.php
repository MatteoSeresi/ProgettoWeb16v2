@extends('layouts.public')

@section('title', 'Catalogo offerte')

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
                                <img src="../../public/images/coup.jpg" alt="Coupon">
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

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>