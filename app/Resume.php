<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Candidature;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
class Resume extends Model
{
    use SoftDeletes;
    protected $table = 'resumes';
    protected $fillable = [
        'nom',
        'email',
        'tel',
        'genre',
        'date_naiss',
        'nationalite',
        'residence',
        'niveau_etude',
        'domaine_etude',
        'annee_exp',
        'dernier_poste',
        'responsabilite',
        'motivation',
        'disponibilite',
        'mobilite',
        'remuneration',
        'id_cand',
        'type_ab',
    ];

    public function candidatures()
    {
        return $this->belongsTo(Candidature::class, 'id_cand');
    }

   
}
