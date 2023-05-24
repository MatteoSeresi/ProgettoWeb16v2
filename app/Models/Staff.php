<?php

namespace App\Models;

class Staff {

    public function getStaff()
    {
        return Register::where('Tipo', 'staff')->get();
    }


}
