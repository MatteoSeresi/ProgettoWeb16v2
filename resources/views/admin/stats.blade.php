@extends('layouts.adminlayout')

@section('title', 'Statistiche sito')

@section('content')
<section id="azienda">
    <section id="azienda">
        <h1 class="text-center">Statistiche</h1>
        <div id="dati">
            <p>Coupon totali emessi: {{$coupon}}</p>
            <p>selezionando una promozione (sia attiva che scaduta), il numero di coupon emessi per essa; </p>
            <p>selezionando un cliente, il numero di coupon emessi a suo nome</p>
        </div>
        <div class="d-flex justify-content-center align-items-center ">
            <button title="Aggiorna statistiche" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 m-3 lh-1 rounded" onclick="window.open('')"><i class="fas fa-sync-alt"></i></button>
        </div>
    </section>
</section>
@endsection