<?php

namespace App\Models;

use App\Models\Resources\Company;
use App\Models\Resources\Offer;

class Catalogo {
    public function getAziendaWithOffer($aziende)
    {
        $azndOffer = Company::with('offerte')
                        ->whereIn('id', $aziende->pluck('id'))
                        ->get();

        return $azndOffer;
    }
}
