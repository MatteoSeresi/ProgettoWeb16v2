@extends('layouts.userlayout')

@section('title', 'Modifica Utente')


@section('content')
<section>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5 text-center">
            <h2 class="fw-semibold mb-4">Modifica i tuoi dati</h2> 
            {{ Form::open(array('route' => 'usermodify', 'class' => 'contact-form')) }}
            @csrf
                <div class="form-floating mb-3">
                    {{ Form::text('name', $user->name ?? old('name'), ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true,  'id' => 'name',  ]) }}   
                    {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}           
                </div>
                <div class="form-floating mb-3">
                    {{ Form::text('surname', $user->surname ?? old('surname'), ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline','id' => 'surname']) }}
                    {{ Form::label('surname', 'Cognome', ['class' => 'label-input']) }}             
                </div>
                <div class="form-floating mb-3">
                    {{ Form::text('username', $user->username ?? old('username'), ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'username']) }}  
                    {{ Form::label('username', 'Nome Utente', ['class' => 'label-input']) }}                   
                </div>
                <div class="form-floating mb-3">
                    {{ Form::email('email', $user->email ?? old('email'), ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
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
                    {{ Form::date('data_nascita', $user->data_nascita ?? old('data_nascita'), ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'data_nascita']) }}
                    {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'label-input']) }}                     
                </div>
                <div class="form-floating mb-3">
                    {{ Form::tel('telefono', $user->telefono ?? old('telefono'), ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'telefono']) }}
                    {{ Form::label('telefono', 'Telefono', ['class' => 'label-input']) }}                        
                </div>
                {{ Form::submit('Modifica', ['class' => 'loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-100 mb-3 lh-1 rounded']) }}      
            {{ Form::close() }}
        </div>   
    </div>
</section>
@endsection