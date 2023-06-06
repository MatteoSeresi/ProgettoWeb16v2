<?php

namespace App\Http\Controllers;

use App\Models\Resources\Coupon;
use Illuminate\Http\Request;
use App\Models\Resources\Offer;
use App\Models\Resources\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
//use Dompdf\Dompdf;

class CouponController extends Controller
{
    protected $_couponModel;
    protected $numeroCasuale;
    protected $_offerModel;
    protected $_companyModel;

    public function __construct() {
        $this->_couponModel = new Coupon;
        $this->numeroCasuale = 0;
        $this->_offerModel = new Offer;
        $this->_companyModel = new Company;
    }

    public function getCurrentUser(){
        $user = Auth::user();
        return $user;
    }

    public function showCoupon($offertaId, $aziendaId){
        $user = $this->getCurrentUser();
        $offer = $this->_offerModel->getOfferByID($offertaId);
        $aznd = $this->_companyModel->getAziendaByID($aziendaId);
        $check = $this->_couponModel->getCheck($user->id, $offer->ID_Offerta, $aznd->id);
        if($check){
            $errors = new MessageBag(['genera-coupon' => ['Coupon già generato']]);
            return redirect()->route('catalogo')->withErrors($errors);
        }else{
            $this->numeroCasuale = rand(100000000000, 999999999999);
            $codice = $this->numeroCasuale;
            $this->generaCoupon($codice, $aznd, $offer);
            return view('user.coupon')->with('codice', $codice)->with('offerta', $offer)->with('azienda', $aznd);
        }
    }
    public function checkCoupon($offertaId, $aziendaId){
        $user = $this->getCurrentUser();
        $offer = $this->_offerModel->getOfferByID($offertaId);
        $aznd = $this->_companyModel->getAziendaByID($aziendaId);
        $check = $this->_couponModel->getCheck($user->id, $offer->ID_Offerta, $aznd->id);
        if($check){
            return true;
        }
        return false;
    }
    public function generaCoupon($codice, $aznd,$offer){

        $user = $this->getCurrentUser();
        $this->_couponModel->codice = $codice;
        $this->_couponModel->id_user = $user->id;
        $this->_couponModel->id_offerta = $offer->ID_Offerta;
        $this->_couponModel->id_azienda = $aznd->id;
        $this->_couponModel->save();
        return redirect()->route('catalogo');

    }

    /*public function generatePdf()
{
    // Crea un'istanza di Dompdf
    $dompdf = new Dompdf();

    // Carica il contenuto HTML dal file o da una stringa
    $html = 'coupon.blade.php';
    $dompdf->loadHtml($html);

    // Imposta le opzioni di rendering
    $dompdf->setPaper('A4', 'portrait');

    // Rendi il contenuto HTML in un file PDF
    $dompdf->render();

    // Salva il file PDF sul server o invialo come download al client
    $dompdf->stream('coupon.pdf');
}*/
}