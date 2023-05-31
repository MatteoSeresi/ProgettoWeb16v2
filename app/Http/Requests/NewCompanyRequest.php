<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewCompanyRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'P_Iva' => 'required|integer',
            'Ragione_Sociale' => 'required',
            'Localizzazione' => 'required',
            'Descrizione' => 'required',
            'Logo' => 'image',
            'civico' => 'required',
            'citta' => 'required',
            'cap' => 'required',
            'tel' => 'required',
            'email' => 'required'
        ];
    }

}
