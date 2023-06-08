@extends('layouts.adminlayout')

@section('title', 'Modifica Azienda')

@section('content')
<section id="autorizzazione">
<button onclick="window.location.href='{{route('managecompany')}}'" class="back" title="Indietro" ><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
    <div class="log">
        <div class="log-head">
            <h1>BENVENUTO</h1>
        </div>
        <div class="log-form">
            <h2>Modifica Azienda</h2> 
            {{ Form::open(array('route' => ['companymodify', $azienda->id], 'class' => 'contact-form', 'files' => true)) }}
            @csrf
            <div class="log-slot">
                {{ Form::label('P_Iva', 'Partita Iva', ['class' => 'label-input']) }}
                {{ Form::text('P_Iva', $azienda->P_Iva ?? old('P_Iva'), ['class' => 'input in-box', 'required' => true,  'id' => 'P_Iva']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('Ragione_Sociale', 'Ragione Sociale', ['class' => 'label-input']) }}
                {{ Form::text('Ragione_Sociale', $azienda->Ragione_Sociale ?? old('Ragione_Sociale'), ['class' => 'input in-box', 'required' => true,  'id' => 'Ragione_Sociale']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('Localizzazione', 'Indirizzo', ['class' => 'label-input']) }}
                {{ Form::text('Localizzazione', $azienda->Localizzazione ?? old('Localizzazione'), ['class' => 'input in-box', 'required' => true, 'id' => 'Localizzazione']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('civico', 'Civico', ['class' => 'label-input']) }}
                {{ Form::text('civico', $azienda->civico ?? old('civico'), ['class' => 'input in-box', 'required' => true,  'id' => 'civico']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('citta', 'Città', ['class' => 'label-input']) }}
                {{ Form::text('citta', $azienda->citta ?? old('citta'), ['class' => 'input in-box', 'required' => true,  'id' => 'citta']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('cap', 'Cap', ['class' => 'label-input']) }} 
                {{ Form::text('cap', $azienda->cap ?? old('cap'), ['class' => 'input in-box', 'required' => true,  'id' => 'cap']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('Descrizione', 'Descrizione', ['class' => 'label-input']) }}
                {{ Form::textarea('Descrizione', $azienda->Descrizione ?? old('Descrizione'), ['class' => 'input in-box', 'required' => true, 'id' => 'Descrizione']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('Logo', 'Logo', ['class' => 'label-input']) }}
                <img src="../../../../../public/images/aziende/{{ $azienda->Logo }}" alt="Coupon">
                {{ Form::file('image', ['class' => 'input in-box', 'required' => false, 'id' => 'Logo']) }}
            </div> 
            <div class="log-slot">
                {{ Form::label('tel', 'Telefono', ['class' => 'label-input']) }}
                {{ Form::text('tel', $azienda->tel ?? old('tel'), ['class' => 'input in-box', 'required' => true,  'id' => 'tel']) }}
            </div>
            <div class="log-slot">
                {{ Form::label('email', 'E-mail', ['class' => 'label-input']) }}
                {{ Form::text('email', $azienda->email ?? old('email'), ['class' => 'input in-box', 'required' => true,  'id' => 'email']) }}
            </div>
            <button title="Conferma" class="send" type = "submit"><i class="fa fa-check"></i></button>
            <button title="Scarta modifiche" class="send" type = "reset"><i class="fa fa-undo" aria-hidden="true"></i></button>       
            {{ Form::close() }} 
        </div>   
    </div>
</section>
@endsection