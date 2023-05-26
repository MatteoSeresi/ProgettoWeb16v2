<?php

namespace App\Models;

class Staff {
    public function getStaff()
    {
        return User::where('role', 'staff')->get();
    }
}
