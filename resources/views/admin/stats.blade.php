@extends('layouts.adminlayout')

@section('title', 'Statistiche sito')

@section('content')
<section class="stats">
  <h1>Statistiche</h1>
  <div class="mid">
    <p>Coupon totali emessi: {{$num_coupon}}</p><br>
    <p>Seleziona la promozione per vedere il numero di coupon emessi per essa:</p>
    <div class="option">
      {{ Form::select('couponId', $offerte, '', ['class' => 'input', 'id' => 'couponId', 'placeholder' => '']) }}
      <div id="offerta" data-url="{{ route('get-coupon-count-offerta') }}"></div>
    </div><br>
    <p>Seleziona l'utente per vedere il numero di coupon generati a suo nome:</p>
    <div class="option">
      {{ Form::select('utenteId', $users, '', ['class' => 'input', 'id' => 'utenteId', 'placeholder' => '']) }}
      <div id="utente" data-url="{{ route('get-coupon-count-utente') }}"></div>
    </div>
  </div>
  <button title="Aggiorna statistiche" class="send" onclick="window.location.href = '{{route('stats')}}'"><i class="fa fa-refresh" aria-hidden="true"></i></button>
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