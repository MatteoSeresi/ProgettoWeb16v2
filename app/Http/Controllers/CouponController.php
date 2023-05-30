<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $_couponModel;
    protected $numeroCasuale;

    public function __construct() {
        $this->_couponModel = new Coupon;
        $this->numeroCasuale = 0;
    }

    public function showCoupon(){
        $this->numeroCasuale = rand(100000000000, 999999999999);
        $coupon = $this->numeroCasuale;
        $this->generaCoupon($coupon);
        return view('user.coupon')->with('coupon', $coupon);
            
    }
    public function generaCoupon($coupon){

        $this->_couponModel->codice = $coupon;
        $this->_couponModel->save();
        return redirect()->route('catalogo');
            
    }
}