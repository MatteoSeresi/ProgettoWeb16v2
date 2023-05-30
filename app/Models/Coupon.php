<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon'; // Nome della tabella nel database
    protected $fillable = ['codice']; // Elenco delle colonne che possono essere assegnate in modo massivo

    public $timestamps = false;

    public function getCoupon($id)
    {
        return Coupon::where('id', $id)->first();
    }

    // Altre proprietà e metodi del modello...
} 