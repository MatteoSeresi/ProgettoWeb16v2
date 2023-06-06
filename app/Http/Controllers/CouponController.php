<?php

namespace App\Http\Controllers;

use App\Models\Resources\Coupon;
use App\Models\Resources\Offer;
use App\Models\Resources\Company;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    protected $_couponModel;
    protected $numeroCasuale;
    protected $_offerModel;
    protected $_companyModel;

//COSTRUTTORE
    public function __construct() {
        $this->_couponModel = new Coupon;
        $this->numeroCasuale = 0;
        $this->_offerModel = new Offer;
        $this->_companyModel = new Company;
    }
//VISUALIZZAZIONE COUPON
    public function showCoupon($offertaId, $aziendaId){
        $offer = $this->_offerModel->getOfferByID($offertaId);
        $aznd = $this->_companyModel->getAziendaByID($aziendaId);
        $this->numeroCasuale = rand(100000000000, 999999999999);
        $codice = $this->numeroCasuale;
        $this->generaCoupon($codice, $offer);
        return view('user.coupon')->with('codice', $codice)->with('offerta', $offer)->with('azienda', $aznd);
    }
    
//GENERA COUPON
    public function generaCoupon($codice, $offer){
        $user = $this->getCurrentUser();
        $this->_couponModel->codice = $codice;
        $this->_couponModel->id_user = $user->id;
        $this->_couponModel->id_offerta = $offer->ID_Offerta;
        $this->_couponModel->save();
    }
//FUNZIONI VARIE
    public function getCurrentUser(){
        $user = Auth::user();
        return $user;
    }

    public function checkCoupon($offertaId, $aziendaId){
        $user = $this->getCurrentUser();
        if($user == null){
            return false;
        }else{
            $offer = $this->_offerModel->getOfferByID($offertaId);
            $aznd = $this->_companyModel->getAziendaByID($aziendaId);
            $check = $this->_couponModel->getCheck($user->id, $offer->ID_Offerta, $aznd->id);
            if($check){
                return true;
            }
        }
        return false;
    }
}