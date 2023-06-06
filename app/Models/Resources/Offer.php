<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{


    protected $table = 'offers';// Nome della tabella nel database

    protected $primaryKey = 'ID_Offerta';//CHIAVE PRIMARIA

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Nome',
        'Descrizione',
        'Scadenza',
        'Immagine',
        'ID_Azienda',
    ];

//OTTIENI LA LISTA COMPLETA DELLE OFFERTE
    public function getCatalogo()
    {
        return Offer::select()->get();
    }

//SELEZIONA UN'OFFERTA IN BASE ALL'ID
    public function getOfferByID($idOfferta)
    {
        return Offer::where('ID_Offerta', $idOfferta)->first();
    }

// Relazione One-To-One con Company
    public function azienda() {
        return $this->belongsTo(Company::class, 'ID_Azienda', 'id');
    }
}
