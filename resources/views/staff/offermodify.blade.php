@extends('layouts.stafflayout')

@section('title', 'Modifica Offerte')

@section('content')

<button title="Crea una nuova azienda" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-60 mb-3 
lh-1 rounded" onclick="window.location('{{ route('staffmodify') }}')"> <i class="fa fa-user-plus"></i></button>
<div id="aziende-container">
  @isset($aziende)
      @foreach ($aziende as $azienda)
          @isset($azienda->offerte)
              @if(count($azienda->offerte) > 0)
                  <div class="catalogo">
                      <div class="name_a">
                          <h1>{{ $azienda->Ragione_Sociale}}</h1>
                      </div>
                      @foreach ($azienda->offerte as $offer)
                          <div class="promo">
                              <div class="left_c">
                                  <h2>{{ $offer->Nome }}</h2>
                                  <p>Data di scadenza: {{ $offer->Scadenza }}</p>
                                  <p>Descrizione: {{ $offer->Descrizione }}</p>
                                  @guest
                                    <a href="#" class='disabilita-bottone'>Genera Coupon</a>
                                  @endguest
                                  @can('isUser')
                                    <a href="#">Genera Coupon</a>
                                  @endcan
                              </div>
                              <div class="right_c">
                                  <img src="../../../public/images/{{ $offer->Immagine }}" alt="Coupon">
                              </div>
                              <div class="d-flex justify-content-center align-items-center" style="clear: both">
                                    <button title="Modifica i dati dell'azienda" class="btn-sm loader border-0 bg-black text-white p-3 text-center 
                                    fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded"><i class="fa fa-pencil"></i></button>
                                    <button title="Elimina azienda" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase
                                    d-block w-10 m-3 lh-1 rounded" onclick="window.open('https://www.youtube.com/')"><i class="fa fa-trash"></i></button>
                                </div>  
                          </div>
                      @endforeach
                  </div>
              @endif
          @endisset
      @endforeach
  @endisset
</div>
@endsection