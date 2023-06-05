<?php

namespace App\Http\Controllers; 

use App\Models\Admin;
use App\Models\User;
use App\Models\Staff;
use App\Models\Resources\Company;
use App\Models\Resources\Faq;
use App\Models\Resources\Coupon;
use App\Models\Catalogo;
use App\Http\Requests\NewCompanyRequest;
use App\Http\Requests\NewStaffRequest;
use App\Http\Requests\NewFaqRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    protected $_adminModel;
    protected $_companyModel;
    protected $_userModel;
    protected $_staffModel;
    protected $_faqModel;
    protected $_couponModel;
    protected $_catalogModel;


    public function __construct() {
        $this->_adminModel = new Admin;
        $this->_companyModel = new Company;
        $this->_userModel = new User;
        $this->_staffModel = new Staff;
        $this->_faqModel = new Faq;
        $this->_couponModel = new Coupon;
        $this->_catalogModel = new Catalogo;
        $this->middleware('can:isAdmin');
    }

    public function adminarea() {
        return view('admin');
    }

    public function modificaAdmin() {
        return view('admin.adminmodify');
    }

    public function gestioneAzienda() {
        $aznd = $this->_companyModel->getAzienda();  
        return view('admin.managecompany')
                    ->with('aziende', $aznd);
    }

    public function showcancellaUtente() {
        $usr = $this->_userModel->getUtente();  
        return view('admin.deleteuser')
                    ->with('utenti', $usr);
    }

    public function gestioneStaff() {
        $stf = $this->_staffModel->getStaff();  
        return view('admin.managestaff')
                    ->with('staffs', $stf);
    }

    public function gestioneFaq() {
        $fq=$this->_faqModel->getFaq();
        return view('admin.managefaq')
                    ->with('faqs', $fq);
    }

    public function visualizzaStatistiche() {
        $coupon = $this->_couponModel->getNumCoup();
        return view('admin.stats')
                ->with('coupon', $coupon);
    }

    public function visualizzaOfferte(){
        $aziende = $this->_companyModel->getAzienda();
        $azndOff = $this->_catalogModel->getAziendaWithOffer($aziende);

        return view('admin.statistiche.statcouponpromo')
               -> with('aziende', $azndOff);
    }

    public function eliminaUtente($user_id) {
        $user = User::find($user_id);
        $user->delete();
        return redirect('/admin/deleteuser');
    }

    public function addAzienda() {
        $cmp = Company::pluck('Ragione_Sociale', 'id');
        return view('admin.gestioneaziende.addcompany')
                        ->with('azienda', $cmp);
    }

    public function storeAzienda(NewCompanyRequest $request) {

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = $logo->getClientOriginalName();
        } else {
            $logoName = NULL;
        }

        $aznd = new Company;
        $aznd->fill($request->validated());
        $aznd->logo = $logoName;
        $aznd->save();

        if (!is_null($logoName)) {
            $destinationPath = public_path() . '/images/aziende';
            $logo->move($destinationPath, $logoName);
        };

        return redirect()->action([AdminController::class, 'gestioneAzienda']);
        
    }

    public function modificaAzienda($company_id){
        $cmp = $this->_companyModel->getAziendaByID($company_id);
        return view('admin.gestioneaziende.companymodify')
                ->with('azienda', $cmp);
    }

    public function updateAzienda(Request $request, $company_id){
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $request->validate([
            'P_Iva' => ['required', 'string'],
            'Ragione_Sociale' => ['required', 'string', 'max:255'],
            'Localizzazione' => ['required', 'string'],
            'Descrizione' => ['required', 'string'],
            'Logo' => ['nullable', 'image', 'max:2048'],
            'civico' => ['required', 'string'],
            'citta' => ['required', 'string'],
            'cap' => ['required', 'string'],
            'tel' => ['required', 'string'],
            'email' => ['required', 'string'],
        ]);

        $company = $this->_companyModel->getAziendaByID($company_id);

        $company->P_Iva = $request->input('P_Iva');
        $company->Ragione_Sociale = $request->input('Ragione_Sociale');
        $company->Localizzazione = $request->input('Localizzazione');
        $company->Descrizione = $request->input('Descrizione');
        $company->Logo = $imageName;
        $company->civico = $request->input('civico');
        $company->citta = $request->input('citta');
        $company->cap = $request->input('cap');
        $company->tel = $request->input('tel');
        $company->email = $request->input('email');
        
        $company->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/aziende';
            $image->move($destinationPath, $imageName);
        };

        return redirect('/admin/managecompany');
    }

    public function eliminaAzienda($company_id) {
        $cmp = Company::find($company_id);
        $cmp->delete();
        return redirect('/admin/managecompany');
    }

    public function addStaff() {
        $stf = User::pluck('name', 'id');
        return view('admin.gestionestaff.addstaff')
                        ->with('staff', $stf);
    }

    public function storeStaff(NewStaffRequest $request) {

        $stf = new User;
        $stf->fill($request->validated());
        $stf->role = "staff";
        $stf->save();

        return redirect()->action([AdminController::class, 'gestioneStaff']);
    
    }

    public function eliminaStaff($staff_id) {
        $stf = User::find($staff_id);
        $stf->delete();
        return redirect('/admin/managestaff');
    }

    public function modificaStaff($staff_id){
        $staff = User::find($staff_id);
        return view('admin.gestionestaff.editstaff')
                ->with('staff', $staff);
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
        
        $staff = User::find(Auth::id());

        $staff->name = $request->input('name');
        $staff->surname = $request->input('surname');
        $staff->email = $request->input('email');
        $staff->username = $request->input('username');
        $staff->password = Hash::make($request->input('password'));
        $staff->data_nascita = $request->input('data_nascita');
        $staff->telefono = $request->input('telefono');

        $staff->save();

        return redirect()->route('/admin/managestaff');
    }

    public function aggiungiFaq() {
        return view('admin.gestionefaq.addFaq');
    }

    public function storeAddFaq(NewFaqRequest $request) {
        $domanda = $request->input('Domanda');
        $risposta = $request->input('Risposta');
        $faq = $this->_faqModel;
        $faq->Domanda = $domanda;
        $faq->Risposta = $risposta;
        $faq->save();

        return redirect()->route('managefaq');
    }

    public function modificaFaq($faq_id) {
        $faq = Faq::find($faq_id);
        return view('admin.gestionefaq.editFaq')
            ->with('faq', $faq);
    }

    public function updateFaq(NewFaqRequest $request, $faq_id) {
        $faq = Faq::find($faq_id);
        $faq->Domanda = $request->input('Domanda');
        $faq->Risposta = $request->input('Risposta');
        $faq->save();
        return redirect()->route('managefaq');
    }

    public function eliminaFaq($faq_id) {
        $faq = Faq::find($faq_id);
        $faq->delete();
        return redirect('/admin/managefaq');
    }

}
