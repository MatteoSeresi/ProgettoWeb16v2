<?php

namespace App\Http\Controllers;

use App\Models\Resources\Company;
use App\Models\Resources\Faq;
use App\Models\Catalogo;

class PublicController extends Controller
{

    protected $_companyModel;
    protected $_catalogModel;
    protected $_faqModel;

//COTRUTTORE
    public function __construct() {
        $this->_companyModel = new Company;
        $this->_catalogModel = new Catalogo;
        $this->_faqModel = new Faq;
    }
//VISUALIZZA HOME
    public function showHome() {
        $aznd = $this->_companyModel->getAzienda();   
        return view('home')
                    ->with('aziende', $aznd);
    
    }
//VISUALIZZA AZIENDE
    public function showAziende() {
        $aznd = $this->_companyModel->getAzienda();   
        return view('aziende')
                    ->with('aziende', $aznd);
    }
//VISUALIZZAZIONE CATALOGO
    public function showCatalogo() {
        $aziende = $this->_companyModel->getAzienda();
        $azndOff = $this->_catalogModel->getAziendaWithOffer($aziende);

        return view('catalogo')
                ->with('aziende', $azndOff);
    }
//VISUALIZZAZIONE FAQ
    public function showFaq(){
        $faq = $this->_faqModel->getFaq();
        return view('faq')
                ->with('faqs', $faq);
    }
}
