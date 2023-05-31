<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Resources\Offer;
use App\Models\Resources\Company;
use Illuminate\Support\Facades\Auth;

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
        $this->numeroCasuale = rand(100000000000, 999999999999);
        $codice = $this->numeroCasuale;
        $aznd = $this->_companyModel->getAziendaByID($aziendaId);
        $offer = $this->_offerModel->getOfferByID($offertaId);
        $this->generaCoupon($codice, $aznd, $offer);
        return view('user.coupon')->with('codice', $codice)->with('offerta', $offer)->with('azienda', $aznd);

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
}