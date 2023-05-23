<?php

namespace App\Http\Controllers; 

use App\Models\Admin;
use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;

class AdminController extends Controller {

    protected $_adminModel;

    public function __construct() {
        $this->_adminModel = new Admin;
        //$this->middleware('can:isAdmin');
    }

    public function adminarea() {
        return view('admin');
    }
}
