<?php

namespace App\Http\Controllers; 

use App\Models\Admin;
use App\Models\User;
use App\Models\Staff;
use App\Models\Resources\Company;
use App\Models\Resources\Faq;
use App\Http\Requests\NewCompanyRequest;
use App\Http\Requests\NewFaqRequest;

class AdminController extends Controller {

    protected $_adminModel;
    protected $_companyModel;
    protected $_userModel;
    protected $_staffModel;
    protected $_faqModel;


    public function __construct() {
        $this->_adminModel = new Admin;
        $this->_companyModel = new Company;
        $this->_userModel = new User;
        $this->_staffModel = new Staff;
        $this->_faqModel = new Faq;
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
        return view('admin.stats');
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

        return redirect()->action([AdminController::class, 'adminarea']);
        
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

}
