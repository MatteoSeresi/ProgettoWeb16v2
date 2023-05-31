<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';

    protected $primaryKey = 'Id_Offerta';

    public function getCatalogo()
    {
        return Offer::select()->get();
    }

    public function getOfferByID($idOfferta)
    {
        return Offer::where('ID_Offerta', $idOfferta)->first();
    }

    // Relazione One-To-One con Company
    public function azienda() {
        return $this->belongsTo(Company::class, 'ID_Azienda', 'id');
    }
}
