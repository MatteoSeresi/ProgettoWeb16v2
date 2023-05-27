@extends('layouts.public')

@section('title', 'Registrazione')

@section('content')
<section>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5 text-center">
            <h2 class="fw-semibold mb-4">Registrazione</h2> 
            {{ Form::open(array('route' => 'registrazione', 'class' => 'contact-form')) }}           
                @csrf
                <div class="form-floating mb-3">
                    {{ Form::text('name', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true,  'id' => 'name',  ]) }}   
                    {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                    @if ($errors->first('name'))
                    <ul class="errors">
                        @foreach ($errors->get('name') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif             
                </div>
                <div class="form-floating mb-3">
                    {{ Form::text('surname', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline','id' => 'surname']) }}
                    {{ Form::label('surname', 'Cognome', ['class' => 'label-input']) }}
                    @if ($errors->first('surname'))
                    <ul class="errors">
                        @foreach ($errors->get('surname') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif               
                </div>
                <div class="form-floating mb-3">
                    {{ Form::text('username', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'username']) }}  
                    {{ Form::label('username', 'Nome Utente', ['class' => 'label-input']) }}
                    @if ($errors->first('username'))
                    <ul class="errors">
                        @foreach ($errors->get('username') as $message)
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
                    @if ($errors->first('data_nascita'))
                    <ul class="errors">
                        @foreach ($errors->get('data_nascita') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif                      
                </div>
                <div class="form-floating mb-3">
                    {{ Form::tel('telefono', '', ['class' => 'input form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 
                    rounded-0 bg-transparent no-outline', 'required' => true, 'id' => 'telefono']) }}
                    {{ Form::label('telefono', 'Telefono', ['class' => 'label-input']) }}
                    @if ($errors->first('telefono'))
                    <ul class="errors">
                        @foreach ($errors->get('telefono') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif                        
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
                {{ Form::submit('Registra', ['class' => 'loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-100 mb-3 lh-1 rounded']) }}
                <a href="{{ route('login') }}" class="text-black d-block spa">Hai già un account? Allora accedi</a>       
            {{ Form::close() }}
        </div>   
    </div>
    <!-- <div class="row justify-content-center">
        <div class="col-12 col-lg-5">
            <h2 class="fw-semibold mb-4 text-center">Nuovo utente</h2>
            <form method="POST" action="{{ route('registrazione') }}">
                <div class="form-floating mb-3">
                    <input name="Nome" type="text" class="form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline" placeholder="Nome" required="true">
                    <label>Nome</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="Cognome" type="text" class="form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline" placeholder="Nome" required="true">
                    <label>Cognome</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="Utente" type="text" class="form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline" placeholder="Username" required="true">
                    <label>Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="Email" type="email" class="form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline" placeholder="Indirizzo email" required="true">
                    <label>Indirizzo email</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="Password" id="pwd"  type="password" class="form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline" placeholder="Password" required="true" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&amp;*-:_]).{8,}$" oninvalid="this.setCustomValidity('Minimo otto caratteri, almeno una lettera maiuscola, una lettera minuscola, un numero e un carattere speciale')" oninput="this.setCustomValidity('')">
                    <label>Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input id="cpwd" type="password" class="form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline" placeholder="Conferma password" required="true">
                    <label>Conferma password</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="Data_Nascita" type="text" class="form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Data nascita" required="true">
                    <label>Data di nascita</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="Telefono" type="tel" class="form-control border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline" placeholder="Telefono" required="true" pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Richiede 10 numeri')" oninput="this.setCustomValidity('')">
                    <label>Telefono</label>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" >Sesso</label>
                    <select required name="Genere" class="form-select border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline" >
                        <option value="">...</option>
                        <option value="1">Maschio</option>
                        <option value="2">Femmina</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" >Tipo utente</label>
                    <select required name="Tipo" class="form-select border-top-0 border-start-0 border-end-0 border-2 border-black  border-bottom-3 rounded-0 bg-transparent no-outline" >
                        <option value="">...</option>
                        <option value="1">Cliente</option>
                        <option value="2">Staff</option>
                    </select>
                </div>
                <button name="login" type="submit" class="my-3 loader border-0 bg-black text-white p-3 text-center fw-bold text-uppercase d-block w-100 mb-3 lh-1 rounded">registrati</button>
                <a href="{{ route('login') }}" class="spa text-center text-black d-block">Hai già un'account? Accedi</a>
            </form>
        </div>
    </div>  -->
</section>
@endsection