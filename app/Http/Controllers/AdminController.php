<?php

namespace App\Http\Controllers; 

use App\Models\Admin;
use App\Models\Resources\Company;
use App\Http\Requests\NewProductRequest;

class AdminController extends Controller {

    protected $_adminModel;
    protected $_companyModel;

    public function __construct() {
        $this->_adminModel = new Admin;
        $this->_companyModel = new Company;
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
                    ->with('aziende', $aznd);;
    }



}
