@extends('layouts.public')

@section('title', 'Login')

@section('content')
<section>  
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5 text-center">
            <h2 class="fw-semibold mb-4">Effettua l'accesso</h2> 
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}           
                @csrf
                <div class="form-floating mb-3">
                    {{ Form::label('Utente', 'Nome Utente', ['class' => 'label-input']) }}
                    {{ Form::text('Utente', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline','id' => 'Utente']) }}                    
                </div>
                <div class="form-floating mb-3">      
                    {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                    {{ Form::password('Password', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                        rounded-0 bg-transparent no-outline', 'id' => 'Password']) }}
                </div>
                {{ Form::submit('Login', ['class' => 'loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-100 mb-3 lh-1 rounded']) }}
                <a href="{{ route('registrazione') }}" class="text-black d-block spa">Se non sei ancora registrato crea il tuo account</a>       
            {{ Form::close() }}
        </div>   
    </div>
</section>
@endsection