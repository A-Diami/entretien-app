<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    use HasFactory;

    protected $table = "entretiens";

    protected $fillable=['participants', 'mail', 'number', 'presentation','pourquoi_defarsci', 'connaissance_defarsci', 'part','objectifs','manques', 'atouts','dureeFormation','dateDebut','horaire_travail','modalite_paiement','mensualite','demande','maladie','number_urgence','domaine_id'];

    public function domaines(){
        
        return $this->hasMany('App\Models\Domaine');
    }
}
