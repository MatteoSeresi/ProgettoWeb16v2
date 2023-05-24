<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use App\Models\Resources\Company;
use App\Models\Catalogo;


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

}