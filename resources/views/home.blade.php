@extends('layouts.public')

@section('title', 'Home')

@section('content')
<section>
    <div class="slideshow-container">
    @isset($aziende)
      @foreach ($aziende as $azienda)
          <div class="mySlides fade">
          <img src="../public/img/aziende/{{ $azienda->Logo }}">
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
              <p style="text-align: justify">CouponHub offre la pubblicizzazione di offerte promozionali per prodotti e servizi, con la possibilità di emettere coupon di vario genere nella sezione catalogo. 
                Gli utenti registrati possono visualizzare le offerte di loro interesse e ottenere un coupon che consente loro di acquistare la promozione presso i negozi o centri delle aziende aderenti. 
                Ogni utente può acquisire un solo coupon per ciascuna promozione, i quali saranno generati come pagine web contenenti la descrizione del prodotto offerto, l'identità dell'utente, le modalità di utilizzo e un codice univoco. 
                È importante sottolineare che il sito non supporta attività di e-commerce effettivo; quindi, non è possibile acquistare i coupon tramite il sito stesso.</p>
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