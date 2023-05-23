<?php

namespace App\Http\Controllers;

use App\Models\Resources\Company;
use App\Models\Offer;
use Illuminate\Support\Facades\Log;


class PublicController extends Controller
{

    protected $_companyModel;
    protected $_catalogModel;

    public function __construct() {
        $this->_companyModel = new Company;
        $this->_catalogModel = new Offer;
    }

    public function showHome() {
        return view('home');        
    }

    public function showAziende() {
        $aznd = $this->_companyModel->getAzienda();   
        return view('aziende')
                    ->with('aziende', $aznd);
    }

    public function showCatalogo() {
        $cat = $this->_catalogModel->getCatalogo();   
        return view('catalogo')
                    ->with('catalogo', $cat);
    }



}
