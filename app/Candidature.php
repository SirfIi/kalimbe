<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;
use Resume;
use Illuminate\Database\Eloquent\SoftDeletes;
class Candidature extends Model
{
    use SoftDeletes;
    protected $table = 'candidatures';
    protected $fillable = [
        'id_post',
        'id_cand',
        'id_ent',
        'secteur',
     //   'domaine_etude',
        'niveau_etude',
        'annee_exp',
        'nationalite',
        'residence',
        'dernier_poste',
        'rspon_dernier_poste',
        'motivation',
        'disponibilte',
        'mobilite',
        'pretention_sal',
        'note_secteur',
        'note_niveau',
        'note_exp',
        'note_nationalite',
        'note_residence',
        'note_dispo',
        'note_mob',
        'note',
        'status',
        'cv',
    ];

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'id_post');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
