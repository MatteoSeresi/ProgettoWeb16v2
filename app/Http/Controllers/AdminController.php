<?php

namespace App\Http\Controllers; 

use App\Models\Admin;
use App\Models\Register;
use App\Models\Staff;
use App\Models\Resources\Company;
use App\Models\Resources\Faq;

class AdminController extends Controller {

    protected $_adminModel;
    protected $_companyModel;
    protected $_userModel;
    protected $_staffModel;
    protected $_faqModel;


    public function __construct() {
        $this->_adminModel = new Admin;
        $this->_companyModel = new Company;
        $this->_userModel = new Register;
        $this->_staffModel = new Staff;
        $this->_faqModel = new Faq;
        //$this->middleware('can:isAdmin');
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

    public function cancellaUtente() {
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

}
