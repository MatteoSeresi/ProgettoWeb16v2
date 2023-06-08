<?php

namespace App\Http\Controllers;
use App\Models\Resources\Company;
use App\Models\Resources\Offer;
use App\Models\Catalogo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\NewOfferRequest;


class StaffController extends Controller {

    protected $_utenteModel;
    protected $_companyModel;
    protected $_catalogModel;
    protected $_offerModel;

//COSTRUTTORE
    public function __construct() {
        $this->_companyModel = new Company;
        $this->_catalogModel = new Catalogo;
        $this->_offerModel = new Offer;
    }
//AREA STAFF
    public function staffarea() {
        return view('staff')
            ->with('user', Auth::user());
    }

    public function modificaStaff() {
        $staff = Auth::user();
        return view('staff.staffmodify')
                ->with('user', $staff);
    }

    public function updateStaff(Request $request){
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

        return redirect()->route('staff');
    }
//VISUALIZZA ELENCO OFFERTE
    public function visualizzaOfferte() {
        $aziende = $this->_companyModel->getAzienda();
        $azndOff = $this->_catalogModel->getAziendaWithOffer($aziende);

        return view('staff.offermodify')
                ->with('aziende', $azndOff);
    }
//GESTISCI OFFERTE
    public function addOfferta() {
        $off = Offer::pluck('Nome', 'ID_Offerta');
        $azd = $this->_companyModel->getAzienda()->pluck('Ragione_Sociale', 'id');
        return view('staff.gestioneofferte.create')
                        ->with('offerta', $off)
                        ->with('aziende', $azd);
    }

    public function storeOfferta(NewOfferRequest $request) {

        if ($request->hasFile('image')) {
            $logo = $request->file('image');
            $logoName = $logo->getClientOriginalName();
        } else {
            $logoName = NULL;
        }

        $offer = new Offer;
        $offer->fill($request->validated());
        $offer->Immagine = $logoName;
        $offer->save();

        if (!is_null($logoName)) {
            $destinationPath = public_path() . '/img';
            $logo->move($destinationPath, $logoName);
        };

        return redirect()->route('offermodify');
        
    }

    public function modificaOfferta($offer_id){
        $offer = $this->_offerModel->getOfferByID($offer_id);
        return view('staff.gestioneofferte.modify')
                ->with('offerta', $offer);
    }

    public function updateOfferta(Request $request, $offer_id){

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $request->validate([
            'Nome' => ['required', 'string', 'max:255'],
            'Descrizione' => ['required', 'string'],
            'Scadenza' => ['required', 'date'],
            'Immagine' => ['nullable', 'image', 'max:2048'] 
        ]);

        $offerta = $this->_offerModel->getOfferByID($offer_id);

        $offerta->Nome = $request->input('Nome');
        $offerta->Descrizione = $request->input('Descrizione');
        $offerta->Scadenza = $request->input('Scadenza');
        $offerta->Immagine = $imageName;
    
        $offerta->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/img';
            $image->move($destinationPath, $imageName);
        };

        return redirect('/staff/offermodify');
    }

    public function eliminaOfferta($offer_id) {
        $offer = Offer::find($offer_id);
        $offer->delete();
        return redirect('/staff/offermodify');
    }

    

}