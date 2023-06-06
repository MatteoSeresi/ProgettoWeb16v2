<?php

namespace App\Models;

use App\Models\Resources\Company;

class Catalogo {
    public function getAziendaWithOffer($aziende)
    {
        $azndOffer = Company::with('offerte')
                        ->whereIn('id', $aziende->pluck('id'))
                        ->get();

        return $azndOffer;
    }
}
