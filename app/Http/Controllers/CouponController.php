<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Resources\Offer;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    protected $_couponModel;
    protected $numeroCasuale;
    protected $_offerModel;

    public function __construct() {
        $this->_couponModel = new Coupon;
        $this->numeroCasuale = 0;
        $this->_offerModel = new Offer;
    }

    public function getCurrentUser(){
        $user = Auth::user();
        return $user;
    }

    public function showCoupon(){
        $this->numeroCasuale = rand(100000000000, 999999999999);
        $coupon = $this->numeroCasuale;
        $this->generaCoupon($coupon);
        return view('user.coupon')->with('coupon', $coupon);
    }
    public function generaCoupon($coupon){
        $user = $this->getCurrentUser();
        $offer = $this->_offerModel->nonsochemetterci();
        $this->_couponModel->codice = $coupon;
        $this->_couponModel->id_user = $user->id;
        $this->_couponModel->id_offerta = $offer->ID_Offerta;
        $this->_couponModel->save();
        return redirect()->route('catalogo');
            
    }
}