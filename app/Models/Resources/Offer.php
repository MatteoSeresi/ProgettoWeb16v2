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
}
