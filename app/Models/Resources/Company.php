<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $primaryKey = 'id';

    public function getAzienda()
    {
        return Company::select()->get();
    }

    public function getAziendaID()
    {
        return Company::select('id')->get();
    }

    public function offerte()
    {
        return $this->hasMany(Offer::class, 'ID_Azienda', 'id');
    }
}
