<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ref;
use App\User;
use App\Candidature;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected $table = 'posts';
    protected $fillable = [
        'id',
        'titre',
        // 'secteur' ,
         'type_contrat',
         'remuneration',
         'mobilite',
        // 'localisation',
        'date_publication',
        'date_exp',
        // 'domaine_etude',
        // 'diplome',
        // 'niveau_etude',
        // 'annee_exp',
        // 'certif',
        // 'nationalite',
        'description',
        'responsabilities',
        'status',
        'id_ent',
        'post_id'
    ];

    public function refs()
    {
        return $this->hasMany(Ref::class);
    }
    
     public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_ent');
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class, 'id_post');
    }
}
