<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller {

    protected $_utenteModel;

//COSTRUTTORE
    public function __construct() {
        $this->_utenteModel = new User;
    }
//AREA UTENTE
    public function userarea() {
        return view('user')
            ->with('user', Auth::user());
    }

    public function modificaUtente() {
        $user = Auth::user();
        return view('user.usermodify')
                ->with('user', $user);
    }

    public function updateUtente(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::id()],
            'username' => ['required', 'string', 'min:8', 'unique:users,username,'.Auth::id()],
            'password' => ['required', 'confirmed', 'min:8'],
            'data_nascita' => ['required', 'date'],
            'telefono' => ['required', 'string', 'digits:10'],
        ]);
        
        $user = User::find(Auth::id());

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->data_nascita = $request->input('data_nascita');
        $user->telefono = $request->input('telefono');
        $user->save();

        return redirect()->route('user');
    }

}
