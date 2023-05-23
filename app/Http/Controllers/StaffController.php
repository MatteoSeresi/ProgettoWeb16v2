<?php

namespace App\Http\Controllers;
use App\Models\User;

class StaffController extends Controller {

    protected $_utenteModel;


    public function staffarea() {
        return view('staff');
    }

    public function modificaStaff() {
        return view('staff.staffmodify');
    }

    public function modificaOfferta() {
        return view('staff.offermodify');
    }

}