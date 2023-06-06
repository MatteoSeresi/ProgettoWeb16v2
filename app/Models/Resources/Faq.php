<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';// Nome della tabella nel database

    protected $primaryKey = 'id';//CHIAVE PRIMARIA
    protected $fillable = ['Domanda'];// Elenco delle colonne che possono essere assegnate in modo massivo
    public $timestamps = false;
    
//OTTIENI LA LISTA COMPLETA DELLE FAQ
    public function getFaq()
    {
        return Faq::select()->get();
    }
}