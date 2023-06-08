@extends('layouts.public')

@section('title', 'Home')

@section('content')
<section>
    <div class="slideshow-container">
    @isset($aziende)
      @foreach ($aziende as $azienda)
          <div class="mySlides fade">
          <img src="../public/images/aziende/{{ $azienda->Logo }}">
          </div>
      @endforeach
    @endisset
    </div>
    <div style="text-align:center">
        @isset($aziende)
            @foreach ($aziende as $azienda)
                <span class="dot" onclick="currentSlide({{$azienda->id}})"></span>
            @endforeach
        @endisset
    </div>
    <br><br>

    
    <div class="row">
    <h2>Descrizione</h2>
        <div class="col">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut dui dapibus, commodo nunc sed, molestie turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla facilisi. Nullam vel consectetur neque. Nulla facilisi. Sed viverra est a urna aliquam bibendum</p> 
            
        </div>
        <div class="col">
            <p> Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc hendrerit, felis sed tincidunt volutpat, odio lorem viverra lectus, sed suscipit justo libero sit amet urna. Aliquam non elit eu justo rutrum euismod eu in lacus. Donec interdum diam in purus mollis, id convallis dui fringilla. In hac habitasse platea dictumst. Nullam nec nisi commodo, facilisis diam id, condimentum dolor. </p>
          
        </div>
    </div>

</section>
<script>
  let slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1; }
    if (n < 1) { slideIndex = slides.length; }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" attivo", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " attivo";
  }

  // Aggiungi il seguente codice per avviare lo slideshow automatico
  setInterval(function() {
    plusSlides(1); // Cambia 1 con il numero di slide da mostrare automaticamente
  }, 2000); // Imposta l'intervallo di tempo in millisecondi tra ogni slide (in questo esempio 2000ms = 2 secondi)
</script>
@endsection