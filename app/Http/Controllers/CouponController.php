<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Resources\Offer;
use App\Models\Resources\Company;
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
        $this->_companyModel = new Company;
    }

    public function getCurrentUser(){
        $user = Auth::user();
        return $user;
    }

    public function generateCoupon($offertaId)
    {
            // Crea un nuovo coupon
            $coupon = new Coupon();
            $coupon->codice = $this->generaNumerCoupon(); // Funzione che genera il numero del coupon
            $coupon->id_user = auth()->user()->id;
            $coupon->id_coupon = $offertaId;
            $coupon->save();

            $coupon = Coupon::where('id_coupon', $offertaId)
                    ->where('id_user', auth()->user()->id)
                    ->first();
            $offerta = $this->_offerModel->getOfferByID($offertaId);
            $company = $this->_companyModel->getAziendaByID($offerta->ID_Azienda);

            return view('user.coupon', ['coupon' => $coupon])
                    ->with('user', auth()->user())
                    ->with('offer', $offerta)
                    ->with('company', $company);
    }

    // Funzione di esempio per generare il numero del coupon
    public function generaNumerCoupon() {
        $numeroCasuale = rand(100000000000, 999999999999);
        return $numeroCasuale;
    }

}