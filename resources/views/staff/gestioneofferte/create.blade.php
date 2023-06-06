@extends('layouts.stafflayout')

@section('title', 'Crea Offerta')

@section('content')
<section>
<button onclick="window.location.href='{{route('offermodify')}}'" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 mb-3 
            lh-1 rounded"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5 text-center">
            <h2 class="fw-semibold mb-4">Crea Offerta</h2> 
            {{ Form::open(array('route' => 'addOffer.store', 'class' => 'contact-form', 'files' => true)) }}
            @csrf
            <div class="form-floating mb-3">
                {{ Form::select('ID_Azienda', $aziende, '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline', 'id' => 'ID_Azienda']) }}
                {{ Form::label('ID_Azienda', 'Azienda', ['class' => 'label-input']) }}
            </div>
                 <div class="form-floating mb-3">
                    {{ Form::text('Nome', '' , ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true,  'id' => 'Nome']) }}   
                    {{ Form::label('Nome', 'Nome', ['class' => 'label-input']) }}           
                </div>
                <div class="form-floating mb-3">
                    {{ Form::textarea('Descrizione', '' , ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'Descrizione']) }}
                    {{ Form::label('Descrizione', 'Descrizione', ['class' => 'label-input']) }}             
                </div>
                <div class="form-floating mb-3">
                    {{ Form::date('Scadenza', '' ,['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'Scadenza']) }}
                    {{ Form::label('Scadenza', 'Scadenza', ['class' => 'label-input']) }}                     
                </div>
                <div class="form-floating mb-3">
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
                {{ Form::submit('Inserisci', ['class' => 'loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-100 mb-3 lh-1 rounded']) }}      
            {{ Form::close() }}
        </div>   
    </div>
</section>
@endsection
