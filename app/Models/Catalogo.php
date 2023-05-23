<?php

namespace App\Models;

use App\Models\Resources\Company;
use App\Models\Resources\Offer;

class Catalogo {
    public function getAziendaWithOffer($idAzienda)
    {
        //$azndOffer = Offer::join('companies', 'offers.ID_Azienda', '=', 'companies.id')
                           //     ->select()->get();
        //return $azndOffer;

        $azndOffer = Company::join('offers', 'offers.ID_Azienda', '=', 'companies.id')
                      ->whereIn('offers.ID_Azienda', $idAzienda)
                      ->select('offers.*')
                      ->get();
    
    return $azndOffer;
    }
}
