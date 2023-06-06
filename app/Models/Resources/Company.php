<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies'; // Nome della tabella nel database

    protected $primaryKey = 'id'; //CHIAVE PRIMARIA
    
    // id non modificabile da un HTTP Request (Mass Assignment)
    protected $guarded = ['id'];

    public $timestamps = false;

//LISTA COMPLETA DELLE AZIENDE
    public function getAzienda()
    {
        return Company::select()->get();
    }
//SELEZIONE DELL'ID DI UN'AZIENDA
    public function getAziendaID()
    {
        return Company::select('id')->get();
    }
//SELEZIONE DELL'AZIENDA IN BASE ALL'ID
    public function getAziendaByID($idAzienda)
    {
        return Company::where('id', $idAzienda)->first();
    }
//RELAZIONE ONE-TO-ONE CON OFFERTA
    public function offerte()
    {
        return $this->hasMany(Offer::class, 'ID_Azienda', 'id');
    }
}
