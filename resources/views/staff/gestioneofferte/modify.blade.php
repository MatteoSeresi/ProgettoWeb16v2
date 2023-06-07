@extends('layouts.stafflayout')

@section('title', 'Modifica Offerta')

@section('content')
<section>
<button onclick="window.location.href='{{route('offermodify')}}'" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 mb-3 
            lh-1 rounded"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5 text-center">
            <h2 class="fw-semibold mb-4">Modifica Offerta</h2> 
            {{ Form::open(array('route' => ['modify', 'offer_id' => $offerta->ID_Offerta], 'class' => 'contact-form', 'files' => true)) }}
            @csrf
                 <div class="form-floating mb-3">
                    {{ Form::text('Nome', $offerta->Nome ?? old('Nome'), ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true,  'id' => 'Nome']) }}   
                    {{ Form::label('Nome', 'Nome', ['class' => 'label-input']) }}           
                </div>
                <div class="form-floating mb-3">
                    {{ Form::textarea('Descrizione', $offerta->Descrizione ?? old('Descrizione'), ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'Descrizione']) }}
                    {{ Form::label('Descrizione', 'Descrizione', ['class' => 'label-input']) }}             
                </div>
                <div class="form-floating mb-3">
                    {{ Form::date('Scadenza', $offerta->Scadenza ?? old('Scadenza'), ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'Scadenza']) }}
                    {{ Form::label('Scadenza', 'Scadenza', ['class' => 'label-input']) }}                     
                </div>
                <div class="form-floating mb-3">
                    <img src="../../../../../public/img/{{ $offerta->Immagine }}" alt="Coupon">
                    {{ Form::file('image', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => false, 'id' => 'Immagine']) }}
                    {{ Form::label('Immagine', 'Immagine', ['class' => 'label-input']) }}                        
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{ Form::submit('Modifica', ['class' => 'loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-100 mb-3 lh-1 rounded']) }}      
            {{ Form::close() }}
        </div>   
    </div>
</section>
@endsection
