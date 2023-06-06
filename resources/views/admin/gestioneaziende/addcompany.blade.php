@extends('layouts.adminlayout')

@section('title', 'Aggiungi azienda')

@section('content')
<section>
<button onclick="window.location.href='{{route('managecompany')}}'" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 mb-3 
            lh-1 rounded"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5 text-center">
            <h2 class="fw-semibold mb-4">Aggiungi una nuova azienda</h2> 
            {{ Form::open(array('route' => 'addcompany.store', 'class' => 'contact-form')) }}           
                @csrf
                <div class="form-floating mb-3">
                    {{ Form::text('P_Iva', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true,  'id' => 'P_Iva',  ]) }}   
                    {{ Form::label('P_Iva', 'Partita Iva', ['class' => 'label-input']) }}
                    @if ($errors->first('P_Iva'))
                    <ul class="errors">
                        @foreach ($errors->get('P_Iva') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif             
                </div>
                <div class="form-floating mb-3">
                    {{ Form::text('Ragione_Sociale', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline','id' => 'Ragione_Sociale']) }}
                    {{ Form::label('Ragione_Sociale', 'Ragione sociale', ['class' => 'label-input']) }}
                    @if ($errors->first('Ragione_Sociale'))
                    <ul class="errors">
                        @foreach ($errors->get('Ragione_Sociale') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>
                <div class="form-floating mb-3">
                    {{ Form::text('Localizzazione', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline','id' => 'Localizzazione']) }}
                    {{ Form::label('Localizzazione', 'Localizzazione', ['class' => 'label-input']) }}
                    @if ($errors->first('Localizzazione'))
                    <ul class="errors">
                        @foreach ($errors->get('Localizzazione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>
                <div class="form-floating mb-3">
                    {{ Form::text('Descrizione', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline','id' => 'Descrizione']) }}
                    {{ Form::label('Descrizione', 'Descrizione', ['class' => 'label-input']) }}
                    @if ($errors->first('Descrizione'))
                    <ul class="errors">
                        @foreach ($errors->get('Localizzazione') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>

                <div class="form-floating mb-3">
                    {{ Form::text('civico', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline','id' => 'civico']) }}
                    {{ Form::label('civico', 'Civico', ['class' => 'label-input']) }}
                    @if ($errors->first('civico'))
                    <ul class="errors">
                        @foreach ($errors->get('civico') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>

                <div class="form-floating mb-3">
                    {{ Form::text('citta', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline','id' => 'citta']) }}
                    {{ Form::label('citta', 'Città', ['class' => 'label-input']) }}
                    @if ($errors->first('citta'))
                    <ul class="errors">
                        @foreach ($errors->get('citta') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>

                <div class="form-floating mb-3">
                    {{ Form::text('cap', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline','id' => 'cap']) }}
                    {{ Form::label('cap', 'CAP', ['class' => 'label-input']) }}
                    @if ($errors->first('cap'))
                    <ul class="errors">
                        @foreach ($errors->get('cap') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>

                <div class="form-floating mb-3">
                    {{ Form::tel('tel', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'tel']) }}
                    {{ Form::label('tel', 'Telefono', ['class' => 'label-input']) }}
                    @if ($errors->first('tel'))
                    <ul class="errors">
                        @foreach ($errors->get('tel') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif                        
                </div>

                <div class="form-floating mb-3">
                    {{ Form::email('email', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'email']) }}    
                    {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                    @if ($errors->first('email'))
                    <ul class="errors">
                        @foreach ($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif                   
                </div>   
                <div class="form-floating mb-3">
                    {{ Form::file('Logo', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => false, 'id' => 'Logo']) }}
                    {{ Form::label('Logo', 'Logo', ['class' => 'label-input']) }}                        
                </div>
                {{ Form::submit('Inserisci', ['class' => 'loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-100 mb-3 lh-1 rounded']) }}    
            {{ Form::close() }}
        </div>   
    </div>
</section>
@endsection