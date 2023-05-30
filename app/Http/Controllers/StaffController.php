<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use App\Models\Resources\Company;
use App\Models\Catalogo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class StaffController extends Controller {

    protected $_utenteModel;
    protected $_companyModel;
    protected $_catalogModel;

    public function __construct() {
        $this->_companyModel = new Company;
        $this->_catalogModel = new Catalogo;
    }
    public function staffarea() {
        return view('staff');
    }

    public function modificaStaff() {
        return view('staff.staffmodify');
    }

    public function modificaOfferta() {
        $aziende = $this->_companyModel->getAzienda();
        $azndOff = $this->_catalogModel->getAziendaWithOffer($aziende);

        return view('staff.offermodify')
                ->with('aziende', $azndOff);
    }

    public function updateStaff(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::id()],
            'username' => ['required', 'string', 'min:8', 'unique:users,username,'.Auth::id()],
            'password' => ['required', 'confirmed'],
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

        return redirect()->route('staff');
    }

}