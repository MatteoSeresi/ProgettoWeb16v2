<?php

namespace App\Models;

class Utente {

    public function getUtente()
    {
        return User::where('role', 'user')->get();
    }
}