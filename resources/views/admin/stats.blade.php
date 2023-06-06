@extends('layouts.adminlayout')

@section('title', 'Statistiche sito')

@section('content')
<button onclick="window.location.href='{{route('admin')}}'" class="btn-sm loader border-0 bg-black text-white p-3 text-center 
fw-bold text-uppercase d-block w-10 mb-3 lh-1 rounded"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
<section id="azienda">
    <section id="azienda">
        <h1 class="text-center">Statistiche</h1>
        <div id="dati">
            <p>Coupon totali emessi: {{$num_coupon}}</p>
            <p>Seleziona la promozione per vedere il numero di coupon emessi per essa:</p>
            <div id="offerta" data-url="{{ route('get-coupon-count-offerta') }}"></div>
            <br>
                <div class="form-floating mb-3">
                    {{ Form::select('couponId', $offerte, '', ['class' => 'input form-control border-top-0 border-start-0 
                      border-end-0 border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline', 
                      'id' => 'couponId', 'placeholder' => '']) }}
                    {{ Form::label('couponId', 'Offerta', ['class' => 'label-input']) }}
                </div>
            </p>
            <p>Seleziona l'utente per vedere il numero di coupon generati a suo nome:</p>
            <div id="utente" data-url="{{ route('get-coupon-count-utente') }}"></div>
            <br>
                <div class="form-floating mb-3">
                    {{ Form::select('utenteId', $users, '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 
                      border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline', 'id' => 'utenteId', 
                      'placeholder' => '']) }}
                    {{ Form::label('utenteId', 'Utente', ['class' => 'label-input']) }}
                </div>
            </p>
        </div>
        <div class="d-flex justify-content-center align-items-center ">
            <button title="Aggiorna statistiche" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold 
            text-uppercase d-block w-10 m-3 lh-1 rounded" onclick="window.open('')"><i class="fas fa-sync-alt"></i></button>
        </div>
    </section>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('#couponId').change(function() {
    var offertaId = $(this).val();
    var url = $('#offerta').data('url');
    
    $.ajax({
      url: url,
      type: 'GET',
      data: { offertaId: offertaId },
      success: function(response) {
        $('#offerta').text('Numero di coupon emessi per l\'offerta: ' + response);
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });

  $('#utenteId').change(function(){
    var utenteId = $(this).val();
    var url = $('#utente').data('url');

    $.ajax({
      url: url,
      type: 'GET',
      data: { utenteId: utenteId },
      success: function(response) {
        $('#utente').text('Numero di coupon emessi per l\'utente: ' + response);
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
});
</script>
@endsection