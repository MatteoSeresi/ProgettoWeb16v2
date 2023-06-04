@extends('layouts.adminlayout')

@section('title', 'Modifica Azienda')

@section('content')
<section>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5 text-center">
            <h2 class="fw-semibold mb-4">Modifica Azienda</h2> 
            {{ Form::open(array('route' => ['companymodify', $azienda->id], 'class' => 'contact-form', 'files' => true)) }}
            @csrf
                <div class="form-floating mb-3">
                    {{ Form::text('Ragione_Sociale', $azienda->Ragione_Sociale ?? old('Ragione_Sociale'), ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true,  'id' => 'Ragione_Sociale']) }}   
                    {{ Form::label('Ragione_Sociale', 'Ragione Sociale', ['class' => 'label-input']) }}           
                </div>
                <div class="form-floating mb-3">
                    {{ Form::text('Localizzazione', $azienda->Localizzazione ?? old('Localizzazione'), ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'Localizzazione']) }}
                    {{ Form::label('Localizzazione', 'Localizzazione', ['class' => 'label-input']) }}             
                </div>
                <div class="form-floating mb-3">
                    {{ Form::textarea('Descrizione', $azienda->Descrizione ?? old('Descrizione'), ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'Descrizione']) }}
                    {{ Form::label('Descrizione', 'Descrizione', ['class' => 'label-input']) }}                     
                </div>
                <div class="form-floating mb-3">
                    {{-- <img src="../../../../../public/images/aziende/{{ $azienda->Logo }}" alt="Coupon"> --}}
                    {{ Form::file('image', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => false, 'id' => 'Logo']) }}
                    {{ Form::label('Logo', 'Logo', ['class' => 'label-input']) }}                         
                </div> 
                {{ Form::submit('Modifica', ['class' => 'loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-100 mb-3 lh-1 rounded']) }}      
            {{ Form::close() }} 
        </div>   
    </div>
</section>
@endsection