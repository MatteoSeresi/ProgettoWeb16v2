@extends('layouts.adminlayout')

@section('title', 'Aggiungi utente staff')

@section('content')
<button onclick="window.location.href='{{route('managestaff')}}'" class="btn-sm loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-10 mb-3 
            lh-1 rounded"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
<section>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5 text-center">
            <h2 class="fw-semibold mb-4">Aggiungi un nuovo utente staff</h2> 
            {{ Form::open(array('route' => 'addstaff.store', 'class' => 'contact-form')) }}           
                @csrf
                <div class="form-floating mb-3">
                    {{ Form::text('name', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true,  'id' => 'name',  ]) }}   
                    {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}           
                </div>
                <div class="form-floating mb-3">
                    {{ Form::text('surname', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline','id' => 'surname']) }}
                    {{ Form::label('surname', 'Cognome', ['class' => 'label-input']) }}             
                </div>
                <div class="form-floating mb-3">
                    {{ Form::text('username', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'username']) }}  
                    {{ Form::label('username', 'Nome Utente', ['class' => 'label-input']) }}                   
                </div>
                <div class="form-floating mb-3">
                    {{ Form::email('email', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'email']) }}    
                    {{ Form::label('email', 'Email', ['class' => 'label-input']) }}                  
                </div>
                <div class="form-floating mb-3">      
                    {{ Form::password('password', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                        rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'password']) }}
                    {{ Form::label('password', 'Password', ['class' => 'label-input']) }}  
                    @if ($errors->first('password'))
                    <ul class="errors">
                        @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="form-floating mb-3">      
                    {{ Form::password('password_confirmation', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                        rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'password-confirm']) }}
                    {{ Form::label('password-confirm', 'Conferma Password', ['class' => 'label-input']) }}
                </div>
                <div class="form-floating mb-3">
                    {{ Form::date('data_nascita', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'data_nascita']) }}
                    {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'label-input']) }}                     
                </div>
                <div class="form-floating mb-3">
                    {{ Form::tel('telefono', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'telefono']) }}
                    {{ Form::label('telefono', 'Telefono', ['class' => 'label-input']) }}                        
                </div>
                <div class="input-group mb-3">
                    {{ Form::label('genere', 'Genere', ['class' => 'input-group-text']) }}
                    {{ Form::select('genere',  ['Uomo' => 'Maschio', 'Donna' => 'Femmina'], ['class' => 'input form-select border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'genere']) }}      
                    @if ($errors->first('genere'))
                    <ul class="errors">
                        @foreach ($errors->get('genere') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif                 
                </div>
                
                {{ Form::submit('Inserisci', ['class' => 'loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-100 mb-3 lh-1 rounded']) }}    
            {{ Form::close() }}
        </div>   
    </div>
</section>
@endsection